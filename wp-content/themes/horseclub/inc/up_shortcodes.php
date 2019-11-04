<?php
if (class_exists('WPBakeryVisualComposerAbstract')) {

//Progress Bar
class WPBakeryShortCode_horseclub_progress_bar extends WPBakeryShortCode {
   function content($atts, $content = null) {
   extract( shortcode_atts( array(
      'percentage' => '',
      'progress_bar_text' => '',
	  'digit' => '',
      'progresscolor' => ''
   ), $atts ) );
   wp_enqueue_script( 'waypoints' ); 
   

 $bar_styles = "background-color: ".$progresscolor.";";
           
 $output ='<div class="up_progress_bar">'; 
 $output .='<div class="up_progress_bar_inner">'; 
 
 $output .= '<div class="progress_count">';
 $output .= '<span class="prog_count"></span>';
 $output .= $digit;
 $output .= '</div>';
 $output .= '<div class="up_progress_text"><h3>'.$progress_bar_text.'</h3></div>';
 $output .= '<div class="up_single_bar" style="'.$bar_styles.'">';
 $output .= '<div class="up_bar_v" data-percentage="'.$percentage.'" data-value="'.$percentage.'"></div>';
 //$output .= '<div class="koko_line"></div>';
 $output .= '</div>';
 $output .= '</div>';
  $output .= '</div>';
return $output;   
}}
//Icon Top with text
class WPBakeryShortCode_horseclub_icon_text extends WPBakeryShortCode {
     function content($atts, $content = null) {
        extract(shortcode_atts(array(
            'icon_text' => '',
            'el_position' => '',
            'firstline' => '',
            'iconanimated' => '',
			'iconcolor' => '',
			'iconcolors_bg_c' => '',
			'iconcolortitle' => '',
			'textnoborder' => '',
			'iconsmall' => '',
			'topicon_link' => '',
			'topicon_target' => ''
						
        ), $atts));
		
		$iconanim = "";
			if($iconanimated != ""){
		$iconanim = $iconanimated;
		}
				$ic_bg_b_c = "";
			if($iconcolors_bg_c != ""){
		$ic_bg_b_c = "background: ".$iconcolors_bg_c.";border-color: ".$iconcolors_bg_c.";";
		}
			$border_text = "";
			if($textnoborder != ""){
		$border_text = $textnoborder;
		}
		
		$iconsm = "";
			if($iconsmall != ""){
		$iconsm = $iconsmall;
		}		           
		$output ='<div class="ic-inner ' . $iconsm . '">';
		$output .= '<div class="circle-text ' . $border_text . '" ';
		if($iconcolor != "" ){$output .= " style='";if($iconcolor != ""){$output .="color:".$iconcolor.";".$ic_bg_b_c."";}$output.="'";}$output .= '>';				
		if($topicon_link != "" ){$output .='<a href="'.$topicon_link.'" target="'.$topicon_target.'" style="color:'.$iconcolor.';" >';}
		$output .= '<i class="fa ' . $icon_text . ' '.$iconanim.'"></i></div>';	
		if($topicon_link != "" ){$output .='</a>';}
		$output .= '<h4 ' ;
		if($iconcolortitle != "" ){$output .= " style='";if($iconcolortitle != ""){$output .="color:".$iconcolortitle.";";}$output.="'";}$output .= '>';
		$output .= $firstline;
		$output .= '</h4>';
	    $output .= wpb_js_remove_wpautop($content, true);	        
        $output .='</div>';	   
        return $output;
    }
}

//Icon Left with text
class WPBakeryShortCode_horseclub_icon_text_left extends WPBakeryShortCode {
     function content($atts, $content = null) {
        extract(shortcode_atts(array(
            'icon_text_left' => '',
            'el_position' => '',
            'firstline_left' => '',
            'iconanimated_left' => '',
			'iconcolor_left' => '',
			'iconcolors_bg_l' => '',
			'icontitle_left' => '',
			'textnoborder_left' => '',
			'iconsmall_left' => '',
			'css_animation' => ''
			
        ), $atts));
		
		$iconaniml = "";
			if($iconanimated_left != ""){
		$iconaniml = $iconanimated_left;
		}
			$ic_bg_b_l = "";
			if($iconcolors_bg_l != ""){
		$ic_bg_b_l = "background: ".$iconcolors_bg_l.";border-color: ".$iconcolors_bg_l.";";
		}
			$border_textl = "";
			if($textnoborder_left != ""){
		$border_textl = $textnoborder_left;
		}
		
		$iconsml = $icla = "";
			if($iconsmall_left != ""){
		$iconsml = $iconsmall_left;
		}
		if ( $css_animation != '' ) {
				wp_enqueue_script( 'waypoints' );
				$icla = ' wpb_animate_when_almost_visible wpb_' . $css_animation ;
			}
               
		 $output ='<div class="ic-inner ' . $iconsml . ' '.$icla.'">';
		 $output .= '<div class="icon-holder">';
			$output .= '<div class="circle-text ' . $border_textl . '" ';
			if($iconcolor_left != "" ){$output .= " style='";if($iconcolor_left != ""){$output .="color:".$iconcolor_left.";".$ic_bg_b_l."";}$output.="'";}$output .= '>';				
			$output .= '<i class="fa ' . $icon_text_left . ' '.$iconaniml.'"></i></div>';	
			 $output .='</div>';
		   $output .= '<div class="text-holder">';
		 $output .= '<h4 ' ;
		if($icontitle_left != "" ){$output .= " style='";if($icontitle_left != ""){$output .="color:".$icontitle_left.";";}$output.="'";}$output .= '>';
		$output .= $firstline_left;
		$output .= '</h4>';
	        $output .= wpb_js_remove_wpautop($content, true);
	          $output .= '</div>';
       $output .='</div>';
	   
        
        return $output;
    }

}

//Icon Single
class WPBakeryShortCode_horseclub_icon_single extends WPBakeryShortCode {
     function content($atts, $content = null) {
        extract(shortcode_atts(array(
            'icon_texts' => '',
            'el_position' => '',          
            'iconanimateds' => '',
			'iconcolors' => '',
			'iconcolors_bg' => '',
			'textnoborders' => '',
			'iconsmalls' => '',
			'singleicon_link' => '',
			'singleicon_target' => '',
			'iconpos' => '',
			'css_animation' => ''
						
        ), $atts));
		
		$iconanims = "";
			if($iconanimateds != ""){
		$iconanims = $iconanimateds;
		}
		
		$ic_bg_b = $rmrm = "";
			if($iconcolors_bg != ""){
		$ic_bg_b = "background: ".$iconcolors_bg.";border-color: ".$iconcolors_bg.";";
		}		
		
			$border_texts = "";
			if($textnoborders != ""){
		$border_texts = $textnoborders;
		}
		
		$iconsms = "";
			if($iconsmalls != ""){
		$iconsms = $iconsmalls;
		}
		$iconposition = "";
			if($iconpos != ""){
		$iconposition = $iconpos;
		}	
		if ( $css_animation != '' ) {
				wp_enqueue_script( 'waypoints' );
				$rmrm = ' wpb_animate_when_almost_visible wpb_' . $css_animation ;
			}
		 $output ='<div class="ic-inner ' . $iconsms .' '.$iconposition. ' '.$rmrm.'">';
		if($singleicon_link != "" ){$output .='<a href="'.$singleicon_link.'" target="'.$singleicon_target.'">';}
		$output .= '<div class="circle-text ' . $border_texts . '" ';
					if($iconcolors != "" ){$output .= " style='";if($iconcolors != "" ){$output .="color:".$iconcolors.";".$ic_bg_b."";}$output.="'";}$output .= '>';						
		$output .= '<i class="fa ' . $icon_texts . ' '.$iconanims.'"></i>';	
		$output .='</div>';
		if($singleicon_link != "" ){$output .='</a>';}		
		$output .='</div>';	   
        return $output;
    }

}

//AC Buttton
class WPBakeryShortCode_horseclub_action_button extends WPBakeryShortCode {
     function content($atts, $content = null) {
        extract(shortcode_atts(array(
            
            'el_position' => '',
			'firstline' => '',
            'ac_link' => '',
			'ac_target' => '',
			'ac_bt' => ''
           			
        ), $atts));
			        
        $output ='<div class="ab-wrap">';
		 $output .='<div class="ab-inner">';
	        $output .= '<div class=ab_title><h1>' . $firstline . '</h1></div>';
	        $output .= wpb_js_remove_wpautop($content, true);
	     $output .='<a class="up-button" href="'.$ac_link.'" target="'.$ac_target.'">';
		  $output .= '<span class="text-bt">'.$ac_bt.'</span>';
		  $output .= '</a>';
       $output .='</div>';
	   $output .= '</div>';
        
        return $output;
    }
}


// END AC Button


//Heading text

class WPBakeryShortCode_horseclub_heading_button extends WPBakeryShortCode {
     function content($atts, $content = null) {
        extract(shortcode_atts(array(
            'color' => '',
			'border' => '',
			'align' => '',
            'el_position' => '',
            'heading' => '',
			'style' => '',
			'size' => '',   
			'css_animation' => ''
			
        ), $atts));
		$bord  = $mrmr =  '';
		
		if($color != ""){
			$color = 'color:'.$color.';';
		}
		if($size != ""){
			$size = 'font-size:'.$size.'px; line-height:'.$size.'px;';
		}
		
			if($align != ""){
			$align = 'style="text-align:'.$align.'"';
		}
		
		if($border != ""){
			$border = 'border-bottom:'.$border.'; ';
		}
       if($border != ""){
			$bord = 'border';
		}
			$style = 'style="'.$color.$border.$size.';"';
				if ( $css_animation != '' ) {
				wp_enqueue_script( 'waypoints' );
				$mrmr = ' wpb_animate_when_almost_visible wpb_' . $css_animation ;
			}
		
		$output = '<div class="'.$mrmr.'">';
        $output .='<div class="row-fluid">';
		
		 $output .='<div class="ab-inner head" '.$align.'>';
	        $output .= '<div class="head_title '.$bord.'"><h1 '.$style.'>' . $heading . '</h1></div>';
	     	       
       $output .='</div>';
	   $output .= '</div>';
	   $output .= '</div>';
       
        return $output;
    }
}

//Portfolio Grid
class WPBakeryShortCode_horseclub_grid_portofoliio extends WPBakeryShortCode {
   function content($atts, $content = null) {
 extract(shortcode_atts(array(
            'el_position' => '',
            'porcol' => '',
			'nospace' => '',
			'perpage' => '',
			'port_category' => '',
			'filter' => '',
			'show_more_grid' => '',
			'gridporhover' => '',
			'filter_posit' => '',
			'gridporlayout' => false,
			'ppta' => '',
			'gpbtn'=> '',
			'pgall'=> 'ALL',
			'pgsm'=>'SHOW MORE'
			
        ), $atts));	
		 global $wp_query;
$sghover = $pptalg = '';
$sghover = "";
$fpos = '';
	if($gridporhover != ""){
$sghover = $gridporhover;
		}
	if($filter_posit != ""){
$fpos = $filter_posit;
		}	
	if($ppta != ""){
$pptalg = 'center';
		}	
if ( get_query_var('paged') ) {
 $paged = get_query_var('paged');
 } elseif ( get_query_var('page') ) {
 $paged = get_query_var('page');
 } else {
 $paged = 1;
 }
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'portfolio',
    'orderby' => 'post_date',
	'portfolio-type'=>$port_category,
    'posts_per_page' => $perpage,
    'paged' => $paged
);
	if($port_category = ""){
$port_category = '';
		}		
global $wp_query;		

$taxonomy = 'portfolio-type';
$terms = get_terms($taxonomy);
$space = "";
	if($nospace != ""){
$space = $nospace;
		}	
$output = '';
$output .= '<div class="container_r">';
if ($filter == "yes") {
$output .= '<div class="filter_wrap '.$fpos.'">';
 $output .= '<ul id="up_filters" class="clearfix '.$space.'">';
  $output .= '<li><span class="filter active" data-filter="all">'.$pgall.'</span></li>';
  $count = count($terms); $i=0;
	if ($count > 0) {   
    foreach ($terms as $term) {
        $i++;
    	$output .='<li><span class="filter" data-filter="' . $term->term_id . '">' . $term->name . '</span></li>';
  } }  
$output .= '</ul>';
$output .= '</div>';
}                  	            
  $output .='<div id="portfoliolist">';
 query_posts($args);
            if (have_posts()) : while (have_posts()) : the_post();	
 $terms = wp_get_post_terms(get_the_ID(), 'portfolio-type');
if ($porcol == '1') { $columnnum = 'onecolumn'; $imgwidth = 1150; $imgheight = 643; $sliderheight = 643;}
				   else if ($porcol == '2') {$columnnum = 'p2';
				   $imgwidth = 600; $imgheight = 600; $sliderheight = 600;}
				   else if ($porcol == '3'){ $columnnum = 'p3'; $imgwidth = 400; $imgheight = 400; $sliderheight = 400;} 
				   else if ($porcol == '4wide'){ $columnnum = 'p4w'; $imgwidth = 650; $imgheight = 650; $sliderheight = 650;}
					else if ($porcol == '5wide'){ $columnnum = 'p5w'; $imgwidth = 600; $imgheight = 600; $sliderheight = 600;}
					else if ($porcol == '3wide'){ $columnnum = 'p3w'; $imgwidth = 700; $imgheight = 700; $sliderheight = 700;} 							
				   else {$columnnum = 'p4'; $imgwidth = 400; $imgheight = 400; $sliderheight = 400;}   
				       
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );
$image = horseclub_resize( $img_url, $imgwidth, $imgheight, true ); 

  foreach ($terms as $term) {$k = 1;                                
            if (count($terms) != $k) {
                $output .= ' ';
                   }
             $k++; }
 $output .= "<div class='mix portfolio "  ;
                foreach ($terms as $term) {
                    $output .= "$term->term_id ";
                }
            ;
$output .= "$columnnum " ;
$output .= "$space" ;
                $output .="'> ";
				
$output .='<div class="portfolio-wrapper '.$sghover.'">';

if($image){
$output .= '<img width="'.$imgwidth.'" height="'.$imgheight.'" src="'.$image.'" alt="'.get_the_title().'" >';
}else{ $output .= '<img src="'.get_template_directory_uri().'/assets/img/no-thumbs.png" alt="No Image">' ;}

if ( $gridporlayout == true ){
	
$output .='<div class="label-pp"><div class="label-text"><div class="mrko">';
if(empty($gpbtn)){
$output .=' <a class="image-popup-no-margins up-button  port_but"  href="'.$img_url.'"><span><i class="fa fa-expand"></i></span></a>';
$output .=' <a class="up-button  port_but"  href="'.get_permalink(get_the_ID()).'"><span><i class="fa fa-link"></i></span></a>';
}
$output .='</div>';
$output .='</div>';
$output .='</div>';
$output .='</div>';
$output .='<div class="bottom-pp '.$pptalg.'">';
$output .= '<a href="'.get_permalink(get_the_ID()).'">';
$output .='<div class="text-title">'.get_the_title().'</div>';
$output .='</a>';
  $output .= '<span class="text-category">';
                    $k = 1;
                    foreach ($terms as $term) {
                        $output .= "$term->name";
                        if (count($terms) != $k) {
                            $output .= ', ';
                        }
                        $k++;
                    }
                    $output .= '</span>';
$output .='</div>';										
$output .='</div>';	
}
else{
$output .='<div class="label-pp"><div class="label-text"><div class="mrko"><div class="mrko_iner">';
$output .= '<a href="'.get_permalink(get_the_ID()).'">';
$output .='<div class="text-title">'.get_the_title().'</div>';
$output .='</a>';
  $output .= '<span class="text-category">';
                    $k = 1;
                    foreach ($terms as $term) {
                        $output .= "$term->name";
                        if (count($terms) != $k) {
                            $output .= ', ';
                        }
                        $k++;
                    }
                    $output .= '</span>';
//$output .='<div class="line"></div>';
if(empty($gpbtn)){
$output .=' <a class="image-popup-no-margins up-button  port_but"  href="'.$img_url.'"><span><i class="fa fa-expand"></i></span></a>';
$output .=' <a class="up-button  port_but"  href="'.get_permalink(get_the_ID()).'"><span><i class="fa fa-link"></i></span></a>';
}
$output .='</div>';
$output .='</div>';
$output .='</div>';
$output .='</div>';

$output .='</div>';

$output .='</div>';
}
 endwhile;      
            else:
                ?>
                <p><?php esc_html__('Sorry, no posts matched your criteria.', 'horseclub'); ?></p>
            <?php
            endif;

$output .='</div>';
$output .='</div>';

if ($show_more_grid == "yes") {					         
                  if (get_next_posts_link()) {         
                $output .= '<div class="grid_port_paging"><span rel="' . $wp_query->max_num_pages . '" class="loading_more">' . get_next_posts_link($pgsm) . '</span></div>';           
 } }      
	wp_reset_query();
	return $output;   		
    }
}

