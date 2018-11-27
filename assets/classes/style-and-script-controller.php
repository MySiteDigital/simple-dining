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
        $this->disable_emoji_functionality();
        $this->disable_oembed_functionality();
        add_action( 'wp_print_styles', array(&$this, 'dequeue_css_files'), 999);
        add_action( 'wp_enqueue_scripts', array(&$this, 'dequeue_js_files'), 999);
        add_action( 'wp_enqueue_scripts', array(&$this, 'enqueue_theme_styles'), 999);
        add_action( 'wp_enqueue_scripts', array(&$this, 'enqueue_theme_scripts'), 999);
        add_filter( 'clean_url', array(&$this, 'defer_script_loading'), 11, 1 );
        add_filter( 'script_loader_src', array(&$this, 'cache_busting_filenames') );
        add_filter( 'style_loader_tag', array(&$this, 'preload_stylesheets'), 11, 4);
        add_filter( 'style_loader_src', array(&$this, 'cache_busting_filenames') );
    }

    public function disable_emoji_functionality(){
        if ( ! is_admin() ) {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('wp_print_styles', 'print_emoji_styles');
        }
    }

    public function disable_oembed_functionality(){
        if ( ! is_admin() ) {
            remove_action('wp_head', 'wp_oembed_add_discovery_links');
            remove_action('wp_head', 'wp_oembed_add_host_js');
        }
    }

    //dequeues css files
    public function dequeue_css_files(){
        if ( ! is_admin() ) {
            wp_dequeue_style( 'contact-form-7' );
        }
    }

    //dequeues js files
    public function dequeue_js_files(){
        if ( ! is_admin()) {
            //remove jquery and jquery-migrate
            wp_deregister_script('jquery');
            wp_deregister_script( 'contact-form-7' );
        }
    }

    public function enqueue_theme_styles(){
        if ( ! is_admin()) {
            global $post;
            $slug = $post ? $post->post_name : '';

            // $theme_css = '/assets/css/style.css';
            // $cache_bust = '?v='.filemtime(get_stylesheet_directory() . $theme_css);
            // wp_enqueue_style(
            //     'dining-nz',
            //     get_stylesheet_directory_uri().$theme_css.$cache_bust,
            //     array(),
            //     NULL
            // );
            //
            //
            // //contact form 7 scripts
            // if($slug == 'contact'){
            //     $contact_form_css = 'includes/css/styles.css';
            //     $cache_bust = '?v='.filemtime(wpcf7_plugin_path() . $contact_form_css);
            //     wp_enqueue_style(
            //         'contact-form-7-css',
            //         wpcf7_plugin_url().'/'.$contact_form_css.$cache_bust,
            //         array(),
            //         NULL
            //     );
            // }
        }
    }

    public function enqueue_theme_scripts() {
        if ( ! is_admin()) {
            global $wp_version, $post;
            $slug = $post ? $post->post_name : '';

            // $theme_js = '/assets/js/theme.min.js';
            //
            // if( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ){
            //     $$theme_js = '/_dev/js/theme.js';
            // }
            // $script_location = get_stylesheet_directory_uri() . $theme_js;
            // $cache_bust = '?v='.filemtime(get_stylesheet_directory() . $theme_js);
            //
            // //jquery from wordpress
            // wp_enqueue_script(
            //     'jquery',
            //     includes_url( '/js/jquery/jquery.js' ) . '?v=' . preg_replace('/\./', '', $wp_version)  . '#defer',
            //     false,
            //     NULL,
            //     true
            // );
            //
            // //theme
            // wp_enqueue_script(
            //     'dining-nz',
            //     $script_location . $cache_bust . '#defer',
            //     array('jquery'),
            //     NULL,
            //     true
            // );
            //
            // //contact form 7 scripts
            // if($slug == 'contact'){
            //     wp_enqueue_script(
            //         'contact-form-7',
            //         wpcf7_plugin_url( 'includes/js/scripts.js' ) . '?v=' . preg_replace('/\./', '', $wp_version)  . '#defer',
            //         array( 'jquery' ),
            //         NULL,
            //         true
            //     );
            // }
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

    /*
     * Removes the query string of the source file and moves it into
     * the filename. Doesn't change admin scripts/styles and sources
     * with more than the `ver` arg.
     *
     * To make sure that files will still work you need to
     * add the following to your .htaccess file:
     *
     *   <IfModule mod_rewrite.c-->
     *     RewriteEngine On
     *     RewriteBase /
     *
     *     RewriteCond %{REQUEST_FILENAME} !-f
     *     RewriteCond %{REQUEST_FILENAME} !-d
     *     RewriteRule ^(.+)\.(.+)\.(js|css)$ $1.$3 [L]
     *
     * @param  string $src The original source
     * @return string
     */
    public function cache_busting_filenames($src){
        if ( !is_admin() ) {
            //$src = preg_replace('/\.(js|css)\?v=(.+)$/','.v$2.$1',$src);
        }
        return $src;
    }
}

$styleAndScriptController = new StyleAndScriptController();
