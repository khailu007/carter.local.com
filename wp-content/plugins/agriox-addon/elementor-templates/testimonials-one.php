<?php if ('layout_one' === $settings['layout_type']) : ?>
    <!--Testimonials One Start-->
    <section class="testimonials-one jarallax clearfix " data-jarallax data-speed="0.2" data-imgPosition="50% 0%" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>);">
        <div class="container">
            <div class="row">
                <!--Start Testimonials One Left-->
                <div class="col-xl-4">
                    <div class="testimonials-one__left">
                        <div class="testimonials-one__left-bg"></div>
                        <div class="sec-title">
                            <?php if (!empty($settings['icon_image']['url'])) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['icon_image']['id'])); ?>">
                                </div>
                            <?php endif; ?>
                            <span class="sec-title__tagline"><?php echo wp_kses($settings['sec_sub_title'], 'agriox_allowed_tags'); ?></span>
                            <h2 class="sec-title__title"><?php echo wp_kses($settings['sec_title'], 'agriox_allowed_tags'); ?></h2>
                        </div>
                    </div>
                </div>
                <!--End Testimonials One Left-->
                <!--Start Testimonials One Right-->
                <div class="col-xl-8">
                    <div class="testimonials-one__right">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="testimonials-one__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='<?php echo agriox_get_owl_options($settings); ?>'>
                                    <?php

                                    if (!empty($settings['select_category'])) :

                                        $testimonials_thumb_post_query = new \WP_Query(array(
                                            'post_type' => 'testimonial',
                                            'posts_per_page' => $settings['post_count']['size'],
                                            'orderby' => 'menu_order title',
                                            'order'   => $settings['query_order'],
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'testimonial_cat',
                                                    'field' => 'slug',
                                                    'terms' => $settings['select_category']
                                                )
                                            )
                                        ));

                                    else :

                                        $testimonials_thumb_post_query = new \WP_Query(array(
                                            'post_type' => 'testimonial',
                                            'posts_per_page' => $settings['post_count']['size'],
                                            'orderby' => 'menu_order title',
                                            'order'   => $settings['query_order'],
                                        ));

                                    endif;

                                    ?>
                                    <?php while ($testimonials_thumb_post_query->have_posts()) : ?>
                                        <?php $testimonials_thumb_post_query->the_post(); ?>
                                        <!--Start Single Testimonials One-->
                                        <div class="testimonials-one__single">
                                            <p class="testimonials-one__single-text">
                                                <?php
                                                // giving hook for flexibility
                                                $agriox_testimonials_word_count = apply_filters('agriox_testimonials_word_count', $settings['post_word_count']['size']);

                                                echo wp_kses(wp_trim_words(get_post_meta(get_the_ID(), 'agriox_content', true), $agriox_testimonials_word_count, ''), 'agriox_allowed_tags'); ?>
                                            </p>
                                            <div class="testimonials-one__single-client-info">
                                                <div class="testimonials-one__single-client-info-img">
                                                    <div class="testimonials-one__single-client-info-img-inner">
                                                        <?php the_post_thumbnail('agriox_testimonials_79X79'); ?>
                                                    </div>
                                                    <div class="icon">
                                                        <span class="icon-right-quotation-mark"></span>
                                                    </div>
                                                </div>
                                                <div class="testimonials-one__single-client-info-title">
                                                    <div><?php the_title(); ?></div>
                                                    <p><?php echo esc_html(get_post_meta(get_the_ID(), 'agriox_designation', true)); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Start Single Testimonials One-->
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Testimonials One Right-->
            </div>
        </div>
    </section>
    <!--Testimonials One End-->
<?php endif; ?>