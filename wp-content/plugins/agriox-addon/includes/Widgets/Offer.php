<?php

namespace Layerdrops\Agriox\Widgets;


class Offer extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-offer-slider';
    }

    public function get_title()
    {
        return __('Offer', 'agriox-addon');
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
                'label' => __('Offer Content', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $offer = new \Elementor\Repeater();


        $offer->add_control(
            'image',
            [
                'label' => __('Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $offer->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'agriox-addon'),
            ]
        );

        $offer->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'agriox-addon'),
            ]
        );

        $offer->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Shop Now', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $offer->add_control(
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
            'offers',
            [
                'label' => __('Offers', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $offer->get_controls(),
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
                'selector'       => '{{WRAPPER}} .offer-one__title',
            ]
        );

        //sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__('Sub Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .offer-one__tagline',
            ]
        );


        //button typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'button_typography',
                'label'          => esc_html__('Button Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .offer-one__link',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('offer-one.php');

    }

}
