<?php get_header(); ?>

  <div class="hero post-hero">
    <div class="post-hero__main">
      <h1 class="post-title"><?php the_title(); ?></h1>
      <?php the_tags('<ul class="tag-list"><li class="tag-list__item">','</li><li class="tag-list__item">','</li></ul>'); ?>
      <div class="post-date">
        <p class="post-date__inner">
          <span class="post-date-title">
            <span class="screen-reader-text">投稿日</span>
          </span>
          <span><?php the_time( get_option( 'date_format' ) ); ?></span>
        </p>
        <p class="post-date__inner">
          <span class="post-update-title">
            <span class="screen-reader-text">更新日</span>
          </span>
          <time datetime="<?php the_modified_date( DATE_W3C ); ?>"><?php the_modified_date( get_option( 'date_format' ) ); ?></time>
        </p>
      </div>
    </div>
    <div class="post-hero__thumbnail">
      <?php if ( has_post_thumbnail()) : ?>
        <figure class="post-hero__thumbnail-inner">
          <?php the_post_thumbnail(); ?>
        </figure>
      <?php else : ?>
        <figure class="post-hero__thumbnail-inner">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/no_image_post.png" alt="no image">
        </figure>
      <?php endif; ?>
    </div>
  </div>

  <div class="container column">
    <?php while ( have_posts() ) : the_post(); ?>
    <main class="main-content post">

      <?php
        if( get_field('conversation1_person') ):
        $fieldData = get_fields();
      ?>

      <div class="post-conversation">
        <!-- 会話１ -->
        <div class="post-conversation__inner <?php echo get_field('conversation1_person'); ?>">
          <p class="person">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/<?php echo get_field('conversation1_person'); ?>.png" alt="">
          </p>
          <p class="balloon">
            <?php echo $fieldData['conversation1_conent']; ?>
          </p>
        </div>

        <!-- 会話２ -->
        <?php if( get_field('conversation2_person') ): ?>
        <div class="post-conversation__inner <?php echo get_field('conversation2_person'); ?>">
          <p class="person"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/<?php echo get_field('conversation2_person'); ?>.png" alt=""></p>
          <p class="balloon"><?php echo $fieldData['conversation2_conent']; ?></p>
        </div>
        <?php endif; ?>

        <!-- 会話3 -->
        <?php if( get_field('conversation3_person') ): ?>
        <div class="post-conversation__inner <?php echo $fieldData['conversation3_person']['value']; ?>">
          <p class="person"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/<?php echo get_field('conversation3_person'); ?>.png" alt=""></p>
          <p class="balloon"><?php echo $fieldData['conversation3_conent']; ?></p>
        </div>
        <?php endif; ?>

      </div>
      <?php endif; ?>

      <div class="post-content">
        <?php the_content(); ?>
      </div>

      <?php if( !(is_home() || is_front_page() )): ?>
      <div class="breadcrumb-wrapper">
        <ol class="post-breadcrumb">
          <?php
            if ( function_exists( 'bcn_display' ) ) {
              bcn_display();
            }
          ?>
        </ol>
      </div>
      <?php endif; ?>
    </main>
    <?php endwhile; ?>

    <?php get_sidebar(); ?>

  </div>

  <div class="container">
  </div>

<?php get_footer(); ?>
