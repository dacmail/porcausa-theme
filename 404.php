<?php get_header() ?>
<div class="container">
	<article class="hentry">
		<div class="article-wrapper">
			<h1 class="section-title">
				<?php _e('La p&aacute;gina que buscas no existe', 'ungrynerd'); ?>
			</h1>

			<div class="post-content clearfix">
				<p>Los sentimos, la página que buscas no existe, puede que la URL esté mal escrita o que el recurso haya dejado de existir, puedes probar haciendo una búsqueda o volver a la página de inicio.</p>
				<form action="<?php home_url('/'); ?>">
					<p>
						<label for="s" class="obligatorio"><input id="s" name="s" placeholder="¿Qué estás buscando?" type="text"></label>
						<button type="submit" class="btn btn-next btn-primary">Buscar</button>
					</p>
				</form>
				<p><a href="<?php echo home_url(); ?>"><?php _e('Vuelve a la p&aacute;gina de inicio', 'ungrynerd'); ?></a></p>
			</div>
		</div>
	</article>
</div>
<?php get_footer() ?>