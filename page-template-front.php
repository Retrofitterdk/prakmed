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
		do_action('before_main_content');
		 ?>
		<div id="search" class="search">
			<?php get_search_form(); ?>
		</div>
		<div id="sections" class="taxonomy-list">
			<?php prakmed_the_sections(); ?>
			</div
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_sidebar();
	get_footer();
