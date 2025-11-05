<?php

add_shortcode('youtube',function($atts){
    if(!isset($atts['url'])) return;
    $youtube_id = $atts['url'];
    if(!isset($atts['id_only']) || strpos($youtube_id,'.com') ){
        parse_str( parse_url( $atts['url'], PHP_URL_QUERY ), $youtube_id );
        $youtube_id = $youtube_id['v'];
    }
    return '
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/'.$youtube_id.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>';
});

function vnmFunctionality_embedWrapper($html, $url, $attr, $post_id) {
    if (strpos($html, 'youtube') !== false) {
        return '<div class="video-container">' . $html . '</div>';
    }
    return $html;
}
add_filter('embed_oembed_html', 'vnmFunctionality_embedWrapper', 10, 4);

?>