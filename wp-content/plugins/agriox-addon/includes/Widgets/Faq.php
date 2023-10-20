<?php

namespace Layerdrops\Agriox\Widgets;


class Faq extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'agriox-faq';
	}

	public function get_title()
	{
		return __('FAQ', 'agriox-addon');
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
                ]
            ]
        );

        $this->end_controls_section();

		//content
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'agriox-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition'=>[
				'layout_type' => 'layout_two'
				]
			]
		);

		$this->add_control(
            'title',
            [
                'label' => __('Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'agriox-addon'),
            ]
        );

		$this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Sub Title', 'agriox-addon'),
            ]
        );

		$this->add_control(
            'summary',
            [
                'label' => __('Summary', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Summary', 'agriox-addon'),
            ]
        );

		$check_list = new \Elementor\Repeater();

		$check_list->add_control(
			'title',
			[
				'label' => __('Title', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'agriox-addon'),
			]
		);

		$check_list->add_control(
			'icon',
			[
				'label' => __('Check Icon', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-check-circle',
					'library' => 'font-awesome',
				],
			]
		);

		$this->add_control(
			'check_list',
			[
				'label' => __('Check Lists', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $check_list->get_controls(),
				'title_field' => '{{{ title }}}',
                'condition'=>[
                 'layout_type'=> 'layout_two'
                ]
			]
		);

		$this->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('learn more', 'agriox-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
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
            'icon_image',
            [
                'label' => __('Add Icon Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                   
                ],
            ]
        );

		$this->add_control(
            'image',
            [
                'label' => __('Add Image', 'agriox-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                   
                ],
            ]
        );

		$this->end_controls_section();

		//faq
		$this->start_controls_section(
			'faq',
			[
				'label' => __('FAQ', 'agriox-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$faq = new \Elementor\Repeater();

		$faq->add_control(
			'question',
			[
				'label' => __('Question', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Question', 'agriox-addon'),
				'label_block' => true,
			]
		);

		$faq->add_control(
			'answer',
			[
				'label' => __('Answer', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Answer', 'agriox-addon'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'faq_lists',
			[
				'label' => __('FAQ', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $faq->get_controls(),
				'title_field' => '{{{ question }}}',
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
				'selector'       => '{{WRAPPER}} .sec-title__title',
				'condition'		 =>[
				 'layout_type'	 => 'layout_two'
				]
			]
		);

		//sub title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'sub_title_typography',
				'label'          => esc_html__('Sub Title Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .faq-one__dark .sec-title__tagline',
				'condition'		 =>[
				 'layout_type'	 => 'layout_two'
				]
			]
		);

		//Summary typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'summary_typography',
				'label'          => esc_html__('Summary Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .faq-one__dark .faq-one__inner-content-left p',
				'condition'		 =>[
				 'layout_type'	 => 'layout_two'
				]
			]
		);

		//check list typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'checklist_typography',
				'label'          => esc_html__('Check List Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .faq-one__dark .faq-one__inner-content-list li .text p',
				'condition'		 =>[
				 'layout_type'	 => 'layout_two'
				]
			]
		);

		//button typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'button_typography',
				'label'          => esc_html__('Button Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .faq-one__dark .thm-btn',
				'condition'		 =>[
					'layout_type'	 => 'layout_two'
				]
			]
		);
	

		//faq title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'faq_title_typography',
				'label'          => esc_html__('Faq Question Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .faq-one-accrodion .accrodion.active .accrodion-title h4, 
				.faq-one__dark .faq-one__accordions .accrodion:not(.active) .accrodion-title h4',
			]
		);


		//faq content typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'faq_content_typography',
				'label'          => esc_html__('Faq Answer Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .faq-one-accrodion .accrodion-content p',
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include agriox_get_template('faq-one.php');
		include agriox_get_template('faq-two.php');
	}

}
