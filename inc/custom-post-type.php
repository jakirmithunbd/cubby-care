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
// Tesimonials solution_post_taxonomy
// add_action( 'init', 'cubbuy_services_post_taxonomy');
// function cubbuy_services_post_taxonomy() {
// 	register_taxonomy(
// 		'tesimonials_cat',  
// 		'tesimonials',                  
// 		array(
// 			'hierarchical'          => true,
// 			'label'                 => 'Tesimonials Category',  
// 			'query_var'             => true,
// 			'show_admin_column'     => true,
// 			'rewrite'               => array(
// 				'slug'                 => 'tesimonials-category', 
// 				'with_front'    => true 
// 				)
// 			)
// 	);
// }

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

// // Portfilio_post_taxonomy
// add_action( 'init', 'leisure_portfolio_post_taxonomy');
// function leisure_portfolio_post_taxonomy() {
// 	register_taxonomy(
// 		'portfolio_cat',  
// 		'portfolio',                  
// 		array(
// 			'hierarchical'          => true,
// 			'label'                 => 'Portfolio Category',  
// 			'query_var'             => true,
// 			'show_admin_column'     => true,
// 			'rewrite'               => array(
// 				'slug'                 => 'Portfolio-category', 
// 				'with_front'    => true 
// 				)
// 			)
// 	);
//  }

// //  Faqs Custom Post Type
// add_action('init','leisure_faq_custom_post');
// function leisure_faq_custom_post() {
// 	register_post_type( 'faqs',
// 		array(
// 			'labels' =>
// 				array(
// 					'name' => __( 'Faqs', 'leisure'),	
// 					'singular_name' => __( 'Faq', 'leisure'),
// 					'add_new_item' => __('Add New Faqs', 'leisure'), 
// 					'add_new' => __( 'Add New Faqs', 'leisure'),
// 					'edit_item' => __( 'Edit Faqs', 'leisure'),
// 					'new_item' => __( 'New Faqs', 'leisure' ),
// 					'view_item' => __( 'View Faqs' ),
// 					'not_found' => __( 'Sorry, we couldn\'t find the Faqs you are looking for.',  'leisure' ),
// 				),
			
// 			'public' => true,
// 			'menu_icon'=>'dashicons-format-status',
// 			'supports' => array( 'title','editor','thumbnail')
// 		)
// 	);
// }

// // Portfilio_post_taxonomy
// add_action( 'init', 'leisure_faqs_post_taxonomy');
// function leisure_faqs_post_taxonomy() {
// 	register_taxonomy(
// 		'faqs_cat',  
// 		'faqs',                  
// 		array(
// 			'hierarchical'          => true,
// 			'label'                 => 'Faqs Category',  
// 			'query_var'             => true,
// 			'show_admin_column'     => true,
// 			'rewrite'               => array(
// 				'slug'                 => 'Faqs-category', 
// 				'with_front'    => true 
// 				)
// 			)
// 	);
//  }