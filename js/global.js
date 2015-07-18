
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
			scrollOnTop = false;
		}
		else {
			scrollOnTop = true;
		}
		manageHeaderVisibility();
	});

	$(window).mousemove(function (e) {
		if (e.clientY > 150) {
			mouseOnTop = false;
		}
		else {
			mouseOnTop = true;
		}
		manageHeaderVisibility();
	})
});