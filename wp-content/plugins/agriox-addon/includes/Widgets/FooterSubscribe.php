<?php

namespace Layerdrops\Agriox\Widgets;


class FooterSubscribe extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-subscribe';
    }

    public function get_title()
    {
        return __('Footer Subscribe', 'agriox-addon');
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
            'content_section',
            [
                'label' => __('Content', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Widget Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'agriox-addon')
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Add Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Sign up now to get daily latest news & updates from us', 'agriox-addon')
            ]
        );

        $this->add_control(
            'mailchimp_url',
            [
                'label' => __('Add Mailchimp URL', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'mc_input_placeholder',
            [
                'label' => __('Input Placeholder Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Email address', 'agriox-addon')
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label' => __('Button Label', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Go', 'agriox-addon')
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
                'selector'       => '{{WRAPPER}} .footer-widget__title',
            ]
        );

        //content typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'content_typography',
                'label'          => esc_html__('Content Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .footer-widget__newletter-text',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {


        $settings = $this->get_settings_for_display();
        include agriox_get_template('footer-subscribe-one.php');
    }
}
