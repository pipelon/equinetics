<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$output = $el_class = $bg_color =  $padding_bottom = $padding_top =$bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = $par_full = $pareh = '';
extract(shortcode_atts(array(
    'row_type' 		  => '',
	'el_class'        => '',
    'bg_color'        => '',
	'koko' 		      => '',
	'padding_bottom'  => '',
	'padding_top'     => '',
	'p_bg_image'      => '',	
    'bg_image'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
	'parallax_full' => false,
	'anchor_row'   => '',
    'css' => ''

		
), $atts));


$el_class = $full_height = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);



if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

	$after_output .= '<div class="vc_row-full-width"></div>';


if ( ! empty( $full_height ) ) {
	$css_classes[] = ' vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = ' vc_row-o-columns-' . $columns_placement;
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = ' vc_row-o-equal-height';
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$pareh = ' vc_row-o-equal-height vc_row-flex';
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = ' vc_row-flex';
}



$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$height = "";
if($koko != ""){
	$height = ' height:'.$koko.'px';
}
$anchor = "";
if($anchor_row != ""){
	$anchor = 'id="'.$anchor_row.'"';
}

$p_image_url = wp_get_attachment_url( $p_bg_image, 'large' );

if ( $parallax_full == true ) {$par_full = 'par_full';}


 if($row_type == "parallax"){
$output .= '<div '.$anchor.' class="par_moko">';}
 if($row_type == "parallax") {
	$output .= '<div class="parallax '.$pareh.'" data-velocity="-.5" style=" background-image: url('.$p_image_url.'); '.$height.';">';
} else {
	$output .= '<div '.$anchor.' '. implode( ' ', $wrapper_attributes ) . '>';

	}

 if($row_type == "parallax") {
	$output .= '<div class="vc_container '.$par_full.'">';
} 
else if($row_type == "full"){
	$output .= '<div class="full_width">';}
else  { 
	$output .= '<div class="vc_container">';
}
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>';
 if($row_type == "parallax"){
$output .= '</div>';}
$output .= '</div>'.$this->endBlockComment('row');

echo $output;
