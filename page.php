<?php

get_header(); ?>
<?php if ( is_woocommerce()) { ?>

	<div class="container woocommerce_container the_content">
		<div class="row">
			<div class="col-md-12">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php } elseif ( is_cart() || is_checkout() ) { ?>
	
	<div class="container checkout_container the_content">
		<div class="row">
			<div class="col-md-12">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php } else { ?>
	
	
	<div class="container page_container page-content">
		<div class="row">
			<div class="col-md-4">
				<?php dynamic_sidebar( 'page_sidebar' ); ?>
			</div>
			<div class="col-md-8">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php } ?>

<?php get_footer(); ?>