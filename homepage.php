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
	    <div class="carousel-item" style="background:url('<?php echo $afbeelding['sizes']['homepage-slide']; ?>');">
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
		<h1>Maak je gereed voor een avontuur</h1>
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
			
			<?php endwhile;
			wp_reset_query(); ?>
            </div>
         </div>
	</div>
</div>
</div>
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
	    </div>
	<?php } ?>
	
	
		<div class="container home_tabs">
			<div class="row">
				<div class="col-md-6">
					<div class="action">
							  <h2>Gratis verzending?</h2>
							  Uw pakket gratis thuis bezorgd?
							  Gebruik de onderstaand actiecode bij uw bestelling en wij bezorgen uw pakket gratis thuis.
							  <div class="actiecode">
								  GD3G45G R4GD4 654FG
							  </div>
							  <a class="white-button">
								  Direct winkelen
							  </a>
					</div>
				</div>
				<div class="col-md-6">
					
					 <ul class="nav nav-tabs" id="myTab"role="tablist">
					    <li role="presentation"><a href="#schoenen" class="active" aria-controls="home" role="tab" data-toggle="tab">Schoenen</a></li>
					    <li role="presentation"><a href="#laarzen" aria-controls="profile" role="tab" data-toggle="tab">Laarzen</a></li>
					    <li role="presentation"><a href="#riemen" aria-controls="messages" role="tab" data-toggle="tab">Riemen</a></li>
					    <li role="presentation"><a href="#schaatsen" aria-controls="settings" role="tab" data-toggle="tab">Schaatsen</a></li>
					  </ul>
					 <div class="tab-content tab_products">
					    <div role="tabpanel" class="tab-pane active" id="schoenen">
						    						  
						    <ul class="uitgelichte_producten_homepagina">
			<?php
        $args = array(
		    'posts_per_page'   => 3,
		    'orderby'          => 'rand',
		    'post_type'        => 'product',
		    'product_cat' => 'schoenen',
		    'meta_query'  => array(
		    'key'     => '_featured',
		    'value'   => 'yes'
    )
);

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

<li><a href="<?php echo the_permalink(); ?>">
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
    <div class="product_image" style="background:url('<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>');"></div>
       <span class="title"><?php the_title(); ?></span>
	   <span class="price"><?php woocommerce_get_template( 'loop/price.php' ); ?></span><br>
    </a>
</li>

<?php endwhile;
wp_reset_query(); ?>
</ul>

						    
					    </div>
					    <div role="tabpanel" class="tab-pane" id="laarzen">
						    
						   <ul class="uitgelichte_producten_homepagina">  
						    <?php
        $args = array(
		    'posts_per_page'   => 3,
		    'orderby'          => 'rand',
		    'post_type'        => 'product',
		    'product_cat' => 'laarzen',
		    'meta_query'  => array(
		    'key'     => '_featured',
		    'value'   => 'yes'
    )
);

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

<li><a href="<?php echo the_permalink(); ?>">
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
    <div class="product_image" style="background:url('<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>');">
    </div>
       <span class="title"><?php the_title(); ?></span>
	   <span class="price"><?php woocommerce_get_template( 'loop/price.php' ); ?></span><br>
    </a>
</li>

<?php endwhile;
wp_reset_query(); ?>
</ul>

						    
						    
					    </div>
					    <div role="tabpanel" class="tab-pane" id="riemen">
						    <ul class="uitgelichte_producten_homepagina"> 
						    						    <?php
        $args = array(
		    'posts_per_page'   => 3,
		    'orderby'          => 'rand',
		    'post_type'        => 'product',
		    'product_cat' => 'riemen',
		    'meta_query'  => array(
		    'key'     => '_featured',
		    'value'   => 'yes'
    )
);

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

<li><a href="<?php echo the_permalink(); ?>">
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
    <div class="product_image" style="background:url('<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>');">
    </div>
       <span class="title"><?php the_title(); ?></span>
	   <span class="price"><?php woocommerce_get_template( 'loop/price.php' ); ?></span><br>
    </a>
</li>

<?php endwhile;
wp_reset_query(); ?>
</ul>
						    
						    
					    </div>
					    <div role="tabpanel" class="tab-pane" id="schaatsen">
						    
						    
						    <ul class="uitgelichte_producten_homepagina"> 
						    						    <?php
        $args = array(
		    'posts_per_page'   => 3,
		    'orderby'          => 'rand',
		    'post_type'        => 'product',
		    'product_cat' => 'schaatsen',
		    'meta_query'  => array(
		    'key'     => '_featured',
		    'value'   => 'yes'
    )
);

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

<li><a href="<?php echo the_permalink(); ?>">
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
    <div class="product_image" style="background:url('<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>');">
    </div>
       <span class="title"><?php the_title(); ?></span>
	   <span class="price"><?php woocommerce_get_template( 'loop/price.php' ); ?></span><br>
    </a>
</li>

<?php endwhile;
wp_reset_query(); ?>
</ul>

						    
						    
					    	</div>
					  </div>
				</div>
			</div>
		</div>



<?php get_footer(); ?>