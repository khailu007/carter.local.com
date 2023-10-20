<?php if ('layout_one' == $settings['layout_type']) : ?>

	<section class="contact-one">
		<div class="container">
		 <?php if( !empty( $settings[ 'title' ]) || !empty( 'sub_title' )  ) : ?>
			<div class="sec-title text-center">
				<?php if( !empty( $settings[ 'icon_image' ] ) ) : ?>
					<div class="icon">
						<img src="<?php echo esc_url( $settings[ 'icon_image' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( agriox_get_thumbnail_alt( $settings[ 'icon_image' ][ 'id' ] ) ); ?>">
					</div>
				<?php endif; ?>
				<?php if( $settings[ 'sub_title' ] ) : ?>
					<span class="sec-title__tagline"><?php echo wp_kses( $settings[ 'sub_title' ], 'agriox_allowed_tags' ); ?></span>
				<?php endif; ?>
				<?php if( $settings[ 'title' ] ) : ?>
					<h2 class="sec-title__title"><?php echo wp_kses( $settings[ 'title' ], 'agriox_allowed_tags'); ?></h2>
				<?php endif; ?>
			</div>
		 <?php endif; ?>
			<div class="row">
				<div class="col-lg-6">
					<div class="contact-one__content">
					  <?php if( !empty( $settings[ 'summary' ] ) ) : ?>
							<p class="contact-one__text"><?php echo wp_kses( $settings[ 'summary' ], 'agriox_allowed_tags' ); ?></p>
						<?php endif; ?>
						<?php if( is_array( $settings[ 'check_list' ] ) ) : ?>
							<ul class="list-unstyled ml-0 contact-one__lists">
								<?php foreach( $settings[ 'check_list' ] as $list ) : ?>
								<li>
									<i class="<?php echo esc_attr( $list[ 'icon' ][ 'value' ] ); ?>"></i>
									<?php echo esc_html( $list[ 'title' ] ); ?>
								</li>
								<?php endforeach; ?>
							</ul><!-- /.list-unstyled ml-0 -->
						<?php endif; ?>
						<div class="contact-one__images">
							<div class="contact-one__images__shape"></div><!-- /.contact-one__images__shape -->
							<?php if( !empty( $settings[ 'image_one' ][ 'url' ] ) ) : ?>
								<img src="<?php echo esc_url( $settings[ 'image_one' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( agriox_get_thumbnail_alt( $settings[ 'image_one' ][ 'id' ] ) ); ?>" class="contact-one__images-1">
							<?php endif; ?>
							<?php if( !empty( $settings[ 'image_one' ][ 'url' ] ) ) : ?>
								<img src="<?php echo esc_url( $settings[ 'image_two' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( agriox_get_thumbnail_alt( $settings[ 'image_two' ][ 'id' ] ) ); ?>" class="contact-one__images-2">
							<?php endif; ?>
						</div><!-- /.contact-one__images -->
					</div><!-- /.contact-one__content -->
				</div><!-- /.col-lg-6 -->
				<div class="col-lg-6">
					<?php if (!empty($settings['select_wpcf7_form'])) : ?>
						<?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
					<?php endif; ?>
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.contact-one -->

<?php endif; ?>