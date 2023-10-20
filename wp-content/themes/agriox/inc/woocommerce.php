<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package agriox
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function agriox_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 270,
			'single_image_width'    => 570,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'agriox_woocommerce_setup');


/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function agriox_woocommerce_scripts()
{
	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style('agriox-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'agriox_woocommerce_scripts');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function agriox_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'agriox_woocommerce_active_body_class');


add_filter('woocommerce_get_image_size_thumbnail', 'agriox_woocommerce_get_image_size_thumbnail');

function agriox_woocommerce_get_image_size_thumbnail($size)
{
	return array(
		'width'  => 270,
		'height' => 320,
		'crop'   => 1,
	);
}

add_filter('woocommerce_checkout_fields', 'agriox_billing_checkout_fields', 20, 1);
function agriox_billing_checkout_fields($fields)
{
	$fields['billing']['billing_first_name']['placeholder'] = esc_html__('First Name', 'agriox');
	$fields['billing']['billing_last_name']['placeholder'] = esc_html__('Last Name', 'agriox');
	$fields['billing']['billing_company']['placeholder'] = esc_html__('Company name (optional)', 'agriox');
	$fields['billing']['billing_city']['placeholder'] = esc_html__('Town / City', 'agriox');
	$fields['billing']['billing_postcode']['placeholder'] = esc_html__('ZIP Code', 'agriox');
	$fields['billing']['billing_phone']['placeholder'] = esc_html__('Phone', 'agriox');
	$fields['billing']['billing_email']['placeholder'] = esc_html__('Email', 'agriox');
	return $fields;
}

add_filter('woocommerce_checkout_fields', 'agriox_shipping_checkout_fields', 20, 1);
function agriox_shipping_checkout_fields($fields)
{
	$fields['shipping']['shipping_first_name']['placeholder'] = esc_html__('First Name', 'agriox');
	$fields['shipping']['shipping_last_name']['placeholder'] = esc_html__('Last Name', 'agriox');
	$fields['shipping']['shipping_company']['placeholder'] = esc_html__('Company name (optional)', 'agriox');
	return $fields;
}


// WooCommerce Checkout Fields Hook
add_filter('woocommerce_checkout_fields', 'agriox_checkout_fields_no_label');

// Our hooked in function - $fields is passed via the filter!
// Action: remove label from $fields
function agriox_checkout_fields_no_label($fields)
{
	// loop by category
	foreach ($fields as $category => $value) {
		// loop by fields
		foreach ($fields[$category] as $field => $property) {
			// remove label property
			unset($fields[$category][$field]['label']);
		}
	}
	return $fields;
}

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */

add_filter('woocommerce_enqueue_styles', '__return_empty_array');


//shop page
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);



add_action('woocommerce_before_shop_loop_item_title', 'agriox_thumbnail_markup_open', 10);

add_action('woocommerce_before_shop_loop_item_title', 'agriox_show_product_loop_sale_flash', 10);

add_action('woocommerce_before_shop_loop_item_title', 'agriox_template_loop_product_thumbnail', 10);

add_action('woocommerce_before_shop_loop_item_title', 'agriox_thumbnail_markup_end', 10);

add_action('woocommerce_shop_loop_item_title', 'agriox_product_title_markup_start', 10);

add_action('woocommerce_shop_loop_item_title', 'agriox_product_title', 10);

add_action('woocommerce_shop_loop_item_title', 'agriox_template_loop_price', 10);

add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);


add_action('woocommerce_after_shop_loop_item', 'agriox_product_title_markup_end', 10);

