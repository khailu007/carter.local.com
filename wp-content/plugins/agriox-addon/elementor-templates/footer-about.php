<div class="footer-widget__column footer-widget__about">
    <div class="footer-widget__about-logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($settings['logo']['url']); ?>" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        </a>
    </div>
    <?php if (!empty($settings['text'])) : ?>
        <p class="footer-widget__about-text"><?php echo wp_kses($settings['text'], 'agriox_allowed_tags'); ?></p>
    <?php endif; ?>
    <div class="footer-widget__about-contact-box">
        <?php if (!empty($settings['phone'])) : ?>
            <p class="phone"><a href="tel:<?php echo esc_attr(str_replace(' ', '-', $settings['phone'])); ?>"><i class="fas fa-phone-square-alt"></i><?php echo esc_attr($settings['phone']); ?></a></p>
        <?php endif; ?>
        <?php if (!empty($settings['email'])) : ?>
            <p><a href="mailto:<?php echo esc_attr($settings['email']); ?>"><i class="fa fa-envelope"></i><?php echo esc_html($settings['email']); ?></a></p>
        <?php endif; ?>
        <?php if (!empty($settings['location'])) : ?>
            <p class="text"><i class="fas fa-map-marker-alt"></i><?php echo wp_kses($settings['location'], 'agriox_allowed_tags'); ?></p>
        <?php endif; ?>
    </div>
</div>