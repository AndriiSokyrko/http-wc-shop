<?php
	/**
	 * Created by PhpStorm.
	 * User: user
	 * Date: 21.03.2018
	 * Time: 18:10
	 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	get_header();
	wp_navigation();
?>

	<div class="container">
		<?php do_action('woocommerce_before_main_content') ?>
		<div class="products-page">
			<?php get_sidebar(); ?>
			<?php while ( have_posts() ): the_post(); ?>
				<?php wc_get_template_part( 'content', 'single-product' ) ?>

			<?php endwhile; ?>

			 
			<div class="clearfix"></div>
		</div>
	</div>
	<?php do_action('woocommerce_after_main_content') ?>

<?php
	get_sidebar( 'content-bottom' );

	get_footer();
?>