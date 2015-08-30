jQuery(function () {

	var $ = jQuery;
	var subNavTimer;
	var navVisible = true;
	var subNavVisible = false;
	var preNavBg = false;
	var mouseOnTop = false;
	var scrollOnTop = true;
	var tapDiscard = false;
    var screenWidth = $(window).width();

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
				$('#pre-header').css('background-color', 'rgba(032,032,032,0.95)');
				$('#header').css('background-color', 'rgba(032,032,032,0.95)');
				showNavigation();
			}
			else if (!subNavVisible) {
				$('#pre-header').css('background-color', '');
				$('#header').css('background-color', '');
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


	if ($(window).width() > 768) {
		$(window).scroll(function (e) {
			if ($(window).scrollTop() > 50) {
				scrollOnTop = false;
			}
			else {
				scrollOnTop = true;
			}
			manageHeaderVisibility();
		});

		$(window).mousemove(function (e) {
			if (e.clientY > 120) {
				mouseOnTop = false;
			}
			else {
				mouseOnTop = true;
			}
			manageHeaderVisibility();
		});
	}

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
	function showTab (e) {
      e.preventDefault();
      $(this).tab('show');
	}
	$('#pills-first a').on('mouseover', function (e) {
		showTab.call(this, e);
	});
    $('#pills-first a').on('touchend', function (e) {

		if (tapDiscard) {
			return;
		}

		tapDiscard = true;
		setTimeout(function () {
			tapDiscard = false;
		}, 500);

		showTab.call(this, e);
   	});

	var magicTimerOn, magicTimerOut, onElement = null, outElement = null, onQueue = [], outQueue = [];

   	function onExpandTransitionEnd () {

		var element = $(this).finish().find('.floating-hover-text');
		element.finish().css({visibility: 'hidden'}).show();

		var width = element.width();
		var height = element.height();
		var parentHeight = $(this).height();
		var parentWidth = $(this).width();

   		if ((screenWidth < 767) && (screenWidth > 479)) {
   			parentHeight += 8;
   			parentWidth += 24;
   		}

		var left = (parentWidth - width) / 2;
		var top = (parentHeight - height) / 2;

		element.css({
			left: left + 'px',
			top: top + 'px',
			visibility: 'visible'
		});

		var i = onQueue.length,
			qelement;

		while (i--) {

			qelement = onQueue[i];

			if (qelement !== element) {
				qelement = $(qelement).find('.floating-hover-text');

				qelement.finish().css({visibility: 'hidden'}).show();

				width = qelement.width();
				height = qelement.height();
				parentHeight = qelement.parent().height();
				parentWidth = qelement.parent().width();

		   		if ((screenWidth < 767) && (screenWidth > 479)) {
		   			parentHeight += 8;
		   			parentWidth += 24;
		   		}

				left = (parentWidth - width) / 2;
				top = (parentHeight - height) / 2;

				qelement.css({
					left: left + 'px',
					top: top + 'px',
					visibility: 'visible'
				});

			}
		}

		onQueue = [];
		onElement = null;
	}

	function onContractTransitionEnd () {

		var element = $(this).finish().find('.floating-normal-text');
		element.finish().css({visibility: 'hidden'}).show();

		var width = element.width();
		var height = element.height();
		var parentHeight = $(this).height();
		var parentWidth = $(this).width();

		var left = (parentWidth - width) / 2;
		var top = (parentHeight - height) / 2;

		element.css({
			left: left + 'px',
			top: top + 'px',
			visibility: 'visible'
		});

		var i = outQueue.length,
			qelement;

		while (i--) {

			qelement = outQueue[i];

			if (qelement !== element) {
				qelement = $(qelement).find('.floating-normal-text');

				qelement.finish().css({visibility: 'hidden'}).show();

				width = qelement.width();
				height = qelement.height();
				parentHeight = qelement.parent().height();
				parentWidth = qelement.parent().width();

		   		if ((screenWidth < 767) && (screenWidth > 479)) {
		   			parentHeight += 8;
		   			parentWidth += 24;
		   		}

				left = (parentWidth - width) / 2;
				top = (parentHeight - height) / 2;

				qelement.css({
					left: left + 'px',
					top: top + 'px',
					visibility: 'visible'
				});

			}
		}

		outQueue = [];
		outElement = null;
	}

	function onTransitionEnd () {

		if ($(this).hasClass('expanded')) {
			onExpandTransitionEnd.call(this);
		} else {
			onContractTransitionEnd.call(this);
		}
	}


	function expandStart() {

   		var t = this;
		$(this).find('.floating-normal-text').finish().hide();
		$(this).find('.floating-hover-text').finish().hide();
   		$(this).addClass('expanded');

   		if (screenWidth > 767) {
   			$(this).siblings().addClass('faded');
   		}
   		$('.hover-magic-text-bg').css({opacity: 0.1});

   		if (onElement) {
   			clearTimeout(magicTimerOn);
   			//onExpandTransitionEnd.call(onElement);
   		}

   		onElement = t;

   		var i = onQueue.length,
   			onAdd = true;
   		while (i--) {
   			if (onQueue[i] === onElement) {
   				onAdd = false;
   			}
   		}

   		onAdd && onQueue.push(onElement);

   		if (outElement && onElement === outElement) {
   			clearTimeout(magicTimerOut);

   			i = outQueue.length;
   			while(i--) {
   				if (outQueue[i] === onElement) {
   					outQueue.splice(i, 1);
   				}
   			}
   		}
   		magicTimerOn = setTimeout(function () {
   			onExpandTransitionEnd.call(onElement);
   		}, 650);
	}

	function contractStart () {

   		var t = this;
		$(this).find('.floating-normal-text').finish().hide();
		$(this).find('.floating-hover-text').finish().hide();
   		$(this).removeClass('expanded');

   		if (screenWidth > 767) {
   			$(this).siblings().removeClass('faded');
   		}
   		$('.hover-magic-text-bg').css({opacity: ''});

   		if (outElement) {
   			clearTimeout(magicTimerOut);
   			//onContractTransitionEnd.call(outElement);
   		}

   		outElement = t;

   		var i = outQueue.length,
   			onAdd = true;
   		while (i--) {
   			if (outQueue[i] === outElement) {
   				onAdd = false;
   			}
   		}

   		onAdd && outQueue.push(onElement);

   		if (onElement && onElement === outElement) {
   			clearTimeout(magicTimerOn);

   			var i = onQueue.length;
   			while(i--) {
   				if (onQueue[i] === outElement) {
   					onQueue.splice(i, 1);
   				}
   			}
   		}
   		magicTimerOut = setTimeout(function () {
   			onContractTransitionEnd.call(outElement);
   		}, 650);
	}
    // Hoverable text - For Engage Pages
   	$('.hoverable-text').hover(expandStart, contractStart);

   	//$('.hoverable-text').on("transitionend mozTransitionEnd webkitTransitionEnd oTransitionEnd MSTransitionEnd", );

	//Simulate hover action
	$('.hoverable-text').on('click touchend', function () {

		if (tapDiscard) {
			return;
		}

		tapDiscard = true;
		setTimeout(function () {
			tapDiscard = false;
		}, 300);


		if (!$(this).hasClass('expanded')) {
   			expandStart.call(this);
		} else {
   			contractStart.call(this);
		}
	});

	$('.viz-founders').click(function (e) {

		$('html, body').animate({
	        scrollTop: $("#viz-founders").offset().top
	    }, 1200);

	    e.preventDefault();
	});


	// Video player
	if ($.fn.fancybox) {

		$('.fancybox-play').show().fancybox({
			type: 'iframe',
			fitToView: (screenWidth > 800 ? false : true),
			height: 450,
			width: (screenWidth > 800 ? 800 : screenWidth)
		});

		$('.flexslider .slides > li').hover(function () {
	   		$(this).find('.normal-text').finish().hide();
	   		$(this).find('.hover-text').delay(400).fadeIn(500);
	   		//$(this).addClass('expanded');
		}, function () {
	   		$(this).find('.hover-text').finish().hide();
	   		$(this).find('.normal-text').delay(400).fadeIn(500);
		});
	}

	// $(".flexslider .slides > li").on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){

	// 	if ($(this).hasClass('active')) {
	// 		var element = $(this).find('.hover-text');
	// 		element.fadeIn(500);
	// 	} else {
	// 		var element = $(this).find('.normal-text');
	// 		element.fadeIn(500);
	// 	}
	// });

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

	/**************************** contact form js start **************************/
	$(".contact-marker").hover(function(){
		$(".contact-marker").css('fill' , "#202020" );
		$(this).css('fill' , "#ffd846" );
		contact_id = $(this).attr("data-id");
		console.log(contact_id );
		addr_html = $("#"+contact_id+"-content").html();
		$("#address-number").html(addr_html);
	});

	$(".country_drop").click(function(){
		contact_id = $(this).attr("data-id");

		btn_html = $(this).html() + "<span class='caret' ></span>";
		$("#menu1").html(btn_html);
		addr_html = $("#"+contact_id+"-content").html();

		$("#address-number").html(addr_html);
	});

	$("#looking_for").on('change',function() {

		if(cval == 'Jobs' || cval == 'Something Else'){
			$("#traffic_container").hide();
		}else{
			$("#traffic_container").show();
		}
	});

	/**************************** contact form js end **************************/


	// Need to wait for font files to load
	$(window).load(function () {

		$('.floating-text-box .hoverable-text .floating-normal-text').each(function () {

			var width = $(this).width();
			var height = $(this).height();
			var parentHeight = $(this).parent().height();
			var parentWidth = $(this).parent().width();

			var left = (parentWidth - width) / 2;
			var top = (parentHeight - height) / 2;

			$(this).css({
				top: top + 'px',
				left: left + 'px'
			});
		});
	});
});
