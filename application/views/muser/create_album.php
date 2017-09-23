<?php
$album_name = array(
                 'type'=>'text',
                 'name'=>'album_name',
                 'value'=>set_value('album_name'),
                 'required' =>'required',
                    );

?>
<div class="container">   
                 <div class="row">
                   <table class="table success tb_align mprofile_tb" style="margin-bottom:0px" >
                                  <!-- album name add-->
                                  <form action="<?php echo base_url();?>muser/new_album" method="post">
                                  <tr> <th colspan="2"> Create Album </th> </tr>
                                  <tr> <td class="col-md-3 mh">Enter Album Name </td> <td class="col-md-8"> <?php echo form_input($album_name);?></td></tr>
                                  <tr> <td class="col-md-3 mh"></td> <td class="col-md-8"><input type="submit" class="btn btn-warning" value="Create Album"></td></tr>
                                  </form>
                                  <!-- end album name -->
                                  
                                  <tr> <th colspan="2"> Album List</th> </tr>
                                  <tr> <td class="col-md-3 mh">Select Album </td> <td class="col-md-8"> <?php if(isset($father_name)){echo ucwords($father_name);} else {echo "NULL";}?></td></tr>
                                  <tr> <td class="col-md-3 mh"></td> <td class="col-md-8"><input type="submit" class="btn btn-warning" value="Go"></td></tr>
                                  
                   </table>
                 </div>
  </div>