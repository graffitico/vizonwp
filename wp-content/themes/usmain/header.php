<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title( '|', true, 'right' ); ?></title>
	
    <!-- Bootstrap -->

	<link href="<?= get_template_directory_uri() ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= get_template_directory_uri() ?>/style.css" rel="stylesheet">
    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">
	<div id="header-wrap">
	<header id="header" class="clearfix">
		<div id="logo">
			<a href="/" class="hidden-xs hidden-sm" title="Vizury Home" rel="home"><img src="/images/logo_full.svg" class="full_logo" alt="Vizury Logo" /></a>
			<a href="/" class="hidden-lg hidden-md" title="Vizury Home" rel="home"><img src="/images/logo_v.svg" class="full_logo" style="width: auto;" alt="Vizury Logo" /></a>
		</div>
		<nav>
			<div class='navigation-trigger'>
				<img class="burger" src='/images/burger.svg'>
			</div>
			<ul class="mobilenavigation">
				<li><a href='#app-retarget'>App Retargeting</a></li>
				<li><a href='#app-reengage'>App Re-engagement</a></li>
				<li><a href='#benefits'>Benefits</a></li>
				<li><a href='#clients'>Clients</a></li>
				<li><a href='#readmore'>More about Vizury Mobile</a></li>
				<li><a href='#publishers'>Publishers</a></li>
				<li><a href='#contact'>Get in touch</a></li>
				<li><a href='https://www.vizury.com' target="_blank">Vizury Corporate</a></li>
			</ul>
		</nav>
	</header>
	</div>
	
<div id="main-content" class="clearfix">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
