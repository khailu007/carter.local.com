<?php

/**
 * Agriox Theme Customizer
 *
 * @package agriox
 */


$agriox_config_id = 'agriox_customize';

Kirki::add_config($agriox_config_id, array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
));


/**
 * theme option panel master
 */

Kirki::add_panel('agriox_theme_opt', array(
	'priority'    => 240,
	'title'       => esc_html__('Agriox Options', 'agriox'),
	'description' => esc_html__('Agriox Theme options panel', 'agriox'),
));

/**
 * General options
 */
Kirki::add_section('agriox_theme_general', array(
	'title'          => esc_html__('General Settings', 'agriox'),
	'description'    => esc_html__('Agriox General Settings.', 'agriox'),
	'panel'          => 'agriox_theme_opt',
	'priority'       => 160,
));


// theme base color
Kirki::add_field($agriox_config_id, [
	'type'        => 'color',
	'settings'    => 'theme_base_color',
	'label'       => esc_html__('Select Theme Base color', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => sanitize_hex_color('#f1cf69'),
]);


// theme Primary color
Kirki::add_field($agriox_config_id, [
	'type'        => 'color',
	'settings'    => 'theme_primary_color',
	'label'       => esc_html__('Select Theme Primary color', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => sanitize_hex_color('#334b35'),
]);

// theme Secondary color
Kirki::add_field($agriox_config_id, [
	'type'        => 'color',
	'settings'    => 'theme_econdary_color',
	'label'       => esc_html__('Select Theme Secondary color', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => sanitize_hex_color('#6d8c54'),
]);

// general options fields

Kirki::add_field($agriox_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'agriox_rtl_mode',
	'label'       => esc_html__('Enable RTL Mode', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($agriox_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'agriox_boxed_layout',
	'label'       => esc_html__('Enable Boxed Layout', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($agriox_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'agriox_dark_mode',
	'label'       => esc_html__('Enable Dark Mode', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($agriox_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'preloader',
	'label'       => esc_html__('Preloader Visibility', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => false,
	'priority'    => 10
]);


Kirki::add_field($agriox_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'scroll_to_top',
	'label'       => esc_html__('Back to top Visibility', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($agriox_config_id, [
	'type'        => 'select',
	'settings'    => 'scroll_to_top_icon',
	'label'       => esc_html__('Select Back to top icon', 'agriox'),
	'section'     => 'agriox_theme_general',
	'default'     => 'fa-angle-up',
	'priority'    => 10,
	'multiple'    => 0,
	'choices'     => agriox_get_fa_icons(),
	'active_callback'  => function () {
		$switch_value = get_theme_mod('scroll_to_top', true);

		if (true === $switch_value) {
			return true;
		}
		return false;
	},
]);


// background image
Kirki::add_field($agriox_config_id, [
	'type'        => 'image',
	'settings'    => 'preloader_image',
	'label'       => esc_html__('Custom Preloader Image', 'agriox'),
	'section'     => 'agriox_theme_general',
]);

// page header background image
Kirki::add_field($agriox_config_id, [
	'type'        => 'image',
	'settings'    => 'page_header_bg_image',
	'label'       => esc_html__('Page Header Background Image', 'agriox'),
	'section'     => 'agriox_theme_general',
]);


Kirki::add_section('agriox_blog_layout_settings', array(
	'title'          => esc_html__('Blog Layout', 'agriox'),
	'description'    => esc_html__('Blog Layout', 'agriox'),
	'panel'          => 'agriox_theme_opt',
	'priority'       => 160,
));

Kirki::add_field('theme_config_id', [
	'type'        => 'select',
	'settings'    => 'agriox_blog_layout',
	'label'       => esc_html__('Select Sidebar position', 'agriox'),
	'section'     => 'agriox_blog_layout_settings',
	'default'     => 'right-align',
	'priority'    => 10,
	'choices'     => [
		'left-align' => esc_html__('Left Align', 'agriox'),
		'right-align' => esc_html__('Right Align', 'agriox'),
	],
]);

/**
 * Header options
 */

Kirki::add_section('agriox_theme_header', array(
	'title'          => esc_html__('Header Settings', 'agriox'),
	'description'    => esc_html__('Agriox Header Settings.', 'agriox'),
	'panel'          => 'agriox_theme_opt',
	'priority'       => 160,
));



// set logo width
Kirki::add_field($agriox_config_id, [
	'type'        => 'text',
	'settings'    => 'header_logo_width',
	'label'       => esc_html__('Add Logo size in px', 'agriox'),
	'section'     => 'agriox_theme_header',
	'default'     => esc_html(115),
]);



// stricky switch
Kirki::add_field($agriox_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'header_stricked_menu',
	'label'       => esc_html__('Stricky Header', 'agriox'),
	'section'     => 'agriox_theme_header',
	'description'    => esc_html__('If you are logged in and your top WordPress Admin bar is active this setting will not effect. But while logged out you will see your sticky menu is toggling by this', 'agriox'),
	'default'     => true,
	'priority'    => 10,
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'image',
	'settings' => 'agriox_mobile_sticky_menu_logo',
	'label'    => esc_html__('Sticky Logo', 'agriox'),
	'section'  => 'agriox_theme_header',
	'priority' => 10,
]);

// header banner breadcrumb
Kirki::add_field($agriox_config_id, [
	'type'        => 'switch',
	'settings'    => 'breadcrumb_opt',
	'label'       => esc_html__('Breadcrumb Visibility', 'agriox'),
	'section'     => 'agriox_theme_header',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__('Enable', 'agriox'),
		'off' => esc_html__('Disable', 'agriox'),
	],
]);



// Footer options fields
Kirki::add_field($agriox_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'header_custom',
	'label'       => esc_html__('Enable Custom Header', 'agriox'),
	'section'     => 'agriox_theme_header',
	'default'     => false,
	'priority'    => 10,
]);

// Get Footer Custom Post
Kirki::add_field($agriox_config_id, [
	'type'        => 'select',
	'settings'    => 'header_custom_post',
	'label'       => esc_html__('Select Header Type', 'agriox'),
	'choices'     => agriox_post_query('header'),
	'section'     => 'agriox_theme_header',
	'priority'    => 10,
	'active_callback' => function () {
		if (true == post_type_exists('header') && true == get_theme_mod('header_custom')) {
			return true;
		} else {
			return false;
		}
	},
]);


/**
 * Mobile Menu
 */

Kirki::add_section('agriox_theme_mobile_menu', array(
	'title'          => esc_html__('Mobile Menu Settings', 'agriox'),
	'description'    => esc_html__('Agriox Mobile Menu Settings.', 'agriox'),
	'panel'          => 'agriox_theme_opt',
	'priority'       => 160,
));

Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_mobile_menu_email',
	'label'    => esc_html__('Email', 'agriox'),
	'section'  => 'agriox_theme_mobile_menu',
	'default'  => esc_html__('needhelp@agriox.com', 'agriox'),
	'priority' => 10,
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'image',
	'settings' => 'agriox_mobile_menu_logo',
	'label'    => esc_html__('Logo', 'agriox'),
	'section'  => 'agriox_theme_mobile_menu',
	'priority' => 10,
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_mobile_menu_phone',
	'label'    => esc_html__('Phone', 'agriox'),
	'section'  => 'agriox_theme_mobile_menu',
	'default'  => esc_html__('666 888 0000', 'agriox'),
	'priority' => 10,
]);

Kirki::add_field($agriox_config_id, [
	'type'        => 'repeater',
	'label'       => esc_html__('Select Social Icons', 'agriox'),
	'section'     => 'agriox_theme_mobile_menu',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__('Social Icons', 'agriox'),
	],
	'button_label' => esc_html__('Add new Icon', 'agriox'),
	'settings'     => 'mobile_menu_social_icons',
	'default'      => [
		[
			'link_icon' => 'fa-facebook',
			'link_url' => esc_url('http://facebook.com'),
		],
	],
	'fields' => [
		'link_icon'  => [
			'type'        => 'select',
			'label'       => esc_html__('Social Icon', 'agriox'),
			'description' => esc_html__('Select Social Icons', 'agriox'),
			'default'     => 'fa-facebook',
			'choices'     => agriox_get_fa_icons(),
		],
		'link_url' => [
			'type'        => 'text',
			'label'       => esc_html__('Link Url', 'agriox'),
			'description' => esc_html__('Add social profile links', 'agriox'),
			'default'     => esc_url('https://facebook.com/'),
		],
	]
]);


/**
 * Footer options
 */

Kirki::add_section('agriox_theme_footer', array(
	'title'          => esc_html__('Footer Settings', 'agriox'),
	'description'    => esc_html__('Agriox Footer Settings.', 'agriox'),
	'panel'          => 'agriox_theme_opt',
	'priority'       => 160,
));



Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'footer_copytext',
	'label'    => esc_html__('Text Control', 'agriox'),
	'section'  => 'agriox_theme_footer',
	'default'  => esc_html__('&copy; All right reserved', 'agriox'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'agriox_allowed_tags');;
	},
	'active_callback' => function () {
		if (false == get_theme_mod('footer_custom')) {
			return true;
		}
	},
]);


// Footer options fields
Kirki::add_field($agriox_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'footer_custom',
	'label'       => esc_html__('Enable Custom Footer', 'agriox'),
	'section'     => 'agriox_theme_footer',
	'default'     => false,
	'priority'    => 10,
]);

// Get Footer Custom Post
Kirki::add_field($agriox_config_id, [
	'type'        => 'select',
	'settings'    => 'footer_custom_post',
	'label'       => esc_html__('Select Footer Type', 'agriox'),
	'choices'     => agriox_post_query('footer'),
	'section'     => 'agriox_theme_footer',
	'priority'    => 10,
	'active_callback' => function () {
		if (true == post_type_exists('footer') && true == get_theme_mod('footer_custom')) {
			return true;
		} else {
			return false;
		}
	},
]);


/**
 * Service Sidebar Menu
 */


Kirki::add_section('agriox_theme_service_sidebar', array(
	'title'          => esc_html__('Service Sidebar Menu', 'agriox'),
	'description'    => esc_html__('Agriox Service Sidebar Options.', 'agriox'),
	'panel'          => 'agriox_theme_opt',
	'priority'       => 160,
	'active_callback' => function () {
		if (true == post_type_exists('service')) {
			return true;
		}
	},
));

Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_sidebar_menu_title',
	'label'    => esc_html__('Add Menu Title', 'agriox'),
	'section'  => 'agriox_theme_service_sidebar',
	'default'  => esc_html__('All Services', 'agriox'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'agriox_allowed_tags');;
	},
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'select',
	'settings' => 'agriox_sidebar_menu_item',
	'label'    => esc_html__('Add Nav Menu', 'agriox'),
	'section'  => 'agriox_theme_service_sidebar',
	'priority' => 10,
	'choices'     => agriox_get_nav_menu(),
]);

