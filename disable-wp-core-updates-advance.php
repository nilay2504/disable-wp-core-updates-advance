<?php
/**
 * @link              http://nilaypatel.info
 * @since             1.0.0
 * @package           Disable_WP_Core_Updates_Advance
 *
 * @wordpress-plugin
 * Plugin Name:       Disable WP Core Updates Advance
 * Plugin URI:        http://nilaypatel.info
 * Description:       This plugin disable your all WordPress core updates on activation
 * Version:           1.0.0
 * Author:            Nilay Patel
 * Author URI:        http://nilaypatel.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       disable-wp-theme-updates-advance
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 */
register_activation_hook( __FILE__, 'activate_disable_wp_core_advance' );

function activate_disable_wp_core_advance() {
		update_option('DWCUA_activated_on',@date('d-m-Y h:i:s'));
}

/* This code execute once all plugin loaded */
add_action( 'plugins_loaded', 'disable_wp_core_update_loaded' );

function disable_wp_core_update_loaded() {
	
	/* Only works for wordpress 3.0+ */
	add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
	add_filter('pre_option_update_core','__return_null');
	add_filter('pre_site_transient_update_core','__return_null');

}

/**
 * The code that runs during plugin deactivation.
 */
register_deactivation_hook( __FILE__, 'deactivate_disable_wp_core_advance' );

function deactivate_disable_wp_core_advance() {
	update_option('DWCUA_deactivated_on',@date('d-m-Y h:i:s'));
}


