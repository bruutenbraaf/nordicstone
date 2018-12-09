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
				
				<h2 class="widgetitle">Makkelijk online shoppen</h2>
				<ul>
					<li><img src="<?php echo esc_url( get_template_directory_uri() )?>/img/truck.svg">Levering in heel Europa</li>
					<li><img src="<?php echo esc_url( get_template_directory_uri() )?>/img/return.svg">Makkelijk retour</li>
					<li><img src="<?php echo esc_url( get_template_directory_uri() )?>/img/bedenktijd.svg">14 dagen bedenktijd</li>
				</ul>
				
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