<?php

//--- Theme settings
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
add_theme_support('customize-selective-refresh-widgets');
remove_filter('template_redirect', 'redirect_canonical'); 
add_post_type_support( 'page', 'excerpt' );
add_filter('max_srcset_image_width', function($max_srcset_image_width, $size_array){
    return 2540;
}, 10, 2);
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('auto_update_plugin','__return_false');


//--- Images Size
// add_image_size('thumb', 200, 99999);
// add_image_size('header', 2000, 99999);
// add_image_size('card', 1300, 99999);
// add_image_size('member-photo', 720, 595, true);
// add_image_size('member-image', 764, 325, true);


//--- Nav Menus
add_action('init',function(){
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation'),
        'footer_navigation'  => __('Footer Navigation'),
    ]);
});


//--- ACF settings
add_action('acf/init',function(){
	$option_page_string = 'אפשרויות האתר'; // Edit option page name
    if( function_exists('acf_add_options_page') ) {
        $option_page = acf_add_options_page(array(
            'page_title' => $option_page_string,
			'menu_title' => $option_page_string,
			'menu_slug'  => 'general-options',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ));
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('רכיבים גלובליים'),
            'menu_title'  => __('רכיבים גלובליים'),
            'parent_slug' => $option_page['menu_slug'],
            'menu_slug'   => $option_page['menu_slug'].'-global-components',
            'capability'  => 'edit_posts',
        ));
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('הדר ופוטר'),
            'menu_title'  => __('הדר ופוטר'),
            'parent_slug' => $option_page['menu_slug'],
            'menu_slug'   => $option_page['menu_slug'].'-header-footer',
            'capability'  => 'edit_posts',
        ));
    }
});


//--- Post Types Queries & Redirections

add_action('pre_get_posts',function($query){

    // if ( !is_admin() && $query->is_post_type_archive('dictionary') && $query->is_main_query() ) {
    //     $query->set( 'orderby', 'title' );
    //     $query->set( 'order', 'ASC' );
    // }

    // if ( !is_admin() && $query->is_post_type_archive('news') && $query->is_main_query() ) {
    //     $query->set( 'posts_per_page', -1 );
    // }

    return $query;

});

add_action('template_redirect',function(){

    // if(is_singular('question')){
    //     wp_safe_redirect( get_post_type_archive_link('question') );
    //     exit();
    // }

});


//--- Post Types

function custom_post_type_advisor() {
    $labels = array(
        'name'                => _x( 'יועצים', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'יועץ', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'יועצים', 'twentytwenty' ),
        'parent_item_colon'   => __( 'יועץ אב', 'twentytwenty' ),
        'all_items'           => __( 'כל היועצים', 'twentytwenty' ),
        'view_item'           => __( 'צפייה ביועץ', 'twentytwenty' ),
        'add_new_item'        => __( 'הוספת יועץ', 'twentytwenty' ),
        'add_new'             => __( 'הוספת יועץ חדש', 'twentytwenty' ),
        'edit_item'           => __( 'עריכת יועץ', 'twentytwenty' ),
        'update_item'         => __( 'עדכון יועץ', 'twentytwenty' ),
        'search_items'        => __( 'חיפוש יועצים', 'twentytwenty' ),
        'not_found'           => __( 'אין תוצאות', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'אין תוצאות באשפה', 'twentytwenty' ),
    );
    $args = array(
        'labels'              => $labels,
        'supports'            => array( 'title', 'author', 'editor' ),
        // 'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-businessperson',
        'can_export'          => true,
        'has_archive'         => 'advisors',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'rewrite'             => array(
			'slug' => 'advisor',
			'with_front' => false,
        ),
    );
    register_post_type( 'advisor', $args );
}
// add_action( 'init', 'custom_post_type_advisor', 0 );

function register_advisor_location() {
	$labels = array(
        'name'                => _x( 'מיקומים', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'מיקום', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'מיקומים', 'twentytwenty' ),
        'parent_item_colon'   => __( 'מיקום אב', 'twentytwenty' ),
        'all_items'           => __( 'כל המיקומים', 'twentytwenty' ),
        'view_item'           => __( 'צפייה במיקום', 'twentytwenty' ),
        'add_new_item'        => __( 'הוספת מיקום', 'twentytwenty' ),
        'add_new'             => __( 'הוספת מיקום חדש', 'twentytwenty' ),
        'edit_item'           => __( 'עריכת מיקום', 'twentytwenty' ),
        'update_item'         => __( 'עדכון מיקום', 'twentytwenty' ),
        'search_items'        => __( 'חיפוש מיקומים', 'twentytwenty' ),
        'not_found'           => __( 'אין תוצאות', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'אין תוצאות באשפה', 'twentytwenty' ),
	);
	$args = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite'           => [
			'slug'         => 'advisors/location', 
			'with_front'   => false,
			'hierarchical' => true
		]
	);
	register_taxonomy( 'location', array( 'advisor' ), $args );
}
// add_action('init','register_advisor_location',0);

?>