<?php if ( has_nav_menu( 'primary' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container'       => false,
			'menu_id'         => 'primary-menu',
			'menu_class'      => 'menu-items',
		)
	);
}
