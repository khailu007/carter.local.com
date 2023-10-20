<?php

namespace Layerdrops\Agriox\Metaboxes;


class Team
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'agriox_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'team_option',
            'title'        => __('Team Options', 'agriox-addon'),
            'object_types' => array('team'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Designation', 'agriox-addon'),
            'id' => $prefix . 'designation',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Highlighted Text', 'agriox-addon'),
            'id' => $prefix . 'highlighted_text',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => esc_html__('Logo Image', 'agriox-addon'),
            'id'   => $prefix . 'team_logo',
            'type' => 'file',
        ));

        $team_social = $general->add_field(array(
            'name' => __('Social Profiles', 'agriox-addon'),
            'id' => $prefix . 'team_social',
            'type' => 'group',
        ));

        $general->add_group_field($team_social, array(
            'name' => __('icon', 'agriox-addon'),
            'id' => $prefix . 'icon',
            'type' => 'pw_select',
            'default' => 'fa-facebook-f',
            'options' => agriox_get_fa_icons(),
        ));

        $general->add_group_field($team_social, array(
            'name' => __('link', 'agriox-addon'),
            'id' => $prefix . 'link',
            'type' => 'text',
        ));



        $general->add_field(array(
            'name' => __('Enable Custom Footer', 'agriox-addon'),
            'id' => $prefix . 'custom_footer_status',
            'type' => 'radio',
            'options' => array(
                'on' => __('On', 'agriox-addon'),
                'off'   => __('Off', 'agriox-addon'),
            ),
        ));


        $general->add_field(array(
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
