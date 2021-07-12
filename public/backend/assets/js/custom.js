(function($){
    //Document

    // swal({
    //     title: "Success!",
    //     text: "Category Added Successful",
    //     icon: "success",
    //     button: "Aww yiss!",
    // });


    $(document).ready(function(){

        //Logout Now
        $(document).on('click','a.logout_btn_header',function(e){
            e.preventDefault();

            $('form#logout_form').submit();
        });

        //Show Category Add Modal

        $(document).on('click','a.add_category_btn',function(e){
            e.preventDefault();
            $('#cat_add_modal').modal('show');

        });

        //All Category

        function  allcate(){

            $.ajax({
                url : '/category-all',
                success : function(data){

                    $('tbody#allcate').html(data);

                }
            });
        }
        allcate();
        //add category

        $('form#cat_add_form').submit(function(e){
            e.preventDefault();

            $.ajax({

                url : '/category',
                method  : "POST",
                data : new FormData(this),
                contentType: false,
                processData : false,
                success : function(data){
                    $('form#cat_add_form')[0].reset();
                    $('#cat_add_modal').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Category Added Successful",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                    allcate();

                }
            });
        });

        //Cate Status Update

        $(document).on('click','a.status_btn',function(e){
            e.preventDefault();

            let status_id = $(this).attr('status_btn');
            $.ajax({

                url : '/category-status/'+status_id ,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Category Status Update Successful",
                        icon: "success",
                        button: "Done",
                    });
                    allcate();

                }

            });

        });

        //Category Edit

        $(document).on('click','a.edit_btn',function(e){
            e.preventDefault();

            let edit_id  = $(this).attr('edit_btn');
            $('#cat_edit_modal').modal('show');

            $.ajax({

                url : '/category-edit/'+edit_id,
                success : function(data){

                    $('form#cat_edit_form input[name="name"]').val(data.name);

                }

            });

            $('form#cat_edit_form').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url : '/category-edit/'+edit_id,
                    method  : "POST",
                    data : new FormData(this),
                    contentType: false,
                    processData : false,
                    success : function(data){
                        $('form#cat_edit_form')[0].reset();
                        $('#cat_edit_modal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "Category Update Successful",
                            icon: "success",
                            button: "Done!",
                        });
                        allcate();

                    }

                });

            });

        });

        //Cate Delete

        $(document).on('click','a.delete_btn',function(e){
            e.preventDefault();
            let delete_id  = $(this).attr('delete_btn');
            $.ajax({

                url : '/category-delete/'+delete_id,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Category Deleted Successful",
                        icon: "success",
                        button: "Done!",
                    });
                    allcate();

                }

            });

        });



        //////// Tag All

        //Show tag Add Modal

        $(document).on('click','a.add_tag_btn',function(e){
            e.preventDefault();
            $('#tag_add_modal').modal('show');

        });

        //All tag

        function  alltag(){

            $.ajax({
                url : '/tag-all',
                success : function(data){

                    $('tbody#alltag').html(data);

                }
            });
        }
        alltag();


        //add tag

        $('form#tag_add_form').submit(function(e){
            e.preventDefault();

            $.ajax({

                url : '/tag',
                method  : "POST",
                data : new FormData(this),
                contentType: false,
                processData : false,
                success : function(data){
                    $('form#tag_add_form')[0].reset();
                    $('#tag_add_modal').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Tag Added Successful",
                        icon: "success",
                        button: "Done",
                    });
                    alltag();

                }
            });
        });

        //tag Status Update

        $(document).on('click','a.status_btn',function(e){
            e.preventDefault();

            let status_id = $(this).attr('status_btn');
            $.ajax({

                url : '/tag-status/'+status_id ,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Tag Status Update Successful",
                        icon: "success",
                        button: "Done",
                    });
                    alltag();

                }

            });

        });

        //Tag Edit

        $(document).on('click','a.edit_btn',function(e){
            e.preventDefault();

            let edit_id  = $(this).attr('edit_btn');
            $('#tag_edit_modal').modal('show');

            $.ajax({

                url : '/tag-edit/'+edit_id,
                success : function(data){

                    $('form#tag_edit_form input[name="name"]').val(data.name);

                }

            });

            $('form#tag_edit_form').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url : '/tag-edit/'+edit_id,
                    method  : "POST",
                    data : new FormData(this),
                    contentType: false,
                    processData : false,
                    success : function(data){
                        $('form#tag_edit_form')[0].reset();
                        $('#tag_edit_modal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "Tag Update Successful",
                            icon: "success",
                            button: "Done!",
                        });
                        alltag();

                    }

                });

            });

        });

        //Cate Delete

        $(document).on('click','a.delete_btn',function(e){
            e.preventDefault();
            let delete_id  = $(this).attr('delete_btn');
            $.ajax({

                url : '/tag-delete/'+delete_id,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Tag Deleted Successful",
                        icon: "success",
                        button: "Done!",
                    });
                    alltag();

                }

            });

        });



        CKEDITOR.replace( 'content' );
        $('.selectdata').select2();









    });

})(jQuery)
