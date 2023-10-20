<?php

/**
 * Template part for displaying footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agriox
 */
?>


<?php
$agriox_page_id     = get_queried_object_id();
$agriox_custom_footer_status = !empty(get_post_meta($agriox_page_id, 'agriox_custom_footer_status', true)) ? get_post_meta($agriox_page_id, 'agriox_custom_footer_status', true) : 'off';

$agriox_custom_footer_id = '';
if ((is_page() && 'on' === $agriox_custom_footer_status) || (is_singular('portfolio') && 'on' === $agriox_custom_footer_status) || (is_singular('service') && 'on' === $agriox_custom_footer_status) || (is_singular('team') && 'on' === $agriox_custom_footer_status)) {
    $agriox_custom_footer_id = get_post_meta($agriox_page_id, 'agriox_select_custom_footer', true);
} elseif (true == get_theme_mod('footer_custom')) {
    $agriox_custom_footer_id = get_theme_mod('footer_custom_post');
} else {
    $agriox_custom_footer_id = 'default_footer';
}

$agriox_dynamic_footer = isset($_GET['custom_footer_id']) ? $_GET['custom_footer_id'] : $agriox_custom_footer_id;
?>


<?php if ('default_footer' == $agriox_dynamic_footer) : ?>
    <footer class="footer-one">
        <div class="footer-one__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-one__bottom-inner-default text-center">
                            <div class="footer-one__bottom-text">
                                <p><?php echo wp_kses(get_theme_mod('footer_copytext', esc_html__('&copy; Copyright 2021 by Layerdrops.com', 'agriox')), 'agriox_allowed_tags'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php else : ?>
    <?php echo do_shortcode('[agriox-footer id="' . $agriox_dynamic_footer . '"]');
    ?>
<?php endif; ?>