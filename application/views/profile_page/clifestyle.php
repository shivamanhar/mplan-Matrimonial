
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-7">
            <form action="<?php echo base_url();?>user_profile/insert_lifestyle" method="post" class="ms_style">
            <table class="table success tb_align" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Life Style</th></tr>
                <?php
                echo form_error('diet');
                echo form_error('smoke');
                echo form_error('drink');
                
                ?>
                <tr>
                    <td class="col-md-2"> Diet </td>
                    <td class="col-md-4">
                     <?php echo ucwords($this->muse->display_value('user_lifestyle', array('user_id' =>$this->tank_auth->get_user_id()), 'diet')) ?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Smoke </td>
                    <td class="col-md-4">
                     <?php echo ucwords($this->muse->display_value('user_lifestyle', array('user_id' => $this->tank_auth->get_user_id()), 'smoke')) ?>  
                    </td>
                </tr>
                <tr><td class="col-md-2"> Drink</td>
                    <td class="col-md-4">
                      <?php echo ucwords($this->muse->display_value('user_lifestyle', array('user_id' =>$this->tank_auth->get_user_id()), 'drink')) ?>
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
                    <td style="border:none;" colspan="2"></td>
                </tr>
            </table>
            </form>
        </div>
     </div>
</div>
<input type="hidden" name="udiet" value="<?php echo $this->muse->display_value('user_lifestyle', array('user_id' =>$this->tank_auth->get_user_id()), 'diet');?>">
<input type="hidden" name="usmoke" value="<?php echo $this->muse->display_value('user_lifestyle',  array('user_id' =>$this->tank_auth->get_user_id()), 'smoke');?>">
<input type="hidden" name="udrink" value="<?php echo $this->muse->display_value('user_lifestyle', array('user_id' => $this->tank_auth->get_user_id()), 'drink');?>">
<!-- Modal HTML block b-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Lifestyle</h4>
                </div>
               <form action="<?php echo base_url();?>update_profile/update_lifestyle" method="post" class = 'ms_style' >
                <div class="modal-body">
                <table class="table success tb_align" style="margin-bottom:0px" >
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
	  $diet 		= $('input[name=udiet]').val();
	  $smoke 		= $('input[name=usmoke]').val();
	  $drink 		= $('input[name=udrink]').val();
	  
	  
	  $('input:radio[name=diet][value='+$diet+']').attr("checked", "checked");
	  $('input:radio[name=smoke][value='+$smoke+']').attr("checked", "checked");
	  $('input:radio[name=drink][value='+$drink+']').attr("checked", "checked");
	  
	  });
</script>