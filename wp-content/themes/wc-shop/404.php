<?php


	get_header();
?>

	<!-- header-section-ends -->
<?php wp_navigation(); ?>

<div class="container" style="text-align: center"><h1> Error 404. The page not found</h1></div>
<?php do_action( 'woocommerce_after_main_content' ) ?>

<?php get_sidebar('content-bottom') ?>

<!-- content-section-ends-here -->


<?php get_footer(); ?>
