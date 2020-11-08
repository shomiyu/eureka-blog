<?php
/*======================================
  コンテンツ幅
======================================*/
if ( !isset( $content_width ) ) {
  $content_width = 760;
}

/*======================================
  初期設定
======================================*/
function eureka_setup() {

  /*
    Titleタグ
  ----------------------------------- */
  add_theme_support( 'title-tag' );

  /*
    アイキャッチ画像
  ----------------------------------- */
  add_theme_support( 'post-thumbnails' );

  /*
    カスタムメニュー
  ----------------------------------- */
  $locations = [
    'global' => 'Global Navigation'
  ];
  register_nav_menus($locations);
}
add_action( 'after_setup_theme', 'eureka_setup' );


/*======================================
  スタイル・スクリプトの追加
======================================*/
function eureka_scripts() {

  /*
    CSS
  ----------------------------------- */
  wp_enqueue_style( 'eureka-index', get_theme_file_uri() .'/assets/css/style.css' );
  wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700|Quicksand:400,700&display=swap&subset=japanese' );

  /*
    JS
  ----------------------------------- */
  wp_enqueue_script( 'dummy-app', get_theme_file_uri() .'/assets/js/main.js', ['jquery'], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'eureka_scripts' );


/*======================================
  OGPタグ/Twitterカード設定を出力
======================================*/
function my_meta_ogp() {
  if( is_front_page() || is_home() || is_singular() ){
    global $post;
    $ogp_title = '';
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    if( is_singular() ) { //記事＆固定ページ
      setup_postdata($post);
      $ogp_title = $post->post_title;
      $ogp_descr = mb_substr(get_the_excerpt(), 0, 100);
      $ogp_url = get_permalink();
      wp_reset_postdata();
    } elseif ( is_front_page() || is_home() ) { //トップページ
      $ogp_title = get_bloginfo('name');
      $ogp_descr = get_bloginfo('description');
      $ogp_url = home_url();
    }

    //og:type
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    //og:image
    if ( is_singular() && has_post_thumbnail() ) {
      $ps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
      $ogp_img = $ps_thumb[0];
    } else {
      $ogp_img = get_theme_file_uri() .'/assets/images/image_ogp.png';
    }

    //出力するOGPタグをまとめる
    $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
    $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
    $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
    $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
    $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
    $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
    $insert .= '<meta name="twitter:card" content="summary" />' . "\n";
    $insert .= '<meta name="twitter:site" content="@MykiiTech" />' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";

    //facebookのapp_id（設定する場合）
    $insert .= '<meta property="fb:app_id" content="540094856930583">' . "\n";
    //app_idを設定しない場合ここまで消す

    echo $insert;
  }
}
add_action('wp_head','my_meta_ogp');//headにOGPを出力


/*======================================
  ウィジェットの有効化
======================================*/
function eureka_widgets_init() {

    /*
    サイドバー
  ----------------------------------- */
  $args = [
    'name'          => 'Sidebar',
    'id'            => 'sidebar',
    'before_widget' => '<aside class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget__title">',
  ];
  register_sidebar($args);

  // 追従
  $argsFollow = [
    'name'          => 'SidebarFollow',
    'id'            => 'sidebarFollow',
    'before_widget' => '<aside class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget__title">',
  ];
  register_sidebar($argsFollow);

    /*
    フッター
  ----------------------------------- */
  $footerArgsA = [
    'name'          => 'FooterA',
    'id'            => 'footerA',
    'before_title'  => '<h2 class="footer-widget__title">',
  ];
  register_sidebar($footerArgsA);

  $footerArgsB = [
    'name'          => 'FooterB',
    'id'            => 'footerB',
    'before_title'  => '<h2 class="footer-widget__title">',
  ];
  register_sidebar($footerArgsB);

  $footerArgsC = [
    'name'          => 'FooterC',
    'id'            => 'footerC',
    'before_title'  => '<h2 class="footer-widget__title">',
  ];
  register_sidebar($footerArgsC);
}
add_action( 'widgets_init', 'eureka_widgets_init' );

/*======================================
  抜粋文を調整
======================================*/

/*
  文字数の変更
----------------------------------- */
function dummy_excerpt_length( $length ) {
  return 53;
}
add_filter( 'excerpt_length', 'dummy_excerpt_length', 999 );

/*
  省略時の文字変更
----------------------------------- */
function dummy_excerpt_more($more) {
  return '...';
}
add_filter('excerpt_more', 'dummy_excerpt_more');


/*======================================
  pタグとbrタグの自動挿入無効
======================================*/
add_action('init', function() {
  remove_filter('the_excerpt', 'wpautop');
  remove_filter('the_content', 'wpautop');
});
add_filter('tiny_mce_before_init', function($init) {

$init['wpautop'] = false;
$init['apply_source_formatting'] = 'ture';
  return $init;
});


/*======================================
  ラベルの無効化
======================================*/
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
    $title = '「404」ページが見つかりません';
	}
    return $title;
});
