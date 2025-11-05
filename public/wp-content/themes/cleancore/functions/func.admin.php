<?php

function wpdocs_register_meta_boxes() {
	// add_meta_box( 'meta-box-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_display_callback', 'post' );
    add_meta_box( 'crimson_box', 'Crimson', 'crimson_content', 'index.php', 'advanced', 'default', null );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );



function crimson_content(){
    echo 'hello';
}

?>