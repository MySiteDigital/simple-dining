<?php
//include any classes needed for the theme
require_once('classes/style-and-script-controller.php');
require_once('classes/theme-wrapper.php');

//support post-thumbnails/featured images
add_theme_support('post-thumbnails');

//hide the admin toolbar from the front end
show_admin_bar( false );

function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_setting(
        'background_colour' ,
        [
            'default'   => '#ffffff',
            'transport' => 'refresh',
        ]
    );

    $wp_customize->add_section(
         'simple_dining_theme_options',
         [
             'title'      => __( 'Theme Options', 'simple-dining' ),
             'priority'   => 30,
         ]
     );

     $wp_customize->add_control(
         new WP_Customize_Color_Control(
             $wp_customize,
             'link_color',
             [
                'label'      => __( 'Background Colour', 'simple-dining' ),
                'section'    => 'background_colour',
                'settings'   => 'background_colour',
             ]
         )
    );

    $wp_customize->add_control(
		'background_colour',
		array(
			'type'     => 'radio',
			'label'    => __( 'Primary Color', 'twentynineteen' ),
			'choices'  => array(
				'default'  => _x( 'Default', 'primary color', 'twentynineteen' ),
				'custom' => _x( 'Custom', 'primary color', 'twentynineteen' ),
			),
			'section'  => 'Theme Options',
			'priority' => 30,
		)
	);
}
add_action( 'customize_register', 'mytheme_customize_register' );



function twentynineteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'twentynineteen_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'twentynineteen_customize_partial_blogdescription',
			)
		);
	}

	/**
	 * Primary color.
	 */
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => 'default',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentynineteen_sanitize_color_option',
		)
	);

	$wp_customize->add_control(
		'primary_color',
		array(
			'type'     => 'radio',
			'label'    => __( 'Primary Color', 'twentynineteen' ),
			'choices'  => array(
				'default'  => _x( 'Default', 'primary color', 'twentynineteen' ),
				'custom' => _x( 'Custom', 'primary color', 'twentynineteen' ),
			),
			'section'  => 'colors',
			'priority' => 5,
		)
	);

	// Add primary color hue setting and control.
	$wp_customize->add_setting(
		'primary_color_hue',
		array(
			'default'           => 199,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color_hue',
			array(
				'description' => __( 'Apply a custom color for buttons, links, featured images, etc.', 'twentynineteen' ),
				'section'     => 'colors',
				'mode'        => 'hue',
			)
		)
	);

	// Add image filter setting and control.
	$wp_customize->add_setting(
		'image_filter',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'image_filter',
		array(
			'label'   => __( 'Apply a filter to featured images using the primary color', 'twentynineteen' ),
			'section' => 'colors',
			'type'    => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'twentynineteen_customize_register' );
