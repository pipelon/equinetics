<?php
$output = $css_animation = $shapecolb = $sepopt = $sepshape = $shapecol = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'top' => '',
    'bottom' => '',	
	'bordersep' => '',
	'borderwidth' => '',	
	'bordercolor' => '',
	'bordertick' => '',
	'borderpos' => '',
	'sepopt' => '',
	'sepshape' => '',
	'shapecol' => '',
	'shapecolb' => '',
	
	'css_animation' => '',
   ), $atts));

   $bordersepator = "";
			if($bordersep != ""){
		$bordersepator = $bordersep;
		}
		
   $bpos = "";
			if($borderpos != ""){
		$bpos = $borderpos;
		}
   
   $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'up_separator', $this->settings['base']);
$css_class .= $this->getCSSAnimation($css_animation);
 if ( $sepopt == 'simple' ){
   $output .= '<div class="sep_iner"><div class="'.$css_class.' '.$bordersep.' '.$bpos.' "';
$output .=  ' style="';
		if($top != ""){
		$output .= "margin-top:". $top ."px;";
		}
		if($bottom != ""){
		$output .= "margin-bottom:". $bottom ."px;"; 
		}
		if($borderwidth != ""){
		$output .= "width:". $borderwidth ."%;"; 
		}
		if($bordercolor != ""){
		$output .= "border-color:". $bordercolor .";"; 
		}
		if($bordertick != ""){
		$output .= "border-width:". $bordertick ."px;"; 
		}
$output .= '">';
$output .= '</div></div>'.$this->endBlockComment('separator')."\n";
}
 else if ( $sepopt == 'shape' ){
 $output .= '<div class="sep_shape" style="background:'.$shapecolb.'">';
  if ( $sepshape == 'triangle' ){
  
  $output .='<svg class="up-svg-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="'.$shapecol.'" width="100%" height="30" viewBox="0 0 0.156661 0.1"><polygon points="0.156661,3.93701e-006 0.156661,0.000429134 0.117665,0.05 0.0783307,0.0999961 0.0389961,0.05 -0,0.000429134 -0,3.93701e-006 0.0783307,3.93701e-006 "></polygon></svg>';
 
 }
 
   else if ( $sepshape == 'tiltl' ){
   $output .='<svg class="up-tilt-left-seperator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="'.$shapecol.'" width="100%" height="90" viewBox="0 0 4 0.266661" preserveAspectRatio="none"><polygon class="fil0" points="4,0 4,0.266661 -0,0.266661 "></polygon></svg>';
   }
   
   
    else if ( $sepshape == 'tiltr' ){
  $output .='<svg class="up-tilt-right-seperator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="'.$shapecol.'" width="100%" height="90" viewBox="0 0 4 0.266661" preserveAspectRatio="none"><polygon class="fil0" points="4,0 4,0.266661 -0,0.266661 "></polygon></svg>';
 }
 
   else if ( $sepshape == 'trianglex' ){
  $output .='<svg class="up-large-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="'.$shapecol.'" width="100%" height="90" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none"><path class="fil0" d="M-0 0.333331l4.66666 0 0 -3.93701e-006 -2.33333 0 -2.33333 0 0 3.93701e-006zm0 -0.333331l4.66666 0 0 0.166661 -4.66666 0 0 -0.166661zm4.66666 0.332618l0 -0.165953 -4.66666 0 0 0.165953 1.16162 -0.0826181 1.17171 -0.0833228 1.17171 0.0833228 1.16162 0.0826181z"></path></svg>';
 
 }
 $output .='</div>';
 
 
 }
		echo $output;
;