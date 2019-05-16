<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

// Load in our Material Design Bootstrap CSS
function mdbootstrap_styles () {
	wp_register_style('mdb', get_template_directory_uri('/mdbootstrap/mdb.css', [], 1, 'all' ));
	wp_enqueue_style('mdb');

	wp_register_style('mdb.lite', get_template_directory_uri('/mdbootstrap/mdb.lite.css', [], 1, 'all' ));
	wp_enqueue_style('mdb.lite');

	wp_register_style('animation', get_template_directory_uri('/mdbootstrap/modules/animations.css', [], 1, 'all' ));
	wp_enqueue_style('animations');
}
add_action('wp_enqueue_scripts', 'mdbootstrap_styles');
