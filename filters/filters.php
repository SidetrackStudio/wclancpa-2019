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


add_action( 'wp_enqueue_scripts', 'enqueue_wclancpa_2019_frontend' );
function enqueue_wclancpa_2019_frontend() {
	  $style_path = 'css/interim.css';
	wp_enqueue_style(
		'wclancpa-2019-interim',
		plugins_url( $style_path, __FILE__ ),
		[],
		time()
	);
}

