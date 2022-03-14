<?php
/**
* Template part for displaying results in search pages.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package PrakMed
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$post_type = get_post_type();
	$post_type_obj = get_post_type_object($post_type);
	$post_type_label = $post_type_obj->labels->singular_name;
	?>
	<p class="label"><?php echo esc_html( $post_type_label ); ?></p>
	<?php
		if ( 'prakmed_article' === $post_type ) :
		get_template_part( 'template-parts/entrymedia', 'article' );
		get_template_part( 'template-parts/entryheader', 'article' );
		else : ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php
		endif;
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php prakmed_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
</header><!-- .entry-header -->
<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php prakmed_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php endif; ?>
