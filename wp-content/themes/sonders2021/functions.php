<?php
// Theme Functions

/* Boostrap NavWalker */
function register_navwalker(){
  require_once get_template_directory() . '/assets/_inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

/* Remove Admin Bar from Frontend */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar(){
  show_admin_bar(false);
}

if (function_exists('add_theme_support')){
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 700, '', true);  		// Large Thumbnail
  add_image_size('medium', 250, '', true); 		// Medium Thumbnail
  add_image_size('small', 125, '', true);  		// Small Thumbnail
  add_image_size('custom-size', 700, 200, true);  // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'wpt_setup');
if(!function_exists('wpt_setup')):
  function wpt_setup() {
    register_nav_menu('primary', __('Primary Navigation', 'wptmenu'));
  }
endif;

function wpt_register_js(){
	if( !is_admin()){
		wp_deregister_script('jquery');

    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.popper.min', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', 'jquery', '', true);
    wp_enqueue_script('mapbox.min', '//api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js', 'jquery', '', true);
    wp_enqueue_script('mapboxjs.min', '//api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js', 'jquery', '', true);
    wp_enqueue_script('aos.min', '//unpkg.com/aos@next/dist/aos.js', 'jquery', '', true);
    wp_enqueue_script('youtube.min', '//youtube.com/player_api', 'jquery', '', true);
    wp_enqueue_script('fontawesome_cdn.min', '//kit.fontawesome.com/0af1bf54c5.js', 'jquery', '', true);
    wp_enqueue_script('swiper.min', '//unpkg.com/swiper@7/swiper-bundle.min.js', 'jquery', '', true);
		wp_enqueue_script(
     		'jquery.extras.min',
     		get_template_directory_uri() . '/assets/js/main.min.js?v='.filemtime(get_template_directory() . '/assets/js/main.min.js'),
      		array('jquery'),
      		filemtime(get_template_directory(). '/assets/js/main.min.js'),
      		true
    		);
  	}
}

