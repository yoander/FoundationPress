<?php

/**
 *  Add Grid Shortcode to WYSIWYG Editor
 *  This will add a button to the wysiwyg editor that allows
 *  the end user to create a foundation grid within their post's
 *  content.
 */

function render_foundation_column( $atts, $content = '' ) {
    
    $atts = shortcode_atts(array(
        'sm-width'  => '',
        'md-width'  => '',
        'lg-width'  => '',
    ), $atts);
    
    $column_classes = $atts['sm-width'] ? 'small-' . $atts['sm-width'] : '';
    $column_classes .= $atts['md-width'] ? 'medium-' . $atts['md-width'] : '';
    $column_classes .= $atts['lg-width'] ? 'large-' . $atts['lg-width'] : '';
    
    print_r($column_classes);
    
    return do_shortcode( "<div class='column {$column_classes}'>" . $content . '</div>' );
}
add_shortcode( 'foundation-column', 'render_foundation_column' );

function render_foundation_row( $atts, $content = '' ) {
    return do_shortcode( '<div class="row">' . $content . '</div>' );
}
add_shortcode( 'foundation-row', 'render_foundation_row' );


/**
 *  Remove WP Auto <br /> Tags
 *  Not sure how to fix this yet, but by default wordpress wants to
 *  automatically add <br /> tags at every line break in the editor
 *  which allows the shortcode to be readable. Don't really want to
 *  completely remove a users ability to have a break rather than a
 *  new paragraph but this will work for testing purposes.
 */

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function wpse_wpautop_nobr( $content ) {
    return wpautop( $content, false );
}

add_filter( 'the_content', 'wpse_wpautop_nobr' );
add_filter( 'the_excerpt', 'wpse_wpautop_nobr' );
