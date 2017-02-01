<?php if ( has_nav_menu( 'header' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'header',
			'container'       => false,
			'menu_id'         => 'header-menu',
			'menu_class'      => 'menu-items',
		)
	);
}
