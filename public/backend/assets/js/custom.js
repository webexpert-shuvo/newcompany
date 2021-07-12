(function($){
    //Document
    $(document).ready(function(){

        //Logout Now
        $(document).on('click','a.logout_btn_header',function(e){
            e.preventDefault();

            $('form#logout_form').submit();



        });




    });





})(jQuery)
