<?php
add_action( 'after_setup_theme', 'homepage_setup' );

function homepage_setup () {
add_action( 'homepage', 'prakmed_the_search', 10 );
add_action( 'homepage', 'prakmed_the_sections', 20 );
add_action( 'homepage', 'prakmed_get_access', 30 );
}
