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
  <div id="course-progress-bar" class="course-progress-bar">
    <h2>
      <?php esc_html_e( 'Table of content', 'prakmed' ); ?>  	</h2>
      <ul></ul><!-- This UL will get populated with javascript -->
    </div><!--#course-progress-bar-->
    <?php
    if ( ! is_active_sidebar( 'sidebar-3' ) ) {
      return;
    }
    dynamic_sidebar( 'sidebar-3' );
    ?>
  </aside><!-- #secondary -->
