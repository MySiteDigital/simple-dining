<?php

namespace MySiteDigital\SimpleDining\Theme\Pages;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HeroPage  {

    private $template = 'hero-page.php'; 

    private function is_hero_page( $id ){
        $current_template = get_page_template_slug( intval( $id ) );
        return ( $current_template === $this->template );
    }

    private function set_default_button_text(){
        if( ! isset( $_GET[ 'post' ] ) ){
            return;
        }

        $post_id = $_GET[ 'post' ];

        if ( $this->is_hero_page( $post_id ) ) {
            $hero_button = get_post_meta( $post_id, 'hero_button_text', true );

            if( ! $hero_button ){
                add_post_meta( $post_id, 'hero_button_text', 'View Our Menu' );
            }
        }
    }

    public function __construct() {
        $this->set_default_button_text();

        add_filter( 'gutenberg_can_edit_post_type', [ $this , 'disable_gutenberg' ], 10, 2 );
        add_filter( 'use_block_editor_for_post_type', [ $this , 'disable_gutenberg' ], 10, 2 );
        
        add_action( 'admin_head', [ $this, 'disable_classic_editor' ], 99 );
        add_action( 'do_meta_boxes', [ $this, 'remove_meta_boxes' ], 99 );
    }

    

    public function disable_gutenberg( $can_edit, $post_type ) {

        if( ! ( is_admin() && ! empty( $_GET[ 'post' ] ) ) ) {
            return $can_edit;
        }
        
        if (  $this->is_hero_page( $_GET[ 'post' ] ) ) {
            return false;
        }

        return $can_edit;
    }

    public function disable_classic_editor(){
        $screen = get_current_screen();

        if( 'page' !== $screen->id || ! isset( $_GET[ 'post' ] ) ){
            return;
        }

        if (  $this->is_hero_page( $_GET[ 'post' ] ) ) {
            remove_post_type_support( 'page', 'editor' );
        }
    }

     public function remove_meta_boxes() {
        global $post;

        if ( $this->is_hero_page( $post->ID ) ) {
            remove_meta_box( 'commentstatusdiv', 'page', 'normal' );
            remove_meta_box( 'commentsdiv', 'page', 'normal' );
        }
    }
}

new HeroPage();

