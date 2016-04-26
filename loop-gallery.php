<div class="dark-wrapper">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="video-wrapper">
					<?php $images = rwmb_meta('_ungrynerd_photos', 'size=col-md-12&type=image');  ?>
					
					<?php if ( !empty( $images ) ) : ?>
						<div class="owl-carousel post-gallery">
						    <?php foreach ( $images as $image ) : ?>
						    	<div class="photo" data-hash="photo-<?php echo $image['ID'] ?>">
						    		<img src='<?php echo $image['url']?>' alt='<?php echo $image['alt']?>' />
						    		<?php if (!empty($image['caption'])): ?>
						    			<div class="photo-caption">
											<p><strong><?php echo $image['caption'] ?></strong></p>
											<p><?php echo $image['description']  ?></p>
										</div>
						    		<?php endif ?>
						    	</div>
						    <?php endforeach; ?>
					    </div>
					    <ul class="owl-thumbs hide owl-carousel">
						<?php foreach ( $images as $image ) : ?>
							<li class="owl-thumb-item">
								<a href="#photo-<?php echo $image['ID'] ?>">
									<img src='<?php echo $image['url']?>' alt='<?php echo $image['alt']?>' />
								</a>
							</li>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<div class="video-info clearfix">
						<h3 class="post-pretitle"><?php the_terms(get_the_ID(),'epigraph'); ?></h3>
						<a class="show-thumbs" href="#"><i class="icon-ico_gallery"></i></a>
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
						<div class="post-share">
							<a href="#" class="icon fb" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="#" class="icon tw" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="#" class="icon in" target="_blank"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</div>
<?php get_template_part('templates/more-posts'); ?>