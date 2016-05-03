<?php
/**
 * Rigel theme functions
 *
 *
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) $content_width = 1000; /* pixels */

/* Makes theme available for translation. */
load_theme_textdomain( 'rigel', get_template_directory() . '/languages' );
/**
 * Include Framework. (Theme options)
 */ 
if ( class_exists( 'ReduxFramework' )) {
require_once(get_template_directory() . '/framework/theme-configs.php');
}
add_action( 'after_setup_theme', 'rigel_theme_functions' );
function rigel_theme_functions() {
add_theme_support( 'title-tag' );
}
add_filter( 'wp_title', 'rigel_custom_titles', 10, 2 );
function rigel_custom_titles( $title, $sep ) {
//Check if custom titles are enabled from your option framework
if ( get_option( 'enable_custom_titles' ) === 'on' ) {
//Some silly example
     $title =  $title;;
    }

    return $title;
}


// WooCommerce
require_once(get_template_directory() . '/framework/woocommerce/index.php');

/* ------------------------------------------------------------------------ */
/* Theme Stylesheets */
/* ------------------------------------------------------------------------ */
function rigel_theme_styles_basic()  
	{
		/* Enqueue Stylesheets */
		wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/framework/bootstrap/bootstrap.css', array(), '1', 'all' );
		wp_enqueue_style( 'rigel_vc_css', get_template_directory_uri() . '/framework/css/vc.css', array(), '1', 'all' );
		wp_enqueue_style( 'rigel_main_style_css', get_template_directory_uri() . '/framework/css/main_style.css', array(), '1', 'all' );
		wp_enqueue_style( 'rigel_poptions_css', get_template_directory_uri() . '/framework/css/options.css', array(), '1', 'all' );
		wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' ); // Main Stylesheet
		wp_enqueue_style( 'rigel_bxslider_css', get_template_directory_uri() . '/framework/css/jquery.bxslider.css', array(), '1', 'all' );
		wp_enqueue_style( 'flex-slider', get_template_directory_uri() . '/framework/FlexSlider/flexslider.css', array(), '1', 'all' );
		wp_enqueue_style( 'prettyPhoto_css', get_template_directory_uri() . '/framework/css/prettyPhoto.css', array(), '1', 'all' );
		wp_enqueue_style( 'rigel_iestyles_css', get_template_directory_uri() . '/framework/css/iestyles.css', array(), '1', 'all' );
		wp_style_add_data( 'rigel_iestyles_css', 'conditional', 'lt IE 9' );
	
	}  
	add_action( 'wp_enqueue_scripts', 'rigel_theme_styles_basic', 1 ); 	
/* ------------------------------------------------------------------------ */
/* CUSTOM ADMIN STYLES*/
/* ------------------------------------------------------------------------ */
add_action('admin_enqueue_scripts', 'rigel_admin_theme_style');
if ( !function_exists('rigel_admin_theme_style') ) {
function rigel_admin_theme_style() {
wp_enqueue_style('rigel_admin-theme', get_template_directory_uri() . '/framework/css/redux.css', false, '1.0.0' );
}
}
/* ------------------------------------------------------------------------ */
/* Loading Theme Scripts */
/* ------------------------------------------------------------------------ */
add_action('wp_enqueue_scripts', 'rigel_load_scripts');
if ( !function_exists( 'rigel_load_scripts' ) ) {
	function rigel_load_scripts() {
		wp_enqueue_script('bootstrap', get_template_directory_uri().'/framework/bootstrap/bootstrap.min.js', array('jquery'), false, null , true);
		wp_enqueue_script('modernizr', get_template_directory_uri().'/framework/js/modernizr.custom.js', array('jquery'), false, null , true);
		wp_enqueue_script('bxslider', get_template_directory_uri().'/framework/js/jquery.bxslider.min.js', array('jquery'), false, null , true);
		wp_enqueue_script('prettyPhoto', get_template_directory_uri().'/framework/js/jquery.prettyPhoto.js', array('jquery'), false, null , true);
		wp_enqueue_script('jflickrfeed', get_template_directory_uri().'/framework/js/jflickrfeed.min.js', array('jquery'), false, null , true);
		wp_enqueue_script('waitforimages', get_template_directory_uri().'/framework/js/jquery.waitforimages.js', array('jquery'), false, null , true);
		wp_enqueue_script('isotope', get_template_directory_uri().'/framework/js/jquery.isotope.min.js', array('jquery'), false, null , true);
		wp_enqueue_script('flexslider', get_template_directory_uri().'/framework/FlexSlider/jquery.flexslider-min.js', array('jquery'), false, null , true);
		wp_enqueue_script('rigel_custom', get_template_directory_uri().'/framework/js/custom.js', array('jquery'), false, null , true);
		wp_enqueue_script( 'rigel-html5', get_template_directory_uri() . '/framework/js/html5.js', array(), '3.7.3' );
		wp_script_add_data( 'rigel-html5', 'conditional', 'lt IE 9' );
		
		global $rigel_opt_data;
		$rigel_theme = array( 
				'theme_url' => get_template_directory_uri(),
				'page_preload' => $rigel_opt_data['page_preload'],
			);
    	wp_localize_script( 'rigel_custom', 'rigel_theme', $rigel_theme );
	}    
}
/* ------------------------------------------------------------------------ */
/* Theme Menus */
/* ------------------------------------------------------------------------ */
function rigel_menu() { 
  register_nav_menus(
    array(
      'main_menu' => esc_html__('Header Menu', 'rigel'),
      'secondary_menu' => esc_html__('Footer Navigation', 'rigel')
    )
  );
}
add_action( 'init', 'rigel_menu' );

