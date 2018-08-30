<?php

/**
 * Fired during plugin activation
 *
 * @link       tasteusa.com
 * @since      1.0.0
 *
 * @package    Fest_City_Plugin
 * @subpackage Fest_City_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Fest_City_Plugin
 * @subpackage Fest_City_Plugin/includes
 * @author     Zenzin <a.zenzin.dev@gmail.com>
 */
class Fest_City_Plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        $postarr = [
            'post_title' => 'Locations',
            'post_type' => 'page'
        ];

        $post_id = wp_insert_post($postarr);
        update_post_meta($post_id, '_wp_page_template', 'page-location.php');
	    
	}

}