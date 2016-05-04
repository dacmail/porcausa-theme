<div class="dark-wrapper">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="video-wrapper">
					<div class="video-responsive">
						<?php echo wp_oembed_get(get_post_meta(get_the_ID(), '_ungrynerd_video', true)); ?>
					</div>
					<div class="video-info clearfix">
						<h3 class="post-pretitle"><?php the_terms(get_the_ID(),'epigraph'); ?></h3>
						<a class="change-lights" href="#"><i class="icon-ico_moon"></i></a>
					</div>
				</div>
				<div class="article-wrapper">
					<h1 class="post-title">
						<?php the_title(); ?>
					</h1>
					<?php $intro = get_post_meta(get_the_ID(), '_ungrynerd_intro', true); ?>
					<?php if (!empty($intro)): ?>
						<div class="post-intro">
							<?php echo apply_filters('the_content', $intro); ?>
						</div>
					<?php endif ?>
					
					<div class="post-meta clearfix">
						<div class="post-author">
							<?php echo get_avatar(get_the_author_id(), 51); ?>
							Por <?php the_author_posts_link() ?> <strong>/ <?php the_time(get_option('date_format')); ?></strong></div>
						<?php get_template_part('templates/post-share'); ?>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</div>
<?php get_template_part('templates/more-posts'); ?>