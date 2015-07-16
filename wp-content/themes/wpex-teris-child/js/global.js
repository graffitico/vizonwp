
jQuery(function () {

	var $ = jQuery;
	var subNavTimer;

	function showSubNav() {
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

	// Header hover functionality
	$('.vizuri_menu_class li a').hover(function (e) {
		stopSubNavHide();
		showSubNav();
	}, function (e) {
		hideSubNav();
	});

	//
	$('#header .subnav').hover(function (e) {
		stopSubNavHide();
		showSubNav();
	}, function () {
		hideSubNav();
	})
});