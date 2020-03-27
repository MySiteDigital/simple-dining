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

paginate_comments_links(
    [
        'echo'      => true,
        'end_size'  => 0,
        'mid_size'  => 0,
        'next_text' => $next,
        'prev_text' => $prev
    ]
);