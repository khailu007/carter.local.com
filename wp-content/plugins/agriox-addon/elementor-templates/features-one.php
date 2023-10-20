 <!--Features One Start-->
 <section class="features-two">
 	<div class="container">
 		<div class="row">
 			<?php if (is_array($settings['feature_boxes'])) : ?>
 				<?php foreach ($settings['feature_boxes'] as $box) : ?>
 					<!--Start Single Features One-->
 					<div class="col-xl-3 col-lg-6 col-md-6  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
 						<div class="features-two__single">
 							<div class="features-two__single-top">
 								<div class="icon icon-svg">
 									<?php \Elementor\Icons_Manager::render_icon($box['icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
 								</div>
 								<div class="count-box"></div>
 							</div>
 							<div class="features-two__single-title">
 								<h3><a <?php echo esc_attr(!empty($box['url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($box['url']['url']);  ?>"><?php echo esc_html($box['title']); ?></a></h3>
 								<p><?php echo wp_kses($box['text'], 'agriox_allowed_tags'); ?></p>
 							</div>
 						</div>
 					</div>
 					<!--End Single Features One-->
 				<?php endforeach; ?>
 			<?php endif; ?>
 		</div>

 		<?php if ('yes' == $settings['enable_bottom_content']) : ?>
 			<div class="features-two__call-box  wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
 				<div class="row">
 					<div class="col-xl-12">
 						<div class="features-two__call-box-inner">
 							<div class="img-box">
 								<div class="icon icon-svg">
 									<?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
 								</div>
 								<?php if ($settings['image']['url']) : ?>
 									<div class="inner">
 										<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>" />
 									</div>
 								<?php endif; ?>
 							</div>
 							<div class="title">
 								<p><?php echo wp_kses($settings['sub_title'], 'agriox_allowed_tags'); ?></p>
 								<h2><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		<?php endif; ?>
 	</div>
 </section>
 <!--Features One End-->