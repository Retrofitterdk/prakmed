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
    <?php
    get_template_part( 'template-parts/toc', 'sidebar' );
    if ( ! is_active_sidebar( 'sidebar-3' ) ) {
      return;
    }
    dynamic_sidebar( 'sidebar-3' );
    ?>

</aside><!-- #secondary -->
