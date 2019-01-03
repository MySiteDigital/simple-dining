<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ThemeMenus {

    public function __construct() {
        add_action( 'init', [ $this, 'register_my_menus' ] );
        add_filter( "wp_nav_menu_items", [ $this,  "limit_call_now_menu"], 10, 2 );
    }

    public function register_my_menus() {
        register_nav_menu( 'main-menu', 'Main Menu' );
        register_nav_menu( 'call-now-link', $this->get_cta_link_title());
    }

    public function get_cta_link_title() {
         $title =  'Call Now Link <br>
                    <span class="description" style="display:inline-block; margin-bottom:13px;">
                        <strong style="font-weight:900;">Note:</strong> this menu will only display the first item. <br>
                        It also includes a phone icon so the link should be a telephone <a href="https://css-tricks.com/the-current-state-of-telephone-links/" target="_blank">link</a>.
                    </span>';
         return $title;
    }

    public function limit_call_now_menu( $items, $args ){
        if( $args->theme_location === 'call-now-link' ){
            $items = explode( '</a>', $items );
            $items = array_slice( $items, 0, 1 );
            $items = implode( '</a>', $items );
        }
        return $items;
    }

}

new ThemeMenus();
