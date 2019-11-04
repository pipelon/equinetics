<?php
$add_css_animation = array(
	'type' => 'dropdown',
	'heading' => esc_html__( 'CSS Animation', 'horseclub' ),
	'param_name' => 'css_animation',
	'admin_label' => true,
	'value' => array(
		esc_html__( 'No', 'horseclub' ) => '',
		esc_html__( 'Top to bottom', 'horseclub' ) => 'top-to-bottom',
		esc_html__( 'Bottom to top', 'horseclub' ) => 'bottom-to-top',
		esc_html__( 'Left to right', 'horseclub' ) => 'left-to-right',
		esc_html__( 'Right to left', 'horseclub' ) => 'right-to-left',
		esc_html__( 'Appear from center', 'horseclub' ) => "appear"
	),
	'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'horseclub' )
);
	
	// Removing shortcodes

vc_remove_param("vc_row", "full_width");
vc_remove_param("vc_row", "full_height");
vc_remove_param("vc_row", "parallax");
vc_remove_param("vc_row", "parallax_image");
vc_remove_param("vc_row", "el_id");
vc_remove_param("vc_row", "video_bg");
vc_remove_param("vc_row", "video_bg_url");
vc_remove_param("vc_row", "video_bg_parallax");
vc_remove_param("vc_row", "content_placement");
vc_remove_param("vc_row", "gap");
vc_remove_param("vc_row", "columns_placement");
vc_remove_param("vc_row", "parallax_speed_video");
vc_remove_param("vc_row", "parallax_speed_bg");
vc_remove_param("vc_row", "disable_element");

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => esc_html__("Row Type", "horseclub"),
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Parallax" => "parallax",
		"Full width" => "full",
		
	)
	
));

	vc_add_param("vc_row", array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Enable Full Width for Parallax ', 'horseclub' ),
			'param_name' => 'parallax_full',			
			'value' => array( esc_html__( 'Yes, please', 'horseclub' ) => 'yes' ),
			"dependency" => Array('element' => "row_type", 'value' => "parallax")	
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Parallax height", "horseclub"),
	"param_name" => "koko",
	"description" => esc_html__("Section height.", "horseclub"),
	"dependency" => Array('element' => "row_type", 'value' => "parallax")
	
));

 vc_add_param("vc_row", array(
      "type" => "attach_image",
      "heading" => esc_html__('Parallax Background Image', 'horseclub'),
      "param_name" => "p_bg_image",
      "description" => esc_html__("Select background image for parallax section", "horseclub"),
	  "dependency" => Array('element' => "row_type", 'value' => "parallax")

    ));
	
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Anchor target", "horseclub"),
	"param_name" => "anchor_row",
	"description" => esc_html__("Example: about", "horseclub")
	
));	
	


/* Separator (Divider)
---------------------------------------------------------- */
vc_map( array(
  "name"		=> esc_html__("Separator", "horseclub"),
  "base"		=> "vc_separator",

  "icon"      => "icon-wpb-up separator",
  "show_settings_on_create" => true,
  "category"  => esc_html__('Content', 'horseclub'),
  "description" => esc_html__('Horizontal separator line', 'horseclub'),
     "params" => array(
	 
	 array(
				"type" => "dropdown",				
				"class" => "",
				"heading" => esc_html__("Please choose separator style", "horseclub"),
				"param_name" => "sepopt",
				"value" => array(
					"" => "",
					"Shape Separator" => "shape",
					"Simple Separator" => "simple"	
				),				
			),
			
		 array(
				"type" => "dropdown",				
				"class" => "",
				"heading" => esc_html__("Please choose separator shape", "horseclub"),
				"param_name" => "sepshape",
				"value" => array(
					"" => "",
					"Triangle" => "triangle",
					"Tilt Left" => "tiltl",	
					"Tilt Right" => "tiltr",
					"Large Triangle" => "trianglex",	
				),
				"dependency" => Array('element' => "sepopt", 'value' => "shape")				
			),	
		
  	   array(
       "type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__("Custom Shape color ", "horseclub"),
	"param_name" => "shapecol",	
	"dependency" => Array('element' => "sepopt", 'value' => "shape")	
	      
      ),
   array(
       "type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__("Custom Shape background color ", "horseclub"),
	"param_name" => "shapecolb",	
	"dependency" => Array('element' => "sepopt", 'value' => "shape")	
	      
      ),	  
	 
	 
         array(
       "type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Top Margin", "horseclub"),
	"param_name" => "top",
	
	"description" => "",
	"dependency" => Array('element' => "sepopt", 'value' => "simple")
         
      ),
	  
	  
	  array(
        	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Bottom Margin", "horseclub"),
	"param_name" => "bottom",
	
	"description" => "",
	"dependency" => Array('element' => "sepopt", 'value' => "simple")
         
      ),
	  
	  	array(
      "type" => "dropdown",
      "heading" => esc_html__("Separator border", "horseclub"),
      "param_name" => "bordersep",
      
	  "value" => array(
		"No" => "",
		"Yes" => "sep_border",
		
		),
		"dependency" => Array('element' => "sepopt", 'value' => "simple")
		),
		
		   array(
       "type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Border width", "horseclub"),
	"param_name" => "borderwidth",
	
	"description" => "Set border width in percentage (100 - full width)",
	"dependency" => Array('element' => "bordersep", 'not_empty' => true)
         
      ),
	  	   array(
       "type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__("Custom border color ", "horseclub"),
	"param_name" => "bordercolor",	
	"dependency" => Array('element' => "bordersep", 'not_empty' => true)
	      
      ),
	  
	  	   array(
       "type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Custom thick border", "horseclub"),
	"param_name" => "bordertick",
	"description" => "Specifies the width of the element's four border",
	"dependency" => Array('element' => "bordersep", 'not_empty' => true)	
	
         
      ),
	  $add_css_animation,
	  	array(
      "type" => "dropdown",
      "heading" => esc_html__("Border position", "horseclub"),
      "param_name" => "borderpos",
      "dependency" => Array('element' => "bordersep", 'not_empty' => true),
	  "value" => array(
		"Left" => "",
		"Right" => "bpr",
		"Center" => "bpc",
		)),
			

  
   )
) );

