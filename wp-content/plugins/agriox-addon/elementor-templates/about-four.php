<?php if ('layout_four' == $settings['layout_type']) : ?>
    <section class="features-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="features-three__image clearfix">
                        <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>">
                        <div class="features-three__image__caption">
                            <span><?php \Elementor\Icons_Manager::render_icon($settings['image_icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?></span>
                            <h3><?php echo wp_kses($settings['image_title'], 'agriox_allowed_tags'); ?></h3>
                        </div><!-- /.features-three__image__caption -->
                    </div><!-- /.features-three__image -->
                </div><!-- /.col-xl-6 -->
                <div class="col-xl-6">
                    <div class="features-three__content">
                        <div class="sec-title text-left">
                            <?php if (!empty($settings['icon_image']['url'])) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
                                </div>
                            <?php endif; ?>
                            <span class="sec-title__tagline"><?php echo wp_kses($settings['sec_subtitle'], 'agriox_allowed_tags'); ?></span>
                            <h2 class="sec-title__title"><?php echo wp_kses($settings['sec_title'], 'agriox_allowed_tags'); ?></h2>
                        </div>
                        <ul class="list-unstyled features-three__list">
                            <?php foreach ($settings['feature_box'] as $item) : ?>
                                <li>
                                    <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                    <div class="features-three__list__content">
                                        <h3><?php echo esc_html($item['title']); ?></h3>
                                        <p><?php echo wp_kses($item['text'], 'agriox_allowed_tags'); ?></p>
                                    </div><!-- /.features-three__list__content -->
                                </li>
                            <?php endforeach; ?>
                        </ul><!-- /.list-unstyle -->
                    </div><!-- /.features-three__content -->
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.features-three -->

<?php endif; ?>