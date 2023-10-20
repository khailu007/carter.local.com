<?php

/**
 * Plugin Name: Agriox Theme Addon
 * Description: Required plugin for Agriox Theme.
 * Plugin URI:  https://layerdrops.com/
 * Version:     1.1
 * Author:      Layerdrops
 * Author URI:  https://layerdrops.com/
 * Text Domain: agriox-addon
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once __DIR__ . '/vendor/autoload.php';


/**
 * Main Agriox Theme Addon Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Agriox_Addon_Extension
{

    /**
     * Plugin Version
     *
     * @since 1.0.0
     *
     * @var string The plugin version.
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     *
     * @since 1.0.0
     *
     * @access private
     * @static
     *
     * @var Agriox_Addon_Extension The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     *
     * @access public
     * @static
     *
     * @return Agriox_Addon_Extension An instance of the class.
     */
    public static function instance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct()
    {
        $this->define_constants();
        $this->theme_fallback();

        add_action('plugins_loaded', [$this, 'on_plugins_loaded']);
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('AGRIOX_ADDON_VERSION', self::VERSION);
        define('AGRIOX_ADDON_FILE', __FILE__);
        define('AGRIOX_ADDON_PATH', __DIR__);
        define('AGRIOX_ADDON_URL', plugins_url('', AGRIOX_ADDON_FILE));
        define('AGRIOX_ADDON_ASSETS', AGRIOX_ADDON_URL . '/assets');
    }

    /**
     * register fallback theme functions
     *
     * @return void
     */
    public function theme_fallback()
    {
        include AGRIOX_ADDON_PATH . '/common/functions.php';
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function i18n()
    {

        load_plugin_textdomain('agriox-addon', false, AGRIOX_ADDON_PATH . '/languages');
    }

    /**
     * On Plugins Loaded
     *
     * Checks if Elementor has loaded, and performs some compatibility checks.
     * If All checks pass, inits the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function on_plugins_loaded()
    {
        new Layerdrops\Agriox\Assets();
        new Layerdrops\Agriox\PostTypes();
        new Layerdrops\Agriox\Utility();
        new Layerdrops\Agriox\Megamenu();
        new Layerdrops\Agriox\Frontend\Shortcodes();


        if (is_admin()) {
            new Layerdrops\Agriox\Admin();
        }

        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);


        if ($this->is_compatible()) {
            add_action('elementor/init', [$this, 'init']);
        }
    }

    public function enqueue_scripts()
    {
        wp_enqueue_style('animate');
        wp_enqueue_style('bootstrap-select');
        wp_enqueue_style('bxslider');
        wp_enqueue_style('jarallax');
        wp_enqueue_style('jquery-magnific-popup');
        wp_enqueue_style('odometer');
        wp_enqueue_style('owl-carousel');
        wp_enqueue_style('owl-theme');
        wp_enqueue_style('reey-font');
        wp_enqueue_style('swiper');
        wp_enqueue_style('agriox-icon-2');
        wp_enqueue_style('agriox-addon-style');

        wp_enqueue_script('bootstrap-select');
        wp_enqueue_script('jquery-bxslider');
        wp_enqueue_script('countdown');
        wp_enqueue_script('isotope');
        wp_enqueue_script('jarallax');
        wp_enqueue_script('jquery-ajaxchimp');
        wp_enqueue_script('jquery-appear');
        wp_enqueue_script('jquery-magnific-popup');
        wp_enqueue_script('odometer');
        wp_enqueue_script('owl-carousel');
        wp_enqueue_script('swiper');
        wp_enqueue_script('wow');
        wp_enqueue_script('sharer');
        wp_enqueue_script('agriox-addon-script');
    }

    /**
     * Compatibility Checks
     *
     * Checks if the installed version of Elementor meets the plugin's minimum requirement.
     * Checks if the installed PHP version meets the plugin's minimum requirement.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function is_compatible()
    {

        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return false;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return false;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return false;
        }

        return true;
    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init()
    {

        $this->i18n();



        // register category
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);
        // load icons
        add_filter('elementor/icons_manager/additional_tabs', array($this, 'add_elementor_custom_icons'));

        // Add Plugin actions
        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init_widgets()
    {

        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Header());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\MainSlider());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\About());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Features());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\FancyBox());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\IconBox());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Faq());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Service());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Portfolio());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Testimonials());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Video());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Blog());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Sponsors());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\CallToAction());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Team());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\ContactInfo());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Offer());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Gallery());

        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\Shop());

        if (function_exists('wpcf7')) {
            \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\ContactForm());
        }

        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\FooterAbout());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\FooterNews());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\FooterNavMenu());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\FooterSubscribe());
        \Elementor\Plugin::instance()->widgets_manager->register(new Layerdrops\Agriox\Widgets\FooterCopyright());
    }

    public function add_elementor_widget_categories($elements_manager)
    {

        $elements_manager->add_category(
            'agriox-category',
            [
                'title' => __('Agriox Addon', 'agriox-addon'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    public function add_elementor_custom_icons($array)
    {

        return array(
            'agriox' => array(
                'name'          => 'agriox',
                'label'         => 'Agriox Icons',
                'url'           => '',
                'enqueue'       => array(
                    AGRIOX_ADDON_URL . '/assets/vendors/agriox-icons/style.css',
                ),
                'prefix'        => '',
                'displayPrefix' => '',
                'labelIcon'     => 'icon-dairy-products',
                'ver'           => '1.1',
                'fetchJson'     => AGRIOX_ADDON_URL . '/assets/vendors/agriox-icons/agriox-icons-new.js',
                'native'        => 1,
            ),
            'agriox-two' => array(
                'name'          => 'agriox-two',
                'label'         => 'Agriox Icons 02',
                'url'           => '',
                'enqueue'       => array(
                    AGRIOX_ADDON_URL . '/assets/vendors/agriox-icons-2/style.css',
                ),
                'prefix'        => '',
                'displayPrefix' => '',
                'labelIcon'     => 'icon-dairy-products',
                'ver'           => '1.1',
                'fetchJson'     => AGRIOX_ADDON_URL . '/assets/vendors/agriox-icons-2/agriox-icons-2.js',
                'native'        => 1,
            ),
        );
    }


    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin()
    {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'agriox-addon'),
            '<strong>' . esc_html__('Agriox Theme Addon', 'agriox-addon') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'agriox-addon') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version()
    {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'agriox-addon'),
            '<strong>' . esc_html__('Agriox Theme Addon', 'agriox-addon') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'agriox-addon') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_php_version()
    {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'agriox-addon'),
            '<strong>' . esc_html__('Agriox Theme Addon', 'agriox-addon') . '</strong>',
            '<strong>' . esc_html__('PHP', 'agriox-addon') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
}

Agriox_Addon_Extension::instance();
