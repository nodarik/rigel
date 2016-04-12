<?php
/**
 * WooCommerce shop template
 */
?>

<?php get_header();
$sb_pos =  get_post_meta($post->ID, 'sidebarss_position', 1);
?>


<div class="main_content_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8" style="<?php if ($sb_pos == esc_html__("Left Sidebar", "rigel")){?> echo 'float:right' <?php }?>">
                <?php woocommerce_content(); ?>
            </div>           
                <?php get_sidebar('shop'); ?>          
        </div>
    </div>
</div>
<?php get_footer(); ?>

