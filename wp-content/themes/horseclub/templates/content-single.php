  <?php if(horseclub_sidebar()) {$slide_sidebar = 848;} else {$slide_sidebar = 1170;}
  global $post; $postcontent = get_post_meta( $post->ID, '_horseclub_post_type', true );

    $swidth = get_post_meta( $post->ID, '_horseclub_posthead_width', true ); if (!empty($swidth)) $slidewidth = $swidth; else $slidewidth = $slide_sidebar; 
?>
<div id="content" class="container">
    <div class="row single-article">
      <div class="main <?php echo horseclub_main_class(); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class(); ?>>
		  	  
         <?php if ($postcontent == 'flex') { ?>
              <section class="postmedia">
                <div class="flexslider" style="max-width:<?php echo $slidewidth;?>px;">
                <ul class="slides el">
                  <?php global $post;
				  
				  
                      $image_gallery = get_post_meta( $post->ID, '_horseclub_image_gallery', true );
					 
						
                          if(!empty($image_gallery)) {
                            $attachments = array_filter( explode( ',', $image_gallery ) );
							
                              if ($attachments) {
                              foreach ($attachments as $attachment) {
                            $the_title = get_the_title($attachment);							 
							$alt_text = get_post_meta($attachment, '_wp_attachment_image_alt', true);
							$attachment_url = wp_get_attachment_url($attachment , 'full');
                                $image = horseclub_resize($attachment_url, $slidewidth, 500, true);
								
                                  if(empty($image)) {$image = $attachment_url;}
                                echo '<li><a href='.$attachment_url.'><img src="'.$image.'" title="'.$the_title.'" alt="'.$alt_text.'" /></a></li>';
								
                              }
                            }
                          } else {
                            $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                            $attachments = get_posts($attach_args);
                              if ($attachments) {
                                foreach ($attachments as $attachment) {
								 $the_title = get_the_title($attachment);							 
							$alt_text = get_post_meta($attachment, '_wp_attachment_image_alt', true);
								
                                  $attachment_url = wp_get_attachment_url($attachment->ID , 'full');
                                  $image = horseclub_resize($attachment_url, $slidewidth, 500, true);
                                    if(empty($image)) {$image = $attachment_url;}
								echo '<li><a href='.$attachment_url.'><img src="'.$image.'" title="'.$the_title.'" alt="'.$alt_text.'" /></a></li>';

                                }
                              } 
                          } ?>                            
                  </ul>
                </div> <!--Flex Slides-->
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
              </section>
        <?php } else if ($postcontent == 'video') { ?>
        <section class="postmedia">
          <div class="videofit">
              <?php global $post; $video = get_post_meta( $post->ID, '_horseclub_post_video', true ); echo $video; ?>
          </div>
        </section>
        <?php } else if ($postcontent == 'image') { ?>
                <?php   									
                    $thumb = get_post_thumbnail_id($post->ID);
					$alt_text = get_post_meta($thumb, '_wp_attachment_image_alt', true);
                    $img_url = wp_get_attachment_url( $thumb,'full' ); 
                    $image = horseclub_resize( $img_url, true ); 
                    if(empty($image)) { $image = $img_url; }
                    ?>
                    <?php if($image) : ?>
					<section class="postmedia">
                      <div class="img_post zoomhover"><a href="<?php echo $img_url ?>" class="image-popup-no-margins" ><img src="<?php echo $image; ?>" title="<?php the_title_attribute(); ?>" alt="<?php echo $alt_text;?>" /></a></div>
                   </section>
				   <?php endif; ?>
        <?php } ?>
<div class="blog_data_inner">
	    <header>
		 <div class="datahead">
	<span class="postaut">
	<span class="postdate"><i class="fa fa-clock-o"></i> <?php echo get_the_date('j'); ?>. <?php echo get_the_date('M');?>. <?php echo get_the_date('Y');?></span> / <?php echo esc_html__('by', 'horseclub');?>  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php echo get_the_author() ?></a>  / 
    </span> &nbsp;<i class="fa fa-folder-open-o"></i> 
    <?php $post_category = get_the_category($post->ID); if ( $post_category==true ) { ?> <?php the_category(', ') ?> <?php }?> /                                  
    <span class="postcommentscount">
    <?php comments_number( '0', '1', '%' ); ?> <?php esc_html_e('comments', 'horseclub');?>
    </span>
</div>
      <h1 class="entry-title"><?php if ( is_sticky() ){echo '<i class="fa fa-paperclip"></i>';}?> <?php the_title(); ?></h1>
    </header>	
		
 

	     <div class="entry-content">
      <?php the_content(); ?>	
		<?php wp_link_pages(); ?>
    </div>
	</div>
	
<div class="blog_data_share">

	
	
	<div class="post_share">
