<?php

/**
 * Enqueueing assets, ie the thing that makes blocks go
 */
/**
 *
	$block_path = '/assets/js/frontend.blocks.js';
	wp_enqueue_script(
		'egb-blocks-frontend',
		UGB_PLUGIN_URL . $block_path,
		[],
		filemtime( UGB_PLUGIN_DIR . $block_path )
	);
 */
add_action( 'enqueue_block_editor_assets', 'enqueue_wclancpa_2019_block_editor_assets' );
/**
 * Enqueue block editor only JavaScript and CSS.
 */
function enqueue_wclancpa_2019_block_editor_assets() {
	$block_path = '/dist/blocks.build.js';
	$style_path = '/dist/blocks.editor.build.css';

	// Enqueue the bundled block JS file
	wp_enqueue_script(
		'wclancpa-2019',
		plugins_url( $block_path, __DIR__ ),
		[
			'wp-i18n',
			'wp-element',
			'wp-blocks',
			'wp-editor',
			'wp-components',
			'wp-api-fetch',
			'wp-compose',
			'wp-data',
			'lodash',
			'wp-edit-post',
			'wp-plugins',
		],
		filemtime( plugin_dir_path( __DIR__ ) . $block_path )
	);

	// Enqueue optional editor only styles
	wp_enqueue_style(
		'wclancpa-2019-editor-style',
		plugins_url( $style_path, __DIR__ ),
		[ 'wp-blocks', 'wp-edit-blocks' ],
		filemtime( plugin_dir_path( __DIR__ ) . $style_path )
	);
}

add_action( 'enqueue_block_assets', 'enqueue_wclancpa_2019_assets' );
/**
 * Enqueue front end and editor JavaScript and CSS assets.
 */
function enqueue_wclancpa_2019_assets() {
	$style_path = '/dist/blocks.style.build.css';
	wp_enqueue_style(
		'wclancpa-2019-frontend-style',
		plugins_url( $style_path, __DIR__ ),
		[ 'wp-blocks' ],
		filemtime( plugin_dir_path( __DIR__ ) . $style_path )
	);
}


/**
 * Add a page to the dashboard menu.
 *
 * @since 1.0.0
 *
 * @return array
 */
add_action( 'admin_menu', 'blocks_dashboard' );
function blocks_dashboard() {
	$slug  = preg_replace( '/_+/', '-', __FUNCTION__ );
	$label = ucwords( preg_replace( '/_+/', ' ', __FUNCTION__ ) );
	add_dashboard_page( __( $label, 'blocks-dashboard-menu' ), __( $label, 'blocks-dashboard-menu' ), 'manage_options', $slug . '.php', 'blocks_dashboard_page' );
}


/**
 * Debug Information
 *
 * @since 1.0.0
 *
 * @param bool $html Optional. Return as HTML or not
 *
 * @return string
 */
function blocks_dashboard_page() {
	echo '<div class="wrap">';
	echo '<h2>' . ucwords( preg_replace( '/_+/', ' ', __FUNCTION__ ) ) . '</h2>';
	$screen = get_current_screen();
	echo '<h4 style="color:rgba(250,128,114,.7);">Current Screen is <span style="color:rgba(250,128,114,1);">' . $screen->id . '</span></h4>';
	echo 'Your WordPress version is ' . get_bloginfo( 'version' );

	echo '<div class="add-to-sidetrac-dash" style="background:aliceblue;padding:1rem 2rem;">';
	do_action( 'add_to_sidetrac_dash' );
	echo '</div>';

	$my_theme = wp_get_theme();
	echo '<h4>Theme is ' . sprintf(
		__( '%1$s and is version %2$s', 'text-domain' ),
		$my_theme->get( 'Name' ),
		$my_theme->get( 'Version' )
	) . '</h4>';
	echo '<h4>Templates found in ' . get_template_directory() . '</h4>';
	echo '<h4>Stylesheet found in ' . get_stylesheet_directory() . '</h4>';
	echo '</div>';
}

add_action( 'add_to_sidetrac_dash', 'function_adding_to_dashboard_page' );

/**
 * Debug Information
 *
 * @since 1.0.0
 *
 * @param bool $html Optional. Return as HTML or not
 *
 * @return string
 */
function function_adding_to_dashboard_page() {
	echo '<h2>' . ucwords( preg_replace( '/_+/', ' ', __FUNCTION__ ) ) . '</h2>';
	echo '<h3>Add more info here</h3>';

	$block_path = 'dist/blocks.build.js';
	$style_path = 'dist/blocks.editor.build.css';

	echo '<h3>$block_path . ' . $block_path . '</h3>';
	echo '<h3>$style_path . ' . $style_path . '</h3>';
	echo '<h3>plugin_dir_path( __DIR__ ) . $block_path . ' . plugin_dir_path( __DIR__ ) . $block_path . '</h3>';
	echo '<h3>plugin_dir_path( __DIR__ ) . $style_path ' . plugin_dir_path( __DIR__ ) . $style_path . '</h3>';
	echo '<h3>plugins_url( $block_path, __DIR__ ) . ' . plugins_url( $block_path, __DIR__ ) . '</h3>';
	echo '<h3>plugins_url( $style_path, __DIR__ ) ' . plugins_url( $style_path, __DIR__ ) . '</h3>';
}
