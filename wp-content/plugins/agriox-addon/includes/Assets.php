<?php

namespace Layerdrops\Agriox;

class Assets
{

    /**
     * Class constructor
     */
    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
        add_action('admin_enqueue_scripts', [$this, 'register_assets']);
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts()
    {
        return [
            'bootstrap-select' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/bootstrap-select/js/bootstrap-select.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/bootstrap-select/js/bootstrap-select.min.js'),
                'deps'    => ['jquery', 'bootstrap']
            ],
            'jquery-bxslider' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/bxslider/jquery.bxslider.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/bxslider/jquery.bxslider.min.js'),
                'deps'    => ['jquery']
            ],
            'countdown' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/countdown/countdown.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/countdown/countdown.min.js'),
                'deps'    => ['jquery']
            ],
            'isotope' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/isotope/isotope.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/isotope/isotope.js'),
                'deps'    => ['jquery']
            ],
            'jarallax' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/jarallax/jarallax.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/jarallax/jarallax.min.js'),
                'deps'    => ['jquery']
            ],
            'jquery-ajaxchimp' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js'),
                'deps'    => ['jquery']
            ],
            'jquery-appear' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/jquery-appear/jquery.appear.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/jquery-appear/jquery.appear.min.js'),
                'deps'    => ['jquery']
            ],
            'jquery-circle-progress' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/jquery-circle-progress/jquery.circle-progress.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js'),
                'deps'    => ['jquery']
            ],
            'jquery-magnific-popup' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js'),
                'deps'    => ['jquery']
            ],
            'odometer' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/odometer/odometer.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/odometer/odometer.min.js'),
                'deps'    => ['jquery']
            ],
            'owl-carousel' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/owl-carousel/owl.carousel.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/owl-carousel/owl.carousel.min.js'),
                'deps'    => ['jquery']
            ],
            'swiper' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/swiper/swiper.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/swiper/swiper.min.js'),
                'deps'    => ['jquery']
            ],
            'wow' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/wow/wow.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/wow/wow.js'),
                'deps'    => ['jquery']
            ],

            'sharer' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/sharer/sharer.min.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/sharer/sharer.min.js'),
                'deps'    => ['jquery']
            ],

            'agriox-addon-script' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/js/agriox-addon.js',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/js/agriox-addon.js'),
                'deps'    => ['jquery']
            ]
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles()
    {
        return [
            'animate' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/animate/animate.min.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/animate/animate.min.css')
            ],
            'bootstrap-select' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/bootstrap-select/css/bootstrap-select.min.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/bootstrap-select/css/bootstrap-select.min.css')
            ],
            'bxslider' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/bxslider/jquery.bxslider.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/bxslider/jquery.bxslider.css')
            ],
            'jarallax' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/jarallax/jarallax.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/jarallax/jarallax.css')
            ],
            'jquery-magnific-popup' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/jquery-magnific-popup/jquery.magnific-popup.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')
            ],
            'odometer' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/odometer/odometer.min.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/odometer/odometer.min.css')
            ],
            'owl-carousel' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/owl-carousel/owl.carousel.min.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/owl-carousel/owl.carousel.min.css')
            ],
            'owl-theme' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/owl-carousel/owl.theme.default.min.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/owl-carousel/owl.theme.default.min.css')
            ],
            'reey-font' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/reey-font/stylesheet.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/reey-font/stylesheet.css')
            ],
            'swiper' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/swiper/swiper.min.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/swiper/swiper.min.css')
            ],
            'agriox-icon-2' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/vendors/agriox-icons-2/style.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/vendors/agriox-icons-2/style.css')
            ],
            'agriox-addon-style' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/css/agriox-addon.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/css/agriox-addon.css')
            ],
            'agriox-addon-admin-style' => [
                'src'     => AGRIOX_ADDON_ASSETS . '/css/agriox-addon-admin.css',
                'version' => filemtime(AGRIOX_ADDON_PATH . '/assets/css/agriox-addon-admin.css')
            ]
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets()
    {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;

            wp_register_script($handle, $script['src'], $deps, $script['version'], true);
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;

            wp_register_style($handle, $style['src'], $deps, $style['version']);
        }
    }
}
