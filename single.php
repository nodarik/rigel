<?php 
/*
Default Post Template
*/
get_header(); 
$rigel_opt_data['blog_sidebar_position'] = esc_html__("Right Sidebar", "rigel");
?>
<div class="container">
	<div class="row">
    	<div class="<?php if ($rigel_opt_data['blog_sidebar_position'] == esc_html__("Without Sidebar", "rigel")) { ?>col-md-12<?php } else { ?>col-md-8 col-sm-8<?php }; if ($rigel_opt_data['blog_sidebar_position'] == esc_html__('Left Sidebar', 'rigel')){?> col-md-push-4 col-sm-push-4<?php }; ?>">
        	<?php if (!(have_posts())) { ?><h3 class="page_title"><?php esc_html_e('There are no posts', 'rigel'); ?></h3><?php }  ?>   
            
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    
                <div <?php post_class('row rigel_post'); ?> id="post-<?php the_ID(); ?>">
                    <div class="col-md-12">
                        <div class="blog_item">
                        	<?php $format = get_post_format(); get_template_part( 'framework/post-format/single', $format );   ?>
                    	</div>
						<?php if ( ! post_password_required() ) {?>
                        	<?php if (comments_open()) {?>
                        		<div class="rigel_commente_holder" id="comments">
                        			<div class="comments_div">
                        				<?php $comment_count = get_comment_count($post->ID); ?>
                        				<h3 class="rigel_comments_title"><?php if($comment_count[esc_html__('approved', 'rigel')] > 0) { comments_number(esc_html__('0 Comments', 'rigel'), esc_html__('1 Comment:', 'rigel'), esc_html__('% Comments:', 'rigel')); } else {echo esc_html_e('No comments yet', 'rigel'); };?></h3>
                        			</div>
                        			<ol class="rigel_ticket_commentlist">
                        				<?php	 		 		 		 		 		 	
                        				//Gather comments for a specific page/post 
                        				$comments = get_comments(array(
                        				'post_id' => get_the_ID(),
                        				));
                        
                        				//Display the list of comments
                        				wp_list_comments(array(
                        					'per_page' => 10, //Allow comment pagination
                        					'reverse_top_level' => true //Show the latest comments at the top of the list
                        				), $comments);
                        				?>
                        			</ol>
									
									<?php if ( is_user_logged_in() ) { ?>
                						<div id="respond">
                							<h4><?php comment_form_title( esc_html__('Leave a Reply', 'rigel'), esc_html__('Leave a Reply to %s', 'rigel' )); ?></h4>
                							<form class="form" action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" method="post" id="contact-form">
                								<textarea placeholder="<?php echo esc_html_e('Message', 'rigel'); ?>" id="comment" name="comment" class="input-text" rows="5" ></textarea><br><br>
                								<button name="submit" id="submit_form" type="submit"  class="btn rigel_submit"><?php esc_html_e( "Replay", "rigel" ); ?></button>
                								<div><?php comment_id_fields(); ?></div>
                								<?php do_action('comment_form', get_the_ID()); ?>
                							</form>
                						</div>
                					<?php }else { ?>
                						<h4><?php comment_form_title( esc_html__('Leave a Reply', 'rigel'), esc_html__('Leave a Reply to %s', 'rigel')); ?></h4>
                						<form class="form" action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" method="post" id="contact-form">
                							<input type="text" class="input-text" placeholder="<?php echo esc_html_e('Name', 'rigel'); ?>" name="author" value="<?php if (isset($comment_author)){ echo esc_attr($comment_author); } ?>" /><br><br>
                							<input  class="input-text" type="text" placeholder="<?php echo esc_html_e('E-mail', 'rigel'); ?>" name="email" value="<?php if (isset($comment_author_email)){ echo esc_attr($comment_author_email); }?>" /><br><br>
                							<textarea placeholder="<?php echo esc_html_e('Message', 'rigel'); ?>" id="comment" name="comment" class="input-text" rows="5"></textarea><br><br>
                							<button name="submit" id="submit_form" type="submit" class="btn rigel_submit"><?php esc_html_e( "Replay", "rigel" ) ?></button>
                							<div><?php comment_id_fields(); ?></div>
                							<?php do_action('comment_form', get_the_ID()); ?>
                						</form>
                					<?php }?>
                					<?php paginate_comments_links(); ?>
                                </div>
                			<?php } ?>
                		<?php } ?>
                	</div>
                
                </div>  
            <?php endwhile; endif; ?>    
        </div>
        
        <!--/Page content-->
		<?php if (($rigel_opt_data['blog_sidebar_position'] == esc_html__("Left Sidebar", "rigel"))|| ($rigel_opt_data['blog_sidebar_position'] == esc_html__("Right Sidebar", "rigel"))) { ?>
            <!--Sidebar-->
            <div class="col-md-4 col-sm-4 <?php if ($rigel_opt_data['blog_sidebar_position'] == esc_html__('Left Sidebar', 'rigel')){?>col-md-pull-8 col-sm-pull-8 rigel_left_sidebar<?php }else {?> rigel_right_sidebar<?php ;}; ?>">
                <div class="myrs">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(esc_html__("Blog Sidebar", "rigel")) ) : ?>
                <?php endif; ?> 
                </div>
            </div>
            <!--/Sidebar-->
		<?php } ?>
    </div>
</div>

<?php get_footer(); ?>