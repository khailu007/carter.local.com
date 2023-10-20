<?php

namespace Layerdrops\Agriox\Widgets;


class FooterNews extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-news';
    }

    public function get_title()
    {
        return __('Footer News', 'agriox-addon');
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
                'label' => __('Add Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('News', 'agriox-addon')
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
                    'size' => 2,
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
                'selector'       => '{{WRAPPER}} .footer-widget__title',
            ]
        );

        //post date typography
        $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'           => 'post_date_typography',
            'label'          => esc_html__('Post Date Typography', 'agriox-addon'),
            'selector'       => '{{WRAPPER}} .footer-widget__news-list-item-title p',
        ]
        );

         //post title typography
         $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'post_title_typography',
                'label'          => esc_html__('Post Title Typography', 'agriox-addon'),
                'selector'       => '{{WRAPPER}} .footer-widget__news-list-item-title h5 a',
            ]
             );

    $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('footer-news.php');
    }

}