/* Custom menu Walker */
class rigel_Walker extends Walker_Nav_Menu
	{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='my_drop'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . ' menu-item-'. $item->ID . '"';
		$output .= $indent . '<li id="menu-item-id-'. $item->ID . '"' . $value . $class_names .' >';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_html( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_html( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_html( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' data-description="' . $item->description . '">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/*=======================================
	Additional image sizes
=======================================*/
add_image_size( 'rigel-portfolio-squre', 381, 381, true );
add_image_size( 'rigel-portfolio-squrex2', 762,762, true );
add_image_size( 'rigel-portfolio-wide', 762, 381, true );
add_image_size( 'rigel-portfolio-long', 381, 762, true );

/*=======================================
	Register Sidebar 
=======================================*/
add_action( 'widgets_init', 'rigel_register_sidebars' );
function rigel_register_sidebars() {
	if ( function_exists('register_sidebar') ){
			
		register_sidebar(array(
			'name' =>  esc_html__( 'Blog Sidebar', 'rigel' ),
			'id' => 'Blog_sidebar',
			'before_widget' => '<div class="rigel_widget">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="rigel_widget_title">',
			'after_title' => '</h6>'
		));
		
		register_sidebar( array(
			'name' => esc_html__( 'WooCommerce Page Sidebar', 'rigel' ),
			'id' => 'woocommerce_sidebar',
			'before_widget' => '<div id="%1$s" class="widgetSidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar(array(
			'name' => esc_html__( 'Portfolio Sidebar', 'rigel' ),
			'id' => 'portfolio_sidebar',
			'before_widget' => '<div class="rigel_widget">',
			'after_widget' => '</div><div class="clearfix"></div>',
			'before_title' => '<div class="clearfix"></div><h6 class="rigel_widget_title">',
			'after_title' => '</h6>'
		));
		
		register_sidebar(array(
			'name' => esc_html__( 'Page Sidebar', 'rigel' ),
			'id' => 'Page_sidebar',
			'before_widget' => '<div class="rigel_widget">',
			'after_widget' => '</div><div class="clearfix"></div>',
			'before_title' => '<div class="clearfix"></div><h6 class="rigel_widget_title">',
			'after_title' => '</h6>'
		));
	}
}

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );

}


/* Automatic Plugin Activation */

require_once('framework/plugin-activation.php');
	add_action('tgmpa_register', 'rigel_register_required_plugins');
	function rigel_register_required_plugins() {
		$plugins = array(
			
			array(
				'name'     				=> esc_html__('Visual Composer','rigel'), // The plugin name
				'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
				'source'   				=> 'http://rigel.radiuzz.com/plugins/js_composer.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '4.11.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> esc_html__('Slider Revolution','rigel'), // The plugin name
				'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
				'source'   				=> 'http://rigel.radiuzz.com/plugins/revslider.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '5.2.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			
			array(
				'name'     				=> esc_html__('Ultimate_VC_Addons','rigel'), // The plugin name
				'slug'     				=> 'Ultimate_VC_Addons', // The plugin slug (typically the folder name)
				'source'   				=> 'http://rigel.radiuzz.com/plugins/Ultimate_VC_Addons.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '3.13.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			
			array(
				'name'     				=> esc_html__('Rigel core','rigel'), // The plugin name
				'slug'     				=> 'rigel_core', // The plugin slug (typically the folder name)
				'source'   				=> 'http://rigel.radiuzz.com/plugins/rigel_core.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> esc_html__('Essential Grid','rigel'), // The plugin name
				'slug'     				=> 'essential-grid', // The plugin slug (typically the folder name)
				'source'   				=> 'http://rigel.radiuzz.com/plugins/essential-grid.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '2.0.9.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
            'name'      => esc_html__('Redux Framework', 'rigel'),
            'slug'      => 'redux-framework',
			'force_activation' 		=> false,
            'required'  => false,
        ),
		);
	
		$rigel= 'rigel';
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
		'id'           => 'rigel',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'domain'       		=> 'rigel',         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table

		);
	
		tgmpa($plugins, $config);
		
	}

/* ------------------------------------------------------------------------ */
/* add theme support  */
/* ------------------------------------------------------------------------ */
add_theme_support( 'automatic-feed-links' );
/* ------------------------------------------------------------------------ */
/* Post Formats  */
/* ------------------------------------------------------------------------ */

add_theme_support( 'post-formats',      // post formats
		array( 
			'image',    //image
			'quote',   // a quick quote
			'video',   // video 
			'audio',   // audio
			'gallery',   // audio
		)
);
add_filter('get_avatar','rigel_change_avatar_css');
function rigel_change_avatar_css($class) {
$class = str_replace("class='avatar", "class='avatar img-circle rigel_avatar ", $class) ;
return $class;
}

/* ------------------------------------------------------------------------ */
/* Extra Fields.  */
/* ------------------------------------------------------------------------ */
add_action('admin_init', 'rigel_extra_fields', 1);
function rigel_extra_fields() {
	add_meta_box( 'extra_fields', esc_html__('Additional Description', 'rigel'), 'rigel_extra_fields_for_blog', 'post', 'normal', 'high'  );
	add_meta_box( 'extra_fields', esc_html__('Additional settings', 'rigel'), 'rigel_extra_fields_for_portfolio', 'portfolio', 'normal', 'high'  );
	add_meta_box( 'extra_fields', esc_html__('Additional settings', 'rigel'), 'rigel_extra_fields_for_pages', 'page', 'normal', 'high'  );
}
@the_post_thumbnail();
@wp_link_pages( $args );
@comments_template( $file, $separate_comments );

//Extra Field for Pages
function rigel_extra_fields_for_pages( $post ){
?>
    <h4><?php esc_html_e('You can use any sidebar, just choose it' , 'rigel'); ?></h4>
    <?php global $wp_registered_sidebars;
  	?>
    <select name="extra[sidebarss]">
    <?php foreach ($wp_registered_sidebars as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, esc_html__('sidebars', 'rigel'), 1)) { echo esc_html_e('selected','rigel');} ?> value="<?php echo esc_attr($val['name']); ?>"><?php echo esc_attr($val['name']); ?></option>
	<?php } ?>
    </select>
    <br>
  <h4><?php esc_html_e('SideBar Position', 'rigel'); ?></h4>
  <select name="extra[sidebarss_position]">
  	<?php
	$rigel_sidebars_position = array (
		"rs"  => array("name" => esc_html__("Right Sidebar", 'rigel')),
		"ls"  => array("name" => esc_html__("Left Sidebar", 'rigel')),
	);
	?>
    <?php foreach ($rigel_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'sidebarss_position', 1)) { echo esc_html_e('selected','rigel');} ?> value="<?php echo esc_attr($val['name']); ?>"><?php echo esc_attr($val['name']); ?></option>
	<?php } ?>
   </select>
   <h4><?php esc_html_e('Show tagline', 'rigel'); ?></h4>
  <select name="extra[tagline_position]">
  	<?php
	$rigel_sidebars_position = array (
		"sh"  => array("name" => esc_html__("Show", 'rigel')),
		"hd"  => array("name" => esc_html__("Hide", 'rigel')),
	);
	?>
    <?php foreach ($rigel_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'tagline_position', 1)) { echo esc_html_e('selected','rigel');} ?> value="<?php echo esc_attr($val['name']); ?>"><?php echo esc_attr($val['name']); ?></option>
	<?php } ?>
   </select>
   <?php }
   
