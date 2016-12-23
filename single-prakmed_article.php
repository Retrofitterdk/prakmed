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
		$IDC_10_terms = get_the_terms( $post->ID, 'ICD-10', '' );
		$ICPC_2_terms = get_the_terms( $post->ID, 'ICPC-2', '' );
		$DSM_5_terms = get_the_terms( $post->ID, 'DSM-5', '' );


		$output = '';
		$output .= '<article id=' . $post->ID . ' class="handbook-article">';
		$output .= "<figure>" . get_the_post_thumbnail( $post->ID ) . "</figure>";
		$output .= '<header>';
		$output .= '<h1>' . $post->post_title . '</h1>';

		$output .= '<p class="taxonomies">';
		$output .= '<strong>ICD-10</strong> ';
		foreach($IDC_10_terms as $IDC_10_term) {
		$output .= $IDC_10_term->name . ' ';
		}
		$output .= ' <strong>ICPC-2</strong> ';
		foreach($ICPC_2_terms as $ICPC_2_term) {
		$output .= $ICPC_2_term->name . ' ';
		}
		$output .= ' <strong>DSM-5</strong> ';
		foreach($DSM_5_terms as $DSM_5_term) {
		$output .= $DSM_5_term->name . ' ';
		}
		$output .= '</p>';
		$output .= '</header>';

		$output .= '<div class="article-content">';
		$output .= $post->post_content;
		$output .= '</article>';

		echo $output;

		echo "<div class='pagination'>";
		echo  previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous feature', 'prakmed' ) . '</span> %title' );
		echo  next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next feature', 'prakmed' ) . '</span>' );
		echo "</div>";
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
