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
			<?php dynamic_sidebar( 'shop_bar' ); ?>
		</div>
		<div class="col-md-9 the_woocommerce_loop">
			
			
			
<?php if ( get_field( 'achtergrond', 'option' ) ) { ?>
	    <div class="nieuwsbrief" style="background:url('<?php the_field( 'achtergrond', 'option' ); ?>'); background-position:<?php the_field( 'achtergrond_positie', 'option' ); ?>;">
		    
		    <div class="container">
			    <div class="row">
				    <div class="col-md-12">
					    <h2><?php the_field( 'nieuwsbrief_titel', 'option' ); ?></h2>
					    <h3><?php the_field( 'nieuwsbrief_ondertitel', 'option' ); ?></h3>

							<div id="mc_embed_signup">
							<form action="https://bruutenbraaf.us16.list-manage.com/subscribe/post?u=1a6a2cedd02abed0b5ebb974f&amp;id=c410026ca5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							    <div id="mc_embed_signup_scroll">
								
								<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Vul hier uw e-mailadres in" required>
							    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_1a6a2cedd02abed0b5ebb974f_c410026ca5" tabindex="-1" value=""></div>
							    <input type="submit" value="Aanmelden" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
							    </div>
							</form>
							</div>
				    </div>
			    </div>
			    <div class="overlay">
	</div>
		    </div>
	<?php } ?>
			
			
			
			
 <h1 class="shop_title"><?php woocommerce_page_title(); ?></h1>
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
