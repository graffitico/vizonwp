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
		if (e.clientY > 120) {
			mouseOnTop = false;
		}
		else {
			mouseOnTop = true;
		}
		manageHeaderVisibility();
	});

	$('body').click(function () {

	});

	$('.mobilenavigation').css({
		'max-height': ($(window).height() - $('#header').height()) + 'px'
	});

	var isOpen = false;
	$('.dropdown-toggle').click(function () {
		//var isOpen = $(this).parent().hasClass('open');

		if (!isOpen) {
			//$(this).parent().removeClass('open');
			isOpen = true;
			$('.dropdown-menu').hide();
		} else {
			//$(this).parent().addClass('open');
			isOpen = false;
			$('.dropdown-menu').show();
		}

	})

	// $(".search-icon").click(function(){
	// 	$(this).hide();
	// 	$("#blog-search-input").show().animate({"width": "150px"},
	// 		"slow");
	// });

});