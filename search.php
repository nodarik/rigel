 <?php get_header(); ?>
	<div class="main_content_area">
        <div class="container">
            <div class="row">
                <!--Page contetn-->
                <div class="<?php if ($rigel_opt_data['blog_sidebar_position'] == esc_html__("Without Sidebar", "rigel")) { ?>col-md-12<?php } else { ?>col-md-8<?php }; if ($rigel_opt_data['blog_sidebar_position'] == esc_html__('Left Sidebar', 'rigel')){?> col-md-push-4<?php }; ?>">
                    <h2><?php esc_html_e("Search Results for:","rigel"); ?> <strong class="colored"><?php echo esc_attr(get_search_query());?></strong></h2>
                    <hr>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                     <div <?php post_class('row rigel_post'); ?> id="post-<?php the_ID(); ?>">
                        <div class="col-md-12">
                            <div class="blog_item">
                                <?php $format = get_post_format(); get_template_part( 'framework/post-format/format', $format );   ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                    <div class="alert alert-danger">
                        <strong><?php esc_html__('Nothing was found!', 'rigel') ?></strong> <?php esc_html__('Change a few things up and try submitting again.', 'rigel') ?>
                    </div>
                     <?php endif; ?>
                    <hr class="notopmargin">
					<?php if (function_exists('wp_corenavi')) { ?><div class="pride_pg"><?php wp_corenavi(); ?></div><?php }?>
                </div>
                <?php if (($rigel_opt_data['blog_sidebar_position'] == "Left Sidebar")|| ($rigel_opt_data['blog_sidebar_position'] == "Right Sidebar")) { ?>
                <!--Sidebar-->
                <div class="col-md-4 <?php if ($rigel_opt_data['blog_sidebar_position'] == 'Left Sidebar'){?>col-md-pull-8 rigel_left_sidebar<?php }else {?> rigel_right_sidebar<?php ;}; ?>">
                    <div class="myrs">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>                
                    <?php endif; ?> 
                    </div>
                </div>
                <!--/Sidebar-->
                <?php } ?>

            </div>
        </div>
    </div>


 <?php get_footer(); ?>