<?php

namespace Layerdrops\Agriox;

class Utility
{
    public function __construct()
    {
        $this->register_image_size();
        add_filter('single_template', [$this, 'load_portfolio_template']);
        add_filter('single_template', [$this, 'load_service_template']);
        add_filter('single_template', [$this, 'load_team_template']);
    }
    public function register_image_size()
    {
        add_image_size('agriox_blog_370X271', 370, 271, true); //in use
        add_image_size('agriox_blog_two_373X273', 373, 273, true); //in use
        add_image_size('agriox_blog_three_570X271', 570, 271, true); //in use
        add_image_size('agriox_blog_four_270X271', 270, 271, true); //in use
        add_image_size('agriox_footer_blog_71X71', 71, 71, true); //in use
        add_image_size('agriox_testimonials_79X79', 79, 79, true); //in use
        add_image_size('agriox_service_details_770X441', 770, 441, true); //in use
        add_image_size('agriox_portfolio_details_1170X531', 1170, 531, true); //in use
        add_image_size('agriox_service_281X230', 281, 230, true); //in use
        add_image_size('agriox_service_two_268X219', 268, 219, true); //in use
        add_image_size('agriox_service_three_370X489', 370, 489, true); //in use
        add_image_size('agriox_portfolio_one_400X440', 400, 440, true); //in use
        add_image_size('agriox_portfolio_two_370X441', 370, 441, true); //in use
        add_image_size('agriox_portfolio_three_370X408', 370, 408, true); //in use
        add_image_size('agriox_team_270X331', 270, 331, true); //in use
        add_image_size('agriox_team_two_370X391', 370, 391, true); //in use
        add_image_size('agriox_team_three_512X512', 512, 512, true); //in use
        add_image_size('agriox_brand_logo_125X24', 125, 24, true); //in use

    }

    public function load_portfolio_template($template)
    {
        global $post;

        if ('portfolio' === $post->post_type && locate_template(array('single-portfolio.php')) !== $template) {
            /*
            * This is a 'portfolio' post
            * AND a 'single portfolio template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return AGRIOX_ADDON_PATH . '/post-templates/single-portfolio.php';
        }

        return $template;
    }

    public function load_service_template($template)
    {
        global $post;

        if ('service' === $post->post_type && locate_template(array('single-service.php')) !== $template) {
            /*
            * This is a 'service' post
            * AND a 'single service template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return AGRIOX_ADDON_PATH . '/post-templates/single-service.php';
        }

        return $template;
    }


    public function load_team_template($template)
    {
        global $post;

        if ('team' === $post->post_type && locate_template(array('single-team.php')) !== $template) {
            /*
            * This is a 'team' post
            * AND a 'single team template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return AGRIOX_ADDON_PATH . '/post-templates/single-team.php';
        }

        return $template;
    }
}
