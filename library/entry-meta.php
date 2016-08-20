<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_entry_meta' ) ) :
    function foundationpress_entry_meta() {
        echo '<span class="icon-user"></span> <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a>',
            ' | ',
            '<time class="updated" datetime="' . get_the_time( 'c' ) . '"><span class="icon-clock-o"></span> ' . get_the_date('M d, Y') . '</time>';
    }
endif;

if ( ! function_exists( 'foundationpress_taxonomies' ) ) :
    function foundationpress_taxonomies() {
        $taxonomies = <<<'TAXONOMIES'
        <table style="margin:0;padding:0;border:none">
            <tbody style="border:none">
                <tr>
                    <td style="text-align:left;padding-left:0;padding-right:0"><span class="icon-books"></span>&nbsp;%s</td>
                    <td style="text-align:right;padding-left:0;padding-right:0">%s</td>
                </tr>
            </tbody>
        </table>
TAXONOMIES;
        echo sprintf($taxonomies, get_the_category_list( ', ' ), get_the_tag_list( '<span class="icon-tags"></span>&nbsp;', ', ' ));
    }
endif;

if ( ! function_exists( 'foundationpress_post_meta' ) ) :
    function foundationpress_post_meta( $meta ) {
        $external_link = get_post_meta( get_the_ID(), $meta, true );

        if (!empty($external_link)) {
            return sprintf( '<span class="icon-share"></span> <a target="_blank" href="%s">%s</a>', $external_link, __('External Link', 'foundationpress') );
        }

        return '';
    }
endif;
