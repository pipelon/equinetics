<?php
function horseclub_scripts() {
  wp_enqueue_style('horseclub_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, null);
  wp_enqueue_style('horseclub_theme', get_template_directory_uri() . '/assets/css/horseclub.css', false, "1.0");
global $horseclub_usefulpi; if(isset($horseclub_usefulpi['skin_stylesheet'])) {$skin = $horseclub_usefulpi['skin_stylesheet'];} else { $skin = 'gold.css';} 
 wp_enqueue_style('horseclub_skins', get_template_directory_uri() . '/assets/css/skins/'.$skin.'', false, null);

  if (is_child_theme()) {
  wp_enqueue_style('horsclub_child', get_stylesheet_uri(), false, null);
  wp_dequeue_style('horseclub_skins' );
  wp_enqueue_style('horseclub_theme-custom', get_stylesheet_directory_uri() . '/custom-skin.css', false, null);
  } 

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  wp_register_script('horseclub_modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, false);
  wp_register_script('horseclub_plugins', get_template_directory_uri() . '/assets/js/horseclub_plugins.js', false, null, true);
  wp_register_script('horseclub_main', get_template_directory_uri() . '/assets/js/horseclub_main.js', false, null, true);
  wp_register_script('horseclub_masonry_script', get_template_directory_uri() . '/assets/js/masonry.js', false, null, true);
  wp_register_script('horseclub_anim_script', get_template_directory_uri() . '/assets/js/jquery.animsition.min.js', false, null);
  wp_register_style('horseclub_anim', get_template_directory_uri() . '/assets/css/animsition.css');
  wp_enqueue_script('jquery');
  wp_enqueue_script('horseclub_modernizr');
  wp_enqueue_script('horseclub_plugins');
  wp_enqueue_script('horseclub_main');
}
add_action('wp_enqueue_scripts', 'horseclub_scripts', 100);

function horseclub_admin_styles() {
    wp_register_style( 'horseclub_admin_stylesheet', get_template_directory_uri() . '/vc_extend/vc_up.css', false, null);
    wp_enqueue_style( 'horseclub_admin_stylesheet' );
}
add_action( 'admin_enqueue_scripts', 'horseclub_admin_styles' );
global $horseclub_usefulpi; if($horseclub_usefulpi['display_scroll'] == '0') {

function horseclub_smoothscroll(){
 wp_register_script('horseclub_scroll', get_template_directory_uri() . '/assets/js/SmoothScroll.js', false, null, true);
 wp_enqueue_script('horseclub_scroll');
}
add_action( 'wp_enqueue_scripts', 'horseclub_smoothscroll' );	
}
		
function horseclub_enqueue_woocommerce_style(){
    wp_register_style( 'horseclub_woocommerce', get_template_directory_uri() . '/assets/css/horseclub_woocommerce.css' );
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'horseclub_woocommerce' );
	}
}
add_action( 'wp_enqueue_scripts', 'horseclub_enqueue_woocommerce_style' );		
