<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {

        wp_deregister_script('jquery');
		wp_register_script('jquery', ASSETS_URL . '/assets/owl/docs/assets/vendors/jquery.min.js', false, '2.1.1', true);
        wp_register_script('js_main', ASSETS_URL . '/assets/js/custom.js', array('jquery'), '1.0', true);
        wp_register_script('owl-carousel', ASSETS_URL . '/assets/owl/dist/owl.carousel.js', array('js_main'), '1.0', true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('js_main');
        wp_enqueue_script('owl-carousel');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/main.css';

	if( $styles_path ) {

		wp_register_style('fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700|Martel+Sans:400,700|Montserrat:400,700|Open+Sans:400,700', array(), false, 'all');
		wp_register_style('fa', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css', array('fonts'), false, 'all');
		wp_register_style('owl-carousel', ASSETS_URL . '/assets/owl/dist/assets/owl.carousel.css', array('fa'), false, 'all');
		wp_register_style('owl-theme', ASSETS_URL . '/assets/owl/dist/assets/owl.theme.default.min.css', array('owl-carousel'), false, 'all');
		wp_register_style('hamburger', ASSETS_URL . '/assets/hamburgers-master/dist/hamburgers.css', array('owl-carousel'), false, 'all');
		wp_register_style('style', ASSETS_URL . '/assets/css/style.css', array('hamburger'), false, 'all');


		wp_enqueue_style('fonts');
		wp_enqueue_style('fa');
		wp_enqueue_style('owl-carousel');
		wp_enqueue_style('owl-theme');
		wp_enqueue_style('hamburger');
		wp_enqueue_style('style');

	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

// Apibrėžiame navigacijas

function register_theme_menus() {
   
	register_nav_menus(array( 
        'primary-navigation' => __( 'Primary Navigation' ),
        'secondary-navigation' => __( 'Secondary Navigation' ),
        'footer-navigation' => __( 'Footer Navigation' )
    ));
}

add_action( 'init', 'register_theme_menus' );

// Apibrėžiame widgets juostas

#$sidebars = array( 'Footer Widgets', 'Blog Widgets' );

if( isset($sidebars) && !empty($sidebars) ) {

	foreach( $sidebars as $sidebar ) {

		if( empty($sidebar) ) continue;

		$id = sanitize_title($sidebar);

		register_sidebar(array(
			'name' => $sidebar,
			'id' => $id,
			'description' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

// Custom posts

$themePostTypes = array(
//'Testimonials' => 'Testimonial'

);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = 'vcs-starter' . '-' . sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}
//options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
//dump
function dump($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

// sukuriame IMG dydi
// add_image_size('pavadinimas', plotis, aukstis, false);

add_image_size('logo', 100, 50, false);
add_image_size('news-thumbnail', 59, 59, true);
add_image_size('passport', 240, 180, false);
add_image_size('profile-picture', 286, 286, true);

//hex2rbg funkcija
function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}
?>