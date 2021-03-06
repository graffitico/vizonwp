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
<title><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- <link rel="stylesheet" href="<?php // echo get_site_url() ?>/css/pages.css" > -->
<!-- <link rel="icon" href="../images/logo_back.ico" type="image/x-icon" /> -->
<!-- <link rel="shortcut icon" href="../images/logo_back.ico" type="image/x-icon" /> -->
<link rel="icon" href="<?php echo  get_template_directory_uri() ; ?>/logo_back.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo  get_template_directory_uri() ; ?>/logo_back.ico" type="image/x-icon" />

<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class(); ?>>

	<div id="header-wrap">
		<div id="pre-header" class="clearfix">
			<ul id="header-actions">
	<!-- 			<li class='has-icon'>
					<form role="search" method="get" id="searchform"  action="<?php // echo esc_url( home_url( '/' ) ); ?>">
					<input class='search-bar' type="text" value="<?php // echo get_search_query(); ?>" name="s" id="s" />

					<span class='header-icon icon-header_searchblue'></span>
										</form>
				</li> -->
				<li class='has-icon'>
					<a href='/contactus'>
						<span class='header-icon icon-home_header_contactwhite'></span>
					</a>
				</li>
				<li>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    EN <span class="caret"></span>
				  	</button>
				  	<ul class="dropdown-menu">
					    <!-- <li><a href="http://web.vizury.com/website/ar/?v=ar" target="_blank">AR</a></li> -->
					    <li><a href="http://web.vizury.com/website/ja/?v=ja" target="_blank">JP</a></li>
					    <!-- <li><a href="http://web.vizury.com/website/ko/?v=ko" target="_blank">KO</a></li> -->
					    <li><a href="http://web.vizury.com/website/cn/?v=cn" target="_blank">CN</a></li>
					    <!-- <li><a href="http://web.vizury.com/website/pt/?v=pt" target="_blank">PG</a></li> -->
				  	</ul>
				</li>
				<li>
					<a href='https://central.vizury.com/login/#/' target='_blank' class='login-button'>Login</a>
				</li>
			</ul>
		</div><!-- /pre-header -->

		<header id="header" class="clearfix">
			<div id="logo">
				<a href="/" class="hidden-xs hidden-sm" title="Vizury Home" rel="home"><img src="/images/logo_full.svg" class="full_logo" alt="Vizury Logo" /></a>
				<a href="/" class="hidden-lg hidden-md" title="Vizury Home" rel="home"><img src="/images/logo_v.svg" class="full_logo" style="width: auto;" alt="Vizury Logo" /></a>
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
							<a href="/casestudies">RESOURCES</a>
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
								<a href='/products/reach/appreengagement'>
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
								<a href='/products/convert/convertgo'>
									<span class='icon icon-home_menuicons__convertxp'></span>
									<span>Convert Go!</span>
								</a>
							</li>
							<li>
								<a href='/products/convert/appretargeting'>
									<span class='icon icon-home_menuicons_apprengage'></span>
									<span>App Retargeting</span>
								</a>
							</li>
							<li>
								<a href='/products/convert/crosschannel'>
									<span class='icon icon-home_menuicons__crosschannel'></span>
									<span>Cross-Channel</span>
								</a>
							</li>
							<li>
								<a href='/products/convert/mobileweb-appreengagement'>
									<span class='icon icon-home_menuicons__webmobileapp'></span>
									<span>Mobile Web-App Re-engagement</span>
								</a>
							</li>
							<li>
								<a href='/products/convert/facebookremarketing' style="margin-bottom: 10px">
									<span class='icon icon-home_menuicons__fbmarketing'></span>
									<span>Facebook Remarketing</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='engage-block product-subnav-block'>
						<a href='/products/engage'><h3>Engage</h3></a>
						<p class='text-center'>Data and Marketing Platform</p>
						<ul class='subnav-list-control'>
							<li>
								<a href='/products/engage/dataonboarding/'>
									<span class='icon icon-home_menuicons__Dataonboarding'></span>
									<span>Data Onboarding & Aggregation</span>
								</a>
							</li>
							<li>
								<a href='/products/engage/analyticsandreporting'>
									<span class='icon icon-home_menuicons__analyticsandreporting'></span>
									<span>Analytics & Reporting</span>
								</a>
							</li>
							<li>
								<a href='/products/engage/omnichannelmarketing'>
									<span class='icon icon-home_menuicons__marketingchannel'></span>
									<span>Omni-channel Marketing Optimisation</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='contact-block no-border product-subnav-block'>
						<p class='text-center' style='margin-top: 0px'>For personalised marketing</p>
						<a href="/contactus">
						<input class='yellowbutton' style='padding: 10px 30px;  margin-top: -15%;' type='button' value='GET IN TOUCH' /></a>
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
								<a href='/mediacoverage'>
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
					<div class='resources-block resources-subnav-block'>
						<p class='text-center' style="margin: auto 7.5%;">Catch some latest trends, listen to stories of customer delight, videos that unravel industry insights and everything else that's moving the marketing world all in one place.</p>
						<!-- <ul class='subnav-list-control'>
							<li>
								<a href='/products/reach/webreach'>
									<span class='icon icon-home_menuicons__webreach'></span>
									<span>Web Reach</span>
								</a>
							</li>
							<li>
								<a href='/products/reach/appreengagement'>
									<span class='icon icon-home_menuicons__appre_reach'></span>
									<span>App Re-engagement</span>
								</a>
							</li>
						</ul> -->
					</div>
					<div class='resources-block resources-subnav-block'>
						<!-- <a href='/products/convert'><h3>Convert</h3></a>
						<p class='text-center'>Case Studies</p> -->
						<ul class='subnav-list-control'>
							<li>
								<a href='/casestudies'>
									<span class='icon icon-home_menuicons__successstories'></span>
									<span>Case Studies</span>
								</a>
							</li>
							<li>
								<a href='/whitepapers'>
									<span class='icon icon-home_menuicons__whitepaper'></span>
									<span>White Papers</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='resources-block resources-subnav-block'>
						<!-- <a href='/products/engage'><h3>Engage</h3></a>
						<p class='text-center'>Data and Marketing Platform</p> -->
						<ul class='subnav-list-control'>
							<li>
								<a href='/industryreports'>
									<span class='icon icon-home_menuicons__industryreports'></span>
									<span>Industry Reports</span>
								</a>
							</li>
							<li>
								<a href='/insights'>
									<span class='icon icon-home_menuicons__insights'></span>
									<span>Insights</span>
								</a>
							</li>
						</ul>
					</div>
					<div class='contact-block no-border resources-subnav-block'>
						<p class='text-center' style='margin-top: 0'>For personalised marketing</p>
						<a href="/contactus">
						<input class='yellowbutton' style='padding: 10px 30px;  margin-top: -15%;' type='button' value='GET IN TOUCH' /></a>
					</div>
				</div>
			</div>
			<nav id="mobilenavigation-container">
				<div class='navigation-trigger'>
					<span class='icon-three-bars'></span>
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
							<li class='has-submenu'>
								<div>Reach</div>
								<span class='plus-icon'>+</span>
								<span class='minus-icon'>-</span>
								<ul class='mobilesubnav'>
									<li>
										<a href='/products/reach'>Reach Overview</a>
									</li>
									<li>
										<a href='/products/reach/webreach'>Web Reach</a>
									</li>
									<li>
										<a href='/products/reach/appreengagement'>App Re-engagement</a>
									</li>
								</ul>
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
										<a href='/products/convert/convertgo'>Convert Go!</a>
									</li>
									<li>
										<a href='/products/convert/appretargeting'>App Retargeting</a>
									</li>
									<li>
										<a href='/products/convert/crosschannel'>Cross-Channel</a>
									</li>
									<li>
										<a href='/products/convert/mobileweb-appreengagement'>Mobile Web-App Re-engagement</a>
									</li>
									<li>
										<a href='/products/convert/facebookremarketing'>Facebook Remarketing</a>
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
										<a href='/products/engage/dataonboarding/'>Data Onboarding & Aggregation</a>
									</li>
									<li>
										<a href='/products/engage/analyticsandreporting'>Analytics and Reporting</a>
									</li>
									<li>
										<a href='/products/engage/omnichannelmarketing'>Omni-channel Marketing Optimisation</a>
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
										<a href='/mediacoverage'>Media Coverage</a>
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
						<ul class='mobilesubnav'>
							<li>
								<a href='/whitepapers'>White Papers</a>
							</li>
							<li>
								<a href='/casestudies'>Case Studies</a>
							</li>
							<li>
								<a href='/industryreports'>Industry Reports</a>
							</li>
							<li>
								<a href='/insights'>Insights</a>
							</li>
						</ul>
					</li>
					<li>
						<a href='/vizuryblog'>Blog</a>
					</li>
					<li>
						<a href='/contactus'>Contact Us</a>
					</li>
					<li class='has-submenu'>
						<div>Language</div>
						<span class='plus-icon'>+</span>
						<span class='minus-icon'>-</span>
						<ul class='mobilesubnav'>
						<li><a href="http://web.vizury.com/website/ar/?v=ar" target="_blank">AR</a></li>
					    <li><a href="http://web.vizury.com/website/ja/?v=ja" target="_blank">JP</a></li>
					    <li><a href="http://web.vizury.com/website/ko/?v=ko" target="_blank">KO</a></li>
					    <li><a href="http://web.vizury.com/website/cn/?v=cn" target="_blank">CN</a></li>
					    <li><a href="http://web.vizury.com/website/pt/?v=pt" target="_blank">PG</a></li>
						</ul>
					</li>
					<li>
						<a href='https://central.vizury.com/login/#/'>
							<a href='https://central.vizury.com/login/#/' target='_blank' class='login-button'>Login</a>
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

