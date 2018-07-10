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
	<div class="products-page">
		<?php get_sidebar() ?>

		<div class="new-product">
			<?php remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );

			do_action( 'woocommerce_before_main_content');
				?>

			<div class="mens-toolbar">

				<?php do_action('woocommerce_before_shop_loop'); ?>

				<div class="clearfix"></div>
			</div>
			<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
				<div class="cbp-vm-options">
					<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid"
					   title="grid">Grid View</a>
					<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
				</div>
				<div class="pages">
					<div class="limiter visible-desktop">
						<label>Show</label>
						<select id="pagination-posts">
							<option <?php if($_GET['ppp']==3): ?>  selected="selected"<?php endif; ?>value="3">
								3
							</option>
							<option <?php if($_GET['ppp']==6): ?>  selected="selected"<?php endif; ?>value="6">
								6
							</option>
							<option <?php if($_GET['ppp']==9) :?>  selected="selected"<?php endif; ?>value="9">
								9
							</option>
						</select> per page
					</div>
				</div>
				<div class="clearfix"></div>
				<?php if ( have_posts() ): ?>
					<ul>
						<?php while ( have_posts() ): the_post(); ?>
							<?php wc_get_template_part( 'content', 'product-cat' ); ?>
						<?php endwhile; ?>

					</ul>
				<?php else: ?>
					<?php wc_get_template_part( 'loop/no-products-found' ) ?>
				<?php endif; ?>
			</div>
			<?php
				wp_enqueue_script( 'cbpViewModeSwitch-js', get_template_directory_uri() . '/js/cbpViewModeSwitch.js' );
				wp_enqueue_script( 'classie-js', get_template_directory_uri() . '/js/classie.js' );

			?>
			<?php do_action('woocommerce_after_shop_loop'); ?>


		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>

</div>
<?php
	get_sidebar( 'content-bottom' );

	get_footer();
?>
