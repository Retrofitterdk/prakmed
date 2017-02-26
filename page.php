<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
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
		while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
