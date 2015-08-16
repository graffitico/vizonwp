

var winHeight ;
jQuery(document).ready(function () {
	winHeight = jQuery(window).innerHeight();
    jQuery(".").height(winHeight);
    jQuery("body").height(winHeight*jQuery(".").length);
});

window.addEventListener('resize', function (event) {
    jQuery(".").height(jQuery(window).innerHeight());
});
jQuery(window).on('scroll',function(){
    jQuery(".").css('bottom',jQuery(window).scrollTop()*-1);
});


