<?php if ('layout_three' == $settings['layout_type']) : ?>
	<!--Projects One Start-->
	<section class="projects-one projects-one--two projects-one--two--projects <?php echo esc_attr(empty($settings['button_text']) ? "projects-one__no-buttons" : ""); ?>">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="projects-one--two--projects__wrapper">
						<div class="row">
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
								<div class="col-xl-4 col-lg-4 col-md-6">
									<div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
										<div class="projects-one__single-img">
											<?php the_post_thumbnail('agriox_portfolio_three_370X408'); ?>
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
								</div>
								<!--End Single Projects One-->
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
						<?php if (!empty($settings['button_text'])) : ?>
							<div class="projects-one--two--projects__btn text-center">
								<a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($settings['button_text']); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Projects One End-->
<?php endif; ?>