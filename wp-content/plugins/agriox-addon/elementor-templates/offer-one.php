<section class="offer-one">
	<div class="container-fluid">
		<div class="row">
			<?php if (is_array($settings['offers'])) : ?>
				<?php foreach ($settings['offers'] as $offer) : ?>
					<div class="col-md-12 col-lg-4">
						<div class="offer-one__item wow fadeInLeft" data-wow-duration="1500ms" style="background-image: url(<?php echo esc_url($offer['image']['url']); ?>);">
							<p class="offer-one__tagline"><?php echo wp_kses($offer['sub_title'], 'agriox_allowed_tags'); ?></p>
							<h3 class="offer-one__title"><?php echo wp_kses($offer['title'], 'agriox_allowed_tags'); ?></h3>
							<a <?php echo esc_attr(!empty($offer['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($offer['button_url']['url']); ?>" class="offer-one__link">
								<i class="icon-right-arrow-2"></i>
								<?php echo esc_html($offer['button_label']); ?>
							</a><!-- /.offer-one__link -->
						</div><!-- /.offer-one__item -->
					</div><!-- /.col-md-12 col-lg-4 -->
				<?php endforeach; ?>
			<?php endif; ?>
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</section><!-- /.offer-one -->