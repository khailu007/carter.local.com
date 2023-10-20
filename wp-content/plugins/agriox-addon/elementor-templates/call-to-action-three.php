<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!--Start Single Features One-->
    <div class="features-one__single style2 text-center">
        <?php if ($settings['background_image']['url']) : ?>
            <div class="features-one__single-bg" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>);">
            </div>
        <?php endif; ?>
        <div class="features-one__single-img">
            <img src="<?php echo esc_url($settings['image']['url']) ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>" />
        </div>
        <?php if (!empty($settings['title'])) : ?>
            <div class="features-one__single-title text-center">
                <h3><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h3>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['button_label'])) : ?>
            <div class="button">
                <a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($settings['button_label']); ?></a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>