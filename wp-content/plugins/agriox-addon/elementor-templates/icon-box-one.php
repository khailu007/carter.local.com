<section class="features-four">
	<div class="container-fluid">
		<div class="features-four__inner wow fadeInUp" data-wow-duration="1500ms">

			<div class="row">
				<?php if (is_array($settings['icon_box'])) : ?>
					<?php foreach ($settings['icon_box'] as $box) : ?>
						<div class="col-lg-6 col-xl-3">
							<div class="features-four__item icon-svg-large">
								<?php \Elementor\Icons_Manager::render_icon($box['icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?>
								<div class="features-four__content">
									<h3 class="features-four__title"><?php echo esc_html($box['title']); ?></h3>
									<p class="features-four__text"><?php echo wp_kses($box['text'], 'agriox_allowed_tags'); ?></p>
									<!-- /.features-four__text -->
								</div><!-- /.features-four__content -->
							</div><!-- /.features-four__item -->
						</div><!-- /.col-lg-6 col-lg-3 -->
					<?php endforeach; ?>
				<?php endif; ?>
			</div><!-- /.row -->
		</div><!-- /.features-four__inner -->
	</div><!-- /.container-fluid -->
</section><!-- /.features-four -->