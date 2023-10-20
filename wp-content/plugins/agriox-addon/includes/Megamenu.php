<?php

namespace Layerdrops\Agriox;

/**
 * The admin class
 */
class Megamenu
{


	private $menu_meta_extra = array();

	/**
	 * Initialize the class
	 */
	function __construct()
	{
		add_action('admin_init', array($this, 'admin_init'), 20);

		// Custom Fields - Add
		add_filter('wp_setup_nav_menu_item', array($this, 'setup_nav_menu_item'));

		// Custom Fields - Save
		add_action('wp_update_nav_menu_item', array($this, 'update_nav_menu_item'), 100, 3);

		// Custom Walker - Edit
		add_filter('wp_edit_nav_menu_walker', array($this, 'edit_nav_menu_walker'), 100, 2);
	}

	function admin_init()
	{
		$this->menu_meta_extra = apply_filters("layerdrops_menu_edit", array());
	}
	function setup_nav_menu_item($menu_item)
	{
		$menu_item->layerdrops_megaprofile = get_post_meta($menu_item->ID, '_menu_item_layerdrops_megaprofile', true);
		$menu_item->layerdrops_custom_class = get_post_meta($menu_item->ID, '_menu_item_layerdrops_custom_class', true);
		foreach ($this->menu_meta_extra as $key => $fields) {
			$menu_item->$key = get_post_meta($menu_item->ID, '_menu_item_' . $key, true);
		}
		return $menu_item;
	}
	function update_nav_menu_item($menu_id, $menu_item_db_id, $menu_item_data)
	{
		if (isset($_REQUEST['menu-item-layerdrops-megaprofile'][$menu_item_db_id])) {
			update_post_meta($menu_item_db_id, '_menu_item_layerdrops_megaprofile', $_REQUEST['menu-item-layerdrops-megaprofile'][$menu_item_db_id]);
		}

		if (isset($_REQUEST['menu-item-layerdrops-custom-class'][$menu_item_db_id])) {
			update_post_meta($menu_item_db_id, '_menu_item_layerdrops_custom_class', $_REQUEST['menu-item-layerdrops-custom-class'][$menu_item_db_id]);
		}

		foreach ($this->menu_meta_extra as $key => $fields) {
			if (isset($_REQUEST['menu-item-' . $key][$menu_item_db_id])) {
				update_post_meta($menu_item_db_id, '_menu_item_' . $key, $_REQUEST['menu-item-' . $key][$menu_item_db_id]);
			}
		}
	}
	function edit_nav_menu_walker($walker, $menu_id)
	{
		return '\Layerdrops\Agriox\Megamenu\Walker_Nav_Menu_Edit';
	}
}
