<?php
/*
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


$prefix = '_ungrynerd_';

global $meta_boxes;

$meta_boxes = array();

$meta_boxes[] = array(
        'id'         => 'general_options',
        'title'      =>  __('Opciones de articulo'),
        'pages'      => array( 'article', 'post' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
        	array(
	                'name' =>  __('Destacar en portada'),
	                'desc' =>  __('Destacar en portada a todo ancho'),
	                'id' => $prefix . 'featured',
	                'type' => 'checkbox',
	            ),
            array(
	                'name' =>  __('Enlaces'),
	                'desc' =>  __('Enlaces: a la izquierda el texto y a la derecha la URL del enlace.'),
	                'id' => $prefix . 'links',
	                'type' => 'key_value',
	            ),
            array(
	                'name' =>  __('Introducción'),
	                'id' => $prefix . 'intro',
	                'type' => 'wysiwyg',
	            ),
            array(
	                'name' =>  __('Despiece'),
	                'id' => $prefix . 'summary',
	                'type' => 'wysiwyg',
	            ),
        ),
    );
$meta_boxes[] = array(
        'id'         => 'person_options',
        'title'      =>  __('Datos persona'),
        'pages'      => array( 'person'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
        	array(
	                'name' =>  __('Puesto'),
	                'id' => $prefix . 'position',
	                'type' => 'text',
	            ),
        	array(
	                'name' =>  __('Bio'),
	                'id' => $prefix . 'bio',
	                'type' => 'wysiwyg',
	            ),
        	array(
	                'name' =>  __('Twitter'),
	                'id' => $prefix . 'twitter',
	                'type' => 'text',
	            ),
        ),
    );

function ungrynerd_register_meta_boxes()
{
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
add_action( 'admin_init', 'ungrynerd_register_meta_boxes' );
