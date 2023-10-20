<?php if ('layout_three' == $settings['layout_type']) : ?>

	<section class="video-two">
		<?php if( !empty(  $settings[ 'image' ][ 'url' ] ) ) : ?>
			<div class="video-two__bg jarallax" data-jarallax data-speed="0.2" data-type="scroll-opacity"
				data-imgPosition="100% 100%"
				style="background-image: url( <?php echo esc_url( $settings[ 'image' ][ 'url' ] ); ?> );">
			</div>
        <?php endif; ?>
		<!-- /.video-two__bg -->
		<div class="container">
			<?php if( !empty( $settings[ 'video_url' ] ) ): ?>
				<a href="<?php echo esc_url( $settings[ 'video_url' ] ); ?>" class="video-popup">
					<i class="fa fa-play"></i>
				</a>
			<?php endif; ?>

			<?php if( !empty( $settings[ 'title' ] ) ) : ?>
				<h3 class="video-two__title"><?php echo wp_kses( $settings[ 'title' ], 'agriox_allowed_tags' ); ?></h3>
			<?php endif; ?>
		</div><!-- /.container -->
		<div class="video-two__shape__wrapper">
			<div class="video-two__shape-1"></div><!-- /.video-two__shape-1 -->
			<div class="video-two__shape-2"></div><!-- /.video-two__shape-2 -->
			<div class="video-two__shape-3"></div><!-- /.video-two__shape-3 -->
			<div class="video-two__shape-4"></div><!-- /.video-two__shape-4 -->
			<div class="video-two__shape-5"></div><!-- /.video-two__shape-5 -->
			<div class="video-two__shape-6"></div><!-- /.video-two__shape-6 -->
			<div class="video-two__shape-7"></div><!-- /.video-two__shape-7 -->
		</div><!-- /.video-two__shape-wrapper -->
	</section><!-- /.video-two -->

<?php endif; ?>