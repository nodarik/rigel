<?php
/**
 * Start Theme Options
 * -----------------------------------------------------------------------------
 */

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true

$args['dev_mode'] = false;

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null

$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!

$args['opt_name'] = 'rigel_opt_data';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
// $args['system_info'] = true;

$theme = wp_get_theme();
$args['display_name'] = $theme->get('Name');

// $args['database'] = "theme_mods_expanded";

$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.

$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
// $args['admin_stylesheet'] = 'standard';
// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null

$args['import_icon_class'] = 'icon-large';
/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';

// Set a custom menu icon.
// $args['menu_icon'] = '';
// Set a custom title for the options page.
// Default: Options

$args['menu_title'] = esc_html__('Rigel Options', "rigel");

// Set a custom page title for the options page.
// Default: Options

$args['page_title'] = esc_html__('Rigel Options', "rigel");

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options

$args['page_slug'] = 'redux_options';
$args['default_show'] = true;
$args['default_mark'] = '*';



if (!isset($args['global_variable']) || $args['global_variable'] !== false)
        {
        if (!empty($args['global_variable']))
                {
                $v = $args['global_variable'];
                }
          else
                {
                $v = str_replace("-", "_", $args['opt_name']);
                }

        $args['intro_text'] = sprintf(wp_kses(__('<p>Welcome to the awesome <strong>rigel Theme</strong></p>', "rigel"), array( 'p' => array( ) )) , $v);
        }
  else
        {
        $args['intro_text'] = wp_kses(__('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', "rigel"), array( 'p' => array( ) ));
        }

$sections = array();

// Background Patterns Reader

$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
/*$sample_patterns_path = get_template_directory_uri() . '/img/bg/';
$sample_patterns_url = get_template_directory_uri() . '/img/bg/';*/
$ct_bg_type = array(
        "none" => "None",
        "upload" => "Upload",
        "predefined" => "Predefined"
);
$ct_bg_repeat = array(
        "repeat" => "repeat",
        "repeat-x" => "repeat-x",
        "repeat-y" => "repeat-y",
        "no-repeat" => "no-repeat"
);
$ct_bg_position = array(
        "top left" => "top left",
        "top center" => "top center",
        "top right" => "top right",
        "center left" => "center left",
        "center center" => "center center",
        "center right" => "center right",
        "bottom left" => "bottom left",
        "bottom center" => "bottom center",
        "bottom right" => "bottom right"
);
$ct_type_animation = array(
        "fade" => "Fade",
        "scale_up" => "Scale Up",
        "scale_down" => "Scale Down",
        "slide_top" => "Slide Top",
        "slide_bottom" => "Slide Bottom",
        "slide_right" => "Slide Right",
        "slide_left" => "Slide Left"
);
$type_of_pagination = array(
        "standard" => "Standard",
        "numeric" => "Numeric",
        "load_more" => "Load More button"
);
$type_of_pagination_cat = array(
        "standard" => "Standard",
        "numeric" => "Numeric"
);
$theme_bg_type = array(
        "uploaded" => "Uploaded",
        "predefined" => "Predefined",
        "color" => "Color"
);
$theme_bg_attachment = array(
        "scroll" => "Scroll",
        "fixed" => "Fixed"
);
$theme_bg_position = array(
        "left" => "Left",
        "right" => "Right",
        "centered" => "Centered",
        "full_screen" => "Full Screen"
);
$theme_bg_color = array(
        "bg_image" => "Background Image",
        "color" => "Color",
        "upload" => "Upload"
);
$blog_sidebar_position = array(
        "Right Sidebar" => "Right Sidebar",
        "Left Sidebar" => "Left Sidebar"
);
$sl_port_style = array(
        "Random Thumbnails" => "Random Thumbnails",
        "Standard Thumbnails" => "Standard Thumbnails"
);
$sample_patterns = array();

