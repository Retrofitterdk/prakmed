<?php
/**
* The sidebar containing the top widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package PrakMed
*/
?>
<aside id="tertiary" class="sidebar widget-area" role="complementary">
  <?php
  if ( ! is_active_sidebar( 'sidebar-4' ) ) {
    return;
  }
  dynamic_sidebar( 'sidebar-4' );
  ?>
</aside><!-- #secondary -->
