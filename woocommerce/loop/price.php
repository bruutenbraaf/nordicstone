<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>
<div class="grid_info">
	<?php if ( $price_html = $product->get_price_html() ) : ?>
		<span class="incl_price"><?php echo $price_html; ?></span>
	<?php endif; ?>
</div>


<div class="container list_items">
	<div class="row">
		<div class="col-md-12">
		<?php if ( $price_html = $product->get_price_html() ) : ?>
			<span class="incl_price"><?php echo $price_html; ?></span>
		<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8"><?php the_excerpt(); ?></div>
		<div class="col-md-4 list_b">
			
<?php echo do_shortcode('[stock_status]'); ?>
			
			<button> Bekijk product </button></div>
	</div>
</div>