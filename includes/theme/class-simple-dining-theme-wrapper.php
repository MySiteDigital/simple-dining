<?php

namespace MySiteDigital\SimpleDining\Theme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Wrapper {

	/**
	 * Stores the full path to the main template file
	 */
	public static $main_template;

	/**
	 * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
	 */
	public static $base;

    public function __construct()
    {
		add_filter( 'template_include', [ __CLASS__, 'wrap' ], 99 );
    }

	public static function wrap( $template ) {
		self::$main_template = $template;
		self::$base = substr( basename( self::$main_template ), 0, -4 );

		if ( 'index' == self::$base ) {
			self::$base = false;
		}
			
		$templates = [ 'wrapper.php' ];

		if ( self::$base ) {
			array_unshift( $templates, sprintf( 'wrapper-%s.php', self::$base ) );
		}
			
		return locate_template( $templates );
	}

}

new Wrapper();


