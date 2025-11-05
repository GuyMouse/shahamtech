<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

if( is_post_type_archive('custom') ){

	get_template_part( 'template-parts/archive-custom' );

}  else {

	get_template_part( 'template-parts/archive' );

}

get_footer();

?>