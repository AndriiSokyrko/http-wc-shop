<?php
	/**
	 * Created by PhpStorm.
	 * User: user
	 * Date: 23.03.2018
	 * Time: 11:29
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	global $post, $product, $woocommerce;

	$attachment_ids = $product->get_gallery_attachment_ids();

	if ( $attachment_ids ) {
		$loop 		= 0;
		$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
		foreach ( $attachment_ids as $attachment_id ):
			$classes = array( 'zoom' );

			if ( $loop === 0 || $loop % $columns === 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns === 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_full' ), 0, $attr = array(
				'title'	=> $image_title,
				'alt'	=> $image_title,
				'data-imagezoom'=>true
			) );

			$image_class = esc_attr( implode( ' ', $classes ) );
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html',
				sprintf(
//					'<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>',
					'<li data-thumb="%s"><div class="thumb-image">%s</div></li>',


//					$image_link
					wp_get_attachment_image_src($attachment_id,'shop_thumbnail')[0]
					,$image ), $attachment_id, $post->ID, $image_class );

			$loop++;

			$loop++;
			?>


		<?php
		endforeach;
	}
?>
