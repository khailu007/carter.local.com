<?php if ('layout_five' == $settings['layout_type']) : ?>
	<!--Cta One Start-->
	<section class="cta-one cta-one__boxed">
		<div class="cta-one__background jarallax" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>);" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"></div><!-- /.cta-one__background -->
		<div class="container">
			<div class="cta-one__boxed__inner">
				<div class="row">
					<div class="col-xl-12">
						<div class="cta-one__wrapper">
							<div class="cta-one__left">
								<div class="cta-one__left-title">
									<h2><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
								</div>
							</div>
							<div class="cta-one__right">
								<div class="cta-one__right-btn">
									<a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo wp_kses($settings['button_label'], 'agriox_allowed_tags'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.cta-one__boxed__inner -->
		</div>
	</section>
	<!--Cta One End-->
<?php endif; ?>