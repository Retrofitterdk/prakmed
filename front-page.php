
<?php
/**
 * The front page template file
 *
 * Just a script to make sure editors always gets to
 * choose between static front page and a dynamic homepage
 *
* @package WordPress
* @subpackage prakmed
* @since prakmed 1.0
* @link https://codex.wordpress.org/Template_Hierarchy
*
*/

if ( 'posts' == get_option( 'show_on_front' ) ) { ?>
    <?php include( get_home_template() );
} else { ?>
    <?php include( get_page_template() );
}
