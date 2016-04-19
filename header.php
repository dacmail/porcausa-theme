<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="navbar header" id="header">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-menu">
					<span class="sr-only"><?php _e('Toggle navigation', 'ungrynerd'); ?></span>
					<?php _e('Menu', 'ungrynerd'); ?>
				</button>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="logo navbar-brand"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
			</div>
			<?php wp_nav_menu(array('container' => 'nav',
								'container_id' => 'main-menu', 
								'container_class' => 'collapse width navbar-right navbar-collapse', 
								'menu_class' => 'nav navbar-nav',
								'theme_location' => 'main',
								'fallback_cb' => false)); ?>

		</div> <!--- /.container -->
	</header>