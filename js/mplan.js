//this method for religion and community traking */

$(document).ready(function(){
   
   $("#religion").change(function(){
    var religion = $("#religion").val();
    var url = $("#url").val()+"global_fun/community";
        $.post(url, {religion:religion}, function(data) {
            $("#community").html(data);
            });
    })
});