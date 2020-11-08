<?php get_header(); ?>

  <div class="hero">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/img-top-key-sp.jpg" media="(max-width: 480px)">
      <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/img-top-key.jpg" alt="">
    </picture>
  </div>

  <div class="conttainer">
    <p class="site-copy"><?php bloginfo( 'description' ); ?></p>
  </div>

  <div class="container column">
    <main class="main-content">
      <?php if ( have_posts() ) :?>
        <ul class="card-list">

          <?php while( have_posts() ) : the_post(); ?>
            <?php get_template_part('template-parts/content'); ?>
          <?php endwhile; ?>
        </ul>

      <?php
        $args = [
          'prev_text' => 'prev',
          'next_text' => 'next',
          'show_all' => 'true'
        ];
        the_posts_pagination( $args );
      ?>
      <?php else : ?>
        <p>投稿がありません。</p>
      <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
