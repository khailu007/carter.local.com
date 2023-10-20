<?php

namespace Layerdrops\Agriox\Widgets;


class About extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'agriox-about';
	}

	public function get_title()
	{
		return __('About', 'agriox-addon');
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
					'layout_four' => __('Layout Four', 'agriox-addon'),
					'layout_five' => __('Layout Five', 'agriox-addon'),
					'layout_six' => __('Layout Six', 'agriox-addon'),
					'layout_seven' => __('Layout Seven', 'agriox-addon'),
					'layout_eight' => __('Layout Eight', 'agriox-addon'),
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_one',
			[
				'label' => __('Images', 'agriox-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
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
			'image_two',
			[
				'label' => __('Image Two', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition'   => [
					'layout_type' => 'layout_three'
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image_title',
			[
				'label' => __('Image Caption', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add caption', 'agriox-addon'),
				'condition'   => [
					'layout_type' => ['layout_one', 'layout_four', 'layout_five']
				]
			]
		);

		$this->add_control(
			'image_count',
			[
				'label' => __('Image Count', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Count Number', 'agriox-addon'),
				'condition'   => [
					'layout_type' => 'layout_one'
				]
			]
		);

		$this->add_control(
			'logo',
			[
				'label' => __('Add A Rounded Logo', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
				'condition'   => [
					'layout_type' => ['layout_two', 'layout_three', 'layout_six', 'layout_seven']
				]
			]
		);

		$this->add_control(
			'image_icon',
			[
				'label' => __('Image Caption Icon', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition'   => [
					'layout_type' => ['layout_one', 'layout_four']
				],
				'default' => [
					'value' => 'icon-investment',
					'library' => 'custom-icon',
				],
			]
		);

		$this->add_control(
			'icon_image',
			[
				'label' => __('Add Icon Image', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'bg_shape_image',
			[
				'label' => __('Background Shape', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'layout_type!' => ['layout_four']
				]
			]
		);

		$this->end_controls_section();

		//content
		$this->start_controls_section(
			'content_one',
			[
				'label' => __('Content', 'agriox-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sec_title',
			[
				'label' => __('Section Title', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'agriox-addon'),
			]
		);

		$this->add_control(
			'sec_subtitle',
			[
				'label' => __('Section Sub Title', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add sub title', 'agriox-addon'),
			]
		);

		$this->add_control(
			'img_bg_text',
			[
				'label' => __('Image Background Text', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Image Background Text', 'agriox-addon'),
				'default'	  => __('Healthy', 'agriox-addon'),
				'condition'	  => [
					'layout_type' => 'layout_eight'
				]
			]
		);

		$this->add_control(
			'highlighted_text',
			[
				'label' => __('Highlighted Text', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Text', 'agriox-addon'),
				'condition' => [
					'layout_type' => ['layout_one', 'layout_six']
				]
			]
		);

		$this->add_control(
			'summary',
			[
				'label' => __('Summary', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Text', 'agriox-addon'),
				'condition' => [
					'layout_type' => [
						'layout_one', 'layout_three', 'layout_five', 'layout_six', 'layout_seven', 'layout_eight'
					]
				]
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
				'condition'   => [
					'layout_type' => ['layout_one', 'layout_three', 'layout_seven']
				]
			]
		);

		$feature_box = new \Elementor\Repeater();

		$feature_box->add_control(
			'title',
			[
				'label' => __('Title', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'agriox-addon'),
			]
		);

		$feature_box->add_control(
			'text',
			[
				'label' => __('Text', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add text', 'agriox-addon'),
			]
		);

		$feature_box->add_control(
			'icon',
			[
				'label' => __('Icon', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-agriculture',
					'library' => 'custom-icon',
				],
			]
		);

		$this->add_control(
			'feature_box',
			[
				'label' => __('Feature Box', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $feature_box->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition'   => [
					'layout_type' => ['layout_two', 'layout_four', 'layout_six', 'layout_eight']
				]
			]
		);

		$progressbar = new \Elementor\Repeater();

		$progressbar->add_control(
			'title',
			[
				'label' => __('Title', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'agriox-addon'),
			]
		);

		$progressbar->add_control(
			'number',
			[
				'label' => __('Number', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Counter Number', 'agriox-addon'),
			]
		);

		$this->add_control(
			'progressbar',
			[
				'label' => __('Progress Bar', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $progressbar->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition'   => [
					'layout_type' => 'layout_three'
				]
			]
		);

		$this->add_control(
			'name',
			[
				'label' => __('Name', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Name', 'agriox-addon'),
				'default'	  => __('Mike Hardson', 'agriox-addon'),
				'condition'   => [
					'layout_type' => 'layout_three'
				]
			]
		);

		$this->add_control(
			'designation',
			[
				'label' => __('Designation', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Designation', 'agriox-addon'),
				'default'	  => __('CEO AGRIOX', 'agriox-addon'),
				'condition'   => [
					'layout_type' => 'layout_three'
				]
			]
		);

		$this->add_control(
			'button_label',
			[
				'label' => __('Button Text', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Discover More', 'agriox-addon'),
				'label_block' => true,
				'condition'   => [
					'layout_type' => ['layout_six', 'layout_seven', 'layout_eight']
				]
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => __('Button Url', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('#', 'agriox-addon'),
				'condition'   => [
					'layout_type' => ['layout_six', 'layout_seven', 'layout_eight'],
				],
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'show_label' => false,
			]
		);

		$funbox = new \Elementor\Repeater();

		$funbox->add_control(
			'title',
			[
				'label' => __('Title', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'agriox-addon'),
			]
		);

		$funbox->add_control(
			'number',
			[
				'label' => __('number', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add number', 'agriox-addon'),
				'default'	  => '755'
			]
		);

		$this->add_control(
			'funbox',
			[
				'label' => __('Funbox Box', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $funbox->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition'   => [
					'layout_type' =>  'layout_five'
				]
			]
		);

		$this->end_controls_section();

		//video
		$this->start_controls_section(
			'video',
			[
				'label' => __('video', 'agriox-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' => 'layout_one'
				]
			]
		);

		$this->add_control(
			'video_title',
			[
				'label' => __('Title', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Video Title', 'agriox-addon'),
			]
		);

		$this->add_control(
			'video_sub_title',
			[
				'label' => __('Sub Title', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Video Sub Title', 'agriox-addon'),
			]
		);

		$this->add_control(
			'video_url',
			[
				'label' => __('Add Video Url', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Video Url', 'agriox-addon'),
			]
		);

		$this->add_control(
			'video_image',
			[
				'label' => __('Video Bg Image', 'agriox-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
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

		//title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'title_typography',
				'label'          => esc_html__('Title Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .sec-title__title',
			]
		);

		//sub title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'sub_title_typography',
				'label'          => esc_html__('Sub Title Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .sec-title__tagline',
			]
		);


		//Highlight text typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'hightlight_text_typography',
				'label'          => esc_html__('Highlight Text Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .about-one__content-title, .about-three__content-box-inner h2',
				'condition'		 => [
					'layout_type' => ['layout_one', 'layout_six']
				],
			]
		);

		//summary
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'summary',
				'label'          => esc_html__('Summery Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .about-one__content-text, .about-two__content-box-text,
				.story-one__counters-text, .summary, p.about-four__text,.cta-three__text',
				'condition'		 => [
					'layout_type' => ['layout_one', 'layout_three', 'layout_five', 'layout_six', 'layout_seven', 'layout_eight']
				],
			]
		);

		//feature box title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'feature_box_title_typography',
				'label'          => esc_html__('Feature Box Title Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .providing-quality-one__content-box-list-item .text h3,
				 .features-three__list li h3, .about-three__products-list ul li h3, .cta-three__box__item__title',
				'condition'		 => [
					'layout_type' => ['layout_two', 'layout_four', 'layout_six', 'layout_eight']
				],
			]
		);

		//feature box content typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'feature_content_typography',
				'label'          => esc_html__('Feature Box Content Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .providing-quality-one__content-box-list-item .text p, .features-three__list li p, .about-three__products-list ul li p',
				'condition'		 => [
					'layout_type' => ['layout_two', 'layout_four', 'layout_six']
				],
			]
		);

		//checklist typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'checklist_typography',
				'label'          => esc_html__('Check List Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .about-one__content-list li .text p,
				 .about-two__content-box-list-single ul li .text p, .about-four__list li',
				'condition'		 => [
					'layout_type' => ['layout_one', 'layout_three', 'layout_seven']
				],
			]
		);

		//video title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'video_title_typography',
				'label'          => esc_html__('Video title Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .about-one__content-video-box-title h3',
				'condition'		 => [
					'layout_type' => ['layout_one']
				],
			]
		);

		//video title sub typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'video_sub_title_typography',
				'label'          => esc_html__('Video Sub title Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .about-one__content-video-box-title p',
				'condition'		 => [
					'layout_type' => ['layout_one']
				],
			]
		);

		//progressbar title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'progressbar_title_typography',
				'label'          => esc_html__('Progressbar Title Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .about-two__progress-title',
				'condition'		 => [
					'layout_type' => 'layout_three'
				],
			]
		);

		//name Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'name_typography',
				'label'          => esc_html__('Name Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .about-two__author h2',
				'condition'		 => [
					'layout_type' => 'layout_three'
				],
			]
		);

		//designation Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'designation_typography',
				'label'          => esc_html__('Designation Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .about-two__author h2 span',
				'condition'		 => [
					'layout_type' => 'layout_three'
				],
			]
		);

		//Button typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'button_typography',
				'label'          => esc_html__('Button Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .thm-btn',
				'condition'		 => [
					'layout_type' => ['layout_six', 'layout_seven', 'layout_eight']
				],
			]
		);

		//fun box Title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'fun_box_Title_typography',
				'label'          => esc_html__('Fun Box Title Typography', 'agriox-addon'),
				'selector'       => '{{WRAPPER}} .story-one__counters-box-single-text',
				'condition'		 => [
					'layout_type' => ['layout_five']
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include agriox_get_template('about-one.php');
		include agriox_get_template('about-two.php');
		include agriox_get_template('about-three.php');
		include agriox_get_template('about-four.php');
		include agriox_get_template('about-five.php');
		include agriox_get_template('about-six.php');
		include agriox_get_template('about-seven.php');
		include agriox_get_template('about-eight.php');
	}
}
