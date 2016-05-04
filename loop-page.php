<div class="container">
<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="article-wrapper">
			<h1 class="section-title">
				<?php the_title(); ?>
			</h1>
			
			<div class="post-meta clearfix">
				<?php get_template_part('templates/post-share'); ?>
			</div>

			<div class="post-content clearfix">
				<?php the_content( __('Leer m&aacute;s &raquo;', 'ungrynerd')); ?>
			</div>
			<div class="post-meta clearfix">
				<?php get_template_part('templates/post-share'); ?>
			</div>
		</div>
	</article>
<?php endwhile; ?>
</div>