<?php $rigel_opt_data = get_option( 'rigel_opt_data' ); ?>
<div class="rigel_header_holder header_v2 fixed_menu <?php if ($rigel_opt_data['fixed_header']) { ?> rigel_fixed_header <?php }?>">
    <div class="first-row">
        <div class="container">
            <div class="row">
			
				
				     <a id="menu-toggle-wrapper" class="">
                    <div id="menu-toggle"></div>
					<div id="menu-word"><?php echo esc_html($rigel_opt_data['menu_word']); ?></div>
                    </a>
                
            </div>
        </div>
    </div>
    <div class="second-row">
        <div class="container">
            <div class="row">
			
			<div class="rigel_logo_holdred col-xs-3">
			
			<?php
		if(isset($rigel_opt_data['rigel_logo_upload']['url']) && $rigel_opt_data['rigel_logo_upload']['url']) :?>
		<a href="<?php echo esc_url(home_url('/')); ?>"><img alt="" src="<?php echo esc_url($rigel_opt_data['rigel_logo_upload']['url']); ?>"/></a>
	<?php endif; ?>
			
                    
					<a href="<?php echo esc_url(home_url('/')); ?>" class="logo_tagline"><?php echo  do_shortcode($rigel_opt_data['header_field_text_2']) ?></a>
										
                </div>
           	

                <div class="rigel_menu_content_holder col-md-9">
					<?php if ( has_nav_menu( 'main_menu' ) ){
							$walker = new rigel_Walker;
							wp_nav_menu(array(
												'echo' => true,
												'container' => '',
												'theme_location' => 'main_menu',
												'menu_class' => 'header_menu',
												'walker' => $walker
						));
						} else { echo wp_kses(_e('<div class="alert alert-success"><strong>Set up your FIRST menu</strong><br> Appearance -> Menus -> Create your menu -> Choose it in "Theme Location" block</div>', 'rigel'),array( 'strong' => array( ) ));}
						?>
                </div>
              
            </div>
        </div>
    </div>
</div>
