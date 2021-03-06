<?php  
show_admin_bar(false);

require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/cubby-template-function.php';
require get_template_directory() . '/inc/cubby-breadcrumb.php';
require get_template_directory() . '/inc/cubby_related_post.php';
require get_template_directory() . '/inc/cubby_ajax.php';

function cubby_setup_theme(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-header');
	add_theme_support('custom-logo');
	add_theme_support('html5', array('search-form', 'comment-list'));


	//load text domain
	load_theme_textdomain('cubby', get_template_directory() . '/language');

	// add image size
	add_image_size( $post_image, 410, 215, true);


	// Menu Register 
	if(function_exists('register_nav_menus')){
		register_nav_menus(array(
			'menu-1'	=>	__('Main Menu', 'cubby'),
			'menu-4'	=>	__('Mobile Menu', 'cubby'),
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
	wp_enqueue_script('masonary', get_theme_file_uri('/assets/js/masonry.min.js'), array('jquery'), '0.0.7', true);
	wp_enqueue_script('imageload', get_theme_file_uri('/assets/js/imageload.js'), array('masonary'), '0.0.5', true);
	wp_enqueue_script('sidr', get_theme_file_uri('/assets/js/sidr.min.js'), array('jquery'), '0.0.2', true);
	wp_enqueue_script('popup-colorbox', get_theme_file_uri('/assets/js/colorbox-min.js'), array('jquery'), '0.0.9', true);
	wp_enqueue_script('slick', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), '0.0.3', true);
	// wp_enqueue_script('wowjs', get_theme_file_uri('/assets/js/wow.min.js'), array('jquery'), '0.0.5', true);

	$gmap_api = get_field('google_map_api_key', 'options');
	$googleapi = "//maps.googleapis.com/maps/api/js?key=$gmap_api";
	wp_enqueue_script('gmap_api', $googleapi, array(), false, true);

	wp_enqueue_script('main_js', get_theme_file_uri('/assets/js/scripts.js'), array('jquery'), null, true);

	$map_icon = get_field('map_icon', 'options');
	$map_zoom = get_field('map_zoom', 'options');
	$location = get_field('google_map');

	$centers = get_posts(
		array(
			'post_type' => 'centre',
			'posts_per_page' => -1
		)
	);

	$centers_ids = wp_list_pluck( $centers, 'ID' );
	$data_to_localize = [];
	foreach ($centers_ids as $id) {
		$title = get_the_title($id);
		$permalink = get_the_permalink($id);
		$google_map = get_field('google_map', $id);
		$centre_address = get_field('centre_address', $id);
		$opening_hours = get_field('opening_hours', $id);
		$data_to_localize[$id]["title"] = $title;
		$data_to_localize[$id]["permalink"] = $permalink;
		$data_to_localize[$id]["google_map"] = $google_map;
		$data_to_localize[$id]["centre_address"] = $centre_address;
		$data_to_localize[$id]["opening_hours"] = $opening_hours;
	}

	// //localize data 
	$data = array(
		'map_icon' => $map_icon,
		'map_zoom' => $map_zoom,
		'gmap_latitude' => $location['lat'],
		'gmap_longitude' => $location['lng'],
		'gmap_address' => $location['address'],
		'new_data' => $data_to_localize,
		'site_url'   => get_theme_file_uri(),
		'admin_ajax'   => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script('main_js', 'ajax', $data);

	//css ===
	wp_enqueue_style('bootstrap_css', get_theme_file_uri('/assets/css/bootstrap.min.css'));
	wp_enqueue_style('slick_css', get_theme_file_uri('/assets/css/slick.css'));
	wp_enqueue_style('slick-theme', get_theme_file_uri('/assets/css/slick-theme.css'));
	wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/font-awesome.min.css'));
	wp_enqueue_style('animatecss', get_theme_file_uri('/assets/css/animate.min.css'));
	wp_enqueue_style('main_style', get_theme_file_uri('/assets/css/main-style.css', null, time()));
	wp_enqueue_style('cubby_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'cubby_assets');

/**
 * Dashboard google map api key support.
 */
add_filter('acf/settings/google_api_key', function () {
  	$gmap_api = get_field('google_map_api_key', 'options');
	return $gmap_api;
});

// acf options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

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

// search form 
function cubby_search_form(){

	$form ='
        <form id="search-box" role="search" method="get" action="'. esc_url( home_url( '/' ) ) . '">
        <div class="input-group">
            <span class="input-group-btn">
            <button type="submit"><img src="' . get_theme_file_uri('/assets/images/svg/searchcolor.svg') . '" class="img-responsive" alt=""></button>
            </span>
            <input type="search" name="s" class="form-control" placeholder="Search" />
            <span class="input-group-btn">
            <a id="close" href="#"><img src="' . get_theme_file_uri('/assets/images/svg/close-color.svg') . '" class="img-responsive" alt=""></a>
            </span>
        </div><!-- /input-group -->
    </form>';

    return $form;
}

function cubby_mobile_search() {
	$form = '
	<form class="search-box" role="search" method="get" action="'. esc_url( home_url( '/' ) ) . '">
        <input type="search" name="s" class="text search-input" placeholder="Search">

        <button type="submit"><span class="fa fa-search"></span></button>
    </form>';

    return $form;
}


// Wow scripts
// add_action('wp_footer', 'cubby_footer_scripts', 40);
function cubby_footer_scripts(){
 echo '
 <script>
        wow = new WOW(
          {
            animateClass: "animated",
            offset:       100,
            callback:     function(box) {
              console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
          }
        );
        wow.init();
        jQuery("#moar").on("click", function(){
			var section = document.createElement("section");
			section.className = "section--purple wow fadeInDown";
			this.parentNode.insertBefore(section, this);
        });
    </script>
 ';
}

// filter the locations select field for contact forms
add_filter( 'gform_pre_render_2', 'cubby_populate_centre' );
add_filter( 'gform_pre_validation_2', 'cubby_populate_centre' );
add_filter( 'gform_pre_submission_filter_2', 'cubby_populate_centre' );
add_filter( 'gform_admin_pre_render_2', 'cubby_populate_centre' );

function cubby_populate_centre( $form ) {
 
    foreach ( $form['fields'] as &$field ) {
 
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-centre' ) === false ) {
            continue;
        }

        $centre_args = array(
        	'post_type' => 'centre',
        	'posts_per_page' => -1
        );

        if(is_singular('centre')){
        	$centre_args['post__in'] = array(get_the_ID());
        }
 
        $centres = get_posts($centre_args);

        $choices = array();
 
        foreach ( $centres as $key => $centre ) {
        	$text = ( $key === 0 && is_singular('centre') ) ? 'Enquire at ' . $centre->post_title : $centre->post_title;
            $choices[] = array( 'text' => $text, 'value' => $centre->post_title );
        }
 
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->choices = $choices;

    }
 
    return $form;
}

// filter the locations select field for contact forms
add_filter( 'gform_pre_render_3', 'cubby_populate_centre_contact' );
add_filter( 'gform_pre_validation_3', 'cubby_populate_centre_contact' );
add_filter( 'gform_pre_submission_filter_3', 'cubby_populate_centre_contact' );
add_filter( 'gform_admin_pre_render_3', 'cubby_populate_centre_contact' );

function cubby_populate_centre_contact( $form ) {
 
    foreach ( $form['fields'] as &$field ) {
 
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-centre-contact' ) === false ) {
            continue;
        }

        $centre_args = array(
        	'post_type' => 'centre',
        	'posts_per_page' => -1
        );
 
        $centres = get_posts($centre_args);

        $choices = array();
 
        foreach ( $centres as $key => $centre ) {
        	$text = ( $key === 0 && is_singular('centre') ) ? 'Enquire at ' . $centre->post_title : $centre->post_title;
            $choices[] = array( 'text' => $text, 'value' => $centre->post_title );
        }
 
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->choices = $choices;

    }
 
    return $form;
}

function cubby_quote_notification($notification, $form, $entry){
	if( is_singular( 'centre' )){
		$centre_id = get_the_ID();
		$address = get_field('centre_address', $centre_id);
		$notification['to'] .= ', ' . $address['email'];
	}
	return $notification;
}
add_filter('gform_notification_2', 'cubby_quote_notification', 10, 3);



// function get_acf_file( $key = 'file', $post_id = '' ) {
// 	if($post_id == ''):
// 		global $post;
// 		$post_id = $post->ID;
// 	endif;

// 	$file = get_field($key, $post_id);

// 	if( !empty($file) ):
// 		$file_url = $file['url'];
// 		$file_type = get_file_type($file['mime_type']);

// 		$file_size = get_file_size($file_url);
// 	endif;

// 	$file_details = array(
// 		'url'  => $file_url,
// 		'type' => $file_type,
// 		'size' => $file_size
// 	);

// 	return $file_details;
// }