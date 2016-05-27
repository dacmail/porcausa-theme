<?php get_header() ?>
<div class="container">
	<article class="hentry">
		<div class="article-wrapper">
			<h1 class="section-title">
				<?php _e('La p&aacute;gina que buscas no existe', 'ungrynerd'); ?>
			</h1>

			<div class="post-content clearfix">
				<p><a href="<?php echo home_url(); ?>"><?php _e('Vuelve a la p&aacute;gina de inicio', 'ungrynerd'); ?></a></p>
			</div>
		</div>
	</article>
</div>
<?php get_footer() ?>