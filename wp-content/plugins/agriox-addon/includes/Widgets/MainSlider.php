<?php

namespace Layerdrops\Agriox\Widgets;


class MainSlider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-main-slider';
    }

    public function get_title()
    {
        return __('Main Slider', 'agriox-addon');
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
            'content_section',
            [
                'label' => __('Slider Content', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $slider = new \Elementor\Repeater();


        $slider->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $slider->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'agriox-addon'),
            ]
        );

        $slider->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'agriox-addon'),
            ]
        );

        $slider->add_control(
            'text',
            [
                'label' => __('Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $slider->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $slider->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'agriox-addon'),
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
            'sliders',
            [
                'label' => __('Main Slider', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $slider->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome Title', 'agriox-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
                'selector'       => '{{WRAPPER}} .main-slider h2, .main-slider__title',
            ]
        );

        //sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__('Sub Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .main-slider-tagline',
            ]
        );

        //text typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'text_typography',
                'label'          => esc_html__('Text Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} p.main-slider__text',
                'condition'      => [
                    'layout_type'    => 'layout_one'
                ]
            ]
        );

        //button typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'button_typography',
                'label'          => esc_html__('Button Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .thm-btn',
            ]
        );


        $this->end_controls_section();

        agriox_get_elementor_carousel_options($this, ['layout_one', 'layout_two', 'layout_three']);
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('main-slider-one.php');
        include agriox_get_template('main-slider-two.php');
        include agriox_get_template('main-slider-three.php');
    }
}
