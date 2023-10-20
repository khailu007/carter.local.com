<?php

namespace Layerdrops\Agriox\Widgets;


class ContactForm extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-contact-form';
    }

    public function get_title()
    {
        return __('Contact Form', 'agriox-addon');
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
                'label' => __('Layout', 'agriox-addon'),
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
            'contact_form_section',
            [
                'label' => __('Contact Form', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'select_wpcf7_form',
            [
                'label'       => esc_html__('Select your contact form 7', 'agriox-addon'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => agriox_post_query('wpcf7_contact_form'),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Contents', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'agriox-addon'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Sub Title', 'agriox-addon'),
            ]
        );

        $this->add_control(
            'summary',
            [
                'label' => __('Summary', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add summary', 'agriox-addon'),
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_three']
                ]
            ]
        );

        $check_list = new \Elementor\Repeater();

        $check_list->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add title', 'agriox-addon'),
            ]
        );

        $check_list->add_control(
            'icon',
            [
                'label' => __('Check Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-check-circle',
                    'library' => 'font-awesome',
                ],
            ]
        );

        $this->add_control(
            'check_list',
            [
                'label' => __('Check Lists', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $check_list->get_controls(),
                'title_field' => '{{{ title }}}',
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __('Add Icon Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );

        $this->add_control(
            'image_one',
            [
                'label' => __('Image One', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout_type' => 'layout_one'
                ],
                'default' => [],
            ]
        );

        $this->add_control(
            'image_two',
            [
                'label' => __('Image Two', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout_type' => 'layout_one'
                ],
                'default' => [],
            ]
        );

        $this->end_controls_section();

        //other
        $this->start_controls_section(
            'others_section',
            [
                'label' => __('Others', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $social_icons = new \Elementor\Repeater();

        $social_icons->add_control(
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

        $social_icons->add_control(
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
            'social_icons',
            [
                'label' => __('Social Icons', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $social_icons->get_controls(),
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

        $this->end_controls_section();

        //General style
        $this->start_controls_section(
            'general_style',
            [
                'label' => esc_html__('Font Options', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //section title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'section_title_typography',
                'label'          => esc_html__('Section Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .sec-title__title',
            ]
        );

        //section sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'section_sub_title_typography',
                'label'          => esc_html__('Section Sub Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .sec-title__tagline',
            ]
        );

        //Summary typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'section_summary_typography',
                'label'          => esc_html__('Section Summary Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .contact-one__text, .contact-page__left-text',
                'condition'      => [
                    'layout_type'   => ['layout_one', 'layout_three']
                ]
            ]
        );

        //check list typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'checklist_typography',
                'label'          => esc_html__('Checklist Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .contact-one__lists li',
                'condition'      => [
                    'layout_type'   => 'layout_one'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('contact-form-one.php');
        include agriox_get_template('contact-form-two.php');
        include agriox_get_template('contact-form-three.php');
    }
}
