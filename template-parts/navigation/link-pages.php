<?php 
use MySiteDigital\Assets\SVG; 

$prev =     SVG::icon( 'left', '', '', false ) .'
            <span class="nav-prev-text">' .
                __( 'previous', 'simple-dining' ) . '
            </span>';

$next = '   <span class="nav-next-text">' .
                __( 'next', 'simple-dining' ) . '
            </span>' . 
            SVG::icon( 'right', '', '', false );

wp_link_pages(
    [
        'before' => '<nav class="navigation pagination" role="navigation"><h2 class="screen-reader-text">Post navigation</h2><div class="nav-links">',
        'after' => '</div></nav>',
        'next_or_number' => 'next', # activate parameter overloading
        'nextpagelink' => $next,
        'previouspagelink' => $prev,
        'echo' => true
    ]
);