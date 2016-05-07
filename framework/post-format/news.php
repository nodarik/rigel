<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail'); ?>


<div class="row">
	<div class="col-md-2 col-sm-3">
    	<div class="rigel_news_date text-center">
        	<?php the_time(get_option( 'date_format' )) ?><br>
            <?php the_time(get_option( 'date_format' )) ?>
        </div>
		<?php 
		
		if ( has_post_thumbnail() ) { ?>
		
	<img class="img-responsive" src="  <?php 	. esc_url($large_image_url[0]).'" alt="" />'."\n"; ?>
		
    </div>
    <div class="col-md-10 col-sm-9">
	
    	<h4 class="rigel_news_title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?> </a></h4>
        <?php $content = get_the_content();
		$content = strip_tags($content);
		echo esc_attr(substr($content, 0, 320));?> ...
    </div>
</div>
