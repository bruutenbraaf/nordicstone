<?php
	
/*
	
	Template name: Homepagina
	
	*/
get_header(); ?>



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
					    <a class="button" href="<?php the_sub_field( 'Knop link' ); ?>"><?php the_sub_field( 'knop_tekst' ); ?></a>
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

<div class="container uitgelicht">
	<div class="row">
		<div class="col-md-12">
			
	 <a class="ui-prev" href="#uitgelichtCarousel" role="button" data-slide="prev">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
            <a class="ui-next" href="#uitgelichtCarousel" role="button" data-slide="next">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
		<h1 class="uitgelicht"><?php the_field( 'titel' ); ?></h1>
        <div id="uitgelichtCarousel" class="carousel carousel-ui slide w-100" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">            
			    <?php
			        $args = array(
					    'posts_per_page'   => 8,
					    'orderby'          => 'rand',
					    'post_type'        => 'product',
					    'meta_query'  => array(
					    'key'     => '_featured',
					    'value'   => 'yes'
			    )
			);
			
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
			
			<div class="carousel-item"><a href="<?php echo the_permalink(); ?>">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
			    <div class="product_image" style="background:url('<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>');">
			    </div>
			       <span class="title"><?php the_title(); ?></span><br>
				   <span class="price"><?php woocommerce_get_template( 'loop/price.php' ); ?></span><br>
			    </a>
			</div>
			
			<?php endwhile; wp_reset_query(); ?>
            </div>
         </div>
	</div>
</div>
</div>



<?php if ( have_rows( 'content' ) ): ?>
	<?php while ( have_rows( 'content' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'uitgelichte_categorie' ) : ?>

<div class="container uitgelicht">
	<div class="row">
		<div class="col-md-12">		
		 	<a class="ui-prev" href="#uitgelichtslider" role="button" data-slide="prev">
	                <i class="fa fa-angle-down" aria-hidden="true"></i>
	            </a>
	            <a class="ui-next" href="#uitgelichtslider" role="button" data-slide="next">
	                <i class="fa fa-angle-down" aria-hidden="true"></i>
	            </a>
	            <h1><?php the_sub_field( 'titel' ); ?></h1>
	        <div id="uitgelichtslider" class="carousel carousel-ui slide w-100" data-ride="carousel">
	            <div class="carousel-inner w-100" role="listbox">      
		            <?php $categorie_ids = get_sub_field( 'categorie' ); ?>      
				    <?php
								$args = array(
								'posts_per_page'   => 18,
								'post_type' => 'product',
								'tax_query' => array(
									array(
									'taxonomy' => 'product_cat',
									'field' => 'term_id',
									'terms' => $categorie_ids 
									)
								)
								);
								$query2 = new WP_Query( $args );
	
								while ( $query2->have_posts() ) : $query2->the_post(); ?>
				
				<div class="carousel-item"><a href="<?php echo the_permalink(); ?>">
				    <div class="product_image" style="background-image:url(<?php the_post_thumbnail_url( $size ); ?>);">
				    </div>
				       <span class="title"><?php the_title(); ?></span><br>
					   <span class="price"><?php woocommerce_get_template( 'loop/price.php' ); ?></span><br>
				    </a>
				</div>
				
				<?php endwhile; wp_reset_query(); ?>
	            </div>
	         </div>
		</div>
	</div>
</div>
			
<?php elseif ( get_row_layout() == 'uitgelicht_categorieen_afbeelding_met_tekst' ) : ?>
			<?php if ( have_rows( 'uitgelicht_links' ) ) : ?>
				<?php while ( have_rows( 'uitgelicht_links' ) ) : the_row(); ?>
				<?php $link = get_sub_field( 'link' ); ?>
					<?php if ( $link ) { ?>
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php } ?>				
						<div class="uitgelicht_l" style="background-image:url(<?php $afbeelding = get_sub_field( 'afbeelding' ); ?><?php if ( $afbeelding ) { ?><?php echo $afbeelding['url']; ?><?php } ?>);">
					<div class="boxed"><?php the_sub_field( 'tekst' ); ?></div>
				</div></a>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php if ( have_rows( 'uitgelicht_rechts' ) ) : ?>
				<?php while ( have_rows( 'uitgelicht_rechts' ) ) : the_row(); ?>
						<?php $link = get_sub_field( 'link' ); ?>
					<?php if ( $link ) { ?>
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php } ?>				
						<div class="uitgelicht_l" style="background-image:url(<?php $afbeelding = get_sub_field( 'afbeelding' ); ?><?php if ( $afbeelding ) { ?><?php echo $afbeelding['url']; ?><?php } ?>);">
					<div class="boxed"><?php the_sub_field( 'tekst' ); ?></div>
				</div></a>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>




<?php get_footer(); ?>