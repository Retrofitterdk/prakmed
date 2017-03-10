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
	<nav id="footer-menu-container" class="footer-navigation menu" role="navigation">
		<div id="search-container" class="searchbox wrap toggle hide">
				<?php get_search_form(); ?>
		</div>
		<div id="sharepanel-container" class="sharepanel wrap toggle hide">
			<?php
			if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			}
			?>
		</div>
		<?php get_template_part( 'template-parts/menu', 'footer' ); ?>
	</nav><!-- #footer-navigation -->
	<div id="footer-info" class="site-info wrap">
		<div id="book" class="three columns mobile hide">
			<?php
			$book_cover_id = get_theme_mod('book_cover_id');
			echo wp_get_attachment_image( $book_cover_id, 'full', "", array( "id" => "book_cover", "class" => "img" ) );
			?>
		</div>
		<div id="organization_info" class="three columns" itemscope itemtype="http://schema.org/Organization">
			<?php
			$site_title = get_bloginfo( 'name' );
			$description = get_bloginfo( 'description', 'display' );
			$organization_parent = get_theme_mod( 'organization_parent' );
			$organization_address = get_theme_mod( 'organization_address' );
			$organization_zip = get_theme_mod( 'organization_zip' );
			$organization_city = get_theme_mod( 'organization_city' );
			$organization_country = get_theme_mod( 'organization_country' );
			$organization_phone = get_theme_mod( 'organization_phone' );
			$organization_email = get_theme_mod( 'organization_email' );
			?>
			<!-- the name of the organization -->
			<div class="site-branding">
			<h3 class="site-title" itemprop="name"><?php echo $site_title ?></h3>
			<p itemprop="description"><?php echo $description ?></p>
		</div>
			<!-- address -->
			<div  itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<p><strong><?php esc_html_e( 'Address:', 'prakmed' ); ?></strong>
					<span id="care_of" itemprop="streetAddress"><?php echo $organization_parent ?></span>
					<span id="postal_address" itemprop="streetAddress"><?php echo $organization_address ?></span>
					<span id="postal_code" itemprop="postalCode"><?php echo $organization_zip ?></span>
					<span id="postal_locality" itemprop="addressLocality"><?php echo $organization_city ?></span>
					<span id="postal_country" itemprop="addressCountry"><?php echo $organization_country ?></span>
				</p>
			</div><!--/itemtype=PostalAddress-->

			<!-- Contact information -->
			<p><strong><?php esc_html_e( 'Phone:', 'prakmed' ); ?></strong>:
				<a href="tel:<?php echo $organization_phone ?>" itemprop="telephone"><?php echo $organization_phone ?></a>
			</p>

			<p><strong><?php esc_html_e( 'E-mail:', 'prakmed' ); ?></strong>:
				<a href="mailto:<?php echo $organization_email ?>" itemprop="email"><?php echo $organization_email ?></a>
			</p>

		</div><!--/itemtype=Organization-->
		<div id="disclaimer" class="three columns">
			<h3><?php esc_html_e( 'Disclaimer', 'prakmed' ); ?></h3>
			<?php
			$liability_disclaimer = get_theme_mod('liability_disclaimer');
			?>
			<p><?php echo $liability_disclaimer ?></p>
		</div>

		<div id="copyright" class="three columns">
			<h3><?php esc_html_e( 'Copyright', 'prakmed' ); ?></h3>
			<?php
			$copyright_message = get_theme_mod('copyright_message');
			?>
			<p><?php echo $copyright_message ?></p>
		</div>

	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
