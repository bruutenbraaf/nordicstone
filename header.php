<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<?php wp_head(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title('|', true, 'right'); ?> </title>	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() )?>/style.css" type="text/css" media="all" />


</head>
<body>
	<div class="nav">
		<div class="container">
			<div class="row menu">
				<div class="col-md-2 branding">
					<?php if ( get_field( 'upload_logo', 'option' ) ) { ?>
						<a href="<?php echo get_home_url(); ?>">
							<img src="<?php the_field( 'upload_logo', 'option' ); ?>" />
						</a>
					<?php } ?>
				</div>
				<div class="hamburger">
					<div class="cheese">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
				<div class="col-md-8 categorie">
					<ul>
									<?php
						  $taxonomy     = 'product_cat';
						  $orderby      = 'name';  
						  $show_count   = 1;      // 1 for yes, 0 for no
						  $pad_counts   = 0;      // 1 for yes, 0 for no
						  $hierarchical = 0;      // 1 for yes, 0 for no  
						  $title        = '';  
						  $empty        = 0;
						
						  $args = array(
						         'taxonomy'     => $taxonomy,
						         'orderby'      => $orderby,
						         'show_count'   => $show_count,
						         'pad_counts'   => $pad_counts,
						         'hierarchical' => $hierarchical,
						         'title_li'     => $title,
						         'hide_empty'   => $empty
						  );
						 $all_categories = get_categories( $args );
						 foreach ($all_categories as $cat) {
						    if($cat->category_parent == 0) {
						        $category_id = $cat->term_id;       
						        echo '<li><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
						
						        $args2 = array(
						            'taxonomy'     => $taxonomy,
						            'parent'       => $category_id,
						            'orderby'      => $orderby,
						            'show_count'   => $show_count,
						            'pad_counts'   => $pad_counts,
						            'hierarchical' => $hierarchical,
						            'title_li'     => $title,
						            'hide_empty'   => $empty
						        );
						
						        $sub_cats = get_categories( $args2 );
						
						        if($sub_cats) {
								echo  '<ul class="sub_cat">';
						            foreach($sub_cats as $sub_category) {
						                echo  '<li> <a href="'. get_term_link($sub_category->slug, 'product_cat') .'"> '. $sub_category->name .'</a></li>';
						        }
						        echo  '</ul>';
						        }
						    }       
						}
						?>
					</ul>
				</div>
				<div class="col-md-2 user_menu">
					
					
					<ul>
					    <li id="one">
					        <a href="#" class="open">
						        
						        
						        <svg id="user_icon" data-name="user icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path id="Shape" d="M15.62,13.57c-2.58-.59-5-1.12-3.82-3.31C15.34,3.57,12.74,0,9,0S2.65,3.71,6.2,10.26C7.4,12.47,4.91,13,2.38,13.57.08,14.1,0,15.25,0,17.25V18H18v-.73C18,15.26,17.93,14.11,15.62,13.57Z" transform="translate(0 0)"/></svg>
						        
						        
					        </a>
					        <div class="box">
						        
						        <?php wp_nav_menu( $args ); ?>
						        
					        </div>        
					    </li>
					    <li id="two">
					        <a href="#" class="open cart_icon"><?php get_template_part( 'count', 'index' ); ?></a>
					        <div class="box">
						        
						        <?php
								    global $woocommerce;
								    $items = $woocommerce->cart->get_cart();
								
								        foreach($items as $item => $values) { 
								            $_product =  wc_get_product( $values['data']->get_id()); 
								            echo "<span class='info'>" .$values['quantity'].'x <b>'.$_product->get_title().'</b>'; 
								            $price = get_post_meta($values['product_id'] , '_price', '</span>', true);
								            echo "</span><hr>";
								        } 
								?>
								
								<span class="sub_cart_total">Totaal:</span> <?php echo $woocommerce->cart->get_cart_total(); ?>
								<a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" class="button">Afrekenen</a>
						        
					        </div>
					    </li>
					     <li id="three">
					        <a href="#" class="open">
						        
						        
						        <svg id="search_icon" data-name="search icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path id="Shape" d="M6.91,13.72A6.89,6.89,0,0,1,0,6.86a6.91,6.91,0,0,1,13.82,0A6.89,6.89,0,0,1,6.91,13.72Zm0-11.38a4.52,4.52,0,1,0,4.55,4.52A4.54,4.54,0,0,0,6.91,2.34Zm7,9.33a8.35,8.35,0,0,1-2.31,2.24L15.72,18,18,15.74l-4.09-4.07Z" transform="translate(0 0)"/></svg>
						        
						        
					        </a>
					        <div class="box header_search">
						        <?php get_search_form(); ?>
					        </div>
					    </li>
					</ul>



					
					
				</div>
			</div>
		</div>
	</div>
	<?php if ( have_rows( 'onze_kwaliteiten', 'option' ) ): ?>
	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul>	
						<?php while ( have_rows( 'onze_kwaliteiten', 'option' ) ) : the_row(); ?>					
							<?php if ( get_row_layout() == 'kwaliteit' ) : ?>
								<li>
									<?php the_sub_field( 'kwaliteit' ); ?>
								</li>
							<?php endif; ?>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
		<?php // no layouts found ?>
	<?php endif; ?>