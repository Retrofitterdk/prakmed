<?php if ( has_nav_menu( 'footer' ) ) {

	wp_nav_menu(
		array(
			'theme_location'  => 'footer',
			'container'       => 'div',
			'container_id'    => 'footer-menu-container',
			'container_class' => 'menu',
			'menu_id'         => 'footer-menu',
			'menu_class'      => 'menu-items',
			'depth'           => -1,
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => '',
		)
	);

} ?>