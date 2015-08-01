jQuery(function () {

	var $ = jQuery;
	var subNavTimer;
	var navVisible = true;
	var subNavVisible = false;
	var preNavBg = false;
	var mouseOnTop = false;
	var scrollOnTop = true;

	function showSubNav(subnavName) {
		if (subnavName) {
			$('#header .subnav-block').hide();
			$('#header .' + subnavName + '-subnav').show();
		}
		$('#header .subnav').show();
		subNavVisible = true;
	}

	function hideSubNav() {
		subNavTimer = setTimeout(function () {
			$('#header .subnav').hide();
			subNavVisible = false;
		}, 300);
	}

	function stopSubNavHide() {
		clearTimeout(subNavTimer);
	}

	function manageHeaderVisibility() {

		if (scrollOnTop) {
			$('#pre-header').css('background-color', '')
			showNavigation();
		}
		else {
			if (mouseOnTop) {
				$('#pre-header').css('background-color', 'rgba(0,0,0,0.5)');
				showNavigation();
			}
			else if (!subNavVisible) {
				hideNavigation();
			}
		}
	}

	function hideNavigation () {
		if (navVisible) {
			$('#header').hide();
			$('.floating-header').show();
			$('#pre-header').css('background-color', '');
			navVisible = false;
		}
	}

	function showNavigation () {
		if (!navVisible) {
			$('#header').show();
			$('.floating-header').hide();
			navVisible = true;
		}
	}

	// Mobile Navigation
	$('.navigation-trigger').on('click touchstart', function (e) {
		if ($('.mobilenavigation').is(":visible")) {
			$('.mobilenavigation').slideUp();
		} else {
			$('.mobilenavigation').slideDown();
		}
	});

	$('.mobilenavigation li').on('click touchstart', function (e) {
		if ($(this).hasClass('expanded-menu')) {
			$(this).removeClass('expanded-menu');
			$(this).find('> .mobilesubnav').slideUp();
		} else {
			$(this).addClass('expanded-menu');
			$(this).find('> .mobilesubnav').slideDown();
		}

		e.stopPropagation();
	});

	// Search button click
	$('.icon-home_header_searchwhite').click(function () {

		//$('.search-bar').slideToggle();
		var searchAttr = $(this).attr('search-showing');

		if (!searchAttr || searchAttr === "0") {
			$(this).attr('search-showing', '1');

			$('.search-bar').addClass('searchvisible')/*.show()*/.focus();
		} else {
			$(this).attr('search-showing', '0');

			$('.search-bar').removeClass('searchvisible')/*.hide()*/;
		}
	});

	// testimonial actions
	$('.brands-list img').on('mouseover', function () {
		$('.brand-images img').hide();
		var toshow = $(this).attr('testimonial');
		$('.' + toshow).show();
	});

	//Simulate hover action
	$('.hoverable-text').on('click touchend', function () {
		if (!$(this).hasClass('expanded')) {
			$(this).addClass('expanded')
		} else {
			$(this).removeClass('expanded');
		}
	});

	// Header hover functionality
	$('.vizuri_menu_class li a').hover(function (e) {
		stopSubNavHide();
		showSubNav($(e.target).text().toLowerCase());
	}, function (e) {
		hideSubNav();
	});

	//
	$('#header .subnav').hover(function (e) {
		stopSubNavHide();
		showSubNav();
	}, function () {
		hideSubNav();
	});

	if ($(window).width() > 640) {
		$(window).scroll(function (e) {
			if ($(window).scrollTop() > 50) {
				scrollOnTop = false;
			}
			else {
				scrollOnTop = true;
			}
			manageHeaderVisibility();
		});
	}

	$(window).mousemove(function (e) {
		if (e.clientY > 150) {
			mouseOnTop = false;
		}
		else {
			mouseOnTop = true;
		}
		manageHeaderVisibility();
	});

	$('.mobilenavigation').css({
		'max-height': ($(window).height() - $('#header').height()) + 'px'
	});


	// Product Landing page

	//Script for the Products on Hover Text change effect
    $('#pills-first a').hover(function (e) {
      e.preventDefault()
      $(this).tab('show')
   	});

   	$('.hoverable-text').hover(function () {
   		$(this).addClass('expanded');
   	}, function () {
   		$(this).removeClass('expanded');
   	});

   	$('#myCarousel').carousel();

   	if ($(window).width() < 640) {
   		$('.flexslider').flexslider();
   	} else {

	   	$('.flexslider .slides').kwicks({
			max : 800,
			spacing : 0
		}).find('li > a').click(function (){
			return false;
		});
	}

	// about us js
	var winHeight = $(window).innerHeight();
	$(document).ready(function () {
	    $(".ab-panel").height(winHeight);
	    $("body").height(winHeight*$(".ab-panel").length);
	});

	window.addEventListener('resize', function (event) {
	    $(".ab-panel").height($(window).innerHeight());
	});
	$(window).on('scroll',function(){
	    $(".ab-panelCon").css('bottom',$(window).scrollTop()*-1);
	});

	$('.floating-text-box .hoverable-text .floating-normal-text').each(function () {
		var width = $(this).width();
		var height = $(this).height();
		var parentHeight = $(this).closest('.hoverable-text').height();
		var parentWidth = $(this).closest('.hoverable-text').width();

		var left = (parentWidth - width) / 2;
		var top = (parentHeight - height) / 2;

		$(this).css({
			left: (left + 5) + 'px',
			top: (top - 5) + 'px'
		});
	});



/**************************** contact form js start **************************/
$(".contact-marker").click(function(){
	contact_id = $(this).attr("id");
	console.log(contact_id);

addr_html = $("#"+contact_id+"-content").html();

$("#address-number").html(addr_html);


});
/**************************** contact form js end **************************/







});