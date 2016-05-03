<?php 
$rigel_opt_data = get_option( 'rigel_opt_data' );
$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); 
$title = get_the_title();
if ( $title == esc_html__("Blog Left Sidebar", 'rigel'))  $rigel_opt_data['blog_sidebar_position'] = esc_html__("Left Sidebar", 'rigel');
if ( $title == esc_html__("Blog Right Sidebar", 'rigel'))  $rigel_opt_data['blog_sidebar_position'] = esc_html__("Right Sidebar", 'rigel');
if ( $title == esc_html__("Without Sidebar", 'rigel'))  $rigel_opt_data['blog_sidebar_position'] = esc_html__("Without Sidebar", 'rigel');
?>

<div class="row">
	<?php if($rigel_opt_data['blog_sidebar_position'] == esc_html__("Right Sidebar", "rigel") ) {?>
	<div class="col-md-2 col-sm-2">
    	<div class="rigel_full_blog_post_date">
				<a  href="<?php echo esc_url(the_permalink()); ?>">
				<time class="rigel_date_d colored"><?php echo get_the_date( 'd M Y', $post->ID ); ?></time>
			</a>
			
        </div>
		<div class="rigel_blog_meta">
				<div class="rigel_by_author">By <?php the_author_posts_link() ?></div>
				<div class="rigel_post_tags"><?php $posttags = get_the_tags(); if (!$posttags){echo esc_html__("No tags","rigel");}else{the_tags('');}; ?> </div>
				<div class="rigel_post_comments"><a href="<?php esc_url(the_permalink()) ?>#comments"><?php comments_number('0','1','%')?>  <?php echo esc_html__("Comments","rigel")?></a></div>
         </div>
    </div>
    <?php };?>
    <div class="col-md-10 col-sm-10">
        <div class="rigel_blog_item_holder">
        	
            <div class="rigel_blog_full_content_holder">
                <div class="rigel_blog_head">
                    <h3 class="rigel_blog_post_title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?> </a></h3>
                   
                </div>
                
            </div>
             <?php if ($large_image_url[0] != "") {?>
            <div class="rigel_post_format_content">
                 <div class="rigel_with_mask_no_url">
                 	<a rel="prettyPhoto" class="rigel_pretty_image_link" title="<?php the_title(); ?>" href="<?php echo esc_url($large_image_url[0]); ?>"><div class="rigel_pretty_image_link_plus"></div></a>
                    <img src="<?php echo esc_url($large_image_url[0]); ?>" alt="<?php the_title(); ?>" />
                </div>
            </div>
            <?php };?>
            
            <div class="rigel_blog_item_content">
                <div class="rigel_blog_item_main_content">
                    <?php the_content('<div class="rigel_read_more"><a class="rigel_readmore_btn" href="'. esc_url(get_permalink($post->ID)) . '">'. esc_html__(" Read More","rigel") .'</a></div>'); ?>
                </div>
            </div>
            
        </div>
	</div>
    <?php if($rigel_opt_data['blog_sidebar_position'] == esc_html__("Left Sidebar", "rigel") ) {?>
	<div class="col-md-2">
    	<div class="rigel_full_blog_post_date" >
				<a  href="<?php echo esc_url(the_permalink()); ?>">
				<time class="rigel_date_d colored"><?php echo get_the_date( 'd M Y', $post->ID ); ?></time>
			</a>
			
        </div>
		<div class="rigel_blog_meta">
				<div class="rigel_by_author">By <?php the_author_posts_link() ?></div>
				<div class="rigel_post_tags"><?php $posttags = get_the_tags(); if (!$posttags){echo esc_html__("No tags","rigel");}else{the_tags('');}; ?> </div>
				<div class="rigel_post_comments"><a href="<?php esc_url(the_permalink()) ?>#comments"><?php comments_number('0','1','%')?>  <?php echo esc_html__("Comments","rigel")?></a></div>
         </div>
    </div>
    <?php };?>
</div>

