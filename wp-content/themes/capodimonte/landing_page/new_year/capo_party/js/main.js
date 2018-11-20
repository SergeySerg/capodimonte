$(function () {
    $('#submit-callback-2').click(function(e){
        //alert('22');
        e.preventDefault();        
        //e.preventDefault();
        var data = $('form#callback').serialize();
        var lang =  $("input[name='lang']").val();
        var token = $("input[name='csrf-token']").val(); 
        var locationData = window.location.href.split('#');     
    
        $.ajax({
            url: '/' + lang + '/callback',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            //processData: false,
            //contentType: false,
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    //alert('OK'); 
                    if(!$.urlParam('status')){
                        window.location.replace(locationData[0] + '?status=pumpkin');

                    }else{
                        window.location.replace(window.location.href);   
                    }
                    //$('#exampleModal3').modal('toggle');
                    //swal(trans['base.success'], "", "success");
                    //jQuery("#callback-order").trigger("reset");
                    //$("#submit-send").attr('disabled', false);
                }
                else {
                    swal(trans['base.error'], data.message, "error");
                   // $("#submit-send").attr('disabled', false);
                }
            },
            error: function (data) {
                swal(trans['base.error']);
                //$("#submit-send").attr('disabled', false);
            }

        });  
    }) 
    /*Show popup after callback*/
    if($.urlParam('status') == 'pumpkin'){
       $('#exampleModal3').modal('toggle');

    }  
})