<?php

// Load all BB blocks, or select them via ACF Options page
define('BB_LOAD_ALL_BB_BLOCKS', true);
// Define this to limit which WP blocks will be loaded
define('BB_ALLOWED_WP_BLOCKS', ['core/group', 'core/column', 'core/columns', 'core/html', 'core/file']);

require_once get_template_directory() . '/bb-blocks/init.php';

if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	]);
}
