<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42658230-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-42658230-1');
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if (is_front_page()): ?>
		<?php $featured = new WP_Query(array('meta_key' => '_ungrynerd_featured', 'meta_value' => 1, 'post_type'=>array('post', 'article'), 'posts_per_page' => 1)); ?>
	<?php endif ?>

	<header class="navbar header <?php echo (isset($featured) && $featured->have_posts()) ? 'over' : ''; ?>" id="header">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-menu">
					<span class="sr-only"><?php _e('Toggle navigation', 'ungrynerd'); ?></span>
					<i class="fa fa-bars"></i>
				</button>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="logo navbar-brand normal"><img src="<?php echo get_template_directory_uri(); ?>/images/logo<?php echo isset($featured) && $featured->have_posts() ? '-white' : ''; ?>.png" alt="<?php bloginfo('name'); ?>" /></a>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="logo navbar-brand fixed"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-mini.png" alt="<?php bloginfo('name'); ?>" /></a>
			</div>
			<?php wp_nav_menu(array('container' => 'nav',
								'container_id' => 'main-menu',
								'container_class' => 'collapse width navbar-right navbar-collapse',
								'menu_class' => 'nav navbar-nav',
								'theme_location' => 'main',
								'fallback_cb' => false)); ?>

		</div> <!--- /.container -->
	</header>

	<?php if (isset($featured)): ?>
	<?php while ($featured->have_posts()) : $featured->the_post(); ?>
		<div class="container-fluid">
			<a href="https://actua.porcausa.org/haztesocio/datos​" class="donate-float"><i class="icon-ico_heart"></i> <span>donar</span></a>
			<div class="row">
				<div class="home-block-wrap">
					<article <?php post_class('home-block full-width') ?>>
						<header class="post-header">
							<?php the_post_thumbnail('col-md-12'); ?>
							<div class="container post-title-wrapper">
								<div class="col-md-12">
									<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>
							</div>
						</header>
						<div class="container">
							<div class="col-md-12 post-content-wrapper">
								<div class="post-author">Por <?php the_author_posts_link() ?> <strong>/ <?php the_time(get_option('date_format')); ?></strong></div>
								<div class="post-content">
									<?php the_excerpt(); ?>
								</div>
								<?php if (get_post_meta(get_the_ID(), '_ungrynerd_links', true)): $i = 1; ?>
									<ul class="post-links clearfix">
									<?php foreach (get_post_meta(get_the_ID(), '_ungrynerd_links', true) as $link) : ?>
										<li><a href="<?php echo esc_url($link[1]) ?>"><?php echo $link[0] ?></a></li>
										<?php if ($i==3): break; endif; ?>
									<?php $i++; endforeach; ?>
									</ul>
								<?php endif ?>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<?php endif ?>
