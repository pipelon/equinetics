<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
	<?php  if($horseclub_usefulpi['display_loader'] == '1') { ?>	
<div id="loader" class="<?php echo "white_pre";?>">
  <div id="up_status"> 
  <div class="preloader-img">
   <?php global $horseclub_usefulpi; if(!empty($horseclub_usefulpi['preloader_logo_upload']['url'])) {?> <img src="<?php echo $horseclub_usefulpi['preloader_logo_upload']['url'];?>"  alt="<?php  bloginfo('name');?>" /> <?php } ?>
  </div>
 <?php global $horseclub_usefulpi; if($horseclub_usefulpi['spinner']  == 'sp_1') { ?>	 
				 <div class="preloader-up">
            <div class="spinner">
                <div class="spot1"></div>
                <div class="spot2"></div>
            </div>
        </div> 
	  <?php } ?> 
	  
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['spinner']  == 'sp_2') { ?>	 
				 <div class="preloader-up">
            <div class="spinner sp_2">
      <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
            </div>
        </div> 
	  <?php } ?> 

<?php global $horseclub_usefulpi; if($horseclub_usefulpi['spinner']  == 'sp_3') { ?>	 
				 <div class="preloader-up">
            <div class="spinner sp_3">
<div class="cube1"></div>
  <div class="cube2"></div>
            </div>
        </div> 
	  <?php } ?> 	

<?php global $horseclub_usefulpi; if($horseclub_usefulpi['spinner']  == 'sp_4') { ?>	 
				 <div class="preloader-up">
            <div class="spinner sp_4">
 <div class="bounce1"></div>
  <div class="bounce2"></div>
  <div class="bounce3"></div>
            </div>
        </div> 
	  <?php } ?> 	  

  </div>
</div>
<?php } ?>
<div id="wrapper" class="container">
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['menu_layout']  == 'up_popup_menu_left') { ?>	
 <div class="paspartu_outer  paspartu_on_bottom_fixed"> 	
	<div class="paspartu_top"></div>  	
    <div class="paspartu_right"></div>
    <div class="paspartu_bottom"></div>
 <?php } ?> 
  <?php
    do_action('get_header');
    get_template_part('templates/header');
?>
 <?php  if ( get_post() )  :?>

<?php
$id = get_the_ID();
$rev_slider = get_post_meta( $id, '_horseclub_revs', true ); 								
				if ($rev_slider != '' && function_exists('putRevSlider') ) : ?>
				<div class="rev_slide"><?php echo putRevSlider($rev_slider); ?></div>								
				<?php  endif; ?>  
	<?php  endif; ?>	
<div class="wrap maincontent <?php  global $horseclub_usefulpi; if(isset($horseclub_usefulpi['theme_color_main'])){if($horseclub_usefulpi['theme_color_main'] == '1'){echo 'dark_version';}};?>" role="document">
       <?php include horseclub_template_path(); ?>
       <?php if (horseclub_sidebar())  : ?>
		<aside class="<?php echo horseclub_sidebar_class(); ?>" role="complementary">
        <div class="sidebar">
       <?php include horseclub_sidebar_path(); ?>
        </div><!-- .sidebar -->
		</aside><!-- aside end -->
      <?php endif; ?>
     </div><!-- .row-->
   <?php global $horseclub_usefulpi; if($horseclub_usefulpi['menu_layout']  == 'up_popup_menu_left') { ?></div><?php } ?> 	
    </div><!-- .content -->  
  <?php get_template_part('templates/footer'); ?>
</body>
</html>
