<?php

namespace Layerdrops\Agriox\Metaboxes;


class Pricing
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'agriox_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'pricing_content',
            'title'        => __('Pricing Content', 'agriox-addon'),
            'object_types' => array('pricing'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Pricing Icon', 'agriox-addon'),
            'id' => $prefix . 'pricing_icon',
            'type' => 'pw_select',
            'options' => agriox_get_fa_icons()
        ));

        $general->add_field(array(
            'name'             => 'Is FontAwesome Icon?',
            'id'               => $prefix . 'is_fontawesome',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'yes' => __('Yes', 'agriox-addon'),
                'no'   => __('No', 'agriox-addon'),
            ),
        ));

        $general->add_field(array(
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

        $general->add_field(array(
            'name' => __('Currency Type', 'agriox-addon'),
            'id' => $prefix . 'pricing_currency',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Renewal Fee', 'agriox-addon'),
            'id' => $prefix . 'pricing_renewal_fee',
            'type' => 'text',
        ));

        $plan_options = $general->add_field(array(
            'name' => __('Plan Options', 'agriox-addon'),
            'id' => $prefix . 'plan_options',
            'type' => 'group',
        ));

        $general->add_group_field($plan_options, array(
            'name' => __('Feature Name', 'agriox-addon'),
            'id' => $prefix . 'feature_name',
            'type' => 'text',
        ));

        $general->add_group_field($plan_options, array(
            'name' => __('Is Available?', 'agriox-addon'),
            'id' => $prefix . 'feature_status',
            'type' => 'checkbox',
        ));


        $general->add_field(array(
            'name' => __('Btn Label', 'agriox-addon'),
            'id' => $prefix . 'pricing_btn_label',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Btn URL', 'agriox-addon'),
            'id' => $prefix . 'pricing_btn_url',
            'type' => 'text',
        ));
    }
}
