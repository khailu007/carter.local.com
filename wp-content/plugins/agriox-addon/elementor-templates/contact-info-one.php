<!--Start Contact Page Contact Info-->
<section class="contact-page__contact-info clearfix">
    <div class="auto-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-page__contact-info-wrapper">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="contact-page__contact-info-title">
                            <h2><?php echo wp_kses($settings['title'], 'agriox_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="contact-page__contact-info-list">
                        <ul class="list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-map"></span>
                                </div>
                                <div class="title">
                                    <span><?php echo wp_kses($settings['address_label'], 'agriox_allowed_tags'); ?></span>
                                    <p><?php echo wp_kses($settings['address'], 'agriox_allowed_tags'); ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-email-1"></span>
                                </div>
                                <div class="title">
                                    <span><?php echo wp_kses($settings['email_label'], 'agriox_allowed_tags'); ?></span>
                                    <p><a href="mailto:<?php echo esc_attr($settings['email']); ?>"><?php echo esc_html($settings['email']); ?></a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon phone">
                                    <span class="icon-phone-call-2"></span>
                                </div>
                                <div class="title">
                                    <span><?php echo wp_kses($settings['phone_label'], 'agriox_allowed_tags'); ?></span>
                                    <p><a href="tel:<?php echo esc_url(str_replace(' ', '-', $settings['phone'])); ?>"><?php echo esc_html($settings['phone']); ?></a></p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Contact Page Contact Info-->