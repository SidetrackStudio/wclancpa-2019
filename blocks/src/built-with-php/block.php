<?php
/**
 * Initializes block in editor and frontend
 *
 * @package built-with-php
 */

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

/**
 * Normally blocks are registered in JS, but here are mirroring the registration of our block in php, since we want to render via php. In this way, it is here, rather than in JS that e explicitly define the attributes for the block.
 *
 * We create a shortcode, [built-with-php-shortcode], which accepts three arguments, 'value_one', 'value_two', and  'value_three'. This shortcode would be used like so:
 *
 * [built-with-php-shortcode value_one="Input some value_one attribute value" value_two="Input some value_two attribute value" value_three="Input some value_three attribute value"]
 */

/**
 * Register our block and shortcode.
 *
 * Note that we use the same function signature in PHP and JS when doing server-side rendering.
 */
function built_with_php_init() {
	// Register our block editor script.
	wp_enqueue_script(
		'built-with-php',
		plugins_url( 'block.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' )
	);
	register_block_type(
		'wclancpa-2019/built-with-php',
		array(
			'attributes'      =>
			array(
				'value_one'   => array(
					'type'    => 'string',
					'default' => 'A simple text box',
				),
				'value_two'   => array(
					'type'    => 'string',
					'default' => 'Ain\'t this purdy?',
				),
				'value_three' => array(
					'type'    => 'string',
					'default' => 'This will be more of a description.... And I could go on and on...',
				),
			),
			// The script name we gave in the wp_register_script() call.
			'editor_script'   => 'built-with-php',
			'render_callback' => 'built_with_php_render',
		)
	);

	add_shortcode( 'built-with-php-shortcode', 'built_with_php_render' );
}
add_action( 'init', 'built_with_php_init' );

/**
 * Our combined block and shortcode renderer.
 *
 * We're not using sophisticated php, so if using the shortcode we'd need to specify all three values.
 *
 * @param array $attributes The attributes set on the block or shortcode.
 */
function built_with_php_render( $attributes ) {
	$return  = '<h2 style="color:salmon;">' . ( print_r( $attributes['value_one'], true ) ?: 'value_one not defined' ) . '</h2>';
	$return .= '<h4>' . print_r( $attributes['value_two'], true ) . '</h4>';
	$return .= '<p>' . print_r( $attributes['value_three'], true ) . '</p>';
	return $return;
}
