<?php if( !empty( $settings[ 'title' ] ) ) : ?>
    <h2 class="footer-widget__title"><?php echo esc_html( $settings[ 'title' ] ); ?></h2>
<?php endif; ?>

<?php 
    foreach ($settings['nav_menus'] as $nav_menu) : ?>
        <?php wp_nav_menu(array(
            'menu' => $nav_menu['nav_menu'],
            'menu_class' => 'footer-widget__explore-list list-unstyled'
        ));
    ?>
<?php endforeach; ?>

