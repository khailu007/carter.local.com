<?php if ('layout_eight' == $settings['layout_type']) : ?>

    <div class="cta-three">
        <div class="cta-three__shape-1"></div><!-- /.cta-three__shape-1 -->
        <div class="cta-three__shape-2"></div><!-- /.cta-three__shape-2 -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="cta-three__image clearfix">
                        <?php if (!empty($settings['image']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>" class="float-end">
                        <?php endif; ?>
                        <?php if (!empty($settings['img_bg_text'])) : ?>
                            <h3 class="cta-three__image__caption"><?php echo esc_html($settings['img_bg_text']); ?></h3><!-- /.cta-three__image__caption -->
                        <?php endif; ?>
                    </div><!-- /.cta-three__image -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="cta-three__content">
                        <div class="sec-title text-left">
                            <?php if (!empty($settings['icon_image']['url'])) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo agriox_get_thumbnail_alt($settings['icon_image']['id']); ?>">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['sec_title']) || !empty($settings['sec_subtitle'])) : ?>
                                <?php if (!empty($settings['sec_subtitle'])) : ?>
                                    <span class="sec-title__tagline"><?php echo wp_kses($settings['sec_subtitle'], 'agriox_allowed_tags'); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['sec_title'])) : ?>
                                    <h2 class="sec-title__title"><?php echo wp_kses($settings['sec_title'], 'agriox_allowed_tags'); ?></h2>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php if (is_array($settings['feature_box'])) : ?>
                            <div class="cta-three__box">
                                <?php foreach ($settings['feature_box'] as $box) : ?>
                                    <div class="cta-three__box__item">
                                        <i class="<?php echo esc_attr($box['icon']['value']); ?>"></i>
                                        <h3 class="cta-three__box__item__title"><?php echo wp_kses($box['title'], 'agriox_allowed_tags'); ?></h3>
                                        <!-- /.cta-three__box__item__title -->
                                    </div><!-- /.cta-three__box__item -->
                                <?php endforeach; ?>
                            </div><!-- /.cta-three__box -->
                        <?php endif; ?>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="cta-three__text"><?php echo wp_kses($settings['summary'], 'agriox_allowed_tags'); ?></p><!-- /.cta-three__text -->
                        <?php endif; ?>
                        <?php if (!empty($settings['button_label'])) : ?>
                            <a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($settings['button_label']); ?></a><!-- /.thm-btn -->
                        <?php endif; ?>
                    </div><!-- /.cta-three__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.cta-three -->

<?php endif; ?>