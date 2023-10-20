<?php

namespace Layerdrops\Agriox\Megamenu;

class Walker_Nav_Menu extends \Walker_Nav_Menu
{
	private $item;

	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args An array of wp_nav_menu() arguments.
	 */
	public function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 */
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		$item_html = '';
		$megamenu = apply_filters('layerdrops_enable_megamenu', true);

		if ('[divider]' === $item->title) {
			$output .= '<li class="menu-item-divider"></li>';
			return;
		}

		$extra_menu_custom = apply_filters("layerdrops_menu_edit", array());

		foreach ($extra_menu_custom as $key => $f) {
			$val = get_post_meta($item->ID, '_menu_item_' . $key, true);
			if (!empty($val)) {
				$item->classes[] = $val;
			}
		}

		add_filter('nav_menu_link_attributes', function ($atts, $item) {
			if (isset($item->layerdrops_custom_class) && !empty($item->layerdrops_custom_class)) {
				if (!isset($atts['class']) || empty($atts['class'])) {
					$atts['class'] = $item->layerdrops_custom_class;
				}
			}

			return $atts;
		}, 10, 2);
		if (!empty($item->layerdrops_megaprofile) && $megamenu) {
			$item->classes[] = 'megamenu';
			$item->classes[] = 'megamenu-style-alt';
			$item->classes[] = 'menu-item-has-children';
		}

		if (!empty($args->local_scroll) && $depth === 0) {
			$item->classes[] = 'local-scroll';
		}



		parent::start_el($item_html, $item, $depth, $args, $id);

		if (isset($args->old_link_before)) {

			$args->link_before = $args->old_link_before;
			$args->old_link_before = '';
		}

		if (isset($args->old_link_after)) {
			$args->link_after = $args->old_link_after;
			$args->old_link_after = '';
		}

		if (!empty($item->layerdrops_megaprofile)) {
			$item_html .= $this->get_megamenu($item->layerdrops_megaprofile);
		}

		$output .= $item_html;
	}

	public function get_megamenu($id)
	{
		$content = \Elementor\Plugin::$instance->frontend->get_builder_content($id);
		return '<ul class="sub-menu"><li>' . $content . '</li></ul>';
	}


	public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
	{

		// check whether this item has children, and set $item->hasChildren accordingly
		$element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}