//Portfolio Metro
class WPBakeryShortCode_horseclub_metro_portofoliio extends WPBakeryShortCode {
   function content($atts, $content = null) {
 extract(shortcode_atts(array(
            'el_position' => '',
            
			'perpage' => '',
			'port_category' => '',
			'filter' => '',
			'show_more_grid' => '',
			'gridporhover' => '',
			'filter_posit' => '',
			'mbtn' => ''
			
			
			
        ), $atts));			
		wp_enqueue_script('horseclub_masonry_script');
		 global $wp_query;
$sghover = '';
$sghover = "";
$fpos = '';
	if($gridporhover != ""){
$sghover = $gridporhover;
		}
	if($filter_posit != ""){
$fpos = $filter_posit;
		}	
	
if ( get_query_var('paged') ) {
 $paged = get_query_var('paged');
 } elseif ( get_query_var('page') ) {
 $paged = get_query_var('page');
 } else {
 $paged = 1;
 }
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'portfolio',
    'orderby' => 'post_date',
	'portfolio-type'=>$port_category,
    'posts_per_page' => $perpage,
    'paged' => $paged
);
	if($port_category = ""){
$port_category = '';
		}		
global $wp_query;		
$wp_query = new WP_Query($args);
$taxonomy = 'portfolio-type';
$terms = get_terms($taxonomy);
	
$output = '';


if ($filter == "yes") {
$output .= '<div class="filter_wrap '.$fpos.'">';
 $output .= '<ul id="up_filters" class="clearfix">';
  $output .= '<li><span class="filter active" data-filter="all">All</span></li>';
  $count = count($terms); $i=0;
	if ($count > 0) {   
    foreach ($terms as $term) {
        $i++;
    	$output .='<li><span class="filter" data-filter="' . $term->name . '">' . $term->name . '</span></li>';
  } }  
$output .= '</ul>';
$output .= '</div>';
}                              
  $output .='<div id="portfoliolist_metro">';
 //$output .='<div class="grid-sizer"></div>';
  while ( $wp_query->have_posts() ) {
	$wp_query->the_post();	
 $terms = wp_get_post_terms(get_the_ID(), 'portfolio-type');


global $post;
 $metro_p = "default";
                $metro_p = get_post_meta( $post->ID, '_horseclub_portpost_metro', true );
                $image_size="";
                if($metro_p == "large_width"){
                    $imgwidth = 1000; $imgheight = 500;
                }elseif($metro_p == "large_height"){
                    $imgwidth = 500; $imgheight = 1000;
                }elseif($metro_p == "large_width_height"){
                    $imgwidth = 1000; $imgheight = 1000;
                } else{
                    $imgwidth = 500; $imgheight = 500;
                }
           
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );
$image_m = horseclub_resize( $img_url, $imgwidth, $imgheight, true ); 


