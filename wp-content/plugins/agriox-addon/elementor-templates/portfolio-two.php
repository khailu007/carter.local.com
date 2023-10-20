<?php if ('layout_two' == $settings['layout_type']) : ?>
	<!--Projects One Start-->
	<section class="projects-one projects-one--two">
		<div class="container">
			<?php if (!empty($settings['title']) || !empty($settings['sub_title'])) : ?>
				<div class="sec-title text-center">
					<?php if (!empty($settings['icon_image']['url'])) : ?>
						<div class="icon">
							<img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="">
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
				<div class="col-xl-12">
					<div class="projects-two__carousel owl-carousel owl-theme owl-dot-type1 thm-owl__carousel" data-owl-options='<?php echo agriox_get_owl_options($settings); ?>'>
						<?php
						if (!empty($settings['select_category'])) :

							$project_query = new \WP_Query(array(
								'post_type' => 'portfolio',
								'posts_per_page' => $settings['post_count']['size'],
								'orderby' => 'menu_order date',
								'order'   => $settings['query_order'],
								'tax_query' => array(
									array(
										'taxonomy' => 'portfolio_cat',
										'field' => 'slug',
										'terms' => $settings['select_category']
									)
								)
							));

						else :

							$project_query = new \WP_Query(array(
								'post_type' => 'portfolio',
								'posts_per_page' => $settings['post_count']['size'],
								'orderby' => 'menu_order date',
								'order'   => $settings['query_order'],
							));

						endif;
						?>
						<?php while ($project_query->have_posts()) : ?>
							<?php $project_query->the_post(); ?>
							<!--Start Single Projects One-->
							<div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
								<div class="projects-one__single-img">
									<?php the_post_thumbnail('agriox_portfolio_two_370X441'); ?>
									<div class="overlay-content">
										<?php $terms = get_the_terms(get_the_id(), 'portfolio_cat'); ?>
										<p>
											<?php foreach ($terms as $term) {
												echo esc_html($term->name);
												break;
											} ?>
										</p>
										<h3><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'agriox_allowed_tags'); ?></a></h3>
									</div>
								</div>
							</div>
							<!--End Single Projects One-->
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Projects One End-->
<?php endif; ?>