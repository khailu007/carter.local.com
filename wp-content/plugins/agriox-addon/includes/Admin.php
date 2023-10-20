<?php

namespace Layerdrops\Agriox;

/**
 * The admin class
 */
class Admin
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        new Metaboxes\Page();
        new Metaboxes\Service();
        new Metaboxes\Team();
        new Metaboxes\Portfolio();
        new Metaboxes\Testimonial();
        new Metaboxes\Pricing();
    }
}