/* Button 
---------------------------------------------------------- */

$colors_arr = array(
"" => "",
esc_html__("Default", "horseclub") => "up_btn-d",
esc_html__("White", "horseclub") => "",
esc_html__("Solid", "horseclub") => "up_btn-s",  
esc_html__("Transparent", "horseclub") => "up_btn-t");


// Used in "Button" and "Call to Action" blocks
$size_arr = array(
esc_html__("Regular size", "horseclub") => "",
esc_html__("Small", "horseclub") => "btn-sm",
esc_html__("Large", "horseclub") => "btn-big"

);

$target_arr = array(esc_html__("Same window", "horseclub") => "_self", esc_html__("New window", "horseclub") => "_blank");

vc_map( array(
  "name" => esc_html__("Button", "horseclub"),
  "base" => "vc_button",

  "icon"      => "icon-wpb-up but",
  "category" => esc_html__('Content', 'horseclub'),
  "description" => esc_html__('Eye catching button', 'horseclub'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Text on the button", "horseclub"),
      "holder" => "button",
      "class" => "wpb_button",
      "param_name" => "title",
      
      "description" => esc_html__("Text on the button.", "horseclub")
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("URL (Link)", "horseclub"),
      "param_name" => "href",
      "description" => esc_html__("Button link.", "horseclub")
    ),
    array(
      "type" => "dropdown",
      "heading" => esc_html__("Target", "horseclub"),
      "param_name" => "target",
      "value" => $target_arr,
      "dependency" => Array('element' => "href", 'not_empty' => true)
    ),
    array(
      "type" => "dropdown",
      "heading" => esc_html__("Color", "horseclub"),
      "param_name" => "color",
      "value" => $colors_arr,
      "description" => esc_html__("Button color.", "horseclub")
    ),
	  array(
         "type" => "colorpicker",        
         "heading" => esc_html__("Custom Font Color ", "horseclub"),
         "param_name" => "bt_customcolor",
         "value" => '',
         "description" => "",
		 "dependency" => Array('element' => "color", 'value' => "up_btn-s")
      ),
	    array(
         "type" => "colorpicker",        
         "heading" => esc_html__("Custom BG Color ", "horseclub"),
         "param_name" => "bg_customcolor",
         "value" => '',
         "description" => "",
		 "dependency" => Array('element' => "color", 'value' => "up_btn-s")
      ),
	      array(
      "type" => "textfield",
      "heading" => esc_html__("Custom Font size", "horseclub"),
      "param_name" => "bt_size",
	   "dependency" => Array('element' => "color", 'value' => "up_btn-s")
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Icon", "horseclub"),
      "param_name" => "icon",
      
      "description" => esc_html__("Button icon.", "horseclub")
    ),
	
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Button align", "horseclub"),
      "param_name" => "align",
      
	  "value" => array(
		"Left" => "",
		"Center" => "center",
		"Right" => "right",
		)),
    array(
      "type" => "dropdown",
      "heading" => esc_html__("Size", "horseclub"),
      "param_name" => "size",
      "value" => $size_arr,
      "description" => esc_html__("Button size.", "horseclub")
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Extra class name", "horseclub"),
      "param_name" => "el_class",
      "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "horseclub")
    ),
	
	 $add_css_animation,
	
  ),
  "js_view" => 'VcButtonView'
) );

vc_map( array(
	"base"=> "horseclub_progress_bar",
   "name" => esc_html__("Vertical Progress Bar", "horseclub"),

    "icon"      => "icon-wpb-up vp",
   "is_container" => true,
   "class" => "",  
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Percent", "horseclub"),
         "param_name" => "percentage",
         
         
      ),
	     array(
         "type" => "textfield",
          "class" => "",
         "heading" => esc_html__("Digit", "horseclub"),
         "param_name" => "digit",
         "value" => "",
         
      ),
	    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", "horseclub"),
         "param_name" => "progress_bar_text",
         
         
      ),
	  
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Progress background color", "horseclub"),
         "param_name" => "progresscolor",
         
         "description" => ""
      )
	  
  
   )
) );