function agriox_thumbnail_markup_open()
{ ?>
	<div class="shop-one__image">

		<?php }

	function agriox_show_product_loop_sale_flash()
	{
		global $product;
		if ($product->is_on_sale()) : ?>
			<span class="shop-one__sale"><?php esc_html_e('sale', 'agriox'); ?></span><!-- /.shop-one__sale -->
		<?php endif;
	}

	function agriox_template_loop_product_thumbnail()
	{
		global $product;
		if (function_exists('woocommerce_template_loop_product_thumbnail')) :
			woocommerce_template_loop_product_thumbnail();
		endif; ?>
		<div class="agriox-overlay">
			<div class="cv-spinner">
				<span class="spinner"></span>
			</div>
		</div>
		<?php
		$agriox_ajax_cart_class = (get_option('woocommerce_enable_ajax_add_to_cart') == 'yes' ? 'agriox_ajax' : '');
		if ($product->is_type('variable')) {
			echo sprintf(
				'<a href="%s" class="%s">%s</a>',
				esc_url($product->add_to_cart_url()),
				esc_attr(implode(' ', array_filter(array(
					'button', 'product_type_' . $product->get_type(),
					'shop-one__cart add_to_cart_button'
				)))),
				'<i class=" icon-shopping-cart"></i>'
			);
		} else {
			echo sprintf(
				'<a href="%s" data-quantity="1" class="%s" %s>%s</a>',
				esc_url($product->add_to_cart_url()),
				esc_attr(implode(' ', array_filter(array(
					'button', 'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart shop-one__cart' : 'shop-one__cart',
					$agriox_ajax_cart_class
				)))),
				wc_implode_html_attributes(array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				)),
				'<i class=" icon-shopping-cart"></i>'
			);
		}
		?>
	<?php
	}

	function agriox_thumbnail_markup_end()
	{ ?>
	</div>
<?php }

	function agriox_product_title_markup_start()
	{ ?>
	<div class="shop-one__content text-center">
	<?php }

	function agriox_product_title()
	{ ?>
		<h3 class="shop-one__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php }


	function agriox_template_loop_price()
	{
		global $product;
	?>
		<p class="shop-one__price"><?php echo wp_kses_post($product->get_price_html()); ?></p><!-- /.shop-one__price -->
	<?php }


	function agriox_product_title_markup_end()
	{ ?>
	</div>
<?php }


	//single page

	remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
	remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);




	add_action('woocommerce_single_product_summary', 'agriox_product_details_title_markup_start');
	function agriox_product_details_title_markup_start()
	{ ?>
	<div class="product-details__content__top">
	<?php
	}

	add_action('woocommerce_single_product_summary', 'agriox_template_single_title');
	function agriox_template_single_title()
	{
		the_title('<h3 class="product-details__content__name">', '</h3>');
	}

	add_action('woocommerce_single_product_summary', 'agriox_template_single_price');
	function agriox_template_single_price()
	{
		global $product;
	?>
		<p class="product-details__content__price"><?php echo wp_kses_post($product->get_price_html()); ?></p>

	<?php
	}


	add_action('woocommerce_single_product_summary', 'agriox_product_details_title_markup_end');
	function agriox_product_details_title_markup_end()
	{ ?>
	</div>
<?php
	}




	add_action('woocommerce_single_product_summary', 'agriox_template_single_rating');
	function agriox_template_single_rating()
	{
?>
	<div class="product-details__content__rating">
		<?php wc_get_template('single-product/rating.php'); ?>
	</div>

<?php
	}

	add_action('woocommerce_single_product_summary', 'agriox_template_single_excerpt');
	function agriox_template_single_excerpt()
	{
?>
	<div class="product-details__content__text">
		<?php wc_get_template('single-product/short-description.php'); ?>
	</div>

<?php
	}


	add_action('woocommerce_before_add_to_cart_quantity', 'agriox_add_to_cart_input_markup_start');

	function agriox_add_to_cart_input_markup_start()
	{ ?>
	<div class="product-details__content__quantity">
		<div class="product-details__content__quantity__text"><?php esc_html_e('Choose Quantity', 'agriox'); ?></div>
		<!-- /.product-details__content__quantity__text -->
	<?php }

	add_action('woocommerce_after_add_to_cart_quantity', 'agriox_add_to_cart_input_markup_end');

	function agriox_add_to_cart_input_markup_end()
	{ ?>
	</div>

<?php }
	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart');

	add_action('woocommerce_after_add_to_cart_button', 'agriox_wishlist');
	function agriox_wishlist()
	{
		if (function_exists('yith_wishlist_constructor')) :
			echo do_shortcode('[yith_wcwl_add_to_wishlist ]');
		endif;
	}

	//social share
	add_action('woocommerce_single_product_summary', 'agriox_product_details_social_share');
	function agriox_product_details_social_share()
	{
		global $post;
		//get current page url
		$agriox_url = urlencode_deep(get_permalink());
		//get current page title
		$agriox_title = str_replace(' ', '%20', get_the_title($post->ID));
		//get post thumbnail for pinterest
		$agriox_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

		//all social share link generate
		$facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $agriox_url;
		$twitter_share_link = 'https://twitter.com/intent/tweet?text=' . $agriox_title . '&amp;url=' . $agriox_url . '&amp;via=Crunchify';;
		$linkedin_share_link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $agriox_url . '&amp;title=' . $agriox_title;;
		$pinterest_share_link = 'https://pinterest.com/pin/create/button/?url=' . $agriox_url . '&amp;media=' . $agriox_thumbnail[0] . '&amp;description=' . $agriox_title;

?>
	<div class="product-details__content__social">
		<div class="product-details__content__social__text"><?php esc_html_e('Share with friends', 'agriox'); ?></div>
		<!-- /.product-details__content__social__text -->
		<a href="<?php echo esc_url($facebook_share_link); ?>" class="fab fa-facebook"></a>
		<a href="<?php echo esc_url($twitter_share_link); ?>" class="fab fa-twitter"></a>
		<a href="<?php echo esc_url($linkedin_share_link); ?>" class="fab fa-linkedin"></a>
		<a href="<?php echo esc_url($pinterest_share_link); ?>" class="fab fa-pinterest-p"></a>
	</div>
<?php
	}


	add_action('woocommerce_after_single_product', 'agriox_product_content');

	function agriox_product_content()
	{ ?>
	<section class="product-content">
		<div class="container">
			<h2 class="product-content__title"><?php esc_html_e('Description', 'agriox'); ?></h2><!-- /.product-content__title -->
			<?php the_content(); ?>
		</div><!-- /.container -->
	</section><!-- /.product-content -->
<?php }

	function agriox_register_fields()
	{ ?>
	<p class="form-row form-row-first">
		<label for="reg_billing_first_name"><?php esc_html_e('First name', 'agriox'); ?><span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) echo esc_attr($_POST['billing_first_name']); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="reg_billing_last_name"><?php esc_html_e('Last name', 'agriox'); ?><span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) echo esc_attr($_POST['billing_last_name']); ?>" />
	</p>
	<div class="clear"></div>
<?php
	}
	add_action('woocommerce_register_form_start', 'agriox_register_fields');
