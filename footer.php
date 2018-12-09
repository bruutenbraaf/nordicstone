<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer_een' ); ?>
			</div>
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer_twee' ); ?>
			</div>
			<div class="col-md-3 betaalveilig">
				<h2 class="widgetitle">Veilig betalen</h2>
				<ul>
					<li><img src="<?php echo esc_url( get_template_directory_uri() )?>/img/ideal.svg"></li>
					<li><img src="<?php echo esc_url( get_template_directory_uri() )?>/img/paypal.svg"></li>
				</ul>
				
				<?php dynamic_sidebar( 'footer_drie' ); ?>
				
			</div>
			<div class="col-md-3 easy">
				
				<?php if ( have_rows( 'usp' ) ) : ?>
				<h2 class="widgettitle"><?php the_field( 'titel', 'option' ); ?></h2>
					<ul>
						<?php while ( have_rows( 'usp' ) ) : the_row(); ?>
							<?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
							<?php if ( $afbeelding ) { ?>
								<img src="<?php echo $afbeelding['url']; ?>" alt="<?php echo $afbeelding['alt']; ?>" />
							<?php } ?>
							<?php the_sub_field( 'titel' ); ?>
						<?php endwhile; ?>
					</ul>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>
				
				<?php dynamic_sidebar( 'footer_vier' ); ?>
			</div>
		</div>
	</div>
</div>


<div class="up">
		<i class="fa fa-angle-down" aria-hidden="true"></i>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() )?>/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() )?>/js/scripts.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() )?>/js/slick.min.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() )?>/js/jquerymobile.min.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() )?>/js/jquery.nice-select.min.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>