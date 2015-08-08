

var winHeight ;
jQuery(document).ready(function () {
	winHeight = jQuery(window).innerHeight();
    jQuery(".ab-panel").height(winHeight);
    jQuery("body").height(winHeight*jQuery(".ab-panel").length);
});

window.addEventListener('resize', function (event) {
    jQuery(".ab-panel").height(jQuery(window).innerHeight());
});
jQuery(window).on('scroll',function(){
    jQuery(".ab-panelCon").css('bottom',jQuery(window).scrollTop()*-1);
});


