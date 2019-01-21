<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
	</header>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

    <footer class="entry-footer">
        <span class="byline">
            %1$s
            <span class="author vcard">
                <a class="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                    <?php echo esc_html( get_the_author() ); ?>
                </a>
            </span>
        </span>
		<?php


            // $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    		// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    		// 	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    		// }
            //
    		// $time_string = sprintf(
    		// 	$time_string,
    		// 	esc_attr( get_the_date( DATE_W3C ) ),
    		// 	esc_html( get_the_date() ),
    		// 	esc_attr( get_the_modified_date( DATE_W3C ) ),
    		// 	esc_html( get_the_modified_date() )
    		// );
            //
    		// printf(
    		// 	'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
    		// 	twentynineteen_get_icon_svg( 'watch', 16 ),
    		// 	esc_url( get_permalink() ),
    		// 	$time_string
    		// );
            //
            // // Edit post link.
    		// edit_post_link(
    		// 	sprintf(
    		// 		wp_kses(
    		// 			/* translators: %s: Name of current post. Only visible to screen readers. */
    		// 			__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
    		// 			array(
    		// 				'span' => array(
    		// 					'class' => array(),
    		// 				),
    		// 			)
    		// 		),
    		// 		get_the_title()
    		// 	),
    		// 	'<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
    		// 	'</span>'
    		// );
         ?>
	</footer><!-- .entry-footer -->

</article>
