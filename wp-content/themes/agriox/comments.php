<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agriox
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<h3 class="comment-one__title">
			<?php
			$agriox_comment_count = get_comments_number();
			if ('1' === $agriox_comment_count) {
				printf(
					/* translators: 1: title. */
					esc_html__('One thought on &ldquo;%1$s&rdquo;', 'agriox'),
					'<span>' . wp_kses_post(get_the_title()) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $agriox_comment_count, 'comments title', 'agriox')),
					number_format_i18n($agriox_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post(get_the_title()) . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->



		<ul class="comment-list">
			<?php
			wp_list_comments(array(
				'style'      => 'ul',
				'avatar_size' => 90,
				'short_ping' => true,
			));
			?>
		</ul><!-- .comment-list -->

		<div class="blog-pagination">
			<?php
			paginate_comments_links(array(
				'prev_text' => '<i class="fa fa-angle-left"></i>',
				'next_text' => '<i class="fa fa-angle-right"></i>'
			));
			?>
		</div><!-- /.blog-pagination -->

		<?php

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'agriox'); ?></p>
	<?php
		endif;

	endif; // Check for have_comments().

	$agriox_commenter = wp_get_current_commenter();
	$agriox_comment_fields =  array(
		'author' => '<div class="col-md-6 name-field"> <div class="comment-form__input-box"> <input type="text"  name="author" id="name" value="' . esc_attr($agriox_commenter['comment_author']) . '" placeholder="' . esc_attr__('Your name *', 'agriox') . '" > </div> </div>',
		'email'	=> '<div class="col-md-6 email-field"> <div class="comment-form__input-box"> <input type="email"  name="email" id="email" value="' . esc_attr($agriox_commenter['comment_author_email']) . '" placeholder="' . esc_attr__('Email address *', 'agriox') . '" > </div> </div>',
		'url'	=> '<div class="col-md-12 "> <div class="comment-form__input-box"> <input type="text"  name="url" value="' . esc_attr($agriox_commenter['comment_author_url']) . '" placeholder="' . esc_attr__('Website (Optional)', 'agriox') . '"> </div> </div>',
	);
	$agriox_comments_args = array(
		'fields'                => apply_filters('comment_form_default_fields', $agriox_comment_fields),
		'class_form'            => 'reply-form row',
		'class_submit'          => 'agriox comment-form__btn',
		'title_reply_before'    => '<h2 class="comment-form__title">',
		'title_reply'           => esc_html__('Leave a Comment', 'agriox'),
		'title_reply_after'     => '</h2>',
		'comment_notes_before'  => '',
		'comment_field'         => '<div class="col-md-12 "> <div class="comment-form__input-box"> <textarea name="comment" id="comment" class="message" placeholder="' . esc_attr__('Comment', 'agriox') . '"></textarea> </div> </div>',
		'comment_notes_after'   => '',
		'submit_button'   => '<button type="submit" class="thm-btn comment-form__btn">'.esc_html__( 'Submit
		comment', 'agriox' ).'</button>',
	);
	comment_form($agriox_comments_args);
	?>

</div><!-- #comments -->