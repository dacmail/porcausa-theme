<?php get_header() ?>
<section id="home-blocks" class="container">
	<div class="row">
		<div class="col-sm-12">
			<header class="project-head">
				<?php if (is_home()): ?>
					<h1 class="term-title">porCausa Blog</h1>
				<?php elseif (is_search()): ?>
					<h1 class="term-title">Busqueda: <?php the_search_query(); ?></h1>
				<?php else: ?>
					<?php g( '<h1 class="term-title">', '</h1>' ); ?>
				<?php endif ?>
			</header>
			
		</div>
	</div>
	<div class="row archive-blocks-container">
		<?php get_template_part('templates/archive-blocks'); ?>
	</div> <!-- /.row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="pagination-wrap">
				<?php ungrynerd_pagination(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>