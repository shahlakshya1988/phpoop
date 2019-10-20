$(document).ready(function(){
   // alert("Loaded");
});
$(document).on("click",".modal_thumbnails",function(){

    $("#set_user_image").prop("disabled",false);
    //alert($("a#user_id").data("user-id"));
    var user_id = $("a#user_id").data("user-id");

    var image_href = $(this).prop("src");
    var image_href_split = image_href.split("/");
    var image_name = image_href_split[image_href_split.length - 1];
    alert(image_name);
});