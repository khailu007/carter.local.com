<?php

namespace Layerdrops\Agriox\Widgets;


class FancyBox extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-fancy-box';
    }

    public function get_title()
    {
        return __('Fancy Box', 'agriox-addon');
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


        $fancy_box = new \Elementor\Repeater();

        $fancy_box->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default title', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $fancy_box->add_control(
            'url',
            [
                'label' => __('Url', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'agriox-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => true,
            ]
        );

        $fancy_box->add_control(
            'image',
            [
                'label' => __('Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'fancy_box',
            [
                'label' => __('Fancy Box', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $fancy_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Home One', 'agriox-addon'),
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
                'name'           => 'fancy_box_title_typography',
                'label'          => esc_html__('Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} h3.home-showcase__title a',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('fancy-box-one.php');
    }
}