if (is_dir($sample_patterns_path)):
        if ($sample_patterns_dir = opendir($sample_patterns_path)):
                $sample_patterns = array();
                while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false)
                        {
                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false)
                                {
                                $name = explode(".", $sample_patterns_file);
                                $name = str_replace('.' . end($name) , '', $sample_patterns_file);
                                $sample_patterns[] = array(
                                        'alt' => $name,
                                        'img' => $sample_patterns_url . $sample_patterns_file
                                );
                                }
                        }

        endif;
endif;
/* Theme Parameters*/
$bg_images_path = get_stylesheet_directory() . '/framework/images/bg/'; // change this to where you store your bg images
$bg_images_url = get_template_directory_uri() . '/framework/images/bg/'; // change this to where you store your bg images
$ct_theme_patterns = array();

if (is_dir($bg_images_path))
        {
        if ($bg_images_dir = opendir($bg_images_path))
                {
                while (($bg_images_file = readdir($bg_images_dir)) !== false)
                        {
                        if (stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false)
                                {
                                natsort($ct_theme_patterns); //Sorts the array into a natural order
                                $ct_theme_patterns[] = $bg_images_url . $bg_images_file;
                                }
                        }
                }
        }

$theme_path_images = get_template_directory_uri() . '/framework/images/';



