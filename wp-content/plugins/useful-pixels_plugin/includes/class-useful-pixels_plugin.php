<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://useful-pixels.com
 * @since      1.0.0
 *
 * @package    Useful_Pixels_plugin
 * @subpackage Useful_Pixels_plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Useful_Pixels_plugin
 * @subpackage Useful_Pixels_plugin/includes
 * @author     Useful Pixels <office@useful-pixels.com>
 */
class Useful_Pixels_plugin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Useful_Pixels_plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'useful-pixels_plugin';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		//$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Useful_Pixels_plugin_Loader. Orchestrates the hooks of the plugin.
	 * - Useful_Pixels_plugin_i18n. Defines internationalization functionality.
	 * - Useful_Pixels_plugin_Admin. Defines all hooks for the admin area.
	 * - Useful_Pixels_plugin_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-useful-pixels_plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-useful-pixels_plugin-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-useful-pixels_plugin-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		//require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-useful-pixels_plugin-public.php';

		$this->loader = new Useful_Pixels_plugin_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Useful_Pixels_plugin_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Useful_Pixels_plugin_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Useful_Pixels_plugin_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	//private function define_public_hooks() {

		//$plugin_public = new Useful_Pixels_plugin_Public( $this->get_plugin_name(), $this->get_version() );

		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	//}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Useful_Pixels_plugin_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
	
function horseclub_portofolio_post_type() {
global $horseclub_usefulpi;
		$slug = 'portfolio';
		if(isset($horseclub_usefulpi['portfolio_url'])) {
			if($horseclub_usefulpi['portfolio_url'] != ""){
				$slug = $horseclub_usefulpi['portfolio_url'];
			}
		}
		$portlabels = array(
		'name' =>  esc_html__('Portfolio', 'usefulxp'),
		'singular_name' => esc_html__('Portfolio Item', 'usefulxp'),
		'add_new' => esc_html__('Add New', 'usefulxp'),
		'add_new_item' => esc_html__('Add New Portfolio Item', 'usefulxp'),
		'edit_item' => esc_html__('Edit Portfolio Item', 'usefulxp'),
		'new_item' => esc_html__('New Portfolio Item', 'usefulxp'),
		'all_items' => esc_html__('All Portfolio', 'usefulxp'),
		'view_item' => esc_html__('View Portfolio Item', 'usefulxp'),
		'search_items' => esc_html__('Search Portfolio', 'usefulxp'),
		'not_found' =>  esc_html__('No Portfolio Item found', 'usefulxp'),
		'not_found_in_trash' => esc_html__('No Portfolio Items found in Trash', 'usefulxp'),
		'parent_item_colon' => '',
		'menu_name' => esc_html__('Portfolio', 'usefulxp')
  );
		$args = array(
		'labels' => $portlabels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite'  => array( 'slug' => $slug ), 
		'has_archive' => false, 
		'capability_type' => 'post', 
		'hierarchical' => false,
		'menu_position' => 8, 
		'supports' => array( 'title', 'editor', 'author', 'page-attributes', 'thumbnail', 'comments', 'excerpt' )
  ); 
	$plabels = array(
		'name' => esc_html__( 'Portfolio Type', 'usefulxp' ),
		'singular_name' => esc_html__( 'Type', 'usefulxp' ),
		'search_items' =>  esc_html__( 'Search Type', 'usefulxp' ),
		'all_items' => esc_html__( 'All Type', 'usefulxp' ),
		'parent_item' => esc_html__( 'Parent Type', 'usefulxp' ),
		'parent_item_colon' => esc_html__( 'Parent Type:', 'usefulxp' ),
		'edit_item' => esc_html__( 'Edit Type', 'usefulxp' ),
		'update_item' => esc_html__( 'Update Type', 'usefulxp' ),
		'add_new_item' => esc_html__( 'Add New Type', 'usefulxp' ),
		'new_item_name' => esc_html__( 'New Type Name', 'usefulxp' ),
	);	
	register_taxonomy('portfolio-type',array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $plabels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
	));
	register_post_type( 'portfolio', $args );
}
	add_action( 'init', 'horseclub_portofolio_post_type', 0 );	
	add_theme_support( 'post-thumbnails' );
	
