<?php

// Post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'tl-client-image-size', 100, 100, true );


function testimonial_lite_register_post_type() {

	$labels = array(
		'name'               => esc_html__( 'Testimonials', 'testimonial-lite' ),
		'singular_name'      => esc_html__( 'Testimonial', 'testimonial-lite' ),
		'add_new'            => esc_html_x( 'Add New Testimonial', 'testimonial-lite', 'testimonial-lite' ),
		'add_new_item'       => esc_html__( 'Add New Testimonial', 'testimonial-lite' ),
		'edit_item'          => esc_html__( 'Edit Testimonial', 'testimonial-lite' ),
		'new_item'           => esc_html__( 'New Testimonial', 'testimonial-lite' ),
		'view_item'          => esc_html__( 'View Testimonial', 'testimonial-lite' ),
		'search_items'       => esc_html__( 'Search Testimonials', 'testimonial-lite' ),
		'not_found'          => esc_html__( 'No Testimonials found', 'testimonial-lite' ),
		'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash', 'testimonial-lite' ),
		'parent_item_colon'  => esc_html__( 'Parent Testimonial:', 'testimonial-lite' ),
		'menu_name'          => esc_html__( 'Testimonials Lite', 'testimonial-lite' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => WPL_TL_URL . 'admin/assets/images/icon.png',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => false,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'thumbnail'
		)
	);

	register_post_type( 'testimonial_lite', $args );
}

add_action( 'init', 'testimonial_lite_register_post_type' );


/* Including files */
if(file_exists( WPL_TL_PATH . 'inc/shortcodes.php')){
	require_once(WPL_TL_PATH . "inc/shortcodes.php");
}