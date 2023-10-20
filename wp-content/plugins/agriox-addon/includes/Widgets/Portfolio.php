<?php

namespace Layerdrops\Agriox\Widgets;


class Portfolio extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-portfolio';
    }

    public function get_title()
    {
        return __('Portfolio', 'agriox-addon');
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
                'label' => __('Content', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );




        $this->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'agriox-addon'),
                'condition'   => [
                    'layout_type' => ['layout_one', 'layout_two', 'layout_four']
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add sub title', 'agriox-addon'),
                'condition'   => [
                    'layout_type' => ['layout_one', 'layout_two', 'layout_four']
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
                        'max' => 12,
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
            'select_category',
            [
                'label' => __('Project Category', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => agriox_get_taxonoy('portfolio_cat'),
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
            'icon_image',
            [
                'label' => __('Add Icon Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout_type!' => 'layout_three'
                ],
                'default' => [],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Add button text', 'agriox-addon'),
                'default'  => __('load more', 'agriox-addon'),
                'condition'   => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'agriox-addon'),
                'show_external' => true,
                'condition' => [
                    'layout_type' => 'layout_three'
                ],
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
                'selector'       => '{{WRAPPER}} .sec-title__title',
                'condition'   => [
                    'layout_type' => ['layout_one', 'layout_two']
                ],
            ]
        );

        //sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__('Sub Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .sec-title__tagline',
                'condition'   => [
                    'layout_type' => ['layout_one', 'layout_two']
                ],
            ]
        );

        //project title
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'project_title_typography',
                'label'          => esc_html__('Project Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .projects-one__single-img .overlay-content h3',
            ]
        );

        //project category
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'project_category_typography',
                'label'          => esc_html__('Project Category Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .projects-one__single-img .overlay-content p',
            ]
        );

        //project read more button
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'project_btn_typography',
                'label'          => esc_html__('Read More Button Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .thm-btn',
                'condition'      => [
                    'layout_type'   => 'layout_three'
                ]
            ]
        );

        $this->end_controls_section();

        agriox_get_elementor_carousel_options($this, ['layout_one', 'layout_two']);
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('portfolio-one.php');
        include agriox_get_template('portfolio-two.php');
        include agriox_get_template('portfolio-three.php');
    }
}
