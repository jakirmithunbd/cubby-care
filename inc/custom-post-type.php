<?php 
//  Tesimonials Custom Post Type
add_action('init','cubbuy_services_custom_post');
function cubbuy_services_custom_post() {
	register_post_type( 'tesimonials',
		array(
			'labels' =>
				array(
					'name' => __( 'Testimonial', 'cubbuy'),	
					'singular_name' => __( 'Testimonial', 'cubbuy'),
					'add_new_item' => __('Add New TesimTestimonialoTestimonialnial', 'cubbuy'), 
					'add_new' => __( 'Add New Testimonial', 'cubbuy'),
					'edit_item' => __( 'Edit Testimonial', 'cubbuy'),
					'new_item' => __( 'New Testimonial', 'cubbuy' ),
					'view_item' => __( 'View Testimonial' ),
					'not_found' => __( 'Sorry, we couldn\'t find the Testimonial you are looking for.',  'cubbuy' ),
				),
			
			'public' => true,
			'menu_icon'=>'dashicons-format-quote',
			'supports' => array( 'title','editor','thumbnail', 'excerpt')
		)
	);
}


//  Our Centre Custom Post Type
add_action('init','cubby_centre_custom_post');
function cubby_centre_custom_post() {
	register_post_type( 'centre',
		array(
			'labels' =>
				array(
					'name' => __( 'Centres', 'cubbuy'),	
					'singular_name' => __( 'Centre', 'cubbuy'),
					'add_new_item' => __('Add New Centre', 'cubbuy'), 
					'add_new' => __( 'Add New Centre', 'cubbuy'),
					'edit_item' => __( 'Edit Centre', 'cubbuy'),
					'new_item' => __( 'New Centre', 'cubbuy' ),
					'view_item' => __( 'View Centre' ),
					'not_found' => __( 'Sorry, we couldn\'t find the Centre you are looking for.',  'cubbuy' ),
				),
			
			'public' => true,
			'menu_icon'=>'dashicons-location-alt',
			'supports' => array( 'title','editor','thumbnail', 'excerpt')
		)
	);
}

