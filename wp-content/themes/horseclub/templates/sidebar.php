<?php	
	if( class_exists('woocommerce') and (is_shop() || is_product_category() || is_product_tag())) {
			
				
					dynamic_sidebar('shop-primary');
					}
						
		
		else if( is_page_template('page-blog.php') || (get_post_type() == 'post')) {
		global $post; $sidebar = get_post_meta( $post->ID, '_horseclub_sidebar_choice', true ); 	 		
					dynamic_sidebar('sidebar-primary');				 
		}		
		else if (is_archive()) {
		dynamic_sidebar('sidebar-primary');
		}
		else if(is_category()) {
			dynamic_sidebar('sidebar-primary');
		}
		elseif (is_tag()) {
			dynamic_sidebar('sidebar-primary');
		}
		elseif (is_post_type_archive()) {
			dynamic_sidebar('sidebar-primary');
		}
		 elseif (is_day()) {
			 dynamic_sidebar('sidebar-primary');
		 }
		 elseif (is_month()) {
			 dynamic_sidebar('sidebar-primary');
		 }
		 elseif (is_year()) {
			 dynamic_sidebar('sidebar-primary');
		 }
		 elseif (is_author()) {
			 dynamic_sidebar('sidebar-primary');
		}
		elseif (is_search()) {
			dynamic_sidebar('sidebar-primary');
		}
		else {
		dynamic_sidebar('sidebar-primary');
	}
?>