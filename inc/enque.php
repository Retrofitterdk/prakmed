<?php
/**
 * Enqueue scripts and styles.
 */
function prakmed_scripts() {
	wp_enqueue_style( 'prakmed-theme', get_template_directory_uri() . '/css/theme.css' );

	wp_enqueue_style( 'brieficons', get_template_directory_uri() . '/brieficons/brieficons.css', array(), '1.0.0' );

	wp_enqueue_script( 'prakmed-custom', get_template_directory_uri() . '/js/prakmed-custom.js', array('jquery'), '20170106', true );

	wp_enqueue_script( 'prakmed-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170106', true );

	wp_enqueue_script( 'prakmed-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170106', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'prakmed_scripts' );
