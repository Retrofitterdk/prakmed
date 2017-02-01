<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package PrakMed
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function prakmed_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'prakmed_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function prakmed_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'prakmed_pingback_header' );


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function prakmed_search( $form ) {
    $form = '<form role="search" method="get" id="search-form" class="search-form" action="' . home_url( '/' ) . '" >';
		$form .= '<label>';
		$form .= '<span class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</span>';
		$form .= '<input type="search" value="' . get_search_query() . '" placeholder="'. esc_attr__( 'What do you wish to search for?' ) .'" name="s" id="s" class="search-field" />';
		$form .= '</label>';
    $form .= '<button type="submit" class="search-submit" value="'. esc_attr__( 'Search' ) .'" />';
    $form .= '</form>';
    return $form;
}
// add_filter( 'get_search_form', 'prakmed_search' );

/* REMOVE SHARE FROM THE_CONTENT AND THE_EXCERPT */
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
add_action( 'loop_start', 'jptweak_remove_share' );

// Add a WP Editor to the Paragraph Text field
add_action( 'gform_field_input', 'gforms_wp_editor', 10, 5 );
function gforms_wp_editor( $input, $field, $value, $lead_id, $form_id ) {
	if( $field["cssClass"] == 'gf_html' ) {
		ob_start();
		wp_editor( $value, "input_{$form_id}_{$field['id']}",
		array(
			'media_buttons' => true,
			'textarea_name' => "input_{$field['id']}"
		)	);
		$input = ob_get_clean();
	}
	return $input;
}