<?php global $post;$page_id = $post->ID; 
 if (has_post_thumbnail($page_id) ):
 $image = wp_get_attachment_image_src( get_post_thumbnail_id($page_id), 'single-post-thumbnail' );
 endif;   
if(!empty($image)) {$image_URI = $image[0];} else{$image_URI = '';}  
?>	  
	  <?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['1'] == '1') { ?>
	  
	  	<?php
	$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
  $html = '';
                        $html .= '<a href="#" onclick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . urlencode(horseclub_addslashes(get_the_title())) . '&amp;p[summary]=' . urlencode(horseclub_addslashes(get_the_excerpt())) . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;&p[images][0]=';
                        if(function_exists('the_post_thumbnail')) {
                            $html .=  wp_get_attachment_url(get_post_thumbnail_id());
                        }
                        $html .='\', \'sharer\', \'width=620,height=280\');" href="javascript: void(0)">';
                       
                        
                            $html .= '<i class="fa fa-facebook-square"></i>';
                        
                        
                        $html .= "</a>";
                         
echo $html;						
	  ?>
	   <?php } ?>
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['2'] == '1') { ?>	 
	 <a href="#" class="twitter" data-social='{"type":"twitter", "url":"<?php the_permalink(); ?>", "text": "<?php the_title(); ?>"}' title="<?php the_title(); ?>"><i class="fa fa-twitter-square"></i></a>
	  <?php } ?>
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['3'] == '1') { ?>
      <a href="#" class="plusone" data-social='{"type":"plusone", "url":"<?php the_permalink(); ?>", "text": "<?php the_title(); ?>"}' title="<?php the_title(); ?>"><i class="fa fa-google-plus-square"></i></a>
	   <?php } ?>
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['4'] == '1') { ?>	   
      <a href="#" class="pinterest" data-social='{"type":"pinterest", "url":"<?php the_permalink(); ?>", "text": "<?php the_title(); ?>", "image": ""}' title="<?php the_title(); ?>"><i class="fa fa-pinterest-square"></i></a>	  
 <?php } ?>	  
<?php global $horseclub_usefulpi; if($horseclub_usefulpi['share_multi'] ['5'] == '1') { ?>	   
  <a target="_blank" class="linkedib" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&source=LinkedIn" title="<?php the_title(); ?>"><i class="fa fa-linkedin-square"></i></a>	  
 <?php } ?>
	  </div>
  <div class="datahead">
	<h4><?php esc_html_e('SHARE THIS', 'horseclub'); ?></h4>
	
</div>

</div>	

	<?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['display_author'])) 
 {               
 if($horseclub_usefulpi['display_author'] == '1') 
 { ?>
<div class="author-bio">
<div class="author_img">
			<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
			<div class="author_share">
					<?php 
										
							$facebook_profile = get_the_author_meta( 'facebook_profile' );
						if ( $facebook_profile && $facebook_profile != '' ) {
							echo '<a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook-square"></i></a>';
						}
						
						$twitter_profile = get_the_author_meta( 'twitter_profile' );
						if ( $twitter_profile && $twitter_profile != '' ) {
							echo '<a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter-square"></i></a>';
						}
						
					
						$google_profile = get_the_author_meta( 'google_profile' );
						if ( $google_profile && $google_profile != '' ) {
							echo '<a href="' . esc_url($google_profile) . '" rel="author"><i class="fa fa-google-plus-square"></i></a>';
						}
						
						$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
						if ( $linkedin_profile && $linkedin_profile != '' ) {
							echo '<a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin-square"></i></a>';
						}
					?>
				</div></div>
			<div class="author-info">
				<h4 class="author-title"><?php esc_html_e('Written by', 'horseclub'); ?> <?php the_author(); ?></h4>
				<p class="author-description"><?php the_author_meta('description'); ?></p>
				

			</div>

</div>
<!--END author-->
 <?php  } }?>
	<?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['display_posttag'])) 
 {               
 if($horseclub_usefulpi['display_posttag'] == '1') 
 { ?>

	<?php $tag = esc_html__( 'Tags:', 'horseclub' );echo get_the_tag_list('<p>'.$tag.' ',', ','</p>');?>
	 
	 <?php  } }?>	
	<?php global $horseclub_usefulpi; if(isset($horseclub_usefulpi['display_postnav'])) 
 {               
 if($horseclub_usefulpi['display_postnav'] == '1') 
 { ?>
	<hr>
					<div class="single-nav">
					<div class="nav-previous"><?php previous_post_link('<i class="fa fa-angle-left"></i>&nbsp;&nbsp;<strong>%link</strong>'); ; ?></div>
					<div class="nav-next"><?php next_post_link('<strong>%link</strong>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>'); ?></div>
				</div>
	 <?php  } }?>
	 
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
</div>

