<?php

namespace Layerdrops\Agriox\Widgets;


class Sponsors extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'agriox-sponsors';
    }

    public function get_title()
    {
        return __('Sponsors', 'agriox-addon');
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

        $sponsor_images = new \Elementor\Repeater();

        $sponsor_images->add_control(
            'image',
            [
                'label' => __('Add Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $sponsor_images->add_control(
            'link',
            [
                'label' => __('Add Link', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'sponsor_images',
            [
                'label' => __('Box Items', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $sponsor_images->get_controls(),
            ]
        );

        $this->end_controls_section();

        agriox_get_elementor_carousel_options($this, ['layout_one', 'layout_two', 'layout_three']);
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include agriox_get_template('sponsors-one.php');
        include agriox_get_template('sponsors-two.php');
        include agriox_get_template('sponsors-three.php');
    }
}
