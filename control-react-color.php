<?php
/**
 * Plugin Name: Kirki React-Color Control
 */

namespace Kirki_React_Color_Control;

add_action( 'customize_controls_enqueue_scripts', function() {
	wp_enqueue_script(
		'kirki-react-color-control',
		plugin_dir_url( __FILE__ ) . 'dist/main.js',
		[ 'customize-controls', 'wp-element' ]
	);
} );

// Add setting and control.
add_action( 'customize_register', function( \WP_Customize_Manager $wp_customize ) {

	$setting = $wp_customize->add_setting(
		'kirki_test_react_color',
		[
			'transport'         => 'postMessage',
			'default'           => '#000',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);

	$wp_customize->add_control(
		'kirki_test_react_color',
		[
			'type'     => 'kirki-react-color',
			'section'  => 'title_tagline',
			'label'    => esc_html__( 'Test React-Color Control', 'textdomain' ),
			'settings' => array( $setting->id ),
		]
	);
} );