function wpt_register_css(){
  wp_enqueue_style('bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  wp_enqueue_style('aos.min', '//unpkg.com/aos@next/dist/aos.css');
  wp_enqueue_style('mapbox.min','//api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css');
  wp_enqueue_style('mapboxcs.min', '//api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css');
  wp_enqueue_style('swiper.min', '//unpkg.com/swiper@7/swiper-bundle.min.css');
  wp_enqueue_style(
    'main.min',
    get_template_directory_uri() . '/assets/css/main.min.css?v='.filemtime(get_template_directory().'/assets/css/main.min.css'),
    'all'
  );
}
add_action('init','wpt_register_js');
add_action('wp_enqueue_scripts', 'wpt_register_css');

function wpt_map_scripts(){
  if(is_page('interactive-map')){
    wp_enqueue_script(
      'maps.min',
      get_template_directory_uri() . '/assets/js/maps.min.js',
      array(),
      filemtime(get_template_directory() . '/assets/js/maps.min.js'),
    );

    wp_enqueue_style(
      'maps.min',
      get_template_directory_uri() . '/assets/css/maps.min.css',
      array(),
      filemtime(get_template_directory() . '/assets/css/maps.min.css'),
      'all'
    );
  }
}
add_action('wp_enqueue_scripts','wpt_map_scripts');

function preload_for_css ( $html, $handle, $href, $media ) {
  if (is_admin()){
    return $html;
  }
  echo '<link rel="stylesheet preload" as="style" href="' . $href . '" media="all">';
}
add_filter ( 'style_loader_tag', 'preload_for_css', 10, 4 );

// Custom Post Types
add_action('init','create_post_type');
function create_post_type(){
  register_post_type('home-builders', array(
	  'label' => __('Home Builders'),
    'singular_label' => __('Home Builder'),
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'rewrite' => array('slug' => 'home-builders'),
    'supports' => array('title','author','excerpt','thumbnail','order','page-attributes','editor'),
    'menu_position' => 16,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-home',
		'show_in_rest'		  => true
  ));
}

add_action('init', 'create_maps');
// Post Type for Map Experience
function create_maps(){
	register_post_type('comm_maps', array(
		'label'					  =>	__('Community Maps'),
		'singular_label'  =>	__('Map'),
		'public'				  =>	true,
		'show_ui'				  =>	true,
		'capability_type'	=>	'post',
		'hierarchical'		=>	true,
		'rewrite'					=>	array('slug' => 'comm-map'),
		'supports'				=>	array('title','thumbnail','custom-fields','order','page-attributes','editor'),
		'menu_position'		=>	25,
		'has_archive'			=>	false,
	));
}

// Create Post Type for Promotions
add_action('init','create_promos');
function create_promos(){
  register_post_type('promos', array(
    'label'           =>	__('Promotions'),
		'singular_label'	=>	__('Promotion'),
		'public'          =>	true,
		'show_ui'         =>	true,
		'capability_type'	=>	'post',
		'hierarchical'		=>	'true',
		'rewrite'         =>	array('slug' => 'promos'),
		'supports'        =>	array('title','custom-fields','order','page-attributes'),
		'menu_position'		=>	25,
		'menu_icon'       =>	'dashicons-megaphone',
		'has_archive'     =>	true,
  ));
}

// Custom Taxonomy : Community Map Sections
add_action('init', 'map_taxonomies', 0);
function map_taxonomies(){
	$_labels = array(
		'name'							=>	_x('Sections', 'taxonomy general name'),
		'singular_name'			=>	_x('Section', 'taxonomy singular name'),
		'search_items'			=>	__('Search Sections'),
		'all_items'					=>	__('All Sections'),
		'parent_item'				=>	__('Parent Section'),
		'parent_item_colon'	=>	__('Parent Section:'),
		'edit_item'					=>	__('Edit Section'),
		'update_item'				=>	__('Update Section'),
		'add_new_item'			=>	__('Add New Section'),
		'new_item_name'			=>	__('New Section Name'),
		'menu_name'					=>	__('Sections'),
	);
	$_args = array(
		'hierarchical'			=>	true,
		'labels'						=>	$_labels,
		'show_ui'						=>	true,
		'show_admin_column'	=>	true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'					=>	true,
		'rewrite'						=>	array('slug' => 'section'),
	);
	register_taxonomy('section','comm_maps', $_args);
}

// Add Class to Images posted on pages
function add_responsive_class($content){
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
  $document = new DOMDocument();
  libxml_use_internal_errors(true);
  if(!empty($document)){
    $document->loadHTML(utf8_decode($content));
  }
  $imgs = $document->getElementsByTagName('img');
  foreach($imgs as $img){
    $existing_class = $img->getAttribute('class');
    $img->setAttribute('class', 'img-fluid ' . $existing_class);
  }
  $html = $document->saveHTML();
	return $html;
}
add_filter('the_content', 'add_responsive_class');

function get_post_categories(){
  $_categories = get_the_category();
  $_sep = ' ';
  if(!empty($_categories)){
    foreach($_categories as $_category){
      $_output .= '<a href="' . esc_url(get_category_link($_category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $_category->name)) . '">' . esc_html($_category->name) . '</a>' . $_sep;
    }
    echo trim($_output, $_sep);
  }
}

function modify_read_more_link(){
  $_moreLink = '<a class="link link--arrowed" href="' . get_permalink() . '">';
  $_moreLink .= file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg');
  $_moreLink .= '</a>';

  return $_moreLink;
}
add_filter('the_content_more_link', 'modify_read_more_link');

add_filter('get_the_archive_title', function($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
    $title = '<span class="vcard">' . get_the_author() . '</span>' ;
  } elseif ( is_tax() ) { //for custom post types
    $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title( '', false );
  }
  return $title;
});

// get post id by slug
function get_id_slug($slug){
  $post = get_page_by_path($slug);
  if($post){
    return $page->ID;
  } else {
    return null;
  }
}

?>
