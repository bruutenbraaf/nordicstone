<?php
/*
Template Name: Contact page
*/
get_header(); ?>
	<div class="container woocommerce_container the_content">
		<div class="row">
			<div class="col-md-4">
				<?php dynamic_sidebar( 'contat_sidebar' ); ?>
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
<?php get_footer(); ?>