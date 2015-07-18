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
					<span class='icon-home_header_searchwhite'></span>
				</li>
				<li>
					<span class='icon-home_header_contactwhite'></span>
				</li>
				<li>
					<span>EN</span><span class='icon-home_header_langwhite'></span>
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
				<a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><img src="/imgs/logo.png" alt="<?php echo get_bloginfo( 'name' ) ?>" /></a>
			</div><!-- /logo -->
			<nav id="navigation" class="clearfix">
				<div class="vizuri_menu_class">
					<ul id="menu-header-menu" class="sf-menu sf-js-enabled">
						<li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5">
							<a href="/products">PRODUCTS</a>
						</li>
						<li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
							<a href="8888/about">ABOUT</a>
						</li>
						<li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7">
							<a href="/publishers">PUBLISHERS</a>
						</li>
						<li id="menu-item-8" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8">
							<a href="/resources">RESOURCES</a>
						</li>
						<li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9">
							<a href="/blog">BLOG</a>
						</li>
					</ul>
				</div>
			</nav><!-- /navigation -->
			<div class='subnav'>
				<div class='subnav-block products-subnav'>
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
								<a href='/products/reengagement'>App Re-Engagement</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='/products/fbmarketing'>Facebook Marketing</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='/products/crosschannel'>Cross Channel</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='/products/mobileengage'>Mobile Web-App Engagement</a>
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
				<div class='subnav-block about-subnav'>
					<div class='company-block product-subnav-block'>
						<h3>Company</h3>
						<ul class='subnav-list-control'>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Story</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Values</a>
							</li>
						</ul>
					</div>
					<div class='convert-block product-subnav-block'>
						<h3>Team</h3>
						<ul class='subnav-list-control'>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Founders</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Board</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Leadership</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Investors</a>
							</li>
						</ul>
					</div>
					<div class='engage-block product-subnav-block'>
						<h3>Careers</h3>
						<div>Life @ Vizury</div>
						<ul class='subnav-list-control'>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Vizurians Speak</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Job Openings</a>
							</li>
						</ul>
					</div>
					<div class='no-border press-block product-subnav-block'>
						<h3>Press Room</h3>
						<div>Press Release</div>
						<ul class='subnav-list-control'>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Media Coverage</a>
							</li>
							<li>
								<span class='icon-temp'></span>
								<a href='javascript://'>Exclusives</a>
							</li>
						</ul>
					</div>
				</div>
				<div class='subnav-block resources-subnav'></div>
			</div>
		</header><!-- /header -->

		<div class='floating-header'>
			<div class='small-logo'></div>
		</div>
	</div><!-- /header-wrap -->

	<div id="main-content" class="clearfix">
