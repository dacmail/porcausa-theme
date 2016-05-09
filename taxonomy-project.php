<?php get_header() ?>
<section id="home-blocks" class="container">
	<div class="row">
		<div class="col-sm-12">
			<header class="project-head">
				<h1 class="term-title"><?php single_term_title(); ?></h1>
				<div class="term-description">
					<?php echo term_description(); ?>
				</div>
			</header>
		</div>
	</div>
	<div class="row home-blocks-container">
		<?php get_template_part('templates/project-blocks'); ?>
	</div> <!-- /.row -->
</section>
<?php get_template_part('templates/tabs'); ?>
<?php get_template_part('templates/column-blog-posts'); ?>
<?php get_footer() ?>