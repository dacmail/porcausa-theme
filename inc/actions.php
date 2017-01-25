<?php
	//Change for activate development mode (using JS and CSS in assets folder)
	define('WP_DEVELOPMENT_MODE', false);
	//Enqueue scripts and styles
	function ungrynerd_scripts() {
		wp_enqueue_style(
			'ungrynerd-theme-style',
			get_stylesheet_uri());

		//If WP_DEVELOPMENT_MODE is activate use LESS files
		if (defined('WP_DEVELOPMENT_MODE') && WP_DEVELOPMENT_MODE ) {
			wp_enqueue_script(
				'ungrynerd-js',
				'//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js',
				array('jquery'),
				'1.0.0',
				true);
			wp_enqueue_style('ungrynerd-main-less',
				get_template_directory_uri() . '/assets/styles/main.less');
		} else {
			wp_enqueue_style('ungrynerd-main-styles',
				get_template_directory_uri() . '/css/main.css');
		}


		if (!is_admin()) {

			//wp_deregister_script('jquery');
			wp_enqueue_script('jquery');

			if (defined('WP_DEVELOPMENT_MODE') && WP_DEVELOPMENT_MODE ) {
				wp_enqueue_script(
					'bootstrap',
					get_template_directory_uri() . '/assets/scripts/bootstrap.js',
					array('jquery'),
					'1.0.0',
					true);
				wp_enqueue_script(
					'ungrynerd-main',
					get_template_directory_uri() . '/assets/scripts/main.js',
					array('jquery'),
					'1.0.0',
					true);
				wp_enqueue_script(
					'owl-carousel2',
					get_template_directory_uri() . '/assets/scripts/owl.carousel.min.js',
					array('jquery'),
					'2.0',
					true
				);
				wp_enqueue_script(
					'validate',
					get_template_directory_uri() . '/assets/scripts/jquery.validate.js',
					array('jquery'),
					'2.0',
					true
				);
				wp_enqueue_script(
					'validate-localization',
					get_template_directory_uri() . '/assets/scripts/messages_es',
					array('jquery'),
					'2.0',
					true
				);
			} else {
				wp_enqueue_script(
					'ungrynerd-js',
					get_template_directory_uri() . '/js/main.js',
					array('jquery'),
					'1.0.0',
					true);
			}
			wp_enqueue_script('isotope',
				'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js',
				array('jquery'),
				'2.0.2',
				true
			);
			if (is_page_template('donar-particular.php') || is_page_template('donar-particular-simple.php')) {
				$frBaseUrl = "https://fundraising.arivanza.com/";
				wp_enqueue_script('jquery-md5',
					$frBaseUrl . 'fundraising/resources/scripts/web-donation/jquery.md5.js',
					array('jquery'),
					false,
					true
				);
				wp_enqueue_script('jquery-dateformat',
					$frBaseUrl . 'fundraising/resources/scripts/web-donation/jquery-dateFormat.min.js',
					array('jquery'),
					false,
					true
				);
				wp_enqueue_script('webfr',
					$frBaseUrl . 'fundraising/resources/scripts/web-donation/webfr.js?12122015',
					array('jquery'),
					false,
					true
				);
				wp_add_inline_script( 'webfr', 'var $ = jQuery = jQuery.noConflict(true);', 'before');
			}

			wp_enqueue_script(
				'html5shiv',
				'//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
				array(),
				'3.7.2');
			wp_enqueue_script('respond',
				'//oss.maxcdn.com/respond/1.4.2/respond.min.js',
				array(),
				'1.4.2');

			wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
			wp_script_add_data('respond', 'conditional', 'lt IE 9');
		}

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
	add_action('wp_enqueue_scripts', 'ungrynerd_scripts');

	function ungrynerd_admin_scripts() {
		wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js', array('jquery'));
		wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css');
	}
	add_action('admin_enqueue_scripts', 'ungrynerd_admin_scripts');

	//Remove emojis support
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

	//Remove recent comments styles in head
	function remove_recent_comments_style() {
	    global $wp_widget_factory;
	    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
	add_action('widgets_init', 'remove_recent_comments_style');



	function enqueue_less_styles($tag, $handle) {
	    global $wp_styles;
	    $match_pattern = '/\.less$/U';
	    if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
	        $handle = $wp_styles->registered[$handle]->handle;
	        $media = $wp_styles->registered[$handle]->args;
	        $href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
	        $rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
	        $title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';

	        $tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />";
	    }
	    echo $tag;
	}

	// DEVELOPMENT MODE LESS FILES
	if (defined('WP_DEVELOPMENT_MODE') && WP_DEVELOPMENT_MODE && !is_admin() ) {
		add_filter( 'style_loader_tag', 'enqueue_less_styles', 5, 2);
	}

	function ungrynerd_post_classes($classes, $class, $post_id) {
		if(current_theme_supports('post-thumbnails'))
			if(!has_post_thumbnail() || get_post_meta($post_id, '_ungrynerd_hide_thumb_cover', true))
				$classes[] = "no-post-thumbnail";

		return $classes;
	}
	add_filter('post_class', "ungrynerd_post_classes", 10, 3);

	function ungrynerd_add_custom_types( $query ) {
		if(!is_admin() && !is_tax() && is_archive() && empty($query->query_vars['suppress_filters'])) {
			$query->set('post_type', array(
				'post', 'article'
			));
			return $query;
		}
	}
	//add_filter( 'pre_get_posts', 'ungrynerd_add_custom_types' );

	function ungrynerd_people($atts, $content=null) {
	    extract( shortcode_atts( array(
	        'limit' => -1,
	        'group' => 'equipo',
	        'project' => '',
	        'columns' => 2
	        ), $atts ) );
	    global $post;
	    $back=$post; //Backup post data
	    ob_start();
	    ?>
	    <div class="row row-people">
	    <?php
	    	$args = array(
						'post_type' => 'person',
						'posts_per_page'=> esc_attr($limit),
						'tax_query' => array(
							'relation' => 'AND',
						),
					);
	    	if (!empty($group)) {
	    		$args['tax_query'][] = array(
								'taxonomy' => 'group',
								'field'    => 'slug',
								'terms'    => esc_attr($group),
							);
	    	}
	    	if (!empty($project)) {
	    		$args['tax_query'][] = array(
								'taxonomy' => 'project',
								'field'    => 'slug',
								'terms'    => esc_attr($project),
							);
	    	}
	    ?>
		<?php 	$people = new WP_Query($args);
	    while ($people->have_posts()) : $people->the_post();
	        $position = get_post_meta($post->ID, '_ungrynerd_position', true );
	        $bio = get_post_meta($post->ID, '_ungrynerd_bio', true );
	        $twitter = get_post_meta($post->ID, '_ungrynerd_twitter', true );
	        $class = $columns==2 ? 'col-md-6' : 'col-md-12'; ?>
			<div class="<?php echo $class; ?>">
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
			<?php if (($people->current_post+1)%$columns==0 && $people->found_posts>($people->current_post+1)): ?>
				</div><div class="row row-people">
			<?php endif ?>
	        <?php
	    endwhile;
	    $post=$back; //restore post object
	   	?> </div> <?php
	    return ob_get_clean();
	}

	add_shortcode('people', 'ungrynerd_people');

	function ungrynerd_embed_html( $html ) {
	    return '<div class="video-container">' . $html . '</div>';
	}

	add_filter( 'embed_oembed_html', 'ungrynerd_embed_html', 10, 3 );



	function ungrynerd_password_form_text( $text ) {
		$text = str_replace( 'Este contenido está protegido por contraseña. Para verlo introduce tu contraseña a continuación:', 'Introduce la contraseña para ver esta página:', $text );
		return $text;
	}
	add_filter( 'the_password_form', 'ungrynerd_password_form_text' );

	function ungrynerd_protected_title($title) {
		$title = attribute_escape($title);
		$findthese = array(
			'#Protegido:#'
		);

		$replacewith = array(
			'Confidencial:'
		);

		$title = preg_replace($findthese, $replacewith, $title);
		return $title;
	}
	add_filter('the_title', 'ungrynerd_protected_title');

		//Customize archives title
	add_filter('get_the_archive_title', function($title) {
		if ( is_category() ) {
	        $title = sprintf( __( '%s' ), single_cat_title( '', false ));
	    } elseif ( is_tag() ) {
	        $title = sprintf( __( '%s' ), single_tag_title( '', false ));
	    } elseif ( is_author() ) {
	        $title = sprintf( __( 'Autor: %s' ),  get_the_author() );
	    } elseif ( is_year() ) {
	        $title = sprintf( __( 'Año: %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ));
	    } elseif ( is_month() ) {
	        $title = sprintf( __( 'Mes: %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ));
	    } elseif ( is_day() ) {
	        $title = sprintf( __( 'Día: %s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ));
	    } elseif ( is_post_type_archive() ) {
	        $title = sprintf( __( 'Archivos: %s' ), post_type_archive_title( '', false ));
	    } elseif ( is_tax() ) {
	        $tax = get_taxonomy( get_queried_object()->taxonomy );
	        $title = sprintf( __( '%1$s %2$s' ), $tax->labels->singular_name,  single_term_title( '', false ));
	    } elseif (is_search()) {
	    	$title = sprintf( __( 'Búsqueda: %s' ),  get_search_query());
	    } else {
	        $title = __( 'Archivos' );
	    }
	    return $title;
	});
