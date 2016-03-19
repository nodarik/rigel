<?php	 		 		 		 		 		 	


add_shortcode('username', 'username_f');
function username_f( $atts, $content = null)
{
	$current_user = wp_get_current_user();
$roles = $current_user->roles;
$role = array_shift($roles);
$rigel_username = $current_user->user_login;
$rigel_userid = $current_user->ID;

		extract(shortcode_atts(
        array(), $atts));

	if(!empty( $rigel_username)){
	$output = $rigel_username;
	}else {$output = esc_html__('Customer', "rigel");};
	return $output;


}

add_shortcode('blog_i', 'theme_blog_i');

function theme_blog_i( $atts, $content = null)
{

	extract(shortcode_atts(
        array(
			'show_posts' => '1',
			'header' => 'My blog title',
			'cat' => ''
    ), $atts));
	
	if($content) { $output .= '<p>'.theme_remove_autop(stripslashes($content)).'</p>'."\n"; }
	$output .= '<div id="masorny_blog">'.theme_blog_loop_i($show_posts, $header, $cat).'</div>';
	return $output;

}

function theme_blog_loop_i($show_posts, $header, $cat)
{

	$query =  new WP_Query(array('category_name' => $cat, 'post_type' => 'post', 'showposts' => $show_posts, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
			
		$post_id = get_the_id();
		$default_url= get_template_directory_uri();
		$format = get_post_format();
		echo '<div  ';
		post_class('masorny_block col-md-4');
		echo ' id="post-'.$post_id.'">'."\n";
		echo ' <div>'."\n";
        echo '<div class="rigel_blog_item rigel_blog_shortcode">'."\n";
		get_template_part('framework/post-format/format-short',$format);
		echo '</div>'."\n";
        echo '</div>'."\n";
		echo '</div>'."\n";
	}
	wp_reset_postdata();
	return ob_get_clean();
}











add_shortcode('news', 'theme_news_i');

function theme_news_i( $atts, $content = null)
{

	extract(shortcode_atts(
        array(
			'show_posts' => '1',
			'header' => 'My blog title',
			'cat' => ''
    ), $atts));
	
	$output ='';
	if($content) { $output .= '<p>'.theme_remove_autop(stripslashes($content)).'</p>'."\n"; }
	$output .= '<ul class="news_holred">'.theme_news_loop_i($show_posts, $header, $cat).'</ul>';
	return $output;

}

function theme_news_loop_i($show_posts, $header, $cat)
{

	$query =  new WP_Query(array('category_name' => $cat, 'post_type' => 'post', 'showposts' => $show_posts, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
			
		$post_id = get_the_id();
		$default_url= get_template_directory_uri();
		$format = get_post_format();
		echo '<li  ';
		post_class();
		echo ' id="post-'.$post_id.'">'."\n";
		echo ' <div>'."\n";
        echo '<div class="rigel_blog_item rigel_blog_shortcode">'."\n";
		get_template_part('framework/post-format/news',$format);
		echo '</div>'."\n";
        echo '</div>'."\n";
		echo '</li>'."\n";
	}
	wp_reset_postdata();
	return ob_get_clean();
}














add_shortcode('port_i', 'theme_port_i');

function theme_port_i( $atts, $content = null)
{

	extract(shortcode_atts(
        array(
			'show_posts' => '1',
			'header' => 'My blog title',
			'cat' => ''
    ), $atts));
	$output= '';
	
	if($content) { $output .= '<p>'.theme_remove_autop(stripslashes($content)).'</p>'."\n"; }
	$output .= '<div class="rigel_short_port_holder">'.theme_port_loop_i($show_posts, $header, $cat).'</div>';
	return $output;

}

function theme_port_loop_i($show_posts, $header, $cat)
{

	$query =  new WP_Query(array('category_name' => $cat, 'post_type' => 'portfolio', 'showposts' => $show_posts, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
		
			
		$post_id = get_the_id();
		$default_url= get_template_directory_uri();
		$format = get_post_format();
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-squre');

		$catt = get_the_terms( $post_id, 'portfolio-category' );
			if (isset($catt) && ($catt!='')){
				$slugg = '';
				$slug = ''; 
				foreach($catt  as $vallue=>$key){
					$slugg .= strtolower($key->slug) . " ";
					$slug  .= ''.$key->name.', ';
				}
				
			};
		
		
		echo '<div class="rigel_strange_portfolio_item rigel_col-md-3">'."\n";
			echo '<a href="'.get_the_permalink().'">'."\n";
			echo '<img class="img-responsive" style="width:100%;" src="'. esc_url($large_image_url[0]).'" alt="" />'."\n";
			echo '<div class="rigel_mask" style="background:'.get_post_meta($post_id, 'port-bg', 1).'">'."\n";
				echo '<h4 class="rigel_port_title" style="color:'.get_post_meta($post_id, 'port-text-color', 1).'">'. get_the_title($post_id).'</h4>'."\n";
				echo '<div class="rigel_small_descr" style="color:'.get_post_meta($post_id, 'port-text-color', 1).'">'.get_post_meta($post_id, 'port-descr', 1).'</div>'."\n";
				echo '<div class="rigel_port_cats" style="color:'.get_post_meta($post_id, 'port-text-color', 1).'">'."\n";
				  echo substr($slug, '0', '-2');
				echo '</div>'."\n";
			echo '</div>'."\n";
			echo '</a>'."\n";
		echo '</div>'."\n";
		
		
		
	}
	wp_reset_postdata();
	return ob_get_clean();
}







add_shortcode('testimonials_i', 'theme_testimonials_i');

function theme_testimonials_i( $atts, $content = null)
{

	extract(shortcode_atts(
        array(
			'show_posts' => '1',
			'header' => 'My blog title',
			'cat' => ''
    ), $atts));
	
	$output ='';
	if($content) { $output .= '<p>'.theme_remove_autop(stripslashes($content)).'</p>'."\n"; }
	$output .= '<ul class="bxslider">'.theme_testimonials_loop_i($show_posts, $header, $cat).'</ul>';
	return $output;

}

function theme_testimonials_loop_i($show_posts, $header, $cat)
{

	$query =  new WP_Query(array('category_name' => $cat, 'post_type' => 'testimonials', 'showposts' => $show_posts, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
			
		$post_id = get_the_id();
		$default_url= get_template_directory_uri();
		$format = get_post_format();
		echo '<li  ';
		post_class('');
		echo ' id="post-'.$post_id.'">'."\n";
		echo ' <div>'."\n";
        echo '<div class="">'."\n";
		get_template_part('framework/post-format/format-testimonials',$format);
		echo '</div>'."\n";
        echo '</div>'."\n";
		echo '</li>'."\n";
	}
	wp_reset_postdata();
	return ob_get_clean();
}





add_shortcode('testimonials_ii', 'theme_testimonials_ii');

function theme_testimonials_ii( $atts, $content = null)
{

	extract(shortcode_atts(
        array(
			'show_posts' => '1',
			'header' => 'My blog title',
			'cat' => ''
    ), $atts));
	
	$output ='';
	if($content) { $output .= '<p>'.theme_remove_autop(stripslashes($content)).'</p>'."\n"; }
	$output .= '<ul class="testimonilal2_ul">'.theme_testimonials_loop_ii($show_posts, $header, $cat).'</ul>';
	return $output;

}

function theme_testimonials_loop_ii($show_posts, $header, $cat)
{

	$query =  new WP_Query(array('category_name' => $cat, 'post_type' => 'testimonials', 'showposts' => $show_posts, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
			
		$post_id = get_the_id();
		$default_url= get_template_directory_uri();
		$format = get_post_format();
		echo '<li  ';
		post_class('');
		echo ' id="post-'.$post_id.'">'."\n";
		echo ' <div>'."\n";
        echo '<div class="">'."\n";
		get_template_part('framework/post-format/format-testimonials2',$format);
		echo '</div>'."\n";
        echo '</div>'."\n";
		echo '</li>'."\n";
	}
	wp_reset_postdata();
	return ob_get_clean();
}
















function pricet_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE', "btn" => 'Register', "price" => '$25', "url" => 'http://www.google.com'), $atts));
	
	$code = '
			<div class="price">
				<div class="well">
					<h6 class="sep_bg"><span class="label label-inverse">'.$title.'</span></h6>
					<h1><p class="label label-inverse">'.$price.'</p></h1>
					'.$content.'
					<p style="margin-bottom:0px;"><a class="btn btn-small" href="'.$url.'">'.$btn.'</a></p>
				</div>
			</div>
	';
	return $code;
}
add_shortcode('pricet', 'pricet_f');



function active_pricet_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE', "btn" => 'Register', "price" => '$25', "url" => 'http://www.google.com'), $atts));
	
	$code = '
			<div class="price price-active">
				<div class="well">
					<h6 class="sep_bg"><span class="label label-inverse">'.$title.'</span></h6>
					<h1><p class="label label-inverse">'.$price.'</p></h1>
					'.$content.'
					<p style="margin-bottom:0px;"><a class="btn btn-small" href="'.$url.'">'.$btn.'</a></p>
				</div>
			</div>
	';
	return $code;
}
add_shortcode('active_pricet', 'active_pricet_f');





function visible_desktop_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="visible-desktop">'.do_shortcode($content).'</div>
	';
	return $code;
}
add_shortcode('visible_desktop', 'visible_desktop_f');


function hidden_tablet_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="hidden-tablet">'.do_shortcode($content).'</div>
	';
	return $code;
}
add_shortcode('hidden_tablet', 'hidden_tablet_f');





function vbg_f($atts, $content = null) {
	extract( shortcode_atts( array(  
	"poster_content" => '<h2>A7 Wireless Music Sytem</h2><p>How does A7 deliver the best quality in audio, wirelessly?</p>',
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	'webm_format' => 'http://radiuzz.com/video/demo.webm',
	'ogv_format' => 'http://radiuzz.com/video/demo.ogv',
	'mp4_format' => 'http://radiuzz.com/video/demo.mp4',
	), $atts));
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	$code = '
			<div class="rigel_video_bg" style="background:#fdfdfd;">
				<div class="mute_unmute_play_pause">
					<a class="pause_video"  style="display:none;"></a>
					<a class="play_video"></a>
					<a class="muted"></a>
					<a class="un_muted" style="display:none;"></a>
					<a class="full_screen" style=""></a>
				</div>
				
				<div class="poster_block" style="background-image:url('.$image_done1.')"></div>
				<div class="vbg_poster_controls" style="visibility: visible">
				'.$poster_content.'
				</div>
				
				<div class="vid_bg_content">
					'.do_shortcode($content).'
				</div>
				
				<video class="video_background" preload="auto" loop="loop" volume="0">
				   <source src="'.$webm_format.'" type="video/webm"/>
				   <source src="'.$ogv_format.'" type="video/ogg ogv"; codecs="theora, vorbis"/>
				   <source src="'.$mp4_format.'" type="video/mp4"/>               
				</video>
			</div>';
	return $code;
}
add_shortcode('vbg', 'vbg_f');








function vbgg_f($atts, $content = null) {
	extract( shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	'webm_format' => 'http://radiuzz.com/video/mb.webm',
	'ogv_format' => 'http://radiuzz.com/video/mb.ogv',
	'mp4_format' => 'http://radiuzz.com/video/mb.mp4',
	), $atts));
	
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	$code = '
			<div class="rigel_video_bg vid_bgg" style="background:#fdfdfd;">
				<div class="vid_bg_content">
					<div class="ipad_bg" style="background-image:url('.$image_done1.')">
					</div>
					'.do_shortcode($content).'
				</div>
				<div class="vbgg">
					<video preload="auto" loop="loop" autoplay="autoplay" volume="0">
					   <source src="'.$webm_format.'" type="video/webm" codecs=vp8,vorbis"/>
					   <source src="'.$ogv_format.'" type="video/ogg"; codecs="theora, vorbis"/>
					   <source src="'.$mp4_format.'" type="video/mp4"/> 
					</video>
				</div>
			</div>';
	return $code;
}
add_shortcode('vbgg', 'vbgg_f');