vc_map( array(
    "base"		=> "horseclub_action_button",
    "name"		=> esc_html__("Call to Action Button", "horseclub"),

    "class"		=> "",
    "icon"      => "icon-wpb-up ca",
    "params"	=> array(
        array(
            "type" => "textfield",
            "holder" => "h3",
            "class" => "",
            "heading" => esc_html__("First line text", "horseclub"),
            "param_name" => "firstline",
            
            "description" => esc_html__("Enter first line text.", "horseclub")
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", "horseclub"),
            "param_name" => "content",
            
            "description" => esc_html__("Enter your bottom content.", "horseclub")
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", "horseclub"),
            "param_name" => "ac_link",
			
            
            
        ),
		
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Link Target", "horseclub"),
      "param_name" => "ac_target",
      "value" => $target_arr,
          ),
	 array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Button Text", "horseclub"),
            "param_name" => "ac_bt",
           
            
        )
       		
	
	)	    
) );

vc_map( array(
    "base"		=> "horseclub_grid_portofoliio",
    "name"		=> esc_html__("Grid Portofolio", "horseclub"),
    "class"		=> "",
    "icon"      => "icon-wpb-up gp",	
    "params"	=> array(   
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Portofolio Columns", "horseclub"),
            "param_name" => "porcol",
            "value" => array(2, 3, 4 , '3wide',  '4wide', '5wide'),
            "description" => esc_html__("Two, three , fore or 'four wide(set row to full width)'", "horseclub")
        ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Filter", "horseclub"),
				"param_name" => "filter",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),				
			),
			array(
				"type" => "dropdown",				
				"class" => "",
				"heading" => esc_html__("Enable Show More Button", "horseclub"),
				"param_name" => "show_more_grid",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),				
			),
				 array(
            "type" => "textfield",
              "class" => "",
            "heading" => esc_html__("Portfolio Category Slug (leave empty for all)", "horseclub"),
			"param_name" => "port_category",
			"description" => "",
				
        ),
		array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Filter position", "horseclub"),
				"param_name" => "filter_posit",
				"value" => array(
					"Center" => "",
					"Left" => "flter_left",
						
				),
				
			),
			
			  	array(
      "type" => "dropdown",
      "heading" => esc_html__("Portfolio layout", "horseclub"),
      "param_name" => "nospace",
      "value" => array(
		"With Space" => "",
		"No Space" => "nospace"
		)),		
			  	array(
      "type" => "textfield",
      "heading" => esc_html__("Number of portolios on page ", "horseclub"),
      "param_name" => "perpage",
	  
		"description" => esc_html__("-1 for all portolios on page ", "horseclub")
		),
		
	
			  	array(
      "type" => "dropdown",
      "heading" => esc_html__("Image hover", "horseclub"),
      "param_name" => "gridporhover",	  
	  "value" => array(
		"Normal" => "nh",
		"Black and White" => "grayscale_hover",
		"Circle" => "circle_hover",
		)),
					  	array(
      "type" => "checkbox",
      "heading" => esc_html__("Text bellow Item layout", "horseclub"),
      "param_name" => "gridporlayout",   
	'value' => array( esc_html__( 'Yes, please', 'horseclub' ) => 'yes' )		  

	  ),
	  
	  	  	array(
      "type" => "dropdown",
      "heading" => esc_html__("Text align ", "horseclub"),
      "param_name" => "ppta",	
	  "dependency" => Array('element' => "gridporlayout", 'not_empty' => true),	  
	  "value" => array(
	  "Left" => "",
	  "Center" => "pp_bl",
		)),
		
				array(
      "type" => "dropdown",
      "heading" => esc_html__("Show Buttons", "horseclub"),
      "param_name" => "gpbtn",
      "value" => array(
			"Yes" => "",
			"No" => "gfno",						
		),
    ),
	
	array(
      "type" => "textfield",
      "heading" => esc_html__("Custom text For ALL portolios ", "horseclub"),
      "param_name" => "pgall",
	  "value" => "",		
		),
					  	array(
      "type" => "textfield",
      "heading" => esc_html__("Custom text For SHOW MORE button ", "horseclub"),
      "param_name" => "pgsm",
	  "value" => "",
		),
		
    )
) );

