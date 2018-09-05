/* CAROUSEL */

$( '.carousel-inner').find('.carousel-item:first' ).addClass( 'active' );
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

/* CART UPDATE */

$( ".add_to_cart_button" ).click(function updateDiv() { 
	$( ".cart" ).load(window.location.href + " .cart" );
});


/* DROP DOWN CART */

var open = $('.open'),
    a = $('ul').find('a');

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


/* HAMBURGER MOBIEL */

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


/* SCROLL UP */ 

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
    



 /* GRID LIST TOGGLE */
    
    
$(document).ready(function () {
    $('#grid').click(function () {
        $(this).addClass('active');
        $('#list').removeClass('active');
        $('ul.products').fadeOut(300, function () {
            $(this).addClass('grid').removeClass('list').fadeIn(300);
        });
         $('.list_items').fadeOut(300);
         Cookies.remove('list', 'false');
    });

    $('#list').click(function () {
        $(this).addClass('active');
        $('#grid').removeClass('active');
        $('ul.products').fadeOut(300, function () {
        $(this).removeClass('grid').addClass('list').fadeIn(300);
        });
        $('.list_items').fadeIn(300);
        Cookies.set('list', 'false');        
    });

    $('#gridlist-toggle a').click(function (event) {
        event.preventDefault();
    });
  });



if (document.cookie.indexOf("list") >= false) {
   		$('ul.products').addClass('list').fadeIn(300);
   		$('.list_items').fadeIn(300);
}
else {
}



/* WIDGET MEER WEERGEVEN */


if( $('ul.woocommerce-widget-layered-nav-list li').length >= 3 ){ 
		$( "ul.woocommerce-widget-layered-nav-list li:nth-child(3)" ).nextAll().css({"display":"none"});
		$("ul.woocommerce-widget-layered-nav-list li:nth-child(3)").closest("ul").after( "<div class='more_btn'>Meer</div>" );
		$("ul.woocommerce-widget-layered-nav-list li:nth-child(3)").closest("ul").after( "<div class='less_btn'>Minder</div>" );
}
	
$('.more_btn').click(function () { 
	$( "ul.woocommerce-widget-layered-nav-list li:nth-child(3)" ).nextAll().slideToggle(300);
	$('.more_btn').css({"display":"none"}).fadeOut(300);
	$('.less_btn').delay(5).css({"display":"inline-block"}).fadeIn(300);
});

$('.less_btn').click(function () { 
	$( "ul.woocommerce-widget-layered-nav-list li:nth-child(3)" ).nextAll().slideToggle(300);
	$('.more_btn').delay(5).css({"display":"inline-block"}).fadeIn(300);
	$('.less_btn').css({"display":"none"}).fadeOut(300);
});