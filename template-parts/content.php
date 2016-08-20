<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
    <header>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
         <div style="margin-bottom:15px"><?php foundationpress_entry_meta(); ?></div>
    </header>
    <div class="entry-content">
        <?php the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
    </div>
    <footer>
        <?php foundationpress_taxonomies() ?>
    </footer>
    <hr />
</div>
