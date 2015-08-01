

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


