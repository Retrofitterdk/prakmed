<?php
/**
* Template Name: Frontpage
*
* This page template is a custom frontpage
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package PrakMed
*/

get_header(); ?>

<div id="primary" class="content-area nine columns">
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
