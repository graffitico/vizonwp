
jQuery(function () {

	var $ = jQuery;
	var subNavTimer;
	var navVisible = true;
	var preNavBg = false;
	var mouseOnTop = false;
	var scrollOnTop = true;

	function showSubNav(subnavName) {
		if (subnavName) {
			$('#header .subnav-block').hide();
			$('#header .' + subnavName + '-subnav').show();
		}
		$('#header .subnav').show();
	}

	function hideSubNav() {
		subNavTimer = setTimeout(function () {
			$('#header .subnav').hide();
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
			else {
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
	$('.navigation-trigger').click(function (e) {
		if ($('.mobilenavigation').is(":visible")) {
			$('.mobilenavigation').slideUp();
		} else {
			$('.mobilenavigation').slideDown();
		}
	});

	$('.mobilenavigation li').click(function (e) {
		if ($(this).hasClass('expanded-menu')) {
			$(this).removeClass('expanded-menu');
			$(this).find('> .mobilesubnav').slideUp();
		} else {
			$(this).addClass('expanded-menu');
			$(this).find('> .mobilesubnav').slideDown();
		}

		e.stopPropagation();
	})

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




});