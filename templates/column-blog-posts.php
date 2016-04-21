<section id="blog" class="container columns-blog-posts">
	<header class="section-title">
		Blog
	</header>
	<div class="row">
		<?php $blog = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 2)); ?>
		<?php while ($blog->have_posts() ) : $blog->the_post(); ?>
			<div class="col-sm-6">
				<article <?php post_class(); ?>>
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="post-author">
						Por <?php the_author_posts_link() ?> 
						<strong>/ <?php the_time(get_option('date_format')); ?></strong>
					</div>
					<div class="post-content">
						<?php the_excerpt(); ?>
					</div>
				</article>
			</div>
		<?php endwhile; ?>
		
	</div>
</section>