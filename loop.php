<div class="container">
<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if (has_post_thumbnail() && (!get_post_meta(get_the_ID(), '_ungrynerd_hide_thumb', true)) ): ?>
			<div class="featured-photo">
				<?php the_post_thumbnail('col-md-12'); ?>
				<?php $thumbnail = get_post(get_post_thumbnail_id());?>
				<div class="photo-caption">
					<p><strong><?php echo $thumbnail->post_excerpt; ?></strong></p>
					<p><?php echo $thumbnail->post_content; ?></p>
				</div>
			</div>
		<?php endif ?>
		<div class="article-wrapper">
			<h3 class="post-pretitle"><?php the_terms(get_the_ID(),'epigraph'); ?></h3>
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
			<div class="post-content clearfix">
				<div class="post-sidebar">
					<div class="donate-banner">
						<i class="icon-ico_heart"></i>
						Ayúdanos a crear buen periodismo
						<a href="#">Donar</a>
					</div>

					<?php $links = get_post_meta(get_the_ID(), '_ungrynerd_links', true); ?>
					<?php if (!empty($links)) : ?>
						<h3 class="sidebar-title related"><i class="icon-ico_link"></i> Relacionado</h3>
						<ul class="post-links clearfix">
						<?php foreach ($links as $link) : ?>
							<li><a href="<?php echo esc_url($link[1]) ?>"><?php echo $link[0] ?></a></li>
						<?php endforeach; ?>
						</ul>
					<?php endif ?>

					<?php $attachments = ungrynerd_get_attachments(get_the_ID()); ?>
					<?php if (!empty($attachments)) : ?>
						<h3 class="sidebar-title documents"><i class="icon-ico_folder"></i> Documentos</h3>
						<ul class="post-links clearfix">
						<?php foreach ($attachments as $attachment) : ?>
							<li><a href="<?php echo $attachment->guid; ?>"><?php echo $attachment->post_title; ?></a></li>
						<?php endforeach; ?>
						</ul>
					<?php endif ?>
					
					<h3 class="sidebar-title tags"><i class="icon-ico_ribbon"></i> Etiquetas</h3>
					<?php the_tags('',' ',''); ?>
				</div>
				<?php the_content( __('Leer m&aacute;s &raquo;', 'ungrynerd')); ?>
			</div>
			<?php $epigraph = get_post_meta(get_the_ID(), '_ungrynerd_summary', true); ?>
			<?php if (!empty($epigraph)): ?>
				<div class="post-summary">
					<div class="post-content">
						<?php echo apply_filters('the_content', $epigraph); ?>
					</div>
				</div>
			<?php endif ?>
			<div class="post-meta clearfix">
				<div class="post-author">
					<?php echo get_avatar(get_the_author_id(), 51); ?>
					Por <?php the_author_posts_link() ?> <strong>/ <?php the_time(get_option('date_format')); ?></strong></div>
				<?php get_template_part('templates/post-share'); ?>
			</div>
			<div class="post-tags">
				<h3 class="sidebar-title tags"><i class="icon-ico_ribbon"></i> Etiquetas</h3>
				<?php the_tags('',' / ',''); ?>
			</div>
		</div>
	</article>
<?php endwhile; ?>
</div>