function toggle1_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle1">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec1">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle1', 'toggle1_f');




function toggle2_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle2">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec2">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle2', 'toggle2_f');







function toggle3_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle3">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec3">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle3', 'toggle3_f');









function toggle4_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle4">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec4">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle4', 'toggle4_f');








function toggle5_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle5">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec5">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle5', 'toggle5_f');








function toggle6_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle6">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec6">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle6', 'toggle6_f');









function toggle7_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle7">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec7">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle7', 'toggle7_f');








function toggle8_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle8">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec8">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle8', 'toggle8_f');








function toggle9_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle9">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec9">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle9', 'toggle9_f');







function toggle10_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle10">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec10">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle10', 'toggle10_f');









function toggle11_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle11">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec11">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle11', 'toggle11_f');








function toggle12_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle12">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec12">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle12', 'toggle12_f');







function toggle13_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle13">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec13">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle13', 'toggle13_f');









function toggle14_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle14">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec14">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle14', 'toggle14_f');








function toggle15_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle15">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec15">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle15', 'toggle15_f');








function toggle16_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle16">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec16">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle16', 'toggle16_f');







function toggle17_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle17">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec17">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle17', 'toggle17_f');








function toggle18_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle18">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec18">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle18', 'toggle18_f');








