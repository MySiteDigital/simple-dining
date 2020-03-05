<?php

namespace MySiteDigital\SimpleDining\Theme\Pages;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ContactPage  {

    public function __construct()
    {
        add_filter( 'allowed_block_types', [ $this , 'set_allowed_block_types' ], 10, 2 );
	}
    
    public function set_allowed_block_types( $allowed_block_types, $post ) {

        $template = get_page_template_slug( $post->ID );
        
        if ( $template === 'contact-page.php' ) {
            return [
                'core/heading',
                'core/paragraph',
                'core/columns',
                'core/shortcode'
            ];
        }

        return $allowed_block_types;
    }
}

new ContactPage();

