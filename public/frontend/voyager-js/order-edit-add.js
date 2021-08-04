    "use strict";
    var params = {};
    var $file;

    //hide the ordered items
    var order_items=$('#ordered_items');
    order_items.find('.form-control').addClass('d-none');
    //hide the conditions
    var conditions=$('#conditions');
    conditions.find('.form-control').addClass('d-none');


    function deleteHandler(tag, isMulti) {
        return function() {
        $file = $(this).siblings(tag);

        params = {
            slug:   '{{ $dataType->slug }}',
            filename:  $file.data('file-name'),
            id:     $file.data('id'),
            field:  $file.parent().data('field-name'),
            multi: isMulti,
            _token: '{{ csrf_token() }}'
        }

        $('.confirm_delete_name').text(params.filename);
        $('#confirm_delete_modal').modal('show');
        };
    }

    $('document').ready(function () {
        $('.toggleswitch').bootstrapToggle();

        //Init datepicker for date fields if data-datepicker attribute defined
        //or if browser does not handle date inputs
        $('.form-group input[type=date]').each(function (idx, elt) {
            if (elt.hasAttribute('data-datepicker')) {
                elt.type = 'text';
                $(elt).datetimepicker($(elt).data('datepicker'));
            } else if (elt.type != 'date') {
                elt.type = 'text';
                $(elt).datetimepicker({
                    format: 'L',
                    extraFormats: [ 'YYYY-MM-DD' ]
                }).datetimepicker($(elt).data('datepicker'));
            }
        });

        var isModelTranslatable=$('#isModelTranslatable').val();
        if (isModelTranslatable==1){
            $('.side-body').multilingual({"editing": true});
        }
            
        $('.side-body input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });

        $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
        $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
        $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
        $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

        $('#confirm_delete').on('click', function(){
            $.post($('#route_name').val(), params, function (response) {
                if ( response
                    && response.data
                    && response.data.status
                    && response.data.status == 200 ) {

                    toastr.success(response.data.message);
                    $file.parent().fadeOut(300, function() { $(this).remove(); })
                } else {
                    toastr.error("Error removing file.");
                }
            });

            $('#confirm_delete_modal').modal('hide');
        });
        $('[data-toggle="tooltip"]').tooltip();

        
        //product select with select2
        $('#select_product').select2({
            placeholder: 'Select Product',
            allowClear: true,
            minimumInputLength: 3,
            ajax: {
                url: '/orders/get-product',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        }); 

        $('#select_product').on('change', function (e) {
            var val=$('#select_product').val();
            window.livewire.emit('selectProduct', val);
            $('#select_product').select2('val', '');
        });

        $('#add_product').on('click',function(){
            $('#select_product').html('');
        })
        
    });
	
	