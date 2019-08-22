<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://dangngocbinh.com
 * @since             1.0.0
 * @package           Zalo_Livechat
 *
 * @wordpress-plugin
 * Plugin Name:       Zalo Live Chat
 * Plugin URI:        http://thikshare.com
 * Description:       Giúp khách hàng chat trực tiếp với Zalo của bạn
 * Version:           1.1.0
 * Author:            Dang Ngoc Binh
 * Author URI:        http://dangngocbinh.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zalo-livechat
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'ZALO_LIVECHAT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-zalo-livechat-activator.php
 */
function activate_zalo_livechat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zalo-livechat-activator.php';
	Zalo_Livechat_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-zalo-livechat-deactivator.php
 */
function deactivate_zalo_livechat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zalo-livechat-deactivator.php';
	Zalo_Livechat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_zalo_livechat' );
register_deactivation_hook( __FILE__, 'deactivate_zalo_livechat' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-zalo-livechat.php';

add_filter('plugin_action_links', 'zalo_livechat_plugin_action_links', 10, 2);

function zalo_livechat_plugin_action_links($links, $file) 
{
    if ($file == plugin_basename(dirname(__FILE__) . '/zalo-livechat.php')) 
	{
        $links[] = '<a href="options-general.php?page=zalo-livechat">'.__('Settings', 'zalolivechat').'</a>';
    }
    return $links;
}


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_zalo_livechat() {

	$plugin = new Zalo_Livechat();
	$plugin->run();

}
run_zalo_livechat();