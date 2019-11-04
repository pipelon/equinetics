<?php global $post; $portpost_vfc = get_post_meta( $post->ID, '_horseclub_portfullt_vfc', true );?>
<?php wp_enqueue_script('horseclub_anim_script');?>
<?php wp_enqueue_style( 'horseclub_anim' ); ?>
<div class="animsition">
<div id="content" class="container <?php if ($portpost_vfc == 'pvcef') echo 'vpc_full'; ?> ">
    <div class="row single-article  <?php if ($portitle == '') echo 'no_title'; ?>">
    <div class="main <?php echo horseclub_main_class(); ?>" role="main">
<?php while (have_posts()) : the_post(); ?>
<?php global $post; $portpost_type = get_post_meta( $post->ID, '_horseclub_portpost_type', true );$portpost_vc = get_post_meta( $post->ID, '_horseclub_portpost_vc', true );$portitle = get_post_meta( $post->ID, '_horseclub_portpost_vct', true );?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>"> 
	 <?php if ($portpost_vc == 'pvce') { ?>
	 <?php the_content(); ?>
	 <?php }
	 else if ($portpost_vc == '') { ?>
      <div class="portclass">
      	<div class="portfolio-img">      		
				<?php if ($portpost_type == 'flex') { ?>
		<div class="flexslider" style="max-width:1170px;">
             <ul class="slides el">
						<?php global $post;
                          	$image_gallery = get_post_meta( $post->ID, '_horseclub_image_gallery', true );
                          	if(!empty($image_gallery)) {
                    		$attachments = array_filter( explode( ',', $image_gallery ) );
                    		if ($attachments) {
							foreach ($attachments as $attachment) {
							$attachment_url = wp_get_attachment_url($attachment , 'full');
							$the_title = get_the_title($attachment);							 
							$alt_text = get_post_meta($attachment, '_wp_attachment_image_alt', true);
							$image = horseclub_resize($attachment_url, 1170, 658, true);
							if(empty($image)) {$image = $attachment_url;}
							echo '<li><a href="'.$attachment_url.'" title="'.$the_title.'"><img src="'.$image.'" title="'.$the_title.'" alt="'.$alt_text.'"/></a></li>';
							}
							}
                  }  ?>                                
			</ul>
              </div> <!--Portfolio Flex Slider-->
				<?php }
				else if ($portpost_type == 'video') { ?>
					<div class="videofit">
                  <?php global $post; $video = get_post_meta( $post->ID, '_horseclub_post_video', true ); echo $video; ?>
                  </div>
				<?php } else if ($portpost_type == 'none') {					
				} else {					
					$post_id = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $post_id);
					$image = horseclub_resize( $img_url, 1170, 658, true ); 
					if(empty($image)) {$image = $img_url; } ?>
                <?php if($image) : ?>
                     <div class="imghover">
                      <a href="<?php echo $img_url ?>" class="image-popup-no-margins">
						<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
                      </a>
                  </div>
                       <?php endif; ?>
				<?php } ?>
</div>
			<div class="row portfolio_data">
			
 <?php if ($portitle == '') { ?>
 <div class="entry-content-portfolio col-lg-9">
<header>
      <h1 class="entry-title portfolio"><?php the_title(); ?></h1>
</header>
</div>
<?php global $post;$page_id = $post->ID; 
 if (has_post_thumbnail($page_id) ):
 $image = wp_get_attachment_image_src( get_post_thumbnail_id($page_id), 'single-post-thumbnail' );
 endif;   
if(!empty($image)) {$image_URI = $image[0];} else{$image_URI = '';}  
?>	

 <?php } ?>				
	<div class="col-lg-3">
	<div class="post_share up">		  	 	  
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['1'] == '1') { ?>
	  <a href="#" class="facebook" data-social='{"type":"facebook", "url":"<?php the_permalink(); ?>", "text": "<?php the_title(); ?>", "image": ""}' title="<?php the_title(); ?>"><i class="fa fa-facebook"></i></a>
	   <?php } ?>
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['2'] == '1') { ?>	 
	 <a href="#" class="twitter" data-social='{"type":"twitter", "url":"<?php the_permalink(); ?>", "text": "<?php the_title(); ?>"}' title="<?php the_title(); ?>"><i class="fa fa-twitter"></i></a>
	  <?php } ?>
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['3'] == '1') { ?>
      <a href="#" class="plusone" data-social='{"type":"plusone", "url":"<?php the_permalink(); ?>", "text": "<?php the_title(); ?>"}' title="<?php the_title(); ?>"><i class="fa fa-google-plus"></i></a>
	   <?php } ?>
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['4'] == '1') { ?>	   
      <a href="#" class="pinterest" data-social='{"type":"pinterest", "url":"<?php the_permalink(); ?>", "text": "<?php the_title(); ?>", "image": ""}' title="<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>	  
 <?php } ?>	  
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['5'] == '1') { ?>	   
<a target="_blank" class="linkedib" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php up_excerpt(50); ?>&source=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a>
 <?php } ?>
 
	 </div><!--post_share-->
	 </div>		
			
		    <div class="entry-content-portfolio col-lg-9">
						<?php the_content(); ?>
			</div>
	    		<div class="col-lg-3">
	    			<div class="porfolio-bottom">
				    <ul class="portfolio-list">
