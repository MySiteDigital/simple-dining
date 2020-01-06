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

the_posts_pagination(
    [
        'mid_size'  => 2,
        'prev_text' => $prev,
        'next_text' => $next
    ]
);
