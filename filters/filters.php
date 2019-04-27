<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; }
/**
 * Adding a block category creates a Panel
 */
function create_wclancpa_2019_panel( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'wclancpa-2019',
				'title' => __( 'WC Lancaster 2019 Panel', 'wclancpa-2019' ),
			),
		)
	);
}
add_filter( 'block_categories', 'create_wclancpa_2019_panel', 10, 2 );
/**
 * Enqueue block filters
 */
function wclancpa_2019_block_filters() {
	$filters_js_path    = 'filters.js';
	$filters_style_path = 'filters/filter-assets/css/filters-editor.css';
	// Enqueue our block filters
	wp_enqueue_script(
		'wclancpa-2019-filters-js',
		plugins_url( $filters_js_path, __FILE__ ),
		[ 'wp-hooks', 'lodash' ],
		filemtime( plugin_dir_path( __FILE__ ) . $filters_js_path ),
		true
	);

	wp_enqueue_style(
		'wclancpa-2019-editor-style',
		plugins_url( $filters_style_path, __DIR__ ),
		[ 'wp-blocks', 'wp-edit-blocks' ],
		filemtime( plugin_dir_path( __DIR__ ) . $filters_style_path )
	);
}
add_action( 'enqueue_block_editor_assets', 'wclancpa_2019_block_filters' );
