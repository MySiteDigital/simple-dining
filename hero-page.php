<?php
/**
 * Template Name: Hero Page
 */

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();
        $hero_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' );
        $hero_image = $hero_image ? ' style="background-image: url(' . $hero_image[0] . ');"' : '';
        $button_text = get_post_meta( get_the_id(), 'hero_button_text', true ) ?: 'View Our Menu';
        echo '
        <div id="hero"' . $hero_image . '>
            <a href="/menu/" class="button full-size">
                ' .  $button_text . '
            </a>
        </div>';
    }
}
