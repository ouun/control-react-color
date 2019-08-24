<?php
/**
 * Plugin Name: Kirki React-Color Control
 */

namespace Kirki_React_Color_Control;

add_action( 'customize_controls_enqueue_scripts', function() {

	$build_js = glob( __DIR__ . '/build/static/js/*.js' );
	if ( 0 === count( $build_js ) ) {
		wp_die( 'You must run <code>yarn build</code> in the <code>wp-content/plugins/control-react-color</code> directory because there is no built JS located in its <code>build/static/js</code> directory.' );
	}

	wp_enqueue_script(
		'kirki-react-color-control',
		plugin_dir_url( __FILE__ ) . 'build/static/js/' . basename( array_shift( $build_js ) ),
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
