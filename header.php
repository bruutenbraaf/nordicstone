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
					        <a href="#" class="open"><img src="<?php echo esc_url( get_template_directory_uri() )?>/img/user.svg"></a>
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
					        <a href="#" class="open"><img src="<?php echo esc_url( get_template_directory_uri() )?>/img/search.svg"></a>
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

	