<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="rigel_blog_item_holder">
        	 <div class="rigel_blog_head ">
            	<h3 class="rigel_blog_post_title_inner"><?php the_title();?></h3>
                <div class="rigel_blog_meta">
                	<?php the_time(get_option( 'date_format' )) ?>
                    <?php esc_html_e('By', 'rigel');?> <?php the_author_posts_link() ?>
                    <a href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%')?>  <?php echo esc_html__("Comments","rigel")?></a>
                </div>
            </div>
            
            <div class="rigel_post_format_content">
                 <div id="port_slider" class="flexslider rigel_flex_loading rigel_vc_gal">
                    <ul class="slides">
				 <?php  	 if (get_post_meta($post->ID, 'image', true)) { ?>
                        <li><img src="<?php  	 echo get_post_meta($post->ID, 'image', true); ?>" alt="" /></li>
                    <?php  	 } ?>
                    <?php  	 if (get_post_meta($post->ID, 'image2', true)) { ?>
                        <li><img src="<?php  	 echo get_post_meta($post->ID, 'image2', true); ?>" alt="" /></li>
                    <?php  	 } ?>
                    <?php  	 if (get_post_meta($post->ID, 'image3', true)) { ?>
                        <li><img src="<?php  	 echo get_post_meta($post->ID, 'image3', true); ?>" alt="" /></li>
                    <?php  	 } ?>
                    </ul>
                </div>
            </div>
            
            <div class="rigel_blog_item_content">
            	<div class="rigel_blog_item_main_content">
					<?php the_content('<div class="rigel_read_more text-center"><a class="rigel_readmore_btn" href="'. get_permalink($post->ID) . '">'. esc_html__(" Read More","rigel") .'</a></div>'); ?>
            	</div>
                <br>
                <div class="rigel_share">
                    <div class="rigel_post_share_icons">
                        <div class="rigel_soc_icons">
                            <a href="https://twitter.com/share?url=<?php the_permalink()?>" title="Twitter" target="_blank"><div class="menu_icon_t"></div></a>
                            <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink()?>" title="Facebook" target="_blank"><div class="menu_icon_facebook"></div></a>
                            <a href="https://plus.google.com/share?url=<?php the_permalink()?>" title="Google+" target="_blank"><div class="menu_icon_google"></div></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink()?>" title="LinkedIn" target="_blank"><div class="menu_icon_in"></div></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
	</div>
</div>











