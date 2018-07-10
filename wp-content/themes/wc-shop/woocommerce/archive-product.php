<?php


	get_header();
?>

<!-- header-section-ends -->
<?php wp_navigation(); ?>
<?php get_template_part( 'top', 'banner' ) ?>

<!-- content-section-starts-here -->
<?php do_action( 'woocommerce_before_main_content' ) ?>
<?php do_action( 'woocommerce_arhive_description' ) ?>

<div class="online-strip">

	<div class="col-md-4 follow-us">
		<?php dynamic_sidebar( 'Follow us' ) ?>
	</div>
	<div class="col-md-4 shipping-grid">

		<?php dynamic_sidebar( 'Shipping' ) ?>


		<div class="clearfix"></div>
	</div>
	<div class="col-md-4 online-order">
		<p>Order online</p>
		<h3>Тел: <?php echo get_option( 'new_phone' ); ?></h3>
	</div>
	<div class="clearfix"></div>
</div>

<?php
	global $wp_query;
	$wp_query = new WP_Query( [
		'post_type'     => 'product',
		'post_per_page' => 9,
//		'meta_key'=>'_featured',
//		'meta_value'=>'yes'
	] );
?>
<?php if ( $wp_query->have_posts() ): ?>

  	<?php woocommerce_product_loop_start(); ?>

	<?php while ( $wp_query->have_posts() ): $wp_query->the_post(); ?>
		<?php wc_get_template_part( 'content', 'product' ) ?>
	<?php endwhile; ?>

	<div class="clearfix"></div>
	<?php  woocommerce_product_loop_end(); ?>
<?php endif; ?>


<?php do_action( 'woocommerce_after_main_content' ) ?>

<?php get_sidebar( 'content-bottom' ) ?>

<!-- content-section-ends-here -->


<?php get_footer(); ?>
