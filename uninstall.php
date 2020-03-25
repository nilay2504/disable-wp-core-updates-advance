<?php
/**
 * Fired when the plugin is uninstalled.
 * @link              http://nilaypatel.info
 * @since             1.0.0
 * @package           Disable_WP_Core_Updates_Advance
 *
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option('DWCUA_activated_on');
delete_option('DWCUA_deactivated_on');
