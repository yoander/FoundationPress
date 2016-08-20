<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div id="single-post" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div style="margin-bottom:15px"><?php foundationpress_entry_meta(); if ($external_link = foundationpress_post_meta( 'external-link' ) ): ?> | <?php echo $external_link; endif ?></div>
        </header>
        <?php do_action( 'foundationpress_post_before_entry_content' ); ?>
        <div class="entry-content">

        <?php
            if ( has_post_thumbnail() ) :
                the_post_thumbnail();
            endif;
        ?>

        <?php the_content(); ?>
        <?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
        <footer>
            <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
            <?php foundationpress_taxonomies() ?>
        </footer>
        <table style="margin:12px 0;padding:0;border:none">
            <tbody style="border:none">
                <tr>
                    <td style="text-align:left;padding:0"><?php echo get_previous_post_link( '%link', ' <span class="icon-arrow_back"></span> %title' ) ?></td>
                    <td style="text-align:right;padding:0"><?php echo get_next_post_link( '%link', '%title <span class="icon-arrow_forward"></span>' ) ?></td>
                </tr>
            </tbody>
        </table>
        <?php do_action( 'foundationpress_post_before_comments' ); ?>
        <?php comments_template(); ?>
        <?php do_action( 'foundationpress_post_after_comments' ); ?>
    </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer();
