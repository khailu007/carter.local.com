<?php if ('layout_one' == $settings['layout_type']) : ?>

	<!--About One Start-->
	<section class="about-one">
		<?php if (!empty($settings['bg_shape_image'])) : ?>
			<div class="about-one__bg wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
				<img class="float-bob-y" src="<?php echo esc_url($settings['bg_shape_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['bg_shape_image']['id'])); ?>" />
			</div>
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<!--Start About One Left-->
				<div class="col-xl-6">
					<div class="about-one__left">
						<div class="about-one__left-img">
							<div class="about-one__left-img-inner">
								<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>" />
							</div>
						</div>
						<div class="about-one__left-overlay wow slideInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
							<div class="icon">
								<span class="<?php echo esc_attr($settings['image_icon']['value']); ?>"></span>
							</div>
							<div class="title">
								<h2><span class="odometer" data-count="<?php echo esc_attr($settings['image_count']); ?>">00</span></h2>
								<p><?php echo wp_kses($settings['image_title'], 'agriox_allowed_tags'); ?></p>
							</div>
						</div>
					</div>
				</div>
				<!--End About One Left-->

				<!--Start About One Content-->
				<div class="col-xl-6">
					<div class="about-one__content">
						<?php if (!empty($settings['sec_subtitle']) || !empty($settings['sec_title'])) : ?>
							<div class="sec-title">
								<?php if (!empty($settings['icon_image']['url'])) : ?>
									<div class="icon">
										<img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>" />
									</div>
								<?php endif; ?>
								<?php if (!empty($settings['sec_subtitle'])) : ?>
									<span class="sec-title__tagline"><?php echo wp_kses($settings['sec_subtitle'], 'agriox_allowed_tags'); ?></span>
								<?php endif; ?>
								<?php if (!empty($settings['sec_title'])) : ?>
									<h2 class="sec-title__title"><?php echo wp_kses($settings['sec_title'], 'agriox_allowed_tags'); ?></h2>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if (!empty($settings['highlighted_text'])) : ?>
							<h2 class="about-one__content-title"><?php echo wp_kses($settings['highlighted_text'], 'agriox_allowed_tags'); ?></h2>
						<?php endif; ?>
						<?php if ($settings['summary']) : ?>
							<p class="about-one__content-text"><?php echo wp_kses($settings['summary'], 'agriox_allowed_tags'); ?></p>
						<?php endif; ?>
						<?php if (is_array($settings['check_list'])) : ?>
							<ul class="about-one__content-list list-unstyled">
								<?php foreach ($settings['check_list'] as $item) : ?>
									<li>
										<div class="icon">
											<i class="<?php echo esc_attr($item['icon']['value']); ?>" aria-hidden="true"></i>
										</div>
										<div class="text">
											<p><?php echo wp_kses($item['title'], 'agriox_allowed_tags'); ?></p>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<div class="about-one__content-video-box">
							<div class="about-one__content-video-box-img-wrapper">
								<div class="about-one__content-video-box-img">
									<img src="<?php echo esc_url($settings['video_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['video_image']['id'])); ?>" />
									<div class="icon">
										<a class="video-popup wow zoomIn animated animated animated" data-wow-delay="300ms" data-wow-duration="1500ms" title=" Video" href="<?php echo esc_url($settings['video_url']); ?>">
											<span class="icon-play-button-1"></span>
										</a>
									</div>
								</div>
							</div><!-- /.about-one__content-video-box-img-wrapper -->
							<?php if (!empty($settings['video_title']) || !empty($settings['video_sub_title'])) : ?>
								<div class="about-one__content-video-box-title">
									<p><?php echo wp_kses($settings['video_sub_title'], 'agriox_allowed_tags'); ?></p>
									<h3><?php echo wp_kses($settings['video_title'], 'agriox_allowed_tags'); ?></h3>
								</div>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<!--End About One Content-->
			</div>
		</div>
	</section>
	<!--About One End-->

<?php endif; ?>