function toggle19_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle19">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec19">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle19', 'toggle19_f');








function toggle20_f($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'SOME TITLE'), $atts));
	
	$code = '
			<h5><a href="#" class="toggle-header" id="toggle20">'.$title.'</a></h5>
			<div class="toggle-content" style="display:none" id="togglec20">'.$content.'</div>
	';
	return $code;
}
add_shortcode('toggle20', 'toggle20_f');











function h1_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h1 class="sep_bg">'.do_shortcode($content).'</h1>
	';
	return $code;
}
add_shortcode('h1', 'h1_f');


function h2_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h2 class="sep_bg">'.do_shortcode($content).'</h2>
	';
	return $code;
}
add_shortcode('h2', 'h2_f');


function h3_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h3 class="sep_bg">'.do_shortcode($content).'</h3>
	';
	return $code;
}
add_shortcode('h3', 'h3_f');


function h4_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h4 class="sep_bg">'.do_shortcode($content).'</h4>
	';
	return $code;
}
add_shortcode('h4', 'h4_f');



function h5_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h5 class="sep_bg">'.do_shortcode($content).'</h5>
	';
	return $code;
}
add_shortcode('h5', 'h5_f');


function h6_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h6 class="sep_bg">'.do_shortcode($content).'</h6>
	';
	return $code;
}
add_shortcode('h6', 'h6_f');




function vc_lightbox_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	), $atts));
	
	
		$image_done = wp_get_attachment_url($image,'full vc_team_member_image');
	 
		$code = '
		<div class="rigel_with_mask_no_url">
		<a rel="prettyPhoto" class="rigel_pretty_image_link" title="" href="'.$image_done.'"><div class="rigel_pretty_image_link_plus"></div></a>
		<img src="'.$image_done.'" alt="" />
		</div>
		';

		return $code;
}
add_shortcode('vc_lightbox', 'vc_lightbox_f');





function c_break_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'h' => '100%',
	'bg' => '',
	'color' => '',
	'image' => '',
	'border' => ' trancperent',
	'fixed'=> '1',
	'm_t' => '0',
	'm_b' => '0',
	'p_t' => '0',
	'p_b' => '0',
	'extraclass' => ''
	
	), $atts));
	
		$code = '';
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	
	if($fixed == "1") $code = '</div></div></div></div>
	<div class="'.$extraclass.'" style="height: '.$h.'; margin-top:'.$m_t.'; margin-bottom:'.$m_b.'; padding-top:'.$p_t.'; padding-bottom:'.$p_b.'; width: 100%; background-color: '.$bg.'; background-image:url('.$image_done1.'); background-position:center center; border-top: 1px solid '.$border.'; border-bottom: 1px solid '.$border.';">
		<div>
			<div class="rigel_break container"><span style="color:'.$color.'">'.do_shortcode($content).'</span></div>
		</div>
	</div>
		<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	
	
	
	if($fixed == "0") $code = '</div></div></div></div>
	<div class="'.$extraclass.'" style="height: '.$h.'; margin-top:'.$m_t.'; margin-bottom:'.$m_b.'; padding-top:'.$p_t.'; padding-bottom:'.$p_b.'; width: 100%; background-color: '.$bg.'; background-image:url('.$image_done1.'); background-position:center center;  border-top: 1px solid '.$border.'; border-bottom: 1px solid '.$border.'; ">
		<div class="rigel_break" style="padding:0px 20px;">
			<span style="color:'.$color.'">'.do_shortcode($content).'</span>
		</div>
	</div>
	<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	return $code;
}
add_shortcode('c_break', 'c_break_f');






function c_break_simple_bg_break_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	'h' => '350px',
	'bg' => '',
	'color' => '',
	'bgcolor' => '#e9e8e4',
	'border' => ' trancperent',
	'fixed'=> '1',
	'first' => '0',
	'last' => '0'
	
	), $atts));
	
		$code = '';
	
	if($first == '1') 
	{
		$first1 = '-41px';
	}else $first1 = '50px';
	
	if($last== '1') 
	{
		$last1 = '-40px';
	}else $last1 = '40px';
	
	if($last== '1') 
	{
		$laststyle = '<style>.footer {margin-top:0px;}</style>';
	}else $laststyle = '';
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	$code = '</div></div></div></div>
	<div style=" width: 100%; margin-top:'.$first1.'; margin-bottom: '.$last1.'">
		<div class="rigel_break">
			'.$laststyle.'
			<div class="simple_bg_break" style="height: '.$h.';">
				<div class="simple_bg_break_img_holder" style="background-image:url('.$image_done1.'); height: '.$h.';">
				</div>
				<div class="simple_bg_break_content_holder" style="height: '.$h.'; background:'.$bgcolor.';">
					<div class="simple_bg_break_content_holder_div" style="color:'.$color.'; ">
						'.do_shortcode($content).'
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	return $code;
}
add_shortcode('c_break_simple_bg_break', 'c_break_simple_bg_break_f');






function c_break_full_paralax_break_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/framework/images/vc_image.jpg',
	'h' => '350px',
	'bg' => '',
	'bgposition' => '3',
	'bgcolor' => '#e9e8e4',
	'border' => ' trancperent',
	'fixed'=> '1',
	'extraclass' => '',
	'm_t' => '0',
	'm_b' => '0',
	'p_t' => '0',
	'p_b' => '0',
	
	), $atts));
	
		$code = '';
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	if($fixed == "1") $code = '</div></div></div></div>
	<div class=" '.$extraclass.'" style=" width: 100%; margin-top:'.$m_t.'; margin-bottom: '.$m_b.';">
		<div class="home_paralax" style="background-image:url('.$image_done1.'); !important; padding-top:'.$p_t.'; padding-bottom:'.$p_b.'" data-type="background" >
			<div class="main_content_area" style="padding:0px;">
				<div class="container rigel_break">
					'.do_shortcode($content).'
				</div>
			</div>
		</div>
			
	</div>
	<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	
	
	
	
	if($fixed == "0") $code = '</div></div></div></div>
	<div class=" '.$extraclass.'" style=" width: 100%; margin-top:'.$m_t.'; margin-bottom: '.$m_b.';">
		<div class="home_paralax" style="background-image:url('.$image_done1.');  !important;  padding-top:'.$p_t.'; padding-bottom:'.$p_b.'" data-type="background">
			<div class="rigel_break">
				'.do_shortcode($content).'
			</div>
		</div>
			
	</div>
	<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="col-md-12">';
	
	
	return $code;
}
add_shortcode('c_break_full_paralax_break', 'c_break_full_paralax_break_f');










