<section class="gallery-one">
    <div class="container-fluid">
        <?php if (!empty($settings['title']) || $settings['sub_title']) : ?>
            <div class="sec-title text-center">
                <?php if (!empty($settings['icon_image'])) : ?>
                    <div class="icon">
                        <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo agriox_get_thumbnail_alt($settings['icon_image']['id']); ?>">
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['sub_title'])) : ?>
                    <span class="sec-title__tagline"><?php echo wp_kses($settings['sub_title'], 'agriox_allowed_tags'); ?></span>
                <?php endif; ?>
                <?php if (!empty($settings['title'])) : ?>
                    <h2 class="sec-title__title"><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <div class="thm-swiper__slider swiper-container" data-swiper-options='<?php echo esc_attr(agriox_get_swiper_options($settings)); ?>'>
            <div class="swiper-wrapper">
                <?php if (is_array($settings['images'])) :  ?>
                    <?php foreach ($settings['images'] as $image) : ?>
                        <div class="swiper-slide">
                            <div class="gallery-one__item">
                                <div class="gallery-one__item__image">
                                    <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($image['image']['id'])); ?>">
                                    <a href="<?php echo esc_url($image['image']['url']); ?>" class="image-popup"></a>
                                </div><!-- /.gallery-one__item__image -->
                            </div><!-- /.gallery-one__item -->
                        </div><!-- /.swiper-slide -->
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div><!-- /.container -->
</section>