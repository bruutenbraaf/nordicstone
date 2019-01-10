<?php get_header(); ?>
<?php if ( have_rows( 'carousel', 'option' ) ): ?>
<div class="home_carousel">
	<div id="carouselcontrols" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
		  <?php while ( have_rows( 'carousel', 'option' ) ) : the_row(); ?>
		  <?php if ( get_row_layout() == 'carousel_item' ) : ?>
		  	<?php if ( get_sub_field( 'afbeelding' ) ) { ?>
		  	<?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
			<?php if ( $afbeelding ) { ?>
				<div class="carousel-item" style="background-image:url(<?php the_sub_field( 'afbeelding' ); ?>);">
		    <?php } ?>
		    <div class="container">
			    <div class="row">
				    <div class="col-md-12 content_slider" data-0="margin-top:0px; opacity:1;" data-300="opacity:1; margin-top:200px; opacity:0;" data-400="opacity:0;">
					    <h1 style="color:<?php the_sub_field( 'tekst_kleur' ); ?>;"><?php the_sub_field( 'titel' ); ?></h1>
					    <h3 style="color:<?php the_sub_field( 'tekst_kleur' ); ?>;"><?php the_sub_field( 'ondertitel' ); ?></h3>
					    <?php $knop_link = get_sub_field( 'knop_link' ); ?>
						<?php if ( $knop_link ) { ?>
							<a class="button" href="<?php echo $knop_link['url']; ?>" target="<?php echo $knop_link['target']; ?>"><?php echo $knop_link['title']; ?></a>
						<?php } ?>
				    </div>
			    </div>
		    </div>
	 
	    </div>
	    			<?php } ?>
				<?php endif; ?>
			<?php endwhile; ?>
	  </div>
	  
	 <div class="carousel-controls">
		  <a class="carousel-back" href="#carouselcontrols" role="button" data-slide="prev">
		   	<img src="<?php echo esc_url( get_template_directory_uri() )?>/img/arrow_left.svg">
		  </a>		  
		  <div class="dash"></div>
		  <a class="carousel-next" href="#carouselcontrols" role="button" data-slide="next">
		   	<img src="<?php echo esc_url( get_template_directory_uri() )?>/img/arrow_right.svg">
		  </a>
		</div>
	</div>
	<div class="down">
		<i class="fa fa-angle-down" aria-hidden="true"></i>
	</div>
</div>

<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>




<?php $header_afbeelding = get_field( 'header_afbeelding' ); ?>

<?php if ( $header_afbeelding ) { ?>
  <div id="header" style="background-image: url(<?php echo $header_afbeelding['url']; ?>);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <?php the_field( 'header_tekst' ); ?>
        </div>
      </div>
    </div>
    <?php if ( get_field( 'cta_buttons' ) == 1 ) { ?>
      <div class="buttons-header">
        <div class="buttons-header-inner">
          <?php if ( have_rows( 'buttons' ) ) : ?>
           	<?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
           		<?php $button_1 = get_sub_field( 'button_1' ); ?>
           		<?php if ( $button_1 ) { ?>
           			<a class="btn btn-blue" href="<?php echo $button_1['url']; ?>" target="<?php echo $button_1['target']; ?>"><?php echo $button_1['title']; ?></a>
           		<?php } ?>
           		<?php $button_2 = get_sub_field( 'button_2' ); ?>
           		<?php if ( $button_2 ) { ?>
           			<a class="btn btn-red btn-arrow" href="<?php echo $button_2['url']; ?>" target="<?php echo $button_2['target']; ?>"><?php echo $button_2['title']; ?></a>
           		<?php } ?>
           	<?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    <?php } ?>
  </div>
<?php } ?>

