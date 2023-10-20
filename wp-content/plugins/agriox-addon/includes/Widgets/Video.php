<?php

namespace Layerdrops\Agriox\Widgets;


class Video extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-video';
    }

    public function get_title()
    {
        return __('Video', 'agriox-addon');
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
                'placeholder' => __('Awesome Title', 'agriox-addon'),
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'agriox-addon'),
                'label_block' => true,
                'condition' => [
                 'layout_type' => [ 'layout_one', 'layout_two' ]
                ]
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'agriox-addon'),
                'condition'   =>[
                 'layout_type'=> [ 'layout_one', 'layout_two' ]
                ],
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
            'video_title',
            [
                'label' => __('Video Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Video Title', 'agriox-addon'),
                'condition'   => [
                 'layout_type' => [ 'layout_one', 'layout_two' ]
                ]
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __('Video Url', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('#', 'agriox-addon'),
                'default' => '#',
            ]
        );


        $this->add_control(
            'image',
            [
                'label' => __('Add Background Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
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
                'selector'       => '{{WRAPPER}} .video-one__title, .video-two__title',
            ]
        );

        //button typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'button_label_typography',
                'label'          => esc_html__('Button Label Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .video-one__wrpper .thm-btn',
                'condition'      => [
                'layout_type'    => [ 'layout_one', 'layout_two' ]
                ]
            ]
        );

        //video title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'video_title_typography',
                'label'          => esc_html__('Video Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .video-one__right .title h2',
                'condition'      => [
                'layout_type'    => [ 'layout_one', 'layout_two' ]
                ]
            ]
        );

       
    $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('video-one.php');
        include agriox_get_template('video-two.php');
        include agriox_get_template('video-three.php');
    }

}
