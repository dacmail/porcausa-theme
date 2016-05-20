<?php
class widget_post_block extends WP_Widget {
 
    function widget_post_block() {
        parent::WP_Widget(false, $name = 'Bloque articulo');	
    }
 
    function widget($args, $instance) {	
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $type = $instance['type'];
        $selected_post 	= $instance['selected_post'];
        ?>
            <?php include(get_template_directory() . '/templates/home-blocks.php'); ?>
        <?php
    }
 
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['selected_post'] = strip_tags($new_instance['selected_post']);
		$instance['type'] = strip_tags($new_instance['type']);
        $instance['title'] = get_the_title(strip_tags($new_instance['selected_post']));
        return $instance;
    }
 
    function form($instance) {	
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'ungrynerd' );
        }
        $posts = new WP_Query(array('post_type' => array('post','article'), 'posts_per_page' => -1, 'post_status' => 'publish'));
        $type = esc_attr($instance['type']);
        $selected_post = esc_attr($instance['selected_post']);
        ?>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="hidden" value="<?php echo esc_attr( $title ); ?>" />
        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Tipo', 'ungrynerd'); ?></label> 
            <select id="<?php echo $this->get_field_id('type'); ?>" class="widefat" name="<?php echo $this->get_field_name('type'); ?>">
                <option value="col-md-12" <?php echo $type=='col-md-12' ? 'selected' : ''; ?>><?php _e('3 columnas', 'ungrynerd'); ?></option>
                <option value="col-md-8" <?php echo $type=='col-md-8' ? 'selected' : ''; ?>><?php _e('2 columnas', 'ungrynerd'); ?></option>
                <option value="col-md-4"<?php echo $type=='col-md-4' ? 'selected' : ''; ?>><?php _e('1 columna', 'ungrynerd'); ?></option>
            </select>
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('selected_post'); ?>"><?php _e('Articulo', 'ungrynerd'); ?></label>
			<select id="<?php echo $this->get_field_id('selected_post'); ?>" class="widefat" name="<?php echo $this->get_field_name('selected_post'); ?>">
	        <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
	        	<option value="<?php the_ID() ?>" <?php echo (get_the_ID()==$selected_post) ? "selected" : ""; ?>><?php the_title(); ?></option>
	        <?php endwhile; ?>
	     </select>
       <script>
        jQuery(function($) {
              $('#<?php echo $this->get_field_id('selected_post'); ?>').select2({
                placeholder: "<?php _e('Selecciona el artículo', 'ungrynerd'); ?>",
                width: "100%"
              });
        });
       </script>
    </p>
	<?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("widget_post_block");'));
?>


<?php
class ungrynerd_widget_attachment extends WP_Widget {
 
    function ungrynerd_widget_attachment() {
        parent::WP_Widget(false, $name = 'Bloque documentos');    
    }
 
    function widget($args, $instance) { 
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        ?>
            <?php $attachments = ungrynerd_get_attachments(); ?>
            <?php if (!empty($attachments)) : ?>
                <ul class="documents-link">
                <?php foreach ($attachments as $attachment) : ?>
                    <li><a href="<?php echo $attachment->guid; ?>"><?php echo $attachment->post_title; ?></a> <?php echo $attachment->post_excerpt; ?></li>
                <?php endforeach; ?>
                </ul>
            <?php endif ?>
        <?php
        echo $args['after_widget'];
    }
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'ungrynerd' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php 
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
 
}
add_action('widgets_init', create_function('', 'return register_widget("ungrynerd_widget_attachment");'));
?>