<?php

namespace Layerdrops\Agriox\Metaboxes;


class Testimonial
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'agriox_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'testimonial_option',
            'title'        => __('Testimonial Options', 'agriox-addon'),
            'object_types' => array('testimonial'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Content', 'agriox-addon'),
            'id' => $prefix . 'content',
            'type' => 'textarea',
        ));
        $general->add_field(array(
            'name' => __('Designation', 'agriox-addon'),
            'id' => $prefix . 'designation',
            'type' => 'text',
        ));
    }
}