  foreach ($terms as $term) {$k = 1;                                
            if (count($terms) != $k) {
                $output .= ' ';
                   }
             $k++; }

    $output .= "<div class='metro mix portfolio ";
                foreach ($terms as $term) {
                    $output .= "$term->name ";
                }
                $output .=" " . $metro_p;
                $output .="'>";
			
$output .='<div class="portfolio-wrapper '.$sghover.'">';
$output .= '<div class="image_metro">';
               if($image_m){
$output .= '<img width="'.$imgwidth.'" height="'.$imgheight.'" src="'.$image_m.'" alt="'.get_the_title().'" >';
}else{ $output .= '<img src="'.get_template_directory_uri().'/assets/img/no-thumbs.png" alt="No Image">' ;}

 $output .= '</div>';				

$output .='<div class="label-pp"><div class="label-text"><div class="mrko">';
$output .= '<a href="'.get_permalink(get_the_ID()).'">';
$output .='<div class="text-title">'.get_the_title().'</div>';
$output .='</a>';
  $output .= '<span class="text-category">';
                    $k = 1;
                    foreach ($terms as $term) {
                        $output .= "$term->name";
                        if (count($terms) != $k) {
                            $output .= ', ';
                        }
                        $k++;
                    }
                    $output .= '</span>';
//$output .='<div class="line"></div>';
if(empty($mbtn)){
$output .=' <a class="image-popup-no-margins up-button  port_but"  href="'.$img_url.'"><span><i class="fa fa-expand"></i></span></a>';
$output .=' <a class="up-button  port_but"  href="'.get_permalink(get_the_ID()).'"><span><i class="fa fa-link"></i></span></a>';
}
$output .='</div>';
$output .='</div>';
$output .='</div>';

$output .='</div>';
$output .='</div>';

								}
