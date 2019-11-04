<?php
$output = $color = $size = $icon = $target = $href = $el_class = $title = $position = '';
extract(shortcode_atts(array(
    'color' => '',
    'size' => '',
    'icon' => '',
    'target' => '_self',
    'href' => '',
    'el_class' => '',
    'title' => esc_html__('Text on the button', "horseclub"),
    'position' => '',
	  'align' => '',
	  'bt_size' => '',
    'bt_customcolor' => '',
	'bg_customcolor' => '',
	'css_animation' => ''
           			
), $atts));


	if($bt_size != ""){
			$bt_size = 'font-size:'.$bt_size.'px;';
		}

if($align != ""){
			$align = 'style="text-align:'.$align.'"';
		}

if ( $target == 'same' || $target == '_self' ) { $target = ''; }
$target = ( $target != '' ) ? ' target="'.$target.'"' : '';

$color = ( $color != '' ) ? ' '.$color : '';

$size = ( $size != ''  ) ? ' '.$size : '';


$icon = ( $icon != '' ) ? '<span class="icon_divider"></span> <i class="fa ' . $icon . '" style="padding-left: 14px;"></i>' : '';
$position = ( $position != '' ) ? ' '.$position.'-button-position' : '';
$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ''.$color.$size.$el_class.$position, $this->settings['base']);
$css_classs = $this->getCSSAnimation($css_animation);

  
    $output = '<div class="position '.$css_classs.'" '.$align.' >';
    $output .='<a class="up-button '.$css_class.'" title="'.$title.'" href="'.$href.'"'.$target.'';
	if($bt_customcolor != "" || $bt_size != ""  ){$output .= " style='";if($bt_customcolor != "" )
		{$output .="color:".$bt_customcolor.";background:".$bg_customcolor.";border-color:".$bt_customcolor.";";}if($bt_size != "" ){$output .= $bt_size ;}$output.="'";}$output .= '>';	
     $output .= '<span>'.$title.''.$icon.'</span>';
	$output .= '</a>';
    $output .='</div>';
	
	

			

echo $output . $this->endBlockComment('button') . "\n";