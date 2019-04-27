<?php
// add_filter( 'render_block', 'wclancpa_2019_block_render', 10, 2 );
function wclancpa_2019_block_render( $block_content, $block ) {
	if ( 'core-embed/spotify' !== $block['blockName'] ) {
		return $block_content;
	} else {
		return '<div class="harper-spotify"><h3>Spotify wrapped In a container</h3>' . $block_content . '</div>';
	}
}

add_filter( 'render_block', 'wclancpa_2019_reveal_fragment', 10, 2 );
function wclancpa_2019_reveal_fragment( $block_content, $block ) {
	if ( 'reveal_slides' == get_post_type() ) {
		$block_content = "<div class='wp-block fragment' data-blockType='{$block['blockName']}'>{$block_content}</div>";
	}
		return $block_content;
}

add_action( 'enqueue_block_editor_assets', 'wclancpa_2019_block_filters', 99 );
/**
 * Enqueue block filters
 *
 * Warning: filemtime(): stat failed for /app/public/wp-content/plugins/wclancpa-2019//dist/blocks.filters.js in /app/public/wp-content/plugins/wclancpa-2019/filters/filters.php on line 17
 */
function wclancpa_2019_block_filters() {
	$filters_js_path = 'filters.js';
	// $filters_js_path = 'dist/blocks.filters.js';
	// $plugins_js_path    = '/assets/js/plugins.editor.js';
	// $plugins_style_path = '/assets/css/plugins.editor.css';
	// Enqueue our block filters
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
	$style_path = 'css/editor.css';
	wp_enqueue_style(
		'wclancpa-2019-editor',
		plugins_url( $style_path, __FILE__ ),
		[],
		time()
	);
}
add_action( 'wp_enqueue_scripts', 'enqueue_wclancpa_2019_frontend' );
function enqueue_wclancpa_2019_frontend() {
	 $style_path = 'css/interim.css';
	wp_enqueue_style(
		'wclancpa-2019-interim',
		plugins_url( $style_path, __FILE__ ),
		[],
		time()
	);
	$js_path = 'js/glitter.js';
	wp_enqueue_script(
		'wclancpa-glitter',
		plugins_url( $js_path, __FILE__ ),
		[ 'jquery' ],
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
