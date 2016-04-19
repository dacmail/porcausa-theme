<?php
	$post_block = new WP_Query(array('p' => $selected_post));	
?>
	<?php if ( $post_block->have_posts() ) : while ( $post_block->have_posts() ) : $post_block->the_post(); ?>
		<div class="<?php echo $type; ?> home-block-wrap">
			<article <?php post_class('home-block') ?>>
				<header class="post-header">
					<?php the_post_thumbnail($type); ?>
					<h2 class="post-title"><?php the_title(); ?></h2>
				</header>
				<div class="post-author">Por <?php the_author_posts_link() ?> <strong>/ <?php the_time(get_option('date_format')); ?></strong></div>
			</article>
		</div>
	<?php endwhile; ?>
	<?php endif; ?>

