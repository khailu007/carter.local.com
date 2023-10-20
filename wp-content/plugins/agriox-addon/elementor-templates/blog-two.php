<?php if ('layout_two' == $settings['layout_type']) : ?>

	<!--Blog Two Start-->
	<section class="blog-two">
		<div class="container">
			<div class="row">
				<!--Start Blog Two Left-->
				<div class="col-xl-4">
					<div class="blog-two__left">
						<div class="blog-two__left-bg"></div>
						<div class="sec-title">
							<?php if (!empty($settings['icon_image']['url'])) : ?>
								<div class="icon">
									<img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
								</div>
							<?php endif; ?>
							<?php if (!empty($settings['sub_title'])) : ?>
								<span class="sec-title__tagline"><?php echo wp_kses($settings['sub_title'], 'agriox_allowed_tags'); ?></span>
							<?php endif; ?>
							<?php if (!empty($settings['title'])) :  ?>
								<h2 class="sec-title__title"><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
							<?php endif; ?>
						</div>
						<?php if (!empty($settings['content'])) :  ?>
							<p class="blog-two__left-text"><?php echo wp_kses($settings['content'], 'agriox_allowed_tags'); ?></p>
						<?php endif; ?>
						<div class="blog-two__carousel__custom-nav">
							<a href="#" class="left-btn"><span class="icon-right-arrow-2"></span></a>
							<a href="#" class="right-btn"><span class="icon-right-arrow-2"></span></a>
						</div><!-- /.blog-two__carousel__custom-nav -->
					</div>
				</div>
				<!--End Blog Two Left-->

				<!--Start Blog Two Right-->
				<div class="col-xl-8">
					<div class="blog-two__right">
						<div class="blog-two__carousel owl-carousel owl-theme thm-owl__carousel thm-owl__carousel--custom-nav" data-owl-nav-prev=".blog-two__carousel__custom-nav .left-btn" data-owl-nav-next=".blog-two__carousel__custom-nav .right-btn" data-owl-options='<?php echo agriox_get_owl_options($settings); ?>'>
							<?php
							$blog_post_two_query_args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'ignore_sticky_posts' => true,
								'orderby' => 'date',
								'order'   => $settings['query_order'],
								'posts_per_page' => $settings['post_count']['size']
							);

							$blog_post_two_query = new \WP_Query($blog_post_two_query_args);
							?>
							<?php while ($blog_post_two_query->have_posts()) :
								$blog_post_two_query->the_post(); ?>

								<!--Start Single Blog One-->
								<div class="blog-one__single">
									<?php if (has_post_thumbnail()) : ?>
										<div class="blog-one__single-img">
											<?php the_post_thumbnail('agriox_blog_two_373X273'); ?>
											<div class="date-box">
												<span><?php the_time('d M, Y'); ?></span>
											</div>
											<div class="overlay-icon">
												<a href="<?php the_permalink(); ?>"><span class="icon-plus"></span></a>
											</div>
										</div>
									<?php endif; ?>
									<div class="blog-one__single-content">
										<ul class="meta-info list-unstyled">
											<li><?php agriox_posted_by(); ?></li>
											<?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
												<li><?php agriox_comment_count(); ?></li>
											<?php endif; ?>
										</ul>
										<h2><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'agriox_allowed_tags'); ?></a></h2>
									</div>
								</div>
								<!--End Single Blog One-->
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
				<!--End Blog Two Right-->
			</div>
		</div>
	</section>
	<!--Blog Two End-->

<?php endif; ?>