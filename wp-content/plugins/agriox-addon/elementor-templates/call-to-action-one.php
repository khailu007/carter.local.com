<?php if ('layout_one' == $settings['layout_type']) : ?>

	<!--Cta One Start-->
	<section class="cta-one" style="background-image: url(<?php echo esc_attr($settings['background_image']['url']); ?>);">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="cta-one__wrapper">
						<div class="cta-one__left">
							<?php if (!empty($settings['title_icon']['value'])) : ?>
								<div class="cta-one__left-icon">
									<span class="<?php echo esc_attr($settings['title_icon']['value']); ?>"></span>
								</div>
							<?php endif; ?>
							<?php if (!empty($settings['title'])) : ?>
								<div class="cta-one__left-title">
									<h2><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
								</div>
							<?php endif; ?>
						</div>
						<?php if (!empty($settings['button_label'])) : ?>
							<div class="cta-one__right">
								<div class="cta-one__right-btn">
									<a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($settings['button_label']); ?></a>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Cta One End-->

<?php endif; ?>