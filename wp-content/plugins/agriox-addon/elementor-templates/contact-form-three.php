<?php if ('layout_three' == $settings['layout_type']) : ?>

    <!--Start Contact Page-->
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <!--Start Contact Page Left-->
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-page__left">
                        <div class="sec-title">
                            <?php if (!empty($settings['icon_image'])) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['sub_title'])) : ?>
                                <span class="sec-title__tagline"><?php echo wp_kses($settings['sub_title'], 'agriox_allowed_tags'); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['title'])) : ?>
                                <h2 class="sec-title__title"><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['summary'])) : ?>
                            <p class="contact-page__left-text"><?php echo wp_kses($settings['summary'], 'agriox_allowed_tags'); ?></p>
                        <?php endif; ?>
                        <?php if (is_array($settings['social_icons'])) : ?>
                            <div class="contact-page__social-link">
                                <ul class="list-unstyled">
                                    <?php foreach ($settings['social_icons'] as $social) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($social['social_url']['url']); ?>" <?php echo esc_attr(!empty($social['social_url']['is_external']) ? 'target=_blank' : ' '); ?>>
                                                <?php \Elementor\Icons_Manager::render_icon($social['social_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!--End Contact Page Right-->

                <!--Start Contact Page Right-->
                <div class="col-xl-8 col-lg-8">
                    <div class="contact-page__right">
                        <?php if (!empty($settings['select_wpcf7_form'])) : ?>
                            <?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!--End Contact Page Right-->
            </div>
        </div>
    </section>
    <!--End Contact Page-->

<?php endif; ?>