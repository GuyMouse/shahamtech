<?php

add_action('wp_enqueue_scripts','site_load_ajax_scripts',10);
add_action('wp_ajax_action_name','site_action_name_ajax_handler');
add_action('wp_ajax_nopriv_action_name','site_action_name_ajax_handler');

function site_load_ajax_scripts() {
	// global $wp_query;
	wp_register_script('site_ajax', get_template_directory_uri().'/assets/js/ajax.js', array('jquery') , THEME_VERSION );
	wp_localize_script('site_ajax','site_ajax_params', array(
		'ajaxurl' => site_url().'/wp-admin/admin-ajax.php',
		'iconsurl' => ICONS_DIR,
	) );
    wp_enqueue_script('site_ajax');
}

function site_action_name_ajax_handler(){
	// actions...
    die(0);
}

?>