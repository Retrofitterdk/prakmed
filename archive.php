<?php
/**
* The template for displaying archive pages.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package PrakMed
*/
if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	$content_width = 'twelve';
} else {
	$content_width = 'nine';
}

get_header(); ?>

<div id="primary" class="content-area <?php echo $content_width ?> columns">
	<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->
		<div id="content" class="article-archive">
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		get_template_part( 'template-parts/content', 'article-archive' );

	endwhile;
	?>
		</div>
	<?php
		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar( 'archive');
get_footer();
