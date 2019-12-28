<?php

namespace MySiteDigital\SimpleDining\Theme;

use \Walker_Nav_Menu;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CallNowWalker extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if( ! $item->url || strpos( $item->url, 'tel:' ) === false ){
            return;
        }
        $output .= '
                <a href="' . $item->url . '" class="button call-now-button full-size">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" class="phone-icon">
                        <use xlink:href="'. icons( false ) .'#phone"/>
                    </svg>' .
                    $item->title .
                '</a>';

    }

}
