<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo $wrap_before;

	foreach ( $breadcrumb as $key => $crumb ) {

		echo $before;

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		} else {
			echo esc_html( $crumb[0] );
		}

		echo $after;

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo $delimiter;
		}

	}

	echo $wrap_after;
	$taxonomy='product_cat';
	$terms = get_terms(array(
		'taxonomy'=>$taxonomy,
		'hide_empty'=>true
	));
	$ids = array();
	foreach ($terms as $term){
		$ids[] = $term->term_id;
	}
	$obj = get_queried_object();
	$termC = $obj->term_id;

	$positionC= array_search($termC, $ids);
	$prev_term = $positionC +1;
	if ($prev_term>=0){
		$prevTerm = get_term($ids[$prev_term],$taxonomy);

		if ($prevTerm && !is_cart() && is_checkout()){
			echo  '<p class="back"><a href="'.get_term_link($prevTerm->term_id ,$taxonomy).'">'.$prevTerm->name.'</a></p>';
		}
	}
}
	?>
<!---->
<!--	<div class="new-product-top">-->
<!--				<ul class="product-top-list">-->
<!--					<li><a href="index.html">Home</a>&nbsp;<span>&gt;</span></li>-->
<!--					<li><span class="act">Best Sales</span>&nbsp;</li>-->
<!--				</ul>-->
<!--				<p class="back"><a href="index.html">Back to Previous</a></p>-->
				<div class="clearfix"></div>
			</div>
