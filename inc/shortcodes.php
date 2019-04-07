<?php 
/*

@package sebatheme

Shortcode options

*/
function seba_tooltip( $atts, $content = null){

    // get the attr 
    $atts = shortcode_atts(
        array(
            'placement' => 'top',
            'title'     => '',     
        ), 
        $atts,
        'tooltip'
    );

    // return HTML 

    $title = ( $atts['title'] == '' ? $title = $content : $atts['title']);
  

    return '<span class="seba-tooltip" data-toggle="tooltip" data-placement="'. $atts['placement'].'" title="' . $title . '">'. $content .'</span>';

 
}


add_shortcode('tooltip', 'seba_tooltip');

function seba_popover( $atts, $content = null){

    // get the attr 
    $atts = shortcode_atts(
        array(
            'placement' => 'top',
            'title'     => '',   
            'content'   => '',
            'trigger'   => 'click', 
        ), 
        $atts,
        'popover'
    );

    // return HTML 

 
    return '<span class="seba-popover" data-toggle="popover" data-placement="'. $atts['placement'].'" title="' . $atts['title'] . '" data-content="' . $atts['content'] .  '" data-trigger="' . $atts['trigger'] .  '">'. $content .'</span>'; 

 
}


add_shortcode('popover', 'seba_popover');
















