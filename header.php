<?php
/**
* The header for our theme.
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package PrakMed
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'prakmed' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div id="topbar" class="wrap">
				<div class="site-branding">
					<?php
					if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
				<!-- <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p> -->
				<?php
			endif; ?>
		</div><!-- .site-branding -->
		<?php if ( is_singular('prakmed_article') ) : ?>
			<nav id="article-navigation" class="desktop hide main-navigation activate" role="navigation">
				<a href="#course-progress-bar" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="screen-reader-text"><?php esc_html_e( 'Table of content', 'prakmed' ); ?></span>
				</a>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
	</div><!-- .wrap -->
</header><!-- #masthead -->

<div id="course-progress-bar" class="course-progress-bar toggle hide">
	<h2>
		<?php echo get_the_title( get_the_ID() ); ?>
	</h2>
	<ul></ul><!-- This UL will get populated with javascript -->
</div><!--#course-progress-bar-->
<div id="content" class="site-content wrap">
