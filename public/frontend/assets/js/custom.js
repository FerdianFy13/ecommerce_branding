(function($) {

	"use strict";
	
	/*logout */
	var logout_form=document.getElementById('logout-form');
	$('#logout-btn').on('click',function(e){
	  e.preventDefault();
	  logout_form.submit();
	});

	/*logout on dashboard*/
	$('#logout-btn2').on('click',function(e){
	  e.preventDefault();
	  logout_form.submit();
	});

	//client carousel
	$('.carousel-brand').owlCarousel({
		center: true,
		loop: true,
		items:1,
		margin: 30,
		stagePadding: 0,
		nav: false,
		autoplay: true,
		navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
		responsive:{
			0:{
				items: 1
			},
			600:{
				items: 3
			},
			1000:{
				items: 5
			}
		}
	});
	
})(jQuery);	