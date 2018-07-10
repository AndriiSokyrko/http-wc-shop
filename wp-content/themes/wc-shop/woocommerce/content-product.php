<?php
	if (!defined('ABSPATH')){
		eixt;
	}
	global $product;


	?>
<div class="col-md-4 product simpleCart_shelfItem text-center">
  <?php  do_action('woocommerce_before_shop_loop_item') ?>
  <?php  do_action('woocommerce_before_shop_loop_item_title') ?>
  <?php  do_action('woocommerce_shop_loop_item_title') ?>
  <?php // do_action('woocommerce_after_shop_loop_item_title') ?>
  <?php  do_action('woocommerce_after_shop_loop_item') ?>
 
</div>
