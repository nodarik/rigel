<?php	 		 	
	// Template Name: Blank Template
?>
<?php get_header(); ?>
                <div class="main_content_area" id="akceptor">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" id="donor">
                                <?php if (!(have_posts())) { ?><div class="span12"><h2 class="colored uppercase"><?php esc_html__("There are no posts","rigel"); ?></h2></div><?php }  ?>   
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <?php the_content(); ?>
                                <?php endwhile;  ?> 
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
<script>
jQuery.noConflict()(function($){
	var result = document.getElementById("donor").offsetHeight;
	$("#akceptor").css({"height":result+30} );
});
</script>
<?php get_footer(); ?>