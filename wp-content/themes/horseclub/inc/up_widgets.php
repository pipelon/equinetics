<?php
 function horseclub_widgets_init() {
	register_sidebar( array(
			'name'          => esc_html__('Primary Sidebar', 'horseclub'),
			'id'            => 'sidebar-primary',
			'description'  => esc_html__( 'The main widget area, most often used as a sidebar for blog.', 'horseclub' ),
			'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
			'name'          => esc_html__('Shop Sidebar', 'horseclub'),
			'id'            => 'shop-primary',
			'description'  => esc_html__( 'The main widget area, most often used as a sidebar for Shop page.', 'horseclub' ),
			'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
	) );

	register_sidebar( array(
			'name' => esc_html__('Footer Column 1', 'horseclub'),
			'id' => 'footer_1',
			'description'  => esc_html__( 'First widget area for footer content', 'horseclub' ),
			'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside></div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
			'name' => esc_html__('Footer Column 2', 'horseclub'),
			'id' => 'footer_2',
			'description'  => esc_html__( 'Second widget area for footer content', 'horseclub' ),
			'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside></div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
	) );
		register_sidebar( array(
			'name' => esc_html__('Footer Column 3', 'horseclub'),
			'id' => 'footer_3',
			'description'  => __( 'Third widget area for footer content', 'horseclub' ),
			'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside></div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
	) );

	register_sidebar( array(
			'name' => esc_html__('Footer Column 4', 'horseclub'),
			'id' => 'footer_4',
			'description'  => esc_html__( 'Fourth widget area for footer content', 'horseclub' ),
			'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside></div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
	) );
		register_sidebar( array(
			'name' => esc_html__('Custom Sidebar', 'horseclub'),
			'id' => 'custom-sidebar',
			'description'  => esc_html__( 'The main custom widget area, most often used as a sidebar for regular pages built with Visual composer.', 'horseclub' ),
			'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
	) );
			register_sidebar( array(
			'name' => esc_html__('Custom Sidebar 2', 'horseclub'),
			'id' => 'custom-sidebar-2',
			'description'  => esc_html__( 'The main custom widget area, most often used as a sidebar for regular pages built with Visual composer.', 'horseclub' ),
			'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
	) );
			register_sidebar( array(
			'name' => esc_html__('Left, PopUp Menu Sidebar', 'horseclub'),
			'id' => 'left-menu-sidebar',
			'description'  => esc_html__( 'The main widget area below menu, use only if Left or Popup menu is enabled', 'horseclub' ),
			'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
	) );	
			register_sidebar( array(
			'name' => esc_html__('PopUp Menu Left Sidebar', 'horseclub'),
			'id' => 'left-popup-sidebar',
			'description'  => esc_html__( 'The main left widget area for PopUp menu, use only Popup menu is enabled', 'horseclub' ),
			'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
	) );
	
	
}
add_action( 'widgets_init', 'horseclub_widgets_init' );

?>