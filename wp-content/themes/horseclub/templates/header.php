<?php global $horseclub_usefulpi; if($horseclub_usefulpi['menu_layout'] == 'up_popup_menu_left') { ?>
<div id="pop_left" class="pop-hidden">
 	
   <div class="popup_menuo">
   <a id="toggle-menu" class="toggle-menu-hidden">
    <div>
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
    </div>
  </a>
 </div>
</div>

  <?php } ?> 
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['menu_layout'] == 'up_popup_menu') { ?>
 <!-- PopUp Menu -->
<div class="main-navm pop-visible <?php global $horseclub_usefulpi; if($horseclub_usefulpi['sub_color_menu'] == '1') {echo 'dark';} else {echo "white";}  ?> ">
<div class="row">
<article class="col-md-6 height-x popup-left-bg text-center">
<div class="malign">
            	<?php if (is_active_sidebar('left-popup-sidebar') ) { ?> 
					<div class="pop_widgets">
					<?php dynamic_sidebar('left-popup-sidebar'); ?>
					</div> 
            	<?php }; ?>
				
</div>
</article>	  
<article class="col-md-6 height-x popup-bg text-center">
<div class="malign">		  
<div class="topnav-pop">
 <div class="topbarmenu clearfix">
 <nav id="nav-main" class="clearfix" role="navigation">
 <?php     if (has_nav_menu('primary_navigation')) :             
 wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu','fallback_cb' => 'horseclub_bootstrap_navwalker::fallback','walker' => new horseclub_bootstrap_navwalker()));
 endif;?>
 </nav> 
 </div></div>
            <div class="popup-wid">
             <?php if (is_active_sidebar('left-menu-sidebar') ) { ?> 
					<div class="pop_widgets">
					<?php dynamic_sidebar('left-menu-sidebar'); ?>
					</div> 
            	<?php }; ?>
            </div>          
          </div>
        </article>
      </div>      
</div> <!-- PopUp Menu end -->
  <?php } ?> 
 <!-- Search Nav Form -->
 <?php global $horseclub_usefulpi; if($horseclub_usefulpi['display_search'] == '1') { ?>
 <div class="nav-search_form"> <button class="search-nav_x  search-nav-close"></button>
 <form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
   <div class="animform">
        <input type="text" value="" name="s" id="s"  autocomplete="off" placeholder="<?php esc_html_e('START TYPING...', 'horseclub'); ?>" />
		 <button class="search-button" id="searchsubmit"><i class="fa fa-search"></i></button>				
    </div>
</form>
</div>
 <?php } ?>