vc_map( array(
    "base"		=> "horseclub_slider_portofoliio",
    "name"		=> esc_html__("Slider Portofolio", "horseclub"),   
    "class"		=> "",
    "icon"      => "icon-wpb-up sp",
    "params"	=> array(
   
     		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Portfolio Category Slug (leave empty for all)", "horseclub"),
			"param_name" => "sliderportocat",
			"description" => ""	,			
        ),
	  	array(
      "type" => "dropdown",
      "heading" => esc_html__("Image hover", "horseclub"),
      "param_name" => "sliderporhover",     
	  "value" => array(
		"Normal" => "",
		"Black and White" => "grayscale_hover",
		"Circle" => "circle_hover",
		)),
			  			array(
      "type" => "dropdown",
      "heading" => esc_html__("Show Buttons", "horseclub"),
      "param_name" => "psbtn",
      "value" => array(
			"Yes" => "",
			"No" => "sno",						
		),
    ),
    )
) );

vc_map( array(
    "base"		=> "horseclub_icon_text",
    "name"		=> esc_html__("Icon with text", "horseclub"),
	
    "class"		=> "",
    "icon"      => "icon-wpb-up it",
    "params"	=> array(
        array(
            "type" => "textfield",
            "holder" => "h6",
            "class" => "",
            "heading" => esc_html__("First line text", "horseclub"),
            "param_name" => "firstline",
            
            "description" => esc_html__("Enter first line text.", "horseclub")
        ),
		 array(
            "type" => "textfield",
              "class" => "",
            "heading" => esc_html__("Add Icon", "horseclub"),
            "param_name" => "icon_text",
            "description" => esc_html__("Enter icon code ex. fa-bolt", "horseclub")
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", "horseclub"),
            "param_name" => "content",
           
            "description" => esc_html__("Enter your bottom content.", "horseclub")
        ),
       		
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon animation", "horseclub"),
      "param_name" => "iconanimated",
      "value" => array(
		"No Animation" => "",
		"Wrench" => 	"faa-wrench animated-hover",
		"Ring" => 		"faa-ring animated-hover",
		"Horizontal" => "faa-horizontal animated-hover",
		"Vertical" => 	"faa-vertical animated-hover",
		"Flash" => 		"faa-flash animated",
		"Bounce" => 	"faa-bounce animated-hover",
		"Spin" =>		"faa-spin animated-hover",
		"Float" => 		"faa-float animated-hover",
		"Pulse" => 		"faa-pulse animated-hover",
		"Shake" => 		"faa-shake animated-hover"
			
		),
    ),
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon border", "horseclub"),
      "param_name" => "textnoborder",
      "value" => array(
	 
		"Round Border" => "",
		"No border" => "noborder",
		"Square border" => "sqborder",	
		),
    ),
	 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Icon Background", "horseclub"),
				"param_name" => "iconcolors_bg_c",
							
			),
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon size", "horseclub"),
      "param_name" => "iconsmall",
      "value" => array(
			"Normal" => "",
			"Small" => "small",						
		),
    ),		
	   array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Icon Color", "horseclub"),
				"param_name" => "iconcolor",
				"description" => ""
			),
 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Title Color", "horseclub"),
				"param_name" => "iconcolortitle",
				"description" => ""
			),				
   array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", "horseclub"),
            "param_name" => "topicon_link"			                   
        ),		
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Link Target", "horseclub"),
      "param_name" => "topicon_target",
      "value" => $target_arr,
          ),			
	),
		    
) );

vc_map( array(
    "base"		=> "horseclub_icon_text_left",
    "name"		=> esc_html__("Icon left with text", "horseclub"),
	 "class"		=> "u",
     "icon"      => "icon-wpb-up-itl",
    "params"	=> array(
        array(
            "type" => "textfield",
            "holder" => "h6",
            "class" => "",
            "heading" => esc_html__("First line text", "horseclub"),
            "param_name" => "firstline_left",
            
            "description" => esc_html__("Enter first line text.", "horseclub")
        ),
		 array(
            "type" => "textfield",
              "class" => "",
            "heading" => esc_html__("Add Icon", "horseclub"),
            "param_name" => "icon_text_left",
            "description" => esc_html__("Enter icon code ex. fa-bolt", "horseclub")
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", "horseclub"),
            "param_name" => "content",
            
            "description" => esc_html__("Enter your bottom content.", "horseclub")
        ),
       		
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon animation", "horseclub"),
      "param_name" => "iconanimated_left",
      "value" => array(
		"No Animation" => "",
		"Wrench" => 	"faa-wrench animated-hover",
		"Ring" => 		"faa-ring animated-hover",
		"Horizontal" => "faa-horizontal animated-hover",
		"Vertical" => 	"faa-vertical animated-hover",
		"Flash" => 		"faa-flash animated",
		"Bounce" => 	"faa-bounce animated-hover",
		"Spin" =>		"faa-spin animated-hover",
		"Float" => 		"faa-float animated-hover",
		"Pulse" => 		"faa-pulse animated-hover",
		"Shake" => 		"faa-shake animated-hover"
			
		),
    ),
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon border", "horseclub"),
      "param_name" => "textnoborder_left",
      "value" => array(
	 
		"Round Border" => "",
		"No border" => "noborder",
		"Square border" => "sqborder",		
		),
    ),
		 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Icon Background", "horseclub"),
				"param_name" => "iconcolors_bg_l",
							
			),
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon size", "horseclub"),
      "param_name" => "iconsmall_left",
      "value" => array(
			"Normal" => "",
			"Small" => "small",						
		),
    ),		
	   array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Icon Color", "horseclub"),
				"param_name" => "iconcolor_left",
				"description" => ""
			),	
 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Title Color", "horseclub"),
				"param_name" => "icontitle_left",
				"description" => ""
			),	
