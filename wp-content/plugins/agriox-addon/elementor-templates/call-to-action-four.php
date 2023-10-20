<?php if ('layout_four' == $settings['layout_type']) : ?>
	<div class="features-one__single">
		<div class="features-one__single-img">
			<img src="<?php echo esc_url($settings['layout_four_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['layout_four_image']['id'])); ?>" />
			<div class="features-one__single-title text-center">
				<h3><a <?php echo esc_attr(!empty($settings['layout_four_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['layout_four_url']['url']); ?>"><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></a></h3>
			</div>
		</div>

		<a <?php echo esc_attr(!empty($settings['layout_four_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['layout_four_url']['url']); ?>" class="features-one__single__more">
			<span class="icon-right-arrow-2"></span>
		</a><!-- /.feature-one__single__more -->
	</div>
<?php endif; ?>