<?php if ('layout_six' == $settings['layout_type']) : ?>
    <!--About Three Start-->
    <section class="about-three" style="background-image: url(<?php echo esc_url($settings['bg_shape_image']['url']); ?>);">
        <div class="about-three__shape"></div><!-- /.about-three__shape -->
        <div class="container">
            <div class="row">
                <!--Start About Three Content Box-->
                <div class="col-xl-6 col-lg-7">
                    <div class="about-three__content-box">
                        <div class="sec-title">
                            <?php if (!empty($settings['icon_image']['url'])) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
                                </div>
                            <?php endif; ?>

                            <span class="sec-title__tagline"><?php echo wp_kses($settings['sec_subtitle'], 'agriox_allowed_tags'); ?></span>

                            <h2 class="sec-title__title"><?php echo wp_kses($settings['sec_title'], 'agriox_allowed_tags'); ?></h2>

                        </div>
                        <div class="about-three__content-box-inner">
                            <?php if (!empty($settings['highlighted_text'])) : ?>
                                <h2><?php echo wp_kses($settings['highlighted_text'], 'agriox_allowed_tags'); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['summary'])) : ?>
                                <p class="summary"><?php echo wp_kses($settings['summary'], 'agriox_allowed_tags'); ?></p>
                            <?php endif; ?>
                            <div class="about-three__products-list">
                                <ul class="list-unstyled">
                                    <?php foreach ($settings['feature_box'] as $item) : ?>
                                        <li>
                                            <div class="icon icon-svg">
                                                <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true', 'class' => ' '], 'span'); ?>
                                            </div>
                                            <h3><?php echo wp_kses($item['title'], 'agriox_allowed_tags'); ?></h3>
                                            <p><?php echo wp_kses($item['text'], 'agriox_allowed_tags'); ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php if (!empty($settings['button_label'])) : ?>
                            <div class="about-three__content-box-btn">
                                <a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($settings['button_label']); ?></a>
                            </div>
                            <div class="about-three__arrow float-bob-y"></div><!-- /.about-three__arrow -->
                        <?php endif; ?>
                    </div>
                </div>
                <!--End About Three Content Box-->

                <!--Start About Three Img Box-->
                <div class="col-xl-6 col-lg-5">
                    <div class="about-three__img-box">
                        <?php if (!empty($settings['logo']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['logo']['url']); ?>" class="about-three__img-icon" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['logo']['id'])); ?>">
                        <?php endif; ?>
                        <div class="about-three__img-box-img">
                            <div class="about-three__img-box-img-inner">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--End About Three Img Box-->
            </div>
        </div>
    </section>
    <!--About Three End-->

<?php endif; ?>