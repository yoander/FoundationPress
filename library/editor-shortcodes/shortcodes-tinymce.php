<?php
/**
 * Register FoundationPress Shortcodes Button
 * Adds FoundationPress button to TinyMCE Editor
 *
 * @package WordPress
 * @subpackage FoundationPress
 */
function register_button( $buttons ) {
   array_push( $buttons, '|', 'foundationpress_shortcodes' );
   return $buttons;
}

function add_plugin( $plugin_array ) {
   $plugin_array['foundationpress_shortcodes'] = get_template_directory_uri() . '/library/editor-shortcodes/tinymce.js';
   return $plugin_array;
}

function foundationpress_shortcodes_button() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }
}

add_action('init', 'foundationpress_shortcodes_button');
