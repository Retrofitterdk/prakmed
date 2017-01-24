<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PrakMed
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div id="search-container" class="search-box-wrapper toggle hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>
		<div id="sharepanel-container" class="sharepanel-wrapper toggle hide">
			<?php
				if ( function_exists( 'sharing_display' ) ) {
					sharing_display( '', true );
					}
			?>
		</div>
		<div id="footer-menu" class="desktop wrap hide">
			<nav id="footer-navigation" class="footer-navigation" role="navigation">
			<?php get_template_part( 'template-parts/menu', 'footer' ); ?>
			</nav><!-- #footer-navigation -->
		</div>
		<div id="footer-info" class="site-info wrap mobile hide">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'brief' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'brief' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'brief' ), 'brief', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
