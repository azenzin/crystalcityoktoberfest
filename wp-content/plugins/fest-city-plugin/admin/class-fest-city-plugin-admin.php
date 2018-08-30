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


    function reg_vc_param(){
        $weightOts = ['default','bold','bolder','lighter','normal','100','200','300','400','500','600','700','800','900'];
        $transfOts = ['none','capitalize','uppercase','lowercase'];
        vc_map( array(
            "name" => __( "Linked Thumbnails Grid"),
            "base" => "LTGS",
            "class" => "",
            "category" => 'shortcodes',
            "params" => array(
                array(
                    "type" => "vc_cat_param",
                    "class" => "",
                    'emptyTitle' => "All",
                    "heading" => __("Categories"),
                    "param_name" => "cat",
                    "description" => __( "Select Categories"),
                    'group' => 'General'
                ),
                array(
                    "type" => "vc_cat_param",
                    "class" => "",
                    "heading" => __("Exclude Categories"),
                    "param_name" => "cat_excl",
                    'emptyTitle' => "none",
                    "description" => __( "Select Categories"),
                    'group' => 'General'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Columns", "js_composer"),
                    "param_name" => "col",
                    "value" => [1,2,3,4,6],
                    "std" => get_option('col')? get_option('col') : 4,
                    "description" => __( "Select Columns Number"),
                    'group' => 'General'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Container Max Width (px)"),
                    "param_name" => "cont_max_w",
                    'value' => get_option('cont_max_w')? get_option('cont_max_w') : 1400,
                    "description" => __("Enter Width"),
                    'group' => 'General'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Thumbnails Container Max Width (px)"),
                    "param_name" => "thumbs_cont_max_w",
                    'value' => get_option('thumbs_cont_max_w')? get_option('thumbs_cont_max_w') : 1132,
                    "description" => __("Enter Width"),
                    'group' => 'General'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Category Separator Line"),
                    "param_name" => "cont_sep",
                    "value" => ['no','yes'],
                    'std' => get_option('cont_sep')? get_option('cont_sep') : 'no',
                    "description" => __("Show Separator?"),
                    'group' => 'Category Separator'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Last Category Separator"),
                    "param_name" => "cont_sep_last",
                    "value" => ['no','yes'],
                    "std" => get_option('cont_sep_last')? get_option('cont_sep_last') : 'no',
                    "description" => __("Show Last Separator?"),
                    'group' => 'Category Separator'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Separator Thickness (px)"),
                    "param_name" => "cont_sep_th",
                    'value' => get_option('cont_sep_th')? get_option('cont_sep_th') : 1,
                    "description" => __("Enter Separator Thickness"),
                    'group' => 'Category Separator'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Separator Top Margin (px)"),
                    "param_name" => "cont_sep_mt",
                    'value' => get_option('cont_sep_mt')? get_option('cont_sep_mt') : 0,
                    "description" => __("Enter Separator Top Margin"),
                    'group' => 'Category Separator'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Separator Bottom Margin (px)"),
                    "param_name" => "cont_sep_mb",
                    'value' => get_option('cont_sep_mb')? get_option('cont_sep_mb') : 0,
                    "description" => __("Enter Separator Bottom Margin"),
                    'group' => 'Category Separator'
                ),
                array(
                    "type" => "vc_color_picker_param",
                    "class" => "",
                    "heading" => __("Separator Line Color"),
                    "param_name" => "cont_sep_color",
                    "value" => get_option('cont_sep_color')? get_option('cont_sep_color') : "#000000",
                    "description" => __( "Select Color"),
                    'group' => 'Category Separator'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Thumbnail Image Size"),
                    "param_name" => "th_image_size",
                    'value' => get_option('th_image_size')? get_option('th_image_size') : 150,
                    "description" => __("Enter Thumbnail Image Size"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Thumbnail Image Sizing Type"),
                    "param_name" => "th_image_sizing",
                    "std" => get_option('th_image_sizing')? get_option('th_image_sizing') : 'auto',
                    "value" => ['auto','full height','full width'],
                    "description" => __("Enter Sizing Type"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Thumbnail Title Visibility"),
                    "param_name" => "title",
                    "value" => ['yes','no'],
                    "std" => get_option('title')? get_option('title') : 'yes',
                    "description" => __("Show Title?"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Thumbnail Title Align"),
                    "param_name" => "th_title_pos",
                    "value" => ['default','left','right','center'],
                    "std" => get_option('th_title_pos')? get_option('th_title_pos') : 'default',
                    "description" => __("Select Alignment"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Thumbnail Title Font"),
                    "param_name" => "th_title_font",
                    "value" => get_option('th_title_font')? get_option('th_title_font') : 'sourceSansPro',
                    "description" => __("Enter Thumbnail Title Font"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Thumbnail Title size (px)"),
                    "param_name" => "th_title_size",
                    "value" => get_option('th_title_size')? get_option('th_title_size') : 18,
                    "description" => __("Enter Font Size"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Thumbnail Title transform"),
                    "param_name" => "th_title_transform",
                    "value" => $transfOts,
                    "std" => get_option('th_title_transform')? get_option('th_title_transform') : 'none',
                    "description" => __("Select Text Transform"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Thumbnail Title Weight"),
                    "param_name" => "th_title_weight",
                    "value" => $weightOts,
                    "std" => get_option('th_title_weight')? get_option('th_title_weight') : 'default',
                    "description" => __("Select Weight"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "vc_color_picker_param",
                    "class" => "",
                    "heading" => __("Thumbnail Title color"),
                    "param_name" => "th_title_color",
                    "value" => get_option('th_title_color')? get_option('th_title_color') : '#f23404',
                    "description" => __( "Select Color"),
                    'group' => 'Thumbnail'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Category Title Size (px)"),
                    "param_name" => "cat_title_size",
                    "value" => get_option('cat_title_size')? get_option('cat_title_size') : 80,
                    "description" => __("Enter Font Size"),
                    'group' => 'Category Title'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Category Title Align"),
                    "param_name" => "cat_title_pos",
                    "value" => ['default','left','right','center'],
                    "std" => get_option('cat_title_pos')? get_option('cat_title_pos') : 'default',
                    "description" => __("Select Alignment"),
                    'group' => 'Category Title'
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Category Title Font"),
                    "param_name" => "cat_title_font",
                    "value" => get_option('cat_title_font')? get_option('cat_title_font') : 'PassionOne',
                    "description" => __("Enter Category Title Font"),
                    'group' => 'Category Title'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Category Title transform"),
                    "param_name" => "cat_title_transform",
                    "value" => $transfOts,
                    "std" => get_option('cat_title_transform')? get_option('cat_title_transform') : 'none',
                    "description" => __("Select Text Transform"),
                    'group' => 'Category Title'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Category Title Weight"),
                    "param_name" => "cat_title_weight",
                    "value" => $weightOts,
                    "std" => get_option('cat_title_weight')? get_option('cat_title_weight') : 'default',
                    "description" => __("Select Weight"),
                    'group' => 'Category Title'
                ),
                array(
                    "type" => "vc_color_picker_param",
                    "class" => "",
                    "heading" => __("Category Title color"),
                    "param_name" => "cat_title_color",
                    "value" => get_option('cat_title_color')? get_option('cat_title_color') : '#dd3333',
                    "description" => __( "Select Color"),
                    'group' => 'Category Title'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Show description?"),
                    "param_name" => "show_description",
                    "value" => ['yes','no'],
                    "std" => get_option('show_description')? get_option('show_description') : 'yes',
                    "description" => __("Show category description under title?"),
                    'group' => 'Category Title'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Font size (px)"),
                    "param_name" => "description_font_size",
                    "value" => ['11','12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22'],
                    "std" => get_option('description_font_size')? get_option('description_font_size') : '16',
                    "description" => __("Set font size."),
                    'group' => 'Description style'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Font weight"),
                    "param_name" => "description_font_weight",
                    "value" => ['100','200', '300', '400', '500', '600', '700', '800', '900'],
                    "std" => get_option('description_font_weight')? get_option('description_font_weight') : '400',
                    "description" => __("Set font weight."),
                    'group' => 'Description style'
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Text align"),
                    "param_name" => "description_text_align",
                    "value" => ['center','left', 'right'],
                    "std" => get_option('description_text_align')? get_option('description_text_align') : 'left',
                    "description" => __("Set text alignment."),
                    'group' => 'Description style'
                ),
                array(
                    "type" => "vc_color_picker_param",
                    "class" => "",
                    "heading" => __("Description text color"),
                    "param_name" => "description_text_color",
                    "value" => get_option('description_text_color')? get_option('description_text_color') : '#000',
                    "description" => __( "Select Color"),
                    'group' => 'Description style'
                ),
            ),
        ) );
    }

    function vcCatParam($settings, $value){
        $categories = get_categories( array(
            'orderby' => 'name',
            'order'   => 'ASC',
            'hide_empty' => false,
        ) );
        if(gettype($value)!='array' && trim($value) != ""){
            $value = explode(',',$value);
        }elseif (gettype($value)!='array'){
            $value = [];
        }
        return LTTmplToVar('templates/short_code/vc_cat_param.tmpl.php', ['settings'=>$settings, 'value'=>$value, 'categories'=>$categories], true);
    }

    function vcColorParam($settings, $value){
        return LTTmplToVar('templates/short_code/vc_color_picker_param.tmpl.php', ['settings'=>$settings, 'value'=>$value], true);
    }

    function reg_location(){

        vc_map( array(
            "name" => __( "By Button"),
            "base" => "BBS",
            "class" => "",
            "category" => 'shortcodes',
            "params" => array(
            ),
        ) );
    }

add_action( 'vc_before_init', 'reg_By_Button' );


}
/*complete adding shortcode to visual composer*/

}
