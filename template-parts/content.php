<li class="card-item">
  <a href="<?php the_permalink(); ?>">
    <article class="card-item__inner">
      <div class="card-item__body">
        <h2 class="card-item__title"><?php the_title(); ?></h2>
        <p class="card-item__text"><?php the_excerpt(); ?></p>
        <?php
        $posttags = get_the_tags();
        if ( $posttags ) {
          echo '<ul class="tag-list">';
          foreach ( $posttags as $tag ) {
            echo '<li class="tag-list__item">'.$tag->name.'</li>';
          }
          echo '</ul>';
        }
        ?>
        <p class="card-item__date"><time datetime="<?php the_time( DATE_W3C ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></p>
      </div>
      <div class="card-item__thumbnail">
        <figure>
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail([264, 163]) ?>
          <?php else : ?>
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/no_image.png"  srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/no_image.png, <?php echo esc_url(get_theme_file_uri()); ?>/assets/images/no_image@2x.png 2x" alt="no image">
          <?php endif; ?>
        </figure>
      </div>
    </article>
  </a>
</li>
