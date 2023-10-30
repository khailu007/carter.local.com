<section class="shop-one">
	<div class="container">
		<?php if( !empty( $settings[ 'title' ] ) || !empty( $settings[ 'sub_title' ] ) ) : ?>
			<div class="sec-title text-center">
				<?php if( !empty( $settings[ 'icon_image' ][ 'url' ] ) ) : ?>
					<div class="icon">
						<img src="<?php echo esc_url( $settings[ 'icon_image' ][ 'url' ] ); ?>" alt="">
					</div>
				<?php endif; ?>
				<?php if( !empty( $settings[ 'sub_title' ] ) ) : ?>
					<span class="sec-title__tagline"><?php echo wp_kses( $settings[ 'sub_title' ], 'agriox_allowed_tags' ); ?></span>
				<?php endif; ?>
				<?php if( !empty( $settings[ 'title' ] ) ) : ?>
				  <h2 class="sec-title__title"><?php echo wp_kses( $settings[ 'title' ], 'agriox_allowed_tags' ); ?></h2>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="row">
		<?php
			if (!empty($settings['select_category'])) :
				$shop_post_query = new \WP_Query(array(
					'post_type' => 'product',
					'posts_per_page' => $settings['post_count']['size'],
					'orderby' => 'menu_order title',
					'order'   => $settings['query_order'],
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'term_id',
							'terms' => $settings['select_category']
						)
					)
				));

			else :

				$shop_post_query = new \WP_Query(array(
					'post_type' => 'product',
					'posts_per_page' => $settings['post_count']['size'],
					'orderby' => 'menu_order title',
					'order'   => $settings['query_order'],
				));

			endif;

			while ($shop_post_query->have_posts()) :
			$shop_post_query->the_post(); 
			global $product;
			$price = get_post_meta( get_the_ID(), '_price', true ); 
			?>
				<div class="col-md-6 col-lg-3">
					<div class="shop-one__item">
						<div class="shop-one__image">
							<?php if($product->is_on_sale()) : ?>
								<span class="shop-one__sale"><?php esc_html_e( 'sale', 'agriox_addon' ); ?></span><!-- /.shop-one__sale -->
							<?php endif; ?>
							<?php 
								if( function_exists( 'woocommerce_template_loop_product_thumbnail' )) :
									woocommerce_template_loop_product_thumbnail();
								endif; 
							?>
							<div class="agriox-overlay">
								<div class="cv-spinner">
									<span class="spinner"></span>
								</div>
							</div>
							<?php
							if ( $product->is_type( 'variable' ) ) {
								echo sprintf( '<a href="%s" class="%s">%s</a>',
									esc_url( $product->add_to_cart_url() ),
									esc_attr( implode( ' ', array_filter( array(
										'button', 'product_type_' . $product->get_type(),
										'shop-one__cart add_to_cart_button'
									) ) ) ),
									'<i class=" icon-shopping-cart"></i>'
									);
							}else{
								echo sprintf( '<a href="%s" data-quantity="1" class="%s" %s>%s</a>',
									esc_url( $product->add_to_cart_url() ),
									esc_attr( implode( ' ', array_filter( array(
										'button', 'product_type_' . $product->get_type(),
										$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
										$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart shop-one__cart agriox_ajax' : 'shop-one__cart',
									) ) ) ),
									wc_implode_html_attributes( array(
										'data-product_id'  => $product->get_id(),
										'data-product_sku' => $product->get_sku(),
										'aria-label'       => $product->add_to_cart_description(),
										'rel'              => 'nofollow',
									) ),
									'<i class=" icon-shopping-cart"></i>'
								);
							}
							?>
						</div><!-- /.shop-one__image -->
						<div class="shop-one__content text-center">
							<div class="shop-one__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							<p class="shop-one__price"><?php echo wc_price( $price ); ?></p><!-- /.shop-one__price -->
							<div class="shop-one__rating">
								<?php wc_get_template( 'single-product/rating.php' ); ?>
							</div><!-- /.shop-one__rating -->
						</div><!-- /.shop-one__content -->
					</div><!-- /.shop-one__item -->
				</div><!-- /.col-md-6 col-lg-3 -->
			<?php endwhile;
			wp_reset_postdata(); ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.shop-one -->