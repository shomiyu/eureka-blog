  <footer class="footer">
    <div class="footer-upper">
      <div class="container column -col-3">
        <ul class="footer-widget"><?php dynamic_sidebar('footerA'); ?></ul>
        <ul class="footer-widget"><?php dynamic_sidebar('footerB'); ?></ul>
        <ul class="footer-widget"><?php dynamic_sidebar('footerC'); ?></ul>
      </div>

      <div class="container">
        <ul class="sns-accounts">
          <li><a href="https://twitter.com/MykiiTech"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/twitter.svg" alt="twitter"></a></li>
          <li><a href="https://github.com/shomiyu"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/github.svg" alt="github"></a></li>
          <li class="codepen"><a href="https://codepen.io/miyuki-shoji"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/codepen.svg" alt="codepne"></a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="footer-logo"><a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/logo_full.svg" alt="eureka"></a></p>
      <p class="copy"><small lang="en">&copy; 2020 <?php bloginfo( 'name' ); ?>.</small></p>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
