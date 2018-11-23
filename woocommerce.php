<?php
/*
Template Name: WooCommerce
*/
get_header(); ?>
<div class="container woocommerce_container the_content">
	<div class="row">
		<div class="col-md-12">
		
		Woocommerce
			
			
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			
			
			
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>