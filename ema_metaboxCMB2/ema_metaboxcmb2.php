<?php
/*
Plugin Name: EmaMetaboxes CMB2
Plugin URI:
Description: Agrega MetaBoxes al sitio Machupicchu New
Version: 1.0
Author: Elvis Mamani Aguilar (Ema)
Author URI:
License: GLP2
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'campos_tours');
function campos_tours() {
	$prefix = 'ema_campos_tours_';

	$metabox_tours = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Datos de Cabezera de tour ( Imagen, Subtitulo, Precio )', 'cmb2' ),
		'object_types'  => array( 'tours' ), // Post type
	) );

	$metabox_tours->add_field( array(
	  'name'       		=> esc_html__( 'SubTitulo', 'cmb2' ),
	  'desc'       		=> esc_html__( 'Subtitulo del Tour', 'cmb2' ),
	  'id'         		=> $prefix . 'subtitulo',
	  'type'       		=> 'text',
	) );

	$metabox_tours->add_field( array(
	  'name'       		=> esc_html__( 'Costo de Tour Adulto', 'cmb2' ),
	  'desc'       		=> esc_html__( 'Precio de Tour en Dolares (adulto)', 'cmb2' ),
	  'id'         		=> $prefix . 'price',
	  'type'       		=> 'text',
	) );

	$metabox_tours->add_field( array(
	  'name'       		=> esc_html__( 'Costo de Tour Niño', 'cmb2' ),
	  'desc'       		=> esc_html__( 'Precio de Tour en Dolares (niño)', 'cmb2' ),
	  'id'         		=> $prefix . 'price_child',
	  'type'       		=> 'text',
	) );

	$metabox_tours->add_field( array(
	  'name'       		=> esc_html__( 'Calicacion', 'cmb2' ),
	  'desc'       		=> esc_html__( 'Califique del 1 al 5', 'cmb2' ),
	  'id'         		=> $prefix . 'calificacion',
		'type'       		=> 'select',
		'show_option_none' 	=> true,
		'options'          	=> array(
			'low' 						=> esc_html__( '1', 'cmb2' ),
			'Sufficient'   		=> esc_html__( '2', 'cmb2' ),
			'Good'     				=> esc_html__( '3', 'cmb2' ),
			'Excellent'     	=> esc_html__( '4', 'cmb2' ),
			'Super'     			=> esc_html__( '5', 'cmb2' ),
		)
	) );

	// Campos de detalle y slider
	$metabox_tours->add_field( array(
	  'name'       		=> esc_html__( 'Galeria de Imagenes', 'cmb2' ),
	  'desc'       		=> esc_html__( 'Sube galeria de Imagenes del Tour ', 'cmb2' ),
	  'id'         		=> $prefix . 'galeria',
		'type'       		=> 'file_list',
		'text' => array(
			'add_upload_files_text' => 'Subir Galeria', // default: "Add or Upload Files"
			'remove_image_text' => 'Replacement', // default: "Remove Image"
			'file_text' => 'Replacement', // default: "File:"
			'file_download_text' => 'Replacement', // default: "Download"
			'remove_text' => 'Replacement', // default: "Remove"
		),
	) );

}

function cmb2_output_file_list( $file_list_meta_key, $img_size = 'tour_img_slide' ) {
		// Get the list of files
		$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
		// inner Elements
		echo '<div class="carousel-inner">';
		// Loop through them and output an image
		$i=0;
		foreach ( (array) $files as $attachment_id => $attachment_url ) {
			if($i == 0)
				$r = "active";
			else $r = "";
			echo '<div class="item cont_img '. $r.'">';

				//echo '<img src="' . get_the_post_thumbnail_url() . '">';
				echo wp_get_attachment_image( $attachment_id, $img_size );
				echo '<div class="container">';
					echo '<div class="carousel-caption">';
						echo '<h2>'. the_title_attribute( ) .'</h2>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			$i++;
		}
		echo '</div>';
}

// Campos dentro del Tabs description, detail, price and include
add_action( 'cmb2_admin_init', 'campos_tour_content');
function campos_tour_content() {
	$prefix = 'cbx_tour_content_';

	$metabox_content = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Contenido de Tour (Itinerario, description, detail, table of price and include )', 'cmb2' ),
		'object_types'  => array( 'tours' ), // Post type
	) );

	$metabox_content->add_field( array(
		'name' => 'Precio del Tour',
		'desc' => 'Ingresar la tabla de Precio segun Hotel (titulo, contenido)',
		'id' => $prefix . 'txtprecio',
		'type' => 'wysiwyg',
		'options' => array(),
	)	);

	$metabox_content->add_field( array(
		'name' => 'Lo que Incluye en el Tour',
		'desc' => 'Ingresar que Incluye y no Incluye (titulo, contenido)',
		'id' => $prefix . 'txtincluye',
		'type' => 'wysiwyg',
		'options' => array(),
	)	);

}