<div id="wrap" class="clearfix">
	<div id="main-content" class="clearfix">

		<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="padding:20px"  >
    <div class="modal-content">
      <div class="modal-header">
        <button style="float: right;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <!--   <h4 class="modal-title" id="myModalLabel">Subcribe</h4> -->
      </div>
      <div class="modal-body">
           <?php echo do_shortcode('[contact-form-7 id="3867" title="Subscribe"]'); ?>
      </div>
      <div class="modal-footer">


      </div>
    </div>
  </div>
</div>

 <?php

// print_r(  $wp_query->query_vars['category_name']);
 if(is_home() ||  $wp_query->query_vars['category_name'] == 'technology'  ||  $wp_query->query_vars['category_name'] == 'marketing' ) { ?>




	<div class="navigation-container">

<div class="nav-div-left" >


</div>


<div class="nav-div-right" >

	<ul class="navigations-left-filter">
		<li><a   style=" <?php if($wp_query->query_vars['category_name'] =="") {?> color:#000 !important; border-color:#ffd846!important;     background-color: #ffd846!important; <?php }   ?> text-decoration:none !important; text-decoration-style:none !important; " href="<?php echo get_site_url(); ?>/">All</a></li>
		<li><a   style=" <?php if($wp_query->query_vars['category_name'] == 'marketing' ) {?> color:#000  !important; border-color:#ffd846!important;     background-color: #ffd846!important; <?php }   ?> text-decoration:none !important; text-decoration-style:none !important; " href="<?php echo get_site_url(); ?>/category/marketing/">Marketing</a></li>
			<li><a  style=" <?php if($wp_query->query_vars['category_name'] == 'technology' ) {?> color:#000  !important;border-color:#ffd846!important;     background-color: #ffd846!important;<?php } ?> text-decoration:none !important; text-decoration-style:none !important; "  href="<?php echo get_site_url(); ?>/category/technology/">Technology</a></li>

	</ul>



<br/>
<div class="clearfix"></div>
<!-- 		<ul id="header-social">

				<li><a target="_blank" title="facebook" href="https://www.facebook.com/vizury1to1"><span class="fb-contact"></span></a></li>
				<li><a target="_blank" title="google" href='https://www.youtube.com/user/vizury1to1'><span class="youtube-contact"></span></a></li>
				<li><a target="_blank" title="linkedin" href="http://www.linkedin.com/company/vizury-interactive"><span class="linkedin-contact"></span></a></li>
				<li><a target="_blank" title="twitter" href="https://twitter.com/VizuryOneToOne"><span class="twitter-contact"></span></a></li>



			</ul>
 -->

<ul style="float:right" >
	   <li>
	   <form action="<?php echo  get_site_url(); ?>" id="searchbar" method="get"><input id="blog-search-input" type="search" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" value="" name="s"><!-- <img class="search-icon"  src="/images/search.svg"> --></form>

		</li>
		<li>

			<div class=" widget_add_to_any_subscribe_widget clearfix" title="Shift-click to edit this widget.">


			<a href="javascript:void(0)"  data-toggle="modal" data-target="#myModal" class="a2a_dd addtoany_subscribe" aria-label="Subscribe"><span class="span-sub btn-default">Subscribe</span></a>




			</div>
			</li>



</ul>

</div>

<div class="clearfix"></div>









	</div>

	<?php } ?>
