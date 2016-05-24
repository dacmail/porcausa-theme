<?php $term = get_queried_object(); ?>
<?php $featured = new WP_Query(array('tax_query' => array(
										array(
											'taxonomy' => $term->taxonomy,
											'field'    => 'term_id',
											'terms'    => array($term->term_id),
										)
									),
									'meta_key' => '_ungrynerd_cat_featured', 
									'meta_value' => 1,
									'post_type' => array('article'),
									'posts_per_page' => -1)); ?>
<?php if ($featured->have_posts() ) : while ($featured->have_posts() ) : $featured->the_post(); ?>
	<div class="<?php echo get_post_meta(get_the_ID(), '_ungrynerd_post_columns', true); ?> home-block-wrap">
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
			<?php if (get_post_meta(get_the_ID(), '_ungrynerd_links', true)): $i=1; ?>
				<ul class="post-links clearfix">
				<?php foreach (get_post_meta(get_the_ID(), '_ungrynerd_links', true) as $link) : ?>
					<li><a href="<?php echo esc_url($link[1]) ?>"><?php echo $link[0] ?></a></li>
				<?php if ($i==3): break; endif; ?>
				<?php $i++; endforeach; ?>
				</ul>
			<?php endif ?>
			
		</article>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<div class="col-md-4 home-block-wrap"></div>

