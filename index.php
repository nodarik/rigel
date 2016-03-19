<?php
get_header();
$title = get_the_title();
if ( $title == esc_html__("Blog Left Sidebar", "rigel"))  $rigel_opt_data['blog_sidebar_position'] = esc_html__("Left Sidebar", "rigel");
if ( $title == esc_html__("Blog Right Sidebar", "rigel"))  $rigel_opt_data['blog_sidebar_position'] = esc_html__("Right Sidebar", "rigel");
if ( $title == esc_html__("Without Sidebar", "rigel"))  $rigel_opt_data['blog_sidebar_position'] = esc_html__("Without Sidebar", "rigel");
?>
                     <div class="container">
                        <div class="row">
                            <div class="<?php if ($rigel_opt_data['blog_sidebar_position'] == esc_html__("Without Sidebar", "rigel")) { ?>col-md-12<?php } else { ?>col-md-8 col-sm-8<?php }; if ($rigel_opt_data['blog_sidebar_position'] == esc_html__('Left Sidebar', 'rigel')){?> col-md-push-4 col-sm-push-4<?php }; ?>">
                                <?php if ( !is_archive() ) { ?>
                                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('paged='.$paged.'&cat='.$cat); ?>		
                                <?php } ?> 
                                <?php if (!(have_posts())) { ?><h3 class="page_title"><?php esc_html__('There are no posts' , 'rigel') ?></h3><?php }  ?>   
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                               
                                
                                    <div <?php post_class('row rigel_post'); ?> id="post-<?php the_ID(); ?>">
                                        <div class="col-md-12">
                                            <div class="blog_item">
                                                <?php $format = get_post_format(); get_template_part( 'framework/post-format/format', $format );   ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php endwhile;  ?> 
                                <?php endif; ?>
                                <hr class="notopmargin">
                                <?php if (function_exists('wp_corenavi')) { ?><div class="pride_pg"><?php wp_corenavi(); ?></div><?php }?>
                            </div>
                            <!--/Page contetn-->
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