<header class="normal <?php  if ( get_post() ){global $post;$id = get_the_ID();$headcolor = get_post_meta( $id, '_horseclub_headcolor', true ); echo $headcolor;} echo "\x20"; if(isset($horseclub_usefulpi['sub_color_menu'])){if($horseclub_usefulpi['sub_color_menu'] == '1') {echo 'dark';} else {echo "white";}};?>">

   <?php global $horseclub_usefulpi; if($horseclub_usefulpi['display_top_bar'] == '1') { ?>
 <div class="top-bar-section">
 <div class="container tbs"> 
<div class="col-md-6 top_bar_left"> 
        <?php if(isset($horseclub_usefulpi['sec_top_left_text'])) { $sec_left = $horseclub_usefulpi['sec_top_left_text'];} echo do_shortcode($sec_left); ?>
    	</div>
<div class="col-md-6 top_bar_right"> 
        <?php if(isset($horseclub_usefulpi['sec_top_right_text'])) { $sec_right = $horseclub_usefulpi['sec_top_right_text'];}  echo do_shortcode($sec_right); ?>
    	</div>
</div>
</div><!-- Top Bar end -->	
 <?php } ?>	

 <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['menu_layout'])) {
 
 if($horseclub_usefulpi['menu_layout'] == 'up_top_menu')  { ?>
	<?php global $post;$id = get_the_ID(); $stih = get_post_meta( $id, '_horseclub_head_s', true );$nw = get_post_meta( $id, '_horseclub_nav_w', true );?>
 <div id="up_topbar" class="topclass <?php if ($stih != '') {echo $stih;} else {echo 'enable_sticky';} ?>">
 <div class="container <?php if ($nw != '') {echo $nw;} ?>">
 <div class="row">
 <div class="col-md-3 topnav-left">
 <div class="topbarmenu clearfix">
 <!-- Logo Start -->
 <div id="logo" class="logocase">
 <a class="brand logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>">
 <?php global $horseclub_usefulpi; if (!empty($horseclub_usefulpi['x1_usefulpi_logo_upload']['url'])) { ?>
 <div id="uplogo">
 <img src="<?php echo $horseclub_usefulpi['x1_usefulpi_logo_upload']['url']; ?>" alt="<?php  bloginfo('name');?>" class="up-logo <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <?php echo 'custom_sticky';?>  <?php } ?>" />
 
 <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['s_usefulpi_logo_upload']['url'];?>" class="sticy-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 <?php if(!empty($horseclub_usefulpi['x2_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['x2_usefulpi_logo_upload']['url'];?>" class="retina-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 </div>
 <?php } else { bloginfo('name'); } ?>
 </a>                      
 </div> <!-- Close #logo -->
 <!-- close logo span -->
 </div>
 </div>
 <!-- close topnav left -->
 <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['display_shopicon'])) 
 {               
 if($horseclub_usefulpi['display_shopicon'] == '1') 
 { 
 if (class_exists('woocommerce')) {
 global $woocommerce; ?> 
 <div class="shop_icon"> 
 <a class="cart-ic" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'horseclub'); ?>">
 <i class="fa fa-cart-arrow-down"></i></a> 
 	<?php
				
				if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					the_widget( 'WC_Widget_Cart', 'title= ' );
				} else {
					the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
				}
			?>		
 </div>
  <?php } } }?>	
  <?php  if($horseclub_usefulpi['display_search'] == '1') { ?>
  
   <div class="search_menu">
   <a href="#seb" class="navsearch-icon">
 <i class="fa fa-search"></i></a>
 </div>
 
 <?php } ?>
 <div class="topnav-right">
 <div class="topbarmenu clearfix">
 <nav id="nav-main" class="clearfix" role="navigation">
 <?php     if (has_nav_menu('primary_navigation')) :             
 wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu','fallback_cb' => 'horseclub_bootstrap_navwalker::fallback','walker' => new horseclub_bootstrap_navwalker()));
 endif;?>
 </nav> 
 </div>
 </div>
 <!-- topnav-right end-->
 </div> 
 <!-- Row end --> 
 </div> 
 <!-- Container end -->
 </div>	 	 
	 <?php }
  else if ($horseclub_usefulpi['menu_layout'] == 'up_left_menu') { ?>
  <div id="up_topbar" class="topclass">
 <div class="container">
 <div class="row">
 <div id="up_topbar_left" class="topclass_left" tabindex="5000" style="overflow-y: hidden; outline: none;overflow-x: hidden;">

 <div class="logo_left_menu">
 <div class="topbarmenu">
 <!-- Logo Start -->
 <div id="logo" class="logocase">
 <a class="brand logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>">
 <?php global $horseclub_usefulpi; if (!empty($horseclub_usefulpi['x1_usefulpi_logo_upload']['url'])) { ?> <div id="uplogo"><img src="<?php echo $horseclub_usefulpi['x1_usefulpi_logo_upload']['url']; ?>" alt="<?php  bloginfo('name');?>" class="up-logo" />
 <?php if(!empty($horseclub_usefulpi['x2_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['x2_usefulpi_logo_upload']['url'];?>" class="retina-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 </div>
 <?php } else { bloginfo('name'); } ?>
 </a>                      
 </div> <!-- #logo end -->
 </div>
 </div>
 <!-- topnav left end -->
 <div class="topnav-left">
 <div class="topbarmenu-left clearfix">
 <nav id="nav-main" class="nav-left-sidebar" role="navigation">
 <?php     if (has_nav_menu('primary_navigation')) :             
 wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu','fallback_cb' => 'horseclub_bootstrap_navwalker::fallback','walker' => new horseclub_bootstrap_navwalker()));
 endif;?>
 </nav> 
 </div>
 </div>
 <!-- topnav-left end-->
		<?php if (is_active_sidebar('left-menu-sidebar') ) { ?> 
					<div class="left_widgets">
					<?php dynamic_sidebar('left-menu-sidebar'); ?>
					</div> 
            	<?php }; ?>
 <!-- Container end -->
 </div>	
</div>
</div>
</div>
 <!-- Logo Centar -->
 <?php  }
 else if($horseclub_usefulpi['menu_layout'] == 'up_centar_menu')  { ?>
	<?php $turn_off_s =''; global $post;$id = get_the_ID(); $stih = get_post_meta( $id, '_horseclub_head_s', true );$stih_on = get_post_meta( $id, '_horseclub_head_s_on', true );if($horseclub_usefulpi['display_sh'] == '0') {$turn_off_s = 'off';}  ?>

<?php if ($stih_on != '') { ?>
   <div id="up_topbar" class="stick_on topclass topclass-shrink">
<?php } else { ?>
     <div id="up_topbar" class="topclass  <?php  if ($stih != '')  {echo $stih;}  else {echo 'enable_sticky';}  echo $turn_off_s  ?>">

<?php } ?>	

 <div class="container">
 <div class="row">
 <div class="col-md-12 topnav-left centar">
 <div class="topbarmenu clearfix">
 <div id="logo" class="logocase">
 <a class="brand logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>">
 <?php global $horseclub_usefulpi; if (!empty($horseclub_usefulpi['x1_usefulpi_logo_upload']['url'])) { ?> <div id="uplogo">
 <img src="<?php echo $horseclub_usefulpi['x1_usefulpi_logo_upload']['url']; ?>" alt="<?php  bloginfo('name');?>" class="up-logo <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <?php echo 'custom_sticky';?>  <?php } ?>" />

  <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['s_usefulpi_logo_upload']['url'];?>" class="sticy-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 <?php if(!empty($horseclub_usefulpi['x2_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['x2_usefulpi_logo_upload']['url'];?>" class="retina-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 </div>
 <?php } else { bloginfo('name'); } ?>
 </a>                      
 </div> <!-- logo span end -->
 </div>
 </div>
 <!-- topnav left center end -->
 <div class="navcenter">
 <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['display_shopicon'])) 
 {               
 if($horseclub_usefulpi['display_shopicon'] == '1') 
 { 
 if (class_exists('woocommerce')) {
 global $woocommerce; ?> 
 <div class="shop_icon"> 
 <a class="cart-ic" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'horseclub'); ?>">
 <i class="fa fa-cart-arrow-down"></i></a> 
 	<?php
				
				if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					the_widget( 'WC_Widget_Cart', 'title= ' );
				} else {
					the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
				}
			?>		
 </div>
  <?php } } }?>	
  <?php  if($horseclub_usefulpi['display_search'] == '1') { ?> 
 <div class="search_menu">
   <a href="#ser" class="navsearch-icon">
   <i class="fa fa-search"></i></a>
 </div>
 <?php } ?>
 <div class="topnav-right">
 <div class="topbarmenu clearfix">
 <nav id="nav-main" class="clearfix" role="navigation">
 <?php     if (has_nav_menu('primary_navigation')) :             
 wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu','fallback_cb' => 'horseclub_bootstrap_navwalker::fallback','walker' => new horseclub_bootstrap_navwalker()));
 endif;?>
 </nav> 
 </div>
 </div>
 </div>
 <!-- topnav-right -->
 </div> 
 <!-- Close Row --> 
 </div> 
 <!-- Close Container -->
 </div>	 	 
	 <!-- end Logo Centar --> <?php }
 else if($horseclub_usefulpi['menu_layout'] == 'up_popup_menu')  { ?>
	<?php global $post;$id = get_the_ID(); $stih = get_post_meta( $id, '_horseclub_head_s', true );$nw = get_post_meta( $id, '_horseclub_nav_w', true );?>
 <div id="up_topbar" class="topclass <?php if ($stih != '') {echo $stih;} else {echo 'enable_sticky';} ?>">
 <div class="container <?php if ($nw != '') {echo $nw;} ?>">
 <div class="row">
 <div class="col-md-3 topnav-left">
 <div class="topbarmenu clearfix">
 <!-- Logo Start -->
 <div id="logo" class="logocase">
 <a class="brand logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>">
 <?php global $horseclub_usefulpi; if (!empty($horseclub_usefulpi['x1_usefulpi_logo_upload']['url'])) { ?> <div id="uplogo">
 <img src="<?php echo $horseclub_usefulpi['x1_usefulpi_logo_upload']['url']; ?>" alt="<?php  bloginfo('name');?>" class="up-logo <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <?php echo 'custom_sticky';?>  <?php } ?>" />
  <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['s_usefulpi_logo_upload']['url'];?>" class="sticy-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 <?php if(!empty($horseclub_usefulpi['x2_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['x2_usefulpi_logo_upload']['url'];?>" class="retina-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 </div>
 <?php } else { bloginfo('name'); } ?>
 </a>                      
 </div> <!-- #logo popup end -->
 </div>
 </div>
 <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['display_shopicon'])) 
 {               
 if($horseclub_usefulpi['display_shopicon'] == '1') 
 { 
 if (class_exists('woocommerce')) {
 global $woocommerce; ?> 
 <div class="shop_icon"> 
 <a class="cart-ic" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'horseclub'); ?>">
 <i class="fa fa-cart-arrow-down"></i></a> 
 	<?php
				
				if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					the_widget( 'WC_Widget_Cart', 'title= ' );
				} else {
					the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
				}
			?>		
 </div>
  <?php } } }?>	
  <?php  if($horseclub_usefulpi['display_search'] == '1') { ?> 
<div class="search_menu">
   <a href="#ser" class="navsearch-icon">
   <i class="fa fa-search"></i></a>
</div>
 <?php } ?>
 <div class="topnav-right">
 <div class="topbarmenu clearfix"> 
  <div class="popup_menuo">
   <a id="toggle-menu" class="toggle-menu-hidden">
    <div>
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
    </div>
  </a>
 </div>
	</div>
 </div>
 <!-- right menu end-->
	</div> 
		</div> 
			</div>	 	 
	 <?php }
	 
	else if($horseclub_usefulpi['menu_layout'] == 'up_popup_menu_x')  { ?>
	<?php global $post;$id = get_the_ID(); $stih = get_post_meta( $id, '_horseclub_head_s', true );$nw = get_post_meta( $id, '_horseclub_nav_w', true );?>
 <div id="up_topbar" class="topclass <?php if ($stih != '') {echo $stih;} else {echo 'enable_sticky';} ?>">
 <div class="container <?php if ($nw != '') {echo $nw;} ?>">
 <div class="row">
 <div class="col-md-3 topnav-left">
 <div class="topbarmenu clearfix">
 <!-- Logo Start -->
 <div id="logo" class="logocase">
 <a class="brand logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>">
 <?php global $horseclub_usefulpi; if (!empty($horseclub_usefulpi['x1_usefulpi_logo_upload']['url'])) { ?> <div id="uplogo">
 <img src="<?php echo $horseclub_usefulpi['x1_usefulpi_logo_upload']['url']; ?>" alt="<?php  bloginfo('name');?>" class="up-logo <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <?php echo 'custom_sticky';?>  <?php } ?>" />
  <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['s_usefulpi_logo_upload']['url'];?>" class="sticy-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 <?php if(!empty($horseclub_usefulpi['x2_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['x2_usefulpi_logo_upload']['url'];?>" class="retina-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>
 </div>
 <?php } else { bloginfo('name'); } ?>
 </a>                      
 </div> <!-- #logo popup end -->
 </div>
 </div>
    <div class="popup_menuo x">
   <a id="toggle-menu" class="toggle-menu-hidden">
    <div>
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
    </div>
  </a>
 </div>
 <div class="menu-opener">
 <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['display_shopicon'])) 
 {               
 if($horseclub_usefulpi['display_shopicon'] == '1') 
 { 
 if (class_exists('woocommerce')) {
 global $woocommerce; ?> 
 <div class="shop_icon"> 
 <a class="cart-ic" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'horseclub'); ?>">
 <i class="fa fa-cart-arrow-down"></i></a> 
 	<?php
				
				if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					the_widget( 'WC_Widget_Cart', 'title= ' );
				} else {
					the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
				}
			?>		
 </div>
  <?php } } }?>	
  <?php  if($horseclub_usefulpi['display_search'] == '1') { ?> 
<div class="search_menu">
   <a href="#ser" class="navsearch-icon">
   <i class="fa fa-search"></i></a>
</div>
 <?php } ?>

 <div class="topnav-right">
 <div class="topbarmenu clearfix">

<nav id="nav-main" class="clearfix" role="navigation">
 <?php     if (has_nav_menu('primary_navigation')) :             
 wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu','fallback_cb' => 'horseclub_bootstrap_navwalker::fallback','walker' => new horseclub_bootstrap_navwalker()));
 endif;?>
 </nav>  
 </div>

	</div>
 </div>
 
 <!-- right menu end-->
	</div> 
		</div> 
			</div>	 	 
	 <?php } 
	 
	 else if($horseclub_usefulpi['menu_layout'] == 'up_popup_menu_left')  { ?>

	  <!-- PopUp Menu -->
<div class="main-navm left pop-visible <?php global $horseclub_usefulpi; if($horseclub_usefulpi['sub_color_menu'] == '1') {echo 'dark';} else {echo "white";}  ?> ">
<div class="row">
  
<article class="col-md-12 height-x popup-left-bg-bar">
		  
 <div id="up_topbar" class="topclass">
 
 <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['display_shopicon'])) 
 {               
 if($horseclub_usefulpi['display_shopicon'] == '1') 
 { 
 if (class_exists('woocommerce')) {
 global $woocommerce; ?> 
 <div class="shop_icon"> 
 <a class="cart-ic" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'horseclub'); ?>">
 <i class="fa fa-cart-arrow-down"></i></a> 
 	<?php
				
				if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					the_widget( 'WC_Widget_Cart', 'title= ' );
				} else {
					the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
				}
			?>		
 </div>
  <?php } } }?>	
  <?php  if($horseclub_usefulpi['display_search'] == '1') { ?>
  
   <div class="search_menu">
   <a href="#seb" class="navsearch-icon">
 <i class="fa fa-search"></i></a>
 </div>
 
 <?php } ?> 
 <div class="container">
 <div class="row">

 <!-- close topnav left -->
 <div class="navcenter">

  <div class="topnav-left">
 <div class="topbarmenu clearfix">
 <nav id="nav-main" class="clearfix" role="navigation">
 <?php     if (has_nav_menu('primary_navigation')) :             
 wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu','fallback_cb' => 'horseclub_bootstrap_navwalker::fallback','walker' => new horseclub_bootstrap_navwalker()));
 endif;?>
 </nav> 
 </div>
 </div>
 </div>

 <!-- topnav-left end-->
 </div> 
 <!-- Row end --> 
 </div> 
 <!-- Container end -->
 </div>	    