$output .='</div>';
if ($show_more_grid == "yes") {					         
                  if (get_next_posts_link()) {         
                $output .= '<div class="grid_port_paging"><span rel="' . $wp_query->max_num_pages . '" class="loading_more">' . get_next_posts_link(esc_html__('SHOW MORE', 'horseclub')) . '</span></div>';           
 } }      
	wp_reset_postdata();
	return $output;   		
    }
}

//Portfolio slider
class WPBakeryShortCode_horseclub_slider_portofoliio extends WPBakeryShortCode {
   function content($atts, $content = null) {

 extract(shortcode_atts(array(
            'el_position' => '',
			'sliderportocat' => '',
			'sliderporhover' => '',
			'psbtn' => ''
        ), $atts));
$shover = '';
$shover = "";
	if($sliderporhover != ""){
$shover = $sliderporhover;
		}
			
$loop = new WP_Query(array('post_type' => 'portfolio','portfolio-type'=>$sliderportocat , 'posts_per_page' => -1));
if($sliderportcat = ""){
$slider_porto_cat = '';		}
$taxonomy = 'portfolio-type';
$terms = get_terms($taxonomy); 
$output = '';
$output .= '<div class="flexslider carousel">';                  	            
$output .='<ul class="slides">';
while ( $loop->have_posts() ) {
	$loop->the_post();	
$terms = wp_get_post_terms(get_the_ID(), 'portfolio-type');
$output .='<li>'   ;                
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' ); 
$images = horseclub_resize( $img_url, 600, 600, true ); 
  foreach ($terms as $term) {$k = 1;                               
                                if (count($terms) != $k) {
                                    $output .= ' ';}
                                $k++;                    }
$output .='<div class="mix portfolio '.$term->name.'" data-cat="'.$term->name.'">';
$output .='<div class="portfolio-wrapper '.$shover.'">';


if($images){
$output .= '<img src="'.$images.'" alt="'.get_the_title().'" >';
}else{ $output .= '<img src="'.get_template_directory_uri().'/assets/img/no-thumbs.png" alt="No Image">' ;}

$output .='<div class="label-pp"><div class="label-text"><div class="mrko">';
$output .= '<a href="'.get_permalink(get_the_ID()).'">';
$output .='<h5 class="text-title">'.get_the_title().'</h5>';
$output .='</a>';
$output .=' <span class="text-category">'.$term->name.'</span>';
//$output .='<div class="line"></div>';
if(empty($psbtn)){
$output .=' <a class="image-popup-no-margins up-button  port_but"  href="'.$img_url.'"><span><i class="fa fa-expand"></i></span></a>';
$output .=' <a class="up-button  port_but"  href="'.get_permalink(get_the_ID()).'"><span><i class="fa fa-link"></i></span></a>';
}
$output .='</div>';
$output .='</div>';
$output .='</div>';
$output .='</div>';
$output .='</div>';
$output .='</li>';
	
}
wp_reset_postdata();
$output .='</ul>';
$output .='</div>';	
	return $output;
			
    }
}
//Testimonials slider
class WPBakeryShortCode_horseclub_slider_testimonial extends WPBakeryShortCode {
   function content($atts, $content = null) {

 extract(shortcode_atts(array(
            'el_position' => '',
			'testimonialimg' =>'',
			'testimonialcenter' =>''
        ), $atts));
$tlayout = $noimg = "";
	if($testimonialcenter != ""){
$tlayout = $testimonialcenter;
		}
$loop = new WP_Query(array('post_type' => 'testimonials', 'posts_per_page' => -1));
if ($testimonialimg == "") {
$noimg = 'no-img';
	}
$output = '';
$output .= '<div class="flexslider testimonial '.$tlayout.' '.$noimg.'">';                  	            
$output .='<ul class="slides">';
  while ( $loop->have_posts() ) {
	$loop->the_post();
global $post;	
$testspan = get_post_meta( $post->ID, '_horseclub_testimonials_span', true );
$output .='<li>'   ;                
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' ); 
$images = horseclub_resize( $img_url, 130, 130, true ); 


if($testimonialimg != "" ){
$output .='<div class="testimonials-carousel-thumbnail">';
if($images){
$output .= '<img src="'.$images.'" alt="'.get_the_title().'" >';
}else{ $output .= '<img src="'.get_template_directory_uri().'/assets/img/no-thumbs_testimonial.png" alt="No Image">' ;}
$output .='</div>';}
$output .='<div class="testimonials-carousel-context">';
$output .='<div class="testimonials-carousel-content">'.get_the_content().'</div>';
$output .='<div class="testimonials-name">'.get_the_title().'<span>'.$testspan.'</span></div>';
$output .='</div>';
$output .='</li>';	
  }
wp_reset_postdata();	 
$output .='</ul>';
$output .='</div>';	
	return $output;			
    }
}
//Team box
class WPBakeryShortCode_horseclub_team_box extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(
           
            'el_position' => '',
			 'teamname' => '',
			'image' => '',
            'teamjob' => ''
        ), $atts));
         $image = wp_get_attachment_url($image);       
		$output  = '<section class="team">';
		 $output .='<div class="teamlink">';
		$output  .= '<div class="tmcontent">';
		$output  .= '<h2>' . $teamname . '</h2>';
		$output  .= '<h3>' . $teamjob . '</h3>';
		$output .= wpb_js_remove_wpautop($content, true);
		$output  .= '</div>';
		$output  .= '</div>';
		$output .='<img src="' . $image. '" alt="Team" />';
		$output  .= '	</section>';
				
        return $output;
    }
}
class WPBakeryShortCode_horseclub_pricing_table extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(          
            'el_position' => '',
            'pricing_title' => '',
			'pricing_link' => '',
			'pricing_per' => '',
			'pricing_bt' => '',
			'pricing_val' => '',
			'price_target' => '',
			'table_color' => '',
			'table_font' => '',
			'pricing_symbol' => '',
			'table_color_price' => '',
			'bt_color_price' => '',
        ), $atts));
                   
		$output  = '<div class="up_pricing">';
		$output .= '<div class="up_pricing_inner">';
		$output .= '<ul';
		if($table_color != "" ){$output .= " style='";if($table_color != ""){$output .="background-color:".$table_color.";color:".$table_font.";";}$output.="'";}$output .= '>';
		$output .= '<li class="pricng_title">';
		$output .= '<h3 ';
				if($table_font != "" ){$output .= " style='";if($table_font != ""){$output .="color:".$table_font.";";}$output.="'";}$output .= '>';

		$output .= $pricing_title;
		$output .= '</h3>';
		$output .= '</li>';
		$output .= '<li class="pricng_data" ';
		if($table_color_price != "" ){$output .= " style='";if($table_color_price != ""){$output .="background-color:".$table_color_price.";";}$output.="'";}$output .= '>';
		$output  .= '<div class="pricng_data_inner">';
		$output  .=	'<span class="pricng_value">'.$pricing_symbol.'</span>';
		$output  .=	'<span class="pricng_price">';
		$output  .= $pricing_val;
		$output  .='</span>';
		$output  .=	'<span class="pricng_per">'.$pricing_per.'</span>';
		 $output .= '</div>';
		$output .= '</li>';			     
	    $output .= wpb_js_remove_wpautop($content, true);		
	$output .='<li class="price_button" ';
	if($bt_color_price != "" ){$output .= " style='";if($bt_color_price != ""){$output .="background-color:".$bt_color_price.";";}$output.="'";}$output .= '>';
		$output .='<a class="price_button_big" href="'.$pricing_link.'" target="'.$price_target.'">';
		  $output .= $pricing_bt;
		  $output .= '</a></li>';
		 $output .= '</ul>';		 
        $output .= '</div>';
		$output .= '</div>';
	     
        return $output;
    }
}
//Latest Post
class WPBakeryShortCode_horseclub_latest_post extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(        
            'el_position' => '',
            'postperpage' => '',
			'lplayout' => '',
			'category' => ''
			
        ), $atts));
	
