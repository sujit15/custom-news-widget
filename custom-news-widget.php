<?php
/**
 * Plugin Name: Custom News Widget
 * Description: News Widget Plugin for WordPress
 * Author: Sujit
 * version: 1.0
 * license: GPLv3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/* Plugin Root Directory Path */
define( 'CNW_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * Included Files
 */
include_once( CNW_PLUGIN_DIR . '/includes/class-cnw-cpt.php' );
include_once( CNW_PLUGIN_DIR . '/includes/class-cnw-widget.php' );