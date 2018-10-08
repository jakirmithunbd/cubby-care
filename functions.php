<?php  
show_admin_bar(false);

require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/cubby-template-function.php';

require get_template_directory() . '/inc/cubby-breadcrumb.php';

function cubby_setup_theme(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-header');
	add_theme_support('custom-logo');
	add_theme_support('html5', array('search-form', 'comment-list'));


	//load text domain
	load_theme_textdomain('cubby', get_template_directory() . '/language');

	// Menu Register 

	if(function_exists('register_nav_menus')){
		register_nav_menus(array(
			'menu-1'	=>	__('Main Menu', 'cubby'),
			'menu-2'	=>	__('Footer Menu', 'cubby'),
			'menu-3'	=>	__('Footer Right Menu', 'cubby'),
		));
	}
}
add_action('after_setup_theme', 'cubby_setup_theme');

function cubby_assets(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('dashicon');

	//script ===
	wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '0.0.1', true);
	wp_enqueue_script('sidr', get_theme_file_uri('/assets/js/masonry.min.js'), array('jquery'), '0.0.2', true);
	wp_enqueue_script('slick', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), '0.0.3', true);

	$gmap_api = get_field('google_map_api_key', 'options');
	$googleapi = "//maps.googleapis.com/maps/api/js?key=$gmap_api";
	wp_enqueue_script('gmap_api', $googleapi, array(), false, true);

	wp_enqueue_script('main_js', get_theme_file_uri('/assets/js/scripts.js'), array('jquery'), null, true);

	$map_icon = get_field('map_pin', 'options');
	$map_zoom = get_field('map_zoom', 'options');
	$location = get_field('google_map');


	//localize data 
	$data = array(
		'map_icon' => $map_icon,
		'map_zoom' => $map_zoom,
		'gmap_latitude' => $location['lat'],
		'gmap_longitude' => $location['lng'],
		'gmap_address' => $location['address'],
		'site_url'   => get_theme_file_uri(),
		'admin_ajax'   => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script('main_js', 'ajax', $data);

	//css ===
	wp_enqueue_style('bootstrap_css', get_theme_file_uri('/assets/css/bootstrap.min.css'));
	wp_enqueue_style('slick_css', get_theme_file_uri('/assets/css/slick.css'));
	wp_enqueue_style('slick-theme', get_theme_file_uri('/assets/css/slick-theme.css'));
	wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/font-awesome.min.css'));
	wp_enqueue_style('main_style', get_theme_file_uri('/assets/css/main-style.css', null, time()));
	wp_enqueue_style('cubby_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'cubby_assets');

// acf options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/**
 * Dashboard google map api key support.
 */
add_filter('acf/settings/google_api_key', function () {
  	$gmap_api = get_field('google_map_api_key', 'options');
	return $gmap_api;
});

// SVG icon support
function cubby_svg_support($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cubby_svg_support');

/*** Get all page id */
function getPageID() {
  	global $post;
  	$postid = $post->ID;
  	$queried_object = get_queried_object();
  	if(is_home() && get_option('page_for_posts')) {
		$postid = get_option('page_for_posts');
  	}
  	else if (is_front_page()) {
  		$postid = get_option( 'page_on_front' );
  	}
  	else if (is_archive()) {
  		$postid = get_queried_object();
  	}
  	else if ( $queried_object ) {
    	$postid = $queried_object->ID;
   	}

  	return $postid;
}