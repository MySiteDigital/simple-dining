<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ThemeCustomizer {

    //selected based on the information found here:
    //https://kinsta.com/blog/best-google-fonts/
    //https://fonts.google.com/analytics
    //the following list could be interesting to include in the future
    //https://www.xcartmods.co.uk/google-fonts-list.php
    //this is also interesting and worth considering:
    //https://inkbotdesign.com/google-font-combinations-mixing-typefaces/
    private $font_choices = [
		'' => '',
		'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i' => 'Roboto',
        'Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' => 'Open Sans',
        'Lato:100,100i,300,300i,400,400i,700,700i,900,900i' => 'Lato',
        'Slabo+27px' => 'Slabo+27px',
        'Oswald:200,300,400,500,600,700' => 'Oswald',
        'Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i' => 'Source Sans Pro',
        'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' => 'Montserrat',
        'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' => 'Raleway',
        'PT+Sans:400,400i,700,700i' => 'PT Sans',
        'Lora:400,400i,700,700i' => 'Lora'
	];

    public function __construct() {
        add_action( 'customize_register', [ $this, 'add_customizer_options' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_google_fonts' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'generate_customizer_css' ], 999 );
    }

    public function add_customizer_options( $wp_customize ) {

    	$wp_customize->add_section(
    		'theme_options' ,
    		[
        		'title'      =>  __( 'Theme Options', 'simple-dining' ),
        		'priority'   => 1000,
    		]
    	);

    	// Add primary color hue setting and control.
    	$wp_customize->add_setting(
    		'background_color',
    		array(
    			'default'           => '#ffffff',
    			'transport'         => 'refresh'
    		)
    	);

    	$wp_customize->add_control(
    		new WP_Customize_Color_Control(
    			$wp_customize,
    			'background_color',
    			array(
    				'description' => __( 'Main Background Colour', 'simple-dining' ),
    				'section'     => 'theme_options',
    			)
    		)
    	);

        $wp_customize->add_setting(
            'heading_font',
            [
                'transport'         => 'refresh',
				'sanitize_callback' => [ $this, 'sanitize_font'],
			]
		);

        $wp_customize->add_control(
            'heading_font',
            [
				'type' => 'select',
				'description' => __('Heading Font', 'simple-dining'),
				'section' => 'theme_options',
				'choices' => $this->font_choices
			]
        );

        $wp_customize->add_setting(
            'body_font',
            [
				'sanitize_callback' => [ $this, 'sanitize_font' ],
			]
		);

        $wp_customize->add_control(
            'body_font',
            [
				'type' => 'select',
				'description' => __('Body Font', 'simple-dining'),
				'section' => 'theme_options',
				'choices' => $this->font_choices
			]
        );

    }

    public function theme_font( $font ){
        return esc_html( get_theme_mod( $font . '_font' ) );
    }

    public function enqueue_google_fonts(){
        $heading_font = $this->theme_font( 'heading' );
        $body_font = $this->theme_font( 'body' );

        if( $heading_font ) {
            wp_enqueue_style( 'simple-dining-heading-font', '//fonts.googleapis.com/css?family='. $heading_font );
        }
        if( $body_font ) {
            wp_enqueue_style( 'simple-dining-body-font', '//fonts.googleapis.com/css?family='. $body_font );
        }
    }

    public function generate_customizer_css()
    {
        $customizer_css = '';
        $bg_color = get_theme_mod( 'background_color' );
        $heading_font = $this->theme_font( 'heading' );
        $body_font = $this->theme_font( 'body' );


        if( $bg_color != 'ffffff' ){
            $customizer_css .= 'body{background-color: #' . $bg_color . ';}';
        }

        if ( $body_font ) {
            $font_pieces = explode( ":", $body_font );
            $customizer_css .= 'body{font-family: ' . $font_pieces[0] . ';}';
        }

        if ( $heading_font ) {
            $font_pieces = explode( ":", $heading_font );
            $customizer_css .= 'h1, h2, h3, h4, h5, h6{font-family: ' . $font_pieces[0] . ';}';
        }

        if( $customizer_css ){
            wp_add_inline_style( 'simple-dining', $customizer_css );
        }
    }

    public function sanitize_font( $font_input ) {
        if ( array_key_exists( $font_input, $this->font_choices ) ) {
    		return $font_input;
    	} else {
    		return '';
    	}
    }
}

new ThemeCustomizer();
