<?php
	/**
	 * Created by PhpStorm.
	 * User: user
	 * Date: 24.03.2018
	 * Time: 11:52
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	get_header();
	wp_navigation();
	if ( is_cart()  || is_checkout() ):
		?>
		<div class="cart_items">
		<div class="container">

		<?php 	elseif(is_account_page()): ?>
		<div class="container">
		<div class="login-page">


	<?php endif; ?>

<?php while ( have_posts() ):the_post(); ?>


	<?php if ( is_cart() || is_checkout() || is_account_page()): ?>
		<?php wc_get_template_part( 'template-parts/content', 'page' ) ?>
	<?php endif; ?>


<?php endwhile; ?>


	</div>
	</div>
<?php 	get_footer(); ?>