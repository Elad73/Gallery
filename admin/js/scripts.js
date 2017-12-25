/**
 * Created by Elad on 01/12/2017.
 */
$(document).ready(function() {

    var user_href;
    var user_href_splitted;
    var user_id;
    var image_href_splitted;
    var image_src;
    var thumbnail_name;
    var thumbnail_id;

//enabling the button upon click and getting the userId
$(".modal_thumbnails").click(function () {

    $("#set_user_image").prop('disabled', false);

    $(this).addClass('selected');

    try {
        //extracting the userId from the delete button on the "edit_user" page
        user_href = $("#user-id").prop('href');
        user_href_splitted = user_href.split("=");
        user_id = user_href_splitted[user_href_splitted.length - 1];
    }catch (err) {
        //this is in case there is no user-id, which means on the add user page
    }



    image_src = $(this).prop("src");
    image_href_splitted = image_src.split("/");
    thumbnail_name = image_href_splitted[image_href_splitted.length -1];
    thumbnail_id = $(this).attr("data");

    $("#user_thumbnail").attr('src',image_src);
    $("#user_thumbnail_input").attr('value',thumbnail_name);

    $.ajax({

        url: "includes/ajax_code.php",
        data: {thumbnail_id: thumbnail_id},
        type: "POST",
        success:function(data) {
            if(!data.error) {
                $("#modal_sidebar").html(data);
            }
        }
    });

});


$("#set_user_image").click(function () {

    $.ajax({

        url: "includes/ajax_code.php",
        data:{thumbnail_name: thumbnail_name, user_id: user_id},
        type: "POST",
        success:function(data){

            //if there is no error we can continue
            if(!data.error) {

                $(".user_image_box a img").prop('src', data);

            }

        }

    })


});


    /* tinymce.init({ selector:'textarea' });*/

/********************************Edit photo sidebar**********************************/
$(".info-box-header").click(function() {

    $(".inside").slideToggle("slow");

    $("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon");

});


/************************* Delete Function *********************************************/

$(".delete_link").click(function() {

    return confirm("Are you sure you want to Delete?");


});

});