function c_break_half_paralax_break_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	'h' => '',
	'bg' => '',
	'bgposition' => '3',
	'bgcolor' => '#e9e8e4',
	'border' => ' trancperent',
	'fixed'=> '0',
	'first' => '0',
	'last' => '0',
	'padding' => '60px',
	
	
	), $atts));
	
		$code = '';
	
	if($first == '1') 
	{
		$first1 = '-41px';
	}else $first1 = '50px';
	
	if($last== '1') 
	{
		$last1 = '-40px';
	}else $last1 = '20px';
	
	
	if($last== '1') 
	{
		$laststyle = '<style>.footer {margin-top:0px;}</style>';
	}else $laststyle = '';
	
	
	if($last== '1') 
	{
		$lastclass = 'last_class';
	}else $lastclass ='';
	
	
	
	$image_done = wp_get_attachment_image_src($image,'full');
	$image_done1 = "'".$image_done[0]."'";
	
	
	if($fixed == "0") $code = '</div></div></div></div>
	<div class="'.$lastclass.' rigel_half_paralxx" style=" width: 100%; margin-top:'.$first1.'; margin-bottom: '.$last1.' !important;">
	'.$laststyle.'
		<div style="height: '.$h.';" class="rigel_half_paralxx_cont">
			<div class="rigel_break">
			
				<div class="simple_bg_break" style="height: '.$h.';">
					<div class="simple_bg_break_img_holder home_paralax" style="background-image:url('.$image_done1.'); height: '.$h.' !important;" data-type="background" data-speed="'.$bgposition.'">
					</div>
					<div class="simple_bg_break_content_holder" style="height: '.$h.'; background:'.$bgcolor.';">
						<div class="simple_bg_break_content_holder_div" style="color:'.$color.'; padding:'.$padding.' ">
							'.do_shortcode($content).'
						</div>
					</div>
				</div>
				
			
			</div>
		</div>
			
	</div>
	<div class="main_content_area">
		<div class="container">
			<div class="row">
            	<div class="span12">';
	
	
	return $code;
}
add_shortcode('c_break_half_paralax_break', 'c_break_half_paralax_break_f');
















function vc_team_member_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	'name'=> 'Jhon Doe',
	'position'=>'My Position In Company',
	'welcome'=>'',
	'fb_url'=>'',
	'tw_url'=>'',
	'gplus_url'=>'',
	'in_url'=>'',
	'mail_url'=>'',
	), $atts));
	
	 if ($fb_url == ''){$fb ='';} else { $fb = '<a class="fa fa-facebook" target="_blank" href="'.$fb_url.'"></a>';};
	 if ($tw_url == ''){$tw ='';} else { $tw = '<a class="fa fa-twitter" target="_blank" href="'.$tw_url.'"></a>';};
	 if ($gplus_url == ''){$gplus ='';} else { $gplus = '<a target="_blank" class="fa fa-google-plus" href="'.$gplus_url.'"></a>';};
	 if ($in_url == ''){$in ='';} else { $in = '<a class="fa  fa-linkedin" target="_blank" href="'.$in_url.'"></a>';};
	 if ($mail_url == ''){$mail ='';} else { $mail = '<a class="fa fa-envelope-o" href="mailto:'.$mail_url.'"></a>';};
	 
 	 if ($welcome == ''){$welcome1 ='';} else { $welcome1 = '<h5><span>'.$welcome.'</span></h5>';};

	 $ulrs = ''.$fb.''.$tw.''.$gplus.''.$in.''.$mail.'';
  	 if (($welcome == '')&& ($ulrs == '')){$main_cont ='';} else { $main_cont = '
	 <div class="rigel_mask_holder">
		<div class="rigel_mask">
			'.$welcome1.'
			<div class="rigel_icons">'.$ulrs.'</div>
		</div>
	</div>';};

	
	 $image_done = wp_get_attachment_image($image,'full vc_team_member_image');
	 
	 
	 $code = '<div class="vc_team_member_holder">
	 			<div class="vc_team_member_image_holder">
					<div class="inner_img_holder">
						'.$image_done.'
					</div>
					'.$main_cont.'
				</div>
				<div class="clearfix"></div>
				<div class="rigel_cont_holder">
					<h4>'.$name.'</h4>
					<h5>'.$position.'</h5>
					<div class="rigel_team_cont">'.$content.'</div>
			 	</div>
			 </div>';

	return $code;
}
add_shortcode('vc_team_member', 'vc_team_member_f');






function vc_rigel_gallery_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'images'=> array(''),
	), $atts));
	
	 $attachments = explode(',', $images);
	 $code = '<div id="port_slider" class="flexslider rigel_flex_loading rigel_vc_gal">
				<ul class="slides">';
	 	 foreach ( $attachments as $attachment_id ) {
			$src = wp_get_attachment_image_src( $attachment_id,'full' );;
			$code .= '<li><img src="'.$src[0].'"/></li>';
		}
		
		$code .= '</ul></div>';
	//return $code;
	return $code;
}
add_shortcode('vc_rigel_gallery', 'vc_rigel_gallery_f');










function vc_price_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'price_spec'=> '0',
	'price_title'=> 'Business Plan',
	'price_amount'=> '10',
	'price_cur'=>'$',
	'price_date'=>'per month',
	'price_head_bg'=>'#ff5c00',
	'price_title_color'=>'#ffffff',
	'text_on_button'=>'Order Now',
	'url_on_button'=>'#',
	), $atts));
	
	if ($price_spec == '1'){ $spec = 'spec';} else{ $spec = '';};
	 
	 $code = 
	 '<div class="rigel_price_holder '.$spec.'">
	 	<div class="rigel_price_head_holder" style="background-color:'.$price_head_bg.'">
			<div class="rigel_price_head">
				<h4 style="color:'.$price_title_color.' !important">'.$price_title.'</h4>
			</div>
			<div class="rigel_price_price">
				<h1 class="page-title" style="color:'.$price_title_color.' !important">'.$price_amount.'<span>'.$price_cur.'</span></h1>
				<h5 style="color:'.$price_title_color.' !important">'.$price_date.'</h5>
			</div>
		</div>
		<div class="unstyled rigel_price_ul">
		'.do_shortcode($content).'
		</div>
		<div class="rigel_price_order">
			<a class="btn rigel_submit rigel_reverse_btn" href="'.$url_on_button.'">'.$text_on_button.'</a>
		</div>
	 </div>
	 ';

	return $code;
}
add_shortcode('vc_price', 'vc_price_f');












