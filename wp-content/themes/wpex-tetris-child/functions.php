<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Tetris WPExplorer Theme
 * @since Tetris 1.0
 */

function filter_posts_on_homepage( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
       if(isset($_REQUEST['filter'])&&($_REQUEST['filter'] == 'marketing' || $_REQUEST['filter'] == 'technology' )){

       		  $query->set( 'category_name', $_REQUEST['filter'] );
       }
    }
}
add_action( 'pre_get_posts', 'filter_posts_on_homepage' );



?>
