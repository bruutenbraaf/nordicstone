<?php get_header(); ?>

<main id="main-content nietgevonden" class="contact-content-main">
<?php get_template_part( 'template-parts/content', 'breadcrumbs' ); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2><?php _e('De pagina die u probeert te bereiken kan helaas niet gevonden worden.','convident-theme'); ?></h2>
				<p>
					<?php _e('Helaas, deze pagina bestaan niet (meer).','convident-theme'); ?>
					<?php _e('Voor vragen of opmerkingen zijn wij te bereiken via het contactformulier op deze website.','convident-theme'); ?>
				</p>
				<p>
				<h3><?php _e('Verder zoeken naar uw pagina?','convident-theme'); ?></h3>
				<div class="search-404"><?php get_search_form(); ?></div>
				</p>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12 sidebar">
				<?php dynamic_sidebar('404-sidebar'); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>