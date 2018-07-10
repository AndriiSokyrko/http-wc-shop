<?php   if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	global $product;


	if ( $price_html = $product->get_price_html() ) {

		if ( !is_shop() || is_product() ) {

			echo apply_filters('woocommerce_loop_add_to_cart_link',
				sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" 
						data-product_sku="%s" class="cbp-vm-icon cbp-vm-add item_add %s">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					esc_attr( $product->id ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $class ) ? $class : 'button' ),
//				    esc_html( $product->add_to_cart_text() ),
					$price_html
				));
		} else {
			echo apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf(
			'<p  data-quantity="%s"  data-product_id="%s" data-product_sku="%s" >
			<i></i>
			<a class="cbp-vm-icon cbp-vm-add item_add %s" href="%s"> 
			<span class="item_price">%s</span></a>
			</p>',
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					esc_attr( $product->id ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $class ) ? $class : 'button' ),
					esc_url( $product->add_to_cart_url() ),
				    $price_html
				));



	}
	}
?>