<?php global $post;
		$project_1 = get_post_meta( $post->ID, '_horseclub_project_1_title', true );$project_11 = get_post_meta( $post->ID, '_horseclub_project_11_description', true );$project_2 = get_post_meta( $post->ID, '_horseclub_project_2_title', true );$project_22 = get_post_meta( $post->ID, '_horseclub_project_22_description', true );
		$project_3 = get_post_meta( $post->ID, '_horseclub_project_3_title', true );$project_33 = get_post_meta( $post->ID, '_horseclub_project_33_description', true );$project_4 = get_post_meta( $post->ID, '_horseclub_project_4_title', true );
		$project_44 = get_post_meta( $post->ID, '_horseclub_project_44_description', true );$project_5 = get_post_meta( $post->ID, '_horseclub_project_5_title', true );$project_55 = get_post_meta( $post->ID, '_horseclub_project_55_description', true ); ?>
				    <?php if ($project_1 != '') echo '<li class="portdetails">'.$project_1.'<span> '.$project_11.'</span></li>'; ?>
				    <?php if ($project_2 != '') echo '<li class="portdetails">'.$project_2.'<span> '.$project_22.'</span></li>'; ?>
				    <?php if ($project_3 != '') echo '<li class="portdetails">'.$project_3.'<span> '.$project_33.'</span></li>'; ?>
				    <?php if ($project_4 != '') echo '<li class="portdetails">'.$project_4.'<span> '.$project_44.'</span></li>'; ?>
				    <?php if ($project_5 != '') echo '<li class="portdetails">'.$project_5.'<span> <a href="'.$project_55.'" target="_new">'.$project_55.'</a></li>'; ?>
				    </ul>
				</div>
				</div>
    	</div><!--portfolio_data -->
  
    <div class="clearfix"></div>
    </div><!--portclass--> <?php  }?>
	
<div class="work-top">
<div class="work-nav">
<?php $por_img = get_template_directory_uri();?>
<div class="previous-work">
<?php horseclub_previous_post_link_plus( array('order_by' => 'menu_order', 'loop' => true, 'format' => '%link', 'link' => '<img src="'.$por_img.'/assets/img/previous-work.png">') ); ?></div>
<div class="all-work">
<?php global $horseclub_usefulpi; if( !empty($horseclub_usefulpi['portfolio_link'])){ ?>
		<a href="<?php echo get_page_link($horseclub_usefulpi["portfolio_link"]); ?>"><?php } 
		else {?> <a href="../"><?php } ?>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/all-work.png" alt="Previous work">
		</a>	
</div><!--all-work-->

<div class="next-work">
<?php horseclub_next_post_link_plus( array('order_by' => 'menu_order', 'loop' => true, 'format' => '%link', 'link' => '<img src="'.$por_img.'/assets/img/next-work.png">') ); ?>
</div>
</div>
</div>	

    <?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['portfolio_comments']) && $horseclub_usefulpi['portfolio_comments'] == 1) { comments_template('/templates/comments.php'); } ?>
</article>
<?php endwhile; ?>
</div>
</div>
	<script type="text/javascript">
 jQuery(document).ready(function($) {
  
  $(".animsition").animsition({
  
    inClass               :   'fade-in-right',
    outClass              :   'fade-out-right',
    inDuration            :    1500,
    outDuration           :    800,
    linkElement           :   '.animsition-link', 
    loading               :    true,
    loadingParentElement  :   'body', 
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
                              '-webkit-animation-duration',
                              '-o-animation-duration'
                            ],
    
    overlay               :   false,
    
    overlayClass          :   'animsition-overlay-slide',
    overlayParentElement  :   'body'
  });
  

});
</script> 

<?php if ($portpost_type == 'flex') { ?>

	<script type="text/javascript">
				   jQuery(document).ready(function($) {
				   "use strict";
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: false,
										directionNav: true,
										prevText: "<div><i class='left_nav_slider'></i></div>",
										nextText: "<div><i class='right_nav_slider'></i></div>",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
	</script>         
				<?php }
				