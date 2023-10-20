<?php

namespace Layerdrops\Agriox\Widgets;


class Features extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-features';
    }

    public function get_title()
    {
        return __('Features', 'agriox-addon');
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
            'background_image_overlay_opacity',
            [
                'label' => __('Background Overlay Opacity', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f1cf69',
                'selectors' => [
                    '{{WRAPPER}} .features-two::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $feature_box = new \Elementor\Repeater();
        $feature_box->add_control(
            'icon',
            [
                'label' => __('Feature Box Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'icon-information',
                    'library' => 'custom-icon',
                ],
            ]
        );
   
        $feature_box->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default title', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $feature_box->add_control(
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

        $feature_box->add_control(
            'text',
            [
                'label' => __('Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Text', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'feature_boxes',
            [
                'label' => __('Feature Boxes', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature_box->get_controls(),
                'default' => [
                    [
                        'title' =>__('Default Title', 'agriox-addon'),
                        'text' => __('Default Text', 'agriox-addon'),
                        'icon' => [
                            'value' => 'icon-information',
                            'library' => 'custom-icon',
                        ],
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'bottom_content',
            [
                'label' => __('Bottom Content', 'agriox-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'enable_bottom_content',
			[
				'label' => __( 'Enable Features Boxes Bottom Content', 'agriox-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'agriox-addon' ),
				'label_off' => __( 'Hide', 'agriox-addon' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default title', 'agriox-addon'),
                'label_block' => true,
                'condition' =>[
                  'enable_bottom_content' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default sub title', 'agriox-addon'),
                'label_block' => true,
                'condition' =>[
                    'enable_bottom_content' => 'yes'
                  ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' =>[
                    'enable_bottom_content' => 'yes'
                ],
                'default' => [
                    'value' => 'icon-phone-call-2',
                    'library' => 'custom-icon',
                ],
            ]
        );

        $this->add_control(
			'image',
			[
				'label' => __('Image', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' =>[
                    'enable_bottom_content' => 'yes'
                ],
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


        //feature box title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'feature_box_title_typography',
                'label'          => esc_html__('Feature Box Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .features-two__single-title h3',
            ]
        );

        //feature box text typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'feature_box_text_typography',
                'label'          => esc_html__('Feature Box Text Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .features-two__single-title p',
            ]
        );

        //bottom title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'bottom_title_typography',
                'label'          => esc_html__('Bottom Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .features-two__call-box-inner .title h2',
            ]
        );

        //bottom sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'bottom_subs_title_typography',
                'label'          => esc_html__('Bottom Sub Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .features-two__call-box-inner .title p',
            ]
        );

    $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('features-one.php');
    }

}
