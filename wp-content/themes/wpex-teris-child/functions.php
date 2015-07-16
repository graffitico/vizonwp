<?php
/**
 *
 * @package Wordpress
 * @subpackage Tetris WPExplorer Child Theme
 */

function register_my_menu() {
  register_nav_menu('header_menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
