<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<div class="container woocommerce_loop">
	<div class="row">
		<div class="col-md-3 shop_sidebar">
			<h2 class="sidebar-main-title">Filteren</h2>
			<?php dynamic_sidebar( 'shop_bar' ); ?>
		</div>
		<div class="col-md-9 the_woocommerce_loop">		
			
 <h1 class="shop_title"><?php woocommerce_page_title(); ?></h1>
 
<div class="info-bar">
	
<div class="grid-list">
	<div id="grid">
		<i class="fa fa-th-large" aria-hidden="true"></i>
	</div>
	<div id="list">
		<i class="fa fa-list" aria-hidden="true"></i>
	</div>
</div>
 
 
 
<p class="woocommerce-result-count">
	
	<?php
	if ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
	}
	?>
</p>
