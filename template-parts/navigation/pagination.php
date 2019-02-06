<?php

$prev = '   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
                <use xlink:href="'. icons( false ) .'#left"/>
            </svg>
            <span class="nav-prev-text">' .
                __( 'previous', 'simple-dining' ) . '
            </span>';
$next = '   <span class="nav-next-text">' .
                __( 'next', 'simple-dining' ) . '
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
                <use xlink:href="'. icons( false ) .'#right"/>
            </svg>';

the_posts_pagination(
    [
        'mid_size'  => 2,
        'prev_text' => $prev,
        'next_text' => $next
    ]
);
