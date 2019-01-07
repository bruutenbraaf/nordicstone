<?php get_header(); ?>

<?php get_template_part( 'template-parts/content', 'header' ); ?>

<main id="main-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6  col-sm-12 sidebar">
				<?php dynamic_sidebar('page-sidebar'); ?>
			</div>
			<div class="col-md-8 searchresults">
			<div class="topbar-search-header">
				<?php global $wp_query; ?>
				<div class="topbar-search-header-left">
				<?php if (($wp_query->found_posts) == 1) { ?>
					<?php echo $wp_query->found_posts;?> <?php _e('Resultaat','convident-theme'); ?>
				<?php } else { ?>
					<?php echo $wp_query->found_posts;?> <?php _e('Resultaten','convident-theme'); ?>
				<?php } ?>
				</div>
				<?php $current_page = max( 1, get_query_var('paged') ); ?>
				<div class="topbar-search-header-right">
					<?php _e('Pagina ','convident-theme'); ?><?php echo $current_page;?><?php _e(' van de ','convident-theme'); ?><?php echo $wp_query->max_num_pages; ?> <?php _e('paginas','convident-theme'); ?>
				</div>
				<div class="clear-both"></div>
			</div>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="<?php the_id(); ?>-bericht">
					<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
					<?php echo excerpt(30); ?>
					</article>
				<?php endwhile; ?>
				<div class="nav-previous alignleft"><?php next_posts_link( '<' ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( '>' ); ?></div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>