<div class="malign">
 <div id="logo" class="logocase">
 <a class="brand logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>">
 <?php global $horseclub_usefulpi; if (!empty($horseclub_usefulpi['x1_usefulpi_logo_upload']['url'])) { ?> <div id="uplogo">
 <img src="<?php echo $horseclub_usefulpi['x1_usefulpi_logo_upload']['url']; ?>" alt="<?php  bloginfo('name');?>" class="up-logo <?php if(!empty($horseclub_usefulpi['s_usefulpi_logo_upload']['url'])) {?> <?php echo 'custom_sticky';?>  <?php } ?>" />
 </div>
 <?php } else { bloginfo('name'); } ?>
 </a>                      
 </div> <!-- #logo popup end -->
 
 	<?php if (is_active_sidebar('left-popup-sidebar') ) { ?> 
					<div class="pop_widgets">
					<?php dynamic_sidebar('left-popup-sidebar'); ?>
					</div> 
            	<?php }; ?>
				          </div>
						  <div class="paspartu_bottom"></div>
        </article>
	
      </div>      
</div> <!-- PopUp Menu end -->
<div  class="topclass" >
	<div class="up_mob_logo"> 
	 <?php if(!empty($horseclub_usefulpi['x2_usefulpi_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['x2_usefulpi_logo_upload']['url'];?>" class="retina-logo" alt="<?php  bloginfo('name');?>" /> <?php } ?>

	</div>
	 </div>
  <?php } 
 
 }
   	 else  { ?>
	 
 <div id="up_topbar" class="topclass">
 <div class="container ">
 <div class="row">
 <div class="col-md-3 topnav-left">
 <div class="topbarmenu clearfix">
 <!-- Logo Start -->
 <div id="logo" class="logocase">
 <a class="brand logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>">
 <?php bloginfo('name');  ?>
 </a>                      
 </div> <!-- Close #logo -->
 <!-- close logo span -->
 </div>
 </div>
 <!-- close topnav left -->
 <?php 
 if (class_exists('woocommerce')) {
 global $woocommerce; ?> 
 <div class="shop_icon"> 
 <a class="cart-ic" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'horseclub'); ?>">
 <i class="fa fa-cart-arrow-down"></i></a> 
 	<?php
				
				if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					the_widget( 'WC_Widget_Cart', 'title= ' );
				} else {
					the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
				}
			?>		
 </div>

   <div class="search_menu">
   <a href="#seb" class="navsearch-icon">
 <i class="fa fa-search"></i></a>
 </div>
   <div class="nav-search_form"> <button class="search-nav_x  search-nav-close"></button>
 <form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
   <div class="animform">
        <input type="text" value="" name="s" id="s"  autocomplete="off" placeholder="<?php esc_html_e('START TYPING...', 'horseclub'); ?>" />
		 <button class="search-button" id="searchsubmit"><i class="fa fa-search"></i></button>				
    </div>
</form>
</div>
 <?php } ?>
 <div class="topnav-right">
 <div class="topbarmenu clearfix">
 <nav id="nav-main" class="clearfix" role="navigation">
 <?php     if (has_nav_menu('primary_navigation')) :             
 wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu','fallback_cb' => 'horseclub_bootstrap_navwalker::fallback','walker' => new horseclub_bootstrap_navwalker()));
 endif;?>
 </nav> 
 </div>
 </div>
 <!-- topnav-right end-->
 </div> 
 <!-- Row end --> 
 </div>  </div>
 
  <?php }
  ?>
 <div class="container_mob"> 
 <?php if (has_nav_menu('mobile_navigation')) : ?>
 <div id="mobile-up-trigger" class="nav-trigger">
 <a class="nav-trigger-case mobileclass collapsed" data-toggle="collapse" data-target=".up-nav-collapse">
 <div class="up-menu-icon"><i class="fa fa-bars"></i></div>
 </a> 
 </div>
 <div id="up-mobile-nav" class="up-mobile-nav"> 
 <div class="nav-inner mobileclass"> 
 <div class="up-nav-collapse"> 
 <?php wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'up-mobnav','fallback_cb' => 'horseclub_bootstrap_navwalker::fallback','walker' => new horseclub_bootstrap_navwalker())); ?>
 </div> 
 </div> 
 </div> 
 <?php  endif; ?>
 </div> 
 <!--  Mob menu end -->
 </header>