$add_css_animation,				
	),
		    
) );

vc_map( array(
    "base"		=> "horseclub_icon_single",
    "name"		=> esc_html__("Single Icon", "horseclub"),	
    "class"		=> "",
    "icon"      => "icon-wpb-up is",
    "params"	=> array(
    
		 array(
            "type" => "textfield",
              "class" => "",
            "heading" => esc_html__("Add Icon", "horseclub"),
            "param_name" => "icon_texts",
            "description" => esc_html__("Enter icon code ex.  fa-bolt", "horseclub")
        ),
   array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", "horseclub"),
            "param_name" => "singleicon_link"
			                   
        ),
		
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Link Target", "horseclub"),
      "param_name" => "singleicon_target",
      "value" => $target_arr,
          ),
       		
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon animation", "horseclub"),
      "param_name" => "iconanimateds",
      "value" => array(
		"No Animation" => "",
		"Wrench" => 	"faa-wrench animated-hover",
		"Ring" => 		"faa-ring animated-hover",
		"Horizontal" => "faa-horizontal animated-hover",
		"Vertical" => 	"faa-vertical animated-hover",
		"Flash" => 		"faa-flash animated",
		"Bounce" => 	"faa-bounce animated-hover",
		"Spin" =>		"faa-spin animated-hover",
		"Float" => 		"faa-float animated-hover",
		"Pulse" => 		"faa-pulse animated-hover",
		"Shake" => 		"faa-shake animated-hover"
			
		),
    ),
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon border", "horseclub"),
      "param_name" => "textnoborders",
      "value" => array(
	  "" => "",
		"Round Border" => "",
		"No border" => "noborder",	
		"Square border" => "sqborder",		
		),
    ),
	
	 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Icon Background", "horseclub"),
				"param_name" => "iconcolors_bg",
							
			),
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon size", "horseclub"),
      "param_name" => "iconsmalls",
      "value" => array(
	  "" => "",
			"Big" => "",
			"Medium" => "small",
			"Small" => "exsmall",	
		),
    ),		
	   array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Icon Color", "horseclub"),
				"param_name" => "iconcolors",
				"description" => ""
			),	
	array(
      "type" => "dropdown",
      "heading" => esc_html__("Icon position", "horseclub"),
      "param_name" => "iconpos",
      "value" => array(
			"Center" => "",
			"Left" => "ic_left",
			"Right" => "ic_right",	
		),
    ),
$add_css_animation,	
	),
		    
) );

vc_map( array(
    "base"		=> "horseclub_heading_button",
    "name"		=> esc_html__("Heading title", "horseclub"),
    "class"		=> "",
    "icon"      => "icon-wpb-ht",
    "params"	=> array(
        array(
            "type" => "textfield",
            "holder" => "h3",
            "class" => "",
            "heading" => esc_html__("Heading line text", "horseclub"),
            "param_name" => "heading",
            
            "description" => esc_html__("Enter heading line text.", "horseclub")
        ),
		 array(
            "type" => "textfield",
            
            "class" => "",
            "heading" => esc_html__("Heading line text size", "horseclub"),
            "param_name" => "size",
           
            "description" => esc_html__("Enter heading size.", "horseclub")
        ),
     
       		
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Heading border", "horseclub"),
      "param_name" => "border",
      "description" => esc_html__("choose wide or normal layout", "horseclub"),
	  "value" => array(
	  "" => "",
		"Yes" => "1px solid",
		"No" => "0",
		)),
		$add_css_animation,
			array(
      "type" => "dropdown",
      "heading" => esc_html__("Heading align", "horseclub"),
      "param_name" => "align",
      
	  "value" => array(
		"Left" => "",
		"Center" => "center",
		"Right" => "right",
		)),
		array(
         "type" => "colorpicker",
        
         "class" => "",
         "heading" => esc_html__("Text color", "horseclub"),
         "param_name" => "color",
         "description" => esc_html__("Choose text color", "horseclub")
      ),
	  
    ),
		    
) );

vc_map( array(
    "base"		=> "horseclub_team_box",
    "name"		=> esc_html__("Team Box", "horseclub"),   
    "class"		=> "",
    "icon"      => "icon-wpb-up-tim",
    "params"	=> array(
        array(
            "type" => "textfield",
            "holder" => "h3",
            "class" => "",
            "heading" => esc_html__("Person Name", "horseclub"),
            "param_name" => "teamname",
           
            
        ),

		   array(
            "type" => "textfield",
            "holder" => "h3",
            "class" => "",
            "heading" => esc_html__("Person Job", "horseclub"),
            "param_name" => "teamjob",
            
            
        ),
		array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Image", "horseclub"),
				"param_name" => "image"
			),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", "horseclub"),
            "param_name" => "content",
            
            "description" => esc_html__("Enter your content.", "horseclub")
        ),
     
    )
) );

