<?php

namespace Layerdrops\Agriox\Megamenu;

class Walker_Nav_Menu_Edit extends \Walker_Nav_Menu_Edit
{
	protected $mega_locations;

	//    private $extra_menu= $extra_menu_custom;

	function __construct()
	{

		$this->megamenus = get_posts(array(
			'post_type' => 'megamenu',
			'posts_per_page' => '-1'
		));
		$this->walker_args = array(
			'depth' => 0,
			'child_of' => 0,
			'selected' => 0,
			'value_field' => 'ID'
		);
	}

	/**
	 * Start the element output.
	 *
	 * @see Walker_Nav_Menu::start_el()
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		$item_output = '';
		parent::start_el($item_output, $item, $depth, $args, $id);

		// Adding new Fields
		$item_output = str_replace('<fieldset class="field-move', $this->get_fields($item, $depth, $args, $id) . '<fieldset class="field-move', $item_output);

		$output .= $item_output;
	}

	function get_fields($item, $depth = 0, $args = array(), $id = 0)
	{
		$enable_megamenu = apply_filters('layerdrops_enable_megamenu', true);
		$this->mega_locations = apply_filters('layerdrops_locations', array('menu-1'));
		$check_mega = true;
		$nav_menu_selected_id = isset($_REQUEST['menu']) ? (int)$_REQUEST['menu'] : intval(get_user_option('nav_menu_recently_edited'));
		$locations = get_registered_nav_menus();
		$menu_locations = get_nav_menu_locations();
		$key = array_search($nav_menu_selected_id, $menu_locations, true);
		if (in_array($nav_menu_selected_id, $menu_locations) && isset($locations[$key]) && in_array($key, $this->mega_locations)) {
			$check_mega = true;
		}

		ob_start();

		$item_id = esc_attr($item->ID);
?>

		<?php if (0 === $depth && $check_mega && $enable_megamenu === true) : ?>
			<p class="description description-wide">
				<label for="edit-menu-item-layerdrops-megaprofile-<?php echo esc_attr($item_id); ?>">
					<?php esc_html_e('Select Mega Menu', 'linoor-addon'); ?><br />
					<select id="edit-menu-item-layerdrops-megaprofile-<?php echo esc_attr($item_id); ?>" class="widefat" name="menu-item-layerdrops-megaprofile[<?php echo esc_attr($item_id); ?>]">
						<option value="0"><?php esc_html_e('None', 'linoor-addon') ?></option>
						<?php
						$r = $this->walker_args;
						$r['selected'] = $item->layerdrops_megaprofile;
						echo walk_page_dropdown_tree($this->megamenus, $r['depth'], $r);
						?>
					</select>
				</label>
			</p>
		<?php endif; ?>


		<?php if (0 === $depth) : ?>

			<p class="description description-wide">
				<label for="menu-item-layerdrops-menu-marker-<?php echo esc_attr($item_id); ?>">
					<?php esc_html_e('Marker', 'linoor-addon'); ?><br />
					<input type="text" min="0" id="menu-item-layerdrops-menu-marker-<?php echo esc_attr($item_id); ?>" class="widefat menu-item-layerdrops-menu-marker" name="menu-item-layerdrops-menu-marker[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item->ct_menu_marker); ?>" />
				</label>
			</p>

			<p class="description description-wide">
				<label for="menu-item-layerdrops-custom-class-<?php echo esc_attr($item_id); ?>">
					<?php esc_html_e('Custom class', 'linoor-addon'); ?><br />
					<input type="text" min="0" id="menu-item-layerdrops-custom-class-<?php echo esc_attr($item_id); ?>" class="widefat menu-item-layerdrops-custom-class" name="menu-item-layerdrops-custom-class[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item->ct_custom_class); ?>" />
				</label>
			</p>
			<?php endif;
		global $extra_menu_custom;
		if (!empty($extra_menu_custom)) {
			foreach ($extra_menu_custom as $key => $fields) {
				$fields["allow_primary"] = isset($fields["allow_primary"]) ? $fields["allow_primary"] : true;
				if (in_array($depth, $fields['lever_support']) && (($check_mega === true && $fields["allow_primary"] === true) || $fields["allow_primary"] === false)) :
			?>
					<p class="description description-wide">
						<label for="menu-item-<?php echo esc_attr($key) ?>-<?php echo esc_attr($item_id); ?>">
							<?php echo esc_attr($fields['label']) ?><br />
							<select id="menu-item-<?php echo esc_attr($key) ?>-<?php echo esc_attr($item_id); ?>" class="widefat menu-item-<?php echo esc_attr($key) ?>" name="menu-item-<?php echo esc_attr($key) ?>[<?php echo esc_attr($item_id); ?>]">
								<?php
								foreach ($fields["options"] as $val => $text) {
								?>
									<option value="<?php echo esc_attr($val) ?>" <?php selected(esc_attr($item->$key), $val) ?>><?php echo esc_attr($text) ?></option>
								<?php
								}
								?>
							</select>
						</label>
					</p>
		<?php
				endif;
			}
		}

		?>

<?php
		return ob_get_clean();
	}
}
