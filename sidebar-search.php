<?php
/**
* The sidebar containing the main widget area for the search page.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package PrakMed
*/
if ( ! is_active_sidebar( 'sidebar-5' ) ) {
  return;
}
?>
<aside id="secondary" class="sidebar widget-area three columns" role="complementary">
  <?php dynamic_sidebar( 'sidebar-5' ); ?>
</aside><!-- #secondary -->
