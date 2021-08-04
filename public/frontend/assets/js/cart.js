$(document).ready(function() {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$("#updatecart").on('click',function(){
		var end_val=$('#val_i').val();
		var qty=[];
		var id=[];

		for(var i=0;i<end_val;i++){
			qty[i]=$('#qty'+(i+1)).val();
			id[i]=$('#id'+(i+1)).val();
		}
		
		$.ajax({
			type: "post",
			url: '/cart/update',
			data: { 'id': id, 'qty': qty},
			success: function () {
			   window.location.reload();
			},
			error: function (data) {
				alert('Error');
				console.log(data);
			}
		});
	})
}) 