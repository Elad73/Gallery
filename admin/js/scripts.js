/**
 * Created by Elad on 01/12/2017.
 */
$(document).ready(function() {

    var user_href;
    var user_href_splitted;
    var user_id;
    var image_href;
    var image_href_splitted;
    var image_src;

//enabling the button upon click and getting the userId
$(".modal_thumbnails").click(function () {

    $("#set_user_image").prop('disabled', false);

    $(this).addClass('selected');
    //extracting the userId from the delete button on the "edit_user" page
    user_href = $("#user-id").prop('href');
    user_href_splitted = user_href.split("=");
    user_id = user_href_splitted[user_href_splitted.length -1];

    image_src = $(this).prop("src");
    image_href_splitted = image_href.split("/");
    image_name = image_href_splitted[image_href_splitted.length -1];

});


$("#set_user_image").click(function () {

    $.ajax({

        url: "includes/ajax_code.php",
        data:{image_src: image_src, user_id: user_id},
        type: "POST",
        success:function(data){

            //if there is no error we can continue
            if(!data.error) {

                alert(data);

            }

        }


    })




});


    /* tinymce.init({ selector:'textarea' });*/

});