function box_holder_f($atts, $content = null) {
	extract(shortcode_atts( array(
	), $atts));
	 $code = '<div class="row-fluid">
	 			'.do_shortcode($content).'
			 </div>';

	return $code;
}
add_shortcode('box_holder', 'box_holder_f');



function box_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon_bg' => '',
	'bg' => '',
	'color' => '',
	'border' => '#f1f1f1',
	'icon'=> '1',
	'columns' => '0'
	), $atts));
	
	
	if($columns == '3'){$columns1 = 'span4';}
	elseif($columns == '2'){$columns1 = 'span6';}
	elseif($columns == '4'){$columns1 = 'span3';}
	elseif($columns == '1'){$columns1 = 'span12';}
	
	 $code = '<div class="'.$columns1.'">
	 			<div class="rigel_box" style=" background:'.$bg.'; border:1px solid '.$border.'; color:'.$color.' !important;"><div class="icon_holder" style="background:'.$icon_bg.'; "><img class="rigel_box_icon" src="'.$icon.'" alt=""></div>'.do_shortcode($content).'</div>
			</div>
			 ';

	return $code;
}
add_shortcode('box', 'box_f');


function vc_box_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon_bg' => '#ff5c00',
	'bg' => '#f6f6f6',
	'color' => '',
	'border' => '#ededed',
	'icon'=> '#',
	'title'=> 'The Box Title',
	), $atts));
	
	
	
	 $code = '<div class="rigel_box" style=" background:'.$bg.'; border:1px solid '.$border.'; color:'.$color.' !important;"><div class="icon_holder" style="background:'.$icon_bg.'; "><img class="rigel_box_icon" src="'.$icon.'" alt=""></div><h3 clas="small_width" style="color:'.$color.' !important;">'.$title.'</h3>'.do_shortcode($content).'</div>';

	return $code;
}
add_shortcode('vc_box', 'vc_box_f');



function vc_box_ii_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon_bg' => '#ff5c00',
	'bg' => '#ffffff',
	'color' => '',
	'border' => '#ededed',
	'icon'=> '#',
	'title'=> 'The Box Title',
	), $atts));
	
	
	
	 $code = '<div class="rigel_box_ii" style=" background:'.$bg.'; border:1px solid '.$border.'; color:'.$color.' !important;"><div class="icon_holder_ii" style="background:'.$icon_bg.'; "><img class="rigel_box_icon" src="'.$icon.'" alt=""></div><h3 clas="small_width" style="color:'.$color.' !important;">'.$title.'</h3>'.do_shortcode($content).'</div>';

	return $code;
}
add_shortcode('vc_box_ii', 'vc_box_ii_f');



function vc_box_iii_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon'=> '#',
	'title'=> 'The Box Title',
	), $atts));
	
	
	
	 $code = '<div class="rigel_box_iii">
	 			<div class="icon_holder_iii">
					<img class="rigel_box_icon_iii" src="'.$icon.'" alt="">
					<h3>'.$title.'</h3>
				</div>
				<div class="clearfix"></div>
				'.do_shortcode($content).'
			 </div>';

	return $code;
}
add_shortcode('vc_box_iii', 'vc_box_iii_f');


function vc_box_iv_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'icon'=> 'fa fa-ban',
	'title'=> 'The Box Title',
	'iconcolor'=> '#fff',
	'bgcolor'=> '#000',
	'titlecolor' => '#666',
	'titlelink' => '#'
	), $atts));
	
	
	
	 $code = '<div class="rigel_box_iv">
				<a href="'.$titlelink.'" target="_blank"><div class="icon_holder_iv" style="background:'.$bgcolor.'">
					<span class="rigel_box_icon_iv colored fa '.$icon.'" style="color:'.$iconcolor.'"></span>
				</div></a>
				<div class="cont_holder_iv"><a href="'.$titlelink.'" target="_blank"><h4 style="color:'.$titlecolor.'">'.$title.'</h4></a>'.do_shortcode($content).'</div>
			 </div>
			 <div class="clearfix"></div>';

	return $code;
}
add_shortcode('vc_box_iv', 'vc_box_iv_f');




function rotated_text_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'title'=> 'The Box Title',
	), $atts));
		
	
	 $code = '<div class="rot-section-title">
			<div class="rotate-text"><h3>'.$title.'</h3></div>
			<div class="vertical-line"></div>
			</div>';

	return $code;
}
add_shortcode('rotated_text', 'rotated_text_f');















function achievements_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'title'=> 'The Box Title',
	'color'=> '',
	), $atts));
	
	
	
	 $code = '<div class="achievements">
				<h4>'.do_shortcode($content).'</h4>
				<h3 style="color:'.$color.' !important;">'.$title.'</h3>
				
			 </div>';

	return $code;
}
add_shortcode('achievements', 'achievements_f');






function testimonial_i_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'bg' => '#ffffff',
	'color' => '',
	'date' => '',
	'border' => '#ededed',
	'image'=> '#',
	'image_style'=> '1',
	'title'=> 'Some Author',
	'rating'=> '1',
	'company'=> 'Some Company',
	'company_url'=> '#'
	), $atts));
	
	if($rating == '0') 
	{$rating1 = '0px';
	}
	if($rating == '1') 
	{$rating1 = '20px';
	}
	elseif($rating == '2'){
	$rating1 = '40px';
	}elseif($rating == '3'){
	$rating1 = '60px';
	}elseif($rating == '4'){
	$rating1 = '80px';
	}elseif($rating == '5'){
	$rating1 = '100px';
	}
	
	if($image_style == '1') 
	{$image_style1 = 'img-circle';
	}
	elseif($image_style == '2'){
	$image_style1 = 'img-rounded';
	$margin_zero = 'style="margin-top:0px !important"';
	}elseif($image_style == '3'){
	$image_style1 = 'img-polaroid';
	$margin_zero = 'style="margin-top:0px !important"';
	}
	
	
$code = '
	<div>
	<div class="testimonial_i" style=" background:'.$bg.'; border:1px solid '.$border.'; color:'.$color.' !important;">
		<div class="row">
			<div class="col-md-3">
				<div class="image_holder_i">
					<img class="testimonial_i_image '.$image_style1.'" src="'.$image.'" alt="">
				</div>
			</div>
			<div class="col-md-9">
				<div class="testimonial_i_holder"  '.$margin_zero.'>
					<h3 class="small_width ">'.$title.'</h3>
					<h5 class="small_width" style="color:'.$color.' !important;">'.$date.'</h5>
					<div class="main_testimonial_i">
					'.do_shortcode($content).'
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
						<div class="blank_rating"> </div>
							<div class="star_rating" style="width:'.$rating1.'">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
						</div>
						<div class="col-md-6">
							<div class="t_comapny">
								 <a href="'.$company_url.'" target="_blank" style="color:'.$color.' !important;">'.$company.'</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
