<?php
	/**
	 * Created by PhpStorm.
	 * User: user
	 * Date: 16.03.2018
	 * Time: 11:48
	 */

	function wp_navigation() {
		$template    = 'navigation.php';
		$tempaltes[] = $template;
		locate_template( $tempaltes, true );
	}

	function load_styles_scripts() {
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
		wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
		if ( ! is_shop() ) {
			wp_enqueue_style( 'component', get_template_directory_uri() . '/css/component.css' );


		}
		wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/css/flexslider.css' );

		wp_enqueue_script( 'bootstrap-3.11', get_template_directory_uri() . '/js/bootstrap-3.1.1.min.js' );
		wp_enqueue_script( 'simpleCart', get_template_directory_uri() . '/js/simpleCart.min.js' );
		wp_enqueue_script( 'responsiveslides-js', get_template_directory_uri() . '/js/responsiveslides.min.js' );
		wp_enqueue_script( 'flexisel-js', get_template_directory_uri() . '/js/jquery.flexisel.js' );

		if ( is_product() ) {
			wp_enqueue_script( 'responsive-tabs', get_template_directory_uri() . '/js/responsive-tabs.js' );

			wp_enqueue_script( 'comment-reply' );
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

			add_action( 'woocommerce_after_main_content', 'woocommerce_upsell_display', 15 );
			add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 20 );


		}

	}

	add_action( 'wp_enqueue_scripts', 'load_styles_scripts' );


	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );//обнуление стилей woocommerce
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	function additaonalOption() {
		add_settings_field( 'url_slide', 'Ссылка слайдера', 'display_url', 'general' ); //1 -name field, 2-title, 3- callback function, 4- опция настроек (ganeral , discussin)
		register_setting( 'general', 'url_slide' );

		add_settings_field( 'button_slide', 'Заголовок кнопки слайдера', 'display_button', 'general' );
		register_setting( 'general', 'button_slide' );

		add_settings_field( 'new_phone', 'Телефон', 'display_phone', 'discussion' );
		register_setting( 'discussion', 'new_phone' );

	}

	function display_url() {
		echo '<input type="text" class="regular-text" name="url_slide" value="' . esc_attr( get_option( 'url_slide' ) ) . '">';
	}

	function display_button() {
		echo '<input type="text" class="regular-text" name="button_slide" value="' . esc_attr( get_option( 'button_slide' ) ) . '">';
	}

	function display_phone() {
		echo '<input type="text" class="regular-text" name="new_phone" value="' . esc_attr( get_option( 'new_phone' ) ) . '">';
	}

	add_action( 'admin_menu', 'additaonalOption' );


	add_action( 'init', 'banner_index' );
	function banner_index() {
		register_post_type( 'slider', [
			'public'        => true,
			'supports'      => [
				'title',
				'editor',
				'thumbnail'
			],
			'menu_position' => 120,
			'menu_icon'     => admin_url() . 'images/media-button-other.gif',
			'labels'        => [
				'name'         => 'Slider',
				'all_items'    => 'All slides',
				'add_new'      => 'Add new slide',
				'add_new_item' => 'New slide',

			]
		] );
	}

	register_nav_menus( [
		'top'    => 'top menu',
		'bottom' => 'footer menu',
		'left'   => 'Левое меню'
	] );

	include "inc/Custom_Walker_Nav_Menu.php";
	include "inc/fcollecting/widget.php";

	function topTemple_Widgets_init() {
		register_sidebar( [
			'name'        => 'Follow us',
			'id'          => 'Follow us',
			'description' => 'Block for social networdt',
		] );

		register_sidebar( [
			'name'        => 'Shipping',
			'id'          => 'Shipping',
			'description' => 'Block for shipping',
		] );
		register_sidebar( [
			'name'        => 'Content bottom',
			'id'          => 'content_bottom',
			'description' => 'Block for dispaling slider',
		] );
		register_sidebar( [
			'name'          => 'Footer menu',
			'id'            => 'footer',
			'description'   => 'Block for dispaling footer menu',
			'before_widget' => '<div class="col-md-3 span1_of_4">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		] );

		register_sidebar( [
			'name'          => 'Left bar',
			'id'            => 'left_sidebar',
			'description'   => 'Block for dispaling left sidebar',
			'before_widget' => '<div class="col-md-3 span1_of_4">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		] );
	}

	add_filter( 'widget_nav_menu_args', 'change_menu', '', 4 );

	function change_menu( $nav_menu_args, $nav_menu, $args, $instance ) {

		if ( $args['id'] == 'left_sidebar' ) {
			$nav_menu_args['container']  = '';
			$nav_menu_args['menu_class'] = 'product-list';

		} else {
			$nav_menu_args['container']  = '';
			$nav_menu_args['menu_class'] = 'f_nav';
		}

		return $nav_menu_args;
	}


	add_action( 'widgets_init', 'topTemple_Widgets_init' );

	add_filter( 'woocommerce_page_title', 'change_title' );
	function change_title( $page_title ) {
		return 'New ' . $page_title;
	}

	function woocommerce_template_loop_product_thumbnail() {
		if ( ! is_shop() && ! is_product() ) { ?>
			<div class="simpleCart_shelfItem">
			<div class="view view-first">
			<div class="inner_content clearfix">
			<div class="product_image">
			<?php echo mytempl_get_product_thumbnail(); ?>
			<div class="mask">
				<div class="info">Quick View</div>
			</div>
		<?php } else {


			echo woocommerce_get_product_thumbnail();
			echo '</a><div class="mask"><a href="' . get_the_permalink() . '">Quick View</a></div>';
		}
	}

	if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

		/**
		 * Get the product thumbnail, or the placeholder if not set.
		 *
		 * @subpackage    Loop
		 *
		 * @param string $size (default: 'shop_catalog')
		 * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0)
		 * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0)
		 *
		 * @return string
		 */
		function mytempl_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
			global $post;

			if ( has_post_thumbnail() ) {
				return get_the_post_thumbnail( $post->ID, $size, [ 'alt'   => 'some text',
				                                                   'class' => 'img-responsive'
				] );
			} elseif ( wc_placeholder_img_src() ) {
				return wc_placeholder_img( $size );
			}
		}
	}


	function woocommerce_template_loop_product_title() {
		if ( ! is_shop() && ! is_product() ) {
			echo '<div class="product_container"><div class="cart-left"><p class="title">' . get_the_title() . '</p></div>';
		} else {
			echo '<a class="product_name" href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
		}
	}

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 75 );

	function change_sale_flash() {
		$html = '<div class="offer otop"><p>40%</p><small>Top sale</small></div>';

		return $html;
	}

	add_filter( 'woocommerce_sale_flash', 'change_sale_flash', 10 );


	add_action( 'wp_enqueue_scripts', 'load_script', 9 );
	function load_script() {
		wp_deregister_script( 'wc-add-to-cart' );
		wp_enqueue_script( 'wc-add-to-cart', get_template_directory_uri() . '/js/add-to-cart.js', WC_VERSION, tru );
	}

	add_filter( 'dynamic_sidebar_params', 'check_sidebar_params' );

	function check_sidebar_params( $params ) {
		global $wp_registered_widgets;
		if (
			$params[0]['id'] == 'left_sidebar' && $params[0]['widget_id'] == 'nav_menu-' . $params[1]['number']
		) {
			$params[0]['before_widget'] = '<div class="product-listy">';
			$params[0]['after_widget']  = '</div>';
			$params[0]['before_title']  = '<h2>';
			$params[0]['after_title']   = '</h2>';
		} elseif ( $params[0]['id'] == 'left_sidebar' && $params[0]['widget_id'] == 'custom_html-' . $params[1]['number'] ) {

			$params[0]['before_widget'] = '<div class="latest-bis">';
			$params[0]['after_widget']  = '</div>';
		}

		return $params;
	}

	if ( ! is_shop() ) {
		remove_action( 'woocommerce_before_shop_loop_item', ' woocommerce_template_loop_product_link_open' );
		add_action( 'woocommerce_before_shop_loop_item', 'mytemplate_loop_product_link_open', 10 );
		/* sort */
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count' );
		/* pagination */
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
		add_action( 'woocommerce_before_shop_loop', 'woocommerce_pagination', 35 );

		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );


//		remove_action('woocommerce_before_after_loop_item',' woocommerce_template_loop_product_link_open');
//		add_action('woocommerce_after_shop_loop_item','mytemplate_loop_product_link_open',10);

		function mytemplate_loop_product_link_open() {
			return ' <a class="cbp-vm-image" href="' . get_the_permalink() . '">';
		}
	}
	function change_rub_symbol() {
		return 'rub.';
	}

	add_filter( 'woocommercy_currency_symbol', 'change_rub_symbol' );
	remove_action( 'woocommerce_after_loop_item_title', ' woocommerce_template_loop_rating', 5 );


	add_filter( 'woocommerce_breadcrumb_defaults', 'change_breadcrumb_args' );
	function change_breadcrumb_args() {
		return array(
			'delimiter'   => '&nbsp;<span>&gt;</span>',
			'wrap_before' => '	<div class="new-product-top">
				<ul class="product-top-list">',
			'wrap_after'  => '</ul>',
			'before'      => '<li>',
			'after'       => '</li>',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' )
		);
	}

	add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page' );
	function new_loop_shop_per_page( $cols ) {
		$cols = 6;
		if ( isset( $_GET['ppp'] ) ) {
			return $_GET['ppp'];
		}

		return $cols;
	}

	add_action( 'get_header', 'product_one_page' );
	function product_one_page() {
		if ( is_product() ) {
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 75 );

			remove_action( 'woocommerce_review_meta', 'woocommerce_review_disply_meta' );


		}
	}

