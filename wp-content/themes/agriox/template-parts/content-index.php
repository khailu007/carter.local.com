<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agriox
 */

?>
<?php
	$postType = get_post_type( get_the_ID() );
	if($postType == 'product'):
?>
	<div class="col-lg-3 col-md-3 col-12">
		<article id="post-<?php the_ID(); ?>" <?php post_class('news-sidebar__content-single'); ?>>	
			<div class="blog-one__single">
				<?php if( has_post_thumbnail() ) : ?>
					<div class="shop-one__image">
						<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
							<?php woocommerce_template_loop_product_thumbnail(); ?>	
						</a>
					</div>
				<?php endif; ?>

				<div class="shop-one__content text-center">
					<div class="shop-one__title fw-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Xem tiếp', 'agriox' ); ?></a>
				</div>
			</div>
		</article>
	</div>
<?php
	endif;
?>