add_action( 'init', 'horseclub_testimonials_post_type' );
function horseclub_testimonials_post_type() {
    $labels = array(
        'name' => esc_html__( 'Testimonials', 'usefulxp' ),
        'singular_name' => esc_html__( 'Testimonial', 'usefulxp' ),
        'add_new' => esc_html__( 'Add New', 'usefulxp' ),
        'add_new_item' => esc_html__( 'Add New Testimonial', 'usefulxp' ),
        'edit_item' => esc_html__( 'Edit Testimonial', 'usefulxp' ),
        'new_item' => esc_html__( 'New Testimonial', 'usefulxp' ),
        'view_item' => esc_html__( 'View Testimonial', 'usefulxp' ),
        'search_items' => esc_html__( 'Search Testimonials', 'usefulxp' ),
        'not_found' =>  esc_html__( 'No Testimonials found', 'usefulxp' ),
        'not_found_in_trash' => esc_html__( 'No Testimonials in the trash', 'usefulxp' ),
        'parent_item_colon' => '',
    );
 
    register_post_type( 'testimonials', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 9,
		'supports' => array( 'title', 'editor', 'thumbnail')
        
    ) );
}

//UP shortcodes

function horseclub_socila_icons( $atts ) {    
    $size_default_value = "";
    $color_default_value = "";
	$url_default_value = "";
	$icon_default_value = "";
	$lic = "";
	$padding_default_value = "";
	$newtab_default_value = "";

    extract( shortcode_atts( array(
        'size' => $size_default_value,
        'color' => $color_default_value,
		'url' => $url_default_value,
		'icon' => $icon_default_value,
		'position' => $lic,
		'padding' => $padding_default_value,
		'newtab' => $newtab_default_value,
		
    ), $atts ) );

		if($padding != ""){
			$padding = 'style="padding:'.$padding.'px;"';
		}
			if($newtab != ""){
			$newtab = 'target="_blank"';
		}
		
    $output = '<span class="shortcode_icon '.$position.'" '.$padding.'><a href="'.$url.'" '.$newtab.' style="color:' . $color . ';font-size:' . $size . ';"><i class="' . $icon . '"></i></a></span>';
    return $output;
}

function horseclub_year_shortcode_function() {
    $year = date('Y');
	return $year;
}
function horseclub_copyright_shortcode_function() {
	return '&copy;';
}
function horseclub_sitename_shortcode_function() {
	$sitename = get_bloginfo('name');
	return $sitename;
}
function horseclub_themecredit_shortcode_function() {
	$my_theme = wp_get_theme();
	$output = '- WordPress Theme by <a href="'.$my_theme->{'Author URI'}.'">Useful Pixels</a>';
	return $output;
}

function horseclub_register_shortcodes(){
	add_shortcode('icon', 'horseclub_socila_icons');	
	add_shortcode('the-year', 'horseclub_year_shortcode_function');
	add_shortcode('copyright', 'horseclub_copyright_shortcode_function');
	add_shortcode('site-name', 'horseclub_sitename_shortcode_function');
	add_shortcode('theme-credit', 'horseclub_themecredit_shortcode_function');
}
add_action( 'init', 'horseclub_register_shortcodes');

add_filter('widget_text', 'do_shortcode');

//typography shortcode
function horseclub_dropcap($atts, $content = null) {
return '
<div class="dropcap">'.$content.'</div>
';
}
add_shortcode('dropcap', 'horseclub_dropcap');

