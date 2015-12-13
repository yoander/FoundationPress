<?php
/**
 * Include Shortcodes in WordPress
 * Choose which shortcodes you want to inject into the WordPress Editor.
 * Comment out shortcodes which you don't want your end users to have access to.
 *
 * @package WordPress
 * @subpackage FoundationPress
 */

require( 'grid/shortcode-grid.php' );

/**
 *  Normalize Unnamed Attributes
 *  This function allows us to use unnamed attributes as
 *  boolean operators by replacing the key of the attribute
 *  with an identifiable string.
 */
function normalize_attributes( $atts ) {
    foreach ( $atts as $key => $value ) {
        if ( is_int( $key ) ) {
            $atts[ $value ] = true;
            unset( $atts[ $key ] );
        }
    }

    return $atts;
}

?>