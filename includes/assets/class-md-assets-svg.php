<?php
/**
 * @trait     Assets\SVG
 * @Version: 0.0.1
 * @package   MySiteDigital/Assets
 * @category  Class
 * @author    MySite Digital
 */
namespace MySiteDigital\Assets;


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists ( 'MySiteDigital\Assets\SVG' ) ) {
    class SVG {

        use AssetsTrait;

        public static function icon( $icon, $class = '', $view_box = '', $echo = true )
        {
            $class = $class ? ' class="' . $class . '"' : '';
            $view_box = $view_box ? ' viewBox="' . $view_box . '"' : ' viewBox="0 0 24 24"';
            $svg = 
                '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"' . $view_box . $class .'>
                    <use xlink:href="' . self::icons_link( $icon ) . '"/>
                </svg>';

            if( $echo ){
                echo $svg;
            }
            else {
                return $svg;
            }
        }

        public static function icons_link( $icon ){
            $icons_file = 'icons.svg';
            $cache_bust = '?v=' . self::get_asset_version( $icons_file, 'theme' );
            //make sure this is a relative url to work with MultiSite
            $file_url = parse_url( self::base_url( 'theme' ), PHP_URL_PATH ) . '/assets/svg/' . $icons_file . $cache_bust . '#' . $icon;
            return $file_url;
        }

    }
}


