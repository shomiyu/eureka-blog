<?php get_header(); ?>

  <div class="hero">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/img-top-key-sp.jpg" media="(max-width: 480px)">
      <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/img-top-key.jpg" alt="">
    </picture>
  </div>

  <div class="container column n404">
    <main class="main-content">
      <h1 class="page-main-title">404 Not Found!</h1>
      <p>その記事は削除されたか、用意されていません。恐れ入りますが別の記事をお探しください。</p>
    </main>

    <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
