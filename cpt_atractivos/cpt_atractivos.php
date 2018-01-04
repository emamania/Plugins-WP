<?php
/*
Plugin Name: AT - EMA CPT
Plugin URI:
Description: Agrega Custom Post Types al sitio machupicchu New
Version:     1.0
Author:      Elvis Mamani Aguilar
Author URI:
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action( 'init', 'crear_post_type_tour', 0 );
function crear_post_type_tour() {

  // Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'Tours', 'Post Type General Name', 'ema_theme' ),
		'singular_name'       => _x( 'Tour', 'Post Type Singular Name', 'ema_theme' ),
		'menu_name'           => __( 'Tours', 'ema_theme' ),
		'parent_item_colon'   => __( 'Tour Padre', 'ema_theme' ),
		'all_items'           => __( 'Todas las Tours', 'ema_theme' ),
		'view_item'           => __( 'Ver Tour', 'ema_theme' ),
		'add_new_item'        => __( 'Agregar Nueva Tour', 'ema_theme' ),
		'add_new'             => __( 'Agregar Nueva Tour', 'ema_theme' ),
		'edit_item'           => __( 'Editar Tour', 'ema_theme' ),
		'update_item'         => __( 'Actualizar Tour', 'ema_theme' ),
		'search_items'        => __( 'Buscar Tour', 'ema_theme' ),
		'not_found'           => __( 'No encontrado', 'ema_theme' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'ema_theme' ),
	);

  // Otras opciones para el post type

	$args = array(
		'label'               => __( 'tours', 'ema_theme' ),
		'description'         => __( 'Tour news and reviews', 'ema_theme' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title', 'thumbnail','editor' ), //'editor', 'excerpt', 'author',  'comments', 'revisions', 'custom-fields',
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-book-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Por ultimo registramos el post type
	register_post_type( 'tours', $args );

}

add_action( 'init', 'ema_cpt_slider', 0 );
function ema_cpt_slider() {

  // Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'Sliders', 'Post Type General Name', 'ema_theme' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'ema_theme' ),
		'menu_name'           => __( 'Sliders', 'ema_theme' ),
		'parent_item_colon'   => __( 'Slider Padre', 'ema_theme' ),
		'all_items'           => __( 'Todas las Sliders', 'ema_theme' ),
		'view_item'           => __( 'Ver Slider', 'ema_theme' ),
		'add_new_item'        => __( 'Agregar Nueva Slider', 'ema_theme' ),
		'add_new'             => __( 'Agregar Nueva Slider', 'ema_theme' ),
		'edit_item'           => __( 'Editar Slider', 'ema_theme' ),
		'update_item'         => __( 'Actualizar Slider', 'ema_theme' ),
		'search_items'        => __( 'Buscar Slider', 'ema_theme' ),
		'not_found'           => __( 'No encontrado', 'ema_theme' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'ema_theme' ),
	);

  // Otras opciones para el post type

	$args = array(
		'label'               => __( 'sliders', 'ema_theme' ),
		'description'         => __( 'slider news and reviews', 'ema_theme' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title' ), //'excerpt', 'author',  'comments', 'revisions', 'custom-fields',
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-book-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Por ultimo registramos el post type
	register_post_type( 'sliders', $args );

}

// Post Type Eventos
add_action( 'init', 'crear_post_type_eventos', 0 );
function crear_post_type_eventos() {

  // Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'Eventos', 'Post Type General Name', 'ema_theme' ),
		'singular_name'       => _x( 'Evento', 'Post Type Singular Name', 'ema_theme' ),
		'menu_name'           => __( 'Eventos', 'ema_theme' ),
		'parent_item_colon'   => __( 'Evento Padre', 'ema_theme' ),
		'all_items'           => __( 'Todos los Eventos', 'ema_theme' ),
		'view_item'           => __( 'Ver Eventos', 'ema_theme' ),
		'add_new_item'        => __( 'Agregar Nueva Evento', 'ema_theme' ),
		'add_new'             => __( 'Agregar Nueva Evento', 'ema_theme' ),
		'edit_item'           => __( 'Editar Evento', 'ema_theme' ),
		'update_item'         => __( 'Actualizar Evento', 'ema_theme' ),
		'search_items'        => __( 'Buscar Evento', 'ema_theme' ),
		'not_found'           => __( 'No encontrado', 'ema_theme' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'ema_theme' ),
	);

	// Otras opciones para el post type

	$args = array(
		'label'               => __( 'eventos', 'ema_theme' ),
		'description'         => __( 'Próximos Eventos', 'ema_theme' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
   		'menu_icon'           => 'dashicons-calendar-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Por ultimo registramos el post type
	register_post_type( 'eventos', $args );

}

// Creando nuestra primer Taxonomia
add_action( 'init', 'tx_tipo_actividad' );
function tx_tipo_actividad() {
  $labels = array(
  	'name'              => _x( 'Tipo de actividad', 'taxonomy general name' ),
  	'singular_name'     => _x( 'Tipo de actividad', 'taxonomy singular name' ),
  	'search_items'      => __( 'Buscar Tipo de actividad' ),
  	'all_items'         => __( 'Todo Tipo de actividades' ),
  	'parent_item'       => __( 'Tipo de actividad Padre' ),
  	'parent_item_colon' => __( 'Tipo de actividad Padre:' ),
  	'edit_item'         => __( 'Editar Tipo de actividad' ),
  	'update_item'       => __( 'Actualizar Tipo de actividad' ),
  	'add_new_item'      => __( 'Agregar Nuevo Tipo de actividad' ),
  	'new_item_name'     => __( 'Nuevo Tipo de actividad' ),
  	'menu_name'         => __( 'Tipo de actividad' ),
  );

  $args = array(
  	'hierarchical'      => true,
  	'labels'            => $labels,
  	'show_ui'           => true,
  	'show_admin_column' => true,
  	'query_var'         => true,
  	'rewrite' => array( 'slug' => 'tipo-actividad' ),
  );

  register_taxonomy( 'tipo-actividad', array( 'tours' ), $args );

}

add_action( 'init', 'tx_destinos' );
function tx_destinos() {
  	$labels = array(
  		'name'              => _x( 'Destino de Viaje', 'taxonomy general name' ),
  		'singular_name'     => _x( 'Destino de Viaje', 'taxonomy singular name' ),
  		'search_items'      => __( 'Buscar Destino' ),
  		'all_items'         => __( 'Todos los Destinos' ),
  		'parent_item'       => __( 'Destino Padre' ),
  		'parent_item_colon' => __( 'Destino Padre:' ),
  		'edit_item'         => __( 'Editar Destino' ),
  		'update_item'       => __( 'Actualizar Destino' ),
  		'add_new_item'      => __( 'Agregar Nuevo Destino' ),
  		'new_item_name'     => __( 'Nuevo Destino' ),
  		'menu_name'         => __( 'Destinos de Viaje' ),
  	);

  	$args = array(
  		'hierarchical'      => true,
  		'labels'            => $labels,
  		'show_ui'           => true,
  		'show_admin_column' => true,
  		'query_var'         => true,
  		'rewrite' => array( 'slug' => 'destino' ),
  	);

  	register_taxonomy( 'destino', array( 'tours' ), $args );
}


add_action( 'init', 'tx_tipo_de_tour' );
function tx_tipo_de_tour() {
$labels = array(
  'name'              => _x( 'Tipos de Viajes', 'taxonomy general name' ),
  'singular_name'     => _x( 'Tipos de Viaje', 'taxonomy singular name' ),
  'search_items'      => __( 'Buscar Tipos' ),
  'all_items'         => __( 'Todos los Tipos' ),
  'parent_item'       => __( 'Tipos Padre' ),
  'parent_item_colon' => __( 'Tipos Padre:' ),
  'edit_item'         => __( 'Editar Tipos' ),
  'update_item'       => __( 'Actualizar Tipos' ),
  'add_new_item'      => __( 'Agregar Nuevo Tipos' ),
  'new_item_name'     => __( 'Nuevo Tipos' ),
  'menu_name'         => __( 'Tipos de Viaje' ),
);

$args = array(
  'hierarchical'      => true,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite' => array( 'slug' => 'tipo-de-viaje' ),
);

register_taxonomy( 'tipo-de-viaje', array( 'tours' ), $args );
}
