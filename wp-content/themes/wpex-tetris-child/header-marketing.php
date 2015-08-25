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
	<link rel="icon" type="images/png" href="<?php echo get_site_url(); ?>/wp-content/themes/wpex-tetris/images/Vizury-V.png" />
	

	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="icon" href="<?php echo get_site_url(); ?>/images/logo_back.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/images/logo_back.ico" type="image/x-icon" />
	<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class(); ?> 
		style="background-color: #000000;
background-image: url('http://graffiti-media.co/roshni/vizury_tech_blog/wp-content/uploads/2015/02/marketing-bg.jpg');
background-repeat: repeat;
background-position: top left;
background-attachment: scroll;"
	>

<div class="h-warp">

	<div id="header-wrap">
				<div id="small-header" class="clearfix">
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
							<a href="/about">ABOUT</a>
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
						<h3><a href='/reach'>REACH</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class='convert-block product-subnav-block'>
						<h3><a href='/convert'>CONVERT</a></h3>
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

	</div><!-- /header-wrap -->
	</div>
	<div id="wrap" class="clearfix">
	<div id="main-content" class="clearfix">
			 <div id="pre-header" class="clearfix">
			<ul id="header-social" class="clearfix">

				<li>
				<form method="get" id="searchbar" action="<?php echo home_url( '/' ); ?>"><input type="search" name="s" value="<?php _e('', 'wpex'); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"></form>
				</li>
								<li><?php
				// Show social icons if enabled
				wpex_display_social(); 
				get_sidebar("sidebar") ?>  </li>
			</ul><!-- /header-social -->
		</div><!-- /pre-header -->
		<!--<?php
		// Homepage tagline
		if( is_front_page() &&  get_bloginfo('description') ) { ?>
			<h2 id="homepage-title"><span><?php echo get_bloginfo('description'); ?></span></h2>
		<?php } ?>-->