<?php if ('layout_seven' == $settings['layout_type']) : ?>

    <section class="about-four">
        <?php if (!empty($settings['bg_shape_image'])) : ?>
            <img src="<?php echo esc_url($settings['bg_shape_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['bg_shape_image']['id'])); ?>" class="about-four__shape">
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-four__image wow fadeInLeft" data-wow-duration="1500ms">
                        <?php if (!empty($settings['image'])) : ?>
                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>" class="about-four__image__one">
                        <?php endif; ?>
                        <?php if (!empty($settings['logo']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['logo']['url']); ?>" alt=" <?php echo esc_attr(agriox_get_thumbnail_alt($settings['logo']['id'])); ?>" class="about-four__image__icon">
                        <?php endif; ?>
                    </div><!-- /.about-four__image -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="about-four__content">
                        <?php if (!empty($settings['sec_title']) || !empty($settings['sec_subtitle'])) : ?>
                            <div class="sec-title">
                                <?php if (!empty($settings['icon_image']['url'])) : ?>
                                    <div class="icon">
                                        <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['sec_subtitle'])) : ?>
                                    <span class="sec-title__tagline"><?php echo wp_kses($settings['sec_subtitle'], 'agriox_allowed_tags'); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['sec_title'])) : ?>
                                    <h2 class="sec-title__title"><?php echo wp_kses($settings['sec_title'], 'agriox_allowed_tags'); ?></h2>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="about-four__text"><?php echo wp_kses($settings['summary'], 'agriox_allowed_tags'); ?></p><!-- /.about-four__text -->
                        <?php endif; ?>
                        <?php if (is_array($settings['check_list'])) : ?>
                            <ul class="list-unstyled about-four__list ml-0">
                                <?php foreach ($settings['check_list'] as $check) : ?>
                                    <li>
                                        <i class="fa <?php echo esc_attr($check['icon']['value']) ?>"></i>
                                        <?php echo wp_kses($check['title'], 'agriox_allowed_tags'); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul><!-- /.list-unstyled about-four__list -->
                        <?php endif; ?>
                        <?php if (!empty($settings['button_label'])) : ?>
                            <a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($settings['button_label']); ?></a><!-- /.thm-btn -->
                        <?php endif; ?>
                    </div><!-- /.about-four__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.about-four -->

<?php endif; ?>