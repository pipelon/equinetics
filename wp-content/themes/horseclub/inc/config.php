<?php
define('POST_EXCERPT_LENGTH', 100);
function horseclub_main_class() {
  if (horseclub_sidebar()) {
        $class = 'main col-lg-9 col-md-8';
  }
  else {  
    $class = 'col-md-12';
  }
  return $class;
}
function horseclub_sidebar_class() {
  return 'col-lg-3 col-md-4';
}
function horseclub_sidebar() {
   if (class_exists('woocommerce'))  {
        $sidebar_config = new horseclub_Sidebar(
        array('horseclub_Sidebar_on_shop_page','horseclub_Sidebar_on_page','horseclub_Sidebar_on_blog_post','horseclub_Sidebar_on_blog_page','is_404','is_search','is_cart','is_home','is_product','is_checkout','is_account_page',array('is_singular', array('portfolio'))
        ),
        array('page-masonry.php','page-fullwidth.php','page-masonryw.php',)
      );
	  
	  
  }
  else {
      $sidebar_config = new horseclub_Sidebar(
        array('horseclub_Sidebar_on_page','horseclub_Sidebar_on_blog_post','is_search','horseclub_Sidebar_on_blog_page','is_404','is_home',array('is_singular', array('portfolio'))
        ),
        array('page-masonry.php','page-fullwidth.php','page-masonryw.php')
      );
}
  return apply_filters('horseclub_sidebar', $sidebar_config->display);
}
function horseclub_Sidebar_on_shop_page() {
  global $horseclub_usefulpi; 
    if(isset($horseclub_usefulpi['shop_layout']) && $horseclub_usefulpi['shop_layout'] == 'sidebar') {
      if( is_shop() || is_product_category() || is_product_tag()) {
        return false;
      }
    } else {
      if( is_shop() || is_product_category() || is_product_tag()) {
        return true;
    }
  }
}
function horseclub_Sidebar_on_blog_post() {
  if(is_single()) {
    global $post;
    $postsidebar = get_post_meta( $post->ID, '_horseclub_post_sidebar', true );
      if(isset($postsidebar) && $postsidebar == 'no') {
        return true;
        } else {
          return false;
        }
      }
}
function horseclub_Sidebar_on_blog_page() {
  if(is_page_template('page-blog.php')) {
    global $post;
    $pagesidebar = get_post_meta( $post->ID, '_horseclub_page_sidebar', true );
      if(isset($pagesidebar) && $pagesidebar == 'no') {
        return true;
        } else {
          return false;
        }
      }
}
function horseclub_Sidebar_on_page() {
  if(is_page() && !is_page_template()) {
          return true;       
      }
}
add_filter('body_class','horseclub_layout_class_names');
function horseclub_layout_class_names($classes) {
  global $horseclub_usefulpi;
  if(isset($horseclub_usefulpi['boxed_layout'])) {
    $layoutstyle = $horseclub_usefulpi['boxed_layout'];
  } else {
    $layoutstyle = 'wide';
  }
if ($layoutstyle == "boxed") {
  $classes[] = 'boxed';
}
else {
  $classes[] = 'wide';
} 
  return $classes;
}
add_filter('body_class','horseclub_layout_class_menu');
function horseclub_layout_class_menu($classes_menu) {
  global $horseclub_usefulpi;
   
  if($horseclub_usefulpi['menu_layout'] == 'up_left_menu') {
    $layoutmenu = $horseclub_usefulpi['menu_layout'];
  } else {
    $layoutmenu = '';
  } 
  if($horseclub_usefulpi['menu_layout'] == 'up_popup_menu_left') {
    $layoutmenu_left = $horseclub_usefulpi['menu_layout'];
  } else {
    $layoutmenu_left = '';
  }  
if ($layoutmenu == "up_left_menu") {
  $classes_menu[] = 'left-menu';
}
  else if ($layoutmenu_left == "up_popup_menu_left") {
  $classes_menu[] = 'left-pop';
}
else {
  $classes_menu[] = '';
} 
  return $classes_menu;
}
add_filter('body_class','horseclub_layout_class_b');
function horseclub_layout_class_b($classes_border) {
  global $horseclub_usefulpi;  
  if($horseclub_usefulpi['button_border'] == 'bt_wb') {
    $layoutb = $horseclub_usefulpi['button_border'];
  } else {
    $layoutb = '';
  }
if ($layoutb == "bt_wb") {
  $classes_border[] = 'button_b';
}
else {
  $classes_border[] = '';
} 
  return $classes_border;
}


if (!isset($content_width)) { $content_width = 1170; }