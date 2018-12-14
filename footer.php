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
				<h2 class="widgetitle"><?php the_field( 'titel_betalen', 'option' ); ?></h2>
				
				<?php if ( have_rows( 'betaalmogelijkheid', 'option' ) ) : ?>
				<ul>
				<?php while ( have_rows( 'betaalmogelijkheid', 'option' ) ) : the_row(); ?>
					<li><?php $url = get_sub_field( 'url' ); ?>
					<?php if ( $url ) { ?>
						<a href="<?php echo $url['url']; ?>" target="<?php echo $url['target']; ?>">
					<?php } ?>
					<?php the_sub_field( 'afbeelding' ); ?>
					<?php $url = get_sub_field( 'url' ); ?>
					<?php if ( $url ) { ?>
						</a>
					<?php } ?>
					</li>
				<?php endwhile; ?>
				</ul>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
								
				<?php dynamic_sidebar( 'footer_drie' ); ?>
				
			</div>
			<div class="col-md-3 easy">
				
				<h2 class="widgetitle"><?php the_field( 'titel', 'option' ); ?></h2>

				<?php if ( have_rows( 'usp', 'option' ) ) : ?>
					<ul>
					<?php while ( have_rows( 'usp', 'option' ) ) : the_row(); ?>
					<li>
						<?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
						<?php if ( $afbeelding ) { ?>
							<img src="<?php echo $afbeelding['url']; ?>" alt="<?php echo $afbeelding['alt']; ?>" />
						<?php } ?>
						<?php the_sub_field( 'titel' ); ?>
					</li>
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