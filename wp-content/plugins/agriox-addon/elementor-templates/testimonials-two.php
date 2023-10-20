<?php if ('layout_two' === $settings['layout_type']) : ?>
    <section class="testimonials-page">
        <div class="container">
            <div class="row">
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
                    <div class="col-md-6 col-lg-4">
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
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo esc_html(get_post_meta(get_the_ID(), 'agriox_designation', true)); ?></p>
                                </div>
                            </div>
                        </div>
                        <!--Start Single Testimonials One-->
                    </div><!-- /.col-md-6 -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.testimonials-page -->
<?php endif; ?>