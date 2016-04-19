<?php
/**
 * Example Widget Class
 */
class widget_post_block extends WP_Widget {
 
    /** constructor -- name this the same as the class above */
    function widget_post_block() {
        parent::WP_Widget(false, $name = 'porCausa Post block');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        $selected_post 	= $instance['selected_post'];
        var_dump($selected_post);
        ?>
              
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['selected_post'] = strip_tags($new_instance['selected_post']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
        $posts = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1));
        $title = esc_attr($instance['title']);
        $message = esc_attr($instance['message']);
        $selected_post = esc_attr($instance['selected_post']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Simple Message'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo $message; ?>" />
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('selected_post'); ?>"><?php _e('Title:'); ?></label>
			<select id="<?php echo $this->get_field_id('selected_post'); ?>" class="widefat" name="<?php echo $this->get_field_name('selected_post'); ?>">
	        <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
	        	<option value="<?php the_ID() ?>" <?php echo (get_the_ID()==$selected_post) ? "selected" : ""; ?>><?php the_title(); ?></option>
	        <?php endwhile; ?>
	     </select>
       <script>
        jQuery(function($) {
              $('#'<?php echo $this->get_field_id('selected_post'); ?>).select2({
                placeholder: "Selecciona un artículo",
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