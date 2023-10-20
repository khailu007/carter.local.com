<?php if ('layout_three' === $settings['layout_type']) : ?>
	<section class="main-slider main-slider-one main-slider-three">
		<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": <?php echo esc_attr($settings['items']['size']); ?>,
			 "loop": <?php echo esc_attr(('yes' == $settings['loop']) ? 'true' : 'false'); ?>, 
			 "effect": "fade", "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
            },
            "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
            "delay": <?php echo esc_attr($settings['delay']['size']); ?>
            }}'>

			<div class="swiper-wrapper">
				<?php foreach ($settings['sliders'] as $slider) : ?>
					<!--Start Single Swiper Slide-->
					<div class="swiper-slide">
						<div class="image-layer" style="background-image: url(<?php echo esc_url($slider['background_image']['url']); ?>);">
						</div>
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="main-slider-inner">
										<div class="main-slider__content">
											<span class="main-slider-tagline"><?php echo wp_kses($slider['sub_title'], 'agriox_allowed_tags'); ?></span>
											<h2 class="main-slider__title"><?php echo wp_kses($slider['title'], 'agriox_allowed_tags'); ?></h2>

										</div>
										<div class="main-slider__button-box"><a <?php echo esc_attr(!empty($slider['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($slider['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($slider['button_label']); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--End Single Swiper Slide-->
				<?php endforeach; ?>

			</div>
			<?php if ('yes' == $settings['enable_dots']) : ?>
				<!-- If we need navigation buttons -->
				<div class="swiper-pagination" id="main-slider-pagination"></div>
			<?php endif; ?>
			<?php if ('yes' == $settings['enable_nav']) : ?>
				<div class="main-slider__nav">
					<div class="swiper-button-prev icon-svg" id="main-slider__swiper-button-next">
						<?php \Elementor\Icons_Manager::render_icon($settings['nav_left_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
					</div>
					<div class="swiper-button-next icon-svg" id="main-slider__swiper-button-prev">
						<?php \Elementor\Icons_Manager::render_icon($settings['nav_right_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php endif; ?>