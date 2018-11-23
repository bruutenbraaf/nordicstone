<?php
/*
Template Name: Contact page
*/
get_header(); ?>
<section id="contact-page">
	<div class="container woocommerce_container the_content">
		<div class="row">
			<div class="col-md-3 order-2">
				<?php dynamic_sidebar( 'contact_sidebar' ); ?>
			</div>
			<div class="col-md-9 order-1">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>