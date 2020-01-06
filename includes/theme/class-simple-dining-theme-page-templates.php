<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class PageTemplates {

    public function __construct() {
        add_filter( 'allowed_block_types', [ $this , 'set_allowed_block_types' ], 10, 2 );
    }

    public function set_allowed_block_types( $allowed_block_types, $post ) {

        $template = get_post_meta( $post->ID, '_wp_page_template', true );
        
        if ( $template === 'contact-page.php' ) {
            $allowed_block_types = $this->set_contact_page_blocks();
        }

        return $allowed_block_types;
    }

    public function set_contact_page_blocks(){
        return [
            'core/heading',
            'core/paragraph',
            'core/columns',
            'core/shortcode'
        ];
    }

}

new PageTemplates();
