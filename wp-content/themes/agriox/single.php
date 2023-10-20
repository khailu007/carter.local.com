<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package agriox
 */

get_header();
?>

<!--Blog Sidebar Start-->
<section class="news-details">
	<div class="container">
		<div class="row">
			<?php $agriox_content_class = (is_active_sidebar('sidebar-1')) ? "col-xl-8 col-lg-7" : "col-xl-12 col-lg-12" ?>
			<div class="<?php echo esc_attr($agriox_content_class); ?>">
				<div class="news-details__left">
					<div id="primary" class="site-main">

						<?php
						while (have_posts()) :
							the_post();

							get_template_part('template-parts/content', get_post_type());


							// If comments are open or we have at least one comment, load up the comment template.
							if (comments_open() || get_comments_number()) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

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
