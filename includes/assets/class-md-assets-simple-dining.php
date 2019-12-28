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

    public function __construct() {
       $this->init();
    }
}

new SimpleDining();

