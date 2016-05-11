<?php
/* ARTICLES POST TYPE */
add_action('init', 'ugnrynerd_article_post_type');
function ugnrynerd_article_post_type()  {
  $labels = array(
    'name' => __('Artículos', 'framework'),
    'singular_name' => __('Artículo', 'framework'),
    'add_new' => __('Añadir artículo', 'framework'),
    'add_new_item' => __('Añadir artículo', 'framework'),
    'edit_item' => __('Editar artículo', 'framework'),
    'new_item' => __('Nuevo artículo', 'framework'),
    'view_item' => __('Ver artículos', 'framework'),
    'search_items' => __('Buscar artículos', 'framework'),
    'not_found' =>  __('No se han encontrado artículos ', 'framework'),
    'not_found_in_trash' => __('No hay artículos en la papelera', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'rewrite' => array( 'slug' => 'articulo' ),
    'taxonomies' => array('project', 'epigraph', 'tags'),
    'has_archive' => true,
    'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'post-formats')
  );
  register_post_type('article',$args);
}

function ungrynerd_article_taxs() {
    register_taxonomy("project",
    array("article"),
    array(
        "hierarchical" => true,
        "label" => __( "Proyectos", 'framework'),
        "singular_label" => __( "Proyecto", 'framework'),
        "rewrite" => array( 'slug' => 'proyecto', 'hierarchical' => true),
        'show_in_nav_menus' => true,
        )
    );
    register_taxonomy("epigraph",
    array("article"),
    array(
        "hierarchical" => true,
        "label" => __( "Epigrafes", 'framework'),
        "singular_label" => __( "Epigrafe", 'framework'),
        "rewrite" => array( 'slug' => 'epigrafe', 'hierarchical' => true),
        'show_in_nav_menus' => true,
        )
    );
}

add_action( 'init', 'ungrynerd_article_taxs', 0);



/* PERSON POST TYPE */
add_action('init', 'ugnrynerd_person_post_type');
function ugnrynerd_person_post_type()  {
  $labels = array(
    'name' => __('Personas', 'framework'),
    'singular_name' => __('Persona', 'framework'),
    'add_new' => __('Añadir Persona', 'framework'),
    'add_new_item' => __('Añadir Persona', 'framework'),
    'edit_item' => __('Editar Persona', 'framework'),
    'new_item' => __('Nuevo Persona', 'framework'),
    'view_item' => __('Ver Personas', 'framework'),
    'search_items' => __('Buscar Personas', 'framework'),
    'not_found' =>  __('No se han encontrado Personas ', 'framework'),
    'not_found_in_trash' => __('No hay Personas en la papelera', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'rewrite' => array( 'slug' => 'persona' ),
    'taxonomies' => array('group'),
    'supports' => array('title','thumbnail')
  );
  register_post_type('person',$args);
}

function ungrynerd_group_tax() {
    register_taxonomy("group",
    array("person"),
    array(
        "hierarchical" => true,
        "label" => __( "Grupos", 'framework'),
        "singular_label" => __( "Grupo", 'framework'),
        "rewrite" => array( 'slug' => 'grupo', 'hierarchical' => true),
        'show_in_nav_menus' => true,
        )
    );
}

add_action( 'init', 'ungrynerd_group_tax', 0);


function ungrynerd_columns_head($defaults) {
    $defaults['project'] = 'Proyecto';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function ungrynerd_columns_content($column_name, $post_ID) {
    if ($column_name == 'project') {
        $post_type = 'article';
        $terms = get_the_terms($post_ID, 'project');
        if (!empty($terms) ) {
            foreach ( $terms as $term )
            $post_terms[] ="<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " .esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
            echo join('', $post_terms );
        }
         else echo '<i>Sin proyecto. </i>';
    }
}
add_filter('manage_posts_columns', 'ungrynerd_columns_head');
add_action('manage_posts_custom_column', 'ungrynerd_columns_content', 10, 2);
?>
