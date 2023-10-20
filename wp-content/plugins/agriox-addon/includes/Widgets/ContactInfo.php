<?php

namespace Layerdrops\Agriox\Widgets;


class ContactInfo extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-contact-info';
    }

    public function get_title()
    {
        return __('Contact Info', 'agriox-addon');
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
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Get in Touch ', 'agriox-addon')
            ]
        );

        $this->add_control(
            'phone',
            [
                'label' => __('Phone Number', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('666 888 0000', 'agriox-addon')
            ]
        );

        $this->add_control(
            'phone_label',
            [
                'label' => __('Phone Label', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Call Anytime ', 'agriox-addon')
            ]
        );

        $this->add_control(
            'email',
            [
                'label' => __('Email', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'contact@domain.com'
            ]
        );


        $this->add_control(
            'email_label',
            [
                'label' => __('Email Label', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Send Email', 'agriox-addon')
            ]
        );

        $this->add_control(
            'address',
            [
                'label' => __('address', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'address_label',
            [
                'label' => __('Address Label', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Visit Our Store', 'agriox-addon')
            ]
        );

        $this->end_controls_section();

        //General style layout one
        $this->start_controls_section(
            'general_style_one',
            [
                'label'      => esc_html__('Font Options', 'agriox-addon'),
                'tab'        => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        //section title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'section_title_typography',
                'label'          => esc_html__('Section Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .contact-page__contact-info-title h2',
            ]
        );

        //info header typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'info_header_typography',
                'label'          => esc_html__('Info Header Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .contact-page__contact-info-list ul li .title span',
            ]
        );

        //info typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'info_typography',
                'label'          => esc_html__('Info Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .contact-page__contact-info-list ul li .title p',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('contact-info-one.php');
    }
}
