<?php
/**
* Template part for displaying posts.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package PrakMed
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	get_template_part( 'template-parts/entrymedia');
	get_template_part( 'template-parts/entryheader');
	get_template_part( 'template-parts/entrycontent');
	get_template_part( 'template-parts/entryfooter');
	?>
</article><!-- #post-## -->
