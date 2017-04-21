<?php get_header() ?>
<section id="home-blocks" class="container">
	<div class="row home-blocks-container">
		<?php dynamic_sidebar("home-blocks"); ?>
    <div class="col-md-4"></div>
	</div> <!-- /.row -->
</section>
<?php get_template_part('templates/tabs'); ?>
<?php get_template_part('templates/column-blog-posts'); ?>
<section id="home-blocks-bottom" class="container">
	<div class="row home-blocks-container">
		<?php dynamic_sidebar("home-blocks-bottom"); ?>
		<div class="col-md-4"></div>
	</div> <!-- /.row -->
</section>
<?php get_footer() ?>
