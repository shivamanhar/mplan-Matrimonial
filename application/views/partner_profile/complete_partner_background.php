<?php
$partner_key = array(
		     'partner_background.user_id' => $this->tank_auth->get_user_id(),
		     );

if(isset($matches))
{
    foreach($matches->result() as $row)
    {
        $religion = $row->religion_name;
        $community = $row->community_name;
        $sub_community = $row->psub_community;
    }
}
?>

<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
	  <center> <h2> Tell us what you would like in a partner </h2> </center>
            <br/>
            <form action="" method="post">
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Background</th></tr>
               
                <tr>
                    <td class="col-md-2"> Religion</td>
                    <td class="col-md-4">
                         <?php if(isset($religion)){echo ucfirst($religion);}else{echo "Not Defined";}?>
                    </td>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Community</td>
                    <td class="col-md-4" >
                        <?php if(isset($community)){echo ucfirst($community);}else{echo "Not Defined";}?>
                    </td>
                </tr>
		
                <tr><td class="col-md-2"> Sub Community</td>
                    <td class="col-md-4">
                        <?php if(isset($sub_community)){echo ucfirst($sub_community);}else{echo "Not Defined";}?>
                    </td>
                </tr>
		<tr> <th colspan="2" > Life Style</th></tr>
                
                <tr>
                    <td class="col-md-2"> Diet </td>
                    <td class="col-md-4">
                        <input type="radio" name="diet" value="veg" title="Veg"  > Veg
                        <input type="radio" name="diet" value="non veg" title="Non-Veg" > Non-Veg
                        <input type="radio" name="diet" value="jain" title="Jain" > Jain
                        <input type="radio" name="diet" value="vegan" title="Vegan" > Vegan
                    </td>
                </tr>
                <tr><td class="col-md-2"> Smoke </td>
                    <td class="col-md-4">
                        <input type="radio" name="smoke" value="never smoke" checked> Never Smoke
                        <input type="radio" name="smoke" value="smoke">  Smoke
                    </td>
                </tr>
                <tr><td class="col-md-2"> Drink</td>
                    <td class="col-md-4">
                        <input type="radio" name="drink" value="never drinks" checked> Never Drinks
                        <input type="radio" name="drink" value="occasionally"> Drinks Occasionally
                       <input type="radio" name="drink" value="drinks"> Drinks
                    </td>
                </tr>
                <tr>
                    <td style="border:none;padding:0px;" colspan="2">
					<center>
						<a href="#" class="btn btn-primary">Edit</a>
					</center>
                    </td>
                </tr>
		<tr>
		    <td style="border:none;" colspan="2">
		    </td>
		</tr>
            </table>
            </form>
        </div>
     </div>
</div>

<input type="hidden" name="religion_id" value="<?php echo $this->muse->partner_background($partner_key, 'preligion_id');?>">
<input type="hidden" name="community_id" value="<?php echo $this->muse->partner_background($partner_key, 'pcommunity_id');?>">

<input type="hidden" name="pdiet" value="<?php echo $this->muse->display_value('partner_lifestyle', array('user_id'=>$this->tank_auth->get_user_id()), 'pdiet');?>">
<input type="hidden" name="psmoke" value="<?php echo $this->muse->display_value('partner_lifestyle', array('user_id'=>$this->tank_auth->get_user_id()), 'psmoke');?>">
<input type="hidden" name="pdrink" value="<?php echo $this->muse->display_value('partner_lifestyle', array('user_id'=> $this->tank_auth->get_user_id()), 'pdrink');?>">

<!-- Modal HTML block b-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Background Details</h4>
                </div>
              
	    <form action="<?php echo base_url();?>partner_profile/update_pbackground" method="post" >
                <div class="modal-body">
                <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Background</th></tr>
                  <?php
                echo form_error('religion');
                echo form_error('community');
                
                ?>
		<?php
                echo form_error('diet');
                echo form_error('smoke');
                echo form_error('drink');
                ?>
                <tr>
                    <td class="col-md-2"> Religion</td>
                    <td class="col-md-4">
                         <?php $this->muse->get_religion();?>
                    </td>
                    </td>
                </tr>
                <tr>
		    <td class="col-md-2"> Community</td>
                    <td class="col-md-4" id="community">
			 <?php $this->muse->get_community($this->muse->display_value('user_background', array('user_id' => $this->tank_auth->get_user_id()), 'religion_id'));?>
                    </td>
                </tr>
                
		<tr>
		    <td class="col-md-2"> Sub Community</td>
                    <td class="col-md-4" >
			 <input type="text" name="sub_community" value="<?php echo $this->muse->partner_background($partner_key, 'psub_community'); ?>" style="width:95%">
                    </td>
                </tr>
		<tr> <th colspan="2" > Life Style</th></tr>
                
                <tr>
                    <td class="col-md-2"> Diet </td>
                    <td class="col-md-4">
                        <input type="radio" name="diet" value="veg" title="Veg"  > Veg
                        <input type="radio" name="diet" value="non veg" title="Non-Veg" > Non-Veg
                        <input type="radio" name="diet" value="jain" title="Jain" > Jain
                        <input type="radio" name="diet" value="vegan" title="Vegan" > Vegan
                    </td>
                </tr>
                <tr><td class="col-md-2"> Smoke </td>
                    <td class="col-md-4">
                        <input type="radio" name="smoke" value="never smoke" checked> Never Smoke
                        <input type="radio" name="smoke" value="smoke">  Smoke
                    </td>
                </tr>
                <tr><td class="col-md-2"> Drink</td>
                    <td class="col-md-4">
                        <input type="radio" name="drink" value="never drinks" checked> Never Drinks
                        <input type="radio" name="drink" value="occasionally"> Drinks Occasionally
                       <input type="radio" name="drink" value="drinks"> Drinks
                    </td>
                </tr>
             
    		<tr>
		    <td style="border:none;" colspan="2"></td>
		</tr>
            </table>
		
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- End of model HTML block b-->
    
    <!-- for change value -->
<script type="text/javascript">
     $(document).ready(function(){
	  $religion_id		= $('input[name=religion_id]').val();
	  $community_id 	= $('input[name=community_id]').val();
	  $work_with		= $('input[name=work_with]').val();
	  $work_as 		= $('input[name=work_as]').val();
	  $annual_income 	= $('input[name=annual_income]').val();
	  $pdiet 		= $('input[name=pdiet]').val();
	  $psmoke 		= $('input[name=psmoke]').val();
	  $pdrink 		= $('input[name=pdrink]').val();
	  
	  $('select[name=religion]').val($religion_id);
	  $('select[name=community]').val($community_id);
	  $('select[name=work_with]').val($work_with);
	  $('select[name=work_as]').val($work_as);
	  $('select[name=annual_income]').val($annual_income);
	  $('input:radio[name=diet][value='+$pdiet+']').attr("checked", "checked");
	  $('input:radio[name=smoke][value='+$psmoke+']').attr("checked", "checked");
	  $('input:radio[name=drink][value='+$pdrink+']').attr("checked", "checked");
	  
	  });
</script>

