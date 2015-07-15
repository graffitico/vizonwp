<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Tetris WPExplorer Theme
 * @since Tetris 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">

	<div id="header-wrap">
		<div id="pre-header" class="clearfix">
			<ul id="header-social" class="clearfix">
				<?php
				// Show social icons if enabled
				wpex_display_social(); ?>
			</ul><!-- /header-social -->
		</div><!-- /pre-header -->

		<header id="header" class="clearfix">
			<div id="logo">
				<?php
				// Show custom image logo if defined in the admin
				if( get_theme_mod('wpex_logo') ) { ?>
					<a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo get_theme_mod('wpex_logo'); ?>" alt="<?php echo get_bloginfo( 'name' ) ?>" /></a>
				<?php }
				// No custom img logo - show text logo
					else { ?>
					<h2><a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
				<?php } ?>
			</div><!-- /logo -->
			<nav id="navigation" class="clearfix">
				<?php wp_nav_menu( array(
					'theme_location'	=> 'main_menu',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'sf-menu',
					'fallback_cb'		=> false
				)); ?>
			</nav><!-- /navigation -->
		</header><!-- /header -->
	</div><!-- /header-wrap -->
	
	<div id="main-content" class="clearfix">
	
		<?php
		// Homepage tagline
		if( is_front_page() &&  get_bloginfo('description') ) { ?>
			<h2 id="homepage-title"><span><?php echo get_bloginfo('description'); ?></span></h2>
		<?php } ?>