vc_map( array(
    "base"		=> "horseclub_pricing_table",
    "name"		=> esc_html__("Pricing tables", "horseclub"),   
    "class"		=> "",
    "icon"      => "icon-wpb-up-tab",
    "params"	=> array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title", "horseclub"),
            "param_name" => "pricing_title",
            
            
        ),
		   array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Price", "horseclub"),
            "param_name" => "pricing_val",
            
            
        ),
		
		   array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Currency", "horseclub"),
            "param_name" => "pricing_symbol",
            
            
        ),
			 
		   array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Price Period", "horseclub"),
            "param_name" => "pricing_per",
            
            
        ),
			   array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Link", "horseclub"),
            "param_name" => "pricing_link",
			
            
            
        ),
		
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Link Target", "horseclub"),
      "param_name" => "price_target",
      "value" => $target_arr,
          ),
	 array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Button Text", "horseclub"),
            "param_name" => "pricing_bt",
            
            
        ),
		   array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Main Color", "horseclub"),
				"param_name" => "table_color",
				"description" => ""
			),
			 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Main Font Color", "horseclub"),
				"param_name" => "table_font",
				"description" => ""
			),
			
			 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Price Main Color", "horseclub"),
				"param_name" => "table_color_price",
				"description" => ""
			),
			 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Button Main Color", "horseclub"),
				"param_name" => "bt_color_price",
				"description" => ""
			),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text", "horseclub"),
            "param_name" => "content",
            "value" => "<ul><li>24/7 Tech Support</li><li>100GB Storage</li><li>1GB Bandwidth</li><li>Free Upgrades</li><li>Unlimited Users</li></ul>",
            
        ),
     
    )
) );

