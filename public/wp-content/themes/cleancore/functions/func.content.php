<?php

function get_primary_category($post_id){
    $taxonomy = 'category'; 
    $primary_cat_id = get_post_meta($post_id, '_yoast_wpseo_primary_' . $taxonomy, true);
    if($primary_cat_id){
        $primary_cat = get_term($primary_cat_id, $taxonomy);
        if (!is_wp_error($primary_cat) && $primary_cat) {
            return array(
                'id' => $primary_cat_id,
                'name' => $primary_cat->name,
            );
        }
    }
    return null;
}

function my_custom_dashboard_widgets() {
    $widget_title = get_user_locale() === 'he_IL' ? 'צריכים שירות ותמיכה?' : 'Need Website Support or Services?';

    wp_add_dashboard_widget('custom_help_widget', $widget_title, 'custom_dashboard_help');
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');


function custom_dashboard_help() {
    $lang = array(
        'he' => 'אתר זה משתמש בתבנית שנוצרה על ידי גיא ארגמן<br/>יש בעיה? זקוקים לפיתוחים נוספים?<br/>ניתן ליצור קשר בדוא"ל <a href="mailto:guy.c.argaman@gmail.com">guy.c.argaman@gmail.com</a><p>במקרים דחופים ניתן גם לחייג למספר <a href="tel:0537140313">0537140313</a></p>',
        'en' => 'This website uses a template created by Guy Argaman<br/>If there are any issues with the website or if you require any additional features please do not hesitate to contact me by Email: <a href="mailto:guy.c.argaman@gmail.com">guy.c.argaman@gmail.com</a><p>If there any urgent issues please call <a href="tel:0537140313">0537140313</a></p>',
    );
    $user_locale = get_user_locale();
    $text = $user_locale == 'he_IL' ? $lang['he'] : $lang['en'];
    echo '
    <div style="padding:0 2rem;">
        <div style="text-align:center;">'.$text.'</div>
    </div>';
}

// -------------------------------------------------------------
// START OF ADMIN BAR CODE
// -------------------------------------------------------------

function crimson_admin_bar_menu( $wp_admin_bar ) {
    
    if ( ! is_admin_bar_showing() ) {
        return;
    }

    $user_locale = get_user_locale(); 
    $parent_title = $user_locale == 'he_IL' ? 'לעזרה' : 'Support';
    
    $wp_admin_bar->add_node( array(
        'id'    => 'crimson_admin_bar',
        'title' => $parent_title, 
        'href'  => '#', 
    ) );
    
    $wp_admin_bar->add_node(array(
        'id' => 'crimson_info',
        'title' => 'Info',
        'href' => '',
        'parent' => 'crimson_admin_bar'
    ));
    $wp_admin_bar->add_node(array(
        'id' => 'crimson_email',
        'title' => 'guy1321@gmail.com',
        'href' => 'mailto:guy1321@gmail.com',
        'parent' => 'crimson_admin_bar'
    ));
    $wp_admin_bar->add_node(array(
        'id' => 'crimson_phone',
        'title' => '0537140313',
        'href' => 'tel:0537140313',
        'parent' => 'crimson_admin_bar'
    ));
}
add_action( 'admin_bar_menu', 'crimson_admin_bar_menu', 999 ); 

function wp_admin_bar_css() {
    echo '<style>
    #wpadminbar #wp-admin-bar-crimson_admin_bar > .ab-item {
        color: #ffffff;
        background: #990000;
        font-weight: 600;
        width: 100%;
        transition: background-color 0.2s ease;
    }
    #wpadminbar #wp-admin-bar-crimson_admin_bar > .ab-item .ab-sub-wrapper .ab-item {
        padding: 0;
        width: 100%;
    }

    #wpadminbar #wp-admin-bar-crimson_admin_bar > .ab-item:hover {
        background: #cc0000;
        color: #ffffff;
    }

    #wpadminbar #wp-admin-bar-crimson_admin_bar > .ab-item:before {
        content: "\f223";
        font-family: dashicons;
        top: 2px;
        margin-right: 5px;
        color: #ffffff;
    }
    
    #wpadminbar #wp-admin-bar-crimson_admin_bar .ab-sub-wrapper #wp-admin-bar-crimson_info {
        border-bottom: 1px solid grey;
        padding-bottom: 5px;
        margin-bottom: 5px;
    }
    
    #wpadminbar #wp-admin-bar-crimson_admin_bar .ab-sub-wrapper #wp-admin-bar-crimson_info > .ab-item {
        border-top: none;
    }
    
    #wpadminbar #wp-admin-bar-crimson_info, 
    #wpadminbar #wp-admin-bar-crimson_phone, 
    #wpadminbar #wp-admin-bar-crimson_email {
        display: flex;
        align-items: center;
        margin-inline-end: 15px;
    }

    #wpadminbar #wp-admin-bar-crimson_admin_bar .ab-sub-wrapper a {
        transition: all 0.2s ease-in-out;
        width: 100%;
    }
    
    #wpadminbar #wp-admin-bar-crimson_admin_bar .ab-sub-wrapper a:hover {
        background-color: #3d3d3d;
        color: #ff3333;
    }
    
    #wpadminbar #wp-admin-bar-crimson_admin_bar .ab-sub-wrapper a:hover:before {
        color: #ff3333;
    }

    #wpadminbar #wp-admin-bar-crimson_admin_bar .ab-item:before {
        width: auto;
    }

    #wpadminbar #wp-admin-bar-crimson_admin_bar .ab-sub-wrapper .ab-item:before {
        color: #f0f0f0; 
    }

    #wpadminbar #wp-admin-bar-crimson_info > .ab-item:before{
        content: "\f14c"; 
        font-family: dashicons;
    }
    
    #wpadminbar #wp-admin-bar-crimson_phone > .ab-item:before{
        content: "\f525"; 
        font-family: dashicons;
    }
    
    #wpadminbar #wp-admin-bar-crimson_email > .ab-item:before{
        content: "\f457";
        font-family: dashicons;
    }
    </style>';
}
add_action( 'wp_footer', 'wp_admin_bar_css' );
add_action( 'admin_footer', 'wp_admin_bar_css' );
?>