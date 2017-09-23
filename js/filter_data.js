function filter_data(data)
{
        var gender = $('#gender').val();
        
        var martial_status = $('#martial_status').val();
        
        var smoke = $('input[name=smoke]:checked').val();
        
        var drink = $('input[name=drink]:checked').val();
        
        var diet = $('input[name=diet]:checked').val();
        
        var disability = $('input[name=disability]:checked').val();
        
        var hiv_positive = $('input[name=hiv_positive]:checked').val();
        
        var heightto = $('select[name=heightto]').val();
        
        var country = $('select[name=country]').val();
        
        var state = $('select[name=state]').val();
        
        var city = $('select[name=city]').val();
        
        var mtongue = $('select[name=mtongue]').val();
        
        var profile_for = $('select[name=profile_for]').val();
        
        var edu_level = $('select[name=edu_level]').val();
        
        var edu_field = $('select[name=edu_field]').val();
        
        var work_with = $('select[name=work_with]').val();
        
        var work_as = $('select[name=work_as]').val();
        
        var religion = $('select[name=religion]').val();
        
        
        
        var link = $('#url').val()+"muser/filter_data?martial_status="+martial_status+"&religion="+religion+"&smoke="+smoke+"&diet="+diet+"&drink="+drink+"&heightto="+heightto+"&mtongue="+mtongue+"&edu_level="+edu_level+"&edu_field="+edu_field+"&work_with="+work_with+"&work_as="+work_as+"&country="+country+"&state="+state+"&city="+city;
        $.post($('#url').val()+"muser/filter_data",{
               gender:gender,smoke:smoke,
               martial_status:martial_status,
               drink:drink,
               diet:diet,
               disability:disability,
               hiv_positive:hiv_positive,
               heightto:heightto,
               country:country,
               state:state,
               city:city,
               mtongue:mtongue,
               profile_for:profile_for,
               edu_level:edu_level,
               edu_field:edu_field,
               work_with:work_with,
               work_as:work_as,
               religion:religion
               },function(data){
                $('#matches_change').html(data);
                
                });
}
/*
$(document).ready(function(){

        $('.pagination li').on("click", 'a',function(){
                var urlvalue = $(this).attr("href");
                var url = $('#url').val()+"muser/matches/";
                var page_segment = urlvalue.replace(url, '', true);
              var gender = $('#gender').val();
        
        var martial_status = $('#martial_status').val();
        
        var smoke = $('input[name=smoke]:checked').val();
        
        var drink = $('input[name=drink]:checked').val();
        
        var diet = $('input[name=diet]:checked').val();
        
        var disability = $('input[name=disability]:checked').val();
        
        var hiv_positive = $('input[name=hiv_positive]:checked').val();
        
        var heightto = $('select[name=heightto]').val();
        
        var country = $('select[name=country]').val();
        
        var state = $('select[name=state]').val();
        
        var city = $('select[name=city]').val();
        
        var mtongue = $('select[name=mtongue]').val();
        
        var profile_for = $('select[name=profile_for]').val();
        
        var edu_level = $('select[name=edu_level]').val();
        
        var edu_field = $('select[name=edu_field]').val();
        
        var work_with = $('select[name=work_with]').val();
        
        var work_as = $('select[name=work_as]').val();
        
        var religion = $('select[name=religion]').val();
      //  var link = $('#url').val()+"muser/t2?martial_status="+martial_status+"&religion="+religion+"&smoke="+smoke+"&diet="+diet+"&drink="+drink+"&heightto="+heightto+"&mtongue="+mtongue+"&edu_level="+edu_level+"&edu_field="+edu_field+"&work_with="+work_with+"&work_as="+work_as+"&country="+country+"&state="+state+"&city="+city;
        $.post($('#url').val()+"muser/filter_data1",{
                page_segment:page_segment,
               gender:gender,
               smoke:smoke,
               martial_status:martial_status,
               drink:drink,
               diet:diet,
               disability:disability,
               hiv_positive:hiv_positive,
               heightto:heightto,
               country:country,
               state:state,
               city:city,
               mtongue:mtongue,
               profile_for:profile_for,
               edu_level:edu_level,
               edu_field:edu_field,
               work_with:work_with,
               work_as:work_as,
               religion:religion,
               urlvalue:urlvalue 
               },function(data){
             $('#matches_change').html(data);
            //  console.log(data);
               // alert(data);
                
                });
            return false;   
        });
        
                //alert($('li a:first').attr('href'));
});

*/
/*
function ms_pagi()
{
       
       var martial_status = $('input[name=martial_status]:checked').val();
        
        var smoke = $('input[name=smoke]:checked').val();
        
        var drink = $('input[name=drink]:checked').val();
        
        var diet = $('input[name=diet]:checked').val();
        
        var heightto = $('select[name=heightto]').val();
        
        var country = $('select[name=country]').val();
        
        var state = $('select[name=state]').val();
        
        var city = $('select[name=city]').val();
        
        var mtongue = $('select[name=mtongue]').val();
        
        var profile_for = $('select[name=profile_for]').val();
        
        var edu_level = $('select[name=edu_level]').val();
        
        var edu_field = $('select[name=edu_field]').val();
        
        var work_with = $('select[name=work_with]').val();
        
        var work_as = $('select[name=work_as]').val();
        
        var religion = $('select[name=religion]').val();
        
       var segment_url = window.location.href;
       var link = $('#url').val()+"muser/filter_data";
       $.post(link, {segment_url:segment_url,
              smoke:smoke,
               martial_status:martial_status,
               drink:drink,
               diet:diet,
               heightto:heightto,
               country:country,
               state:state,
               city:city,
               mtongue:mtongue,
               profile_for:profile_for,
               edu_level:edu_level,
               edu_field:edu_field,
               work_with:work_with,
               work_as:work_as,
               religion:religion
              }, function(data)
              {
                 $('#matches_change').html(data);
              }              
              );
       
     // alert(myurl.substring(myurl.lastIndexOf("#"), 4));
       // alert("c"+$('#pagi>a').attr('href =#'));
}*/
function mstatus(data)
{
        var martial_status = $('#martial_status').val();
        alert(martial_status);
       // alert(data);
}