';

	return $code;
}
add_shortcode('testimonial_i', 'testimonial_i_f');




function t_break_f($atts, $content = null) {
	extract(shortcode_atts( array(), $atts));
	$code = '</div></div></div></div>
			<div style="background:red">'.do_shortcode($content).'</div>
	<div class="main_content_area">
	<div class="container">';
	return $code;
}
add_shortcode('t_break', 't_break_f');




/* separator */
function veles_separator($atts, $content = null) {
	extract(shortcode_atts(array('margin' => '0px'),$atts));

	return '<div class="separator clear" style="margin-top:'.$margin.'"></div>';
}
add_shortcode('separator', 'veles_separator');





function tslider_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="testimonialslider" style="margin-bottom:20px !important"> 
            <ul class="bxslider">'.do_shortcode($content).'</ul>
			</div>
			
	';
	return $code;
}

add_shortcode('tslider', 'tslider_f');


function ois_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
            <div class="rigel_slider">'.do_shortcode($content).'</div>
			
	';
	return $code;
}

add_shortcode('rigel_slider', 'ois_f');





function ois_ii_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
            <div class="rigel_slider_ii">'.do_shortcode($content).'</div>
			
	';
	return $code;
}

add_shortcode('rigel_slider_ii', 'ois_ii_f');





function row1_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="row">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('row1', 'row1_f');

function row2_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="row">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('row2', 'row2_f');




function row_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="row">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('row', 'row_f');


function span1_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span1">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span1', 'span1_f');


function span2_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span2">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span2', 'span2_f');

function rigel_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	global $woocommerce;
	$code = $woocommerce->show_messages();
	return $code;
}

add_shortcode('mes', 'rigel_f');


function span3_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span3">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span3', 'span3_f');



function span4_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span4">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span4', 'span4_f');



function span5_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span5">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span5', 'span5_f');


function span6_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span6">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span6', 'span6_f');


function span7_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span7">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span7', 'span7_f');


function span8_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span8">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span8', 'span8_f');


function span9_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span9">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span9', 'span9_f');


function span10_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span10">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span10', 'span10_f');


function span11_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span11">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span11', 'span11_f');


function span12_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="span12">'.do_shortcode($content).'</div>
	';
	return $code;
}

add_shortcode('span12', 'span12_f');




function section_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<section>'.do_shortcode($content).'</section>
	';
	return $code;
}

add_shortcode('section', 'section_f');



function mybtn_f($atts, $content = null) {
	extract( shortcode_atts( array(  "url" => '#'), $atts));
	
	$code = '
				<a href="'.do_shortcode($url).'" class="mybutton"><span>'.do_shortcode($content).'</span></a>
	';
	return $code;
}
add_shortcode('mybtn', 'mybtn_f');





function btn_f($atts, $content = null) {
	extract( shortcode_atts( array(  "url" => '#', "size" => '' , "style" => '' ), $atts));
	
	$code = '
				<a href="'.do_shortcode($url).'" class="btn '.do_shortcode($size).' '.do_shortcode($style).'">'.do_shortcode($content).'</a>
	';
	return $code;
}
add_shortcode('btn', 'btn_f');


function icon_f($atts, $content = null) {
	extract( shortcode_atts( array(  "image" => '#', "style" => '' ), $atts));
	
	$code = '
				<i class="'.do_shortcode($image).' '.do_shortcode($style).'"></i>
	';
	return $code;
}
add_shortcode('icon', 'icon_f');


function hr_f($atts, $content = null) {
	extract( shortcode_atts( array( "style" => '' ), $atts));
	
	$code = '
				<hr class="'.do_shortcode($style).'" />
	';
	return $code;
}
add_shortcode('hr', 'hr_f');







function badge_f($atts, $content = null) {
	extract( shortcode_atts( array( "style" => '' ), $atts));
	
	$code = '
				<span class="badge '.do_shortcode($style).'" >'.do_shortcode($content).'</span>
	';
	return $code;
}
add_shortcode('badge', 'badge_f');



function label_f($atts, $content = null) {
	extract( shortcode_atts( array( "style" => '' ), $atts));
	
	$code = '
				<span class="label '.do_shortcode($style).'" >'.do_shortcode($content).'</span>
	';
	return $code;
}
add_shortcode('label', 'label_f');







function alert_f($atts, $content = null) {
	extract( shortcode_atts( array( "style" => '' ), $atts));
	
	$code = '
				<div class="alert '.do_shortcode($style).'" ><a class="close" data-dismiss="alert">&times;</a> '.do_shortcode($content).'</div>
	';
	return $code;
}
add_shortcode('alert', 'alert_f');




function progress_bar_f($atts, $content = null) {
	extract( shortcode_atts( array( "style" => '',"width" => '20%' ), $atts));
	
	$code = '
				<div class="progress progress-striped active '.do_shortcode($style).'" >
					<div class="bar" style="width: '.do_shortcode($width).'" ></div>
				</div>
	';
	return $code;
}
add_shortcode('progress_bar', 'progress_bar_f');









/* width: 940px */
function one_column($atts, $content = null) {
	extract( shortcode_atts( array( "align" => 'left', "margin" => '1', "last" => '0' ), $atts));
	
	$code = '';
	
	if( ($margin == "1") && ($last == "0")) $code ='<div class="span-24">'.do_shortcode($content).'</div>';	
	if( ($margin == "0") && ($last == "1")) $code ='<div class="span-24 notopmargin last">'.do_shortcode($content).'</div>';		
	if( ($last == "1") && ($margin == "1")) $code ='<div class="span-24 last">'.$content.'</div>';	
	if( ($margin == "0")  && ($last == "0")) $code ='<div class="span-24 notopmargin">'.do_shortcode($content).'</div>';		
	
	
	return $code;
}

add_shortcode('one', 'one_column');


/* width: 460px */
function one_half_column($atts, $content = null) {
	extract( shortcode_atts( array( "align" => 'left', "margin" => '1', "last" => '0' ), $atts));
	
	$code = '';
	
	if( ($margin == "1") && ($last == "0")) $code ='<div class="span-12">'.do_shortcode($content).'</div>';	
	if( ($margin == "0") && ($last == "1")) $code ='<div class="span-12 notopmargin last">'.do_shortcode($content).'</div>';		
	if( ($last == "1") && ($margin == "1")) $code ='<div class="span-12 last">'.do_shortcode($content).'</div>';	
	if( ($margin == "0")  && ($last == "0"))$code ='<div class="span-12 notopmargin">'.do_shortcode($content).'</div>';		
	
	
	return $code;
}

add_shortcode('one_half', 'one_half_column');

