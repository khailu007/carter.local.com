<?php

namespace Layerdrops\Agriox\Widgets;


class IconBox extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-icon-box';
    }

    public function get_title()
    {
        return __('Icon Box', 'agriox-addon');
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

        $icon_box = new \Elementor\Repeater();
        $icon_box->add_control(
            'icon',
            [
                'label' => __('Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon-global-shipping',
                    'library' => 'custom-icon',
                ],
            ]
        );
   
        $icon_box->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default title', 'agriox-addon'),
                'label_block' => true,
            ]
        );


        $icon_box->add_control(
            'text',
            [
                'label' => __('Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'icon_box',
            [
                'label' => __('Icon Box', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $icon_box->get_controls(),
                'default' => [
                    [
                        'title' =>__('Default Title', 'agriox-addon'),
                        'text' => __('Default Text', 'agriox-addon'),
                        'icon' => [
                            'value' => 'icon-global-shipping',
                            'library' => 'custom-icon',
                        ],
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


        //icon box title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'icon_box_title_typography',
                'label'          => esc_html__('Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .features-four__title',
            ]
        );

        //icon box text typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'icon_box_text_typography',
                'label'          => esc_html__('Text Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .features-four__text',
            ]
        );


    $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('icon-box-one.php');
    }

}