function horseclub_highlight ($atts, $content = null) {
return '
<span class="highlight">'.$content.'</span>';
}
add_shortcode('highlight', 'horseclub_highlight');
//share buttons
function horseclub_fbshare($atts) {
 $size_f = "";
 $color_f = "";
    extract( shortcode_atts( array(
        'size' => $size_f,
        'color' => $color_f,		
    ), $atts ) );
$title = get_the_title() ;
$url = get_permalink() ;	
   return '<a rel="external nofollow" target="_blank" class="linkedib" href="http://www.facebook.com/sharer.php?u='.$url.'&t='.$title.'" style="color:' . $color . ';font-size:' . $size . ';"><i class="fa fa-facebook"></i></a>';
}
 add_shortcode('fbshare', 'horseclub_fbshare');
 
 function horseclub_twshare($atts) {
 $size_t = "";
 $color_t = "";
    extract( shortcode_atts( array(
        'size' => $size_t,
        'color' => $color_t,		
    ), $atts ) );
$twtitle = get_the_title() ;
$twurl = get_permalink();	
   return '<a rel="external nofollow" target="_blank" class="linkedib" href="http://twitter.com/intent/tweet/?text='.$twtitle.'&url='.$twurl.' " style="color:' . $color . ';font-size:' . $size . ';"><i class="fa fa-twitter"></i></a>';
}
 add_shortcode('twshare', 'horseclub_twshare');
 
  function horseclub_gshare($atts) {
 $size_g = "";
 $color_g = "";
    extract( shortcode_atts( array(
        'size' => $size_g,
        'color' => $color_g,		
    ), $atts ) );
$gtitle = get_the_title() ;
$gurl = get_permalink();	
   return '<a rel="external nofollow" target="_blank" class="linkedib" href="https://plus.google.com/share?url='.$gurl.' " style="color:' . $color . ';font-size:' . $size . ';"><i class="fa fa-google-plus"></i></a>';
}
 add_shortcode('gshare', 'horseclub_gshare');
 
 function horseclub_get_pin($atts) {
 $size_p = "";
 $color_p = "";
 global $post;
  extract( shortcode_atts( array(
        
		'size' => $size_p,
        'color' => $color_p,		
    ), $atts ) );
$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
return '<a  class="linkedib" target="_blank" href="http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink($post->ID)) . '&media=' . $pinterestimage[0] . '&description=' . get_the_title() .'" style="color:' . $color . ';font-size:' . $size . ';" ><i class="fa fa-pinterest"></i></a>'; }

add_shortcode('pshare', 'horseclub_get_pin');

  function horseclub_inshare($atts) {
 $size_in = "";
 $color_in = "";
    extract( shortcode_atts( array(
        'size' => $size_in,
        'color' => $color_in,		
    ), $atts ) );
$intitle = get_the_title() ;
$inurl = get_permalink();
$ins= up_excerpt(50);
	
   return '<a rel="external nofollow" target="_blank" class="linkedib" href="http://www.linkedin.com/shareArticle?mini=true&url='.$inurl.'&title='.$intitle.'&summary='.$ins.'&source='.$inurl.'" style="color:' . $color . ';font-size:' . $size . ';"><i class="fa fa-linkedin"></i></a>';
}
 add_shortcode('inshare', 'horseclub_inshare');
 if (!function_exists('horseclub_social_share')) {
    function horseclub_social_share($atts, $content = null) {
     
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        $html = "";     
                        $html .= '<li class="facebook_share">';
                        $html .= '<a href="#" onclick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . urlencode(ue_addslashes(get_the_title())) . '&amp;p[summary]=' . urlencode(ue_addslashes(get_the_excerpt())) . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;&p[images][0]=';
                        if(function_exists('the_post_thumbnail')) {
                            $html .=  wp_get_attachment_url(get_post_thumbnail_id());
                        }
                        $html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');" href="javascript: void(0)">';                              
                            $html .= '<i class="fa fa-facebook"></i>';                                             
                        $html .= "</a>";
                        $html .= "</li>";                    
        return $html;
    }
}
 add_shortcode('social_share', 'horseclub_social_share');
 function horseclub_to_author_profile( $contactmethods ) {
	
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';	
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'horseclub_to_author_profile', 2, 1);

	

