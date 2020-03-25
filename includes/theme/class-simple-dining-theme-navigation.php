<?php

namespace MySiteDigital\SimpleDining\Theme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Navigation {

    public function __construct() {
        add_action( 'init', [ $this, 'register_my_nav_menus' ] );
    }

    public function register_my_nav_menus() {
        register_nav_menu( 'main-menu', 'Main Menu' );
    }

    public static function main_nav_menu( $container_id = 'main-nav' ){
        $main_menu = wp_nav_menu(
            [
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_id' => $container_id,
                'echo' => false
            ]
        );

        if ( has_nav_menu( 'main-menu' ) ) {
            echo $main_menu;
        }
    }

    public static function call_now_button(){
        if( self::is_call_now_button_enabled() ){
            $button_text = get_theme_mod( 'call_now_button_text' ) ?: 'Call Now!';
            $tel_link = get_theme_mod( 'call_now_button_link' ) ?: '+642044346464';
            //get_template_part function should be improved
		    //https://mekshq.com/passing-variables-via-get_template_part-wordpress/
            include( locate_template( 'template-parts/header/call-now-button.php', false, false ) );
        }
        else {
            return false;
        }
    }

    public static function is_call_now_button_enabled(){
        return get_theme_mod( 'show_call_now_button' );
    } 

}

new Navigation();
