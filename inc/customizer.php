<?php
/**
 * Teratur theme Customizer
 *
 * @package Teratur
 */

/**
 * Add transparent background layer support.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function teratur_custom_transparent_background_layer_support( $wp_customize )
{
	$wp_customize->add_setting( 'transparent-background-color', array (
		'default'							=> '#083835',
		'type'								=> 'theme_mod',
		'sanitize_callback'		=> 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'transparent-background-transparency', array (
		'default'							=> '40',
		'type'								=> 'theme_mod',
		'sanitize_callback'		=> 'absint',
	) );

	$wp_customize->add_control( 'transparent-background-color', array(
		'type' => 'text',
		'priority' => 10,
		'section' => 'transparent-background-layer',
		'label' => __( 'Transparent Background Color' ),
		'description' => __( 'Edit transparent background\'s color' ),
	) );

	$wp_customize->add_control( 'transparent-background-transparency', array(
		'type' => 'range',
		'priority' => 11,
		'section' => 'transparent-background-layer',
		'label' => __( 'Transparent Background Transparency' ),
		'description' => __( 'Edit transparent background\'s transparency' ),
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	) );

	$wp_customize->add_section( 'transparent-background-layer', array(
		'title' => __( 'Transparent Background Layer' ),
		'description' => __( 'Modify values of the transparent background layer.' ),
		'priority' => 81,
		'capability' => 'edit_theme_options',
	) );
}
add_action( 'customize_register', 'teratur_custom_transparent_background_layer_support' );

/**
 * Inserts transparent background layer setting inside a style tag
 * into <head>.
 */
function teratur_custom_transparent_background_layer_output()
{
	$transparency =
		get_theme_mod( 'transparent-background-transparency', '0.4' );
	$color = 
		get_theme_mod( 'transparent-background-color', '#083835' );

	if ( $transparency >= 100 ) {
		$transparency = '1';
	
	} else if ( $transparency < 10 ) {
		$transparency = '0.0' . $transparency;
	} else if ( is_int( $transparency ) ) {
		$transparency = '0.' . $transparency;
	}
	echo '<style type="text/css" id="custom-background-layer-css">' .
		'body::before { background-color: ' . $color .
		'; opacity: ' . $transparency . ';} </style>';
}
add_action( 'wp_head', 'teratur_custom_transparent_background_layer_output');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function teratur_postmessage_support( $wp_customize )
{
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'teratur_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'teratur_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'teratur_postmessage_support' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function teratur_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function teratur_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function teratur_customize_preview_js() {
	wp_enqueue_script( 'teratur-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), TERATUR_VERSION, true );
}
add_action( 'customize_preview_init', 'teratur_customize_preview_js' );
