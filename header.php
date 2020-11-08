<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="header">
    <div class="container">
      <h1 class="header__logo"><a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/logo_eureka.svg" alt="eureka"></a></h1>
      <button type="button" class="button-hamburger" id="js-menuOpen">
        <span class="hamburger">
          <span class="screen-reader-text">メニューを開く</span>
        </span>
      </button>
      <nav class="global-nav">
        <?php
          $args = [
            'theme_location' => 'global',
            'menu_class'     => 'menu-primary',
            'container'      => false
          ];
          wp_nav_menu($args);
        ?>
      </nav>
    </div>
  </header>
