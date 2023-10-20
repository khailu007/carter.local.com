<?php if ('layout_one' == $settings['layout_type']) : ?>
    <section class="company-logos-one">
        <div class="container">
            <div class="thm-swiper__slider swiper-container" data-swiper-options='<?php echo esc_attr(agriox_get_swiper_options($settings)); ?>'>
                <div class="swiper-wrapper">
                    <?php foreach ($settings['sponsor_images'] as $image) : ?>
                        <div class="swiper-slide">
                            <a href="<?php echo esc_url($image['link']); ?>">
                                <?php echo wp_get_attachment_image($image['image']['id'], 'agriox_brand_logo_125X24'); ?>
                            </a>
                        </div><!-- /.swiper-slide -->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>