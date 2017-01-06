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

				echo "<article id=". $post->ID ." class='handbook-article'>";
				echo "<figure>";
				the_post_thumbnail();
				echo "</figure>";
				echo "<header><h1>";
				the_title();
				echo "<p class='taxonomies'>";
				if ( $IDC_10_terms ) {
					printf( '' . __( '%1$s', 'prakmed' ) . '', $IDC_10_terms );
				}
				if ( $ICPC_2_terms ) {
					printf( '' . __( '%1$s', 'prakmed' ) . '', $ICPC_2_terms );
				}
				echo "</p>";
				echo "</h1></header>";
				echo "<div class='article-content'>";
				the_content();
				echo "</div>";
				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
