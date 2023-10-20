<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agriox
 */

if (!is_active_sidebar('shop')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar('shop'); ?>
</aside><!-- #secondary -->