//	add_filter('woocommerce_get_price_html','func_change_price',100,2);
//	function func_change_price($price, $product){
//		$html ='';
//		return $html;
//	}


	add_filter( 'woocommerce_upsell_display_args', 'change_attr_relat' );
	add_filter( 'woocommerce_output_related_products_args', 'change_attr_relat' );
	function change_attr_relat( $args ) {
		$args = array(
			'posts_per_page' => 3,
			'columns'        => 4,
			'orderby'        => 'rand'
		);

		return $args;
	}

	function woocommerce_review_display_comment_text() {
//		echo '<div class="description">';
		comment_text();
//		echo '</div>';
	}


	function shop_image_size() {
		$catalog   = [
			'witdth' => '360',
			'height' => '480',
			'crop'   => 'true'
		];
		$single    = [
			'witdth' => '770',
			'height' => '1100',
			'crop'   => 'true'
		];
		$thumbnail = [
			'witdth' => '300',
			'height' => '300',
			'crop'   => '0'
		];
		update_option( 'shop_catalog_image_size', $catalog );
		update_option( 'shop_single_image_size', $single );
		update_option( 'shop_thumbnail_image_size', $thumbnail );

	}

	do_action( 'after_switch_theme', shop_image_size );
	add_image_size( 'shop_cart_image_size', 277, 396, true );


	add_filter( 'woocommerce_cart_item_thumbnail', 'remove_width_attr', 10 );
	function remove_width_attr( $html ) {
		$html = preg_replace( '/(width|height)="\d*"/', '', $html );

		return $html;
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'filter_function_name_7795' );
	function filter_function_name_7795( $array ) {
		$html =
			'<div class="cart box_1 widget_shopping_class_content" ><a href="/cart"><h3><p class="total"> 
		       <p class="total">'
			. WC()->cart->get_cart_subtotal()
			. '</p><img src="' .
			get_template_directory_uri()
			. '/images/bag.png" alt=""></h3></a><p>
				<a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
					<div class="clearfix"> </div></div>';

		return [ 'div.widget_shopping_class_content' => $html ];    
	}
	add_action('init', 'woocommerce_clear_cart_url');
	function woocommerce_clear_cart_url(){
		global $woocommerce;
			if (isset($_GET['empty-cart'])) :
				$woocommerce->cart->empty_cart();
			 endif;
	}


?>