<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!--Video One Start-->
    <section class="video-one jarallax clearfix" data-jarallax data-speed="0.2" data-imgPosition="50% 0%" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);">
        <div class="video-one-border"></div>
        <div class="video-one-border video-one-border-two"></div>
        <div class="video-one-border video-one-border-three"></div>
        <div class="video-one-border video-one-border-four"></div>
        <div class="video-one-border video-one-border-five"></div>
        <div class="video-one-border video-one-border-six"></div>

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="video-one__wrpper">
                        <div class="video-one__left">
                            <div class="video-one__leaf"></div><!-- /.video-one__leaf -->
                            <?php if (!empty($settings['title'])) : ?>
                                <h2 class="video-one__title"><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($settings['button_label'])) : ?>
                                <div class="video-one__btn">
                                    <a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($settings['button_label']); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($settings['video_url']) : ?>
                            <div class="video-one__right">
                                <div class="icon wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                                    <a class="video-popup" title=" Video" href="<?php echo esc_url($settings['video_url']); ?>">
                                        <span class="icon-play-button-1"></span>
                                    </a>
                                    <span class="border-animation border-1"></span>
                                    <span class="border-animation border-2"></span>
                                    <span class="border-animation border-3"></span>
                                </div>
                                <div class="title">
                                    <h2><?php echo esc_html($settings['video_title']); ?></h2>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Video One End-->
<?php endif; ?>