$(document).ready(function(){
    

    $('#showPass').click(function(){
        if($(this).is(':checked')){
            $('#password-login').attr('type','text');
        }else{
            $('#password-login').attr('type','password');

        }
    });

});
