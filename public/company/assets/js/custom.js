(function(e){

    $(document).ready(function(){

        $(document).on('click','a.post_replay_btn',function(e){
            e.preventDefault();

            let c_id = $(this).attr('c_id');

            $('.replay_box_'+c_id).toggle();

        });




    });




})(jQuery)
