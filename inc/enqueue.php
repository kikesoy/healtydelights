<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		wp_enqueue_style( 'google-fonts-lato', 'https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap', array(), '20190912', 'screen');

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/css/app.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/assets/css/app.css', array(), $css_version );
		wp_deregister_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/js/app.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/assets/js/app.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
