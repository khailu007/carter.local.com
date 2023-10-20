<?php if ('layout_five' == $settings['layout_type']) : ?>

	<section class="story-one">
		<div class="story-one__shape"></div><!-- /.story-one__shape -->
		<div class="auto-container">
			<div class="row">
				<div class="col-xl-6">
					<div class="story-one__img"
						style="background-image: url(<?php echo esc_url( $settings[ 'image' ][ 'url' ] ); ?>);">
						<div class="story-one__img__line float-bob-y"></div><!-- /.story-one__img__line -->
						<h3><?php echo wp_kses( $settings[ 'image_title' ], 'agriox_allowed_tags' ); ?></h3>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="story-one__counters">
						<?php if( !empty( $settings[ 'bg_shape_image' ] ) ): ?>
							<div class="story-one__bg"><img src="<?php echo esc_url( $settings[ 'bg_shape_image' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( agriox_get_thumbnail_alt( $settings[ 'bg_shape_image' ][ 'id' ] ) ); ?>" />
							</div>
						<?php endif; ?>
						<div class="sec-title">
					    	<?php if( !empty( $settings[ 'icon_image' ][ 'url' ] ) ) : ?>
								<div class="icon">
									<img src="<?php echo esc_url( $settings[ 'icon_image' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( agriox_get_thumbnail_alt( $settings[ 'icon_image' ]['id'] ) ); ?>">
								</div>
							<?php endif; ?>
							<span class="sec-title__tagline"><?php echo wp_kses( $settings[ 'sec_subtitle' ], 'agriox_allowed_tags' ); ?></span>
							<h2 class="sec-title__title"><?php echo wp_kses( $settings[ 'sec_title' ], 'agriox_allowed_tags' ); ?></h2>
						</div>
						<p class="story-one__counters-text"><?php echo wp_kses( $settings[ 'summary' ], 'agriox_allowed_tags' ); ?></p>

						<div class="story-one__counters-box">
							<ul class="list-unstyled">
							  <?php if( is_array( $settings[ 'funbox' ] ) ) : ?>
								  <?php foreach(  $settings[ 'funbox' ] as $item ) : ?>
										<!--Start Single Story One Counters Box-->
										<li class="story-one__counters-box-single text-center wow slideInUp animated"
											data-wow-delay="0.1s" data-wow-duration="1500ms">
											<h3 class="odometer" data-count="<?php echo esc_attr( $item[ 'number' ] ); ?>">00</h3>
											<p class="story-one__counters-box-single-text"><?php echo wp_kses( $item[ 'title' ], 'agriox_allowed_tags' ); ?></p>
										</li>
										<!--End Single Story One Counters Box-->
							  <?php endforeach; endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>