<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Call_Now_Menu_Walker extends Walker_Nav_Menu {

  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
      if( ! $item->url || strpos( $item->url, 'tel:' ) === false ){
          return;
      }
      $output .= '
                <a href="' . $item->url . '" class="button call-now-button full-size">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" class="phone-icon">
                        <use xlink:href="'. icons( false ) .'#phone-icon"/>
                    </svg>' .
                    $item->title .
                '</a>';

  }

}
