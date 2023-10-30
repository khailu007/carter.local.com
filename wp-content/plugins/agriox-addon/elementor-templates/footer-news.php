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
            <style type="text/css">
                .cus-footer-news-link a {
                    color: #fff;
                }
                .cus-footer-news-link a:hover {
                    font-weight: bold;
                    color:#f1cf69;
                }
            </style>
            <div class="cus-footer-news-link" style="color:#fff;">
                <a href="<?php the_permalink(); ?>"><?php echo wp_kses( get_the_title(), 'agriox_allowed_tags' ); ?></a>
            </div>
        </div>
    </li>
<?php endwhile; ?>

</ul>
</div>