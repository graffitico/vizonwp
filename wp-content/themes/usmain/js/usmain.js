(function($){
	var click = 0;
     $('.navigation-trigger').click(function(event) {
  
    var clicks = $(this).data('clicks');
  if (clicks || click==0) {
     $('.mobilenavigation').fadeIn( "slow" );
     $('.burger').attr('src', '/images/cross-01.svg');
     
     $(this).css({
     	'width' : '30px',
     });
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

    $(document).mouseup(function (e)
{
    var container = $(".mobilenavigation");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('.burger').attr('src', '/images/burger.svg');
    }
});
})(jQuery);