<?php if ('layout_two' == $settings['layout_type']) : ?>

	<section class="faq-contact-box">
        <div class="container">
            <div class="sec-title text-center">
				<?php if( !empty( $settings[ 'icon_image' ][ 'url' ] ) ) : ?>
					<div class="icon">
						<img src="<?php echo esc_url( $settings[ 'icon_image' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( agriox_get_thumbnail_alt( $settings[ 'icon_image' ][ 'id' ] ) ); ?>">
					</div>
				<?php endif; ?>
				<?php if( !empty( $settings[ 'sub_title' ] ) ) : ?>
              	   <span class="sec-title__tagline"><?php echo wp_kses( $settings[ 'sub_title' ], 'agriox_allowed_tags' ); ?></span>
				<?php endif; ?>
				<?php if( !empty( $settings[ 'title' ] ) ): ?>
                	<h2 class="sec-title__title"><?php echo wp_kses( $settings[ 'title' ], 'agriox_allowed_tags' ); ?></h2>
				<?php endif; ?>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="faq-contact-box__wrapper">
						<?php if (!empty($settings['select_wpcf7_form'])) : ?>
							<?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>