vc_map( array(
   "name" => esc_html__("Slider Testimonial", "horseclub"),
   "base" => "horseclub_slider_testimonial",
   "class" => "",
   "icon"  => "icon-wpb-up-test",
   "params" => array(
array(
      "type" => "dropdown",
      "heading" => esc_html__("Enable Image", "horseclub"),
      "param_name" => "testimonialimg",
      "description" => esc_html__("choose wide or normal layout", "horseclub"),
	  "value" => array(
		"No" => "",
		"Yes" => "yes",
		
		)),
array(
      "type" => "dropdown",
      "heading" => esc_html__("Testimonial layout", "horseclub"),
      "param_name" => "testimonialcenter",
      "description" => esc_html__("choose left or center layout", "horseclub"),
	  "value" => array(
		"Left layout" => "",
		"Center layout" => "tcenter",
		)),		
   )
   ) );
   vc_map( array(
   "name" => esc_html__("Latest post", "horseclub"),
   "base" => "horseclub_latest_post",
   "class" => "",
   "icon"  => "icon-wpb-up-post",
   "params" => array(
			  	array(
      "type" => "textfield",
      "heading" => esc_html__("Number latest post ", "horseclub"),
      "param_name" => "postperpage",
	  
		
		),
		array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Category Slug", "horseclub"),
				"param_name" => "category",
				"description" => esc_html__("Leave empty for all or use comma for list", "horseclub")
			),
			array(
      "type" => "dropdown",
      "heading" => esc_html__("Columns", "horseclub"),
      "param_name" => "lplayout",
      "value" => array(
			"4 Columns" => "",
			"3 Columns" => "lp_three",						
		),
    ),

		
   )
   ) );
   
     vc_map( array(
   "name" => esc_html__("Counter", "horseclub"),
   "base" => "horseclub_counter",
   "class" => "",
   "icon"  => "icon-wpb-up-counter",
   "params" => array(
			  	array(
      "type" => "textfield",
      "heading" => esc_html__("Number", "horseclub"),
      "param_name" => "numbercounter",
	  
				),
		array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Font size", "horseclub"),
				"param_name" => "count_size",
				
				
			),
				array(
				"type" => "textfield",								
				"heading" => esc_html__("Units", "horseclub"),
				"param_name" => "count_unit",
				"value" => ""
				
			),
			array(
      "type" => "dropdown",
      "heading" => esc_html__("Border", "horseclub"),
      "param_name" => "counter_border",
      "value" => array(
			"No Border" => "",
			"Border" => "coun_bord",						
		),
    ),
	 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Custom Counter Color", "horseclub"),
				"param_name" => "counter_color",
				"description" => ""
			),

		
   )
   ) ); 
   
  //Google Maps
  	
    vc_map( array(
   "name" => esc_html__("Fancy Google Maps", "horseclub"),
   "base" => "horseclub_map",
   "class" => "",
   "icon"  => "icon-wpb-up-maps",
   "params" => array(
   
   		  	array(
      "type" => "textfield",
	  "holder" => "div",
      "heading" => esc_html__("Add Google API Key:", "horseclub"),
      "param_name" => "g_key",
	  "description" => "Make new API key <br> developers.google.com/maps/documentation/javascript/get-api-key",
	  
				),
			  	array(
      "type" => "textfield",
	  "holder" => "div",
      "heading" => esc_html__("Latitude:", "horseclub"),
      "param_name" => "g_lat",
	  
				),
		array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Longitude:", "horseclub"),
				"param_name" => "g_lon",
				"description" => "Use mygeoposition.com",
							
			),
			
				array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Zoom:", "horseclub"),
				"param_name" => "g_zoom",
						
			),
				array(
				"type" => "textfield",				
				"class" => "",
				"heading" => esc_html__("Marker:", "horseclub"),
				"param_name" => "g_mark",
				"description" => "only name of png image no .png",
							
			),
			array(
				"type" => "textfield",				
				"class" => "",
				"heading" => esc_html__("Marker DIR URL:", "horseclub"),
				"param_name" => "gm_url",
				
			),
				array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Map Height:", "horseclub"),
				"param_name" => "g_hight",
							
			),
			array(
      "type" => "colorpicker",
      "heading" => esc_html__("Hue Color", "horseclub"),
      "param_name" => "g_style",
	  "description" => "Use Google Styled Maps Wizard",
	"value" => ""
    ),
		array(
				"type" => "textfield",				
				"class" => "",
				"heading" => esc_html__("Saturation:", "horseclub"),
				"param_name" => "s_style",
				"description" => "between -100 and 100",
				"value" => ""				
			),
			array(
				"type" => "textfield",				
				"class" => "",
				"heading" => esc_html__("Lightness:", "horseclub"),
				"param_name" => "l_style",
				"description" => "between -100 and 100",
				"value" => ""				
			),
				array(
				"type" => "textfield",				
				"class" => "",
				"heading" => esc_html__("Gama:", "horseclub"),
				"param_name" => "ga_style",
				"description" => "between 9.9 and 0.01",
				"value" => ""				
			),
	

		
   )
   ) );   
   
   //Featured Work
   
   
        vc_map( array(
   "name" => esc_html__("Featured Work", "horseclub"),
   "base" => "horseclub_featured_portofoliio",
   "class" => "",
   "icon"  => "icon-wpb-up-fp",
   "params" => array(
		array(
      "type" => "textfield",
      "heading" => esc_html__("Portfolio Item ID", "horseclub"),
      "param_name" => "fw_1",  
					),
				array(
      "type" => "colorpicker",
      "heading" => esc_html__("Caption Beckground", "horseclub"),
      "param_name" => "fwcbg_1",	  
    ),			
		array(
	   "type" => "attach_image",
      "heading" => esc_html__('Logo Background Image', 'horseclub'),
      "param_name" => "fwbg_1",    				
					),
		//2
	array(
      "type" => "textfield",
      "heading" => esc_html__("Portfolio Item ID", "horseclub"),
      "param_name" => "fw_2",  
					),
					array(
      "type" => "colorpicker",
      "heading" => esc_html__("Caption Beckground", "horseclub"),
      "param_name" => "fwcbg_2",	  
    ),				
		array(
	   "type" => "attach_image",
      "heading" => esc_html__('Logo Background Image', 'horseclub'),
      "param_name" => "fwbg_2",    				
					),	

	//3		
	array(
      "type" => "textfield",
      "heading" => esc_html__("Portfolio Item ID", "horseclub"),
      "param_name" => "fw_3",  
					),
								array(
      "type" => "colorpicker",
      "heading" => esc_html__("Caption Beckground", "horseclub"),
      "param_name" => "fwcbg_3",	  
    ),	
		array(
	   "type" => "attach_image",
      "heading" => esc_html__('Logo Background Image', 'horseclub'),
      "param_name" => "fwbg_3",    				
					),	
	//4		
	array(
      "type" => "textfield",
      "heading" => esc_html__("Portfolio Item ID", "horseclub"),
      "param_name" => "fw_4",  
					),
					array(
      "type" => "colorpicker",
      "heading" => esc_html__("Caption Beckground", "horseclub"),
      "param_name" => "fwcbg_4",	  
    ),				
		array(
	   "type" => "attach_image",
      "heading" => esc_html__('Logo Background Image', 'horseclub'),
      "param_name" => "fwbg_4",
"description" => "Please read Documentation have to find Portfolio ID, for logo use png image 400x400",	  
					),	
			
   )
   ) ); 
   
 //Metro  
 vc_map( array(
    "base"		=> "horseclub_metro_portofoliio",
    "name"		=> esc_html__("Metro Portofolio", "horseclub"),
    "class"		=> "",
    "icon"      => "icon-wpb-up-me",	
    "params"	=> array(   
      
		
		
				 array(
            "type" => "textfield",
              "class" => "",
            "heading" => esc_html__("Portfolio Category Slug (leave empty for all)", "horseclub"),
			"param_name" => "port_category",
			"description" => "",
				
        ),
	
			
		
			  	array(
      "type" => "textfield",
      "heading" => esc_html__("Number of portolios on page ", "horseclub"),
      "param_name" => "perpage",
	  
		"description" => esc_html__("-1 for all portolios on page ", "horseclub")
		),
		
	
			  	array(
      "type" => "dropdown",
      "heading" => esc_html__("Image hover", "horseclub"),
      "param_name" => "gridporhover",	  
	  "value" => array(
		"Normal" => "nh",
		"Black and White" => "grayscale_hover",
		"Circle" => "circle_hover",
		)),
	
	  
	  			array(
      "type" => "dropdown",
      "heading" => esc_html__("Show Buttons", "horseclub"),
      "param_name" => "mbtn",
      "value" => array(
			"Yes" => "",
			"No" => "mno",						
		),
    ),
		
    )
) );  

