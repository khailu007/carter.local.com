<?php

namespace Layerdrops\Agriox\Widgets;


class Testimonials extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-testimonials';
    }

    public function get_title()
    {
        return __('Testimonials', 'agriox-addon');
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
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'sec_title',
            [
                'label' => __('Section Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'agriox-addon'),
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'sec_sub_title',
            [
                'label' => __('Section Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Text', 'agriox-addon'),
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );


        $this->add_control(
            'post_count',
            [
                'label' => __('Number Of Posts', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
            ]
        );

        $this->add_control(
            'post_word_count',
            [
                'label' => __('Word Count In Excerpt', 'agriox-addon'),
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
                    'size' => 27,
                ],
            ]
        );

        $this->add_control(
            'select_category',
            [
                'label' => __('Post Category', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => agriox_get_taxonoy('testimonial_cat'),
            ]
        );

        $this->add_control(
            'query_order',
            [
                'label' => __('Select Order', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'DESC',
                'options' => [
                    'DESC' => __('DESC', 'agriox-addon'),
                    'ASC' => __('ASC', 'agriox-addon'),
                ]
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => __('Add Background Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
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
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        //sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__('Sub Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .sec-title__tagline',
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        //name
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'name_typography',
                'label'          => esc_html__('Name Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .testimonials-one__single-client-info-title h4',
            ]
        );

        //designation
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'designation_typography',
                'label'          => esc_html__('Designation Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .testimonials-one__single-client-info-title p',
            ]
        );

        //testimonial
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'testimonial_typography',
                'label'          => esc_html__('Testimonial Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .testimonials-one__single-text',
            ]
        );

        $this->end_controls_section();

        agriox_get_elementor_carousel_options($this, 'layout_one');
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('testimonials-one.php');
        include agriox_get_template('testimonials-two.php');
    }
}
