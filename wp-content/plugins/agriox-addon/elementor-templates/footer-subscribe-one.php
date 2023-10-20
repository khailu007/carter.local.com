<div class="footer-widget__column footer-widget__newletter">
  <?php if (!empty($settings['title'])) : ?>
    <h2 class="footer-widget__title"><?php echo esc_html($settings['title']); ?></h2>
  <?php endif; ?>
  <?php if (!empty($settings['text'])); ?>
  <p class="footer-widget__newletter-text"><?php echo esc_html($settings['text']); ?></p>
  <?php ?>
  <form class="subscribe-form mc-form" data-url="<?php echo esc_html($settings['mailchimp_url']); ?>">
    <input type="email" name="EMAIL" placeholder="<?php echo esc_attr($settings['mc_input_placeholder']); ?>">
    <button type="submit"><?php echo esc_html($settings['button_label']); ?></button>
  </form>
</div>