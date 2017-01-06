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
		$IDC_10_terms = get_the_term_list( $post->ID, 'ICD-10', __( '<strong>ICD-10:</strong>', 'prakmed' ) );
		$ICPC_2_terms = get_the_term_list( $post->ID, 'ICPC-2', __( '<strong>ICPC-2:</strong>', 'prakmed' ) );
		$DSM_5_terms = get_the_term_list( $post->ID, 'DSM-5', __( '<strong>DSM-5:</strong>', 'prakmed' ) );

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

	endwhile; // End loop.
	?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
