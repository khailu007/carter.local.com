<?php

namespace Layerdrops\Agriox\Widgets;


class Team extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-team';
    }

    public function get_title()
    {
        return __('Team', 'agriox-addon');
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


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'agriox-addon'),
                'condition' => [
                    'layout_type' => [ 'layout_one', 'layout_three' ]
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Sub Title', 'agriox-addon'),
                'condition' => [
                    'layout_type' => [ 'layout_one', 'layout_three' ]
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Post Options', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'select_category',
            [
                'label' => __('Post Category', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => agriox_get_taxonoy('team_cat'),
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
                'default' => [
                   
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
                'condition'      =>[
                'layout_type'    => [ 'layout_one', 'layout_three' ]
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
                'condition'      =>[
                 'layout_type'   => [ 'layout_one', 'layout_three' ]
                ]
            ]
        );

        //name typography
        $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'           => 'name_typography',
            'label'          => esc_html__('Name Typography', 'agriox-addon'),
            'selector'       => '{{WRAPPER}} .meet-farmers-one__single-title h2',
        ]
        );

        //designation typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'designation_typography',
                'label'          => esc_html__('Designation Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .meet-farmers-one__single-title p',
            ]
        );

    $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('team-one.php');
        include agriox_get_template('team-two.php');
        include agriox_get_template('team-three.php');
    }
}
