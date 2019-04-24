<?php

/**
 * Display Post Blocks
 */
function show_a_posts_blocks() {
	global $post;
	echo '<pre style="white-space: pre-wrap;">';
	print_r( esc_html( $post->post_content ) );
	echo '</pre>';
}
add_action( 'wp_footer', 'show_a_posts_blocks' );

function enqueue_block_editor_scripts() {
	wp_enqueue_script(
		'block-ed-j',
		plugins_url( '/block-scripts.js', __FILE__ ),
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), // specify dependencies to avoid race condition
		'1.0',
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'enqueue_block_editor_scripts' );
// add_filter( 'render_block', 'wclancpa_2019_block_render', 10, 2 );
function wclancpa_2019_allowed_block_types( $allowed_block_types, $post ) {
	if ( $post->post_type === 'post' ) {
		return $allowed_block_types;
	}
	return array( 'core/paragraph' );
}

// add_filter( 'allowed_block_types', 'wclancpa_2019_allowed_block_types', 10, 2 );
// WP < 5.0 beta
// add_filter('gutenberg_can_edit_post', '__return_false', 5);
// WP >= 5.0
// add_filter('use_block_editor_for_post', '__return_false', 5);

/**
 * [wclancpa_2019_block_render description]
 *
 * $block Array (
	[blockName] => core-embed/spotify
	[attrs] => Array
		(
			[url] => https://open.spotify.com/album/7jmlmCKwG9KNSaNuAZd37d
			[type] => rich
			[providerNameSlug] => spotify
			[className] => is-style-peter-harper wp-embed-aspect-9-16 wp-has-aspect-ratio
		)

	[innerBlocks] => Array
		(
		)

	[innerHTML] =>
 *
 * @param  [type] $block_content [description]
 * @param  [type] $block         [description]
 * @return [type]                [description]
 */
function wclancpa_2019_block_render( $block_content, $block ) {
	// if ( 'wp-block-embed-spotify wp-block-embed is-type-rich is-provider-spotify is-style-peter-harper' === $block['attrs']['className'] ) {
		// print_r( $block_content );
		return '<pre><xmp>' . print_r( $block, true ) . '</xmp></pre><div class="spotify-container">block_content<div><img src="https://monosnap.com/image/llusm1ynaL3mDzE2lqK2WtXiPmLKp6.png" /></div><div>' . $block_content . '</div></div>';
		// }
	// } else {
	// return $block_content;
	// }
}

add_action( 'enqueue_block_editor_assets', 'wclancpa_2019_block_filters', 99 );
/**
 * Enqueue block filters
 *
 * Warning: filemtime(): stat failed for /app/public/wp-content/plugins/wclancpa-2019//dist/blocks.filters.js in /app/public/wp-content/plugins/wclancpa-2019/filters/filters.php on line 17
 */
function wclancpa_2019_block_filters() {
	$filters_js_path = 'filters.js';

	wp_enqueue_script(
		'wclancpa-2019-filters-js',
		plugins_url( $filters_js_path, __FILE__ ),
		[ 'wp-hooks', 'lodash' ],
		filemtime( plugin_dir_path( __FILE__ ) . $filters_js_path ),
		true
	);

	// Enqueue our plugin JavaScript
	// wp_enqueue_script(
	// 'wclancpa-2019-plugins-js',
	// _get_plugin_url() . $plugins_js_path,
	// $js_dependencies,
	// filemtime( _get_plugin_directory() . $plugins_js_path ),
	// true
	// );
	// Enqueue our plugin JavaScript
	// wp_enqueue_style(
	// 'wclancpa-2019-plugins-css',
	// _get_plugin_url() . $plugins_style_path,
	// [],
	// filemtime( _get_plugin_directory() . $plugins_style_path )
	// );
}
add_action( 'admin_enqueue_scripts', 'enqueue_wclancpa_2019_editor' );
function enqueue_wclancpa_2019_editor() {
	$style_path = 'editor.css';
	wp_enqueue_style(
		'wclancpa-2019-editor',
		plugins_url( $style_path, __FILE__ ),
		[],
		time()
	);
}
add_action( 'wp_enqueue_scripts', 'enqueue_wclancpa_2019_frontend' );
function enqueue_wclancpa_2019_frontend() {
	$style_path = 'interim.css';
	wp_enqueue_style(
		'wclancpa-2019-interim',
		plugins_url( $style_path, __FILE__ ),
		[],
		time()
	);
}
// add_action( 'wp_enqueue_scripts', 'frontend_assets' );
/**
 * Enqueue block frontend JavaScript
 */
function frontend_assets() {

	// $frontend_js_path = '/dist/blocks.frontend.js';
	// wp_enqueue_script(
	// 'wclancpa-2019-frontend-js',
	// _get_plugin_url() . $frontend_js_path,
	// [ 'wp-element' ],
	// filemtime( _get_plugin_directory() . $frontend_js_path ),
	// true
	// ); #editor > div > div > div > div.edit-post-sidebar > div.components-panel > div > div:nth-child(2) > div > div > div > div.editor-block-styles__item-preview
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
				// 'icon'  => 'svgIcon',
			),
		)
	);
}
add_filter( 'block_categories', 'create_wclancpa_2019_panel', 10, 2 );

