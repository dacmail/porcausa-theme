<?php /* Template Name: Lista páginas URLS */ ?>

	
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<table>
	<?php 
		$list = new WP_Query(array('post_type'=>array('page','article'),
									'posts_per_page' => -1,
									));
	    while ($list->have_posts()) : $list->the_post(); ?>
	       <tr>
	       	<td><?php echo get_the_ID(); ?></td> <td><?php the_permalink(); ?></td>
	       </tr>
	    <?php endwhile; ?>
	</table>
<?php endwhile; ?>

<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>
	    <?php /*
			$list = new WP_Query(array('post_type'=>array('person'),
										'posts_per_page' => -1,
										));
		    while ($list->have_posts()) : $list->the_post(); 
		      	$puesto_value = get_post_meta(get_the_ID(), 'descripcion_puesto_equipo', true);
				$twitter_value = get_post_meta(get_the_ID(), 'twitter_equipo', true);
				$content = get_the_content();
				add_post_meta(get_the_ID(), '_ungrynerd_position', $puesto_value);
				add_post_meta(get_the_ID(), '_ungrynerd_bio', $content);
				update_post_meta(get_the_ID(), '_ungrynerd_twitter', str_replace('@', '', $twitter_value));
				echo 'Actualizado ' . get_the_title() . '<br>';
		    endwhile; */
	    	
	    ?>
