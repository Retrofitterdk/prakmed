<?php
/**
* Template Name: Buy Book
* Product Template: buy-book
*/
get_header();
?>

	<div id="primary" class="content-area buy-book columns">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
