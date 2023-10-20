<?php

namespace Layerdrops\Agriox\Metaboxes;


class Service
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'agriox_';

        $accordion = new_cmb2_box(array(
            'id'           => $prefix . 'service_accordion_option',
            'title'        => __('Accordions', 'agriox-addon'),
            'object_types' => array('service'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $service_accordion = $accordion->add_field(array(
            'id' => $prefix . 'service_accordion',
            'type' => 'group',
            'options'     => array(
                'group_title'    => esc_html__('Accordion {#}', 'agriox-addon'), // {#} gets replaced by row number
                'add_button'     => esc_html__('Add Another Accordion', 'agriox-addon'),
                'remove_button'  => esc_html__('Remove Accordion', 'agriox-addon'),
                'sortable'       => false,
                'closed'      => true, // true to have the groups closed by default
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'agriox-addon' ), // Performs confirmation before removing group.
            ),
        ));

        $accordion->add_group_field($service_accordion, array(
            'name' => __('Accordion Title', 'agriox-addon'),
            'id' => $prefix . 'accordion_title',
            'type' => 'text',
        ));

        $accordion->add_group_field($service_accordion, array(
            'name' => __('Accordion Content', 'agriox-addon'),
            'id' => $prefix . 'accordion_summery',
            'type' => 'textarea',
        ));

        $accordion->add_group_field($service_accordion, array(
            'name' => __('Is Active?', 'agriox-addon'),
            'id' => $prefix . 'accordion_status',
            'type' => 'checkbox',
        ));

        $service_icon = new_cmb2_box(array(
            'id'           => $prefix . 'service_icon_option',
            'title'        => __('Icon Options', 'agriox-addon'),
            'object_types' => array('service'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $service_icon->add_field(array(
            'name' => __('Select Icon', 'agriox-addon'),
            'id' => $prefix . 'select_service_icon',
            'type' => 'pw_select',
            'options' => agriox_get_fa_icons(),
        ));


        $service_icon->add_field(array(
            'name'             => 'Is FontAwesome Icon?',
            'id'               => $prefix . 'is_fontawesome',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'yes' => __('Yes', 'agriox-addon'),
                'no'   => __('No', 'agriox-addon'),
            ),
        ));

        $service_icon->add_field(array(
            'name'             => 'Type of FontAwesome?',
            'id'               => $prefix . 'fontawesome_type',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'fas' => __('Solid', 'agriox-addon'),
                'far'   => __('Regular', 'agriox-addon'),
                'fal'   => __('Light', 'agriox-addon'),
                'fab'   => __('Brands', 'agriox-addon'),
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'is_fontawesome',
                'data-conditional-value' => 'yes',
            ),
        ));


        $service_footer = new_cmb2_box(array(
            'id'           => $prefix . 'service_footer_option',
            'title'        => __('Footer Options', 'agriox-addon'),
            'object_types' => array('service'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $service_footer->add_field(array(
            'name' => __('Enable Custom Footer', 'agriox-addon'),
            'id' => $prefix . 'custom_footer_status',
            'type' => 'radio',
            'options' => array(
                'on' => __('On', 'agriox-addon'),
                'off'   => __('Off', 'agriox-addon'),
            ),
        ));


        $service_footer->add_field(array(
            'name' => __('Select Custom Footer', 'agriox-addon'),
            'id' => $prefix . 'select_custom_footer',
            'type' => 'pw_select',
            'options' => agriox_post_query('footer'),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'custom_footer_status',
                'data-conditional-value' => 'on',
            ),
        ));
    }
}
