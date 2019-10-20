$(document).ready(function(){
   // alert("Loaded");
});
var image_name='',user_id='',photo_id = '';
$(document).on("click",".modal_thumbnails",function(){

    $("#set_user_image").prop("disabled",false);
    $(this).addClass("selected");
    //alert($("a#user_id").data("user-id"));
    user_id = $("a#user_id").data("user-id");

    var image_href = $(this).prop("src");
    var image_href_split = image_href.split("/");
    image_name = image_href_split[image_href_split.length - 1];
    photo_id=  $(this).data("photo-id");
   //alert(photo_id);

   $.ajax({
       url:"includes/ajax_code.php",
       type:"POST",
       data:{photo_id : photo_id},
       success:function(data){
            //alert("Hello");
            //alert(data);
            //data = JSON.parse(data);
            //console.log(data);
            $("#modal_sidebar").html(data);
       }
   });
    
});

$(document).on("click","#set_user_image",function(){
    // alert("Clicked");
    // alert(user_id+" "+image_name);
    $.ajax({
        url:"includes/ajax_code.php",
        data:{image_name:image_name,user_id:user_id},
        type:"POST",
        success:function(data){
                    //alert(data);
                    if(!data.error){
                       // alert(image_name);
                       // location.reload(true);
                       $(".user_image_box a img").prop("src",data);
                    }
                }

    });

});