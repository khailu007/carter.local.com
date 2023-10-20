<?php if ('layout_one' === $settings['layout_type']) : ?>

	<!--Services One Start-->
	<section class="services-one">
		<div class="services-one__bg wow slideInDown" data-wow-delay="100ms" data-wow-duration="2500ms"></div>
		<div class="container">
			<?php if (!empty($settings['title']) || !empty($settings['sub_title'])) : ?>
				<div class="sec-title text-center">
					<?php if (!empty($settings['icon_image']['url'])) : ?>
						<div class="icon">
							<img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
						</div>
					<?php endif; ?>
					<?php if (!empty($settings['sub_title'])) : ?>
						<span class="sec-title__tagline"><?php echo wp_kses($settings['sub_title'], 'agriox_allowed_tags'); ?></span>
					<?php endif; ?>
					<?php if (!empty($settings['title'])) : ?>
						<h2 class="sec-title__title"><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="row">
				<?php

				if (!empty($settings['select_category'])) :
					$service_one_post_query = new \WP_Query(array(
						'post_type' => 'service',
						'posts_per_page' => $settings['post_count']['size'],
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
						'tax_query' => array(
							array(
								'taxonomy' => 'service_cat',
								'field' => 'slug',
								'terms' => $settings['select_category']
							)
						)
					));

				else :

					$service_one_post_query = new \WP_Query(array(
						'post_type' => 'service',
						'posts_per_page' => $settings['post_count']['size'],
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
					));

				endif;

				while ($service_one_post_query->have_posts()) :
					$service_one_post_query->the_post();

				?>
					<!--Start Single Services One-->
					<div class="col-xl-3 col-lg-6 wow fadeInLeft" data-wow-delay="0ms">
						<div class="services-one__single">
							<div class="services-one__single-img">
								<div class="services-one__single-img-inner">
									<?php the_post_thumbnail('agriox_service_281X230'); ?>
								</div>
							</div>
							<div class="services-one__single-content text-center">
								<div class="services-one__single-img-icon">
									<?php
									$agriox_service_fontawesome = '';
									if ('yes' == get_post_meta(get_the_ID(), 'agriox_is_fontawesome', true)) {
										$agriox_service_fontawesome = get_post_meta(get_the_ID(), 'agriox_fontawesome_type', true);
									}
									?>
									<span class="<?php echo esc_attr(get_post_meta(get_the_iD(), 'agriox_select_service_icon', true) . ' ' . $agriox_service_fontawesome); ?>"></span>
								</div>
								<h3><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'agriox_allowed_tags'); ?></a></h3>
								<p><?php echo wp_kses(agriox_excerpt($settings['post_word_count']['size']), 'agriox_allowed_tags'); ?></p>
								<a href="<?php the_permalink(); ?>" class="read-more-btn"><span class="icon-right-arrow-2"></span></a>
							</div>
						</div>
					</div>
					<!--End Single Services One-->
				<?php endwhile;
				wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<!--Services One End-->

<?php endif; ?>