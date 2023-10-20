<?php

/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined('ABSPATH') || exit;

global $product;

if (!comments_open()) {
	return;
}
?>
<section class="product-review">
	<div class="container">
		<div id="reviews" class="woocommerce-Reviews">
			<div id="comments">
				<h2 class="product-content__title">
					<?php
					$count = $product->get_review_count();
					if ($count && wc_review_ratings_enabled()) {
						/* translators: 1: reviews count 2: product name */
						$reviews_title = sprintf(esc_html(_n('%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'agriox')), esc_html($count), '<span>' . get_the_title() . '</span>');
						echo apply_filters('woocommerce_reviews_title', $reviews_title, $count, $product); // WPCS: XSS ok.
					} else {
						esc_html_e('Reviews', 'agriox');
					}
					?>
				</h2>

				<?php if (have_comments()) : ?>

					<?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>

					<?php
					if (get_comment_pages_count() > 1 && get_option('page_comments')) :
						echo '<nav class="woocommerce-pagination">';
						paginate_comments_links(
							apply_filters(
								'woocommerce_comment_pagination_args',
								array(
									'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
									'next_text' => is_rtl() ? '&larr;' : '&rarr;',
									'type'      => 'list',
								)
							)
						);
						echo '</nav>';
					endif;
					?>
				<?php else : ?>
					<p class="woocommerce-noreviews"><?php esc_html_e('There are no reviews yet.', 'agriox'); ?></p>
				<?php endif; ?>
			</div>

			<?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>
				<div id="review_form_wrapper">
					<div id="review_form">
						<?php
						$agriox_commenter = wp_get_current_commenter();
						$agriox_comment_fields =  array(
							'author' => '<div class="row"><div class="col-md-6 name-field"> <div class="comment-form__input-box"> <input type="text"  name="author" id="name" value="' . esc_attr($agriox_commenter['comment_author']) . '" placeholder="' . esc_attr__('Your name *', 'agriox') . '" > </div> </div>',
							'email'	=> '<div class="col-md-6 email-field"> <div class="comment-form__input-box"> <input type="email"  name="email" id="email" value="' . esc_attr($agriox_commenter['comment_author_email']) . '" placeholder="' . esc_attr__('Email address *', 'agriox') . '" > </div> </div></div>',
						);

						$commenter    = wp_get_current_commenter();
						$comment_form = array(
							'fields'                => apply_filters('comment_form_default_fields', $agriox_comment_fields),
							/* translators: %s is product title */
							'title_reply'         => have_comments() ? esc_html__('Add a review', 'agriox') : sprintf(esc_html__('Be the first to review &ldquo;%s&rdquo;', 'agriox'), get_the_title()),
							/* translators: %s is product title */
							'title_reply_to'      => esc_html__('Leave a Reply to %s', 'agriox'),
							'title_reply_before'  => '<h3 id="reply-title" class="product-content__title">',
							'title_reply_after'   => '</h3>',
							'comment_notes_after' => '',
							'label_submit'        => esc_html__('Submit', 'agriox'),
							'logged_in_as'        => '',
							'comment_field'       => '',
							'submit_button'       => '<button type="submit" class="thm-btn comment-form__btn">' . esc_html__('Submit
								comment', 'agriox') . '</button>'
						);

						$account_page_url = wc_get_page_permalink('myaccount');
						if ($account_page_url) {
							/* translators: %s opening and closing link tags respectively */
							$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(esc_html__('You must be %1$slogged in%2$s to post a review.', 'agriox'), '<a href="' . esc_url($account_page_url) . '">', '</a>') . '</p>';
						}

						if (wc_review_ratings_enabled()) {
							$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating" class="rate-this-pro" >' . esc_html__('Rate this Product?', 'agriox') . (wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '') . '</label><select name="rating" id="rating" required>
									<option value="">' . esc_html__('Rate&hellip;', 'agriox') . '</option>
									<option value="5">' . esc_html__('Perfect', 'agriox') . '</option>
									<option value="4">' . esc_html__('Good', 'agriox') . '</option>
									<option value="3">' . esc_html__('Average', 'agriox') . '</option>
									<option value="2">' . esc_html__('Not that bad', 'agriox') . '</option>
									<option value="1">' . esc_html__('Very poor', 'agriox') . '</option>
								</select></div>';
						}

						$comment_form['comment_field'] .= '<div class="row">
										<div class="col-xl-12">
										<div class="comment-form__input-box">
											<textarea name="comment" placeholder="' . esc_attr__('Write message', 'agriox') . '*"></textarea>
										</div>
									</div>
									</div>';

						comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
						?>
					</div>
				</div>
			<?php else : ?>
				<p class="woocommerce-verification-required"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'agriox'); ?></p>
			<?php endif; ?>

			<div class="clear"></div>
		</div>
	</div>
</section>