vc_map( array(
    "base"		=> "horseclub_special_button",
    "name"		=> esc_html__("Special button", "horseclub"),
    
    "class"		=> "",
    "icon"      => "icon-wpb-up sb",
    "params"	=> array(
   
     		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Text for special button", "horseclub"),
			"param_name" => "sbtext",
			"description" => ""	,			
        ),
	 				array(
      "type" => "textfield",
      "heading" => esc_html__("Font Size ", "horseclub"),
      "param_name" => "sbfont",	  
    ),	
	
	 				array(
      "type" => "colorpicker",
      "heading" => esc_html__("BG Color", "horseclub"),
      "param_name" => "sbcolorbg",	  
    ),	
	
	  array(
      "type" => "textfield",
      "heading" => esc_html__("URL (Link)", "horseclub"),
      "param_name" => "sb_link",
      "description" => esc_html__("Button link.", "horseclub")
    ),
    array(
      "type" => "dropdown",
      "heading" => esc_html__("Target", "horseclub"),
      "param_name" => "sb_target",
      "value" => $target_arr,
      "dependency" => Array('element' => "sb_link", 'not_empty' => true)
    ),
		array(
      "type" => "dropdown",
      "heading" => esc_html__("Button position", "horseclub"),
      "param_name" => "sbpos",
      "value" => array(
			"Left" => "",
			"Center" => "cb_center",
			"Right" => "sb_right",	
		),
    ),
	
	 				array(
      "type" => "textfield",
      "heading" => esc_html__("Button Width ", "horseclub"),
      "param_name" => "sbwidth",	  
    ),
					array(
      "type" => "textfield",
      "heading" => esc_html__("Button Height ", "horseclub"),
      "param_name" => "sbheight",	  
    ),
	$add_css_animation,		
    )
) );
   
   vc_map( array(
    "base"		=> "horseclub_service_box",
    "name"		=> esc_html__("Service Box", "horseclub"),   
    "class"		=> "",
    "icon"      => "icon-wpb-up-ser",
    "params"	=> array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Service Name", "horseclub"),
            "param_name" => "sertitle",
 
        ),

		   array(
            "type" => "textfield",
                       "class" => "",
            "heading" => esc_html__("Service Description", "horseclub"),
            "param_name" => "serdes",
            
            
        ),
		array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Image", "horseclub"),
				"param_name" => "servimg"
			),
			
			     array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Service Link", "horseclub"),
            "param_name" => "servlink",
 
        ),
			     array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Custom Alt text for image", "horseclub"),
            "param_name" => "servialt",
 
        ),

      
    )
) );

   vc_map( array(
    "base"		=> "horseclub_service_box_two",
    "name"		=> esc_html__("Service Box Two", "horseclub"),   
    "class"		=> "",
    "icon"      => "icon-wpb-up-ser",
    "params"	=> array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Service Name", "horseclub"),
            "param_name" => "sertitlex",
 
        ),

		   array(
            "type" => "textfield",
                       "class" => "",
            "heading" => esc_html__("Service Description", "horseclub"),
            "param_name" => "serdesx",
            
            
        ),
		array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Image", "horseclub"),
				"param_name" => "servimgx"
			),
			
			     array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Service Link", "horseclub"),
            "param_name" => "servlinkx",
 
        ),
			     array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Custom Alt text for image", "horseclub"),
            "param_name" => "servimgalt",
 
        ),
		   array(
       "type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__("Custom Title Background ", "horseclub"),
	"param_name" => "titlebg",	
   
      ),
	  	     array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Custom Title Font Size", "horseclub"),
            "param_name" => "titlefs",
 
        ),
	  		   array(
       "type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__("Custom Description Background ", "horseclub"),
	"param_name" => "decbg",	
   
      ),

      
    )
) );

  vc_map( array(
    "base"		=> "horseclub_videopop",
    "name"		=> esc_html__("Video PopUp", "horseclub"),   
    "class"		=> "",
    "icon"      => "icon-wpb-up-vpu",
    "params"	=> array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Video url", "horseclub"),
            "param_name" => "up_video_url",
			"description" => esc_html__("Youtube or Vimeo Link.", "horseclub")
 
        ),


    )
) );
     

?>