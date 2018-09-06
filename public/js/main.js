$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.button').on('mousedown', function(e){
        e.preventDefault();
        $(this).find('.button').css('boxShadow', '0px 0px 20px -3px black');
    });

    $('.button').on('mouseup', function (e) {
        e.preventDefault();
        $(this).find('.button').css('boxShadow', '');
    });
});

function c(value){
    var count = $('.enter').data('count') || 0;
    event.preventDefault();
    console.log(count);
    if (!isNaN(value) || value == '.'){
        if($("input[name = 'stack0'").val() == '0')
            $("input[name = 'stack0']").val(value);
        else{
            if(count != 0 && $("input[name = 'stack0'")[0].selectionStart == 0){
                $("input[name = 'stack0']").val(value);
            }
            else {
                $("input[name = 'stack0']").val($("input[name = 'stack0']").val() + value);
            }
        }
        hasMoreThanOneDecimal(value);
    }

    switch(value){
        case 'AC':
            $("input[name = 'stack0']").val('0');
            $("input[name = 'stack1']").val('0');
            $("input[name = 'stack2']").val('0');
            $("input[name = 'stack3']").val('0');
            break;
        case 'C':
            if ($("input[name = 'stack0']").val().length == 0)
                $("input[name = 'stack0']").val('0');
            else
                $("input[name = 'stack0']").val($("input[name = 'stack0']").val().slice(0, -1));
            break;
        case 'POW':
            $("input[name = 'stack0']").val($("input[name = 'stack0']").val() * $("input[name = 'stack0']").val());
            break;
        case 'enter':
            if(count == 0)
                $("input[name = 'stack1']").val($("input[name = 'stack0']").val());
            else if(count == 1){
                $("input[name = 'stack2']").val($("input[name = 'stack1']").val());
                $("input[name = 'stack1']").val($("input[name = 'stack0']").val());
            }
            else{
                $("input[name = 'stack3']").val($("input[name = 'stack2']").val());
                $("input[name = 'stack2']").val($("input[name = 'stack1']").val());
                $("input[name = 'stack1']").val($("input[name = 'stack0']").val());
            }
            $('.enter').data('count', ++count);
            $("input[name = 'stack0']").select();
            $('#count').val(count);
            var inputs = $('#calculatorForm').serialize();
            console.log(inputs);
            $.ajax({
                type: 'POST',
                url: $('.enter').data('url'),
                data: inputs,
                success: function(response){
                    console.log(response);
                },

                error: function(response){
                    console.log(response);
                }
            });
            break;
        default:
            console.log(response);
            // $.ajax({
            //     type: 'POST',
            //     url: $('.enter').data('result'),
            //     data: {operator: value},
            //     success: function (response) {
            //         // console.log(response);
            //     },

            //     error: function (response) {
            //         // console.log(response);
            //     }
            // });
    }
}

function hasMoreThanOneDecimal(value){
    if(value == '.'){
        if ($("input[name = 'stack0']").val().split(".").length - 1 != 1) {
            console.log($("input[name = 'stack0']").val().slice(0, -1));
            $("input[name = 'stack0']").val($("input[name = 'stack0']").val().slice(0, -1));
        }
    }
}
