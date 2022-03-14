<?php
/**
* Template Name: Articles
*
* This page template is a custom page for articles archive
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package PrakMed
*/
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	$content_width = 'twelve';
} else {
	$content_width = 'nine';
}
get_header(); ?>

<div id="primary" class="content-area <?php echo $content_width ?> columns">
	<main id="main" class="site-main" role="main">
		<?php
		do_action( 'homepage' );
		?>
		<?php
		while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'frontpage' );

	endwhile; // End of the loop.
	?>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
