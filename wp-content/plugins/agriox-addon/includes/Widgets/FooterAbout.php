<?php

namespace Layerdrops\Agriox\Widgets;


class FooterAbout extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-about';
    }

    public function get_title()
    {
        return __('Footer About', 'agriox-addon');
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
            'logo',
            [
                'label' => __('Add Logo', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'logo_dimension',
            [
                'label' => __('Logo Dimension', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
                'description' => __('Set Custom Logo Size.', 'agriox-addon'),
                'default' => [
                    'width' => '134',
                    'height' => '34',
                ],
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Paragraph', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'agriox-addon'),
            ]
        );

        $this->add_control(
            'phone',
            [
                'label' => __('Phone Number', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Add Phone Number', 'agriox-addon'),
                'default'     => '+92 666 888 0000'
            ]
        );

        $this->add_control(
            'email',
            [
                'label' => __('Email', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Add Email', 'agriox-addon'),
            ]
        );

        $this->add_control(
            'location',
            [
                'label' => __('Address', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Address', 'agriox-addon'),
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
                'name'           => 'paragraph_typography',
                'label'          => esc_html__('Paragraph Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .footer-widget__about-text',
            ]
        );

        //content typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'content_typography',
                'label'          => esc_html__('Content Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .footer-widget__about-contact-box .phone a, .footer-widget__about-contact-box p a, .footer-widget__about-contact-box .text',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('footer-about.php');
    }

}
