<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.4.0
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


global $product, $woocommerce_loop;

// Store loop count we're currently on
if( empty( $woocommerce_loop['loop'] ) ){
	$woocommerce_loop['loop'] = 0;
}

// Ensure visibility
if( ! $product || ! $product->is_visible() ){
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;


// Extra post classes
$classes = array();
$classes[] = 'isotope-item';


// Product type - Buttons ---------------------------------
if( ! $product->is_in_stock() || mfn_opts_get('shop-catalogue') || in_array( $product->product_type, array('external','grouped','variable') ) ){
	$add_to_cart = false;
	$image_frame = false;
} else {
	$add_to_cart = '<a href="'. apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) ) .'" rel="nofollow" data-product_id="'.$product->id.'" class="add_to_cart_button product_type_'.$product->product_type.'"><i class="icon-basket"></i></a>';
	$image_frame = 'double';
}


?>
<li <?php post_class( $classes ); ?>>
	
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
	<?php	
		$shop_images = mfn_opts_get( 'shop-images' );
		
		if( $shop_images == 'plugin' ){
			// Disable Image Frames if use external plugin for Featured Images
			
			echo '<a href="'. get_the_permalink() .'">';
			
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
				do_action( 'woocommerce_before_shop_loop_item_title' );
				
				if( $product->is_on_sale() ) echo '<span class="onsale"><i class="icon-star"></i></span>';
			
			echo '</a>';
			
		} elseif( $shop_images == 'secondary') {
			// Show secondary image on hover

			echo '<div class="hover_box hover_box_product" ontouchstart="this.classList.toggle(\'hover\');" >';
				echo '<a href="'. get_the_permalink() .'">';
					echo '<div class="hover_box_wrapper">';
					
						the_post_thumbnail( 'shop_catalog', array( 'class' => 'visible_photo scale-with-grid' ) );
						
						if ( $attachment_ids = $product->get_gallery_attachment_ids() ) {
							$secondary_image_id = $attachment_ids['0'];
							echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'hidden_photo scale-with-grid' ) );
						}

					echo '</div>';
				echo '</a>';
				
				if( $product->is_on_sale() ) echo '<span class="onsale"><i class="icon-star"></i></span>';
			echo '</div>';

		} else {
			
			echo '<div class="image_frame scale-with-grid product-loop-thumb" ontouchstart="this.classList.toggle(\'hover\');">';
			
				echo '<div class="image_wrapper">';
					
				echo '<a href="'. get_the_permalink() .'">';
					echo '<div class="mask"></div>';
					the_post_thumbnail( 'shop_catalog', array( 'class' => 'scale-with-grid' ) );
				echo '</a>';
				
				echo '<div class="image_links '. $image_frame .'">';
					echo $add_to_cart;
					echo '<a class="link" href="'. get_the_permalink() .'"><i class="icon-link"></i></a>';
				echo '</div>';
					
				echo '</div>';
				
				if( $product->is_on_sale() ) echo '<span class="onsale"><i class="icon-star"></i></span>';
				echo '<a href="'. get_the_permalink() .'"><span class="product-loading-icon added-cart"></span></a>';
				
			echo '</div>';
		}
		
	?>

	<div class="desc">

		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			// excerpt
			if( $_GET && key_exists('mfn-shop', $_GET) ){
				$shop_layout = $_GET['mfn-shop']; // demo
			} else {
				$shop_layout = mfn_opts_get( 'shop-layout', 'grid' );
			}
			
			if( $_GET && key_exists('mfn-shop-ex', $_GET) ){
				echo '<div class="excerpt">'. apply_filters( 'woocommerce_short_description', $post->post_excerpt ) .'</div>'; // demo
			} elseif( mfn_opts_get('shop-excerpt') ){
				echo '<div class="excerpt">'. apply_filters( 'woocommerce_short_description', $post->post_excerpt ) .'</div>';
			}

		?>
		
	</div>
	
	<?php

		/**
		 * woocommerce_after_shop_loop_item hook
		 *
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		if( $shop_layout != 'list' ) remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
		do_action( 'woocommerce_after_shop_loop_item' ); 
	?>

</li>