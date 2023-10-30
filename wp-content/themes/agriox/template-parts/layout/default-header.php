<?php

/**
 * Template part for displaying Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agriox
 */

$agriox_page_id     = get_queried_object_id();
$agriox_custom_header_status = !empty(get_post_meta($agriox_page_id, 'agriox_custom_header_status', true)) ? get_post_meta($agriox_page_id, 'agriox_custom_header_status', true) : 'off';

$agriox_custom_header_id = '';
if (is_page() && 'on' === $agriox_custom_header_status) {
	$agriox_custom_header_id = get_post_meta($agriox_page_id, 'agriox_select_custom_header', true);
} elseif (true == get_theme_mod('header_custom')) {
	$agriox_custom_header_id = get_theme_mod('header_custom_post');
} else {
	$agriox_custom_header_id = 'default_header';
}

$agriox_dynamic_header = isset($_GET['custom_header_id']) ? $_GET['custom_header_id'] : $agriox_custom_header_id;
?>

<?php if ('default_header' == $agriox_dynamic_header) : ?>

	<header class="main-header main-header--one main-header--one--two  clearfix default">
		<div class="main-header--one__wrapper">
			<div class="main-header--one__bottom clearfix">
				<div class="container">
					<div class="main-header--one__bottom-inner">
						<div class="main-header--one__bottom-middel">
							<div class="logo">
								<a href="<?php echo esc_url(home_url('/')); ?>">
									<?php
										$agriox_logo_size = get_theme_mod('header_logo_width', 115);
										$agriox_custom_logo_id = get_theme_mod('custom_logo');
										$agriox_logo = wp_get_attachment_image_src($agriox_custom_logo_id, 'full');
										if (has_custom_logo()) {
											echo '<img width="' . esc_attr($agriox_logo_size) . '" src="' . esc_url($agriox_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
										} else {
											echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
										}
									?>
								</a>
							</div>
						</div>

						<nav class="main-menu main-menu--1">
							<div class="main-menu__inner">
								<a href="#" class="mobile-nav__toggler" aria-label="menu bars"><i class="fa fa-bars"></i></a>

								<div class="stricky-one-logo">
									<div class="logo">
										<a href="<?php echo esc_url(home_url('/')); ?>" aria-label="logo image">
											<?php
											$agriox_logo_size = get_theme_mod('header_logo_width', 115);
											$agriox_sticky_logo = get_theme_mod('agriox_mobile_sticky_menu_logo', '');
											if (!empty($agriox_sticky_logo)) {
												echo '<img width="' . esc_attr($agriox_logo_size) . '" src="' . esc_url($agriox_sticky_logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
											} else {
												echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
											}
											?>
										</a>
									</div>
								</div>

								<div class="main-header--one__bottom-left">
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
												'fallback_cb' => 'agriox_menu_fallback_callback',
												'menu_class' => 'main-menu__list',
											)
										);
									?>
								</div>
							</div>
						</nav>

					</div>

				</div>
			</div>
		</div>
	</header>

	<?php if (get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing()) : ?>
		<div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content">
            </div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
	<?php endif; ?>

	<div class="mobile-nav__wrapper">
		<div class="mobile-nav__overlay mobile-nav__toggler"></div>
		<!-- /.mobile-nav__overlay -->
		<div class="mobile-nav__content">
			<span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

			<div class="logo-box">
				<a href="<?php echo esc_url(home_url('/')); ?>" aria-label="logo image">
					<?php
					$agriox_logo_size = get_theme_mod('header_logo_width', 115);
					$agriox_mobile_logo = get_theme_mod('agriox_mobile_menu_logo', '');
					if (!empty($agriox_mobile_logo)) {
						echo '<img width="' . esc_attr($agriox_logo_size) . '" src="' . esc_url($agriox_mobile_logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
					} else {
						echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
					}
					?>
				</a>
			</div>
			<!-- /.logo-box -->
			<div class="mobile-nav__container"></div>
			<!-- /.mobile-nav__container -->

			<ul class="mobile-nav__contact list-unstyled ml-0">
				<?php $agriox_mobile_menu_email = get_theme_mod('agriox_mobile_menu_email'); ?>
				<?php if (!empty($agriox_mobile_menu_email)) : ?>
					<li>
						<i class="fa fa-envelope"></i>
						<a href="mailto:<?php echo esc_attr($agriox_mobile_menu_email); ?>"><?php echo esc_html($agriox_mobile_menu_email); ?></a>
					</li>
				<?php endif; ?>
				<?php $agriox_mobile_menu_phone = get_theme_mod('agriox_mobile_menu_phone'); ?>
				<?php if (!empty($agriox_mobile_menu_phone)) : ?>
					<li>
						<i class="fa fa-phone-alt"></i>
						<a href="tel:<?php echo esc_url(str_replace(' ', '-', $agriox_mobile_menu_phone)); ?>"><?php echo esc_html($agriox_mobile_menu_phone); ?></a>
					</li>
				<?php endif; ?>
			</ul><!-- /.mobile-nav__contact -->
			<div class="mobile-nav__top">
				<div class="mobile-nav__social">
					<?php $agriox_mobile_menu_social = get_theme_mod('mobile_menu_social_icons'); ?>
					<?php if (!empty($agriox_mobile_menu_social)) : ?>
						<?php foreach ($agriox_mobile_menu_social as $social_icon) : ?>
							<a href="<?php echo esc_url($social_icon['link_url']); ?>" class="fab <?php echo esc_attr($social_icon['link_icon']); ?>"></a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div><!-- /.mobile-nav__social -->
			</div><!-- /.mobile-nav__top -->

		</div>
		<!-- /.mobile-nav__content -->
	</div>
	<!-- /.mobile-nav__wrapper -->

	<?php $agriox_back_to_top_status = get_theme_mod('scroll_to_top', false); ?>
	<?php if (true === $agriox_back_to_top_status) : ?>
		<span data-target="html" class="scroll-to-target scroll-to-top"><i class="fa <?php echo esc_attr(get_theme_mod('scroll_to_top_icon', 'fa-angle-up')); ?>"></i></span>

	<?php endif; ?>

<?php else : ?>
	<?php echo do_shortcode('[agriox-header id="' . $agriox_dynamic_header . '"]');
	?>
<?php endif; ?>