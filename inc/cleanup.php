<?php 
/*

@package sebatheme

Theme cleanup

*/

function seba_remove_wp_versions_strings($src){
global $wp_version; 
    parse_str(parse_url( $src, PHP_URL_QUERY ), $query);
    if ( !empty( $query['ver']) && $query['ver'] === $wp_version){
    $src = remove_query_arg('ver', $src);
}
    return $src;
}
remove_action('wp_head', 'wp_generator');
add_filter('script_loader_src', 'seba_remove_wp_versions_strings' );
add_filter('style_loader_src', 'seba_remove_wp_versions_strings' );