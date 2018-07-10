<?php
	/**
	 * Single Product tabs
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
	 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
	 * as little as possible, but it does happen. When this occurs the version of the template file will.
	 * be bumped and the readme will list any important changes.
	 *
	 * @see        http://docs.woothemes.com/document/template-structure/
	 * @author  WooThemes
	 * @package WooCommerce/Templates
	 * @version 2.4.0
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$tabs = apply_filters( 'woocommerce_product_tabs', array() );

	if ( ! empty( $tabs ) ) : ?>
		<ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
			<?php $i = 0; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="test-class <?php echo ( $i == 0 ) ? 'active' : ''; ?>   ">
					<a class="deco-none misc-class"
					   href="#<?php echo $key; ?>">  <?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>

<!--				<li class="--><?php //echo esc_attr( $key ); ?><!--_tab">-->
<!--					<a href="#tab---><?php //echo esc_attr( $key ); ?><!--">--><?php //echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?><!--</a>-->
<!--				</li>-->
				<?php $i ++; ?>
			<?php endforeach; ?>
		</ul>
		<div class="tab-content responsive hidden-xs hidden-sm">
			<?php foreach ( $tabs as $key => $tab ) : ?>
<!--				<div class="panel entry-content wc-tab" id="tab---><?php //echo esc_attr( $key ); ?><!--">-->
					<?php call_user_func( $tab['callback'], $key, $tab ); ?>
<!--				</div>-->
			<?php endforeach; ?>
		</div>

<!--		--><?php //call_user_func( $tab['callback'], $key, $tab ); ?>


	<?php endif; ?>
