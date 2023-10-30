<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>

<div class="product-details">
	<div class="container">
		<div class="row clearfix">
			<!--Content Side-->
			<div class="content-side col-md-12 col-sm-12">
					<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action('woocommerce_before_main_content');
					?>

					<?php while (have_posts()) : ?>
						<?php the_post(); ?>

						<?php wc_get_template_part('content', 'single-product'); ?>

					<?php endwhile; // end of the loop.
					?>

					<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action('woocommerce_after_main_content');
					?>
			</div>

		</div>
	</div>
</div>

		<div class="container">
			<h3 class="heading-section"> Sản phấm liên quan</h3>
	            <div class="row">
								<?php woocommerce_product_loop_start(); ?>
				<?php
				    $terms = get_the_terms(get_the_ID(),'product_cat'); //Lấy danh sách các thành phần trong Category theo ID của sản phẩm hiện tại
				        //echo '<pre>';
				        //print_r($terms);
				    	//echo '/<pre>';
				    $current_term = $terms[0] ->slug; // Chọn phần từ đầu tiên trong mảng và lấy ra slug
				    if ($current_term) {
					    $args = array(
						        'product_cat' => $current_term,
						        'post__not_in' => array(get_the_ID()),
						        'showposts'=> 4, // Số bài viết bạn muốn hiển thị.
						        'caller_get_posts'=>1,
						        'post-type' => 'product',

					        );

					        $my_query = new wp_query($args);
					        if( $my_query->have_posts() ) 
					        {
					            while ($my_query->have_posts())
					            {
					                $my_query->the_post(); ?>
					                	<?php wc_get_template_part( 'content', 'product' );?>
					                <?php
					            }
					        }
				    }

				?>
			<?php woocommerce_product_loop_end(); ?>
				</div>
		</div>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
