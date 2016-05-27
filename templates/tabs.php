<div class="container">
	<ul id="tabs" class="nav nav-tabs">
		<li role="presentation" class="active"><a href="#pioneros">Pioneros</a></li>
		<li role="presentation"><a href="#equipo">Equipo</a></li>
		<li role="presentation"><a href="#patronato">Patronato</a></li>
	</ul>
</div>
<div class="container-fluid tab-wrapper">
	<div class="container">
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="pioneros">
				<h3 class="title">Pioneros, los primeros en apoyar nuestras causas</h3>
				<ul class="clearfix team-carousel owl-carousel">
					<?php 
						$args = array(
							'post_type' => 'person',
							'posts_per_page'=> -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'group',
									'field'    => 'slug',
									'terms'    => 'pioneros',
								)
							),
						);
					?>
					<?php $people = new WP_Query($args); ?>
					<?php while ( $people->have_posts() ) : $people->the_post(); ?>
						<li class="team-item">
							<?php the_post_thumbnail('avatar'); ?>
							<h3 class="name"><?php the_title(); ?></h3>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<div role="tabpanel" class="tab-pane" id="equipo">
				<h3 class="title">Equipo, los primeros en apoyar nuestras causas</h3>
				<ul class="clearfix team-carousel owl-carousel">
					<?php 
						$args = array(
							'post_type' => 'person',
							'posts_per_page'=> -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'group',
									'field'    => 'slug',
									'terms'    => 'equipo',
								)
							),
						);
					?>
					<?php $people = new WP_Query($args); ?>
					<?php while ( $people->have_posts() ) : $people->the_post(); ?>
						<li class="team-item">
							<?php the_post_thumbnail('avatar'); ?>
							<h3 class="name"><?php the_title(); ?></h3>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<div role="tabpanel" class="tab-pane" id="patronato">
				<h3 class="title">Patronato, los primeros en apoyar nuestras causas</h3>
				<ul class="clearfix team-carousel owl-carousel">
					<?php
						$args = array(
							'post_type' => 'person',
							'posts_per_page'=> -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'group',
									'field'    => 'slug',
									'terms'    => 'patronato',
								)
							),
						);
					?>
					<?php $people = new WP_Query($args); ?>
					<?php while ( $people->have_posts() ) : $people->the_post(); ?>
						<li class="team-item">
							<?php the_post_thumbnail('avatar'); ?>
							<h3 class="name"><?php the_title(); ?></h3>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		
	</div>
</div>