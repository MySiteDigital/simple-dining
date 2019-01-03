<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ThemeMenus {

    public function __construct() {
        add_action( 'init', [ $this, 'register_my_menus' ] );
        add_filter( "wp_nav_menu_items", [ $this,  "create_call_now_button"], 10, 2 );
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

    public function create_call_now_button( $items, $args ){
        if( $args->theme_location === 'call-now-link' ){
            $items = explode( '</a>', $items );
            $items = array_slice( $items, 0, 1 );
            // $items = preg_replace(
            //         [
            //             '#^<li[^>]*>#',
            //             '#</li>$#'
            //         ],
            //         '',
            //         $items[0]
            //     );
            // $items = $this->phone_icon( $items );
            $items = $items[0] . '</a>';
        }
        return $items;
    }

    public function phone_icon( $anchor ){

         return preg_replace(
                    '/[^<>]+(?=<[^<>]+>)|[^<>]+$/',
                    '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
                        <use xlink:href="'. icons( false ) .'#phone-icon"/>
                    </svg>$0</a>',
                    $anchor
                );
    }

    public static function main_menu(){
        $main_menu = wp_nav_menu(
            [
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_id' => 'main-nav',
                'echo' => false
            ]
        );

        if( $main_menu ){
            echo $main_menu;
            get_template_part( 'template-parts/header/mobile-icons' );
        }
    }

    public static function call_now_button(){
        $call_now = wp_nav_menu(
            [
                'theme_location' => 'call-now-link',
                'container' => '',
                'depth' => 1 ,
                'echo' => false,
                'fallback_cb' => false,
                'walker' => new Call_Now_Menu_Walker()
            ]
        );

        if( $call_now ){
            echo preg_replace(
                [
                    '#^<ul[^>]*>#',
                    '#</ul>$#'
                ],
                '',
                $call_now
            );
        }
    }

}

new ThemeMenus();