//Extra Field for portfolio
function rigel_extra_fields_for_portfolio( $post ){
	?>
	<h4><?php esc_html_e('Small Description', 'rigel'); ?></h4>
    <textarea rows="10" type="text" name="extra[port-descr]" value="<?php echo esc_attr(get_post_meta($post->ID, 'port-descr', true)); ?>" ><?php echo esc_attr(get_post_meta($post->ID, 'port-descr', true)); ?></textarea>
    <h4><?php esc_html_e('Thumbnail', 'rigel'); ?></h4>
    <select name="extra[rigel_th]">
    <?php $rigel_thumb_array = array(
		'1' => 'rigel-portfolio-squre',
		'2' => 'rigel-portfolio-squrex2',
		'3' => 'rigel-portfolio-wide',
		'4' => 'rigel-portfolio-long'
		);?>
    <?php foreach ($rigel_thumb_array as $val){ ?>
    <option <?php if ($val == get_post_meta($post->ID, 'rigel_th', 1)) { echo esc_html_e('selected','rigel');} ?> value="<?php echo esc_attr($val); ?>"><?php echo esc_attr($val); ?></option>
	<?php } ?>
    </select>
    
    <h4><?php esc_html_e('Hover BG color', 'rigel'); ?></h4>
    <input type="text" name="extra[port-bg]" value="<?php echo esc_attr(get_post_meta($post->ID, 'port-bg', true)); ?>" />
    <h4><?php esc_html_e('Hover TEXT color', 'rigel'); ?></h4>
    <input type="text" name="extra[port-text-color]" value="<?php echo esc_attr(get_post_meta($post->ID, 'port-text-color', true)); ?>" />
    
    <h4><?php esc_html_e('You can upload up to 5 additional images (Optional. For slider)', 'rigel'); ?></h4>
    <div>
    <p>
		<label for="upload_image"><?php esc_html_e('Image 1:', 'rigel'); ?> </label>
		<input id="upload_image" type="text"  name="extra[image]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>	
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(); ?>" />
	<p>
		<label for="upload_image"><?php esc_html_e('Image 2:', 'rigel'); ?> </label>
		<input id="upload_image" type="text"  name="extra[image2]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image2', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>	
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(); ?>" />

	<p>
		<label for="upload_image"><?php esc_html_e('Image 3:', 'rigel'); ?> </label>
		<input id="upload_image" type="text"  name="extra[image3]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image3', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>
    <p>
		<label for="upload_image"><?php esc_html_e('Image 4:', 'rigel'); ?> </label>
		<input id="upload_image" type="text"  name="extra[image4]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image4', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>
    <p>
		<label for="upload_image"><?php esc_html_e('Image 5:', 'rigel'); ?> </label>
		<input id="upload_image" type="text" name="extra[image5]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image5', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>
    </div>
     <h4><?php esc_html_e('Show tagline', 'rigel'); ?></h4>
  <select name="extra[tagline_position]">
  	<?php
	$rigel_sidebars_position = array (
		"sh"  => array("name" => esc_html__("Show", 'rigel')),
		"hd"  => array("name" => esc_html__("Hide", 'rigel')),
	);
	?>
    <?php foreach ($rigel_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'tagline_position', 1)) { echo esc_html_e('selected','rigel');} ?> value="<?php echo esc_attr($val['name']); ?>"><?php echo esc_attr($val['name']); ?></option>
	<?php } ?>
   </select>

