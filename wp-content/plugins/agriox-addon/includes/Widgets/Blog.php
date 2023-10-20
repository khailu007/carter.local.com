<?php

namespace Layerdrops\Agriox\Widgets;


class Blog extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-blog';
    }

    public function get_title()
    {
        return __('Blog', 'agriox-addon');
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
                    'layout_six' => __('Layout Six', 'agriox-addon'),
                ]
            ]
        );


        $this->add_control(
            'pagination_status',
            [
                'label' => __('Enable Pagination?', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'agriox-addon'),
                'label_off' => __('No', 'agriox-addon'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_three', 'layout_five', 'layout_six']
                ]
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'agriox-addon'),
                'condition'   => [
                    'layout_type!' => ['layout_three', 'layout_five', 'layout_six']
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Sub Title', 'agriox-addon'),
                'condition'  => [
                    'layout_type!' => ['layout_three', 'layout_five', 'layout_six']
                ]
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Content', 'agriox-addon'),
                'condition'   => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __('Add Section Icon Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
                'condition' => [
                    'layout_type!' => ['layout_three', 'layout_five', 'layout_six']
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
                    'layout_type' => ['layout_one', 'layout_two', 'layout_four']
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
                    'layout_type' => ['layout_one', 'layout_two', 'layout_four']
                ],
            ]
        );

        //content typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'content_typography',
                'label'          => esc_html__('Content Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .blog-two__left-text',
                'condition'   => [
                    'layout_type' => ['layout_two']
                ],
            ]
        );

        //post title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'post_title_typography',
                'label'          => esc_html__('Post Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .blog-one__single-content h2',
            ]
        );


        //post meta typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'post_meta_typography',
                'label'          => esc_html__('Post Meta Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .blog-one__single-content .meta-info li a',
            ]
        );

        $this->end_controls_section();

        agriox_get_elementor_carousel_options($this, 'layout_two');
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('blog-one.php');
        include agriox_get_template('blog-two.php');
        include agriox_get_template('blog-three.php');
        include agriox_get_template('blog-four.php');
        include agriox_get_template('blog-five.php');
        include agriox_get_template('blog-six.php');
    }
}
