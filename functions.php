<?php
/**
 * PrakMed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PrakMed
 */

 // Set up the Hybrid Core framework.
 require_once( trailingslashit( get_template_directory() ) . 'lib/hybrid.php' );
 new Hybrid();

/**
 * Load functions for theme setup.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Enque theme-specific scripts and styles.
 */
require get_template_directory() . '/inc/enque.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load functions for setting up sidebars.
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Load custom functions for Woocommerce.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load custom functions for Homepage Control.
 */
require get_template_directory() . '/inc/homepage.php';

/**
 * Load shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';
