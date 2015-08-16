jQuery(function () {

	var $ = jQuery;
	var subNavTimer;
	var navVisible = true;
	var subNavVisible = false;
	var preNavBg = false;
	var mouseOnTop = false;
	var scrollOnTop = true;
	var tapDiscard = false;

	function showSubNav(subnavName) {

		if (subnavName) {
			$('#header .subnav-block').hide();

			var subnavBlock = $('#header .' + subnavName + '-subnav');

			if (subnavBlock.length) {
				subnavBlock.fadeIn(200);
				$('#header .subnav').height(subnavBlock.height());
				subNavVisible = true;
			} else {
				$('#header .subnav').height(0);
			}
		}
	}

	function hideSubNav() {
		subNavTimer = setTimeout(function () {
			$('#header .subnav').height(0);
			subNavVisible = false;
		}, 200);
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
				$('#pre-header').css('background-color', 'rgba(0,0,0,0.8)');
				showNavigation();
			}
			else if (!subNavVisible) {
				$('#pre-header').css('background-color', '');
				hideNavigation();
			}
		}
	}

	function hideNavigation () {
		if (navVisible) {
			$('#header').hide();
			$('.floating-header').show();
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

	// Mobile Navigation
	$('.navigation-trigger').on('click touchend', function (e) {

		if (tapDiscard) {
			return;
		}

		tapDiscard = true;
		setTimeout(function () {
			tapDiscard = false;
		}, 500);

		if ($('.mobilenavigation').is(":visible")) {
			$('.mobilenavigation').slideUp();
		} else {
			$('.mobilenavigation').slideDown();
		}
	});

	$('.mobilenavigation li').on('click touchend', function (e) {

		if (tapDiscard) {
			return;
		}

		tapDiscard = true;
		setTimeout(function () {
			tapDiscard = false;
		}, 500);

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
	$('.icon-header_searchblue').click(function () {

		//$('.search-bar').slideToggle();
		var searchAttr = $(this).attr('search-showing');

		if (!searchAttr || searchAttr === "0") {
			$(this).attr('search-showing', '1');

			$('.search-bar')/*.show()*/.addClass('searchvisible').focus();
		} else {
			$(this).attr('search-showing', '0');

			$('.search-bar').removeClass('searchvisible')/*.hide()*/;
		}
	});

	// testimonial actions
	$('.brands-list img').on('mouseover', function () {
		$('.brand-images > img').hide();
		$('.brand-testimonials p').hide();
		var toshow = $(this).attr('testimonial');
		$('.' + toshow).show();
		$('.' + toshow + '-text').show();
	});

	// Show sonia by default.
	$('.brand-images > img').hide();
	$('.brand-testimonials p').hide();
	$('.sonia-v2').show();
	$('.sonia-v2-text').show();


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

	$(".tab-accordion-engage h3").click(function(){
		if (!$(this).next().is(":visible")) {
			$(".tab-accordion-engage ul ul").slideUp();
			$(this).next().slideDown();
		}
	});

	$(".tab-accordion-engage h3").first().next().show();


	// Product Landing page

	//Script for the Products on Hover Text change effect
    $('#pills-first a').on('mouseover touchend', function (e) {
      e.preventDefault()
      $(this).tab('show')
   	});

    // Hoverable text - For Engage Pages
   	$('.hoverable-text').hover(function () {
   		$(this).find('.floating-normal-text').finish().hide();
   		$(this).addClass('expanded');
   	}, function () {
   		$(this).find('.floating-hover-text').finish().hide();
   		$(this).removeClass('expanded');
   	});
	//Simulate hover action
	$('.hoverable-text').on('click touchend', function () {
		if (!$(this).hasClass('expanded')) {
   			$(this).find('.floating-normal-text').finish().hide();
			$(this).addClass('expanded')
		} else {
   			$(this).find('.floating-hover-text').finish().hide();
			$(this).removeClass('expanded');
		}
	});
	$(".hoverable-text").on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){
		if ($(this).hasClass('expanded')) {

			var element = $(this).find('.floating-hover-text');
			element.fadeIn(250);
			var width = element.width();
			var height = element.height();
			var parentHeight = $(this).height();
			var parentWidth = $(this).width();

			var left = (parentWidth - width) / 2;
			var top = (parentHeight - height) / 2;

			element.css({
				left: left + 'px',
				top: top + 'px'
			});
		} else {
			var element = $(this).find('.floating-normal-text');
			element.fadeIn(250);
			var width = element.width();
			var height = element.height();
			var parentHeight = $(this).height();
			var parentWidth = $(this).width();

			var left = (parentWidth - width) / 2;
			var top = (parentHeight - height) / 2;

			element.css({
				left: left + 'px',
				top: top + 'px'
			});
		}
	});


   	//$('#myCarousel').carousel({interval: 2000, auto: false});

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
	contact_id = $(this).attr("data-id");
	console.log(contact_id);

addr_html = $("#"+contact_id+"-content").html();

$("#address-number").html(addr_html);


});
$(".country_drop").click(function(){
	contact_id = $(this).attr("data-id");
	console.log(contact_id);
btn_html = $(this).html() + "<span class='caret' ></span>";
$("#menu1").html(btn_html);
addr_html = $("#"+contact_id+"-content").html();

$("#address-number").html(addr_html);


});
/**************************** contact form js end **************************/







});