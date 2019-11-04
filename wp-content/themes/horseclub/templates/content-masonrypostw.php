 <?php  global $post; $postcontent = get_post_meta( $post->ID, '_horseclub_post_type', true );
    $slideheight = 200; 
    $slidewidth = 390;   ?>
	 	<div class="blogmasonry wid">
          <article  <?php post_class(); ?>>
		     <div class="mas_data">
			   <div class="mas_data_inner">
			   <span class="mas_month"><?php echo get_the_date('M');?></span>
			   <span class="mas_date"><?php echo get_the_date('j'); ?></span>
			   <span class="mas_year"><?php echo get_the_date('Y');?></span>
			   </div>			   
			 </div>
		  		<div class="post-content">  		  
           <?php if ($postcontent == 'flex') { ?>
               <section class="postmedia">
                <div class="flexslider">
                <ul class="slides">
                 <?php global $post;
                      $image_gallery = get_post_meta( $post->ID, '_horseclub_image_gallery', true );
                          if(!empty($image_gallery)) {
                            $attachments = array_filter( explode( ',', $image_gallery ) );
                              if ($attachments) {
                              foreach ($attachments as $attachment) {
								$the_title = get_the_title($attachment);							 
								$alt_text = get_post_meta($attachment, '_wp_attachment_image_alt', true);
                                $attachment_url = wp_get_attachment_url($attachment , 'full');
                                $image = horseclub_resize($attachment_url, $slidewidth, $slideheight, true);
                                  if(empty($image)) {$image = $attachment_url;}
                                 echo '<li><a href='.$attachment_url.' class="image-popup-no-margins"><img src="'.$image.'" title="'.$the_title.'" alt="'.$alt_text.'" /></a></li>';
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
          <div class="videofit" style="max-width:<?php echo $slidewidth ;?>px;">
              <?php global $post; $video = get_post_meta( $post->ID, '_horseclub_post_video', true ); echo $video; ?>
          </div>
        </section>
        <?php } else if ($postcontent == 'image') { ?>
                <?php             
                    $thumb = get_post_thumbnail_id();
					$alt_text = get_post_meta($thumb, '_wp_attachment_image_alt', true);  
                    $img_url = wp_get_attachment_url( $thumb,'full' ); 
                    $image = horseclub_resize( $img_url, $slidewidth, $slideheight, true ); 
					
                    if(empty($image)) { $image = $img_url; }
                    ?>
                    <?php if($image) : ?>
					<section class="postmedia">
                      <div class="img_post zoomhover"><a href="<?php echo $img_url ?>" class="image-popup-no-margins" ><img src="<?php echo $image ?>" title="<?php the_title(); ?>" alt="<?php echo $alt_text;?>" /></a></div>
                   </section>
				   <?php endif; ?>
        <?php } ?>
		<div class="data_wrap">
		   <header>
       <a href="<?php the_permalink() ?>"><h5 class="entry-title"><?php the_title(); ?></h5></a>
         <div class="datahead">                              
								 <i class="fa fa-folder-open-o"></i>
                                  <?php $post_category = get_the_category($post->ID); if ( $post_category==true ) { ?> <?php the_category(', ') ?> <?php }?> /
                                  
                                <span class="postcommentscount">
                                  <?php comments_number( '0', '1', '%' ); ?> <?php esc_html_e('comments:', 'horseclub');?>
                                </span>
      </div>
    </header>
		
    <div class="entry-content">
       <?php echo up_excerpt(15); ?>
    </div>
 
 </div>
 </div> 
  </article>
</div>
