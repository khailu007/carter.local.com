<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agriox
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!--Start Single Blog One-->
  <div class="blog-one__single clearfix">
		<div class="blog-one__single-img">
			<?php agriox_post_thumbnail(); ?>
		</div>
		<div class="blog-one__single-content blog-details news-details__content">
			<ul class="meta-info list-unstyled">
				<li><?php agriox_posted_on(); ?></li>
				<li><?php agriox_posted_by(); ?></li>
				<?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
               		<li><?php agriox_comment_count(); ?></li>
           		 <?php endif; ?>
			</ul>
			<!-- Begin Custom h1 in Single Blog One-->
			<h1>
				<?php if (!is_page()) : ?>
					<?php agriox_page_title(); ?>
				<?php else : ?>
					<?php echo wp_kses($agriox_page_title_text, 'agriox_allowed_tags') ?>
				<?php endif; ?>
			</h1>
			<!-- End Custom h1 in Single Blog One-->
			<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'agriox'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post(get_the_title())
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'agriox'),
						'after'  => '</div>',
					)
				);
			?>
		</div>
	</div>
	<!--End Single Blog One-->

	<div class="tag-social-link">
	   <?php agriox_entry_footer(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->