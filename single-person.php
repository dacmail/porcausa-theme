<?php get_header(); ?>
<div class="container">
<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="article-wrapper">
			<h1 class="section-title">
				<?php the_title(); ?>
			</h1>
			<div class="post-content clearfix">

				<?php $position = get_post_meta($post->ID, '_ungrynerd_position', true );
		        $bio = get_post_meta($post->ID, '_ungrynerd_bio', true );
		        $twitter = get_post_meta($post->ID, '_ungrynerd_twitter', true );  ?>
					<div class="person">
						<?php the_post_thumbnail('avatar'); ?>
						<h2 class="person-name"><?php the_title(); ?></h2>
						<h3 class="person-position"><?php echo $position ?></h3>
						<div class="person-bio">
							<?php echo $bio ?>
							<?php if (!empty($twitter)): ?>
								<p><a class="person-twitter" href="http://twitter.com/<?php echo $twitter ?>" target="_blank">@<?php echo $twitter; ?></a></p>
							<?php endif ?>
						</div>
						
						
				</div>
			</div>
		</div>
	</article>
<?php endwhile; ?>
</div>
<?php get_footer(); ?>