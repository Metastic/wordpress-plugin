<?php
/**
 * Plugin Name: MeetPure Events
 * Plugin URI: https://meetpure.events
 * Description: A plugin to display MeetPure event information.
 * Version: 1.0
 * Author: MeetPure
 * Author URI: https://meetpure.events
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: meetpure-events
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'MEETPURE_EVENTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include the shortcodes file
require_once MEETPURE_EVENTS_PLUGIN_DIR . 'includes/shortcodes.php';

function meetpure_events_enqueue_scripts() {
    wp_enqueue_style( 'meetpure-events-style', plugin_dir_url( __FILE__ ) . 'assets/style.css' );
}
add_action( 'wp_enqueue_scripts', 'meetpure_events_enqueue_scripts' );