/**
 * Service Sidebar Contact
 */


Kirki::add_section('agriox_theme_contact_sidebar', array(
	'title'          => esc_html__('Service Sidebar Contact', 'agriox'),
	'description'    => esc_html__('Agriox Service Sidebar Options.', 'agriox'),
	'panel'          => 'agriox_theme_opt',
	'priority'       => 160,
	'active_callback' => function () {
		if (true == post_type_exists('service')) {
			return true;
		}
	},
));

Kirki::add_field($agriox_config_id, [
	'type'     => 'select',
	'settings' => 'agriox_sidebar_contact_icon',
	'label'    => esc_html__('Contact Icon', 'agriox'),
	'section'  => 'agriox_theme_contact_sidebar',
	'priority' => 10,
	'default'  => 'icon-phone-call-2',
	'choices'     => agriox_get_fa_icons(),

]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_sidebar_contact_title',
	'label'    => esc_html__('Contact Title', 'agriox'),
	'section'  => 'agriox_theme_contact_sidebar',
	'default'  => esc_html__('Need Agriox Help?', 'agriox'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'agriox_allowed_tags');;
	},
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_sidebar_contact_text',
	'label'    => esc_html__('Contact Text', 'agriox'),
	'section'  => 'agriox_theme_contact_sidebar',
	'default'  => esc_html__('Default Text', 'agriox'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'agriox_allowed_tags');;
	},
]);


Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_sidebar_contact_number',
	'label'    => esc_html__('Contact Number', 'agriox'),
	'section'  => 'agriox_theme_contact_sidebar',
	'default'  => esc_html__('666 888 000', 'agriox'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'agriox_allowed_tags');;
	},
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_sidebar_contact_number_link',
	'label'    => esc_html__('Contact Number Link', 'agriox'),
	'section'  => 'agriox_theme_contact_sidebar',
	'default'  => esc_html__('#', 'agriox'),
	'priority' => 10,
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'image',
	'settings' => 'agriox_sidebar_contact_bg',
	'label'    => esc_html__('Contact Background', 'agriox'),
	'section'  => 'agriox_theme_contact_sidebar',
	'priority' => 10,
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_sidebar_pdf_title',
	'label'    => esc_html__('Downloadable PDF Title', 'agriox'),
	'section'  => 'agriox_theme_contact_sidebar',
	'default'  => esc_html__(' download pdf file', 'agriox'),
	'priority' => 10,
]);

Kirki::add_field($agriox_config_id, [
	'type'     => 'text',
	'settings' => 'agriox_sidebar_pdf_url',
	'label'    => esc_html__('Downloadable PDF Url', 'agriox'),
	'section'  => 'agriox_theme_contact_sidebar',
	'default'  => '#',
	'priority' => 10,
]);
