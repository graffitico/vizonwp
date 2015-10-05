(function($){
	var click = 0;
     $('.navigation-trigger').click(function(event) {
  
    var clicks = $(this).data('clicks');
  if (clicks || click==0) {
     $('.mobilenavigation').fadeIn( "slow" );
     $('.burger').attr('src', '/images/burger-cross-1.svg');
     
  } else {
     $('.mobilenavigation').fadeOut( "slow" );
     $('.burger').attr('src', '/images/burger.svg');
     $(this).css({
     	'width' : 'auto',
     	'height': 'auto'
     });
     
  }
  $(this).data("clicks", !clicks);
  ++click;
});

$('.mobilenavigation li a').mouseup(function(){
	$(".mobilenavigation").css("display", "none");
	$('.burger').attr('src', '/images/burger.svg');
	$('.navigation-trigger').css("width","auto");
});

    $(document).mouseup(function (e)
{
    var container = $(".mobilenavigation");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('.burger').attr('src', '/images/burger.svg');
		$('.navigation-trigger').css("width","auto");
    }
});





})(jQuery);