<?php
function horseclub_run() {
  register_nav_menus(array(
    'primary_navigation' => esc_html__('Primary Navigation', 'horseclub'),
     'mobile_navigation' => esc_html__('Mobile Navigation', 'horseclub'),   
  ));  
  add_image_size( 'horseclub-thumb', 80, 50, true );
  add_post_type_support( 'attachment', 'page-attributes' );
  set_post_thumbnail_size(200, 200);
  add_theme_support('post-thumbnails');
  add_theme_support( 'automatic-feed-links' );
  add_filter( 'use_default_gallery_style', '__return_false' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'wp-block-styles' );
  	add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Gold', 'horseclub' ),
					'slug'  => 'gold',
					'color' => '#B89F5C',
				),
				array(
					'name'  => __( 'Dark Gray', 'horseclub' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'horseclub' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'horseclub' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			
			)
		);
}
add_action('after_setup_theme', 'horseclub_run');

add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {

	add_theme_support( 'title-tag' );
}

