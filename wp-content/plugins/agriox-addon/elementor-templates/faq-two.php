<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!--Faq One Start-->
    <section class="faq-one faq-one__dark">
        <div class="faq-one__shape"></div><!-- /.faq-one__shape -->
        <div class="container">
            <div class="row">
                <!--Start Faq One Content-->
                <div class="col-xl-6 col-lg-6">
                    <div class="faq-one__content">
                        <div class="sec-title">
                            <?php if (!empty($settings['icon_image']['url'])) : ?>
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
                        <div class="faq-one__inner-content">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="faq-one__inner-content-left">
                                        <?php if (!empty($settings['image']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>">
                                        <?php endif; ?>
                                        <p><?php echo wp_kses($settings['summary'], 'agriox_allowed_tags'); ?></p>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="faq-one__inner-content-list">
                                        <ul class="list-unstyled">
                                            <?php foreach ($settings['check_list'] as $list) : ?>
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa <?php echo esc_attr($list['icon']['value']); ?>" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p><?php echo wp_kses($list['title'], 'agriox_allowed_tags'); ?></p>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($settings['button_label'])) : ?>
                            <div class="faq-one__btn">
                                <a <?php echo esc_attr(!empty($settings['button_url']['is_external']) ? 'target=_blank' : ' '); ?> href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($settings['button_label']); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!--End Faq One Content-->


                <!--Start Faq One Accordions-->
                <div class="col-xl-6 col-lg-6">
                    <div class="faq-one__accordions">
                        <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-<?php echo esc_attr(uniqid()); ?>">
                            <?php
                            $active_question = 1;
                            foreach ($settings['faq_lists'] as $list) :
                            ?>
                                <!--Start Faq One Single-->
                                <div class="accrodion <?php echo esc_attr(($active_question == 1 ? 'active' : '')); ?> wow fadeInUp" data-wow-delay="0ms">
                                    <div class="accrodion-title">
                                        <h4><?php echo esc_html($list['question']); ?></h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p><?php echo wp_kses($list['answer'], 'agriox_allowed_tags'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Faq One Single-->
                            <?php $active_question++;
                            endforeach; ?>
                        </div>

                    </div>
                </div>
                <!--End Faq One Accordions-->
            </div>
        </div>
    </section>
    <!--Faq One End-->
<?php endif; ?>