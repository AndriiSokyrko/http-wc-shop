<?php
	/**
	 * Created by PhpStorm.
	 * User: user
	 * Date: 24.03.2018
	 * Time: 12:09
	 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
?>
<div class="dreamcrub">
	<ul class="breadcrumbs">
		 <?php woocommerce_breadcrumb() ?>
	</ul>

	<div class="clearfix"></div>
	<h2><?php  the_title()?></h2>
	
	<?php the_content() ;	?>


	
</div>
