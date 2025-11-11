<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//============================
//	CONSTANTS
//============================
define("IMAGES_DIR",get_template_directory_uri().'/assets/images');
define("IMAGES_PATH",get_template_directory().'/assets/images');
define("ICONS_DIR",get_template_directory_uri().'/assets/icons');
define("ICONS_PATH",get_template_directory().'/assets/icons');
define("TEMPLATE_PARTS",'template-parts');
define("TEMPLATE_COMPONENTS",TEMPLATE_PARTS.'/components/component');
define("THEME_VERSION",time());


//============================
//	INCLUDES
//============================
include TEMPLATEPATH.'/functions/setup.php';
include TEMPLATEPATH.'/functions/shortcodes.php';
include TEMPLATEPATH.'/functions/func.admin.php';
include TEMPLATEPATH.'/functions/func.ajax.php';
include TEMPLATEPATH.'/functions/func.content.php';
include TEMPLATEPATH.'/functions/modules/class.Module.php';


//============================
//	ENQUEUE STYLES & SCRIPTS
//============================

//-- styles --//

function get_assets_url(){
    return get_template_directory_uri();
}

function enqueue_theme_styles() {
    $style = Array();
    $style[] = get_assets_url().'/style.css';
    $style[] = get_assets_url().'/assets/css/style.css'; 
    // $style[] = get_assets_url().'/assets/lib/swiperjs/swiper-bundle.min.css'; 
    // $style[] = get_assets_url().'/assets/lib/sweetalert2/sweetalert2.min.css'; 
    // $style[] = get_assets_url().'/assets/lib/select2/css/select2.min.css'; 
    for($i=0; $i<count($style); $i++){
        $label = "style_".$i;
        wp_enqueue_style($label,$style[$i],array(),THEME_VERSION,'all');
    }
}
add_action('wp_enqueue_scripts','enqueue_theme_styles');

//-- scripts --//

function register_theme_scripts() {
    // wp_deregister_script('jquery');
    // wp_register_script('jquery',get_assets_url().'/assets/js/jquery.min.js',array(),THEME_VERSION,true);
    // wp_enqueue_script('jquery');
	$scripts = Array();
    // $scripts[] = get_assets_url().'/assets/lib/swiperjs/swiper-bundle.min.js'; 
    // $scripts[] = get_assets_url().'/assets/lib/sweetalert2/sweetalert2.min.js'; 
    // $scripts[] = get_assets_url().'/assets/lib/select2/js/select2.min.js'; 
    $scripts[] = get_assets_url().'/assets/js/main.js';
    foreach($scripts AS $key=>$url){
        $label = is_numeric($key) ? "script_".$key : $key;
        wp_enqueue_script($label,$url,array('jquery'),THEME_VERSION,true);
    }
}
add_action('wp_enqueue_scripts','register_theme_scripts',0);



//-- admin scripts --//

function register_admin_scripts($hook) {
    //wp_enqueue_script('wp-admin',get_template_directory_uri().'/assets/js/wp-admin.js',array('jquery'),THEME_VERSION,true);
}
add_action('admin_enqueue_scripts', 'register_admin_scripts');

//-- admin styles --//

function custom_admin_css() {
	wp_enqueue_style('wp-admin-style',get_template_directory_uri().'/assets/css/wp-admin.css',array(),THEME_VERSION,'all');
}
add_action('admin_head','custom_admin_css');


//============================
//	ADD SVG SUPPORT
//============================

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//============================
//	LANGUAGES
//============================

define('LANG',get_language_code());

function get_language_code(){
    if( function_exists('pll_current_language') ){
        return pll_current_language('slug');
    }
    return 'he';
}


//============================
//	OTHER
//============================

function get_the_featured_image($id=null){
    // if( !$id ) $id = get_queried_object_id();
    if(has_post_thumbnail($id)) return get_the_post_thumbnail_url($id);
    return null;
}

function attch_unique_post_slug($slug,$post_ID,$post_status,$post_type,$post_parent,$original_slug){
    if('attachment' == $post_type)
        $slug = 'attachment-'.$original_slug;
    return $slug;
}
add_filter('wp_unique_post_slug','attch_unique_post_slug',10,6);

function sort_terms_hierarchically(Array &$cats, Array &$into, $parentId = 0){
    foreach ($cats as $i => $cat) {
        if ($cat->parent == $parentId) {
            $into[$cat->term_id] = $cat;
            unset($cats[$i]);
        }
    }
    foreach ($into as $topCat) {
        $topCat->children = array();
        sort_terms_hierarchically($cats, $topCat->children, $topCat->term_id);
    }
}

// add_filter( 'pll_the_languages_args', function( $args ) {
//     $args['display_names_as'] = 'slug';
//     return $args;
// } );

add_filter('nav_menu_item_title', function($title, $item) {
    return mb_substr($title, 0, 2, 'UTF-8');
}, 10, 2);


