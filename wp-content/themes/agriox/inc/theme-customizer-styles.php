<?php

/**
 * agriox functions for getting inline styles from theme customizer
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agriox
 */

if (!function_exists('agriox_theme_customizer_styles')) :
	function agriox_theme_customizer_styles()
	{

		// agriox color option

		$agriox_inline_style = '';
		$agriox_inline_style .= ':root {--agriox-primary: ' . get_theme_mod('theme_base_color', sanitize_hex_color('#f1cf69')) . ';  --agriox-primary: ' . get_theme_mod('theme_primary_color', sanitize_hex_color('#334b35')) . ';  --agriox-secondary: ' . get_theme_mod('theme_secondary_color', sanitize_hex_color('#6d8c54')) . '; }';

		$agriox_inner_banner_bg = get_theme_mod('page_header_bg_image');
		$agriox_inline_style .= '.page-header { background-image: url(' . $agriox_inner_banner_bg . '); } ';

		$agriox_preloader_icon = get_theme_mod('preloader_image');
		if ($agriox_preloader_icon) {
			$agriox_inline_style .= '.preloader .preloader__image { background-image: url(' . $agriox_preloader_icon . '); } ';
		}

		if (is_page()) {


			$agriox_page_base_color = empty(get_post_meta(get_the_ID(), 'agriox_base_color', true)) ? get_theme_mod('theme_base_color', sanitize_hex_color('#f1cf69')) : get_post_meta(get_the_ID(), 'agriox_base_color', true);

			$agriox_page_primary_color = empty(get_post_meta(get_the_ID(), 'agriox_primary_color', true)) ? get_theme_mod('theme_primary_color', sanitize_hex_color('#334b35')) : get_post_meta(get_the_ID(), 'agriox_primary_color', true);

			$agriox_page_secondary_color = empty(get_post_meta(get_the_ID(), 'agriox_secondary_color', true)) ? get_theme_mod('theme_secondary_color', sanitize_hex_color('#6d8c54')) : get_post_meta(get_the_ID(), 'agriox_secondary_color', true);

			$agriox_inline_style .= ':root {--agriox-base: ' . $agriox_page_base_color . '; --agriox-primary: ' . $agriox_page_primary_color . '; --agriox-secondary: ' . $agriox_page_secondary_color . '; }';

			$agriox_page_header_bg = empty(get_post_meta(get_the_ID(), 'agriox_set_header_image', true)) ? get_theme_mod('page_header_bg_image') : get_post_meta(get_the_ID(), 'agriox_set_header_image', true);

			$agriox_inline_style .= '.page-header { background-image: url(' . $agriox_page_header_bg . '); }';
		}


		wp_add_inline_style('agriox-style', $agriox_inline_style);
	}
endif;

add_action('wp_enqueue_scripts', 'agriox_theme_customizer_styles');
