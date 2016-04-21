	<footer id="footer" class="footer">
		<div class="container">
			<?php wp_nav_menu(array('container' => 'nav',
								'container_id' => 'foot-menu', 
								'container_class' => 'foot-nav', 
								'menu_class' => 'foot-nav-items',
								'theme_location' => 'footer',
								'fallback_cb' => false)); ?>
			<div class="row mb30">
				<div class="col-md-6"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a></div>
				<div class="col-md-6 text-right">
					<a href="#" class="icon cc" target="_blank"><i class="fa fa-creative-commons"></i></a>
					<a href="#" class="icon fb" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="#" class="icon tw" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="#" class="icon yt" target="_blank"><i class="fa fa-youtube-play"></i></a>
					<a href="#" class="icon in" target="_blank"><i class="fa fa-linkedin"></i></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p>C/ Marqués de la Ensenada 2, 6º, 28004 Madrid (España)</p>
					<p>porcausa[at]porcausa[dot]org / <a href="#">Aviso legal</a></p>
				</div>
				<div class="col-md-6 text-right">
					<p><a href="http://ungrynerd.com" target="_blank">UNGRYNERD</a> &
					<a href="http://wordpress.org">WordPress</a></p>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>