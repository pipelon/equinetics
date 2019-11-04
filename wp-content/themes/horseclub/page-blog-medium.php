<?php
/*
Template Name: Blog Medium
*/
?>	<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
    <div id="content" class="container">
   		<div class="row">
	
			<?php if(horseclub_sidebar()) {$display_sidebar = true; $fullclass = '';} else {$display_sidebar = false; $fullclass = 'fullwidth';}?>
      <div class="main <?php echo horseclub_main_class();?> <?php echo $fullclass; ?>" role="main">
      		<?php  global $post; $blog_category = get_post_meta( $post->ID, '_horseclub_blog_cat', true ); 
      				if($blog_category == '-1' || $blog_category == '') {
      					$blog_cat_slug = '';
					} else {
					$blog_cat = get_term_by ('id',$blog_category,'category');
					$blog_cat_slug = $blog_cat -> slug;
					}

					$blog_items = get_post_meta( $post->ID, '_horseclub_blog_items', true ); 
					if($blog_items == 'all') {$blog_items = '-1';} 

					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'paged' => $paged,
						'category_name'=>$blog_cat_slug,
						'posts_per_page' => $blog_items));
					$count =0;
					if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php 
						
								get_template_part('templates/content', 'blogmedium');
					
                    endwhile; else: ?>
						<li class="error-found"><?php esc_html_e('Sorry, no post found.', 'horseclub'); ?></li>
					<?php endif; ?>
                
				<?php if ($wp_query->max_num_pages > 1) : ?>
				<?php if(function_exists('horseclub_wp_pagenavi')) { ?>
        			<?php horseclub_wp_pagenavi(); ?>   
        		<?php } else { ?>      
						<nav class="post-nav">
							<ul class="pager">
							  <li class="previous"><?php next_posts_link(esc_html__('&larr; Older posts', 'horseclub')); ?></li>
							  <li class="next"><?php previous_posts_link(esc_html__('Newer posts &rarr;', 'horseclub')); ?></li>
							</ul>
						  </nav>
        		<?php } ?> 
				<?php endif; ?>
				<?php $wp_query = null; $wp_query = $temp; ?>
				<?php wp_reset_postdata()  ?>

</div><!-- .main -->