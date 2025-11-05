<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

if(is_front_page()){

	echo 'silence is golden.';

} elseif( is_home() ){

	get_template_part( 'template-parts/archive' );

}

get_footer();