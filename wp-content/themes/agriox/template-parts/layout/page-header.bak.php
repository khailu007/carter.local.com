<?php

/**
 * Template part for displaying Page Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agriox
 */
?>

<!--Page Header Start-->
<section class="page-header">
	<div class="container">
		<div class="page-header__inner text-center clearfix">
			<?php $agriox_page_meta_breadcumb_status = empty(get_post_meta(get_the_ID(), 'agriox_show_page_breadcrumb', true)) ? 'on' : get_post_meta(get_the_ID(), 'agriox_show_page_breadcrumb', true); ?>
			<?php if (function_exists('bcn_display') && 'on' == get_theme_mod('breadcrumb_opt', 'off') && 'on' == $agriox_page_meta_breadcumb_status) : ?>
				<div class="breadcrumbs thm-breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
					<?php bcn_display(); ?>
				</div>
			<?php endif; ?>
			<?php $agriox_page_title_text = !empty(get_post_meta(get_the_ID(), 'agriox_set_header_title', true)) ? get_post_meta(get_the_ID(), 'agriox_set_header_title', true) : get_the_title(); ?>
			<h2>
				<?php if (!is_page()) : ?>
					<?php agriox_page_title(); ?>
				<?php else : ?>
					<?php echo wp_kses($agriox_page_title_text, 'agriox_allowed_tags') ?>
				<?php endif; ?>
			</h2>
		</div>
	</div>
</section>
<!--Page Header End-->