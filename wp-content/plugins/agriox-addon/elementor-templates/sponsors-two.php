<?php if ('layout_two' == $settings['layout_type']) : ?>
    <section class="company-logos-one company-logos-one--gray">
        <div class="container">
            <div class="thm-swiper__slider swiper-container" data-swiper-options='<?php echo esc_attr(agriox_get_swiper_options($settings)); ?>'>
                <div class="swiper-wrapper">
                    <?php foreach ($settings['sponsor_images'] as $image) : ?>
                        <div class="swiper-slide">
                            <?php echo wp_get_attachment_image($image['image']['id'], 'agriox_brand_logo_125X24'); ?>
                        </div><!-- /.swiper-slide -->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>