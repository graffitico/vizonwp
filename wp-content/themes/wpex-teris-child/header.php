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
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/global.js"></script>
</head>

<!-- Begin Body -->
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">

	<div id="header-wrap">
		<div id="pre-header" class="clearfix">
			<ul id="header-actions">
				<li>
					<input type='button' class='login-button' value='LOGIN' />
				</li>
				<li>
					<span class='icon-home_header_search'></span>
				</li>
				<li>
					<span class='icon-home_header_contact'></span>
				</li>
				<li>
					<span>EN</span><span class='icon-home_header_lang'></span>
				</li>
			</ul>
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
					'theme_location'	=> 'header_menu',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'sf-menu',
					'container_class' 	=> 'vizuri_menu_class',
					'fallback_cb'		=> false
				)); ?>
			</nav><!-- /navigation -->
			<div class='subnav'>
				<div class='products-subnav'>
					<div class='reach-block product-subnav-block'>
						<h3>REACH</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class='convert-block product-subnav-block'>
						<h3>CONVERT</h3>
						<div>Retargeting solutions</div>
						<ul class='subnav-list-control'>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>CONVERT XP</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>App Re-Engagement</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Facebook Marketing</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Cross Channel</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Mobile Web-App Engagement</a>
							</li>
						</ul>
					</div>
					<div class='engage-block product-subnav-block'>
						<h3>ENGAGE</h3>
						<div>Performance marketing hub</div>
						<ul class='subnav-list-control'>
							<li>
								<a href='javascript://'>Data Onboarding / Aggregation</a>
							</li>
							<li>
								<a href='javascript://'>Analytics & Reporting</a>
							</li>
							<li>
								<a href='javascript://'>Marketing Channels & Optimization</a>
							</li>
						</ul>
					</div>
					<div class='contact-block product-subnav-block'>
						<div>For personalised solutions,</div>
						<input type='button' value='GET IN TOUCH' />
					</div>
				</div>
				<div class='about-subnav'></div>
				<div class='resources-subnav'></div>
			</div>
		</header><!-- /header -->
	</div><!-- /header-wrap -->

	<div id="main-content" class="clearfix">

		<?php
		// Homepage tagline
		if( is_front_page() &&  get_bloginfo('description') ) { ?>
			<h2 id="homepage-title"><span><?php echo get_bloginfo('description'); ?></span></h2>
		<?php } ?>