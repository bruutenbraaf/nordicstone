jQuery( '.carousel-inner').find('.carousel-item:first' ).addClass( 'active' );
$('li:has(> ul)').addClass('has_sub');

$('.nav-tabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})



$('#uitgelichtCarousel').carousel({
  interval: 10000
})




if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 	$('.carousel-ui .carousel-item').each(function(){
	    var next = $(this).next();
	    if (!next.length) {
	    next = $(this).siblings(':first');
	    }
	    next.children(':first-child').clone().appendTo($(this));
	    
	    for (var i=0;i<0;i++) {
	        next=next.next();
	        if (!next.length) {
	        	next = $(this).siblings(':first');
	      	}
	        
	        next.children(':first-child').clone().appendTo($(this));
	      }
	});

}else
{
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
}


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


var hamburger = $('.hamburger')
	cheese = $('.cheese div')
	
hamburger.click(function() {
  cheese.toggleClass('activated');
  $( ".nav .row .categorie ul" ).slideToggle(300);
  if (cheese.hasClass('activated') === true) {
	  $( ".cheese div:first-child" ).addClass('hamburgerfirst');
	  $( ".cheese div:nth-child(2)" ).addClass('hamburgermiddle');
	  $( ".cheese div:last-child" ).addClass('hamburgerlast');
  } else {
  	  $( ".cheese div:first-child" ).removeClass('hamburgerfirst');
	  $( ".cheese div:nth-child(2)" ).removeClass('hamburgermiddle');
	  $( ".cheese div:last-child" ).removeClass('hamburgerlast');      
  }
});

$(window).scroll(function () {
    var $this = $(this),
        $up = $('.up');
    if ($this.scrollTop() > 200) {
       $up.addClass('up_activated');
    } else {
       $up.removeClass('up_activated');
    }
});

 $('.up').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
 
$(document).ready(function() {
  $("#carouselcontrols").swiperight(function() {
    $(this).carousel('prev');
  });
  $("#carouselcontrols").swipeleft(function() {
    $(this).carousel('next');
  });
});
