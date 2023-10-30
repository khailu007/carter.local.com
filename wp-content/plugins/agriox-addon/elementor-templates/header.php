<?php if ('layout_one' === $settings['layout_type']) : ?>

	<header class="main-header main-header--one  clearfix">
		<div class="main-header--one__wrapper">
			<?php if ('yes' == $settings['topbar_status']) : ?>
				<div class="main-header--one__top clearfix">
					<div class="auto-container">

						<div class="main-header--one__top-left">
							<?php if (!empty($settings['welcome_text'])) : ?>
								<div class="text">
									<p><?php echo wp_kses($settings['welcome_text'], 'agriox_allowed_tags'); ?></p>
								</div>
							<?php endif; ?>
							<?php if (is_array($settings['nav_social_icons'])) : ?>
								<div class="social-link clearfix">
									<ul class="list-unstyled">
										<?php foreach ($settings['nav_social_icons'] as $social_icon) : ?>
											<li>
												<a class="icon-svg" href="<?php echo esc_url($social_icon['social_url']['url']); ?>" <?php echo esc_attr(!empty($social_icon['social_url']['is_external']) ? 'target=_blank' : ' '); ?>>
													<?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
						<?php if (is_array($settings['topbar_infos'])) :  ?>
							<div class="main-header--one__top-right clearfix">
								<ul class="list-unstyled">
									<?php foreach ($settings['topbar_infos'] as $info) : ?>
										<li>
											<div class="icon icon-svg">
												<?php \Elementor\Icons_Manager::render_icon($info['topbar_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?>
											</div>
											<div class="text">
												<p><?php echo wp_kses($info['topbar_info_text'], 'agriox_allowed_tags'); ?></p>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="main-header--one__bottom clearfix">
				<div class="auto-container">
					<div class="main-header--one__bottom-inner">
						<nav class="main-menu main-menu--1">
							<div class="main-menu__inner">


								<div class="stricky-one-logo">
									<div class="logo" style="width: 180px; height: 90px;">
										<a href="<?php echo esc_url(home_url('/')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
											<img class="dark-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['dark_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
											<img class="light-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['light_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
										</a>
									</div>
								</div>

								<div class="main-header--one__bottom-left">
									<?php
									wp_nav_menu(
										array(
											'menu' => $settings['nav_menu'],
											'menu_class' => 'main-menu__list',
											'walker'         => class_exists('\Layerdrops\Agriox\Megamenu\Walker_Nav_Menu') ? new \Layerdrops\Agriox\Megamenu\Walker_Nav_Menu : '',
										)
									);
									?>
								</div>
							</div>
						</nav>

						<style type="text/css">
							.cus_logo_header {
								background-image: url('<?php echo esc_url($settings['dark_logo']['url']); ?>');
								background-size: contain;
								background-repeat: no-repeat;
								width: 100%;
								height: 100%;
							}
						</style>
						<div class="main-header--one__bottom-middel">
							<div class="logo" style="width: 180px; height: 90px;">
								<a href="<?php echo esc_url(home_url('/')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
									<div class="cus_logo_header"></div>
								</a>
							</div>

							<a href="#" class="mobile-nav__toggler" aria-label="menu bars" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><i class="fa fa-bars"></i></a>
						</div>

						<div class="main-header--one__bottom-right clearfix">
							<?php if ('yes' == $settings['search_enable'] || ('yes' == $settings['cart_enable'] && class_exists('WooCommerce'))) : ?>
								<div class="search-cart">
									<?php if ('yes' == $settings['search_enable']) : ?>
										<a href="#" class="search search-toggler"><span class="icon-magnifying-glass"></span></a>

									<?php endif; ?>
									<?php if ('yes' == $settings['cart_enable'] && class_exists('WooCommerce')) : ?>
										<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart mini-cart__toggler"><span class="icon-shopping-cart"></span></a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<div class="contact-box">
								<div class="icon icon-svg">
									<?php \Elementor\Icons_Manager::render_icon($settings['contact_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
								</div>
								<div class="text">
									<p><?php echo esc_html($settings['callinfo']); ?></p>
									<a href="tel:<?php echo esc_url(str_replace(' ', '-', $settings['call_number'])); ?>"><?php echo esc_html($settings['call_number']); ?></a>
								</div>
							</div>
						</div>

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

<?php endif; ?>

<?php if ('layout_two' === $settings['layout_type']) : ?>

	<header class="main-header main-header--one main-header--one--two  clearfix">
		<div class="main-header--one__wrapper">
			<div class="main-header--one__bottom clearfix">
				<div class="auto-container">
					<div class="main-header--one__bottom-inner">
						<div class="main-header--one__bottom-middel">
							<div class="logo">
								<a href="<?php echo esc_url(home_url('/')); ?>">
									<img class="dark-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['dark_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
									<img class="light-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['light_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
								</a>
							</div>

						</div>

						<nav class="main-menu main-menu--1">
							<div class="main-menu__inner">
								<div class="stricky-one-logo">
									<div class="logo">
										<a href="<?php echo esc_url(home_url('/')); ?>">
											<img class="dark-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['dark_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
											<img class="light-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['light_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
										</a>
									</div>
								</div>

								<div class="main-header--one__bottom-left">
									<?php
									wp_nav_menu(
										array(
											'menu' => $settings['nav_menu'],
											'menu_class' => 'main-menu__list',
											'walker'         => class_exists('\Layerdrops\Agriox\Megamenu\Walker_Nav_Menu') ? new \Layerdrops\Agriox\Megamenu\Walker_Nav_Menu : '',
										)
									);
									?>
								</div>
							</div>
						</nav>

						<div class="main-header--one__bottom-right clearfix">
							<a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
							<div class="search-cart">
								<?php if ('yes' == $settings['search_enable']) : ?>
									<a href="#" class="search search-toggler"><span class="icon-magnifying-glass"></span></a>
								<?php endif; ?>
								<?php if ('yes' == $settings['cart_enable'] && class_exists('WooCommerce')) : ?>
									<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart mini-cart__toggler"><span class="icon-shopping-cart"></span></a>
								<?php endif; ?>
							</div>
							<div class="contact-box">
								<div class="icon icon-svg">
									<?php \Elementor\Icons_Manager::render_icon($settings['contact_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
								</div>
								<div class="text">
									<p><?php echo esc_html($settings['callinfo']); ?></p>
									<a href="tel:<?php echo esc_url(str_replace(' ', '-', $settings['call_number'])); ?>"><?php echo esc_html($settings['call_number']); ?></a>
								</div>
							</div>
						</div>
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
<?php endif; ?>

<?php if ('layout_three' === $settings['layout_type']) : ?>

	<header class="main-header main-header--one main-header--one--two main-header-three  clearfix">
		<div class="main-header--one__wrapper">
			<div class="main-header-three__upper">
				<div class="container">
					<div class="main-header-three__upper__contact">
						<?php if (!empty($settings['topbar_call_icon'])) : ?>
							<div class="icon icon-svg">
								<?php \Elementor\Icons_Manager::render_icon($settings['topbar_call_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
							</div>
						<?php endif; ?>
						<div class="text">
							<?php if (!empty($settings['topbar_phone_icon_text'])) : ?>
								<p><?php echo esc_html($settings['topbar_phone_icon_text']); ?></p>
							<?php endif; ?>
							<?php if (!empty($settings['topbar_phone_number'])) : ?>
								<a href="tel:<?php echo esc_html($settings['topbar_phone_number']); ?>"><?php echo esc_html($settings['topbar_phone_number']); ?></a>
							<?php endif; ?>
						</div>
					</div><!-- /.main-header-three__upper__contact -->
					<div class="logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img class="dark-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['dark_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
							<img class="light-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['light_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
						</a>
						<a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
					</div>
					<div class="main-header-three__upper__contact">
						<?php if (!empty($settings['topbar_email_icon'])) : ?>
							<div class="icon icon-svg">
								<?php \Elementor\Icons_Manager::render_icon($settings['topbar_email_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
							</div>
						<?php endif; ?>
						<div class="text">
							<?php if (!empty($settings['topbar_email_icon_text'])) : ?>
								<p><?php echo esc_html($settings['topbar_email_icon_text']); ?></p>
							<?php endif; ?>
							<?php if (!empty($settings['topbar_email_address'])) ?>
							<a href="mailto:<?php echo esc_html($settings['topbar_email_address']); ?>"><?php echo esc_html($settings['topbar_email_address']); ?></a>

						</div>
					</div><!-- /.main-header-three__upper__contact -->
				</div><!-- /.container -->
			</div><!-- /.main-header-three__upper -->
			<div class="main-header--one__bottom clearfix">
				<div class="container">
					<div class="main-header--one__bottom-inner">
						<nav class="main-menu main-menu--1">
							<div class="main-menu__inner">

								<?php if (is_array($settings['nav_social_icons'])) :  ?>
									<div class="main-header-three__social">
										<?php foreach ($settings['nav_social_icons'] as $item) : ?>
											<a class="icon-svg" href="<?php echo esc_url($item['social_url']['url']); ?>" <?php echo esc_attr(!empty($item['social_url']['is_external']) ? 'target=_blank' : ' '); ?>>
												<?php \Elementor\Icons_Manager::render_icon($item['social_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?>
											</a>
										<?php endforeach; ?>
									</div><!-- /.main-header-three__social -->
								<?php endif; ?>
								<div class="main-header--one__bottom-left">
									<?php
									wp_nav_menu(
										array(
											'menu' => $settings['nav_menu'],
											'menu_class' => 'main-menu__list',
											'walker'         => class_exists('\Layerdrops\Agriox\Megamenu\Walker_Nav_Menu') ? new \Layerdrops\Agriox\Megamenu\Walker_Nav_Menu : '',
										)
									);
									?>
								</div>

								<div class="main-header--one__bottom-right clearfix">
									<div class="search-cart">
										<?php if ('yes' == $settings['search_enable']) : ?>
											<a href="#" class="search search-toggler"><span class="icon-magnifying-glass"></span></a>
										<?php endif; ?>
										<?php if ('yes' == $settings['cart_enable'] && class_exists('WooCommerce')) : ?>
											<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart mini-cart__toggler"><span class="icon-shopping-cart"></span></a>
										<?php endif; ?>
									</div>
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

<?php endif; ?>

<div class="mobile-nav__wrapper">
	<div class="mobile-nav__overlay mobile-nav__toggler"></div>
	<!-- /.mobile-nav__overlay -->
	<div class="mobile-nav__content">
		<span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

		<div class="logo-box">
			<a href="<?php echo esc_url(home_url('/')); ?>" aria-label="logo image">
				<img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['mobile_menu_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
			</a>
		</div>
		<!-- /.logo-box -->
		<div class="mobile-nav__container"></div>
		<!-- /.mobile-nav__container -->
		<ul class="mobile-nav__contact list-unstyled ml-0">
			<?php if ($settings['mobile_email']) : ?>
				<li>
					<i class="fa fa-envelope"></i>
					<a href="mailto:<?php echo esc_attr($settings['mobile_email']); ?>"><?php echo esc_html($settings['mobile_email']); ?></a>
				</li>
			<?php endif; ?>
			<?php if ($settings['mobile_phone']) : ?>
				<li>
					<i class="fa fa-phone-alt"></i>
					<a href="tel:<?php echo esc_html($settings['mobile_phone']); ?>">
						<?php echo esc_html($settings['mobile_phone']); ?>
					</a>
				</li>
			<?php endif; ?>
		</ul><!-- /.mobile-nav__contact -->
		<div class="mobile-nav__top">
			<div class="mobile-nav__social">
				<?php foreach ($settings['mobile_menu_social_icons'] as $social_icon) : ?>
					<a href="<?php echo esc_url($social_icon['social_url']['url']); ?>" class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></a>
				<?php endforeach; ?>
			</div><!-- /.mobile-nav__social -->
		</div><!-- /.mobile-nav__top -->

	</div>
	<!-- /.mobile-nav__content -->
</div>

<div class="search-popup">
	<div class="search-popup__overlay search-toggler"></div>
	<!-- /.search-popup__overlay -->
	<div class="search-popup__content">
		<form action="<?php echo esc_url(home_url('/')); ?>">
			<label for="search" class="sr-only"><?php echo esc_html__("search here", 'agriox-addon'); ?></label>
			<input type="text" name="s" id="search" placeholder="<?php echo esc_attr__('Search Here...', 'agriox-addon') ?>" />
			<button type="submit" aria-label="search submit" class="thm-btn2">
				<i class="fa fa-search" aria-hidden="true"></i>
			</button>
		</form>
	</div>
	<!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<?php $agriox_back_to_top_status = get_theme_mod('scroll_to_top', false); ?>
<?php if (true === $agriox_back_to_top_status) : ?>
	<span data-target="html" class="scroll-to-target scroll-to-top"><i class="fa <?php echo esc_attr(get_theme_mod('scroll_to_top_icon', 'fa-angle-up')); ?>"></i></span>

<?php endif; ?>