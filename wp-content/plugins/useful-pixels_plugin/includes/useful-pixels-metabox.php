<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category Horse Club theme
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */
add_filter( 'horseclub_cmb_meta_boxes', 'horseclub_metaboxes' );
add_filter( 'horseclub_cmb_render_imag_select_taxonomy', 'horseclub_render_imag_select_taxonomy', 10, 2 );
function horseclub_render_imag_select_taxonomy( $field, $meta ) {

    wp_dropdown_categories(array(
            'show_option_none' => esc_html__( "All", 'horseclub' ),
            'hierarchical' => 1,
            'taxonomy' => $field['taxonomy'],
            'orderby' => 'name', 
            'hide_empty' => 0, 
            'name' => $field['id'],
            'selected' => $meta  

        ));
    if ( !empty( $field['desc'] ) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';
}
add_filter( 'cmb_render_imag_select_category', 'horseclub_render_imag_select_category', 10, 2 );
function horseclub_render_imag_select_category( $field, $meta ) {

    wp_dropdown_categories(array(
            'show_option_none' => esc_html__( "All Blog Posts", 'horseclub' ),
            'hierarchical' => 1,
            'taxonomy' => 'category',
            'orderby' => 'name', 
            'hide_empty' => 0, 
            'name' => $field['id'],
            'selected' => $meta  

        ));
    if ( !empty( $field['desc'] ) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';

}
add_filter( 'horseclub_cmb_render_imag_select_sidebars', 'horseclub_render_imag_select_sidebars', 10, 2 );
function horseclub_render_imag_select_sidebars( $field, $meta ) {
	global $vir_sidebars;	
	
	 echo '<select name="', $field['id'], '" id="', $field['id'], '">';
  foreach ($vir_sidebars as $side) {
    echo '<option value="', $side['id'], '"', $meta == $side['id'] ? ' selected="selected"' : '', '>', $side['name'], '</option>';
  }
  echo '</select>';
	
    if ( !empty( $field['desc'] ) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';

}
function horseclub_metaboxes( array $meta_boxes ) {

	
	$prefix = '_horseclub_';
	
	$meta_boxes[] = array(
				'id'         => 'slider_metabox',
				'title'      => esc_html__( "Header Slider Revolution shortcode", 'horseclub' ),
				'pages'      => array( 'page' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true,
				'fields' => array(
					array(
						'name' => esc_html__( "Slider Alias", 'horseclub' ),
						'id'   => $prefix . 'revs',
						'type' => 'text_small',
					),
				)
			);
			$meta_boxes[] = array(
				'id'         => 'header_metabox',
				'title'      => esc_html__( "Header Style", 'horseclub' ),
				'pages'      => array( 'page' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true,
				'fields' => array(
					array(
				'name'    => esc_html__("Main color", 'horseclub' ),
				'desc'    => '',
				'id'      => $prefix . 'headcolor',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('Default', 'horseclub' ), 'value' => '', ),
					array( 'name' => esc_html__('Transparent', 'horseclub' ), 'value' => 'light', )
					
				),
			),
				)
			);
				$meta_boxes[] = array(
				'id'         => 'header_sticky_on',
				'title'      => esc_html__( "Enable or Disable Sticky Header", 'horseclub' ),
				'pages'      => array( 'page','post','portfolio' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true,
				'fields' => array(
					array(
				'name'    => esc_html__("On/Off", 'horseclub' ),
				'desc'    => '',
				'id'      => $prefix . 'head_s',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('On', 'horseclub' ), 'value' => 'enable_sticky', ),
					array( 'name' => esc_html__('Off', 'horseclub' ), 'value' => 'disable_sticky', )										
				),
			),
				)
			);
			
				$meta_boxes[] = array(
				'id'         => 'header_sticky_on_off',
				'title'      => esc_html__( "Dispaly only Sticky Header ", 'horseclub' ),
				'pages'      => array( 'page','post','portfolio' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true,
				'fields' => array(
					array(
				'name'    => esc_html__("On/Off", 'horseclub' ),
				'desc'    => '',
				'id'      => $prefix . 'head_s_on',
				'type'    => 'select',
				'options' => array(
				array( 'name' => esc_html__('Off', 'horseclub' ), 'value' => '', ),			
					array( 'name' => esc_html__('On', 'horseclub' ), 'value' => 'enable_sticky_on', )
												
				),
			),
				)
			);
			
			
					$meta_boxes[] = array(
				'id'         => 'nav_wide',
				'title'      => esc_html__( "Enable or Disable Wide Navigation", 'horseclub' ),
				'pages'      => array( 'page','portfolio' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true,
				'fields' => array(
					array(
				'name'    => esc_html__("On/Off", 'horseclub' ),
				'desc'    => '',
				'id'      => $prefix . 'nav_w',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('On', 'horseclub' ), 'value' => 'nav_wide', ),
					array( 'name' => esc_html__('Off', 'horseclub' ), 'value' => '', )										
				),
			),
				)
			);
					
			$meta_boxes[] = array(
				'id'         => 'testimonials_metabox',
				'title'      => esc_html__( "Web site or Company", 'horseclub' ),
				'pages'      => array( 'testimonials' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true,
				'fields' => array(
			array(
				'name' => esc_html__('Description', 'horseclub'),
				'desc' => esc_html__('ex. google.com', 'horseclub'),
				'id'   => $prefix . 'testimonials_span',
				'type' => 'text_medium',
			)
				)
			);

	$meta_boxes[] = array(
				'id'         => 'post_metabox',
				'title'      => esc_html__("Post Options", 'horseclub'),
				'pages'      => array( 'post',),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(
			 
			array(
                                'name'    => esc_html__("Post Content", 'horseclub' ),
                                
                                'id'      => $prefix . 'post_type',
                                'type'    => 'radio_inline',
                                'options' => array(
					array( 'name' => esc_html__("None", 'horseclub' ), 'value' => 'none', ),
					array( 'name' => esc_html__("Image Slider", 'horseclub' ), 'value' => 'flex', ),
					array( 'name' => esc_html__("Video", 'horseclub' ), 'value' => 'video', ),
					array( 'name' => esc_html__("Image", 'horseclub' ), 'value' => 'image', ),
				),
                        ),
						
					
		
		
			array(
				'name' => esc_html__('Display Sidebar?', 'horseclub'),
				'desc' => esc_html__('Choose if layout is fullwidth or sidebar', 'horseclub'),
				'id'   => $prefix . 'post_sidebar',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('Yes', 'horseclub'), 'value' => 'yes', ),
					array( 'name' => esc_html__('No', 'horseclub'), 'value' => 'no', ),
				),
			),
		
			
		
		
		),
	);
$meta_boxes[] = array(
				'id'         => 'post_video_metabox',
				'title'      => esc_html__('Post Video Box', 'horseclub'),
				'pages'      => array( 'post',), 
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(
			
					array(
						'name' => esc_html__('If Video Post', 'horseclub'),
						'desc' => esc_html__('Place Embed Code Here, works with youtube, vimeo...', 'horseclub'),
						'id'   => $prefix . 'post_video',
						'type' => 'textarea_code',
					),
				),
	);
$meta_boxes[] = array(
				'id'         => 'portfolio_post_metabox',
				'title'      => esc_html__('Portfolio Post Options', 'horseclub'),
				'pages'      => array( 'portfolio' ), 
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(
						
						array(
				'name'    => esc_html__('Enable Visual Composer for Custom layout', 'horseclub'),
				'desc' => esc_html__('If Enabled do not use option bellow, go to Visual Composer-->Role Manager-->Post types-->Custom and click on portfolio checkbox', 'horseclub'),
				'id'      => $prefix . 'portpost_vc',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('Off', 'horseclub'), 'value' => '', ),
					array( 'name' => esc_html__('On', 'horseclub'), 'value' => 'pvce', ),
					
					
				),
			),	

			array(
				'name'    => esc_html__('Enable Visual Composer Full Width', 'horseclub'),				
				'id'      => $prefix . 'portfullt_vfc',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('Off', 'horseclub'), 'value' => '', ),
					array( 'name' => esc_html__('On', 'horseclub'), 'value' => 'pvcef', ),
					
					
				),
			),		


			array(
				'name'    => esc_html__('Remove Default Title Bar', 'horseclub'),
				'desc' => esc_html__('Create your own title with Visual Composer', 'horseclub'),
				'id'      => $prefix . 'portpost_vct',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('Off', 'horseclub'), 'value' => '', ),
					array( 'name' => esc_html__('On', 'horseclub'), 'value' => 'pvcti', ),
					
					
				),
			),				
						
				array(
				'name'    => esc_html__('Project Options', 'horseclub'),
				'desc'    => '',
				'id'      => $prefix . 'portpost_type',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('Image', 'horseclub'), 'value' => 'image', ),
					array( 'name' => esc_html__('Image Slider', 'horseclub'), 'value' => 'flex', ),
					array( 'name' => esc_html__('Video', 'horseclub'), 'value' => 'video', ),
				),
			),
		
				array(
				'name' => esc_html__('Title 1', 'horseclub'),
				'desc' => esc_html__('ex. Project Type:', 'horseclub'),
				'id'   => $prefix . 'project_1_title',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('Description 1', 'horseclub'),
				'desc' => esc_html__('ex. Character Illustration', 'horseclub'),
				'id'   => $prefix . 'project_11_description',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('Title 2', 'horseclub'),
				'desc' => esc_html__('ex. Skills Needed:', 'horseclub'),
				'id'   => $prefix . 'project_2_title',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('Description 2', 'horseclub'),
				'desc' => esc_html__('ex. Photoshop, Illustrator', 'horseclub'),
				'id'   => $prefix . 'project_22_description',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('Title 3', 'horseclub'),
				'desc' => esc_html__('ex. Customer:', 'horseclub'),
				'id'   => $prefix . 'project_3_title',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('Description 3', 'horseclub'),
				'desc' => esc_html__('ex. Example Inc', 'horseclub'),
				'id'   => $prefix . 'project_33_description',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('Title 4', 'horseclub'),
				'desc' => esc_html__('ex. Project Year:', 'horseclub'),
				'id'   => $prefix . 'project_4_title',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('Description 4', 'horseclub'),
				'desc' => esc_html__('ex. 2014', 'horseclub'),
				'id'   => $prefix . 'project_44_description',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('External Website', 'horseclub'),
				'desc' => esc_html__('ex. Website:', 'horseclub'),
				'id'   => $prefix . 'project_5_title',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('External Website Address', 'horseclub'),
				'desc' => esc_html__('ex. http://www.example.com', 'horseclub'),
				'id'   => $prefix . 'project_55_description',
				'type' => 'text_medium',
			),
				array(
				'name' => esc_html__('If Video Project', 'horseclub'),
				'desc' => esc_html__('Place Embed Code Here, works with youtube, vimeo...', 'horseclub'),
				'id'   => $prefix . 'post_video',
				'type' => 'textarea_code',
					),	
				
						array(
				'name'    => esc_html__('Dimensions for Metro Style', 'horseclub'),
				'desc'    => 'Choose image layout when it appears in Metro type portfolio lists',
				'id'      => $prefix . 'portpost_metro',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('Default', 'horseclub'), 'value' => 'default', ),
					array( 'name' => esc_html__('Large width', 'horseclub'), 'value' => 'large_width', ),
					array( 'name' => esc_html__('Large height', 'horseclub'), 'value' => 'large_height', ),
					array( 'name' => esc_html__('Large width/height', 'horseclub'), 'value' => 'large_width_height', ),
				),
			),	
				
		),
	);			

	$meta_boxes[] = array(
				'id'         => 'bloglist_metabox',
				'title'      => esc_html__('Blog List Options', 'horseclub'),
				'pages'      => array( 'page' ), 
				'show_on' => array('key' => 'page-template', 'value' => array( 'page-blog.php','page-blog-medium.php')),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(
			
			array(
                'name' => esc_html__('Blog Category', 'horseclub'),
                'desc' => esc_html__('Select all blog posts or a specific category to show', 'horseclub'),
                'id' => $prefix .'blog_cat',
                'type' => 'imag_select_category',
                'taxonomy' => 'category',
            ),
			array(
				'name'    => esc_html__('How Many Posts Per Page', 'horseclub'),
				'desc'    => '',
				'id'      => $prefix . 'blog_items',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('All', 'horseclub'), 'value' => 'all', ),
					array( 'name' => '2', 'value' => '2', ),
					array( 'name' => '3', 'value' => '3', ),
					array( 'name' => '4', 'value' => '4', ),
					array( 'name' => '5', 'value' => '5', ),
					array( 'name' => '6', 'value' => '6', ),
					array( 'name' => '7', 'value' => '7', ),
					array( 'name' => '8', 'value' => '8', ),
					array( 'name' => '9', 'value' => '9', ),
					array( 'name' => '10', 'value' => '10', ),
					array( 'name' => '11', 'value' => '11', ),
					array( 'name' => '12', 'value' => '12', ),
					array( 'name' => '13', 'value' => '13', ),
					array( 'name' => '14', 'value' => '14', ),
					array( 'name' => '15', 'value' => '15', ),
					array( 'name' => '16', 'value' => '16', ),
					array( 'name' => '17', 'value' => '17', ),
					array( 'name' => '18', 'value' => '18', ),
					array( 'name' => '19', 'value' => '19', ),
					array( 'name' => '20', 'value' => '20', ),
				),
			),
		
			array(
				'name' => esc_html__('Display Sidebar?', 'horseclub'),
				'desc' => esc_html__('Choose if layout is fullwidth or sidebar', 'horseclub'),
				'id'   => $prefix . 'page_sidebar',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('Yes', 'horseclub'), 'value' => 'yes', ),
					array( 'name' => esc_html__('No', 'horseclub'), 'value' => 'no', ),
				),
			),
			
				
			));
			
	$meta_boxes[] = array(
				'id'         => 'blog_masonry_metabox',
				'title'      => esc_html__('Blog List Options', 'horseclub'),
				'pages'      => array( 'page' ), 
				'show_on' => array('key' => 'page-template', 'value' => array('page-masonry.php','page-masonryw.php')),
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(
			
			array(
                'name' => esc_html__('Blog Category', 'horseclub'),
                'desc' => esc_html__('Select all blog posts or a specific category to show', 'horseclub'),
                'id' => $prefix .'blog_cat_masonry',
                'type' => 'imag_select_category',
                'taxonomy' => 'category',
            ),
			array(
				'name'    => esc_html__('How Many Posts Per Page', 'horseclub'),
				'desc'    => '',
				'id'      => $prefix . 'blog_items_masonry',
				'type'    => 'select',
				'options' => array(
					array( 'name' => esc_html__('All', 'horseclub'), 'value' => 'all', ),
					array( 'name' => '2', 'value' => '2', ),
					array( 'name' => '3', 'value' => '3', ),
					array( 'name' => '4', 'value' => '4', ),
					array( 'name' => '5', 'value' => '5', ),
					array( 'name' => '6', 'value' => '6', ),
					array( 'name' => '7', 'value' => '7', ),
					array( 'name' => '8', 'value' => '8', ),
					array( 'name' => '9', 'value' => '9', ),
					array( 'name' => '10', 'value' => '10', ),
					array( 'name' => '11', 'value' => '11', ),
					array( 'name' => '12', 'value' => '12', ),
					array( 'name' => '13', 'value' => '13', ),
					array( 'name' => '14', 'value' => '14', ),
					array( 'name' => '15', 'value' => '15', ),
					array( 'name' => '16', 'value' => '16', ),
					array( 'name' => '17', 'value' => '17', ),
					array( 'name' => '18', 'value' => '18', ),
					array( 'name' => '19', 'value' => '19', ),
					array( 'name' => '20', 'value' => '20', ),
				),
			),
		
		
			
				
			));					
	return $meta_boxes;
}

add_action( 'init', 'horseclub_showcase_meta_boxes', 9999 );

function horseclub_showcase_meta_boxes() {

	if ( ! class_exists( 'horseclub_cmb_Meta_Box' ) )
		require_once 'cmb/init.php';

}