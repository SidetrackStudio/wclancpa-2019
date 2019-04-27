<?php
/**
 * Plugin Name: WCLancPA 2019
 * Description: Starter plugin for Gutenberg Block Filters.
 * Text Domain: wclancpa-2019
 * Version: 1.0.1
 **/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Block Initializer.
require_once plugin_dir_path( __FILE__ ) . 'blocks/blocks.php';
require_once plugin_dir_path( __FILE__ ) . 'filters/filters.php';
