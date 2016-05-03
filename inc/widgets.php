<?php
class widget_post_block extends WP_Widget {
 
    function widget_post_block() {
        parent::WP_Widget(false, $name = 'Bloque articulo');	
    }
 
    function widget($args, $instance) {	
        extract( $args );
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
        return $instance;
    }
 
    function form($instance) {	
        $posts = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1));
        $type = esc_attr($instance['type']);
        $selected_post = esc_attr($instance['selected_post']);
        ?>
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