/* width: 620px */
function two_third_column($atts, $content = null) {
	extract( shortcode_atts( array( "align" => 'left', "margin" => '1', "last" => '0' ), $atts));
	
	$code = '';
	
	if( ($margin == "1") && ($last == "0")) $code ='<div class="span-16">'.do_shortcode($content).'</div>';	
	if( ($margin == "0") && ($last == "1")) $code ='<div class="span-16 notopmargin last">'.do_shortcode($content).'</div>';		
	if( ($last == "1") && ($margin == "1")) $code ='<div class="span-16 last">'.do_shortcode($content).'</div>';	
	if( ($margin == "0")  && ($last == "0")) $code ='<div class="span-16 notopmargin">'.do_shortcode($content).'</div>';		
	
	
	return $code;
}

add_shortcode('two_third', 'two_third_column');


/* width: 300px */
function one_third_column($atts, $content = null) {
	extract( shortcode_atts( array( "align" => 'left', "margin" => '1', "last" => '0' ), $atts));
	
	$code = '';
	
	if( ($margin == "1") && ($last == "0")) $code ='<div class="span-8">'.do_shortcode($content).'</div>';	
	if( ($margin == "0") && ($last == "1")) $code ='<div class="span-8 notopmargin last">'.do_shortcode($content).'</div>';		
	if( ($last == "1") && ($margin == "1")) $code ='<div class="span-8 last">'.do_shortcode($content).'</div>';	
	if( ($margin == "0")  && ($last == "0")) $code ='<div class="span-8 notopmargin">'.do_shortcode($content).'</div>';		
	
	
	return $code;
}

add_shortcode('one_third', 'one_third_column');


/* width: 220px */
function one_fourth_column($atts, $content = null) {
	extract( shortcode_atts( array( "align" => 'left', "margin" => '1', "last" => '0' ), $atts));
	
	$code = '';
	
	if( ($margin == "1") && ($last == "0")) $code ='<div class="span-6">'.do_shortcode($content).'</div>';	
	if( ($margin == "0") && ($last == "1")) $code ='<div class="span-6 notopmargin last">'.do_shortcode($content).'</div>';		
	if( ($last == "1") && ($margin == "1")) $code ='<div class="span-6 last">'.do_shortcode($content).'</div>';	
	if( ($margin == "0")  && ($last == "0")) $code ='<div class="span-6 notopmargin">'.do_shortcode($content).'</div>';		
	
	
	return $code;
}

add_shortcode('one_fourth', 'one_fourth_column');


/* width: 700px */
function three_fourth_column($atts, $content = null) {
	extract( shortcode_atts( array( "align" => 'left', "margin" => '1', "last" => '0' ), $atts));
	
	$code = '';
	
	if( ($margin == "1") && ($last == "0")) $code ='<div class="span-18">'.do_shortcode($content).'</div>';	
	if( ($margin == "0") && ($last == "1")) $code ='<div class="span-18 notopmargin last">'.do_shortcode($content).'</div>';		
	if( ($last == "1") && ($margin == "1")) $code ='<div class="span-18 last">'.do_shortcode($content).'</div>';	
	if( ($margin == "0")  && ($last == "0")) $code ='<div class="span-18 notopmargin">'.do_shortcode($content).'</div>';		
	
	
	return $code;
}

add_shortcode('three_fourth', 'three_fourth_column');
/* END COLUMNS */


function welcome_f($atts, $content = null) {
	extract( shortcode_atts( array(  "header" => '' ), $atts));
	
	$code = '
				<h1 class="sep_bg welcome2">'.do_shortcode($content).'</h1>
	';
	return $code;
}
add_shortcode('welcome', 'welcome_f');



function welcome1_f($atts, $content = null) {
	extract( shortcode_atts( array(  "header" => '' ), $atts));
	
	$code = '
				<h1 class="sep_bg welcome1">'.do_shortcode($content).'</h1>
	';
	return $code;
}
add_shortcode('welcome1', 'welcome1_f');





function action_block_f($atts, $content = null) {
	extract( shortcode_atts( array(  "header" => 'Header here', "url" => 'http://www.google.com',"btn" => 'Purchase!' ), $atts));
	
	$code = '
			<div class="sep_bg intro visible-desktop" style="margin-top:10px;">
				<h3 class="colored">'.do_shortcode($header).' <a class="btn btn-small btn-info pull-right" href="'.do_shortcode($url).'"> '.do_shortcode($btn).'</a></h3>
			</div>';
	return $code;
}
add_shortcode('action_block', 'action_block_f');




function m_button_f($atts, $content = null) {
	extract( shortcode_atts( array(  "url" => '#', "price" => '35$',"header1" => 'Purchase theme now &amp;', "header2" => 'Download right now' ), $atts));
	
	$code = '
			<div class="span-8 last notopmargin">
				<a href="'.do_shortcode($url).'" class="a-btn">
					<span class="a-btn-text"><small>'.do_shortcode($header1).'</small> '.do_shortcode($header2).'</span> 
				</a>
			</div>
	';
	return $code;
}
add_shortcode('m_button', 'm_button_f');



function style_image_f($atts, $content=null)
{	
	extract(shortcode_atts(array(
		'size' => 'one_fourth',
		'image' => '',
		'title' => 'Some title',
		'alt' => 'Image description or alternate text.',
		'zoom' => '1',
		'link' => '0',
		'url' => 'http://www.google.com',
		
	), $atts));
	
	$default_url= get_template_directory_uri();
	if($zoom == '0') 
	{
		$zoom1 = 'noinfo';
	}
	
	if($link == '0') 
	{
		$link1 = 'nolink';
	}
	
	if($size == 'one_six') 
	{
		$size1 = 'span2';
	}
	if($size == 'one_fourth') 
	{
		$size1 = 'span3';
	}
	if($size == 'one_third') 
	{
		$size1 = 'span4';
	}
	if($size == 'two_third') 
	{
		$size1 = 'span8';
	}
	if($size == 'one_half') 
	{
		$size1 = 'span6';
	}
	if($size == 'one') 
	{
		$size1 = 'span12';
	}
	
	$output .= '<div class="'.$size1.' block my_img">'."\n";
	$output .= '<div class="view view-first '.$link1.' '.$zoom1.'">'."\n";
	$output .=	'<a href="'.$image.'" rel="prettyPhoto"><img src="'.$image.'" alt="" /></a>'."\n";
		$output .=	'<div class="mask">'."\n";
			if(($link == '0') & ($zoom == '0')){ $output .=	''."\n";}
			if(($link == '1') & ($zoom == '0')){ $output .=	'<a href="'.$url.'" class="link"></a>'."\n";}
			
			if(($link == '1') & ($zoom == '1')){ $output .=	'<a href="'.$image.'" rel="prettyPhoto" class="info"></a>'."\n";
												  $output .=	'<a href="'.$url.'" class="link"></a>'."\n";}
			
			if(($link == '0') & ($zoom == '1')){ $output .=	'<a href="'.$image.'" rel="prettyPhoto" class="info" style="margin-left:-18px !important;"></a>'."\n";}
		$output .=	'</div>'."\n";
		$output .=	'</div>'."\n";
	$output .=	'</div>';

	return $output;
}

