<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              tasteusa.com
 * @since             1.0.0
 * @package           Fest_City_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Chocolate Fest City Plugin
 * Plugin URI:        tasteusa.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Zenzin
 * Author URI:        tasteusa.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fest-city-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fest-city-plugin-activator.php
 */
function activate_fest_city_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fest-city-plugin-activator.php';
	Fest_City_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fest-city-plugin-deactivator.php
 */
function deactivate_fest_city_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fest-city-plugin-deactivator.php';
	Fest_City_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fest_city_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_fest_city_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fest-city-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fest_city_plugin() {

	$plugin = new Fest_City_Plugin();
	$plugin->run();

}
run_fest_city_plugin();
