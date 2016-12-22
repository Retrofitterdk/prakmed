
<?php
/**
* Template Name: Frontpage
*
* @package WordPress
* @subpackage prakmed
* @since prakmed 1.0
*/
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package prakmed
*/

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
      <h1>Introduction<h1>
      <?php get_template_part('template-parts/section', 'primary'); ?>
      <hr />

  </main><!-- #main -->
</div><!-- #primary -->


<?php
get_footer();
