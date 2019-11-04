  <div id="headerpage">
    <div class="container">
       <?php get_template_part('templates/page', 'header'); ?>
    </div>
  </div> 
    <div id="content" class="container">
      <div class="row">
      <div class="main <?php echo horseclub_main_class(); ?>  post-list" role="main">
		<?php if (!have_posts()) : ?>
		<div class="alert">
		<?php esc_html_e('Sorry, no results were found.', 'horseclub'); ?>
		</div>
		<?php get_search_form(); ?>
		<?php endif; ?>
		<?php 
         while (have_posts()) : the_post(); 
         get_template_part('templates/content', get_post_format());
         endwhile;            
    if ($wp_query->max_num_pages > 1) : ?>
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
				
				
</div><!-- /.main -->