$lplayoutt = '';
			if($lplayout != ''){
		$lplayoutt = $lplayout;
		}		   
	$loop = new WP_Query(
   array( 'orderby' => 'date', 'posts_per_page' => $postperpage, 'category_name' => $category )
  
 );
$output  = '<div class="up_latest_post '.$lplayoutt.'">';
$output .= '<ul>';
$output .= '<li>';
 while($loop->have_posts()) : $loop->the_post();
if(empty($lplayoutt)){
 $output .= '<div class="up_lp">';
 }
else  {
$output .= '<div class="up_lpt">';
}
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' ); 
$images = horseclub_resize( $img_url, 600, 300, true ); 
  global $post; $postcontent = get_post_meta( $post->ID, '_horseclub_post_type', true );
 if(empty($lplayoutt)){
 $videow = 266;
 }
 else {
 $videow = 362;
 }
 if ($postcontent == 'video') {
 
 $output .= ' <div class="videofit" style="max-width:'.$videow.'px;">';
 
  global $post; $video = get_post_meta( $post->ID, '_horseclub_post_video', true ); 
 $output .= $video; 
 
 $output .= '</div>';
 
 }
 else{
 
 if(!empty($images)) {
$output .= '<div class="latest_post_img">';
$output .='<div class="mas_data">
			   <div class="mas_data_inner">
			   <span class="mas_month">'.get_the_date('M').'</span>
			   <span class="mas_date">'.get_the_date('j').'</span>
			   <span class="mas_year">'.get_the_date('Y').'</span>
			   </div>			   
			 </div>';
$output .= '<a href="'.get_permalink().'"> ';
$output .= '<img src="'.$images.'" alt="'.get_the_title().'" >';

$output .= '</a>';
$output .= '</div>';}

}

