<?php get_header(); ?>

  <div class="hero">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/img-top-key-sp.jpg" media="(max-width: 480px)">
      <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/img-top-key.jpg" alt="">
    </picture>
  </div>

  <div class="container">
    <h1 class="page-main-title"><?php the_title(); ?></h1>
  </div>

  <div class="container single-page">
    <main class="main-content">
      <?php while ( have_posts() ) : the_post(); ?>

        <?php if ( has_post_thumbnail()) : ?>
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <div class="post-content">
          <?php the_content(); ?>
        </div>

      <?php endwhile; ?>
    </main>
  </div>

<?php get_footer(); ?>
