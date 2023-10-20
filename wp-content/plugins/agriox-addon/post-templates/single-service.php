<?php
get_header(); ?>

    <section class="services-details">
        <div class="container">
            <div class="row">
                <!--Start Services Details Sidebar-->
                <div class="col-xl-4 col-lg-4">
                    <div class="services-details__sidebar">
                        <!--Start Services Details Sidebar Single-->
                        <div class="services-details__sidebar-single">
                            <div class="services-details__sidebar-single-services wow fadeInUp animated animated animated"
                                data-wow-delay="0.1s" data-wow-duration="1200m">
                                <?php if( !empty( get_theme_mod( 'agriox_sidebar_menu_title' ) ) ) : ?>
                                    <div class="title">
                                        <h3><?php echo esc_html( get_theme_mod( 'agriox_sidebar_menu_title' ) ); ?></h3>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty(get_theme_mod('agriox_sidebar_menu_item'))) : ?>
                                    <?php wp_nav_menu(array(
                                        'menu' => get_theme_mod('agriox_sidebar_menu_item'),
                                        'menu_class' => 'service-details__sidebar-service-list list-unstyled',
                                        'link_after'      => '<span class="fa fa-angle-right"></span>'
                                    )); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!--End Services Details Sidebar Single-->

                        <!--Start Services Details Sidebar Single-->
                        <div class="services-details__sidebar-single">
                            <div class="services-details__sidebar-single-contact-box text-center wow fadeInUp animated animated animated"
                                data-wow-delay="0.3s" data-wow-duration="1200m"
                                style="background-image:url(<?php echo esc_url( get_theme_mod( 'agriox_sidebar_contact_bg' ) ); ?>);">
                                <div class="icon">
                                    <span class="<?php echo esc_attr( get_theme_mod( 'agriox_sidebar_contact_icon' ) ); ?>"></span>
                                </div>
                                <div class="title">
                                    <h2><?php echo wp_kses(get_theme_mod('agriox_sidebar_contact_title', __('Add Contact Title', 'agriox')), 'agriox_allowed_tags'); ?></h2>
                                </div>
                                <p class="phone"><a href="<?php echo esc_url(get_theme_mod('agriox_sidebar_contact_number_link', __('#', 'agriox'))); ?>"><?php echo esc_html(get_theme_mod('agriox_sidebar_contact_number', __('666 888 000', 'agriox'))); ?></a></p>
                                <p><?php echo wp_kses(get_theme_mod('agriox_sidebar_contact_text', __('Call Us Anytime', 'agriox')), 'agriox_allowed_tags'); ?></p>
                            </div>
                        </div>
                        <!--End Services Details Sidebar Single-->
                        <?php if( !empty( get_theme_mod( 'agriox_sidebar_pdf_title' ) ) ) : ?>
                            <!--Start Services Details Sidebar Single-->
                            <div class="services-details__sidebar-single">
                                <div class="services-details__sidebar-single-btn text-center wow fadeInUp animated animated animated"
                                    data-wow-delay="0.5s" data-wow-duration="1200m">
                                    <a href="<?php echo esc_url( get_theme_mod( 'agriox_sidebar_pdf_url' ) ); ?>" class="thm-btn"><span class="icon-pdf"></span><?php echo esc_html( get_theme_mod( 'agriox_sidebar_pdf_title' ) ); ?></a>
                                </div>
                            </div>
                            <!--End Services Details Sidebar Single-->
                        <?php endif; ?>
                    </div>
                </div>
                <!--End Services Details Sidebar-->

                <!--Start Services Details Content-->
                <div class="col-xl-8 col-lg-8">
                    <div class="services-details__content">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="services-details__content-img">
                                <?php the_post_thumbnail('agriox_service_details_770X441'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="services-details__content-icon">
                        <?php
                        $agriox_service_fontawesome = '';
                        if ('yes' == get_post_meta(get_the_ID(), 'agriox_is_fontawesome', true)) {
                            $agriox_service_fontawesome = get_post_meta(get_the_ID(), 'agriox_fontawesome_type', true);
                        }
                        ?>
                        <span class="fab <?php echo esc_attr(get_post_meta(get_the_iD(), 'agriox_select_service_icon', true) . ' ' . $agriox_service_fontawesome); ?>"></span>
                        </div>
                        <h2 class="services-details__content-title"><?php echo strip_tags( get_the_title()); ?></h2>
                        <?php the_content(); ?>
                        <div class="faq-one__accordions faq-one__accordions--services-details">
                        <?php $agriox_accordion_items = get_post_meta(get_the_ID(), 'agriox_service_accordion', true); ?>
                          <?php if (!empty($agriox_accordion_items)) : ?>
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            <?php $count = 1; ?>
                                <?php foreach ($agriox_accordion_items as $item) :  ?>
                                 <?php $get_status = isset( $item['agriox_accordion_status'] ) ?  $item['agriox_accordion_status'] : '' ; ?>
                                <!--Start Faq One Single-->
                                <div class="accrodion <?php echo esc_attr(('on' == $get_status) ? 'active' : ''); ?> wow fadeInUp" data-wow-delay="0ms">
                                    <div class="accrodion-title">
                                        <h4><?php echo wp_kses($item['agriox_accordion_title'], 'agriox_allowed_tags'); ?></h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p><?php echo wp_kses($item['agriox_accordion_summery'], 'agriox_allowed_tags'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Faq One Single-->
                            <?php $count++; ?>
                            <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <!--End Services Details Content-->
            </div>
        </div>
    </section>

<?php
get_footer();