<?php if ( have_rows( 'content' ) ): ?>
	<?php while ( have_rows( 'content' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'uitgelichte_categorieen' ) : ?>		
			<main id="homepagina-categories">		
				<?php $terms = get_sub_field( 'categorieen' ); ?>
				<?php if( $terms ): ?>
					<ul>
						<?php foreach( $terms as $term ): ?>
							<?php $termobject = get_term_by('id', $term, 'product_cat');?>
							<?php $thumbnail_id = get_woocommerce_term_meta( $term, 'thumbnail_id', true );?>
							<?php $image = wp_get_attachment_url( $thumbnail_id );?>						
							<li class="categorie-hp">						
								<a href="<?php echo get_term_link( $term ); ?>"> 
									<div class="categorie-image" style="background-image:url(<?php echo $image ?>);"></div>
									<span class="categorie-name"><?php echo $termobject->name;?> 
								</a>						
							</li>				
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>			
			</main>
			
		<?php elseif ( get_row_layout() == 'best_verkochte_producten' ) : ?>
			<section id="best-verkochte-producten">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
						<div id="<?php the_sub_field( 'id' ); ?>" class="arrows">
						</div>
						<h2 class="uitgelicht"><?php the_sub_field( 'titel' ); ?></h2>
						</div>
						<div class="col-md-12">
							<div class="product-slide <?php the_sub_field( 'id' ); ?>">
								<?php $post_objects = get_sub_field( 'selected_producten' ); ?>
								<?php if ( $post_objects ): ?>
									<?php foreach ( $post_objects as $post ):  ?>
										<?php setup_postdata( $post ); ?>	
											<?php $product = wc_get_product( $post );?>
											<div class="product-home">
											<a href="<?php the_permalink(); ?>">
												<div class="product-image-home" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post_object );?>);">	
												</div>												
												<span class="product-title"><?php the_title(); ?></span>										
					 							<?php echo $product->get_price_html(); ?>
				 							</a>
										</div>
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>				
			<script>
				jQuery(document).ready(function(){							
					jQuery('.<?php the_sub_field( 'id' ); ?>').slick({
						infinite: true,
						slidesToShow: 4,
						appendArrows: $('#<?php the_sub_field( 'id' ); ?>'),
						 responsive: [
						    {
						      breakpoint: 1024,
						      settings: {
						        slidesToShow: 3,
						        slidesToScroll: 3,
						        infinite: true,
						      }
						    },
						    {
						      breakpoint: 600,
						      settings: {
						        slidesToShow: 2,
						        slidesToScroll: 2,
						      }
						    },
						    {
						      breakpoint: 480,
						      settings: {
						        slidesToShow: 1,
						        slidesToScroll: 1,
						      }
						    }
						    // You can unslick at a given breakpoint now by adding:
						    // settings: "unslick"
						    // instead of a settings object
						  ]
					});
				});
		</script>
	<?php elseif ( get_row_layout() == 'full_width_tekst' ) : ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php the_sub_field( 'content' ); ?>
				</div>
			</div>
		</div>
	<?php elseif ( get_row_layout() == 'toon_sale_producten' ) : ?>
	<?php if( get_sub_field( 'sale-producten' ) == 1 ) : ?>
		<section id="sale-producten">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<a class="sale-prev" href="#uitgelichtslider" role="button">
			                <i class="fa fa-angle-down" aria-hidden="true"></i>
			            </a>
			            <a class="sale-next" href="#uitgelichtslider" role="button">
			                <i class="fa fa-angle-down" aria-hidden="true"></i>
			            </a>
						<h2 class="uitgelicht"><?php the_sub_field( 'titel' ); ?></h2>
					</div>			
					<div class="sale-product-slide">		
						<?php								
							$sales = array(
							    'posts_per_page'    => 8,
							    'no_found_rows'     => 1,
							    'post_status'       => 'publish',
							    'post_type'         => 'product',
							    'meta_query'        => WC()->query->get_meta_query(),
							    'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
							);
							
							$wc_query = new WP_Query($sales); 
							?>
							<?php if ($wc_query->have_posts()) : ?>
							<?php while ($wc_query->have_posts()) : $wc_query->the_post();  ?>		
							<div class="product-home">
										<a href="<?php the_permalink(); ?>">
											<div class="product-image-home" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post_object );?>);">										
											</div>												
											<span class="product-title"><?php the_title(); ?></span>										
				 							<?php echo $product->get_price_html(); ?>
			 							</a>
									</div>
							
							
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
							<?php else:  ?>
							<p>
							     <?php _e( 'No Products' ); // (6) ?>
							</p>
						<?php endif; ?>				
					</div>
					<script>
						jQuery(document).ready(function(){
							jQuery('.sale-product-slide').slick({
								infinite: true,
								slidesToShow: 4,
								nextArrow: $('.sale-next'),
								prevArrow: $('.sale-prev'),
								 responsive: [
								    {
								      breakpoint: 1024,
								      settings: {
								        slidesToShow: 3,
								        slidesToScroll: 3,
								        infinite: true,
								      }
								    },
								    {
								      breakpoint: 600,
								      settings: {
								        slidesToShow: 2,
								        slidesToScroll: 2,
								      }
								    },
								    {
								      breakpoint: 480,
								      settings: {
								        slidesToShow: 1,
								        slidesToScroll: 1,
								      }
								    }
								    // You can unslick at a given breakpoint now by adding:
								    // settings: "unslick"
								    // instead of a settings object
								  ]
							});
						});
					</script>																			
				</div>
			</div>
		</section>
		<?php else :?> 
		<?php endif;?>
		<?php elseif ( get_row_layout() == 'acties' ) : ?>
		<section id="acties">
			<?php if ( have_rows( 'links' ) ) : ?>
				<?php while ( have_rows( 'links' ) ) : the_row(); ?>
				<?php $knop = get_sub_field( 'knop' ); ?><?php if ( $knop ) { ?><a href="<?php echo $knop['url']; ?>"><?php } ?>
							<?php $achtergrond_afbeelding = get_sub_field( 'achtergrond_afbeelding' ); ?>
							<div class="uitgelicht_l" style="background-image:url(<?php if ( $achtergrond_afbeelding ) { ?><?php echo $achtergrond_afbeelding['url']; ?><?php } ?>);">
							
							<div class="boxed"><?php the_sub_field( 'tekst' ); ?></div>
							</div>
						</a>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php if ( have_rows( 'Rechts' ) ) : ?>
				<?php while ( have_rows( 'Rechts' ) ) : the_row(); ?>
				<?php $knop = get_sub_field( 'knop' ); ?><?php if ( $knop ) { ?><a href="<?php echo $knop['url']; ?>"><?php } ?> 
					
						<div class="uitgelicht_r" style="background-image:url(<?php $achtergrond_rechts = get_sub_field( 'achtergrond_rechts' ); ?><?php if ( $achtergrond_rechts ) { ?><?php echo $achtergrond_rechts['url']; ?><?php } ?>);">
						<div class="boxed"><?php the_sub_field( 'tekst' ); ?></div>
						</div></a>
				<?php endwhile; ?>
			<?php endif; ?>
		</section>
		<?php endif; ?>
		<?php endwhile; ?>
	</section>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php the_content();?>
		</div>
	</div>
</div>

<?php get_footer(); ?>