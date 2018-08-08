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


$( ".add_to_cart_button" ).click(function updateDiv() { 
	$( ".cart" ).load(window.location.href + " .cart" );
});

var open = $('.open'),
    a = $('ul').find('a');

console.log(a.hasClass('active'));

open.click(function(e){
    e.preventDefault();
    var $this = $(this),
        speed = 500;
    if($this.hasClass('active') === true) {
        $this.removeClass('active').next('.box').removeClass('box_active');
    } else if(a.hasClass('active') === false) {
        $this.addClass('active').next('.box').addClass('box_active');
    } else {
        a.removeClass('active').next('.box').removeClass('box_active');
        $this.addClass('active').next('.box').addClass('box_active');
    }
});
