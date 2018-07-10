<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
/**
* The Template for displaying product archives, including the main shop page which is a post type archive
*
* This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
*
* HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
* will need to copy the new files to your theme to maintain compatibility. We try to do this.
* as little as possible, but it does happen. When this occurs the version of the template file will.
* be bumped and the readme will list any important changes.
*
* @see 	    http://docs.woothemes.com/document/template-structure/
* @author 		WooThemes
* @package 	WooCommerce/Templates
* @version     2.0.0
*/

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}
	?>

<!DOCTYPE html>
<html>

<head>

	<title>Eshop a Flat E-Commerce Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Custom Theme files -->
	<!-- Custom Theme iles -->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<?php wp_head(); ?>

</head>
<body>
<!-- header-section-starts -->

<div class="header">
	<div class="header-top-strip">
		<div class="container">
			<div class="header-top-left">
				<ul>
					<li><a href="account.html"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
					<li><a href="register.html"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a></li>
				</ul>
			</div>
			<div class="header-right">
				<div class="cart box_1">
					<a href="cart/cart.php">
						<h3>
<!--							<span class="simpleCart_total"> $0.00 </span> -->
<!--							(<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)-->
							<p class="total">  <?php echo WC()->cart->get_cart_subtotal(); ?></p>

							<img src="<?php echo get_template_directory_uri() ?>/images/bag.png" alt="">

						</h3>
					</a>
					<p><a href="?empty-cart" class="simpleCart_empty">Empty cart</a></p>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>