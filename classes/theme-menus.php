<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ThemeMenus {

    public function __construct() {
        add_action( 'init', [ $this, 'register_my_menus' ] );
    }

    public function register_my_menus() {
        register_nav_menu( 'main-menu', 'Main Menu' );
    }

}

new ThemeMenus();
