<div class="home-showcase">
	<div class="container">
		<div class="home-showcase__inner">
			<div class="row">
				<?php if (is_array($settings['fancy_box'])) : ?>
					<?php foreach ($settings['fancy_box'] as $box) : ?>
						<div class="col-lg-3">
							<div class="home-showcase__single">
								<a <?php echo esc_attr(!empty($box['url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($box['url']['url']); ?>" class="home-showcase__image">
									<img src="<?php echo esc_url($box['image']['url']) ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($box['image']['id'])); ?>">
								</a><!-- /.home-showcase__image -->
								<h3 class="home-showcase__title"><a <?php echo esc_attr('on' === $box['url']['is_external'] ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($box['url']['url']); ?>"><?php echo esc_html($box['title']); ?></a>
								</h3>
							</div><!-- /.home-showcase -->
						</div><!-- /.col-lg-3 -->
					<?php endforeach; ?>
				<?php endif; ?>

			</div><!-- /.row -->
		</div><!-- /.home-showcase__inner -->
	</div><!-- /.container -->
</div>