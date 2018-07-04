jQuery( '.carousel-inner').find('.carousel-item:first' ).addClass( 'active' );
$('li:has(> ul)').addClass('has_sub');

$('.nav-tabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})



$('#uitgelichtCarousel').carousel({
  interval: 10000
})

$('.carousel-ui .carousel-item').each(function(){
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<2;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
      }
});

$( ".nav .row .user_menu ul .cart" ).click(function() { 
		$('.cart_pop').toggleClass("hide");
		if ( $('.cart_pop').hasClass("hide") ) {
			$('.cart_pop').css('visibility', 'visible');
			$('.cart_pop').css('pointerEvents', 'all');
			$('.cart_pop').addClass('cart_in');
			$('.cart_pop').removeClass('out');
		}
		else {
			$('.cart_pop').css('visibility', 'hidden');
			$('.cart_pop').removeClass('cart_in');
			$('.cart_pop').addClass('out');
			$('.cart_pop').css('pointerEvents', 'none');
		}
});


$( ".add_to_cart_button" ).click(function updateDiv() { 
	$( ".cart" ).load(window.location.href + " .cart" );
});