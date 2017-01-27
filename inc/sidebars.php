<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 function prakmed_widgets_init() {
 	register_sidebar( array(
 		'name'          => esc_html__( 'Primary Sidebar', 'prakmed' ),
 		'id'            => 'sidebar-1',
 		'description'   => esc_html__( 'Main sidebar, that appears to the left of content.', 'prakmed' ),
 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
 		'after_widget'  => '</section>',
 		'before_title'  => '<h2 class="widget-title">',
 		'after_title'   => '</h2>',
 	) );
  register_sidebar( array(
 		'name'          => esc_html__( 'Archive Sidebar', 'prakmed' ),
 		'id'            => 'sidebar-2',
 		'description'   => esc_html__( 'Sidebar, that replaces main sidebar on archive pages.', 'prakmed' ),
 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
 		'after_widget'  => '</section>',
 		'before_title'  => '<h2 class="widget-title">',
 		'after_title'   => '</h2>',
 	) );
  register_sidebar( array(
 		'name'          => esc_html__( 'Article Sidebar', 'prakmed' ),
 		'id'            => 'sidebar-3',
 		'description'   => esc_html__( 'Sidebar, that replaces main sidebar on article pages.', 'prakmed' ),
 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
 		'after_widget'  => '</section>',
 		'before_title'  => '<h2 class="widget-title">',
 		'after_title'   => '</h2>',
 	) );
  register_sidebar( array(
 		'name'          => esc_html__( 'Top Sidebar', 'prakmed' ),
 		'id'            => 'sidebar-4',
 		'description'   => esc_html__( 'Additional sidebar that appear above the header.', 'prakmed' ),
 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
 		'after_widget'  => '</section>',
 		'before_title'  => '<h2 class="widget-title">',
 		'after_title'   => '</h2>',
 	) );
  register_sidebar( array(
 		'name'          => esc_html__( 'Search Sidebar', 'prakmed' ),
 		'id'            => 'sidebar-5',
 		'description'   => esc_html__( 'Sidebar, that replaces main sidebar on search pages.', 'prakmed' ),
 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
 		'after_widget'  => '</section>',
 		'before_title'  => '<h2 class="widget-title">',
 		'after_title'   => '</h2>',
 	) );
 }
 add_action( 'widgets_init', 'prakmed_widgets_init' );
