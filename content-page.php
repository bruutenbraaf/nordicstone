<?php
/*
Template Name: Content page
*/
get_header(); ?>
<section id="content">
	<div class="container woocommerce_container the_content">
		<div class="row">
			<div class="col-md-3">
				<?php dynamic_sidebar( 'content_sidebar' ); ?>
			</div>
			<div class="col-md-9">
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