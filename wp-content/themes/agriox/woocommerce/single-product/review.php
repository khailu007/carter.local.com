<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $comment;
?>
<div <?php comment_class( ' product-review__item ' ); ?> id="li-comment-<?php comment_ID(); ?>">
	<div class="product-review__item__image">
		<?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '160' ), '' ); ?>
	</div><!-- /.product-review__item__image -->
	<?php if ( '0' === $comment->comment_approved ) { ?>
		<div class="product-review__item__content">
			<p class="meta">
				<em class="woocommerce-review__awaiting-approval">
					<?php esc_html_e( 'Your review is awaiting approval', 'agriox' ); ?>
				</em>
			</p>
		</div>
	<?php }else{ ?>
		<div class="product-review__item__content">
			<div class="product-review__item__star">
				<?php wc_get_template( 'single-product/review-rating.php' ); ?>
			</div><!-- /.product-review__item__star -->
			<h3 class="product-review__item__title"><?php comment_author(); ?></h3>
			<div class="product-review__item__meta">
			<?php echo esc_html( get_comment_date( wc_date_format() ) ); ?>
			</div><!-- /.product-review__item__meta -->
			<p class="product-review__item__text"><?php comment_text() ?></p>
			<!-- /.product-review__item__text -->
		</div><!-- /.product-review__item__content -->

	<?php } ?>
</div><!-- /.product-review__item -->
