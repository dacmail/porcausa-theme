<?php
	$post_block = new WP_Query(array('p' => $selected_post, 'post_type' => array('post', 'article')));	
?>
	<?php if ( $post_block->have_posts() ) : while ( $post_block->have_posts() ) : $post_block->the_post(); ?>
		<div class="<?php echo $type; ?> home-block-wrap">
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
				<?php if ($type=='col-md-12'): $i=1; elseif ($type=='col-md-8') : $i=2; else : $i=3; endif; ?>
				<?php if (get_post_meta(get_the_ID(), '_ungrynerd_links', true)): ?>
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

