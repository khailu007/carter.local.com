<?php if ('layout_two' == $settings['layout_type']) : ?>
    <section class="cta-two">
        <div class="cta-two__shape"></div><!-- /.cta-two__shape -->
        <div class="container">
            <div class="cta-two__inner">
                <div class="row">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="col-lg-6 d-flex align-items-center">
                            <h2 class="cta-two__title"><?php echo esc_html($settings['title']); ?></h2><!-- /.cta-two__title -->
                        </div><!-- /.col-lg-6 -->
                    <?php endif; ?>
                    <div class="col-lg-6">
                        <div class="cta-two__right">
                            <ul class="cta-two__list list-unstyled">
                                <?php if (is_array($settings['check_list'])) : ?>
                                    <?php foreach ($settings['check_list'] as $item) : ?>
                                        <li>
                                            <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                            <?php echo esc_html($item['title']); ?>
                                        </li>
                                <?php endforeach;
                                endif; ?>
                            </ul><!-- /.cta-two__list -->
                            <?php if (!empty($settings['image'])) : ?>
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(agriox_get_thumbnail_alt($settings['image']['id'])); ?>">
                            <?php endif; ?>
                        </div><!-- /.cta-two__right -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.cta-two__inner -->
        </div><!-- /.container -->
    </section><!-- /.cta-two -->
<?php endif; ?>