$sections[] = array(
        'title' => esc_html__('General Settings', "rigel") ,
        'header' => '',
        'desc' => '',
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-home',

        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!

        'fields' => array(
                      array(
                        'id' => 'rigel_logo_upload',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Logo Upload', "rigel") ,
                        'desc' => esc_html__('Upload your logo or paste the url', "rigel") ,
                        'subtitle' => esc_html__('Upload image using the native media uploader, or define the URL directly', "rigel") ,
                                        'default'  => array(
                                'url' => $theme_path_images . 'vc_image.jpg'
                        ),

                ) ,
                array(
                        'id' => 'rigel_logo_preloader',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Logo Preloader', "rigel") ,
                        'desc' => esc_html__('Upload your Preloader logo or paste the url', "rigel") ,
                        'subtitle' => esc_html__('Upload image using the native media uploader, or define the URL directly', "rigel") ,
                                        'default'  => array(
                                'url' => $theme_path_images . 'vc_image.jpg'
                        ),

                ) ,
                array(
                        'id' => 'page_preload',
                        'type' => 'switch',
                        'title' => esc_html__('Switch on page preload?', 'rigel') ,
                        'default' => false,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                ) ,
			array( 
						'id'       => 'main_border',
						'type'     => 'border',
						'title'    => esc_html__('Body Border Option', 'rigel'),
						'subtitle' => esc_html__('Here you can configure wrapper border width and color', 'rigel'),
						'desc'     => esc_html__('change values here.', 'rigel'),
						'all' => false,
						'top' => true,
						'left' => true,
						'bottom' => true,
						'left' => true,
						'default'  => array(
							'border-color'  => '#F4F4F1', 
							'border-style'  => 'solid', 
							'border-top'    => '16px', 
							'border-right'  => '16px', 
							'border-bottom' => '16px', 
							'border-left'   => '16px'
						)
					),
                array(
                        'id' => 'rigel_accent_color',
                        'type' => 'color',
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'title' => esc_html__('Main accent color', 'rigel') ,
                        'subtitle' => esc_html__('Pick a color for the theme (default: #b09991).', 'rigel') ,
                        'default' => '#b09991',
                        'validate' => 'color',
                ) ,
                array(
                        'id' => 'tagline',
                        'type' => 'switch',
                        'title' => esc_html__('Switch on page titles?', 'rigel') ,
                        'default' => false,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                ) ,
                array(
                        'id' => 'tagline_before',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to add styling "//" to page titles?', 'rigel') ,
                        'default' => false,
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                ) ,
                array(
                        'id' => 'rigel_custom_css',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                        'compiler' => true,
                        'theme' => 'monokai',
                        'title' => esc_html__('Custom CSS', "rigel") ,
                        'subtitle' => esc_html__('Quickly add some CSS to your theme by adding it to this block.', "rigel") ,
                        'desc' => esc_html__('This field is even CSS validated!', "rigel") ,
                        'validate' => "css",
                        'default' => "",
                ) ,
        ) ,
);
$sections[] = array(
        'title' => esc_html__('Typography', "rigel") ,
        'header' => '',
        'desc' => '',
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-fontsize',

        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!

        'fields' => array(
                array(
                        'id' => 'rigel_typo_menu',
                        'type' => 'typography',
                        'title' => esc_html__('Menu Typography', 'rigel') ,
                        'google' => true,
                        'compiler' => true,
                        'units' => 'px',
                        'text-align' => false,
                        'subtitle' => esc_html__('Typography option for menu.', 'rigel') ,
                        'default' => array(
                                'color' => '#28262b',
                                'font-style' => '300',
                                'font-family' => 'montserrat',
                                'google' => true,
                                'font-size' => '13px',
                                'line-height' => '22px'
                        ) ,
                ) ,
                array(
                        'id' => 'rigel_typo_headers',
                        'type' => 'typography',
                        'title' => esc_html__('Titles Font', 'rigel') ,
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'font-weight' => false,
                        'font-size' => true,
                        'line-height' => true,
                        'color' => true,
                        'units' => 'px',
                        'subsets' => false, // Only appears if google is true and subsets not set to false
                        'text-align' => true,
                        'letter-spacing' => true,
                        'units' => 'px', // Defaults to px
                        'subtitle' => esc_html__('Specify the title font properties.', 'rigel') ,
                        'default' => array(
                                'font-family' => 'montserrat',
                                'google' => true,
                                'font-size' => '30px',
                                'line-height' => '33px',
                                'color' => '#28262b'
                        ) ,
                ) ,
                array(
                        'id' => 'rigel_typo_body',
                        'type' => 'typography',
                        'title' => esc_html__('Body Font', 'rigel') ,
                        'google' => true,
                        'font-size' => true,
                        'line-height' => true,
                        'color' => true,
                        'compiler' => true,
                        'units' => 'px',
                        'letter-spacing' => true,
                        'subtitle' => esc_html__('Typography option for body.', 'rigel') ,
                        'default' => array(
                                'color' => '#565656',
                                'font-style' => '300',
                                'font-family' => 'Source Sans Pro',
                                'google' => true,
                                'font-size' => '14px',
                                'line-height' => '33px'
                        ) ,
                ) ,

        ) ,
);
$sections[] = array(
        'title' => esc_html__('Header Settings', "rigel") ,
        'header' => '',
        'desc' => '',
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-credit-card',

        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!

        'fields' => array(
		
		
                                array(
                                'id'       => 'fixed_header',
                                'type'     => 'switch',
                                'title'    => esc_html__('fixed Header', 'rigel'),
                                'subtitle' => esc_html__('If enabled header will be fixed', 'rigel'),
                                'default'  => true,
                                'on' => 'Enabled',
                                'off' => 'Disabled',
                           
                        ),
					array(
                        'id' => 'header_field_text_2',
                        'type' => 'text',
                        'title' => esc_html__('Logo Tagline', 'rigel') ,
                        'default' => '',
                        'subtitle' => esc_html__('Text will appear right to the logo, delete it if you dont want to use it', 'rigel') ,
                ) ,
					
						$fields = array(
							'id'       => 'top_social_networks_position',
							'type'     => 'radio',
							'title'    => esc_html__('Sicial icons in header', 'rigel'), 
							'subtitle' => esc_html__('choose icon position in the top header bar', 'rigel'),
							'desc' => esc_html__('You can hide social icons in the header if you choose 4-th option', 'rigel'),
							//Must provide key => value pairs for radio options
							'options'  => array(
								'1' => 'left', 
								'2' => 'center', 
								'3' => 'right',
								'4' => 'hide'
							),
							'default' => '4',
						),
						
			 array(
                        'id' => 'top_social_networks_color',
                        'type' => 'color',
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'title' => esc_html__('Color for sicial icons in header', 'rigel') ,
                        'subtitle' => esc_html__('Pick a color for the theme (default: #111).', 'rigel') ,
                        'default' => '#111',
                        'validate' => 'color',
                ) ,
				
				         array(
                                'id'       => 'search_in_header',
                                'type'     => 'switch',
                                'title'    => esc_html__('Display or hide search form', 'rigel'),
                                'subtitle' => esc_html__('If enabled search form will be displayed', 'rigel'),
                                'default'  => false,
                                'on' => 'Enabled',
                                'off' => 'Disabled',
                      ),
						
                array(
                        'id' => 'header_layout',
                        'type' => 'image_select',
                        'title' => esc_html__('Header Layout', 'rigel') ,
                        'subtitle' => esc_html__('Select the header Layout', 'rigel') ,
                        'description' => esc_html__('Header layouts', 'rigel') ,
                        'options' => array(
                                'v1' => array(
                                        'alt' => 'Header 1',
                                        'img' => get_template_directory_uri() . '/framework/images/header1.png'
                                ) ,
                                'v2' => array(
                                        'alt' => 'Header 2',
                                        'img' => get_template_directory_uri() . '/framework/images/header2.png'
                                ) ,
                                'v3' => array(
                                        'alt' => 'Header 3',
                                        'img' => get_template_directory_uri() . '/framework/images/header3.png'
                                ) ,
							  'v4' => array(
									'alt' => 'Header 4',
									'img' => get_template_directory_uri() . '/framework/images/header4.png'
							) ,
									  'v5' => array(
									'alt' => 'Header 5',
									'img' => get_template_directory_uri() . '/framework/images/header4.png'
							) ,
                        ) ,
                        'default' => 'v2'
                ) ,

                                array(
                                'id'       => 'fixed_menu',
                                'type'     => 'switch',
                                'title'    => esc_html__('Always Display Menu', 'rigel'),
                                'subtitle' => esc_html__('If enabled menu word will be displayed', 'rigel'),
                                'default'  => false,
                                'on' => 'Enabled',
                                'off' => 'Disabled',
                                'required' => array(
                                array(
                                        'header_layout',
                                        "=",
                                        'v1'
                                        )
                                ),
                        ),

                array(
                        'id' => 'menu_word',
                        'type' => 'text',
                        'title' => esc_html__('Menu Word', 'rigel') ,
                        'default' => 'MENU',
                        'subtitle' => esc_html__('Menu word near the menu swithcher', 'rigel') ,
                        'required' => array(
                                array(
                                        'header_layout',
                                        "=",
                                        'v1'
                                        )
                                ),

                ) ,
  
				
				     array(
						'id'       => 'side_menu_bg',
						'type'     => 'background',
						'title'    => esc_html__('Side Menu Background', 'rigel'),
						'subtitle' => esc_html__('Header background with image, color, etc.', 'rigel'),
						'desc'     => esc_html__('Optional: Upload a Background Image for the side menu.', 'rigel'),
						'default'  => array(
							'background-color' => '#ffffff',
						),
						                     'required' => array(
                                array(
                                        'header_layout',
                                        "=",
                                        'v5'
                                        )
                                ),
						),
								
						 array(
                                'id'       => 'full_height_submenu',
                                'type'     => 'switch',
                                'title'    => esc_html__('enable full height submenu', 'rigel'),
                                'subtitle' => esc_html__('If enabled submenus will be full height', 'rigel'),
                                'default'  => false,
                                'on' => 'Enabled',
                                'off' => 'Disabled',
                                'required' => array(
									array(
											'header_layout',
											"=",
											'v5'
											)
									),
                        ),
								
	
        ),

     
);
$sections[] = array(
        'title' => esc_html__('Social networks', "rigel") ,
        'header' => '',
        'desc' => '',
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-facebook',

        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!

        'fields' => array(
                        array(
                        'id' => 'footer_social_fb',
                        'type' => 'text',
                        'title' => esc_html__('Facebook url', 'rigel') ,
                        'default' => '#'
                ) ,
                array(
                        'id' => 'footer_social_tw',
                        'type' => 'text',
                        'title' => esc_html__('Twitter url', 'rigel') ,
                        'default' => '#'
                ) ,
                array(
                        'id' => 'footer_social_go',
                        'type' => 'text',
                        'title' => esc_html__('Google + url', 'rigel') ,
                        'default' => '#'
                ) ,
                array(
                        'id' => 'footer_social_pi',
                        'type' => 'text',
                        'title' => esc_html__('Pinterest URL', 'rigel') ,
                        'default' => '#'
                ) ,
                array(
                        'id' => 'footer_social_li',
                        'type' => 'text',
                        'title' => esc_html__('LinkedIN url', 'rigel') ,
                        'default' => '#'
                ) ,
                array(
                        'id' => 'footer_social_inst',
                        'type' => 'text',
                        'title' => esc_html__('Instagram url', 'rigel') ,
                        'default' => '#'
                ) ,
        ) ,
);
$sections[] = array(
        'title' => esc_html__('Blog and Portfolio', "rigel") ,
        'header' => '',
        'desc' => '',
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-website',

        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!

        'fields' => array(
                array(
                        'id' => 'portfolio_thumbnail_bg_color',
                        'type' => 'color',
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'title' => esc_html__('Portfolio thumbnail hover background color', 'rigel') ,
                        'subtitle' => esc_html__('If you set this color, BG color from single portfolio will be overiden', 'rigel') ,
                        'default' => '#444',
                        'validate' => 'color',
                ) ,
                array(
                        'id' => 'portfolio_thumbnail_text_color',
                        'type' => 'color',
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'title' => esc_html__('Portfolio thumbnail hover text color', 'rigel') ,
                        'subtitle' => esc_html__('If you set this color, hover text color from single portfolio will be overiden', 'rigel') ,
                        'default' => '#fff',
                        'validate' => 'color',
                ) ,
                array(
                        'id' => 'blog_sidebar_position',
                        'type' => 'select',
                        'compiler' => true,
                        'title' => esc_html__("Blog Sidebar Position", "rigel") ,
                        'options' => $blog_sidebar_position,
                        'default' => "Right Sidebar"
                ) ,
                array(
                        'id' => 'sl_port_style',
                        'type' => 'select',
                        'compiler' => true,
                        'title' => esc_html__("Portfolio Style", "rigel") ,
                        'options' => $sl_port_style,
                        'default' => "Random Thumbnails"
                ) ,
                array(
                        'id' => 'sl_port_per_page',
                        'type' => 'slider',
                        'title' => esc_html__('Fisrt page load', 'rigel') ,
                        'desc' => esc_html__('How many projects per page?', 'rigel') ,
                        "default" => 9,
                        "min" => 1,
                        "step" => 1,
                        "max" => 40,
                        'display_value' => 'label'
                ) ,
                array(
                        'id' => 'load_posts_count',
                        'type' => 'slider',
                        'title' => esc_html__('Projects load', 'rigel') ,
                        'desc' => esc_html__('How many projects load on click?', 'rigel') ,
                        "default" => 5,
                        "min" => 1,
                        "step" => 1,
                        "max" => 40,
                        'display_value' => 'label'
                ) ,
        ) ,
);
$sections[] = array(
        'title' => esc_html__('Footer Settings', "rigel") ,
        'header' => '',
        'desc' => '',
        'icon_class' => 'icon-large',
        'icon' => 'el-icon-photo',

        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!

        'fields' => array(
                array(
                        'id' => 'footer_logo_upload',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Footer Logo Upload', "rigel") ,
                        'desc' => esc_html__('Upload your footer logo or paste the url', "rigel") ,
                        'subtitle' => esc_html__('Upload image using the native media uploader, or define the URL directly', "rigel") ,
                        'default'  => array(
                                'url' => $theme_path_images . 'vc_image.jpg'
                        ),
                ) ,
                array(
                        'id' => 'hidden_footer',
                        'type' => 'switch',
                        'title' => esc_html__('Hide Footer', 'rigel') ,
                        'subtitle' => esc_html__('If enabled Footer will be hidden and you have to click on footer name (see bellow) to make it appear', 'rigel') ,
                        'default' => false,
                        'on' => 'on',
                        'off' => 'off',
                ) ,
                array(
                        'id' => 'footer_left',
                        'type' => 'textarea',
                        'title' => esc_html__('Footer second section', 'rigel') ,
                        'subtitle' => esc_html__('You are allowed to use html tags here', 'rigel') ,
                        'default' => '<ul class="rigel_footer_contact">
<li><a href="mailto:hi@myouremail.com">EMAIL</a><h5>Why not<br>say hi</h5>
</li>
<li><h3>ADDRESS</h3><h5>Yorker str. 25 Boston<br>Germany, Berlin</h5>
</li>
<li><h3>PHONE</h3><h5>1-800-800-0000<br>1-808-801-2222</h5>
</li>
</ul>',
                        'args' => array(
                                'teeny' => true,
                                'textarea_rows' => 30
                        )
                ) ,
                array(
                        'id' => 'bottom_line_text',
                        'type' => 'textarea',
                        'title' => esc_html__('Bottom footer text', 'rigel') ,
                        'default' => esc_html__('2016 Rigel Template By Radiuzz.com', 'rigel'),
                        'args' => array(
                                'teeny' => true,
                                'textarea_rows' => 10
                        )
                ) ,
                array(
            'id'       => 'footer_bg',
            'type'     => 'background',
            'title'    => esc_html__('Footer Background', 'rigel'),
            'subtitle' => esc_html__('Header background with image, color, etc.', 'rigel'),
            'desc'     => esc_html__('Optional: Upload a Background Image for the footer part. Width 1200px height as defined in the setting.', 'rigel'),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
                array(
                        'id' => 'bottom_footer_bg_color',
                        'type' => 'color',
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'title' => esc_html__('Bottom Footer Background Color', 'rigel') ,
                        'subtitle' => esc_html__('Pick a color for the theme ', 'rigel') ,
                        'default' => '#f4f4f1',
                        'validate' => 'color',
                ) ,
                array(
                        'id' => 'bottom_footer_border_color',
                        'type' => 'color',
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'title' => esc_html__('Bottom Footer Border Color', 'rigel') ,
                        'subtitle' => esc_html__('Pick a color for the theme', 'rigel') ,
                        'default' => '#E0E0E0',
                        'validate' => 'color',
                ) ,
                array(
                        'id' => 'text_color_in_footer',
                        'type' => 'color',
                        'compiler' => true, // Use if you want to hook in your own CSS compiler
                        'title' => esc_html__('Footer Text Color', 'rigel') ,
                        'subtitle' => esc_html__('Choose text color in footer.', 'rigel') ,
                        'default' => '#8E8E8E',
                        'validate' => 'color',
                ) ,

        ) ,
);
global $ReduxFramework;

if (!isset($tabs)) $tabs = 0;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// END Sample Config

function generate_options_css($newdata)
        {
        $smof_data = $newdata;
        $css_dir = get_stylesheet_directory() . '/framework/css/';
        $css_php_dir = get_template_directory() . '/framework/css/';
        ob_start();
        require ($css_php_dir . '/style.php');

        $css = ob_get_clean();
        global $wp_filesystem;
        WP_Filesystem();
                if (!$wp_filesystem->put_contents($css_dir . '/options.css', $css, 0644))
                {
                return true;
                }
        }

function rigel_theme_css_compiler()
        {
        global $rigel_opt_data;
        generate_options_css($rigel_opt_data);
        }

add_action('redux-compiler-rigel_opt_data', 'rigel_theme_css_compiler');