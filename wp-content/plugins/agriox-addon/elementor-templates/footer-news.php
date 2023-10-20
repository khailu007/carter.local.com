<div class="footer-widget__column footer-widget__news">
<?php if( !empty( $settings[ 'title' ] ) ) : ?>
    <h2 class="footer-widget__title"><?php echo esc_html( $settings[ 'title' ] ); ?></h2>
<?php endif; ?>
<ul class="footer-widget__news-list list-unstyled">
<?php
    $footer_news_query_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        'orderby' => 'date',
        'order'   => $settings['query_order'],
        'posts_per_page' => $settings['post_count']['size']
    );

    $footer_news_query = new \WP_Query($footer_news_query_args);
?>
<?php while ($footer_news_query->have_posts()) :
  $footer_news_query->the_post(); ?>
    <li class="footer-widget__news-list-item">
        <div class="footer-widget__news-list-item-img">

        <?php the_post_thumbnail( 'agriox_footer_blog_71X71' ); ?>

        </div>
        <div class="footer-widget__news-list-item-title">
            <p><?php the_time( 'd M, y' ); ?></p>
            <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses( get_the_title(), 'agriox_allowed_tags' ); ?></a></h5>
        </div>
    </li>
<?php endwhile; ?>

</ul>
</div>