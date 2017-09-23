<?php
if(isset($matches))
{
    foreach($matches->result() as $row)
    {
        $diet = $row->pdiet;
        $smoke = $row->psmoke;
        $drink = $row->pdrink;
    }
}
?>
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-7">
            <form action="<?php echo base_url();?>" method="post" >
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Life Style</th></tr>
                
                <tr>
                    <td class="col-md-2"> Diet </td>
                    <td class="col-md-4">
                        <?php if(isset($diet)){echo ucfirst($diet);}else{echo "Not Defined";}?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Smoke </td>
                    <td class="col-md-4">
                        <?php if(isset($smoke)){echo ucfirst($smoke);}else{echo "Not Defined";}?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Drink</td>
                    <td class="col-md-4">
                       <?php if(isset($drink)){echo ucfirst($drink);}else{echo "Not Defined";}?>
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


<input type="hidden" name="pdiet" value="<?php echo $this->muse->display_value('partner_lifestyle', array('user_id'=>$this->tank_auth->get_user_id()), 'pdiet');?>">
<input type="hidden" name="psmoke" value="<?php echo $this->muse->display_value('partner_lifestyle', array('user_id'=>$this->tank_auth->get_user_id()), 'psmoke');?>">
<input type="hidden" name="pdrink" value="<?php echo $this->muse->display_value('partner_lifestyle', array('user_id'=> $this->tank_auth->get_user_id()), 'pdrink');?>">
<!-- Modal HTML block b-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Lifestyle</h4>
                </div>
               <form action="<?php echo base_url();?>partner_profile/update_plifestyle" method="post"  >
                <div class="modal-body">
                <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Life Style</th></tr>
                <?php
                echo form_error('diet');
                echo form_error('smoke');
                echo form_error('drink');
                
                ?>
                <tr>
                    <td class="col-md-2"> Diet </td>
                    <td class="col-md-4">
                        <input type="radio" name="diet" value="veg" title="diet" required> Veg
                        <input type="radio" name="diet" value="non veg" title="diet" required> Non-Veg
                        <input type="radio" name="diet" value="jain" title="diet" required> Jain
                        <input type="radio" name="diet" value="vegan" title="diet" required> Vegan
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
                
            </table>
        
		
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div> <!-- End of model HTML block b-->
    
    <!-- for change value -->
<script type="text/javascript">
     $(document).ready(function(){
	  $pdiet 		= $('input[name=pdiet]').val();
	  $psmoke 		= $('input[name=psmoke]').val();
	  $pdrink 		= $('input[name=pdrink]').val();
	  
	  
	  $('input:radio[name=diet][value='+$pdiet+']').attr("checked", "checked");
	  $('input:radio[name=smoke][value='+$psmoke+']').attr("checked", "checked");
	  $('input:radio[name=drink][value='+$pdrink+']').attr("checked", "checked");
	  
	  });
</script>