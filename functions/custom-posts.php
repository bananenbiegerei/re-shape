<?php
add_action(
	'init',
	function () {
		register_post_type('glossary', [
			'description' => __('Custom Post Type für Glossareinträge', BB_TEXT_DOMAIN),
			'labels' => [
				'name' => _x('Glossareinträge', 'Post Type General Name', BB_TEXT_DOMAIN),
				'singular_name' => _x('Glossareintrag', 'Post Type Singular Name', BB_TEXT_DOMAIN),
			],
			'supports' => ['title', 'custom-fields'],
			'taxonomies' => [],
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-megaphone',
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'rewrite' => ['slug' => 'glossar'],
			'show_in_rest' => true,
		]);
	},
	0,
);