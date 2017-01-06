<?php
/**
* The template for displaying single custom post type prakmed_article.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package PrakMed
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">


		<?php
		global $post;
		while ( have_posts() ) : the_post();
		$IDC_10_terms = get_the_term_list( $post->ID, 'ICD-10', __( 'ICD-10: ', 'prakmed' ) );
		$ICPC_2_terms = get_the_term_list( $post->ID, 'ICPC-2', __( 'ICPC-2: ', 'prakmed' ) );
		$DSM_5_terms = get_the_term_list( $post->ID, 'DSM-5', __( 'DSM-5: ', 'prakmed' ) );

		echo "<article id=". $post->ID ." class='handbook-article'>";

		/* === POST THUMBNAIL === */
		echo "<figure>";
		the_post_thumbnail();
		echo "</figure>";

		/* === POST HEADER === */
		echo "<header>";
		echo "<h1>";
		the_title();
		echo "</h1>";

		/* === POST HEADER TAXONOMIES === */
		echo "<p class='taxonomies'>";
		if ( $IDC_10_terms ) {
			printf( '' . __( '%1$s', 'prakmed' ) . '', $IDC_10_terms );
		}
		if ( $ICPC_2_terms ) {
			printf( '' . __( '%1$s', 'prakmed' ) . '', $ICPC_2_terms );
		}
		if ( $DSM_5_terms ) {
			printf( '' . __( '%1$s', 'prakmed' ) . '', $DSM_5_terms );
		}
		echo "</p>";
		echo "</header>";

		/* === POST CONTENT === */
		echo "<div class='article-content'>";
		the_content();
		echo "</div>";

		/* === POST PAGINATION === */
		echo "<div class='pagination'>";
		echo  previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous feature', 'prakmed' ) . '</span> %title' );
		echo  next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next feature', 'prakmed' ) . '</span>' );
		echo "</div>";

	endwhile; // End loop.
	?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
