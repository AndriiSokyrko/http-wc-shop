<h3 class="like text-center"><?php echo $title; ?></h3>

<?php
	$args           = [
		'post_type'     => 'product',
		'post_per_page' => $pcount,
		'meta_key'      => '_featured',
		'meta_value'    => 'yes',
		'orderby'       => [ 'ID' => 'desc' ]
	];
	$featured_query = new WP_Query( $args );
	if ( $featured_query->have_posts() ) :
?>
<ul id="flexiselDemo3">
	<?php while ( $featured_query->have_posts() ): $featured_query->the_post(); ?>
		<li><a href=" <?php echo get_the_permalink() ?>">
				<?php echo get_the_post_thumbnail( $featured_query->post->id, 'shop_catalog', [ 'class' => 'img-responsive' ] ) ?>
			</a>
			<div class="product liked-product simpleCart_shelfItem">
				<a class="like_name" href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
				<?php

					global $product;
					$class = implode( ' ', array_filter( array(
						'button',
						'product_type_' . $product->product_type,
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
					) ) );

				?>
				<?php if ( $price_html = $product->get_price_html() ): ?>
					<p>
						<a data-quantity="1" data-id="<?php echo $product->id ?>"
						   data-product_squ="<?php echo $product->get_sku(); ?>" class="item_add <?php echo $class; ?>"
						   href="<?php esc_url( $product->add_to_cart_url() ) ?>"><i></i> <span
								class=" item_price"><?php echo $price_html ?></span></a>
					</p>
				<?php endif; ?>

			</div>
		</li>
	<?php endwhile; ?>
<?php endif; ?>


	 

</ul>
<script type="text/javascript">
	jQuery(window).load(function () {
		jQuery("#flexiselDemo3").flexisel({
			visibleItems: 4,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: {
				portrait: {
					changePoint: 480,
					visibleItems: 1
				},
				landscape: {
					changePoint: 640,
					visibleItems: 2
				},
				tablet: {
					changePoint: 768,
					visibleItems: 3
				}
			}
		});

	});
</script>
