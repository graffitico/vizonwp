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
<!-- <link rel="stylesheet" href="<?php // echo get_site_url() ?>/css/pages.css" > -->
<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">

	<div id="header-wrap">
		<div id="pre-header" class="clearfix">
			<ul id="header-actions">
				<li class='has-icon'>
					<input class='search-bar' type="text" id="search_container" style="" />
					<span class='header-icon icon-header_searchblue'></span>
				</li>
				<li class='has-icon'>
					<a href='/contactusform'>
						<span class='header-icon icon-header_contactblue'></span>
					</a>
				</li>
				<li>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    EN <span class="caret"></span>
				  	</button>
				  	<ul class="dropdown-menu">
					    <li><a href="#">AR</a></li>
					    <li><a href="#">JP</a></li>
					    <li><a href="#">KO</a></li>
					    <li><a href="#">CN</a></li>
					    <li><a href="#">PG</a></li>
				  	</ul>
				</li>
				<li>
					<input type='button' class='login-button' value='Login' />
				</li>
			</ul>
		</div><!-- /pre-header -->

		<header id="header" class="clearfix">
			<div id="logo">
				<a href="/" title="Vizury Home" rel="home"><img src="/images/logo_full.svg" class="full_logo" alt="Vizury Logo" /></a>
			</div><!-- /logo -->
			<nav id="navigation" class="clearfix">
				<div class="vizuri_menu_class">
					<ul id="menu-header-menu" class="sf-menu sf-js-enabled">
						<li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5">
							<a href="/products">PRODUCTS</a>
						</li>
						<li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
							<a href="/story">ABOUT</a>
						</li>
						<li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7">
							<a href="/publishers">PUBLISHERS</a>
						</li>
						<li id="menu-item-8" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8">
							<a href="/success-stories">RESOURCES</a>
						</li>
						<li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9">
							<a href="/vizuryblog">BLOG</a>
						</li>
					</ul>
				</div>
			</nav><!-- /navigation -->
			<div class='subnav'>
				<div class='subnav-block products-subnav'>
					<div class='reach-block product-subnav-block'>
						<a href='/products/reach'><h3>Reach</h3></a>
						<p class='text-center'>User acquisition and activation</p>
						<ul class='subnav-list-control'>
							<li>
								<a href='/products/reach/webreach'>
									<span class='icon icon-home_menuicons__webreach'></span>
									<span>Web Reach</span>
								</a>
							</li>
							<li>
								<a href='/products/reach/appreengage/'>
									<span class='icon icon-home_menuicons__appre_reach'></span>
									<span>App Re-engagement</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='convert-block product-subnav-block'>
						<a href='/products/convert'><h3>Convert</h3></a>
						<p class='text-center'>Personalized Retargeting</p>
						<ul class='subnav-list-control'>
							<li>
								<a href='/products/convert'>
									<span class='icon icon-home_menuicons__convertxp'></span>
									<span>Convert Go!</span>
								</a>
							</li>
							<li>
								<a href='/products/convert/appretarget/'>
									<span class='icon icon-home_menuicons_apprengage'></span>
									<span>App Retargeting</span>
								</a>
							</li>
							<li>
								<a href='/products/convert/crosschannel/'>
									<span class='icon icon-home_menuicons__crosschannel'></span>
									<span>Cross-Channel</span>
								</a>
							</li>
							<li>
								<a href='/products/convert/mobilewebappengage/'>
									<span class='icon icon-home_menuicons__webmobileapp'></span>
									<span>Mobile Web to App</span>
								</a>
							</li>
							<li>
								<a href='/products/convert/fbmarketing/'>
									<span class='icon icon-home_menuicons__fbmarketing'></span>
									<span>Facebook Retargeting</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='engage-block product-subnav-block'>
						<a href='/products/engage'><h3>Engage</h3></a>
						<p class='text-center'>Data and Marketing Platform</p>
						<ul class='subnav-list-control'>
							<li>
								<a href='/products/engage/data-onboarding/'>
									<span class='icon icon-home_menuicons__Dataonboarding'></span>
									<span>Data Onboarding & Aggregation</span>
								</a>
							</li>
							<li>
								<a href='/products/engage/insights/'>
									<span class='icon icon-home_menuicons__analyticsandreporting'></span>
									<span>Analytics & Reporting</span>
								</a>
							</li>
							<li>
								<a href='/products/engage/marketing/'>
									<span class='icon icon-home_menuicons__marketingchannel'></span>
									<span>Omni-channel Marketing Optimisation</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='contact-block product-subnav-block'>
						<p class='text-center'>For personalised solutions,</p>
						<input class='yellowbutton' style='padding: 10px 30px' type='button' value='GET IN TOUCH' />
					</div>
				</div>
				<div class='subnav-block about-subnav'>
					<div class='company-block about-subnav-block'>
						<a href='/story'><h3>Company</h3></a>
						<ul class='subnav-list-control'>
							<li>
								<a href='/story'>
									<span class='icon icon-home_menuicons__ourstory'></span>
									<span>Story</span>
								</a>
							</li>
							<li>
								<a href='/values'>
									<span class='icon icon-home_menuicons__values'></span>
									<span>Values</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='convert-block about-subnav-block'>
						<a href='/founders'><h3>Team</h3></a>
						<ul class='subnav-list-control'>
							<li>
								<a href='/founders'>
									<span class='icon icon-home_menuicons__founders'></span>
									<span>Founders</span>
								</a>
							</li>
							<li>
								<a href='/board'>
									<span class='icon icon-home_menuicons__board'></span>
									<span>Board</span>
								</a>
							</li>
							<li>
								<a href='/investors'>
									<span class='icon icon-home_menuicons__investors'></span>
									<span>Investors</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='engage-block about-subnav-block'>
						<a href='/lifeatvizury'><h3>Careers</h3></a>
						<ul class='subnav-list-control'>
							<li>
								<a href='/lifeatvizury'>
									<span class='icon icon-home_menuicons__Vizurianspeak'></span>
									<span>Life @ Vizury</span>
								</a>
							</li>
							<li>
								<a href='/jobopenings'>
									<span class='icon icon-home_menuicons__jobopening'></span>
									<span>Job Openings</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='no-border press-block about-subnav-block'>
						<a href='/press-release'><h3>Press Room</h3></a>
						<ul class='subnav-list-control'>
							<li>
								<a href='/press-release'>
									<span class='icon icon-home_menuicons_pressroom'></span>
									<span>Press Release</span>
								</a>
							</li>
							<li>
								<a href='/media-coverage'>
									<span class='icon icon-home_menuicons__mediacoverage'></span>
									<span>Media Coverage</span>
								</a>
							</li>
							<!--
							<li>
								<span class='icon-home_menuicons__exclusives'></span>
								<a href='javascript://'>Exclusives</a>
							</li>
							-->
						</ul>
					</div>
				</div>
				<div class='subnav-block resources-subnav'>
					<div class='company-block resources-subnav-block'>
						<a href='/whitepapers'>
							<h3>
								<span class='icon icon-home_menuicons__whitepaper'></span>
								<span>Whitepaper</span>
							</h3>
						</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class='convert-block resources-subnav-block'>
						<a href='/success-stories'>
							<h3>
								<span class='icon icon-home_menuicons__successstories'></span>
								<span>Case Studies</span>
							</h3>
						</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class='engage-block resources-subnav-block'>
						<a href='/industry-reports'>
							<h3>
								<span class="icon icon-home_menuicons__industryreports"></span>
								<span>Industry Reports</span>
							</h3>
						</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class='no-border press-block resources-subnav-block'>
						<a href='/insights'>
							<h3>
								<span class="icon icon-home_menuicons__insights"></span>
								<span>Insights</span>
							</h3>
						</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
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
								<a href='/products/reach'>Reach</a>
							</li>
							<li class='has-submenu'>
								<div>Convert</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/products/convert'>Convert Overview</a>
									</li>
									<li>
										<a href='/products/convert'>Convert Go!</a>
									</li>
									<li>
										<a href='/products/convert/appreengage/'>App Re engagement</a>
									</li>
									<li>
										<a href='/products/convert/fbmarketing/'>Facebook Marketing</a>
									</li>
									<li>
										<a href='/products/convert/crosschannel/'>Cross Channel</a>
									</li>
									<li>
										<a href='/products/convert/mobilewebappengage/'>Mobile Web-App Engagement</a>
									</li>
								</ul>
							</li>
							<li class='has-submenu'>
								<div>Engage</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/products/engage'>Engage Overview</a>
									</li>
									<li>
										<a href='/products/engage/data-onboarding/'>Data On boarding / Aggregation</a>
									</li>
									<li>
										<a href='/products/engage/insights/'>Analytics and Reporting</a>
									</li>
									<li>
										<a href='/products/engage/marketing'>Marketing Channels & Optimization</a>
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
										<a href='/story'>Story</a>
									</li>
									<li>
										<a href='/values'>Values</a>
									</li>
								</ul>
							</li>
							<li>
								<div>Team</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/founders'>Founders</a>
									</li>
									<li>
										<a href='/board'>Board</a>
									</li>
									<li>
										<a href='/investors'>Investors</a>
									</li>
								</ul>
							</li>
							<li>
								<div>Careers</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/lifeatvizury'>Life @ Vizury</a>
									</li>
									<li>
										<a href='/jobopenings'>Job Openings</a>
									</li>
								</ul>
							</li>
							<li>
								<div>Press Room</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class="mobilesubnav">
									<li>
										<a href='/press-release'>Press Release</a>
									</li>
									<li>
										<a href='/media-coverage'>Media Coverage</a>
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
					<li>
						<a href='/vizuryblog'>Blog</a>
					</li>
					<li>
						<a href='/contact'>Contact Us</a>
					</li>
					<li class='has-submenu'>
						<div>Language</div>
						<span class='plus-icon'>+</span>
						<span class='minus-icon'>-</span>
						<ul class='mobilesubnav'>
						    <li><a href="#">English</a></li>
						    <li><a href="#">Arabic</a></li>
						    <li><a href="#">Japanese</a></li>
						    <li><a href="#">Korean</a></li>
						    <li><a href="#">Mandarin</a></li>
						    <li><a href="#">Portuguese</a></li>
						</ul>
					</li>
					<li>
						<a href='/login'>
							<input class='login-button' type='button' value='Login' />
						</a>
					</li>
					<li>
						<a href='javascript://'>
							<input class='search-bar' type="text" id="search_container_mobile" style="" />
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