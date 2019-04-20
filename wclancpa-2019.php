<?php
/**
 * Plugin Name: WC Lancaster 2019
 * Plugin URI: https://github.com/SidetrackStudio/wclancpa-2019
 * Description: Demonstration of building WordPress blocks and employing filters to modify existing blocks. Find code <a href="https://github.com/SidetrackStudio/wclancpa-2019">in this repository</a>.
 * Author: pbrocks
 * Author URI: https://github.com/pbrocks
 * License: GPL-3.0
 * Version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'blocks/src/blocks.php';
require 'blocks/src/built-with-php/block.php';

add_action( 'init', 'initialize_wclancpa_2019' );
function initialize_wclancpa_2019() {
	wp_enqueue_style( 'wclancpa-2019-style', plugins_url( '/blocks/dist/blocks.style.build.css', __FILE__ ), [ 'wp-blocks' ], time() );
	wp_enqueue_style( 'wclancpa-2019-edit-style', plugins_url( '/blocks/dist/blocks.editor.build.css', __FILE__ ), [ 'wp-edit-blocks' ], time() );
}


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

