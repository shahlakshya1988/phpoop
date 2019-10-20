$(document).ready(function(){
   // alert("Loaded");
});
$(document).on("click",".modal_thumbnails",function(){

    $("#set_user_image").prop("disabled",false);
    //alert($("a#user_id").data("user-id"));
    var user_id = $("a#user_id").data("user-id");
});