<?php

namespace Layerdrops\Agriox\Widgets;


class Header extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-header';
    }

    public function get_title()
    {
        return __('Header', 'agriox-addon');
    }

    public function get_icon()
    {
        return 'eicon-cogs';
    }

    public function get_categories()
    {
        return ['agriox-category'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'layout_section',
            [
                'label' => __('Layout Type', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label' => __('Select Layout', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'agriox-addon'),
                    'layout_two' => __('Layout Two', 'agriox-addon'),
                    'layout_three' => __('Layout Three', 'agriox-addon'),
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'logo_section',
            [
                'label' => __('Site Logo', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'dark_logo',
            [
                'label' => __('Dark Logo', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'light_logo',
            [
                'label' => __('Light Logo', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'logo_dimension',
            [
                'label' => __('Logo Dimension', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
                'description' => __('Set Custom Logo Size.', 'agriox-addon'),
                'default' => [
                    'width' => '134',
                    'height' => '34',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'nav_section',
            [
                'label' => __('Navigation', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'nav_menu',
            [
                'label' => __('Select Nav Menu', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => agriox_get_nav_menu(),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //top bar
        $this->start_controls_section(
            'topbar_section',
            [
                'label' => __('Topbar', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_three']
                ]

            ]
        );

        $this->add_control(
            'topbar_status',
            [
                'label' => __('Enable Top bar?', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'agriox-addon'),
                'label_off' => __('No', 'agriox-addon'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'welcome_text',
            [
                'label' => __('Top bar Left Info Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Text', 'agriox-addon'),
                'default'     => __('Welcome to Agriculture Farming WordPress Theme', 'agriox-addon'),
                'label_block' => true,
                'condition'   => [
                    'layout_type' => 'layout_one',
                    'topbar_status' => 'yes'
                ]
            ]
        );

        $topbar_infos = new \Elementor\Repeater();

        $topbar_infos->add_control(
            'topbar_icon',
            [
                'label' => __('Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon-pin',
                    'library' => 'custom',
                ],
                'label_block' => true,
            ]
        );

        $topbar_infos->add_control(
            'topbar_info_text',
            [
                'label' => __('Topbar Right Info Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('88 Road Broklyn Golden Street. New York', 'agriox-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'topbar_infos',
            [
                'label' => __('Topbar Info', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $topbar_infos->get_controls(),
                'title_field' => '{{{ topbar_info_text }}}',
                'condition'   => [
                    'topbar_status' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'topbar_call_icon',
            [
                'label' => __('Phone Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon-phone-call-2',
                    'library' => 'custom',
                ],
                'label_block' => true,
                'condition'   => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->add_control(
            'topbar_phone_icon_text',
            [
                'label' => __('Phone Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Call Anytime', 'agriox-addon'),
                'label_block' => true,
                'condition'   => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->add_control(
            'topbar_phone_number',
            [
                'label' => __('Phone Number', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('666 888 0000', 'agriox-addon'),
                'label_block' => true,
                'condition'   => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->add_control(
            'topbar_email_icon',
            [
                'label' => __('Email Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon-message',
                    'library' => 'custom',
                ],
                'label_block' => true,
                'condition'   => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->add_control(
            'topbar_email_icon_text',
            [
                'label' => __('Email Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Write Email', 'agriox-addon'),
                'label_block' => true,
                'condition'   => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->add_control(
            'topbar_email_address',
            [
                'label' => __('Email Address', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('info@company.com', 'agriox-addon'),
                'label_block' => true,
                'condition'   => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->end_controls_section();

        //other
        $this->start_controls_section(
            'others_section',
            [
                'label' => __('Others', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'search_enable',
            [
                'label' => __('Enable Search?', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'agriox-addon'),
                'label_off' => __('No', 'agriox-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'cart_enable',
            [
                'label' => __('Display Cart Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'agriox-addon'),
                'label_off' => __('No', 'agriox-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $nav_social_icons = new \Elementor\Repeater();

        $nav_social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'brand',
                ],
                'label_block' => true,
            ]
        );

        $nav_social_icons->add_control(
            'social_url',
            [
                'label' => __('Add Url', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'agriox-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => false,
            ]
        );

        $this->add_control(
            'nav_social_icons',
            [
                'label' => __('Social Icons', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $nav_social_icons->get_controls(),
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_three']
                ],
                'default' => [
                    [
                        'social_url' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'contact_icon',
            [
                'label' => __('Contact Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon-phone-call-2',
                    'library' => 'custom-icon',
                ],
                'label_block' => true,
                'condition'   => [
                    'layout_type' => ['layout_one', 'layout_two']
                ]
            ]
        );

        $this->add_control(
            'call_number',
            [
                'label' => __('Call Number', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('92 666 888 0000', 'agriox-addon'),
                'label_block' => true,
                'condition'   => [
                    'layout_type' => ['layout_one', 'layout_two']
                ]
            ]
        );

        $this->add_control(
            'callinfo',
            [
                'label' => __('Call Info Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Call Anytime ', 'agriox-addon'),
                'label_block' => true,
                'condition'   => [
                    'layout_type' => ['layout_one', 'layout_two']
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_menu_section',
            [
                'label' => __('Mobile Drawer', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'mobile_menu_logo',
            [
                'label' => __('Mobile Drawer Logo', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'mobile_email',
            [
                'label' => __('Email', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Add Email', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'mobile_phone',
            [
                'label' => __('Phone', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Phone Number', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $mobile_menu_social_icons = new \Elementor\Repeater();

        $mobile_menu_social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => agriox_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $mobile_menu_social_icons->add_control(
            'social_url',
            [
                'label' => __('Add Url', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'agriox-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => false,
            ]
        );

        $this->add_control(
            'mobile_menu_social_icons',
            [
                'label' => __('Social Icons', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $mobile_menu_social_icons->get_controls(),
                'default' => [
                    [
                        'social_icon' => 'fa-facebook-f',
                        'social_url' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
                'title_field' => '{{{ social_icon }}}',
            ]
        );

        $this->end_controls_section();

        //General style
        $this->start_controls_section(
            'general_style',
            [
                'label' => esc_html__('Font Options', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        //title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'topbar_typography',
                'label'          => esc_html__('Top bar Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .main-header--one__top-left .text p, .main-header--one__top-right ul li .text p',
                'condition'      => [
                    'topbar_status' => 'yes',
                    'layout_type'    => 'layout_one'
                ],
            ]
        );

        //menu typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'menu_typography',
                'label'          => esc_html__('Menu Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .main-menu .main-menu__list > li > a',
            ]
        );

        //Call Info Text typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'call_info_text_typography',
                'label'          => esc_html__('Call Info Text Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .main-header--one__bottom-right .contact-box .text p',
                'condition'      => [
                    'layout_type'   => ['layout_one', 'layout_two']
                ]
            ]
        );

        //Call Number typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'call_number_typography',
                'label'          => esc_html__('Call Number Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .main-header--one__bottom-right .contact-box .text a',
                'condition'      => [
                    'layout_type'   => ['layout_one', 'layout_two']
                ]
            ]
        );

        //Top bar Phone/email Info Text typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'topbar_phone_email_text_typography',
                'label'          => esc_html__('Phone/Email Text Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .main-header-three__upper__contact p',
                'condition'      => [
                    'layout_type'   => 'layout_three'
                ]
            ]
        );

        //Top bar Phone/email  typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'topbar_phone_email_typography',
                'label'          => esc_html__('Phone/Email Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .main-header-three__upper__contact a',
                'condition'      => [
                    'layout_type'   => 'layout_three'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('header.php');
    }
}
