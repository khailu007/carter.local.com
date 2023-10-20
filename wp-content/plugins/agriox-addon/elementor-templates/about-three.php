<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!--About Two Start-->
    <section class="about-two">
        <?php if (!empty($settings['bg_shape_image'])) : ?>
            <div class="about-two__bg"><img src="<?php echo esc_url($settings['bg_shape_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['bg_shape_image']['id'])); ?>" /></div>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <!--Start About Two Img Box-->
                <div class="col-xl-6 col-lg-6">
                    <div class="about-two__img-box clearfix">
                        <div class="about-two__img-box__shape"></div><!-- /.about-two__img-box__shape -->
                        <div class="about-two__img-box-img1">
                            <div class="about-two__img-box-img1-inner">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>" />
                            </div>
                        </div>
                        <div class="about-two__img-box-img2">
                            <div class="about-two__img-box-img2__shape"></div>
                            <!-- /.about-two__img-box-img2__shape -->
                            <div class="logo"><img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['logo']['id'])); ?>" /></div>
                            <div class="about-two__img-box-img2-inner">
                                <img src="<?php echo esc_url($settings['image_two']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image_two']['id'])); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--End About Two Img Box-->

                <!--Start About Two Content Box-->
                <div class="col-xl-6 col-lg-6">
                    <div class="about-two__content-box">
                        <div class="sec-title">
                            <?php if (!empty($settings['icon_image']['url'])) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
                                </div>
                            <?php endif; ?>
                            <span class="sec-title__tagline"><?php echo wp_kses($settings['sec_subtitle'], 'agriox_allowed_tags'); ?></span>
                            <h2 class="sec-title__title"><?php echo wp_kses($settings['sec_title'], 'agriox_allowed_tags'); ?></h2>
                        </div>
                        <p class="about-two__content-box-text"><?php echo wp_kses($settings['summary'], 'agriox_allowed_tags'); ?></p>
                        <div class="about-two__content-box-list">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="about-two__content-box-list-single">
                                        <ul class="list-unstyled">
                                            <?php
                                            $i = 0;
                                            foreach ($settings['check_list'] as $item) :
                                                if ($i % 2 == 0) {
                                            ?>
                                                    <li>
                                                        <div class="icon icon-svg">
                                                            <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?>
                                                        </div>
                                                        <div class="text">
                                                            <p><?php echo wp_kses($item['title'], 'agriox_allowed_tags'); ?></p>
                                                        </div>
                                                    </li>
                                            <?php }
                                                $i++;
                                            endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="about-two__content-box-list-single">
                                        <ul class="list-unstyled">
                                            <?php
                                            $i = 0;
                                            foreach ($settings['check_list'] as $item) :
                                                if ($i % 2 != 0) {
                                            ?>
                                                    <li>
                                                        <div class="icon icon-svg">
                                                            <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true', 'class' => ' '], 'i'); ?>
                                                        </div>
                                                        <div class="text">
                                                            <p><?php echo wp_kses($item['title'], 'agriox_allowed_tags'); ?></p>
                                                        </div>
                                                    </li>
                                            <?php }
                                                $i++;
                                            endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="about-two__progress">
                            <?php foreach ($settings['progressbar'] as $bar) : ?>
                                <!--Start Digital Factory One Progress Single-->
                                <div class="about-two__progress-single">
                                    <h4 class="about-two__progress-title"><?php echo esc_html($bar['title']); ?></h4>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($bar['number']); ?>%">
                                            <div class="count-text"><?php echo esc_attr($bar['number']); ?>%</div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Digital Factory One Progress Single-->
                            <?php endforeach; ?>
                        </div>

                        <div class="about-two__author">
                            <h2><?php echo esc_html($settings['name']); ?> <span> <?php echo esc_html($settings['designation']); ?></span></h2>
                        </div>
                    </div>
                </div>
                <!--End About Two Content Box-->
            </div>
        </div>
    </section>
    <!--About Two End-->
<?php endif; ?>