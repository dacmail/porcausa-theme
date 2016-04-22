<?php 
	// Listado de comentarios
	function comentarios($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	     <article id="comment-<?php comment_ID(); ?>" class="clearfix">
		  <?php echo get_avatar($comment,$size='75' ); ?>
	    	<div class="comment-content">
	    		<h5 class="author">
					<?php comment_author_link(); ?>
					<?php if ($comment->comment_approved == '0') : ?>
			         	<em><?php _e('Your comment is awaiting moderation.', 'ungrynerd') ?></em>
			      	<?php endif; ?>
			      	<?php edit_comment_link(__('(Edit)', 'ungrynerd'),'  ','') ?>
				</h5>
	    		<?php comment_text() ?>
	    	</div>
	     </article>
	<?php
	}

	function ungrynerd_get_attachments($post_id=null, $limit=3) {
		$args = array(
		    'post_type' => 'attachment',
		    'numberposts' => null,
		    'posts_per_page' => $limit,
		    'post_mime_type' => 'application/pdf,application/msword,application/x-compressed,application/zip'
		); 
		if (isset($post_id)) {
			$args['post_parent'] = $post_id;
		}
		$attachments = get_posts($args);
		return $attachments;
	}
?>