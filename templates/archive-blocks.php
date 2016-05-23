<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
	<div class="col-md-6 home-block-wrap">
		<article <?php post_class('home-block') ?>>
			<header class="post-header">
				<?php if (!get_post_meta(get_the_ID(), '_ungrynerd_hide_thumb_cover', true)): ?>
					<?php the_post_thumbnail($type); ?>
				<?php endif; ?>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</header>
			<div class="post-author">Por <?php the_author_posts_link() ?> <strong>/ <?php the_time(get_option('date_format')); ?></strong></div>
			<div class="post-content">
				<?php the_excerpt(); ?>
			</div>
			<?php if (get_post_meta(get_the_ID(), '_ungrynerd_links', true)): ?>
				<ul class="post-links clearfix">
				<?php foreach (get_post_meta(get_the_ID(), '_ungrynerd_links', true) as $link) : ?>
					<li><a href="<?php echo esc_url($link[1]) ?>"><?php echo $link[0] ?></a></li>
				<?php endforeach; ?>
				</ul>
			<?php endif ?>
			
		</article>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<div class="col-md-4 home-block-wrap"></div>

