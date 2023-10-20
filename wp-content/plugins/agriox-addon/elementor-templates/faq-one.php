<?php if ('layout_one' == $settings['layout_type']) : ?>
	<!--Faq One Start-->
	<?php if (!empty($settings['faq_lists'])) : ?>
		<!--Start Faq One Content-->
		<div class="faq-one__accordions">
			<div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-<?php echo esc_attr(uniqid()); ?>">
				<?php
				$active_question = 1;
				foreach ($settings['faq_lists'] as $list) :
				?>
					<!--Start Faq One Single-->
					<div class="accrodion <?php echo esc_attr(($active_question == 1 ? 'active' : '')); ?> wow fadeInUp" data-wow-delay="0ms">
						<div class="accrodion-title">
							<h4><?php echo esc_html($list['question']); ?></h4>
						</div>
						<div class="accrodion-content">
							<div class="inner">
								<p><?php echo wp_kses($list['answer'], 'agriox_allowed_tags'); ?></p>
							</div>
						</div>
					</div>
					<!-- End Faq One Single-->
				<?php $active_question++;
				endforeach; ?>
			</div>
		</div>
		<!--End Faq One Content-->
	<?php endif; ?>
	<!--Faq One End-->
<?php endif; ?>