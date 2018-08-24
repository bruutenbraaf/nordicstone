<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<?php the_title( '<h3 class="single_titel">', '</h3>' ); ?>
<p class="price"><?php echo wc_price( wc_get_price_including_tax( $product ) ); ?> </p>
<span class="exl_btw"><?php echo $product->get_price_html(); ?>excl. BTW</span>
<ul class="single_list">
	<li>Binnen 3 tot 4 werkdagen thuis </li>
	<li>30 dagen bedenktijd </li>
</ul>
<hr>