<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       tasteusa.com
 * @since      1.0.0
 *
 * @package    Fest_City_Plugin
 * @subpackage Fest_City_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fest_City_Plugin
 * @subpackage Fest_City_Plugin/admin
 * @author     Zenzin <a.zenzin.dev@gmail.com>
 */
class Fest_City_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fest_City_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fest_City_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fest-city-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fest_City_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fest_City_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fest-city-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function custom_post_type()
    {
        register_post_type('city',
            array(
                'labels'      => array(
                    'name'          => __('Cities'),
                    'singular_name' => __('City'),
                ),
                'public'      => true,
                'has_archive' => true,
                'rewrite'     => array( 'slug' => 'city' ),
            )
        );
    }

    function register_taxonomy_city()
    {
        $labels = [
            'name'              => _x('Locations', 'taxonomy general name'),
            'singular_name'     => _x('Location', 'taxonomy singular name'),
            'search_items'      => __('Search Locations'),
            'all_items'         => __('All Locations'),
            'parent_item'       => __('Parent Location'),
            'parent_item_colon' => __('Parent Location:'),
            'edit_item'         => __('Edit Location'),
            'update_item'       => __('Update Location'),
            'add_new_item'      => __('Add New Location'),
            'new_item_name'     => __('New Location'),
            'menu_name'         => __('Locations'),
        ];
        $args = [
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'location'],
        ];
        register_taxonomy('course', ['city', 'page'], $args);
    }

}
