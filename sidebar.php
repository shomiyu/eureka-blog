<div class="sidebar">
  <aside class="keyword-search">
    <h2 class="screen-reader-text">キーワード検索</h2>
    <?php get_search_form(); ?>
  </aside>
  <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar' ); ?>
  <?php endif; ?>

  <div class="side-follow">
    <?php dynamic_sidebar( 'sidebarFollow' ); ?>
  </div>
</div>
