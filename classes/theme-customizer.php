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

    private $color_options = [
        'background_color' => [
            'default'       => '#fefefe',
            'description'   =>  'Main Background Colour',
            'css_properties'    => [
                'body{background-color: '
            ]
        ],
        'text_color' => [
            'default'     => '#333333',
            'description' => 'Main Text Colour',
            'css_properties'  => [
                'body{color: '
            ]
        ],
        'header_footer_background_color' => [
            'default'     => '#2569e6',
            'description' => 'Header/Footer Background Colour',
            'css_properties'  => [
                '#header, #footer, #hidden-menu{background-color: ',
                'input[type=submit], input:focus, textarea:focus, .button{border-color: ',
                'blockquote{border-color: ',
                'svg{fill: ',
                'blockquote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-quote.is-large:before{border-color: ',
                '.button, input[type=submit] {color: '
            ]
        ],
        'header_footer_link_color' => [
            'default'     => '#49c6e5',
            'description' => 'Header/Footer Link Colour',
            'css_properties'  => [
                '#header a,#mobile-nav a,#footer a,.site-title {color: ',
                '#header,#footer, #page-not-found-nav ul, #page-not-found-nav ul li {border-color: ',
                'input, textarea {border-color: ',
                '.wp-block-quote.is-large{border-color: ',
                '.wp-block-dining-dashboard-menu-item{border-color: '
            ]
        ],
        'header_footer_link_hover_color' => [
            'default'     => '#ffbc42',
            'description' => 'Header/Footer Link Hover Colour',
            'css_properties'  => [
                'input:hover, textarea:hover, #header a:hover, .site-title:hover {border-color: ',
                '#header a:hover,#mobile-nav a:hover, #footer a:hover{color: '
            ]
        ],
        'header_footer_current_page_link_color' => [
            'default'     => '#8fc93a',
            'description' => 'Header/Footer Current Page Link Colour',
            'css_properties'  => [
                '#main-nav ul li.current_page_item a, .call-now-button{border-color: ',
                '#main-nav ul li.current_page_item a, #mobile-nav ul li.current_page_item a, #header .call-now-button{color: ',
                '.call-now-button svg, #footer svg, #open-menu svg, #close-menu svg {fill: '
            ]
        ],
        'button_hover_color' => [
            'default'     => '#d81159',
            'description' => 'Button Hover Colour',
            'css_properties'  => [
                '.button:hover {border-color: ',
                '.button:hover, #header a.call-now-button:hover {color: ',
                '.button:hover svg, #open-menu:hover, #close-menu:hover {fill: ',
            ]
        ]
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

        foreach( $this->color_options as $color_option => $color_option_settings ){
            $wp_customize->add_setting(
        		$color_option,
        		[
        			'default' => $color_option_settings['default'],
        			'transport'         => 'refresh',
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options'
        		]
        	);

        	$wp_customize->add_control(
        		new WP_Customize_Color_Control(
        			$wp_customize,
        			$color_option,
        			[
        				'description' => __( $color_option_settings['description'], 'simple-dining' ),
        				'section'     => 'theme_options',
        			]
        		)
        	);
        }
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
        $heading_font = $this->theme_font( 'heading' );
        $body_font = $this->theme_font( 'body' );

        if ( $body_font ) {
            $customizer_css .= 'body{font-family: ' . $this->font_choices[$body_font] . ';}';
        }

        if ( $heading_font ) {
            $customizer_css .= 'h1, h2, h3, h4, h5, h6, input[type="submit"], #header a, #footer a, .button {font-family: ' . $this->font_choices[$heading_font] . ';}';
        }

        foreach( $this->color_options as $color_option => $color_option_settings ){
            $color = get_theme_mod( $color_option );
            $color = $this->add_missing_hash( $color );
            if( $color && $color != $color_option_settings['default'] ){
                foreach( $color_option_settings['css_properties'] as $css_property ){
                    $customizer_css .= $css_property . $color . ';}';
                }
            }
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

    public function add_missing_hash( $color ){
        if( $color && strpos( $color, '#') === false ) {
            $color = '#' . $color;
        }
        return $color;
    }
}

new ThemeCustomizer();
