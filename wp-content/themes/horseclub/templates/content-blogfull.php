 <?php  global $post; $postcontent = get_post_meta( $post->ID, '_horseclub_post_type', true );$slideheight = 640; $slidewidth = 1170;  ?>
<article <?php post_class(); ?>>		  		  		  
           <?php if ($postcontent == 'flex') { ?>
               <section class="postmedia">
                <div class="flexslider" style="max-width:<?php echo $slidewidth;?>px;">
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
                             echo '<li><a href='.$attachment_url.' class="image-popup-no-margins"><img src="'.$image.'" title="'.$the_title.'" alt="'.$alt_text.'" /></a></li>';}
                            }
                          } else {
                            $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                            $attachments = get_posts($attach_args);
                            if ($attachments) {
                            foreach ($attachments as $attachment) {
							$the_title = get_the_title($attachment);							 
								$alt_text = get_post_meta($attachment, '_wp_attachment_image_alt', true);
                                $attachment_url = wp_get_attachment_url($attachment->ID , 'full');
                                $image = horseclub_resize($attachment_url, $slidewidth, $slideheight, true);
                                if(empty($image)) {$image = $attachment_url;}
                             echo '<li><a href='.$attachment_url.' class="image-popup-no-margins"><img src="'.$image.'" title="'.$the_title.'" alt="'.$alt_text.'" /></a></li>'; }
                              } 
                    } ?>               
                </ul>
          </div> <!-- Post Flex Slide end-->
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
					$thumb = get_post_thumbnail_id();
					$alt_text = get_post_meta($thumb, '_wp_attachment_image_alt', true);                   
                    $img_url = wp_get_attachment_url( $thumb,'full' ); 
                    $image = horseclub_resize( $img_url, true ); 
                    if(empty($image)) { $image = $img_url; }
                    ?>
                    <?php if($image) : ?>
				<section class="postmedia">
        <div class="img_post zoomhover"><a href="<?php echo $img_url ?>" class="image-popup-no-margins"><img src="<?php echo $image ?>" title="<?php the_title(); ?>" alt="<?php echo $alt_text;?>" /></a></div>
                </section>
				   <?php endif; ?>
        <?php } ?>
<div class="blogo_bottom_content">		
<header>
<div class="datahead">
	<span class="postaut">
	<span class="postdate"><i class="fa fa-clock-o"></i> <?php echo get_the_date('j'); ?>. <?php echo get_the_date('M');?>. <?php echo get_the_date('Y');?></span> / <?php echo esc_html__('by', 'horseclub');?>  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php echo get_the_author() ?></a>  /  
    </span>  &nbsp;<i class="fa fa-folder-open-o"></i>
    <?php $post_category = get_the_category($post->ID); if ( $post_category==true ) { ?> <?php the_category(', ') ?> <?php }?> /                                  
    <span class="postcommentscount">
    <?php comments_number( '0', '1', '%' ); ?> <?php esc_html_e('comments', 'horseclub');?>
    </span>
</div>
      <h1 class="entry-title"><?php if ( is_sticky() ){echo '<i class="fa fa-paperclip"></i>';}?> <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>

</header>		
		
    <div class="entry-content">
       <?php echo up_excerpt(45); ?>
	   <?php wp_link_pages(); ?>
    </div>
	
</div>	<!-- .blogo_bottom_content-->
</article>