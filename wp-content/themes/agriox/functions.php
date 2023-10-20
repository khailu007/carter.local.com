<?php

/**
 * agriox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agriox
 */

if (!defined('AGRIOX_VERSION')) {
    // Replace the version number of the theme on each release.
    define('AGRIOX_VERSION', '1.2');
}

if (!function_exists('agriox_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function agriox_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on agriox, use a find and replace
		 * to change 'agriox' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('agriox', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'agriox'),
            )
        );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );


        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'agriox_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agriox_content_width()
{
    $GLOBALS['content_width'] = apply_filters('agriox_content_width', 640);
}
add_action('after_setup_theme', 'agriox_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agriox_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'agriox'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'agriox'),
            'before_widget' => '<section id="%1$s" class="sidebar__single widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<div class="title"><h2>',
            'after_title'   => '</h2></div>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Shop Sidebar', 'agriox'),
            'id'            => 'shop',
            'description'   => esc_html__('Add widgets here.', 'agriox'),
            'before_widget' => '<section id="%1$s" class="sidebar__single shop-one__sidebar__item widget sidebar-widget %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<div class="shop-one__sidebar__item__title"><h3>',
            'after_title'   => '</h3></div>',
        )
    );
}
add_action('widgets_init', 'agriox_widgets_init');

// google font process

function agriox_fonts_url()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'agriox')) {
        $font_url = add_query_arg('family', urlencode('Shadows Into Light|Averia Sans Libre:300,300i,400,400i,700,700i|DM Sans:400,400i,500,500i,700,700i&subset=latin,latin-ext'), "//fonts.googleapis.com/css");
    }

    return esc_url_raw($font_url);
}


/**
 * Enqueue scripts and styles.
 */
function agriox_scripts()
{
    wp_enqueue_style('agriox-fonts', agriox_fonts_url(), array(), null);
    wp_enqueue_style('flaticons', get_template_directory_uri() . '/assets/vendors/flaticons/css/flaticon.css', array(), '1.1');
    wp_enqueue_style('agriox-icons', get_template_directory_uri() . '/assets/vendors/agriox-icons/style.css', array(), '1.1');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap/css/bootstrap.min.css', array(), '5.0.0');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css', array(), '5.15.1');
    wp_enqueue_style('agriox-style', get_stylesheet_uri(), array(), time());
    wp_style_add_data('agriox-style', 'rtl', 'replace');

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap/js/bootstrap.min.js', array('jquery'), '5.0.0', true);
    wp_enqueue_script('agriox-theme', get_template_directory_uri() . '/assets/js/agriox-theme.js', array('jquery'), time(), true);



    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $agriox_get_dark_mode_status = get_theme_mod('agriox_dark_mode', false);
    if (is_page()) {
        $agriox_get_dark_mode_status = !empty(get_post_meta(get_the_ID(), 'agriox_enable_dark_mode', true)) ? get_post_meta(get_the_ID(), 'agriox_enable_dark_mode', true) : $agriox_get_dark_mode_status;
    }
    $agriox_dynamic_dark_mode_status = isset($_GET['dark_mode']) ? $_GET['dark_mode'] : $agriox_get_dark_mode_status;
    if ($agriox_dynamic_dark_mode_status) {
        wp_enqueue_style('agriox-dark-mode', get_template_directory_uri() . '/assets/css/modes/agriox-dark.css', array(), time());
    }



    $agriox_get_rtl_mode_status = get_theme_mod('agriox_rtl_mode', false);
    if (is_page()) {
        $agriox_get_rtl_mode_status = !empty(get_post_meta(get_the_ID(), 'agriox_enable_rtl', true)) ? get_post_meta(get_the_ID(), 'agriox_enable_rtl', true) : $agriox_get_rtl_mode_status;
    }
    $agriox_dynamic_rtl_mode_status = isset($_GET['rtl_mode']) ? $_GET['rtl_mode'] : $agriox_get_rtl_mode_status;
    if (true == $agriox_dynamic_rtl_mode_status) {
        wp_enqueue_style('agriox-rtl', get_template_directory_uri() . '/assets/css/agriox-rtl.css', array(), time());
    }
}
add_action('wp_enqueue_scripts', 'agriox_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Implement the customizer feature.
 */
if (class_exists('Kirki')) {
    require get_template_directory() . '/inc/customizer.php';
    require get_template_directory() . '/inc/theme-customizer-styles.php';
}

/**
 * TGMPA Activation.
 */
require get_template_directory() . '/inc/plugins.php';



/*
* one click deomon import
*/
if (class_exists('OCDI_Plugin')) {
    require get_template_directory() . '/inc/demo-import.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}
