<?php
/**
 * @trait     Assets\Admin
 * @Version: 0.0.1
 * @package   MySiteDigital/Assets
 * @category  Class
 * @author    MySite Digital
 */
namespace MySiteDigital\Assets;


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * SimpleDining Class.
 */
class SimpleDining {

    use AssetsTrait;

    protected $frontend_styles = [
        'handle' => 'simple-dining',
        'src' => 'theme.css',
        'post_types' => [ 'all' ],
    ];
    
    protected $frontend_scripts = [
        'handle' => 'simple-dining',
        'src' => 'theme.js',
        'post_types' => [ 'all' ],
    ];

    public function __construct() {
       $this->init();
    }
}

new SimpleDining();