$output .= '<div class="up_latest_post_inner">';
$output .= '<div class="up_latest_post_title">';
$output .= '<a href="'.get_permalink().'"> ';
$output .= '<h5 class="posttitle">' . get_the_title() . '</h5>';
$output .= '</a>';
$output .= '<div class="up_latest_post_date"><i class="fa fa-folder-open-o"></i>&nbsp;';
$categories = get_the_category();
$separator = '  ';
if($categories){
	foreach($categories as $category) {
		$output .= '<a href="'.get_category_link( $category->term_id ).'" >'.$category->cat_name.'</a>'.$separator;
	}
}
$comments_count = get_comments_number();
                switch ($comments_count) {
                    case 0:
                        $comments_count_text = esc_html__('No comment', 'horseclub');
                        break;
                    case 1:
                        $comments_count_text = $comments_count . ' ' . esc_html__('Comment', 'horseclub');
                        break;
                    default:
                        $comments_count_text = $comments_count . ' ' . esc_html__('Comments', 'horseclub');
                        break;
                }
                $output .= '<a class="latest_post_comments" href="' . get_comments_link() . '">' . $comments_count_text . '</a>';
				$output .= '</div>';
$output .= '</div>';
$output .= '<div class="up_latest_post_ex">'.get_excerpt_up(95).'</div>';
$output .= '</div>';
$output .= '</div>';

endwhile;
$output .= '</li>';
$output .= '</ul>';
$output .= '</div>';
wp_reset_postdata();

return $output;

    }
}
//Counter
class WPBakeryShortCode_horseclub_counter extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(          
            'el_position' => '',
            'numbercounter' => '',
			'count_size' => '',
            'counter_border' => '',
			'counter_color' => '',
			'count_unit' => '',
	        ), $atts));

       $cn_n =  '';
			if($numbercounter != ''){
		$cn_n = $numbercounter;
		}
       $cn_b = '';
			if($counter_border != ''){
		$cn_b = $counter_border;
		}
	if($count_size != ""){
			$count_size = 'font-size:'.$count_size.'px;';
		}
        wp_enqueue_script( 'waypoints' );
		$output  = '<div class="up_counter">';
		$output .= '<div class="up_counter_iner '.$cn_b.'"';
		if($counter_color != "" || $count_size != ""  ){$output .= " style='";if($counter_color != "" ){$output .="color:".$counter_color.";border-color:".$counter_color.";";}if($count_size != "" ){$output .= $count_size ;}$output.="'";}$output .= '>';		
		$output .= '<p><b class="timer" data-to="'.$cn_n.'" data-speed="7000"></b>'.$count_unit.'</p>';
		$output .= '</div>';
		$output .= '</div>';   
        
		return $output;
    }
}
//Map
class WPBakeryShortCode_horseclub_map extends WPBakeryShortCode {
    protected function content($atts, $content = null) {	
  extract(shortcode_atts(array(
		'g_lat' 			=> '',
		'g_lon'			=> '',
		'country' 	=> '',
		'place' 		=> '',
		'street' 		=> '',
		'g_zoom' 			=> '',
		'g_mark'		=> '',
		'gm_url' => '',
		'g_style'		=> '',
		's_style'		=> '',
		'l_style'		=> '',
		'ga_style'		=> '',
		'g_hight'		=> '',	
		'g_key'		=> '',
    ), $atts));
	
	 $map_h = '';
			if($g_hight != ''){
		$map_h = "height: ".$g_hight."px;";
		}
if($g_key != ''){wp_register_script('sensor', 'https://maps.google.com/maps/api/js?key='.$g_key.'', array('jquery'), '1.0', true);}	
else {wp_register_script('sensor', 'https://maps.google.com/maps/api/js?=false', array('jquery'), '1.0', true);}	
wp_register_script('map', get_template_directory_uri() . '/assets/js/upmap.js');
wp_enqueue_script( 'sensor' );
wp_enqueue_script( 'map' );		
	if ( $country && $place ) 
		$address = $country.', '.$place.', '.$street; 
	else 
		$address = '';
	wp_localize_script('map','up_map_var', array($address, $g_lat, $g_lon, $g_zoom, $g_mark, $gm_url, $g_style, $s_style, $l_style, $ga_style));
	$output ='<div class="g_map_ca" style="'.$map_h.'">';	
	$output .='<div id="up_map_canvas"></div>';	
	$output .= '</div>';
		return $output;
}}

