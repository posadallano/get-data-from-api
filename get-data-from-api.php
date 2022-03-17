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

if ( !class_exists( 'GetDataApi' ) ) {
    class GetDataApi
    {
        public static function get_api_data() {
            require_once( plugin_dir_path( __FILE__ ) . 'includes/fetch-content.php' );
        }
    }
 
    GetDataApi::get_api_data();
}

// Load CSS
function gdfa_load_plugin_css() {
    wp_enqueue_style( 'style', plugins_url( 'public/css/style.css' , __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'gdfa_load_plugin_css' );

?>