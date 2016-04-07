<?php
/*	
*	---------------------------------------------------------------------
*	Woocommerce functions
*	--------------------------------------------------------------------- 
*/

if ( class_exists( 'WooCommerce' ) ) {

	// Add Support
	add_theme_support( 'woocommerce' );
	
	// Define Wrapper
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	// Remove Breadcrumbs
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

	// Products per row
	add_filter('loop_shop_columns', 'loop_columns');
	
	if ( ! function_exists('loop_columns') ) {
		function loop_columns() {
			return 3;
		}
	}
	
	// Redefine woocommerce_output_related_products
	if ( ! function_exists( 'woocommerce_related_products' ) ) {
			function woocommerce_output_related_products() {
				$args = array(
					'posts_per_page' => 3,
					'columns' => 3,
					'orderby' => 'rand'
				);
			woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
		}
	}
		
	// Products per page
	add_filter('loop_shop_per_page', 'rigel_custom_product_count');
	if (!function_exists('rigel_custom_product_count')) {
		function rigel_custom_product_count() {
			$product_count = 9;
			return $product_count;
		}
	}
	
	// Add image wrap
	add_action( 'woocommerce_before_shop_loop_item_title', 'rigel_woocommerce_product_thumbnail_wrap_open', 9, 2);
	add_action( 'woocommerce_before_shop_loop_item_title', 'rigel_woocommerce_product_thumbnail_wrap_close', 14, 2);

	if (!function_exists('rigel_woocommerce_product_thumbnail_wrap_open')) {
		function rigel_woocommerce_product_thumbnail_wrap_open() {
			echo '<div class="img-wrap">';
		}
	}

	if (!function_exists('rigel_woocommerce_product_thumbnail_wrap_close')) {
		function rigel_woocommerce_product_thumbnail_wrap_close() {
			echo '</div>';
		}
	}
	
	// Add the inner div in product loop
	add_action( 'woocommerce_before_shop_loop_item_title', 'rigel_artificer_product_inner_open', 14, 2);
	add_action( 'woocommerce_after_shop_loop_item_title', 'rigel_artificer_product_inner_close', 12, 2);

	function rigel_artificer_product_inner_open() {
		echo '<div class="product-inner">';
	}
	function rigel_artificer_product_inner_close() {
		echo '</div>';
	}
	
	// Change rating position
	remove_action( 'woocommerce_after_shop_loop_item_title', 'rigel_woocommerce_template_loop_rating', 5 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'rigel_woocommerce_template_loop_rating', 11 );
	
	// Change linked product count in a row
	function woocommerce_upsell_display( $posts_per_page = 3, $columns = 3, $orderby = 'rand' ) {
		woocommerce_get_template( 'single-product/up-sells.php', 
			array(
				'posts_per_page' => $posts_per_page,
				'orderby' => $orderby,
				'columns' => $columns
			) 
		);
	}
	
	// The cart fragment (ensures the cart button updates via AJAX)
	add_filter('add_to_cart_fragments', 'rigel_woocommerce_cart_button_fragment');
	
	function rigel_woocommerce_cart_button_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		woocommerce_cart_button();
		$fragments['.header_cart_button'] = ob_get_clean();
		return $fragments;
	}

	// Displays the cart number of items on icon
	function woocommerce_cart_button() {
		global $woocommerce;
		?>
		<span class="header_cart_button">
			<i class="fa fa-shopping-cart"></i>
			<?php if ( $woocommerce->cart->get_cart_contents_count() != '0') {
				echo '<span class="cart_product_count">'. $woocommerce->cart->get_cart_contents_count() .'</span>';
			} ?>
		</span>	
		<?php
	}	
	
	// Displays the cart content
	function woocommerce_cart_widget() {
		global $woocommerce;
		if ( ! is_cart() && ! is_checkout() ) {
			echo '<div class="header_cart_widget">';
				the_widget( 'WC_Widget_Cart', 'title=' );
			echo '</div>';
		}
	}
	
}