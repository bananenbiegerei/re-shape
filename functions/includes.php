<?php
if (!function_exists('is_plugin_active')) {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// Check if ACF PRO is active
if (is_plugin_active('advanced-custom-fields-pro/acf.php')) {
	// Abort all bundling, ACF PRO plugin takes priority
	return;
}
// Check if another plugin or theme has bundled ACF
if (defined('MY_ACF_PATH')) {
	return;
}
// Define path and URL to the ACF plugin.
define('MY_ACF_PATH', get_stylesheet_directory() . '/includes/advanced-custom-fields-pro/');
define('MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/advanced-custom-fields-pro/');
// Include the ACF plugin.
include_once MY_ACF_PATH . 'acf.php';

// Customize the URL setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url($url)
{
	return MY_ACF_URL;
}

// Check if ACF free is installed
if (!file_exists(WP_PLUGIN_DIR . '/advanced-custom-fields/acf.php')) {
	// Free plugin not installed
	// Hide the ACF admin menu item.
	add_filter('acf/settings/show_admin', '__return_false');
	// Hide the ACF Updates menu
	add_filter('acf/settings/show_updates', '__return_false', 100);
}
