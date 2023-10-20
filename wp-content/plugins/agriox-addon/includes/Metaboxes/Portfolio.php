<?php

namespace Layerdrops\Agriox\Metaboxes;


class Portfolio
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'agriox_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'portfolio_option',
            'title'        => __('Portfolio Options', 'agriox-addon'),
            'object_types' => array('portfolio'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));


        $general->add_field(array(
            'name' => __('Client Name', 'agriox-addon'),
            'id' => $prefix . 'portfolio_client',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Complete Date', 'agriox-addon'),
            'id' => $prefix . 'portfolio_date',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Website', 'agriox-addon'),
            'id' => $prefix . 'portfolio_website',
            'type' => 'text',
        ));

	    $general->add_field(array(
		    'name' => __('Location', 'agriox-addon'),
		    'id' => $prefix . 'portfolio_location',
		    'type' => 'text',
	    ));

	    $general->add_field(array(
		    'name' => __('Value', 'agriox-addon'),
		    'id' => $prefix . 'portfolio_Value',
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
