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
    
    $atts['sm-width'] ? $column_classes[] = 'small-' . $atts['sm-width'] : null;
    $atts['md-width'] ? $column_classes[] = 'medium-' . $atts['md-width'] : null;
    $atts['lg-width'] ? $column_classes[] = 'large-' . $atts['lg-width'] : null;
    
    $column_class = implode( ' ', $column_classes );
    
    return do_shortcode( "<div class='column {$column_class}'>" . $content . '</div>' );
}
add_shortcode( 'fdn-column', 'render_foundation_column' );

function render_foundation_row( $atts, $content = '' ) {
    return do_shortcode( '<div class="row">' . $content . '</div>' );
}
add_shortcode( 'fdn-row', 'render_foundation_row' );


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
