<?php
$paged = 1;
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');
?>
<?php get_header(); ?>
<?php $my_sb =  get_post_meta($post->ID, 'sidebarss', 1);
if ($my_sb == ''){$sb = esc_html__('Right Sidebar', 'rigel');} else { $sb = $my_sb;};

$sb_pos =  get_post_meta($post->ID, 'sidebarss_position', 1);
?> 


<div class="main_content_area">
    <div class="container">
        
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="rigel_blog_item_holder">          
            <div class="rigel_blog_item_content">
                <div class="rigel_blog_item_main_content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile;  ?> 
                <?php endif; ?>
                </div>
                <br>
                <div class="rigel_share">
                    <div class="rigel_post_share_icons">
                        <div class="rigel_soc_icons">
                            <a href="https://twitter.com/share?url=<?php esc_url(the_permalink())?>" title="Twitter" target="_blank"><div class="fa fa-twitter"></div></a>
                            <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink())?>" title="Facebook" target="_blank"><div class="fa fa-facebook"></div></a>
                            <a href="https://plus.google.com/share?url=<?php esc_url(the_permalink())?>" title="Google+" target="_blank"><div class="fa fa-google-plus"></div></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url(the_permalink())?>" title="LinkedIn" target="_blank"><div class="fa fa-linkedin"></div></a>
                        </div>
                    </div>
                </div>


                <?php if ( ! post_password_required() ) {?>
                        <?php if (comments_open()) {?>
                        <div class="rigel_commente_holder" id="comments">
                        <div class="comments_div">
                        <?php $comment_count = get_comment_count($post->ID); ?>
                        <h3 class="rigel_comments_title"><?php if($comment_count['approved'] > 0) { comments_number(esc_html__('0 Comments', 'rigel'), esc_html__('1 Comment:', 'rigel'), esc_html__('% Comments:', 'rigel')); } else {echo esc_html_e('No comments yet', 'rigel'); };?></h3>
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
                <h4><?php comment_form_title( esc_html__('Leave a Reply', 'rigel'), esc_html__('Leave a Reply to %s', 'rigel') ); ?></h4>
                <form class="form" action="<?php esc_url(get_option('siteurl')); ?>/wp-comments-post.php" method="post" id="contact-form">
                <textarea placeholder="Message" id="comment" name="comment" class="input-text" rows="5"></textarea><br><br>
                <button name="submit" id="submit_form" type="submit"  class="btn rigel_submit"><?php esc_html_e( "Replay", "rigel" ) ?></button>
                <div><?php comment_id_fields(); ?></div>
                <?php do_action('comment_form', get_the_ID()); ?>
                </form>
                </div>
                <?php }else { ?>
                 <h4><?php comment_form_title( esc_html__('Leave a Reply', 'rigel'), esc_html__('Leave a Reply to %s', 'rigel') ); ?></h4>
                <form class="form" action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" method="post" id="contact-form">
                <input type="text" class="input-text" placeholder="Name" name="author" value="<?php if (isset($comment_author)){ echo esc_attr($comment_author); } ?>" /><br><br>
                <input  class="input-text" type="text" placeholder="E-mail" name="email" value="<?php if (isset($comment_author_email)){ echo esc_attr($comment_author_email); }?>" /><br><br>
                <textarea placeholder="Message" id="comment" name="comment" class="input-text" rows="5"></textarea>
				<br>
				<br>
                <button name="submit" id="submit_form" type="submit"  class="btn rigel_submit"><?php esc_html_e( "Replay", "rigel" ) ?></button>
                <div><?php comment_id_fields(); ?></div>
                <?php do_action('comment_form', get_the_ID()); ?>
                </form>
                <?php }?>
                <?php paginate_comments_links(); ?>
                
                </div>
                <?php };?>
                <?php };?>


            </div>
        </div>
    </div>
</div>
    </div>
</div>
<?php get_footer(); ?>