//Featured Work
class WPBakeryShortCode_horseclub_featured_portofoliio extends WPBakeryShortCode {
   function content($atts, $content = null) {
 extract(shortcode_atts(array(
            'fw_1' => '',
			'fwbg_1' => '',
			'fw_2' => '',
			'fwbg_2' => '',
			'fw_3' => '',
			'fwbg_3' => '',
			'fw_4' => '',
			'fwbg_4' => '',
			'fwcbg_1' => '',
			'fwcbg_2' => '',
			'fwcbg_3' => '',
			'fwcbg_4' => ''
									
        ), $atts));
	
$fwid_1 =  $fwid_2 = $fwid_3 = $fwid_4 ='';
			if($fw_1 != ''){$fwid_1 = $fw_1;}
			if($fw_2 != ''){$fwid_2 = $fw_2;}
			if($fw_3 != ''){$fwid_3 = $fw_3;}
			if($fw_4 != ''){$fwid_4 = $fw_4;}
	
$fwbgurl_1 = wp_get_attachment_url( $fwbg_1, 'large' );
$fwbgurl_2 = wp_get_attachment_url( $fwbg_2, 'large' );
$fwbgurl_3 = wp_get_attachment_url( $fwbg_3, 'large' );
$fwbgurl_4 = wp_get_attachment_url( $fwbg_4, 'large' );
		
$post_1 = get_post($fwid_1); 
$title_1 = $post_1->post_title;
$link_1 = get_permalink( $fwid_1 );
$thumb_1 = get_post_thumbnail_id($fwid_1);
$img_url_1 = wp_get_attachment_url( $thumb_1,'full' ); 
$image_1 = horseclub_resize( $img_url_1, 650, 650, true );

$post_2 = get_post($fwid_2); 
$title_2 = $post_2->post_title;
$link_2 = get_permalink( $fwid_2 );
$thumb_2 = get_post_thumbnail_id($fwid_2);
$img_url_2 = wp_get_attachment_url( $thumb_2,'full' ); 
$image_2 = horseclub_resize( $img_url_2, 650, 650, true );

$post_3 = get_post($fwid_3); 
$title_3 = $post_3->post_title;
$link_3 = get_permalink( $fwid_3 );
$thumb_3 = get_post_thumbnail_id($fwid_3);
$img_url_3 = wp_get_attachment_url( $thumb_3,'full' ); 
$image_3 = horseclub_resize( $img_url_3, 650, 650, true );

$post_4 = get_post($fwid_4); 
$title_4 = $post_4->post_title;
$link_4 = get_permalink( $fwid_4 );
$thumb_4 = get_post_thumbnail_id($fwid_4);
$img_url_4 = wp_get_attachment_url( $thumb_4,'full' ); 
$image_4 = horseclub_resize( $img_url_4, 650, 650, true );

$bg_1 = "background: ".$fwcbg_1.";";
$bg_2 = "background: ".$fwcbg_2.";";
$bg_3 = "background: ".$fwcbg_3.";";
$bg_4 = "background: ".$fwcbg_4.";";

wp_register_script('featured_work', get_template_directory_uri() . '/assets/js/up_work.js');
wp_enqueue_script( 'featured_work' ); 
$output ='<div id="featured_work">';
$output .='<div class="flexslider work">';
$output .='<ul class="slides work">';

	$output .='<li>';	
		$output .= '<div>';
		$output .= '<img class="featured-bg" src="'.$image_1.'" alt="'.$title_1.'" >';
		$output .='<a href="'.$link_1.'">';
		$output .='<span class="project-logo"><img src="'.$fwbgurl_1.'" alt="logo 1"></span>';
		$output .='</a>';	
		$output .='<div class="flex-caption" style="'.$bg_1.'">';	
		$output .='<h3>'.$title_1.'</h3>';
		$output .= '</div>';
		$output .= '</div>';
	$output .='</li>';
	
	$output .='<li>';
	$output .= '<div>';	
		$output .='<a href="'.$link_2.'">';
		$output .= '<img class="featured-bg" src="'.$image_2.'" alt="'.$title_2.'" >';
		$output .='<span class="project-logo"><img src="'.$fwbgurl_2.'" alt="logo 2"></span>';
		$output .='</a>';
		$output .='<div class="flex-caption" style="'.$bg_2.'">';
		$output .='<h3>'.$title_2.'</h3>';
		$output .='</div>';
		$output .= '</div>';
	$output .='</li>';
	
    $output .='<li>';
		$output .= '<div>';
		$output .='<a href="'.$link_3.'">';
		$output .= '<img class="featured-bg" src="'.$image_3.'" alt="'.$title_3.'" >';
		$output .='<span class="project-logo"><img src="'.$fwbgurl_3.'" alt="logo 3"></span>';
		$output .='</a>';
		$output .='<div class="flex-caption" style="'.$bg_3.'">';
		$output .='<h3>'.$title_3.'</h3>';
		$output .='</div>';
		$output .= '</div>';
	$output .='</li>';
	
	$output .='<li>';	
		$output .= '<div>';
		$output .='<a href="'.$link_4.'">';
		$output .= '<img class="featured-bg" src="'.$image_4.'" alt="'.$title_4.'" >';
		$output .='<span class="project-logo"><img src="'.$fwbgurl_4.'" alt="logo 4"></span>';
		$output .='</a>';
		$output .='<div class="flex-caption" style="'.$bg_4.'">';
		$output .='<h3>'.$title_4.'</h3>';
		$output .='</div>';
		$output .= '</div>';
	$output .='</li>';

$output .='</ul>';
$output .='</div>';
$output .='</div>';
$output .='<span id="responsiveFlag"></span>';
	return $output;			
    }
}

