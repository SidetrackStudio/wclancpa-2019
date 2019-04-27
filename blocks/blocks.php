<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

function wclancpa_2019_assets() {

	// Register our block script with WordPress
	wp_register_script(
		'wclancpa-2019-js',
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-i18n' ),
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ),
		true
	);

	// // Register our block's base CSS
	// wp_register_style(
	// 'wclancpa-2019-block-style',
	// plugins_url( '/blocks/dist/blocks.style.build.css', __FILE__ ),
	// array( 'wp-blocks' )
	// );
	// Register our block's editor-specific CSS
	wp_register_style(
		'wclancpa-2019-block-edit-style',
		plugins_url( '/blocks/dist/blocks.editor.build.css', __FILE__ ),
		array( 'wp-edit-blocks' )
	);
	// Enqueue the script in the editor
	register_block_type(
		'wclancpa-2019/wclancpa-2019-block',
		array(
			'editor_script' => 'wclancpa-2019-js',
			'editor_style'  => 'wclancpa-2019-block-edit-style',
		// 'style' => 'wclancpa-2019-block-edit-style'
		)
	);

}

add_action( 'init', 'wclancpa_2019_assets' );