<?php };
//Extra Field for Blog
function rigel_extra_fields_for_blog( $post ){
	?>
	<h4>Show tagline</h4>
  <select name="extra[tagline_position]">
  	<?php
	$rigel_sidebars_position = array (
		"sh"  => array("name" => "Show"),
		"hd"  => array("name" => "Hide"),
	);
	?>
    <?php foreach ($rigel_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'tagline_position', 1)) { echo esc_html_e('selected','rigel');} ?> value="<?php echo esc_attr($val['name']) ?>"><?php echo esc_attr($val['name']) ?></option>
	<?php } ?>
   </select>
<h4><?php esc_html_e('You can upload up to 5 additional images (Optional. For Gallery)', 'rigel'); ?></h4>
    <div>
    <p>
		<label for="upload_image"><?php esc_html_e('Image 1:', 'rigel'); ?> </label>
		<input id="upload_image" type="text"  name="extra[image]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>	
	<input type="hidden" name="extra_fields_nonce" value="<?php echo esc_attr(wp_create_nonce()); ?>" />
	<p>
		<label for="upload_image"><?php esc_html_e('Image 2:', 'rigel'); ?> </label>
		<input id="upload_image" type="text"  name="extra[image2]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image2', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>	
	<input type="hidden" name="extra_fields_nonce" value="<?php echo esc_attr(wp_create_nonce()); ?>" />

	<p>
		<label for="upload_image"><?php esc_html_e('Image 3:', 'rigel'); ?> </label>
		<input id="upload_image" type="text"  name="extra[image3]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image3', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>
    <p>
		<label for="upload_image"><?php esc_html_e('Image 4:', 'rigel'); ?> </label>
		<input id="upload_image" type="text"  name="extra[image4]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image4', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>
    <p>
		<label for="upload_image"><?php esc_html_e('Image 5:', 'rigel'); ?> </label>
		<input id="upload_image" type="text" name="extra[image5]" value="<?php echo esc_attr(get_post_meta($post->ID, 'image5', true)); ?>" />
		<input class="upload_image_button" type="button" value="<?php esc_html_e('Upload', 'rigel'); ?>" /><br/>

	</p>
    </div>
