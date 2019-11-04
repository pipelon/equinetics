   <div id="content" class="container">
      <div class="row">
      <div class="main main col-lg-9 col-md-8 " role="main">
            <?php if (have_posts()) :  ?>
                <h1><?php esc_html_e('Search Results:','horseclub'); ?></h1>			
                <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="entry">
                        <p><?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?></p>
                    </div>
                </article>
                <hr />
                <?php endwhile; ?>
        
            <?php else :  ?>
                <h2><?php esc_html_e('Sorry. We couldn&rsquo;t find anything for that search.','horseclub'); ?></h2>
           <hr />
               
            <?php endif; ?>
	    <div class='new_search'>                                            
                           <h4> <?php esc_html_e('New Search.','horseclub') ?></h4>
                           <?php
                            get_search_form();                          
                            ?>                       
                    </div>
        </div> <!-- /.col-md-8 -->

