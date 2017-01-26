<?php
/**
* The template for displaying single custom post type prakmed_article.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package PrakMed
*/

get_header(); ?>

<div id="primary" class="content-area nine columns">
	<main id="main" class="site-main" role="main">
		<?php
		global $post;
		while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'article' );
	endwhile; // End loop.
	?>
</main><!-- #main -->
</div><!-- #primary -->
<?php

get_sidebar( 'article');
get_footer();
