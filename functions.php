<?php 
ini_set('max_execution_time', 300);
	//Meta Boxes
	define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
	define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory() . '/meta-box' ) );
	require_once RWMB_DIR . 'meta-box.php';
	include get_template_directory() . '/inc/meta-boxes.php';
	include get_template_directory() . '/inc/actions.php';
	include get_template_directory() . '/inc/config.php';
	include get_template_directory() . '/inc/posts.php';
	include get_template_directory() . '/inc/widgets.php';
	include get_template_directory() . '/inc/helpers.php';

	// Modo mantenimiento para no logueados
	add_action('get_header','ungrynerd_maintenace');
	function ungrynerd_maintenace() {
		if ( !is_user_logged_in()) { wp_die('<h2>Modo mantenimiento, vuelve más tarde.</h2>'); }
	}
?>