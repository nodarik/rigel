<?php get_header(); ?>
<style>
.rigel_header_holder, .rigel_custom_footer_holder, .rigel_footer_holder, .tag_line { display:none;}
#akceptor {
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}
</style>

				
                <div class="main_content_area" id="akceptor" style="position:relative; margin-top:70px; margin-bottom:70px">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" id="donor">
								<!--Page contetn-->
                                <div class="col-md-12 rigel_not_found_error text-center" style="text-align:center; ">
									                                 <hr>
                                    <h1 class="rigel_legend"><strong class="colored"><?php esc_html_e("Oops, 404 Error!","rigel"); ?></strong></h1><h3><?php esc_html_e("The page you were looking for could not be found.","rigel"); ?></h3>
                                    <hr>
                                </div>
                                <!--/Page contetn-->

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