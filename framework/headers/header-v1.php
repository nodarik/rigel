 <?php global $rigel_opt_data;?>
<div class="rigel_header_holder header_v1 <?php if ($rigel_opt_data['fixed_menu']) { ?> fixed_menu <?php }?>">
    <div class="first-row">
        <div class="container">
            <div class="row">
				<div class="rigel_logo_holdred col-xs-10">
                    
					<?php
		if(isset($rigel_opt_data['rigel_logo_upload']['url']) && $rigel_opt_data['rigel_logo_upload']['url']) :?>
		<a href="<?php echo esc_url(home_url('/')); ?>"><img alt="" src="<?php echo esc_url($rigel_opt_data['rigel_logo_upload']['url']); ?>"/></a>
	<?php endif; ?>
					
					<?php echo  do_shortcode($rigel_opt_data['header_field_text_2']) ?>
					
                </div>
                <div class="rigel_menu_content_holder col-xs-2">
				
				     <a id="menu-toggle-wrapper" class="">
                    <div id="menu-toggle"></div>
					<div id="menu-word"><?php echo esc_html($rigel_opt_data['menu_word']); ?></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="second-row">
        <div class="container">
            <div class="row">

                <div class="rigel_menu_content_holder col-md-9">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="secondary_logo"><img alt="" src="<?php echo esc_url($rigel_opt_data['rigel_logo_upload']['url']); ?>"/></a>
                    <?php if ( has_nav_menu( 'main_menu' ) ){
                        $walker = new rigel_Walker;
                        wp_nav_menu(array(
                                            'echo' => true,
                                            'container' => '',
                                            'theme_location' => 'main_menu',
                                            'menu_class' => 'header_menu',
                                            'walker' => $walker
                    ));
                    } else { echo wp_kses(_e('<div class="alert alert-success" style="margin-top:10px !important; margin-bottom:10px; margin-left:20px;margin-right:20px;"><strong>Set up your FIRST menu</strong><br> Appearance -> Menus -> Create your menu -> Choose it in "Theme Location" block</div>', 'rigel'),array( 'strong' => array( ) ));}
                    ?>
                </div>
                <div class="rigel_header_search col-md-3">
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
                                <input type="search" class="search-field" placeholder="<?php echo esc_html_e( ' ', 'rigel' ) ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php echo esc_html_e( 'Search for:', 'rigel' ) ?>" />   
								<input type="submit" class="search-submit" style="background:url(<?php echo esc_url(get_template_directory_uri()); ?>/framework/images/magnif.png)" value=""/>
                            </form>
							
                  </div>
            </div>
        </div>
    </div>
</div>
