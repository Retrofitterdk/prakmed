<?php
/**
* Custom template tags for this theme.
*
* Eventually, some of the functionality here could be replaced by core features.
*
* @package PrakMed
*/

if ( ! function_exists( 'prakmed_posted_on' ) ) :
	/**
	* Prints HTML with meta information for the current post-date/time and author.
	*/
	function prakmed_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'prakmed' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'prakmed' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'prakmed_posted_by' ) ) :
	/**
	* Prints HTML with meta information for the current author.
	*/
	function prakmed_posted_by() {
		if ( function_exists( 'coauthors_posts_links' ) ) {
			$betweenLast =  sprintf(
				_x( '%s og %s', 'before last post author', 'prakmed' ), '</a></span>', '<span class="author vcard">'
			);
			$between =  sprintf(
				_x( '%s, %s', 'between post authors', 'prakmed' ), '</span>', '<span class="author vcard">'
			);
			$byline = coauthors_posts_links( $between, $betweenLast, '<span class="author vcard">', '</span>', false );
		} else {
			$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
		}
		echo '<div class="byline">' . sprintf( _x( '<strong>Editor:</strong> %s', 'post author', 'prakmed' ),$byline ) . '</div>';
	}
endif;

if ( ! function_exists( 'prakmed_entry_meta' ) ) :
	function prakmed_entry_meta() {
		if ( 'prakmed_article' === get_post_type() ) {
			$prakmed_section = get_the_term_list( get_the_ID(), 'section', __( '<strong>Section: </strong>', 'prakmed' ),', ','' );
			$prakmed_subjects = get_the_term_list( get_the_ID(), 'prakmed_subjects', __( '<strong>Subjects: </strong>', 'prakmed' ),', ','' );
			$IDC_10_terms = get_the_term_list( get_the_ID(), 'ICD-10', __( '<strong>ICD-10: </strong>', 'prakmed' ),', ','' );
			$ICPC_2_terms = get_the_term_list( get_the_ID(), 'ICPC-2', __( '<strong>ICPC-2: </strong>', 'prakmed' ),', ','' );
			$DSM_5_terms = get_the_term_list( get_the_ID(), 'DSM-5', __( '<strong>DSM-5: </strong>', 'prakmed' ),', ','' );
			echo '<div class="taxonomies">';
			if ( $prakmed_section ) {
				printf( '<span id="Section" class="taxonomy">' . __( '%1$s', 'prakmed' ) . '</span>', $prakmed_section );
			}
			if ( $prakmed_subjects ) {
				printf( '<span id="Subjects" class="taxonomy">' . __( '%1$s', 'prakmed' ) . '</span>', $prakmed_subjects );
			}
			if ( $IDC_10_terms ) {
				printf( '<span id="ICD-10" class="taxonomy">' . __( '%1$s', 'prakmed' ) . '</span>', $IDC_10_terms );
			}
			if ( $ICPC_2_terms ) {
				printf( '<span id="ICPC-2" class="taxonomy">' . __( '%1$s', 'prakmed' ) . '</span>', $ICPC_2_terms );
			}
			if ( $DSM_5_terms ) {
				printf( '<span id="DSM-5" class="taxonomy">' . __( '%1$s', 'prakmed' ) . '</span>', $DSM_5_terms );
			}
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'prakmed_the_sections' ) ) :
	function prakmed_the_sections() {
		$sections = get_terms( array(
			'taxonomy' => 'section',
			'hide_empty' => false,
			'parent' => 0,
			'orderby' => 'name',
			'order'   => 'ASC'
		) );
		echo '<ul>';
		foreach( $sections as $section ) {

			$section_link = get_term_link( $section );

			// If there was an error, continue to the next term.
			if ( is_wp_error( $section_link ) ) {
				continue;
			}

			// We successfully got a link. Print it out.
			echo '<li class="button primary"><a href="' . esc_url( $section_link ) . '">' . $section->name . '</a></li>';
		}

		echo '</ul>';
	}
endif;

if ( ! function_exists( 'prakmed_entry_footer' ) ) :
	/**
	* Prints HTML with meta information for the categories, tags and comments.
	*/
	function prakmed_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'prakmed' ) );
			if ( $categories_list && prakmed_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'prakmed' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'prakmed' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'prakmed' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'prakmed' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'prakmed' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'prakmed_login_box' ) ) :
	function prakmed_login_box() {
		if ( ! is_user_logged_in() ) { // Display WordPress login form:
			$args = array(
				'form_id' => 'loginform',
				'label_username' => __( 'E-mail' ),
				'label_password' => __( 'Password' ),
				'label_remember' => __( 'Husk mig' ),
				'label_log_in' => __( 'Log ind' ),
				'remember' => true
			);
			wp_login_form( $args );
			echo '<a class="lost_password" class="button" href="' . esc_url( wc_lostpassword_url() ) . '">' . __( 'Lost your password?', 'prakmed' ) . '</a>';
		}
}
endif;

add_shortcode( 'prakmed_login_box', 'prakmed_login_box' );

if ( ! function_exists( 'prakmed_logout_box' ) ) :
	function prakmed_logout_box() {
if ( is_user_logged_in() ) { // If logged in:
			echo '<div id="user-box" class="login-wrapper header bg dark">';
			echo '<a class="button" href="' . get_permalink( get_option('woocommerce_myaccount_page_id') ) ." title=" . __('My Account','prakmed') . '">' . __('My Account','dagens') . '</a>';
			echo '<div class="button">'. wp_loginout( home_url(), false ) . '</div>'; // Display "Log Out" link.
			echo '</div></div>';
		}
	}
endif;

/**
* Returns true if a blog has more than 1 category.
*
* @return bool
*/
function prakmed_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'prakmed_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'prakmed_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so prakmed_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so prakmed_categorized_blog should return false.
		return false;
	}
}

/**
* Flush out the transients used in prakmed_categorized_blog.
*/
function prakmed_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'prakmed_categories' );
}
add_action( 'edit_category', 'prakmed_category_transient_flusher' );
add_action( 'save_post',     'prakmed_category_transient_flusher' );
