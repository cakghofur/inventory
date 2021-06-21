$(document).ready(function(){

    // login & register js
    $('#customCheck1').click(function(){
        if($(this).is(':checked')){
            $('#password').attr('type','text');
        }else{
            $('#password').attr('type','password');

        }
    });

});