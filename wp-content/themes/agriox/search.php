<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agriox
 */

get_header();
?>

<!--Blog Sidebar Start-->
<section class="news-sidebar">
	<div class="container">
		<div class="row">
			<h1>
				<?php if (!is_page()) : ?>
					<?php agriox_page_title(); ?>
				<?php else : ?>
					<?php echo wp_kses($agriox_page_title_text, 'agriox_allowed_tags') ?>
				<?php endif; ?>
			</h1>
			<div class="col-lg-12 col-md-12 col-12">
				<div class="news-sidebar__left">
					<div id="primary" class="site-main">
						<div class="row">
							<?php
							if (have_posts()) :

								/* Start the Loop */
								while (have_posts()) :
									the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part('template-parts/content', 'index');

								endwhile;

							?>

								<div class="row">
									<div class="col-lg-12">
										<div class="blog-pagination">
											<?php agriox_pagination(); ?>
										</div><!-- /.blog-pagination -->
									</div><!-- /.col-lg-12 -->
								</div><!-- /.row -->

							<?php

							else :

								get_template_part('template-parts/content', 'none');

							endif;
							?>
						</div>
					</div><!-- #main -->
				</div>
			</div>
			<?php if (is_active_sidebar('sidebar-1')) : ?>
				<div class="col-xl-4 col-lg-5 <?php echo esc_attr(agriox_blog_layout()); ?>">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<!--Blog Sidebar End-->

<?php
get_footer();
