<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Intergalactic
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
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
				//wpex_display_social(); ?>
			</ul><!-- /header-social -->
		</div><!-- /pre-header -->

		<header id="header" class="clearfix">
			<div id="logo">
				<a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo get_site_url() ?>/imgs/logo.png" alt="<?php echo get_bloginfo( 'name' ) ?>" /></a>
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
						<a href='/reach'><h3>REACH</h3></a>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class='convert-block product-subnav-block'>
						<a href='/convert'><h3>CONVERT</h3></a>
						<div>Retargeting solutions</div>
						<ul class='subnav-list-control'>
							<li>
								<a href='/convert'>
									<span class='icon-home_menuicons__convertxp'></span>
									CONVERT XP
								</a>
							</li>
							<li>
								<a href='/app-re-engagement/'>
									<span class='icon-home_menuicons_apprengage'></span>
									App Re-Engagement
								</a>
							</li>
							<li>
								<a href='/facebook-marketing'>
									<span class='icon-home_menuicons__fbmarketing'></span>
									Facebook Marketing
								</a>
							</li>
							<li>
								<a href='/cross-devise'>
									<span class='icon-home_menuicons__crosschannel'></span>
									Cross Channel
								</a>
							</li>
							<li>
								<a href='/mobile-web-app-re-engagment'>
									<span class='icon-home_menuicons__webmobileapp'></span>
									Mobile Web-App Engagement
								</a>
							</li>
						</ul>
					</div>
					<div class='engage-block product-subnav-block'>
						<a href='/engage'><h3>ENGAGE</h3></a>
						<div>Performance marketing hub</div>
						<ul class='subnav-list-control'>
							<li>
								<a href='/engage/data-onboarding/'>Data Onboarding / Aggregation</a>
							</li>
							<li>
								<a href='/engage/insights/'>Analytics & Reporting</a>
							</li>
							<li>
								<a href='/engage/marketing/'>Marketing Channels & Optimization</a>
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
								<a href='/job-postings'>Job Openings</a>
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
			<nav id="mobilenavigation-container">
				<div class='navigation-trigger'>
					<span class='icon-jobopenings_department'></span>
				</div>
				<ul class="mobilenavigation">
					<li class='has-submenu'>
						<div>Products</div>
						<span class='plus-icon'>+</span>
						<span class='minus-icon'>-</span>
						<ul class="mobilesubnav">
							<li>
								<a href='/products'>Products Overview</a>
							</li>
							<li>
								<a href='/reach'>Reach</a>
							</li>
							<li class='has-submenu'>
								<div>Convert</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/convert'>Convert Overview</a>
									</li>
									<li>
										<a href='/convert'>Convert XP</a>

									</li>
									<li>
										<a href='/convert'>App Re engagement</a>
									</li>
									<li>
										<a href='/convert'>Facebook Marketing</a>
									</li>
									<li>
										<a href='/convert'>Cross Channel</a>
									</li>
									<li>
										<a href='/convert'>Mobile Web-App Engagement</a>
									</li>
								</ul>
							</li>
							<li class='has-submenu'>
								<div>Engage</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/convert'>Engage Overview</a>
									</li>
									<li>
										<a href='/convert'>Data On boarding / Aggregation</a>
									</li>
									<li>
										<a href='/convert'>Analytics and Reporting</a>
									</li>
									<li>
										<a href='/convert'>Marketing Channels & Optimization</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class='has-submenu'>
						<div>About</div>
						<span class='plus-icon'>+</span>
						<span class='minus-icon'>-</span>
						<ul class="mobilesubnav">
							<li>
								<div>Company</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/convert'>Story</a>
									</li>
									<li>
										<a href='/convert'>Values</a>
									</li>
								</ul>
							</li>
							<li>
								<div>Team</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/convert'>Founders</a>
									</li>
									<li>
										<a href='/convert'>Board</a>
									</li>
									<li>
										<a href='/convert'>Leadership</a>
									</li>
									<li>
										<a href='/convert'>Investors</a>
									</li>
								</ul>
							</li>
							<li>
								<div>Careers</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/convert'>Vizurians Speak</a>
									</li>
									<li>
										<a href='/convert'>Job Openings</a>
									</li>
								</ul>
							</li>
							<li>
								<div>Press Room</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/convert'>Media Coverage</a>
									</li>
									<li>
										<a href='/convert'>Exclusives</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href='/publishers'>Publishers</a>
					</li>
					<li class='has-submenu'>
						<div>Resources</div>
						<span class='plus-icon'>+</span>
						<span class='minus-icon'>-</span>
						<ul class='mobilesubnav'></ul>
					</li>
					<li class='has-submenu'>
						<div>Blog</div>
						<span class='plus-icon'>+</span>
						<span class='minus-icon'>-</span>
						<ul class='mobilesubnav'></ul>
					</li>
					<li>
						<a href='/contact'>Contact Us</a>
					</li>
					<li>
						<a href='/language'>Language</a>
					</li>
					<li>
						<a href='/login'>
							<input type='button' value='Login' />
						</a>
					</li>
					<li>
						<a href='/search'>
							<span class='icon-home_header_searchwhite'></span>
						</a>
					</li>
				</ul>
			</nav>
		</header><!-- /header -->

		<div class='floating-header'>
			<div class='small-logo'></div>
		</div>
	</div><!-- /header-wrap -->

	<div id="main-content" class="clearfix">