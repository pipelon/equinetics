<?php 

/* support for WooCommerce */
add_action( 'after_setup_theme', 'horseclub_woocommerce_support' );
function horseclub_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'wc-product-gallery-lightbox' );
// remove style 
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
 global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'horseclub_woocommerce_image_dimensions', 1 );
 
/**
 * define image sizes
 */
function horseclub_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '400',	// px
		'height'	=> '400',	// px
		'crop'		=> 1 		// true
	);
 
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '120',	// px
		'height'	=> '120',	// px
		'crop'		=> 0 		// false
	);

	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

add_action( 'init', 'horseclub_remove_wc_breadcrumbs' );
function horseclub_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// products per page
add_filter('loop_shop_per_page', 'horseclub_products_per_page');
if (!function_exists('horseclub_products_per_page')) {
  function horseclub_products_per_page() {
    global $horseclub_usefulpi;
    if ( isset( $horseclub_usefulpi['products_per_page'] ) ) {
      return $horseclub_usefulpi['products_per_page'];
    }
  }
}

add_filter('add_to_cart_fragments', 'horseclub_woocommerce_header_add_to_cart_fragment');
	 
function horseclub_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start(); ?>
 <a class="cart-ic" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'horseclub'); ?>">
 <i class="fa fa-cart-arrow-down"></i></a> 
 <?php
	
	$fragments['.shop_icona .cart-ic'] = ob_get_clean();
	
	return $fragments;
}
	// Change number or products per row to 3
add_filter('loop_shop_columns', 'horseclub_loop_columns');
if (!function_exists('horseclub_loop_columns')) {
	function horseclub_loop_columns() {
		return 3; // 3 products per row
	}
}
// Removes tabs from their original loaction 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Inserts tabs under the main right product content 
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 );
if ( ! function_exists( 'horseclub_woocommerce_output_related_products' ) ) {


   function horseclub_woocommerce_output_related_products() {

        $args = array(
           'posts_per_page' => 4,
            'columns' => 4,
            'orderby' => 'rand'
       );

        woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
   }
}
       add_filter ( 'woocommerce_product_thumbnails_columns', 'horseclub_thumb_cols' );
 function horseclub_thumb_cols() {
     return 4; 
 }
if($horseclub_usefulpi['display_hovershop'] == '0') {
	add_action( 'woocommerce_before_shop_loop_item_title', 'horseclub_woocommerce_template_loop_second_product_thumbnail', 11 );
	
	add_filter( 'post_class',  'horseclub_product_anim_gallery'  );	
}			
			function horseclub_product_anim_gallery( $classes ) {
				global $product;

				$post_type = get_post_type( get_the_ID() );
				if ( ! is_admin() ) {

				if ( $post_type == 'product' ) {

					$attachment_ids = $product->get_gallery_image_ids();

					if ( $attachment_ids ) {
						$classes[] = 'up-gallery-woo';
					}
				}
}
				return $classes;
			}
					
			function horseclub_woocommerce_template_loop_second_product_thumbnail() {
				global $product, $woocommerce;

				$attachment_ids = $product->get_gallery_image_ids();

				if ( $attachment_ids ) {
					$secondary_image_id_woo = $attachment_ids['0'];
					echo wp_get_attachment_image( $secondary_image_id_woo, 'shop_catalog', '', $attr = array( 'class' => 'sec-image attachment-shop-catalog' ) );
				}
			}