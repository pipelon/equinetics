<?php
/**
  Redux Horse Club Config File
 * */

if (!class_exists("Redux_Framework_sample_config_horseclub")) {

    class Redux_Framework_sample_config_horseclub {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

      public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }
          
		  

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

       
        function compiler_action($options, $css) {
         
        }

 
        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }


        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

      
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));

            }
        }

        public function setSections() {

           
            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(esc_html__('Customize &#8220;%s&#8221;', 'horseclub'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>"  />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" " />
            <?php endif; ?>

                <h4>
            <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(esc_html__('By %s', 'horseclub'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(esc_html__('Version %s', 'horseclub'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . esc_html__('Tags', 'horseclub') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                <?php
              
                ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            // ACTUAL DECLARATION OF Horse Club

            $this->sections[] = array(
                'title' => esc_html__('General Settings', 'horseclub'),
                'desc' => esc_html__('General Settings lets you change global settings of your HC theme: style, skin color, favicon, logo, logo font etc', 'horseclub'),
                'icon' => 'el-icon-home',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                        'fields' => array(
						
				/*array(
            'id'=>'theme_color_main',
            'type' => 'switch', 
			'class' => 'sakri',
            'title' => esc_html__('Enable Dark Theme Style', 'horseclub'),
            'subtitle' => esc_html__('Turn off if you wish to use Light Theme Style', 'horseclub'),
            "default" => 0,
            ),		*/
                array(
                    'id'=>'boxed_layout',
                    'type' => 'image_select',
                    'compiler'=> false,
                    'title' => esc_html__('Site Layout Style', 'horseclub'), 
                    'subtitle' => esc_html__('Select Wide or Boxed Site Layout Style', 'horseclub'),
                    'options' => array(
                        'wide' => array('alt' => 'Wide Layout', 'img' => ReduxFramework::$_url . 'assets/img/1c.png'),
                        'boxed' => array('alt' => 'Boxed Layout', 'img' => ReduxFramework::$_url . 'assets/img/3cm.png'),
                        ),
                    'default' => 'wide',
                    ),
         
					 array(
        'id'=>'skin_stylesheet',
        'type' => 'select',
        'title' => esc_html__('Theme Skin Stylesheet', 'horseclub'),             
		'options' => array('gold.css'=>'gold.css', 'blue.css'=>'blue.css', 'blue-light.css'=>'blue-light.css', 'green.css'=>'green.css','purple.css'=>'purple.css','orange.css'=>'orange.css','red.css'=>'red.css','gray.css'=>'gray.css','blue-dark.css'=>'blue-dark.css','brown.css'=>'brown.css','turquoise.css'=>'turquoise.css' ),
				'default' => 'gold.css',
        'width' => 'width:60%',
        ),
		  array(
            'id'=>'usefulpi_custom_favicon',
            'type' => 'media', 
            'preview'=> true,
            'title' => esc_html__('Custom Favicon', 'horseclub'),
            'subtitle' => esc_html__('Upload a 16px x 16px png/gif/ico image that will represent your website favicon.', 'horseclub'),
            ),
          
                array(
                    'id'=>'x1_usefulpi_logo_upload',
                    'type' => 'media', 
                    'url'=> true,
                    'title' => esc_html__('Logo', 'horseclub'),
                    'compiler' => 'true',
                    'subtitle' => esc_html__('Upload your Logo. If left blank theme will use site name.', 'horseclub'),
                    ),
					
				  array(
                    'id'=>'s_usefulpi_logo_upload',
                    'type' => 'media', 
                    'url'=> true,
                    'title' => esc_html__('Custom Sticky Logo', 'horseclub'),
                    'compiler' => 'true',
                    'subtitle' => esc_html__('Upload your Logo. If left blank theme will use main logo.', 'horseclub'),
                    ),	
                array(
                    'id'=>'x2_usefulpi_logo_upload',
                    'type' => 'media', 
                    'url'=> true,
                    'title' => esc_html__('Upload Your @2x Logo for Retina Screens', 'horseclub'),
                    'compiler' => 'true',
                    'subtitle' => esc_html__('Should be twice the pixel size of your normal logo.', 'horseclub'),
                    ),
                array(
                    'id'=>'font_logo_style',
                    'type' => 'typography', 
                    'title' => esc_html__('Sitename Logo Font', 'horseclub'),
           
                    'font-family'=>true, 
            'google'=>true,
            'font-backup'=>false, 
            'font-style'=>true, 
            'subsets'=>true, 
            'font-size'=>true,
            'line-height'=>true,
            
            'color'=>true,
            'preview'=>true, 
            'output' => array('header #logo a.brand', ".logofont"),
            'subtitle'=> esc_html__("Choose size and style your sitename, if you don't use an image logo.", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>'', 
                'font-weight'=>'400',
                'font-size'=>'32px', 
                'line-height'=>'40px'
				),
            ),


array(
    'id'=>'logo_padding_top',
    'type' => 'slider', 
    'title' => esc_html__('Logo Spacing', 'horseclub'),
    'desc'=> esc_html__('Top Spacing', 'horseclub'),
    "default"       => "10",
    "min"       => "0",
    "step"      => "1",
    "max"       => "80",
    ), 
	array(
    'id'=>'logo_padding_top_st',
    'type' => 'slider', 
    'title' => esc_html__('Sticky Logo Spacing', 'horseclub'),
    'desc'=> esc_html__('Top Spacing', 'horseclub'),
    "default"       => "0",
    "min"       => "0",
    "step"      => "1",
    "max"       => "80",
    ),
array(
    'id'=>'logo_padding_bottom',
    'type' => 'slider', 
    'title' => esc_html__('Logo Spacing', 'horseclub'),
    'desc'=> esc_html__('Bottom Spacing', 'horseclub'),
    "default"       => "0",
    "min"       => "0",
    "step"      => "1",
    "max"       => "80",
    ),
array(
    'id'=>'logo_padding_left',
    'type' => 'slider', 
    'title' => esc_html__('Logo Spacing', 'horseclub'),
    'desc'=> esc_html__('Left Spacing', 'horseclub'),
    "default"       => "0",
    "min"       => "0",
    "step"      => "1",
    "max"       => "80",
    ), 
array(
    'id'=>'logo_padding_right',
    'type' => 'slider', 
    'title' => esc_html__('Logo Spacing', 'horseclub'),
    'desc'=> esc_html__('Right Spacing', 'horseclub'),
    "default"       => "0",
    "min"       => "0",
    "step"      => "1",
    "max"       => "80",
    ),


	
),
            );
        
            $this->sections[] = array(
                'icon' => 'el-icon-website',
                'title' => esc_html__('Footer options', 'horseclub'),
                'heading' => esc_html__('Footer options.', 'horseclub'),
                'desc' => esc_html__('Footer Options gives you all necessary options for setting up your unique footer. You can change widget layout, copyright text, main footer style, background color or image etc', 'horseclub'),
             'fields' => array(
			 
			 	array(
            'id'=>'display_footer_all',
            'type' => 'switch', 
            'title' => esc_html__('Disable Footer', 'horseclub'),
			'subtitle' => esc_html__('Make sure The Rug footer effect is disabled', 'horseclub'),	
            "default"       => 0,
            ),
			 
           array(
                    'id'=>'footer_layout',
                    'type' => 'image_select',
                    'compiler' => false,
                    'title' => esc_html__('Footer Widget Layout', 'horseclub'), 
                    'subtitle' => esc_html__('Select how many columns for footer widgets', 'horseclub'),
                    'options' => array(
                        'columns_4' => array('alt' => 'Four Column Layout', 'img' => ReduxFramework::$_url . 'assets/img/4-col-portfolio.png'),
                        'columns_3' => array('alt' => 'Three Column Layout', 'img' => ReduxFramework::$_url . 'assets/img/3-col-portfolio.png'),
                       
                        ),
                    'default' => 'columns_4',
                    ),
					
			array(
            'id'=>'display_footer_rug',
            'type' => 'switch', 
            'title' => esc_html__('Enable Under The Rug footer effect', 'horseclub'),
			'subtitle' => esc_html__('It only works for Wide site layout', 'horseclub'),
            "default"       => 0,
            ),		
					    array(
            'id'=>'footer_text',
            'type' => 'editor',
            'title' => esc_html__('Footer Copyright Text', 'horseclub'), 
            'subtitle' => esc_html__('Write your own copyright text here. You can use the following shortcodes in your footer text: [copyright] [site-name] [the-year]', 'horseclub'),
            'default' => '[copyright] [the-year] [site-name] [theme-credit]',
            ),
			
			array(
            'id'=>'footerc_bg_color',
            'type' => 'color',
            'title' => esc_html__('Footer Copyright Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
    	array(
            'id'=>'footer_main_style',
            'type' => 'select',
            'title' => esc_html__('Footer main style', 'horseclub'), 
            'options' => array('dark' => 'dark', 'light' => 'light'),
			'default' => 'dark',
            'width' => 'width:60%',
            ),

		array(
            'id'=>'footer_bg_color',
            'type' => 'color',
            'title' => esc_html__('Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
    	array(
            'id'=>'bg_footer_bg_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background image or texture', 'horseclub'),
            ), 
    	array(
            'id'=>'footer_bg_repeat',
            'type' => 'select',
            'title' => esc_html__('Image repeat options', 'horseclub'), 
            'options' => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'footer_bg_placementx',
            'type' => 'select',
            'title' => esc_html__('X image placement options', 'horseclub'), 
            'options' => array('left' => 'left', 'center' => 'center', 'right' => 'right'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'footer_bg_placementy',
            'type' => 'select',
            'title' => esc_html__('Y image placement options', 'horseclub'), 
            'options' => array('top' => 'top', 'center' => 'center', 'bottom' => 'bottom',),
            'width' => 'width:60%',
            ),
		
     )
            );
            $this->sections[] = array(
                'icon' => 'el-icon-tint',
                'title' => esc_html__('Styling options', 'horseclub'),
                'desc' => esc_html__('Styling Options lets you fine tune style of your HC theme options. You can change background color or image for main content or boxed layout', 'horseclub'),
                'fields' => array(
    	array(
            'id'=>'content_bg_color',
            'type' => 'color',
            'title' => esc_html__('Background Color for main content', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
    	array(
            'id'=>'bg_content_bg_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background image or texture for main content', 'horseclub'),
            ), 
    	array(
            'id'=>'content_bg_repeat',
            'type' => 'select',
            'title' => esc_html__('Image repeat options for main content', 'horseclub'), 
            'options' => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'content_bg_placementx',
            'type' => 'select',
            'title' => esc_html__('X image placement options for main content', 'horseclub'), 
            'options' => array('left' => 'left', 'center' => 'center', 'right' => 'right'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'content_bg_placementy',
            'type' => 'select',
            'title' => esc_html__('Y image placement options for main content', 'horseclub'), 
            'options' => array('top' => 'top', 'center' => 'center', 'bottom' => 'bottom',),
            'width' => 'width:60%',
            ),
			
		array(
            'id'=>'main_bg_fixed',
            'type' => 'select',
            'title' => esc_html__('Fixed or Scroll Image for main layout', 'horseclub'), 
            'options' => array('fixed' => 'Fixed', 'scroll'=>'Scroll'),
            'width' => 'width:60%',
            ),	
    
    	array(
            'id'=>'boxed_bg_color',
            'type' => 'color',
            'title' => esc_html__(' Body Background Color for boxed layout', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
    	array(
            'id'=>'bg_boxed_bg_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload body background image or texture for boxed layout', 'horseclub'),
            ), 
    	array(
            'id'=>'boxed_bg_repeat',
            'type' => 'select',
            'title' => esc_html__('Image repeat options for boxed layout', 'horseclub'), 
            'options' => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'boxed_bg_placementx',
            'type' => 'select',
            'title' => esc_html__('X image placement options for boxed layout', 'horseclub'), 
            'options' => array('left' => 'left', 'center' => 'center', 'right' => 'right'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'boxed_bg_placementy',
            'type' => 'select',
            'title' => esc_html__('Y image placement options for boxed layout', 'horseclub'), 
            'options' => array('top' => 'top', 'center' => 'center', 'bottom' => 'bottom',),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'boxed_bg_fixed',
            'type' => 'select',
            'title' => esc_html__('Fixed or Scroll for boxed layout', 'horseclub'), 
            'options' => array('fixed' => 'Fixed', 'scroll'=>'Scroll'),
            'width' => 'width:60%',
            ),
			array(
            'id'=>'blog_content_bg_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background texture for BLOG content', 'horseclub'),
            ), 
			
        )
            );
  $this->sections[] = array(
                'icon' => 'el-icon-list-alt',
                'title' => esc_html__('Typography', 'horseclub'),
                'desc' => esc_html__('Typography theme options give you, exactly what it says - typography options. You can change separately font, font size, text align and color for each of the H1, H2, H3, H4 and H5 headings as well as body font', 'horseclub'),
            'fields' => array(
    	array(
            'id'=>'font_h1',
            'type' => 'typography', 
            'title' => esc_html__('H1 Headings', 'horseclub'),            
            'font-family'=>true, 
            'google'=>true,
            'font-backup'=>false, 
            'font-style'=>true,
            'subsets'=>true, 
            'font-size'=>true,
            'line-height'=>true,           
            'color'=>true,
            'preview'=>true,
            'output' => array('h1'),
            'subtitle'=> esc_html__("Choose Size and Style for h1 (This Styles Your Page Titles)", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>"", 
                'font-weight'=>'400',
                'font-size'=>'38px', 
                'line-height'=>'38px', ),
            ),
array(
    'id'=>'font_h2',
    'type' => 'typography', 
    'title' => esc_html__('H2 Headings', 'horseclub'),          
    'font-family'=>true, 
            'google'=>true, 
            'font-backup'=>false,
            'font-style'=>true, 
            'subsets'=>true, 
            'font-size'=>true,
            'line-height'=>true,            
            'color'=>true,
            'preview'=>true, 
            'output' => array('h2'),
            'subtitle'=> esc_html__("Choose Size and Style for h2", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>"", 
                'font-weight'=>'normal',
                'font-size'=>'32px', 
                'line-height'=>'32px', ),
            ),
array(
    'id'=>'font_h3',
    'type' => 'typography', 
    'title' => esc_html__('H3 Headings', 'horseclub'),          
    'font-family'=>true, 
            'google'=>true, 
            'font-backup'=>false, 
            'font-style'=>true, 
            'subsets'=>true,
            'font-size'=>true,
            'line-height'=>true,           
            'color'=>true,
            'preview'=>true, 
            'output' => array('h3'),
            'subtitle'=> esc_html__("Choose Size and Style for h3", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>"", 
                'font-weight'=>'300',
                'font-size'=>'28px', 
                'line-height'=>'28px', ),
            ),
array(
    'id'=>'font_h4',
    'type' => 'typography', 
    'title' => esc_html__('H4 Headings', 'horseclub'),
    'font-family'=>true, 
            'google'=>true, 
            'font-backup'=>false, 
            'font-style'=>true, 
            'subsets'=>true,
            'font-size'=>true,
            'line-height'=>true,        
            'color'=>true,
            'preview'=>true, 
            'output' => array('h4'),
            'subtitle'=> esc_html__("Choose Size and Style for h4", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>"", 
                'font-weight'=>'400',
                'font-size'=>'24px', 
                'line-height'=>'24px', ),
            ),
array(
    'id'=>'font_h5',
    'type' => 'typography', 
    'title' => esc_html__('H5 Headings', 'horseclub'),
    'font-family'=>true, 
            'google'=>true, 
            'font-backup'=>false, 
            'font-style'=>true, 
            'subsets'=>true,
            'font-size'=>true,
            'line-height'=>true,           
            'color'=>true,
            'preview'=>true, 
            'output' => array('h5'),
            'subtitle'=> esc_html__("Choose Size and Style for h5", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>"", 
                'font-weight'=>'700',
                'font-size'=>'18px', 
                'line-height'=>'24px', ),
            ),
array(
    'id'=>'font_h6',
    'type' => 'typography', 
    'title' => esc_html__('H6 Headings', 'horseclub'),
    'font-family'=>true, 
            'google'=>true, 
            'font-backup'=>false, 
            'font-style'=>true, 
            'subsets'=>true,
            'font-size'=>true,
            'line-height'=>true,           
            'color'=>true,
            'preview'=>true, 
            'output' => array('h6'),
            'subtitle'=> esc_html__("Choose Size and Style for h6", 'horseclub'),
        			
 ),
array(
    'id'=>'font_p',
    'type' => 'typography', 
    'title' => esc_html__('Body Font', 'horseclub'),         
    'font-family'=>true, 
            'google'=>true, 
            'font-backup'=>false,
            'font-style'=>true,
            'subsets'=>true, 
            'font-size'=>true,
            'line-height'=>true,          
            'color'=>true,
            'preview'=>true, 
            'output' => array('body'),
            'subtitle'=> esc_html__("Choose Size and Style for paragraphs", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>"", 
                'font-weight'=>'400',
                'font-size'=>'14px', 
				'line-height'=>'24px',
                 ),
            ),
),
            );

     
  $this->sections[] = array(
                'icon' => 'el-icon-th',
                'title' => esc_html__('Menu options', 'horseclub'),
                'desc' => esc_html__('Menu Options is dedicated to fine tuning all of your menu styles. You can change font, font size, text align and color for Main menu as well as for mobile menu', 'horseclub'),
           'fields' => array(
			
		array(
            'id'=>'main_menu_bg_color',
            'type' => 'color',
            'title' => esc_html__('Custom Primary Menu Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
			array(
            'id'=>'main_menu_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background img for Primary Menu content', 'horseclub'),
            ),
			array(
            'id'=>'st_menu_bg_color',
            'type' => 'color',
            'title' => esc_html__('Custom Sticky Menu Menu Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),

			array(
    'id'=>'st_menu_bg_color_o',
    'type' => 'text', 
   'title' => esc_html__('Custom Sticky Menu Background RGB', 'horseclub'), 
   'subtitle' => esc_html__('Use this if you need RGB transparency exp. rgba(255, 255, 255, 0.85)', 'horseclub'),
 
    ), 
			array(
    'id'=>'t_menu_bg_color_r',
    'type' => 'text', 
   'title' => esc_html__('Custom Transparent Menu Background RGB', 'horseclub'), 
   'subtitle' => esc_html__('Use this if you need RGB transparency exp. rgba(255, 255, 255, 0.85)', 'horseclub'),
 
    ), 
		
			array(
            'id'=>'sub_color_menu',
            'type' => 'switch', 
            'title' => esc_html__('Enable Dark Sub Menu', 'horseclub'),
            'subtitle' => esc_html__('Turn off if you wish to use Light Sub Menu Style', 'horseclub'),
            "default" => 0,
            ),
			
		array(
            'id'=>'font_primary_menu',
            'type' => 'typography', 
            'title' => esc_html__('Primary Menu Font', 'horseclub'),          
            'font-family'=>true, 
            'google'=>true, 
            'font-backup'=>false, 
            'font-style'=>true,
            'subsets'=>true,
            'font-size'=>true,
			'line-height'=>false,          
            'color'=>true,
            'preview'=>true,
            'output' => array('#nav-main ul.sf-menu a'),
            'subtitle'=> esc_html__("Choose Size and Style for primary menu", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>"", 
                'font-weight'=>'400',
                'font-size'=>'14px', 
                 ),
            ),
		array(
            'id'=>'sticky_font_color',
            'type' => 'color',
            'title' => esc_html__('Custom font color for sticky menu', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),	
		array(
            'id'=>'topbar_ss_color',
            'type' => 'color',
            'title' => esc_html__('Custom color for Search an Shop Icon', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
				array(
            'id'=>'topbar_mm_color',
            'type' => 'color',
            'title' => esc_html__('Custom color for mobile menu button', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
				array(
            'id'=>'topbar_mmp_color',
            'type' => 'color',
            'title' => esc_html__('Custom color for PopUp menu icon', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
				array(
            'id'=>'active_menu_color',
            'type' => 'color',
            'title' => esc_html__('Custom color for active menu', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),

array(
    'id'=>'menu_icon',
    'type' => 'slider', 
    'title' => esc_html__('Font size for Menu Single Icon ', 'horseclub'),   
    "default"       => "14",
    "min"       => "10",
    "step"      => "1",
    "max"       => "50",
    ), 
			
			array(
    'id'=>'menu_margin_top',
    'type' => 'slider', 
    'title' => esc_html__('Primary Menu Spacing', 'horseclub'),
    'desc'=> esc_html__('Top Spacing', 'horseclub'),
    "default"       => "",
    "min"       => "0",
    "step"      => "1",
    "max"       => "180",
    ), 
	
		array(
    'id'=>'menu_margin_list',
    'type' => 'slider', 
    'title' => esc_html__('Primary Menu Items Spacing', 'horseclub'),
    'desc'=> esc_html__('Spacing of list items', 'horseclub'),
    "default"       => "0",
    "min"       => "0",
    "step"      => "1",
    "max"       => "80",
    ), 
	
		array(
    'id'=>'menu_margin_top_st',
    'type' => 'slider', 
    'title' => esc_html__('Primary Sticky Menu Spacing', 'horseclub'),
    'desc'=> esc_html__('Top Spacing', 'horseclub'),
    "default"       => "0",
    "min"       => "0",
    "step"      => "1",
    "max"       => "180",
    ), 
	
		array(
    'id'=>'drop_margin_down',
    'type' => 'slider', 
    'title' => esc_html__('Drop Down Menu Spacing', 'horseclub'),
    'desc'=> esc_html__('Top Spacing', 'horseclub'),
    "default"       => "0",
    "min"       => "0",
    "step"      => "1",
    "max"       => "180",
    ),


array(
    'id'=>'font_mobile_menu',
    'type' => 'typography', 
    'title' => esc_html__('Mobile Menu Font', 'horseclub'),
    'font-family'=>true, 
            'google'=>true, 
            'font-backup'=>false, 
            'font-style'=>true, 
            'subsets'=>true,
            'font-size'=>true,
            'line-height'=>true,           
            'color'=>true,
            'preview'=>true,
            'output' => array('.nav-inner .up-mobnav, .up-mobile-nav .nav-inner li a', '.nav-trigger-case'),
            'subtitle'=> esc_html__("Choose Size and Style for Mobile Menu", 'horseclub'),
            'default'=> array(
                'font-family'=>'Lato',
                'color'=>"", 
                'font-weight'=>'400',
                'font-size'=>'16px', 
                'line-height'=>'20px', ),
            ),
			array(
            'id'=>'mobile_bg_color',
            'type' => 'color',
            'title' => esc_html__('Mobile Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
    	array(
            'id'=>'bg_mobile_bg_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload Mobile background image or texture', 'horseclub'),
            ), 
    	array(
            'id'=>'mobile_bg_repeat',
            'type' => 'select',
            'title' => esc_html__('Mobile mage repeat options', 'horseclub'), 
            'options' => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'mobile_bg_placementx',
            'type' => 'select',
            'title' => esc_html__(' Mobile X image placement options', 'horseclub'), 
            'options' => array('left' => 'left', 'center' => 'center', 'right' => 'right'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'mobile_bg_placementy',
            'type' => 'select',
            'title' => esc_html__('Mobile Y image placement options', 'horseclub'), 
            'options' => array('top' => 'top', 'center' => 'center', 'bottom' => 'bottom',),
            'width' => 'width:60%',
            ),
		array(
            'id'=>'display_top_bar',
            'type' => 'switch', 
            'title' => esc_html__('Enable Top Bar Section', 'horseclub'),
            'subtitle' => esc_html__('Turn on if you wish to use Top Bar for social icons, phone number, messages... ', 'horseclub'),
            "default" => 0,
            ),	
				array(
            'id'=>'topbar_bg_color',
            'type' => 'color',
            'title' => esc_html__('Background Color for Top Bar content', 'horseclub'), 
            'default' => '#969696',
            'validate' => 'color',
            ),			
		array(
            'id'=>'sec_top_left_text',
            'type' => 'editor',
            'title' => esc_html__('Top Bar Left Text', 'horseclub'), 
            'subtitle' => esc_html__('Write your own text here. You can use the shortcodes and custom HTML', 'horseclub'),
            'default' => '[icon url="#" size="15px" color="#ccc" icon="fa fa-facebook"] [icon url="#" size="15px" color="#ccc" icon="fa fa-twitter"] [icon url="#" size="15px" color="#ccc" icon="fa fa-linkedin"] [icon url="#" size="15px" color="#ccc" icon="fa fa-google-plus"] ',
            ),	
	    array(
            'id'=>'sec_top_right_text',
            'type' => 'editor',
            'title' => esc_html__('Top Bar Right Text', 'horseclub'), 
            'subtitle' => esc_html__('Write your own text here. You can use the shortcodes and custom HTML', 'horseclub'),
            'default' => 'Get in touch: 0030-8973426128',
            ),

		array(
        'id'=>'menu_layout',
        'type' => 'select',
        'title' => esc_html__('Top, Left, Center, PopUp menu layout, PopUp menu horizontal', 'horseclub'),             
			'options' => array('up_top_menu'=>'Top Menu', 'up_left_menu'=>'Left menu','up_centar_menu'=>'Center menu','up_popup_menu'=>'PopUp menu', 'up_popup_menu_x'=>'PopUp menu horizontal','up_popup_menu_left'=>'PopUp menu Left'),
		'default' => 'up_top_menu',
        'width' => 'width:60%',
        ),	
array(
       'id' => 'section-start1',
       'type' => 'section',
       'title' => esc_html__('Left menu layout style', 'horseclub'),
        'indent' => true 
   ),		
		array(
            'id'=>'leftmenu_bg_color',
            'type' => 'color',
            'title' => esc_html__('Left Menu Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
    	array(
            'id'=>'bg_leftmenu_bg_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background image or texture for Left Menu', 'horseclub'),
            ), 
    	array(
            'id'=>'leftmenu_bg_repeat',
            'type' => 'select',
            'title' => esc_html__('Image repeat options', 'horseclub'), 
            'options' => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'leftmenu_bg_placementx',
            'type' => 'select',
            'title' => esc_html__('X image placement options', 'horseclub'), 
            'options' => array('left' => 'left', 'center' => 'center', 'right' => 'right'),
            'width' => 'width:60%',
            ),
    	array(
            'id'=>'leftmenu_bg_placementy',
            'type' => 'select',
            'title' => esc_html__('Y image placement options', 'horseclub'), 
            'options' => array('top' => 'top', 'center' => 'center', 'bottom' => 'bottom',),
            'width' => 'width:60%',
            ),
			
array(
       'id' => 'section-start',
       'type' => 'section',
       'title' => esc_html__('PopUp menu layout style', 'horseclub'),
        'indent' => true 
   ),
		array(
            'id'=>'leftpopup_bg_color',
            'type' => 'color',
            'title' => esc_html__('PopUp Nav Menu Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),				
		array(
            'id'=>'popup_bg_color',
            'type' => 'color',
            'title' => esc_html__('PopUp Left Widgets Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
		array(
            'id'=>'bg_pop_bg_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background image or texture for PopUp Menu Left Widgets', 'horseclub'),
            ),	
			
		array(
       'id' => 'section-start3',
       'type' => 'section',
       'title' => esc_html__('PopUp menu LEFT layout style', 'horseclub'),
        'indent' => true 
   ),	
   
   array(
            'id'=>'bg_bar_bg_img',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background image or texture for PopUp Menu Left Menu', 'horseclub'),
            ),
   
   array(
            'id'=>'leftbar_bg_color',
            'type' => 'color',
            'title' => esc_html__('PopUp Left bar Background Color', 'horseclub'), 
            'default' => '',
            'validate' => 'color',
            ),
			
	array(
       'id' => 'section-start2',
       'type' => 'section',
       'title' => esc_html__('Mega Menu BG image', 'horseclub'),
        'indent' => true 
   ),

array(
            'id'=>'bg_mega1',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background image or texture for Mega Menu', 'horseclub'),
			'subtitle' => esc_html__('Add extra class name megabg_1 to CSS Classes (optional)', 'horseclub'),
            ), 
array(
            'id'=>'bg_mega2',
            'type' => 'media', 
            'url'=> true,
            'title' => esc_html__('Upload background image or texture for Mega Menu', 'horseclub'),
			'subtitle' => esc_html__('Add extra class name megabg_2 to CSS Classes (optional)', 'horseclub'),
            ),			
			
		
				),
            );
			
 $this->sections[] = array(
    'icon' => 'el-icon-glasses',
    'title' => esc_html__('Misc Settings', 'horseclub'),
    'desc' => esc_html__('Misc settings lets you change default portfolio page out of pages you have already created. It also gives you possibility to allow/disallow and show/hide comments on portfolio pages', 'horseclub'),
	'fields' => array(
        array(
            'id'=>'portfolio_link',
            'type' => 'select',
            'data' => 'pages',
            'width' => 'width:60%',
            'title' => esc_html__('All Projects Portfolio Page', 'horseclub'), 
            'subtitle' => esc_html__('This sets the link in every single portfolio page. *note: You still have to set the page template to portfolio.', 'horseclub'),
            ),
		array(
            'id'=>'portfolio_url',
            'type' => 'text',
            'title' => esc_html__('Change portfolio URL name', 'horseclub'), 
            'subtitle' => esc_html__('exp. yoursite.com/project *note: You need to rest your permalinks settings. Go to Settings-->Permalinks and just click Save Changes button', 'horseclub'),
            ),	
        array(
            'id'=>'portfolio_comments',
            'type' => 'switch', 
            'title' => esc_html__('Allow Comments on Portfolio Posts', 'horseclub'),
            'subtitle' => esc_html__('Turn on to allow Comments on Portfolio posts', 'horseclub'),
            "default" => 0,
            ),
 

        array(
            'id'=>'close_comments',
            'type' => 'switch', 
            'title' => esc_html__('Show Comments Closed Text?', 'horseclub'),
            'subtitle' => esc_html__('Choose to show or hide comments closed alert below posts.', 'horseclub'),
            "default" => 0,
            ),
				  array(
            'id'=>'display_postnav',
            'type' => 'switch', 
            'title' => esc_html__('Display single post navigation', 'horseclub'),
            "default"       => 1,
            ),
					  array(
            'id'=>'display_posttag',
            'type' => 'switch', 
            'title' => esc_html__('Display single post tags', 'horseclub'),
            "default"       => 0,
            ),
						  array(
            'id'=>'display_author',
            'type' => 'switch', 
            'title' => esc_html__('Display author info on post', 'horseclub'),
            "default"       => 0,
            ),
			
				  array(
            'id'=>'blog_txt',
            'type' => 'select',
        'title' => esc_html__('Blog data text align ', 'horseclub'),             
			'options' => array('bt_1'=>'Left', 'bt_2'=>'Center'),
		'default' => 'bt_1',
        'width' => 'width:40%',
            ),
		
						  array(
            'id'=>'display_hovershop',
            'type' => 'switch', 
            'title' => esc_html__('Disable products fade-flip effect on mouseover', 'horseclub'),
            "default"       => 0,
            ),
							  array(
            'id'=>'display_scroll',
            'type' => 'switch', 
            'title' => esc_html__('Disable custom Nice Scroll bar', 'horseclub'),
            "default"       => 1,
            ),
							
							  array(
            'id'=>'display_loader',
            'type' => 'switch', 
            'title' => esc_html__('Display preloading screen', 'horseclub'),
			'subtitle' => esc_html__(' Will create a preloading screen for your website before all content are fully loaded..', 'horseclub'),
            "default"       => 1,
            ),
			 array(
                    'id'=>'preloader_logo_upload',
                    'type' => 'media', 
                    'url'=> true,
                    'title' => esc_html__('Upload Your Logo for preloading screen', 'horseclub'),
                    'compiler' => 'true',
                    
                    ),
			
			  array(
            'id'=>'spinner',
            'type' => 'select',
        'title' => esc_html__('Spinner Style', 'horseclub'),             
			'options' => array('sp_1'=>'Circle blink', 'sp_2'=>'Equalizer','sp_3'=>'Square Rotate','sp_4'=>'3 Circle blink'),
		'default' => 'sp_2',
        'width' => 'width:40%',
            ),
			
				array(
            'id'=>'loader_bg_color',
            'type' => 'color',
            'title' => esc_html__('Custom Color for Preloading Screen', 'horseclub'), 
            'validate' => 'color',
            ),
							  array(
            'id'=>'display_search',
            'type' => 'switch', 
            'title' => esc_html__('Display search icon', 'horseclub'),
			            "default"       => 1,
            ),
			
									  array(
            'id'=>'display_sh',
            'type' => 'switch', 
            'title' => esc_html__('Enable Sticky Header', 'horseclub'),
			            "default"       => 1,
            ),
			
			      							  array(
            'id'=>'button_border',
            'type' => 'select',
        'title' => esc_html__('Button Style', 'horseclub'),             
			'options' => array('bt_wb'=>'Round Buttons', 'bt_wnb'=>'Squre Buttons'),
		'default' => 'bt_wb',
        'width' => 'width:40%',
            ),
			array(
    'id'       => 'share_multi',
    'type'     => 'checkbox',
    'title'    => esc_html__('Portfolio, Blog Social Share Icons', 'horseclub'),     
 
    'options'  => array(
        '1' => 'Facebook',
        '2' => 'Twitter',
        '3' => 'Google +',
		'4' => 'Pinterest',
		'5' => 'LinkedIn'
    ),
 
    'default' => array(
        '1' => '1', 
        '2' => '1', 
        '3' => '1',
		'4' => '1',
		'5' => '0'
    )
),
           

        ),
);
 $this->sections[] = array(
     'icon' => 'el-icon-cogs',
     'title' => esc_html__('Advanced Settings', 'horseclub'),  
     'desc' => esc_html__('Advanced settings page is made for all of you developers and advanced users who want to make some CSS and JS customizations. Note that all changes should be made here. Lots of you are going to ask why, and here is the answer you are looking for: HC theme is constantly upgraded and updated. Once you install new version of your HC theme, all changes you made in actual js or css files are going to be overwritten and you are going to loose them. If you make changes here, they are going to be transferred to new version of HC theme.', 'horseclub'),
	 'fields' => array(
    array(
                        'id' => 'custom_css',
                        'type' => 'ace_editor',
                        'title' => esc_html__('CSS Code', 'horseclub'),
                        'subtitle' => esc_html__('Paste your CSS code here.', 'horseclub'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'desc' => '#header{margin: 0 auto;}'
                        
                    ),
					 array(
                        'id' => 'js-code',
                        'type' => 'ace_editor',
                        'title' => esc_html__('JS Code', 'horseclub'),
                        'subtitle' => esc_html__('Paste your JS code here.', 'horseclub'),
                        'mode' => 'javascript',
                        'theme' => 'monokai',
                        'desc' => 'jQuery(document).ready(function(){//Your Function//});'
                        
                    ),
					
					),
    );

  $this->sections[] = array(
                'icon' => 'el-icon-shopping-cart',
                'title' => esc_html__('Shop Options', 'horseclub'),
			    'desc' => esc_html__('Shop options gives you flexibility when it comes to settings of your shop pages. You can decide here if you want to have sidebar on shop archive pages; show or hide cart total in top bar; choose how many products you want to display per page (pagination).', 'horseclub'),
                'fields' => array(
    	array(
            'id'=>'shop_layout',
            'type' => 'image_select',
            'compiler'=> false,
            'title' => esc_html__('Display the sidebar on shop archives?', 'horseclub'), 
            'subtitle' => esc_html__('This determines if there is a sidebar on the shop and category pages.', 'horseclub'),
            'options' => array(
                'full' => array('alt' => 'Full Layout', 'img' => ReduxFramework::$_url . 'assets/img/1c.png'),
                'sidebar' => array('alt' => 'Sidebar Layout', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
                ),
            'default' => 'sidebar',
            ),
    
				  array(
            'id'=>'display_shopicon',
            'type' => 'switch', 
            'title' => esc_html__('Show Cart total in topbar?', 'horseclub'),
            'subtitle'=> esc_html__('This only works if using woocommerce', 'horseclub'),
            "default"       => 1,
            ),
    	array(
            'id'=>'products_per_page',
            'type' => 'slider', 
            'title' => esc_html__('How many products per page', 'horseclub'),
            "default"       => "12",
            "min"       => "2",
            "step"      => "1",
            "max"       => "40",
            ),
)
            );
      $this->sections[] = array(
                'title'     => esc_html__('Import / Export', 'horseclub'),
                'desc'      => esc_html__('Import and Export your Redux Framework settings from file, text or URL.', 'horseclub'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            );
			
           $this->sections[] = array(
                'icon' => 'el-icon-info-sign',
                'title' => esc_html__('Theme Information', 'horseclub'),
                 'fields' => array(
                    array(
                        'id' => 'raw_new_info',
                        'type' => 'raw',
                        'content' => $item_info,
                    )
                ),
            );

         
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => esc_html__('Theme Information 1', 'horseclub'),
                'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'horseclub')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => esc_html__('Theme Information 2', 'horseclub'),
                'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'horseclub')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'horseclub');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'horseclub_usefulpi', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => false, // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('HC Options', 'horseclub'),
                'page_title' => esc_html__('HC Options', 'horseclub'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'ferrous-octane-537', // Must be defined to add google fonts to the typography module
                //'async_typography' => true, // Use a asynchronous font on the front end or font string
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => 'hc_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // esc_html__( '', $this->args['domain'] );
                'hints' => array(
                    'icon'              => 'icon-question-sign',
                    'icon_position'     => 'right',
                    'icon_color'        => 'lightgray',
                    'icon_size'         => 'normal',

                    'tip_style'         => array(
                        'color'     => 'light',
                        'shadow'    => true,
                        'rounded'   => false,
                        'style'     => '',
                    ),
                    'tip_position'      => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect' => array(
                        'show' => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS HC
       
            $this->args['share_icons'][] = array(
                'url' => '#',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => '#',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
       


           
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                $this->args['intro_text'] = sprintf(esc_html__('HC theme options gives you all settings you will ever require in one place. Feel free to browse through all the options and jump into our support forum (http://support.useful-pixels.com) if you have any questions.', 'horseclub'), $v);
            } else {
                $this->args['intro_text'] = esc_html__('This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'horseclub');
            }

      
            $this->args['footer_text'] = '';
        }

    }

    new Redux_Framework_sample_config_horseclub();
}


if (!function_exists('redux_horseclub_field')):

    function redux_horseclub_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;


