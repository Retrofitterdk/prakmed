<?php
/**
* The sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package PrakMed
*/
?>
<aside id="secondary" class="sidebar widget-area three columns" role="complementary">
  <nav id="primary-menu-container" class="mobile hide primary-menu" role="navigation">
  <?php get_template_part( 'template-parts/menu', 'primary' ); ?>
  </nav><!-- #footer-navigation -->
  <?php
  if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
  }
  dynamic_sidebar( 'sidebar-1' );
  ?>
</aside><!-- #secondary -->
