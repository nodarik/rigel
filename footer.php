<?php $rigel_opt_data = get_option( 'rigel_opt_data' ); ?>
</div>
<div class="rigel_footer_custom_content  <?php if ($rigel_opt_data['hidden_footer']) { ?> hidden_footer <?php }?> ">
<div class="copyright-text"><?php echo  esc_attr(do_shortcode($rigel_opt_data['bottom_line_text'])) ?></div>
    <div class="container">
        <div class="footer-wraper">
            <div class="rigel_footer_header"></div>			
				
            <div class="row <?php if ($rigel_opt_data['hidden_footer']) { ?> hidden_footer <?php }?>">
                <div class="col-lg-12">
				                				
                    <?php echo  wp_kses(do_shortcode($rigel_opt_data['footer_left']), array(
					 'ul' =>  array(
						'class' => array()),
					 'li' => array(),
					'h1' => array(),
					'h2' => array(),
					'h3' => array(),
					'h4' => array(),
					'h5' => array(),
					'h6' => array(),
					'a' => array(
						'href' => array(),
						'title' => array()
						),
					'img' => array(
						'scr' => array(),
						'alt' => array()
						),
					'br' => array(),
					'em' => array(),
					'strong' => array(),
					))?>
					 					 
					 <!--Social networks-->
					 
					<ul class="rigel_social_networks">
					
									<?php if ($rigel_opt_data['footer_social_fb'] != "") {?>
									<li>
										
										<span><a class="fa fa-facebook" href="<?php echo stripslashes($rigel_opt_data['footer_social_fb']) ?>"></a></span>
									</li>
									<?php }; ?>
									
									<?php if ($rigel_opt_data['footer_social_tw'] != "") {?>
								<li>
									
									<span><a class="fa fa-twitter"  href="<?php echo stripslashes($rigel_opt_data['footer_social_tw']) ?>"></a></span>
								</li>
								<?php }; ?>
								<?php if ($rigel_opt_data['footer_social_inst'] != "") {?>
									<li>
									
									<span><a class="fa fa-instagram"  href="<?php echo stripslashes($rigel_opt_data['footer_social_inst']) ?>"></a></span>
								</li>
									<?php }; ?>
									<?php if ($rigel_opt_data['footer_social_go'] != "") {?>
									<li>
									
									<span><a class="fa fa-google-plus"  href="<?php echo stripslashes($rigel_opt_data['footer_social_go']) ?>"></a></span>
								</li>
								<?php }; ?>
								<?php if ($rigel_opt_data['footer_social_pi'] != "") {?>
									<li>
									
									<span><a class="fa fa-pinterest-p"  href="<?php echo stripslashes($rigel_opt_data['footer_social_pi']) ?>"></a></span>
								</li>
								<?php }; ?>
								<?php if ($rigel_opt_data['footer_social_li'] != "") {?>
									<li>
									
									<span><a class="fa fa-linkedin"  href="<?php echo stripslashes($rigel_opt_data['footer_social_li']) ?>"></a></span>
								</li>
								<?php }; ?>
					</ul>
			


					
                </div>            
         
            </div>
        </div>
    </div>
	<div class="rigel_footer_holder">
    <div class="container">
        <div class="rigel_footer">
           <div class="row">
               <div class="col-md-4">
			   
			   <?php
		if(isset($rigel_opt_data['footer_logo_upload']['url']) && $rigel_opt_data['footer_logo_upload']['url']) :?>
		<img alt=""  src="<?php echo esc_url($rigel_opt_data['footer_logo_upload']['url'])?>"/> 
	<?php endif; ?>
			   
			   
			   
			   
			   
                 
                 </div>
				   <div class="col-md-4">
			  
                 </div>
                <div class="col-md-4 hidden-xs">
                <div class="pull-right">
				
 <!--Menu-->
                        <?php if ( has_nav_menu( 'secondary_menu' ) ){
                    wp_nav_menu(array(
                        'echo' => true,
                        'container' => '',
                        'theme_location' => 'secondary_menu',
                        'menu_class' => 'rigel_footer_quote list-unstyled footer_menu',
                    ));
                    } 
                    ?>
                        <!--End Menu-->
                </div>
                </div>
           </div>
        </div>
    </div>
</div>

</div>
<?php wp_footer(); ?>
</body>


</html>