class WPBakeryShortCode_horseclub_special_button extends WPBakeryShortCode {
     function content($atts, $content = null) {
        extract(shortcode_atts(array(          
			'sbtext' => '',
            'sbfont' => '',
			'sbcolorbg' => '',
			'sb_link' => '',
			'sb_target' => '',
			'sbpos' => '',
			'css_animation' => '',
			'sbwidth' => '',
			'sbheight' => ''			         			
        ), $atts));
			     $sba = $sbpo = '';
				 	if($sbpos != ""){
		$sbpo = $sbpos;
		}	
				 if ( $css_animation != '' ) {
				wp_enqueue_script( 'waypoints' );
				$sba = ' wpb_animate_when_almost_visible wpb_' . $css_animation ;
			}
				 $output ='<div class="specila_button '.$sba.' '.$sbpo.'">';
        $output .='<div class="sb-wraper animatedsb ui-animate-reveal-frombottom">';
		 
	        $output .= '<div class="sb_btn_bg ui-animate-300-cubic ui-animate-3d-left " ';
			if ($sbcolorbg != "" ){$output .= " style='";if($sbcolorbg != ""){$output .="background-color:".$sbcolorbg.";width:".$sbwidth."px;height:".$sbheight."px;";}$output.="'";}$output .= '>';
			
			$output .='</div>';
			
	       
	     $output .='<a class="sb_btn action" href="'.$sb_link.'" target="'.$sb_target.'" ';
		 if ($sbfont != "" ){$output .= " style='";if($sbfont != ""){$output .="font-size:".$sbfont."px;";}$output.="'";}$output .= '>';
		 $output .= $sbtext;
		 $output .='</a>';				     
	   $output .= '</div>';       
        $output .= '</div>';
        return $output;
    }
}

//Service box
class WPBakeryShortCode_horseclub_service_box extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(          
            'el_position' => '',
			 'sertitle' => '',
			'serdes' => '',
            'servimg' => '',
			'servlink' => '',
			'servialt' =>'Service'
        ), $atts));
         $servimg = wp_get_attachment_url($servimg);       
		$output  = '<div class="ih-item square effect4"><a href="' . $servlink. '">';
		 $output .='<div class="img"><img src="' . $servimg. '" alt="' . $servialt. '" /></div>';
		$output  .= '<div class="mask1"></div>';
		$output  .= ' <div class="mask2"></div>';
		$output  .= '<div class="info">';
		$output  .= '<h3>' . $sertitle. '</h3>';
		$output  .= '<p>' . $serdes. '</p>';
		$output .='</div></a></div>';						
        return $output;
    }
}

//Service box 2
class WPBakeryShortCode_horseclub_service_box_two extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(          
            'el_position' => '',
			 'sertitlex' => '',
			'serdesx' => '',
            'servimgx' => '',
			'servlinkx' => '',
			'titlebg' => '',
			'decbg' => '',
			'titlefs' => '',
			'servimgalt' =>'Service'
        ), $atts));
		
				$sc_t_f = "";
			if($titlefs != ""){
		$sc_t_f = "font-size: ".$titlefs."px;";

		}
         $servimgx = wp_get_attachment_url($servimgx); 

		 $output  = '<div class="hcservice">';
		$output  .= '<figure class="hcservicehover" ';
		if($decbg != "" ){$output .= " style='";if($decbg != "" ){$output .="background:".$decbg.";";}$output.="'";}					
					$output .= '>';


	
					
		$output .='<img src="' . $servimgx. '" alt="' . $servimgalt. '" />';
						$output .='<figcaption>';

							$output .= '<h3 ';
					if($titlebg != "" ){$output .= " style='";if($titlebg != "" ){$output .="background:".$titlebg.";".$sc_t_f."";}$output.="'";}					
					$output .= '>';	
							$output .= $sertitlex;
							$output .= '</h3>';							
							$output .='<div><p>' .$serdesx. '</p></div>';						
							$output .='<a href="' . $servlinkx. '">View more</a>';
						$output .='</figcaption>';			
					$output .='</figure>';
					$output .='</div>';
						
        return $output;
    }
}



//Video PopUp

class WPBakeryShortCode_horseclub_videopop extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(          
            'el_position' => '',
			 'up_video_url' => ''			
        ), $atts));       
		$output  = '<div class="up_video_wrap"><a class="up_video" title="Video" href="' . $up_video_url. '">';
		$output .='<i class="fa fa-play"></i>';			
		$output .='</a></div>';						
        return $output;
    }
}

//end VC
}


