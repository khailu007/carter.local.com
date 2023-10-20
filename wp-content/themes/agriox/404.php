<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package agriox
 */

get_header();
?>

<main id="primary" class="site-main">

    <!--Start Error Page One-->
    <section class="error-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="error-page__wrapper text-center">
                        <div class="error-page__big-title">
                            <h2><?php echo esc_html_e( '404', 'agriox' ); ?></h2>
                        </div>
                        <div class="error-page__content">
                            <h2><?php esc_html_e('Sorry We can&rsquo;t Find That Page!', 'agriox'); ?></h2>
                            <p><?php esc_html_e('The page you are looking for was removed or never existed.', 'agriox'); ?></p>
                        </div>
                        <div class="error-page__search">
                            <?php get_search_form(); ?>
                        </div>
                        <div class="error-page__btn">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="thm-btn"><?php esc_html_e( 'Back to home', 'agriox' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Error Page One-->

</main><!-- #main -->

<?php
get_footer();
