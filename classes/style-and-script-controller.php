<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * This class is used to enqueue and dequeue all css and js files.
 * Dequeuing unused files improves the loading of the site by ensuring
 * we only load the files that used.
 * Some files that have been dequeued have actually been renamed and moved into the
 * following folder of this theme: _dev/scss/externals. These files will also have had
 * their extensions changed to scss instead of css.
 * The reason this is done is to combine and minify all css and scss files into one css
 * file which is developed from within this theme.
 */
class StyleAndScriptController {


    public function __construct() {
        add_action( 'wp_print_styles', [ $this, 'dequeue_css_files' ], 999 );
        add_action( 'wp_enqueue_scripts', [ $this, 'dequeue_js_files' ], 999 );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_theme_styles' ], 999 );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_theme_scripts' ], 999 );
    }

    //dequeues css files
    public function dequeue_css_files(){
        if ( ! is_admin() ) {
            //wp_dequeue_style( 'contact-form-7' );
        }
    }

    //dequeues js files
    public function dequeue_js_files(){
        if ( ! is_admin()) {
            //remove jquery and jquery-migrate
            wp_deregister_script('jquery');
            //wp_deregister_script( 'contact-form-7' );
        }
    }

    public function enqueue_theme_styles(){
        if ( ! is_admin()) {
            global $post;
            $slug = $post ? $post->post_name : '';

            $theme_css = '/assets/css/theme.min.css';
            $cache_bust = '?v='.filemtime( get_stylesheet_directory() . $theme_css );

            if(! $this->is_webpack_dev_server() ){
                wp_enqueue_style(
                    'simple-dining',
                    get_stylesheet_directory_uri() . $theme_css . $cache_bust,
                    array(),
                    NULL
                );
            }
        }
    }

    public function enqueue_theme_scripts() {
        if ( ! is_admin()) {
            global $wp_version, $post;
            $slug = $post ? $post->post_name : '';

            $theme_js = 'theme.min.js';

            if( $this->is_webpack_dev_server() ){
                $script_location ='http://localhost:3000/' . $theme_js;
                $cache_bust = '';
            }
            else {
                $script_location = get_stylesheet_directory_uri() . '/assets/js/' . $theme_js;
                $cache_bust = '?v='.filemtime( get_stylesheet_directory() . '/assets/js/' . $theme_js );
            }

            //jquery from wordpress
            wp_enqueue_script(
                'jquery',
                includes_url( '/js/jquery/jquery.js' ) . '?v=' . preg_replace('/\./', '', $wp_version)  . '#defer',
                false,
                NULL,
                true
            );

            //theme
            wp_enqueue_script(
                'simple-dining',
                $script_location . $cache_bust . '#defer',
                [ 'jquery' ],
                NULL,
                true
            );
        }
    }

    public function defer_script_loading($url){
        if ( strpos( $url, '#defer') === false ){
            return $url;
        }
        else {
            return str_replace( '#defer', '', $url )."' defer='defer";
        }
    }

    public function preload_stylesheets($html){
        if ( strpos( $html, "type='text/css'") !== false ){
            $link = str_replace( "rel='stylesheet'", "rel='preload'", $html );
            $link = str_replace( "type='text/css'", "type='text/css' as='style' onload='this.rel=\"stylesheet\"'", $link );
            $html = $link;
        }
        return $html;
    }

    public function is_webpack_dev_server(){
        if( ! defined( 'WP_ENV' ) || WP_ENV !== 'dev' ){
			return false;
		}

        $socket = @fsockopen('localhost', 3000, $errno, $errstr, 1);

        return $socket ? true : false;
    }
}

new StyleAndScriptController();
