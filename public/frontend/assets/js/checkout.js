$(document).ready(function($) {
    "use strict";
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // check shipping address same checkbox checked
    $('#same-address').on('click',function(){
      if($(this).prop("checked") == true){
        $('#shipping-form').removeClass('d-none');
      }
      else if($(this).prop("checked") == false){
        $('#shipping-form').addClass('d-none');
      }
    })
    // login clicked
    $('#click_to_login').on('click',function(event){
      event.preventDefault();
      $('#checkout_login').toggleClass('d-none');
    })
})     