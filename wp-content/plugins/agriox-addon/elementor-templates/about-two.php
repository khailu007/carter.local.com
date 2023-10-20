<?php if ('layout_two' == $settings['layout_type']) : ?>
	<!--Providing Quality One Start-->
	<section class="providing-quality-one clearfix">
		<?php if (!empty($settings['bg_shape_image'])) : ?>
			<div class="providing-quality-one__bg"><img src="<?php echo esc_url($settings['bg_shape_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['bg_shape_image']['id'])); ?>" /></div>
		<?php endif; ?>

		<div class="providing-quality-one__shape"></div><!-- /.providing-quality-one__shape -->
		<div class="container-fullwidth">
			<div class="row">

				<!--Start Providing Quality One Img-->
				<div class="col-xl-6 providing-quality-one__image-block clearfix">
					<div class="providing-quality-one__image__line float-bob-y"></div>
					<!-- /.providing-quality-one__image__line -->
					<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>">
					<?php if (!empty($settings['logo']['url'])) : ?>
						<div class="providing-quality-one__logo">
							<img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['logo']['id'])); ?>" />
						</div>
					<?php endif; ?>
				</div>
				<!--End Providing Quality One Img-->

				<!--Start Providing Quality One Content Box-->
				<div class="col-xl-6">
					<div class="providing-quality-one__content-box">
						<?php if (!empty($settings['sec_title']) || !empty($settings['sec_subtitle'])) : ?>
							<div class="sec-title">
								<?php if (!empty($settings['icon_image']['url'])) : ?>
									<div class="icon">
										<img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
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
						<ul class="providing-quality-one__content-box-list list-unstyled">
							<?php foreach ($settings['feature_box'] as $item) : ?>
								<li class="providing-quality-one__content-box-list-item">
									<div class="icon icon-svg">
										<?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?>
									</div>
									<div class="text">
										<h3><?php echo esc_html($item['title']); ?></h3>
										<p><?php echo wp_kses($item['text'], 'agriox_allowed_tags'); ?></p>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<!--End Providing Quality One Content Box-->
			</div>
		</div>
	</section>
	<!--Providing Quality One End-->
<?php endif; ?>