$(document).ready(function(){
	"use strict";
	$(".my-rating").starRating({
		starSize: 25,
		disableAfterRate: false,
		onHover: function(currentIndex, currentRating, $el){
			$('.live-rating').text(currentIndex);
			$('#rating').val(currentRating);
		},
		onLeave: function(currentIndex, currentRating, $el){
			$('.live-rating').text(currentRating);
			$('#rating').val(currentRating);
		}
	});
})