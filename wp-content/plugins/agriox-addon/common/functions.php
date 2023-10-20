<?php

/**
 * making array of custom icon classes
 * which is saved in transient
 * @return array
 */
/**
 * making array of custom icon classes
 * which is saved in transient
 * @return array
 */
/**
 * making array of custom icon classes
 * which is saved in transient
 * @return array
 */
if (!function_exists('agriox_get_fa_icons')) :

    function agriox_get_fa_icons()
    {
        $data = get_transient('agriox_fa_icons');

        if (empty($data)) {
            global $wp_filesystem;
            require_once(ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();

            $fontAwesome_file =   AGRIOX_ADDON_PATH . '/assets/vendors/fontawesome/css/all.min.css';
            $template_icon_file = AGRIOX_ADDON_PATH . '/assets/vendors/agriox-icons/style.css';
            $content = '';

            if ($wp_filesystem->exists($fontAwesome_file)) {
                $content = $wp_filesystem->get_contents($fontAwesome_file);
            } // End If Statement

            if ($wp_filesystem->exists($template_icon_file)) {
                $content .= $wp_filesystem->get_contents($template_icon_file);
            } // End If Statement

            $pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s*{\s*content/';
            $pattern_two = '/\.(icon-(?:\w+(?:-)?)+):before\s*{\s*content/';

            $subject = $content;

            preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
            preg_match_all($pattern_two, $subject, $matches_two, PREG_SET_ORDER);

            $all_matches = array_merge($matches, $matches_two);

            $icons = array();

            foreach ($all_matches as $match) {
                // $icons[] = array('value' => $match[1], 'label' => $match[1]);
                $icons[] = $match[1];
            }


            $data = $icons;
            set_transient('agriox_fa_icons', $data, 10080); // saved for one week

        }

        return array_combine($data, $data); // combined for key = value
    }


endif;

// custom kses allowed html
if (!function_exists('agriox_kses_allowed_html')) :
    function agriox_kses_allowed_html($tags, $context)
    {
        switch ($context) {
            case 'agriox_allowed_tags':
                $tags = array(
                    'a' => array('href' => array(), 'class' => array()),
                    'b' => array(),
                    'br' => array(),
                    'span' => array('class' => array(), 'data-count' => array()),
                    'img' => array('class' => array()),
                    'i' => array('class' => array()),
                    'p' => array('class' => array()),
                    'ul' => array('class' => array()),
                    'li' => array('class' => array()),
                    'div' => array('class' => array()),
                    'strong' => array()
                );
                return $tags;
            default:
                return $tags;
        }
    }

    add_filter('wp_kses_allowed_html', 'agriox_kses_allowed_html', 10, 2);

endif;

if (!function_exists('agriox_excerpt')) :

    // Post's excerpt text
    function agriox_excerpt($get_limit_value, $echo = true)
    {
        $opt = $get_limit_value;
        $excerpt_limit = !empty($opt) ? $opt : 40;
        $excerpt = wp_trim_words(get_the_content(), $excerpt_limit, '');
        if ($echo == true) {
            echo esc_html($excerpt);
        } else {
            return esc_html($excerpt);
        }
    }

endif;


if (!function_exists('agriox_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function agriox_posted_on()
    {
        $time_agrioxtring = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_agrioxtring = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_agrioxtring = sprintf(
            $time_agrioxtring,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x(' %s', 'post date', 'agriox'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_agrioxtring . '</a>'
        );

        echo '<span class="posted-on"><i class="far fa-clock"></i>' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

if (!function_exists('agriox_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function agriox_posted_by()
    {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('%s', 'post author', 'agriox'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"><i class="far fa-user-circle"></i> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

if (!function_exists('agriox_comment_count')) {
    function agriox_comment_count()
    {
        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link"><i class="far fa-comments"></i>';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'agriox'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );
            echo '</span>';
        }
    }
}

if (!function_exists('agriox_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function agriox_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(' ', 'list item separator', 'agriox'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links news-details__tags tags-info"><span>' . esc_html__('Tags %1$s', 'agriox') . '</span>', '</span>' . $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }

            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(' ', 'agriox'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-info news-details__tags cat-links"><span>' . esc_html__('Posted in %1$s', 'agriox') . '</span>', '</span>' . $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
endif;

if (!function_exists('agriox_post_query')) {
    function agriox_post_query($post_type)
    {
        $post_list = get_posts(array(
            'post_type' => $post_type,
            'showposts' => -1,
        ));
        $posts = array();

        if (!empty($post_list) && !is_wp_error($post_list)) {
            foreach ($post_list as $post) {
                $options[$post->ID] = $post->post_title;
            }
            return $options;
        }
    }
}

if (!function_exists('agriox_custom_query_pagination')) :
    /**
     * Prints HTML with post pagination links.
     */
    function agriox_custom_query_pagination($paged = '', $max_page = '')
    {
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        if (!$paged)
            $paged = get_query_var('paged');
        if (!$max_page)
            $max_page = $wp_query->max_num_pages;

        $links = paginate_links(array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'     => '?paged=%#%',
            'current'    => max(1, $paged),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>',
        ));

        echo wp_kses($links, 'agriox_allowed_tags');
    }
endif;

if (!function_exists('agriox_get_nav_menu')) :
    function agriox_get_nav_menu()
    {
        $menu_list = get_terms(array(
            'taxonomy' => 'nav_menu',
            'hide_empty' => true,
        ));
        $options = [];
        if (!empty($menu_list) && !is_wp_error($menu_list)) {
            foreach ($menu_list as $menu) {
                $options[$menu->slug] = $menu->name;
            }
            return $options;
        }
    }
endif;

if (!function_exists('agriox_get_taxonoy')) :
    function agriox_get_taxonoy($taxonoy)
    {
        $taxonomy_list = get_terms(array(
            'taxonomy' => $taxonoy,
            'hide_empty' => true,
        ));
        $options = [];
        if (!empty($taxonomy_list) && !is_wp_error($taxonomy_list)) {
            foreach ($taxonomy_list as $taxonomy) {
                $options[$taxonomy->slug] = $taxonomy->name;
            }
            return $options;
        }
    }
endif;

if (!function_exists('agriox_get_template')) :
    function agriox_get_template($template_name = null)
    {
        $template_path = apply_filters('agriox-elementor/template-path', 'elementor-templates/');
        $template = locate_template($template_path . $template_name);
        if (!$template) {
            $template = AGRIOX_ADDON_PATH  . '/elementor-templates/' . $template_name;
        }
        if (file_exists($template)) {
            return $template;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('agriox_get_thumbnail_alt')) :
    function agriox_get_thumbnail_alt($thumbnail_id)
    {
        return get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    }
endif;


if (!function_exists('agriox_get_owl_options')) :
    function agriox_get_owl_options($settings)
    {
        $loop_status = ('yes' == $settings['loop']) ? 'true' : 'false';
        $nav_status = ('yes' == $settings['enable_nav']) ? 'true' : 'false';
        $dots_status = ('yes' == $settings['enable_dots']) ? 'true' : 'false';
        if ('yes' == $settings['enable_nav']) {
            $nav_left_icon = $settings['nav_left_icon']['value'];
            $nav_right_icon = $settings['nav_right_icon']['value'];
        }
        $items = $settings['items']['size'];
        $margin = $settings['margin']['size'];
        $smart_speed = $settings['smart_speed']['size'];
        $breakpoint = $settings['breakpoint'];
        ob_start(); ?>
        {
        "loop": <?php echo esc_attr($loop_status) ?>,
        "margin": <?php echo esc_attr($margin) ?>,
        "items": <?php echo esc_attr($items) ?>
        ,"nav": <?php echo esc_attr($nav_status) ?>
        <?php if ('yes' == $settings['enable_nav']) :  ?>
            ,"navText": [
            "<i class=\" <?php echo esc_attr($nav_left_icon) ?>\"></i>",
            "<i class=\" <?php echo esc_attr($nav_right_icon) ?>\"></i>"
            ]
        <?php endif; ?>
        ,"dots": <?php echo esc_attr($dots_status) ?>
        ,"smartSpeed": <?php echo esc_attr($smart_speed) ?>

        <?php if (!empty($breakpoint)) :  ?>
            ,
            "responsive":
            {
            <?php foreach ($breakpoint as $item) : ?>
                "<?php echo esc_attr($item['screen_size']['size']); ?>": {
                "margin": <?php echo esc_attr($item['margin']['size']); ?>,
                "items": <?php echo esc_attr($item['item']['size']); ?>
                }<?php echo esc_attr($item != end($breakpoint) ? ',' : ''); ?>
            <?php endforeach; ?>
            }
        <?php endif; ?>
        }
    <?php return ob_get_clean();
    }
endif;

if (!function_exists('agriox_get_swiper_options')) :
    function agriox_get_swiper_options($settings, $pagination_id = false)
    {
        $loop_status = ('yes' == $settings['loop']) ? 'true' : 'false';
        $autoplay_status = ('yes' == $settings['autoplay']) ? 'true' : 'false';
        $delay = $settings['delay']['size'];
        $items = $settings['items']['size'];
        $margin = $settings['margin']['size'];
        $breakpoint = $settings['breakpoint'];
        ob_start(); ?>

        {
        "loop": <?php echo esc_attr($loop_status); ?>,
        "spaceBetween": <?php echo esc_attr($margin); ?>,
        "slidesPerView": <?php echo esc_attr($items); ?>
        <?php if ('true' == $autoplay_status) : ?>
            ,"autoplay": { "delay": <?php echo esc_attr($delay); ?> }
        <?php endif; ?>
        <?php if ('yes' == $settings['enable_dots']) : ?>
            ,"pagination": {
            "el": "#<?php echo esc_attr($pagination_id); ?>",
            "type": "bullets",
            "clickable": true
            }
        <?php endif; ?>
        <?php if (!empty($breakpoint)) :  ?>
            ,"breakpoints": {
            <?php foreach ($breakpoint as $item) : ?>
                "<?php echo esc_attr($item['screen_size']['size']); ?>": {
                "spaceBetween": <?php echo esc_attr($item['margin']['size']); ?>,
                "slidesPerView": <?php echo esc_attr($item['item']['size']); ?>
                }<?php echo esc_attr($item != end($breakpoint) ? ',' : ''); ?>
                <?php endforeach; ?>}
            <?php endif; ?>
            }
    <?php return ob_get_clean();
    }
endif;

if (!function_exists('agriox_get_elementor_carousel_options')) :
    function agriox_get_elementor_carousel_options($arg, $condition = false)
    {

        if (!empty($condition)) :
            $arg->start_controls_section(
                'slider_options',
                [
                    'label' => __('Slider Options', 'agriox-addon'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout_type' => $condition
                    ]
                ]
            );
        else :
            $arg->start_controls_section(
                'slider_options',
                [
                    'label' => __('Slider Options', 'agriox-addon'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
        endif;


        $arg->add_control(
            'autoplay',
            [
                'label' => esc_html__('AutoPlay', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'agriox-addon'),
                'label_off' => esc_html__('No', 'agriox-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $arg->add_control(
            'delay',
            [
                'label' => __('AutoPlay Delay', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],

                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 5000,
                ],
            ]
        );

        $arg->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'agriox-addon'),
                'label_off' => esc_html__('No', 'agriox-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $arg->add_control(
            'enable_nav',
            [
                'label' => esc_html__('Display Nav', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'agriox-addon'),
                'label_off' => esc_html__('No', 'agriox-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $arg->add_control(
            'nav_left_icon',
            [
                'label' => esc_html__('Nav Left Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'enable_nav' => 'yes'
                ],
                'default' => [
                    'value' => 'fa fa-angle-left',
                    'library' => 'solid',
                ],
            ]
        );

        $arg->add_control(
            'nav_right_icon',
            [
                'label' => esc_html__('Nav Right Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'enable_nav' => 'yes'
                ],
                'default' => [
                    'value' => 'fa fa-angle-right',
                    'library' => 'solid',
                ],
            ]
        );

        $arg->add_control(
            'enable_dots',
            [
                'label' => esc_html__('Display Dots', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'agriox-addon'),
                'label_off' => esc_html__('No', 'agriox-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $arg->add_control(
            'smart_speed',
            [
                'label' => __('Smart Speed', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],

                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 700,
                ],
            ]
        );


        $arg->add_control(
            'items',
            [
                'label' => __('Slide Items', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 1,
                ],
            ]
        );

        $arg->add_control(
            'margin',
            [
                'label' => __('Margin', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 1,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 0,
                ],
            ]
        );


        $breakpoint = new \Elementor\Repeater();

        $breakpoint->add_control(
            'screen_size',
            [
                'label' => __('Screen Size', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 1920,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 0,
                ],
            ]
        );

        $breakpoint->add_control(
            'item',
            [
                'label' => __('Slide Item', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 1,
                ],
            ]
        );

        $breakpoint->add_control(
            'margin',
            [
                'label' => __('Margin', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 1,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 0,
                ],
            ]
        );

        $arg->add_control(
            'breakpoint',
            [
                'label' => __('Breakpoints', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'fields' => $breakpoint->get_controls(),
            ]
        );

        $arg->end_controls_section();
    }
endif;
