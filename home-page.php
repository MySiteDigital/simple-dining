<?php
/**
 * Template Name: Home Page
 */

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();
        $hero_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' );
        $hero_image = $hero_image ? ' style="background-image: url(' . $hero_image[0] . ')";' : '';
        echo '
        <div id="hero"' . $hero_image . '>
            <a href="tel:0226720903" class="button full-size">
                View Our Menu
            </a>
        </div>';
    }
}
