<div class="post-share">
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="icon fb" target="_blank"><i class="fa fa-facebook"></i></a>
	<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title_attribute(); ?>&via=porCausaorg" class="icon tw" target="_blank"><i class="fa fa-twitter"></i></a>
	<a href="whatsapp://send?text=<?php the_title(); ?> – <?php urlencode(the_permalink()); ?>" data-action="share/whatsapp/share" class="icon wa" target="_blank"><i class="fa fa-whatsapp"></i></a>
	<a href="https://telegram.me/share/url?url=<?php urlencode(the_permalink()); ?>" class="icon tg" target="_blank"><i class="fa fa-paper-plane"></i></a>
</div>