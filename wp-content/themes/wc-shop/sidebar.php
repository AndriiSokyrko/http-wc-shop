<div class="products">
	<?php dynamic_sidebar( 'left_sidebar' ) ?>

	<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>

		<?php $tags = wp_tag_cloud('smallest=8&largest=22&taxonomy=product_tag&format=array'); ?>

		<div class="tags">
			<h4 class="tag_head">Tags Widget</h4>
			<ul class="tags_links">
				<?php if ( is_array( $tags ) ) : ?>
					<?php foreach ( $tags as $tag ): ?>
						<li><a href="#"><?php echo $tag; ?></a></li>
					<?php endforeach; ?>


				<?php endif; ?>
			</ul>

		</div>
	<?php endif; ?>
</div>