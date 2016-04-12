<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>" />  
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php $rigel_opt_data = get_option( 'rigel_opt_data' ); ?>
    <?php
     if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
     <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
   <?php  }
    ?>
        <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
<?php
if($rigel_opt_data['page_preload']) {?>
<div id="preloader">
  <div id="status">
  <ul class="bokeh">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>

  </div>
</div>
<?php }?>

<?php

		// Include Header
		if($rigel_opt_data['header_layout']) {
			
			require_once( trailingslashit( get_template_directory() ). 'framework/headers/header-'.$rigel_opt_data['header_layout'].'.php');

		} else {
			require_once( trailingslashit( get_template_directory() ). 'framework/headers/header-v2.php' );

		}


	?>

<div class="wide_cont <?php if ($rigel_opt_data['fixed_menu']) { ?> visible_menu <?php }?>">


<?php if ( is_single() || is_page() || is_home() || is_front_page() ) {
    ?>

	<?php if (($rigel_opt_data['tagline'] == true && get_post_meta($post->ID, 'tagline_position', 1) != "Hide")) {?>
    <div class="tag_line">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 rigel_blog_post_title_inner"> 
                    <?php $classes = get_body_class(); ?>
                    <?php if ( is_single() && (in_array('single-post',$classes))) { ?>
                    <h3><?php echo esc_html_e("Blog","rigel")?></h3> 
                    <?php } else {?>
                    <h3><?php the_title(); ?></h3>
                    <?php }?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                </div>
                <?php if ( is_single() && (in_array('single-portfolio',$classes))) { ?>
                   <div class="rigel_blog_meta"><div class="rigel_port_meta">
                   <?php the_time(get_option( 'date_format' )) ?>
                    By <?php the_author_posts_link() ?>
                    <a href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%')?>  <?php echo esc_html__("Comments","rigel")?></a>
                    </div></div>
                <?php }?>
            </div>
        </div>                  
    </div>
    <?php } ?>
<?php }; ?>