<?php }
//Save Extra Fields
add_action('save_post', 'rigel_extra_fields_update', 0);


function rigel_extra_fields_update( $post_id ){
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; 
	if ( !current_user_can('edit_post', $post_id) ) return false; 
	if( !isset($_POST['extra']) ) return false;	
	
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) )	delete_post_meta($post_id, $key);
		update_post_meta($post_id, $key, $value);
	}
	return $post_id;
}

function rigel_upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_template_directory_uri().'/framework/js/custom_uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}
add_action('admin_enqueue_scripts', 'rigel_upload_scripts'); 

function rigel_upload_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_enqueue_scripts', 'rigel_upload_styles');

/**
* Custom widgets
**/
add_filter('wp_list_categories', 'rigel_add_span_cat_count');
function rigel_add_span_cat_count($links) {
$links = str_replace('</a> (', '</a> <span class="rigel_cat_count">', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}
add_filter('wp_list_archive', 'rigel_add_spann_cat_count');
function rigel_add_spann_cat_count($links) {
$links = str_replace('</a> (', '</a> <span class="rigel_cat_count">', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}

function rigel_tcr_tag_cloud_filter($args = array()) {
    $args['smallest'] = 8;
    $args['largest'] = 14;
    $args['unit'] = 'pt';
    return $args;
}
add_filter('widget_tag_cloud_args', 'rigel_tcr_tag_cloud_filter', 90);

//PAGINATION
function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  $a = array();
  if (!$current = get_query_var('paged')) $current = 1;
  
  if( !empty($wp_query->query_vars['s']) ) {
	   $a['add_args'] = array( 's' => str_replace(" ","+",get_query_var('s')), 'post_type' => get_query_var('post_type'));
  }
  
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; 
  $a['mid_size'] = '3'; 
  $a['end_size'] = '1'; 
  $a['prev_text'] = esc_html__('Back', 'rigel'); 
  $a['next_text'] = esc_html__('Next', 'rigel'); 
  $a['total'] = $wp_query->max_num_pages;

  echo  wp_kses_post(paginate_links($a));
}



?>