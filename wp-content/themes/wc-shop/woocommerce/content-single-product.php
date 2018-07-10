<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>
<div class="new-product">
	<?php do_action('woocommerce_before_single_product') ?>

	<div class="col-md-5 zoom-grid">
		<?php do_action('woocommerce_before_single_product_summary') ?>

	</div>


	<div class="col-md-7 dress-info">

		<?php do_action('woocommerce_single_product_summary'); ?>

		<?php
			wp_enqueue_script( 'imagezoom-js', get_template_directory_uri() . '/js/imagezoom.js' );
			wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/js/jquery.flexslider.js' );

		?>
		<?php do_action('woocommerce_after_shop_loop'); ?>
		<script>
			// Can also be used with $(document).ready()
			jQuery(window).load(function () {
				jQuery('.flexslider').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
	</div>
	<div class="clearfix"></div>
	<div class="reviews-tabs">
		<?php do_action('woocommerce_after_single_product_summary') ?>
		<!-- Main component for a primary marketing message or call to action -->

		</div>

	
	<script type="text/javascript">
		jQuery( '#myTab a' ).click( function ( e ) {
			e.preventDefault();
			jQuery( this ).tab( 'show' );
		} );

		jQuery( '#moreTabs a' ).click( function ( e ) {
			e.preventDefault();
			jQuery( this ).tab( 'show' );
		} );

		( function( $ ) {
			// Test for making sure event are maintained
			jQuery( '.js-alert-test' ).click( function () {
				alert( 'Button Clicked: Event was maintained' );
			} );
			fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
		} )( jQuery );

	</script>
</div>