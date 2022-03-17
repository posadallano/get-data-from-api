<?php
/**
 * Plugin Name: Get Data from API
 * Description: A simple plugin that gets data from a public API and display it using a shortcode
 * Version: 1.0
 * Author: Andres Posada
 * Author URI: https://andresposada.dev
 */

// Exit if Accessed Directly
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

// Home content
require_once( plugin_dir_path( __FILE__ ) . 'includes/fetch-content.php' );

?>