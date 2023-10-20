<?php

namespace Layerdrops\Agriox\Widgets;


class CallToAction extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-call-to-action';
    }

    public function get_title()
    {
        return __('Call To Action', 'agriox-addon');
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
                    'layout_four' => __('Layout Four', 'agriox-addon'),
                    'layout_five' => __('Layout Five', 'agriox-addon'),
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_first',
            [
                'label' => __('Content', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'background_image',
            [
                'label' => __('Add Background Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_three', 'layout_five']
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Add Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout_type' => ['layout_two', 'layout_three']
                ],
                'default' => [],
            ]
        );

        $this->add_control(
            'background_image_overlay_opacity',
            [
                'label' => __('Background Overlay Opacity', 'agriox-addon'),
                'condition' => [
                    'layout_type' => ['layout_one']
                ],
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(241, 207, 105, .93)',
                'selectors' => [
                    '{{WRAPPER}} .cta-one::before, .cta-one__boxed__inner' => 'background-color: {{VALUE}}',
                ],
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
            'title_icon',
            [
                'label' => __('Title Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon-farm',
                    'library' => 'custom-icon',
                ],
                'condition' => [
                    'layout_type' => 'layout_one'
                ],
            ]
        );


        $this->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_three', 'layout_five']
                ],
                'default' => __('Discover More', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_three', 'layout_five']
                ],
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

        $check_list = new \Elementor\Repeater();

        $check_list->add_control(
            'title',
            [
                'label' => __('Check List Title', 'agriox-addon'),
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
                    'library' => 'custom-icon',
                ],
            ]
        );


        $this->add_control(
            'check_list',
            [
                'label' => __('Check Lists', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [
                    'layout_type' => 'layout_two'
                ],
                'fields' => $check_list->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_control(
            'layout_four_image',
            [
                'label' => __('Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout_type' => 'layout_four'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'layout_four_url',
            [
                'label' => __('URL', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'agriox-addon'),
                'condition' => [
                    'layout_type' => 'layout_four'
                ],
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
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


        //title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'title_typography',
                'label'          => esc_html__('Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .cta-one__left-title h2,.cta-two__title, .features-one__single.style2 .features-one__single-title h3',
            ]
        );

        //Button typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'button_typography',
                'label'          => esc_html__('Button Label Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .cta-one__right-btn .thm-btn, .features-one__single.style2 .button .thm-btn',
                'condition'      => [
                    'layout_type'  => ['layout_one', 'layout_three', 'layout_four']
                ]
            ]
        );

        //checklist typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'checklist_typography',
                'label'          => esc_html__('Checklist Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .cta-two__list li',
                'condition'      => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('call-to-action-one.php');
        include agriox_get_template('call-to-action-two.php');
        include agriox_get_template('call-to-action-three.php');
        include agriox_get_template('call-to-action-four.php');
        include agriox_get_template('call-to-action-five.php');
    }
}