add_shortcode('style_image', 'style_image_f');



function spec_block1($atts, $content = null) {
	extract( shortcode_atts( array('icon' => 'size', 'url' => '#', 'icon_src' => '#', 'title' => 'Some Title', 'icon' => '0',), $atts));
	
	if ($icon =='1'){
	$code = '
		<img class="servise_icon" src="'.$icon_src.'" alt=" "/>
		<h4><a class="link" href="'.$url.'">'.$title.'</a></h4>
		<p class="small">'.do_shortcode($content).'</p>
	';} else {
		$code = '
		<h4><a class="link" href="'.$url.'">'.$title.'</a></h4>
		<p class="small">'.do_shortcode($content).'</p>
	';
	}
	return $code;
}

add_shortcode('spec_block', 'spec_block1');



function small_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<span class="small-italic">'.do_shortcode($content).'</span>
	';
	return $code;
}

add_shortcode('small', 'small_f');


function inner_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<section class="inner_section">'.do_shortcode($content).'</section>
	';
	return $code;
}

add_shortcode('inner_section', 'inner_f');




function testimonialrotator_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<div class="sidebar rigel_testimonial_rotarot">
				<div class="bxslider">
					'.do_shortcode($content).'
				</div>
			</div>
	';
	return $code;
}

add_shortcode('testimonialrotator', 'testimonialrotator_f');


function testimonial_f($atts, $content = null) {
	extract( shortcode_atts( array("author" => 'Jhon Doe',"image" => '', ), $atts));
	
	$code = '
			<div class="testimonial">
				<div class="row-fluid">
					<div class="span3">
						<div class="the-image"><img class="img-rounded" style=" width:90%" src="'.$image.'"/></div>
					</div>
					<div class="span9">
						<div class="main_testimonial"><div>'.do_shortcode($content).'</div> <div class="the-author">'.$author.'</div></div>
					</div>
				</div>
			</div>
	';
	return $code;
}

add_shortcode('testimonial', 'testimonial_f');




function break_f($atts, $content = null) {
	extract( shortcode_atts( array("top" => '0px', "bottom" => '0px', ), $atts));
	
	$code = '
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			<div style="margin-top: '.$top.'; margin-bottom: '.$bottom.'">
			'.do_shortcode($content).'
			</div>
			<div class="main_content_area">
			<div class="container">
			<div class="row">
			<div class="span12">
			<div>
			<div>
			<div>
	';
	return $code;
}

add_shortcode('break', 'break_f');










function intro_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<hr class="dash">
			<div class="intro">
				<p style="margin-bottom:10px;"><em>'.do_shortcode($content).'</em></p>
			</div>
			<hr class="dash" style="margin-bottom:20px !important;">
	';
	return $code;
}

add_shortcode('intro', 'intro_f');


function br_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<br>
	';
	return $code;
}

add_shortcode('br', 'br_f');










/* Dropcaps */

function dropcap11($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<span class="dropcap">'.do_shortcode($content).'</span>
	';
	return $code;
}

add_shortcode('dropcap1', 'dropcap11');

function dropcap22($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<span class="dropcap2">'.do_shortcode($content).'</span>
	';
	return $code;
}

add_shortcode('dropcap2', 'dropcap22');


function dropcap33($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<span class="dropcap3">'.do_shortcode($content).'</span>
	';
	return $code;
}

add_shortcode('dropcap3', 'dropcap33');

function dropcap44($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<span class="dropcap4">'.do_shortcode($content).'</span>
	';
	return $code;
}

add_shortcode('dropcap4', 'dropcap44');


function dropcap55($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<span class="dropcap5">'.do_shortcode($content).'</span>
	';
	return $code;
}

add_shortcode('dropcap5', 'dropcap55');

/* /Dropcaps */

/* Blockquotes */

function blockquote_f($atts, $content = null) {
	extract( shortcode_atts( array('author' => ''), $atts));
	
	$code = '
			<blockquote><p>'.do_shortcode($content).'</p><small>'.do_shortcode($author).'</small></blockquote>
	';
	return $code;
}

add_shortcode('blockquote', 'blockquote_f');


function blockquote11($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote1">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote1', 'blockquote11');

function blockquote22($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote2">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote2', 'blockquote22');


function blockquote33($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote3">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote3', 'blockquote33');

function blockquote44($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote4">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote4', 'blockquote44');


function blockquote55($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote5">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote5', 'blockquote55');



function blockquote66($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote6">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote6', 'blockquote66');


function blockquote77($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote7">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote7', 'blockquote77');


function blockquote88($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote8">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote8', 'blockquote88');

function blockquote99($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<p class="blockquote9">'.do_shortcode($content).'</p>
	';
	return $code;
}

add_shortcode('blockquote9', 'blockquote99');

/* /Blockquotes */


function awesome_block($atts, $content = null) {
	extract( shortcode_atts( array(  "title" => 'Some Title Here' ), $atts));
	
	$code = '
		<div class="awesome_block">
			<h5>'.do_shortcode($title).'</h5>
			<p class="nobottommargin" style="margin-top:10px;">'.do_shortcode($content).'</p>
		</div>
	';
	return $code;
}

add_shortcode('spec', 'awesome_block');


function coloredd($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			<span class="colored">'.do_shortcode($content).'</span>
	';
	return $code;
}

add_shortcode('colored', 'coloredd');


function readmoree($atts, $content = null) {
	extract( shortcode_atts( array( "url" =>'#',"margin" =>'1',), $atts));
	
	if($margin == '1') 
	{
		$margin1 = '20px';
	}
	$code = '
			<div style=" margin-top:'.$margin1.'"><a class="button_readmore left"  href="'.do_shortcode($url).'"></a></div>
	';
	return $code;
}

add_shortcode('readmore', 'readmoree');



function skills($atts, $content = null) {
	extract( shortcode_atts( array( "percent" =>'20'), $atts));
	
	$code = '
			<h6>'.do_shortcode($content).'</h6>
			<div class="progress-bar blue stripes">
				<span style="width: '.do_shortcode($percent).'%"></span>
			</div>
	';
	return $code;
}

add_shortcode('skill', 'skills');





?>