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
					<a href="https://www.facebook.com/porcausaorg" class="icon fb" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://www.flickr.com/photos/140027404@N02/" class="icon fl" target="_blank"><i class="fa fa-flickr"></i></a>
					<a href="https://www.pinterest.com/porcausa/" class="icon pi" target="_blank"><i class="fa fa-pinterest"></i></a>
					<a href="https://www.instagram.com/porcausa_org/" class="icon ig" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="https://vimeo.com/porcausa" class="icon vi" target="_blank"><i class="fa fa-vimeo"></i></a>
					<a href="https://twitter.com/porCausaorg" class="icon tw" target="_blank"><i class="fa fa-twitter"></i></a>

					<a href="https://storify.com/porCausaorg" class="icon st" target="_blank"><i class="icon-ico_storify"></i></a>
					<a href="https://www.youtube.com/channel/UCO9I81-eFep1weqs2JZ9aGg" class="icon yt" target="_blank"><i class="fa fa-youtube-play"></i></a>
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

	<div class="donate-box">
		<i class="fa fa-heart"></i>
		ayudanos a crear un buen periodismo
		<a class="btn btn-block" href="https://actua.porcausa.org/haztesocio/datos​">Donar</a>
		<a class="close-btn" href="#">x</a>
	</div>
	<?php wp_footer(); ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-42658230-1', 'porcausa.org');
	  ga('send', 'pageview');

	</script>

</body>
</html>
