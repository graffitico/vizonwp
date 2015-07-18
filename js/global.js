
jQuery(function () {

	var $ = jQuery;
	var subNavTimer;

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

	function hideNavigation () {
		$('#header').hide();
		$('.floating-header').show();
	}

	function showNavigation () {
		$('#header').show();
		$('.floating-header').hide();
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

	$(window).scroll(function (e) {
		if ($(window).scrollTop() > 50) {
			hideNavigation();
		}
		else {
			showNavigation();
		}
	});

	$(window).mousemove(function (e) {
		if (e.clientY > 150 && $(window).scrollTop() > 50) {
			hideNavigation();
		}
		else {
			showNavigation();
		}
	})
});