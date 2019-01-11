"use strict";

$(document).ready(function(){
	$("#services-carousel").owlCarousel({
		loop:true,
	    margin:0,
	    items: 1,
	    responsive:{
	        0:{
	            nav:false
	        },
	        1200:{
	            nav:true
	        },
    	}
	});


	$("#quotes-carousel").owlCarousel({
		loop:true,
	    margin:0,
	    nav:false,
	    items: 1
	});

	var $hamburger = $(".hamburger");
  	$hamburger.on("click", function(e) {
    $hamburger.toggleClass("is-active");
    // Do something else, like open/close menu
  	});

  	$('.menu').click(function(){
  		$('.site-nav, .socials').toggleClass('active-menu');
  		$('.responsive-menu').toggleClass('burger-bg');
  	})

});