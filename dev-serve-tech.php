<?php
/**
 * Plugin Name: DEV Serve Tech
 * Description: A custom Elementor widget with toggle/expand functionality.
 * Version: 1.0
 * Author: SERVETECH
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define('DEV_PLUGIN_VERSION', time());
// Load widget class
function eeb_register_widget( $widgets_manager) {
    require_once( __DIR__ . '/classes/widgets/widget-expand-box.php' );
    // require_once( __DIR__ . '/classes/widgets/widget-our-team.php' );
    $widgets_manager->register( new \EEB_Expand_Box() );
    // $widgets_manager->register( new \Our_Team_Widget() );

}
add_action( 'elementor/widgets/register', 'eeb_register_widget' );

// Enqueue frontend JS/CSS
function eeb_assets() {
    wp_enqueue_script(
        'eeb-toggle',
        plugins_url( 'assets/js/toggle.js', __FILE__ ),
        [ 'jquery' ],
        DEV_PLUGIN_VERSION,
        true
    );
    wp_enqueue_style(
        'eeb-style',
        plugins_url( 'assets/css/style.css', __FILE__ ),
        [],
        DEV_PLUGIN_VERSION
    );
}
add_action( 'wp_enqueue_scripts', 'eeb_assets' );
