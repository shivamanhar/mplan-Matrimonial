$(document).ready(function(){
$("#country").change(
                 function(){
                    var country = $("#country").val();
                    var link = $("#url").val()+"add_access/state";                    
                     $.post(link, {country: country}, function(data){
                        $("#state").html(data);
                    });
                   
                    }
                )
                }
);
$(document).ready(function(){
$("#state").change(
                 function(){
                    var city = $("#state").val();
                    var link = $("#url").val()+"add_access/cities";                    
                     $.post(link, {city: city}, function(data){
                        $("#city").html(data);
                    });
                   
                    }
                )
                }
);