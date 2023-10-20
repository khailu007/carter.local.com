<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agriox
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-sidebar__content-single'); ?>>

	<div class="blog-one__single">
		<?php if( has_post_thumbnail() ) : ?>
			<div class="blog-one__single-img">

			<?php agriox_post_thumbnail(); ?>

				<div class="overlay-icon">
					<a href="<?php the_permalink(); ?>"><span class="icon-plus"></span></a>
				</div>
			</div>
		<?php endif; ?>

		<div class="blog-one__single-content blog-details">
			<ul class="meta-info list-unstyled">
				<li><?php agriox_posted_on(); ?></li>
				<li><?php agriox_posted_by(); ?></li>
				<?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
                  <li><?php agriox_comment_count(); ?></li>
            	<?php endif; ?>
			</ul>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php $agriox_excerpt_count = apply_filters('agriox_excerpt_count', 39); ?>
			<p><?php agriox_excerpt($agriox_excerpt_count); ?></p>
			<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'agriox' ); ?></a>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->