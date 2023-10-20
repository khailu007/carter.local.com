<?php if ('layout_two' == $settings['layout_type']) : ?>

	<!--Meet Farmers One Start-->
	<section class="meet-farmers-one meet-farmers-one--about">
		<div class="container">
			<div class="row">
				<?php

				if (!empty($settings['select_category'])) :

					$team_post_query_args = array(
						'post_type' => 'team',
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
						'posts_per_page' => $settings['post_count']['size'],
						'tax_query' => array(
							array(
								'taxonomy' => 'team_cat',
								'field' => 'slug',
								'terms' => $settings['select_category']
							)
						)
					);

				else :

					$team_post_query_args = array(
						'post_type' => 'team',
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
						'posts_per_page' => $settings['post_count']['size']
					);

				endif;

				$team_post_query = new \WP_Query($team_post_query_args);
				?>
				<?php if ($team_post_query->have_posts()) : ?>
					<?php while ($team_post_query->have_posts()) : ?>
						<?php $team_post_query->the_post(); ?>
						<!--Start Single Meet Farmers One-->
						<div class="col-xl-4 col-lg-4  wow fadeInLeft" data-wow-delay="0ms">
							<div class="meet-farmers-one__single">
								<?php if (has_post_thumbnail()) : ?>
									<div class="meet-farmers-one__single-img">
										<?php the_post_thumbnail('agriox_team_two_370X391'); ?>
									</div>
								<?php endif; ?>
								<div class="meet-farmers-one__single-title text-center">
									<p><?php echo esc_html(get_post_meta(get_the_ID(), 'agriox_designation', true)); ?></p>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php $team_socials = get_post_meta(get_the_ID(), 'agriox_team_social', true); ?>
									<?php if (is_array($team_socials)) : ?>
										<div class="social-link">
											<ul class="list-unstyled">
												<?php foreach ($team_socials as $social) : ?>
													<li><a href="<?php echo esc_url($social['agriox_link']); ?>"><i class="fab <?php echo esc_attr($social['agriox_icon']); ?>"></i></a></li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<!--End Single Meet Farmers One-->
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<!--Meet Farmers One End-->

<?php endif; ?>