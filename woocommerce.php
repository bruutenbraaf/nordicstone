<?php
/*
Template Name: WooCommerce
*/
get_header(); ?>
<section id="woocommerce_content">
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>			
</section>
<?php get_footer(); ?>