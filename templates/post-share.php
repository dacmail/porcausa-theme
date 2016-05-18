<div class="post-share">
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="icon fb" target="_blank"><i class="fa fa-facebook"></i></a>
	<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title_attribute(); ?>&via=porCausaorg" class="icon tw" target="_blank"><i class="fa fa-twitter"></i></a>
	<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>&summary=<?php echo wp_kses(get_the_excerpt(), array()); ?>" class="icon in" target="_blank"><i class="fa fa-linkedin"></i></a>
</div>