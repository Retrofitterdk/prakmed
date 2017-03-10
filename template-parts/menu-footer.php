<?php if ( has_nav_menu( 'footer' ) ) {

	wp_nav_menu(
		array(
			'theme_location'  => 'footer',
			'container'       => 'div',
			'container_class' => 'wrap',
			'menu_id'         => 'footer-menu',
			'menu_class'      => 'menu-items',
			'depth'           => -1,
			'link_before'     => '<span class="mobile screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => '',
		)
	);

} ?>
