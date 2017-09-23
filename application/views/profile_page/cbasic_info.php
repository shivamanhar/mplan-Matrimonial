
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-5 ">
          
            <table class="table  table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Location</th></tr>
                
                <tr> <td class="col-md-2"> Country <span style="color:red"></span></td><td class="col-md-4"><?php echo ucwords($this->muse->display_basic_info('user_profiles', array( 'user_id'=>$this->tank_auth->get_user_id()), 'country'));?></td></tr>
                <tr> <td>State Living In <span style="color:red"> </span></td><td><?php echo ucwords($this->muse->display_basic_info('user_profiles', array('user_id'=> $this->tank_auth->get_user_id()), 'state'));?></td></tr>
                <tr> <td> City Living In</td><td><?php echo ucwords($this->muse->display_basic_info('user_profiles', array('user_id'=>$this->tank_auth->get_user_id()), 'city'));?></td></tr>
                <tr> <th colspan="2"> About </th></tr>
                
                <tr>
                    <td> Mother Tongue <span style="color:red"> </span></td><td>
                    <?php echo ucwords($this->muse->display_basic_info('user_profiles', array('user_id' =>$this->tank_auth->get_user_id()), 'mtongue'));?>
                    </td>
                </tr>
                <tr> <td> Marital Status <span style="color:red"> </span></td><td>
                
                <?php echo ucwords($this->muse->display_basic_info('user_profiles', array('user_id'=> $this->tank_auth->get_user_id()), 'marital_status'));?>
                </td></tr>
                <tr> <td> Height<span style="color:red"> </span></td><td>
                 <?php echo $this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'global_height');?>
                
                </td></tr>
                <tr> <td> Skin Tone <span style="color:red"> </span></td><td>
                <?php echo ucwords($this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'skin_tone'));?>
                </td></tr>
                <tr>
                    <td> Body Type<span style="color:red"> </span></td><td>
                <?php echo ucwords($this->muse->display_basic_info('user_profiles', array('user_id' =>$this->tank_auth->get_user_id()), 'body_type'));?>
                </td>
                </tr>
                <tr>
                    <td> Disability</td><td>
                <?php echo ucwords($this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'disability'));?>               
                </td>
                </tr>
                <tr>
                    <td> HIV Positive</td><td>
                 <?php echo ucwords($this->muse->display_basic_info('user_profiles', array( 'user_id' => $this->tank_auth->get_user_id()), 'hiv_positive'));?>                   
                </td>
                </tr>
                <tr>
                <td style="border:none;padding:0px;" colspan="2">
					<center>
						<a href="#" class="btn btn-primary">Edit</a>
					</center>
		</td>
                </tr>
                <tr> <td style="border:none;" colspan="2"> </td> </tr>
            </table>
        </div>
     </div>
</div>
<!-- hedden value send -->
<input type="hidden" name="country_id" value="<?php echo $this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'country_id'); ?>">
<input type="hidden" name="state_id" value="<?php echo $this->muse->display_basic_info('user_profiles',array( 'user_id' => $this->tank_auth->get_user_id()), 'state_id'); ?>">
<input type="hidden" name="city_id" value="<?php echo $this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'city_id'); ?>">

<input type="hidden" name="user_height" value="<?php echo $this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'hid'); ?>">

<input type="hidden" name="mtonge_id" value="<?php echo $this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'mother_tongue_id'); ?>">
<input type="hidden" name="user_marital_status" value="<?php echo $this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'marital_status');?>">
<input type="hidden" name="uskin_tone" value="<?php echo $this->muse->display_basic_info('user_profiles', array('user_id' =>$this->tank_auth->get_user_id()), 'skin_tone');?>">
<input type="hidden" name="ubody_type" value="<?php echo $this->muse->display_basic_info('user_profiles', array('user_id' =>$this->tank_auth->get_user_id()), 'body_type');?>">
<input type="hidden" name="udisability" value="<?php echo $this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'disability');?>">
<input type="hidden" name="uhiv_positive" value="<?php echo $this->muse->display_basic_info('user_profiles', array( 'user_id' =>$this->tank_auth->get_user_id()), 'hiv_positive');?>">
<!-- Modal HTML block b-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Basic Information</h4>
                </div>
                   
	    <form action="<?php echo base_url();?>update_profile/update_basic_info" method="post" >
                <div class="modal-body">
                
           <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" >Location</th></tr>
                <?php
                echo form_error('country');
                echo form_error('state');
                echo form_error('city');
                ?>
                <tr> <td class="col-md-2"> Country <span style="color:red"> *</span></td><td class="col-md-4"><?php echo $this->address->country();?></td></tr>
                <tr> <td> State Living In <span style="color:red"> *</span></td><td><?php echo $this->address->state($this->muse->display_basic_info('user_profiles', array('user_id' => $this->tank_auth->get_user_id()), 'country_id'));?></td></tr>
                <tr> <td>City Living In</td><td><?php echo $this->address->city($this->muse->display_basic_info('user_profiles', array('user_id' =>$this->tank_auth->get_user_id()), 'state_id'));?></td></tr>
                <tr> <th colspan="2"> About </th></tr>
                <?php
                echo form_error('marital_status');
                echo form_error('heightto');
                echo form_error('skin_tone');
                echo form_error('body_type');
                echo form_error('disability');
                echo form_error('hiv_positive');
                ?>
                <tr>
                    <td> Mother Tongue <span style="color:red"> *</span></td><td>
                    <select name="mtongue">
                        <option value=""> Select </option>
                    <?php $this->muse->mtongue(); ?>
                    </select>
                    </td>
                </tr>
                <tr> <td> Marital Status <span style="color:red"> *</span></td><td>
                <select name="marital_status" required>
                    <option value=""> Select </option>
                    <option value='never married'  <?php echo set_select('marital_status', 'never married'); ?> > Never Married </option>
                    <option value="divorced" <?php echo set_select('marital_status', 'divorced'); ?>> Divorced </option>
                    <option value="awaiting divorced" <?php echo set_select('marital_status', 'awaiting divorced'); ?>> Awaiting Divorced </option>
                    <option value="widowed" <?php echo set_select('marital_status', 'widowed'); ?>> Widowed </option>
                    
                </select>
                
                </td></tr>
                <tr> <td> Height <span style="color:red"> *</span></td><td>
		<?php $this->muse->gheight('heightto', '' ,"id='heightto' required");?>
                </td></tr>
                <tr> <td>Skin Tone<span style="color:red"> *</span></td><td>
                <input type="radio" name="skin_tone" value="very fair" <?php echo set_radio('skin_tone', 'very fair'); ?> > Very Fair
                <input type="radio" name="skin_tone" value="fair" <?php echo set_radio('skin_tone', 'fair'); ?> > Fair
                <input type="radio" name="skin_tone" value="wheatish" <?php echo set_radio('skin_tone', 'wheatish'); ?> > Wheatish
                <input type="radio" name="skin_tone" value="dark" <?php echo set_radio('skin_tone', 'dark'); ?> > Dark
                </td></tr>
                <tr>
                    <td> Body Type <span style="color:red"> *</span></td><td>
                <input type="radio" name="body_type" value="slim" <?php echo set_radio('body_type', 'slim'); ?> > Slim
                <input type="radio" name="body_type" value="athletic" <?php echo set_radio('body_type', 'athletic'); ?> > Athletic
                <input type="radio" name="body_type" value="average" <?php echo set_radio('body_type', 'average'); ?> > Average
                <input type="radio" name="body_type" value="heay" <?php echo set_radio('body_type', 'heay'); ?> > Heavy
                </td>
                </tr>
                <tr>
                    <td>Disability </td><td>
                <input type="radio" name="disability" value="yes"> Yes
                <input type="radio" name="disability" value="no" checked>No                
                </td>
                </tr>
                <tr>
                    <td>HIV Positive</td><td>
                <input type="radio" name="hiv_positive" value="yes"> Yes
                <input type="radio" name="hiv_positive" value="no" checked>No                
                </td>
                </tr>		
		</form>
		
            </table>
	   
	   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


<script src="<?php echo base_url();?>js/address.js"></script>
<!-- for change value -->
<script type="text/javascript">
     $(document).ready(function(){
	  $country_id 		= $('input[name=country_id]').val();
	  $state_id 		= $('input[name=state_id]').val();
	  $city_id 		= $('input[name=city_id]').val();
	  $mtonuge_id 		= $('input[name=mtonge_id]').val();
	  
	  $user_height		= $('input[name=user_height]').val();
	  
	  $user_marital_status 	= $('input[name=user_marital_status]').val();
	  $uskin_tone		= $('input[name=uskin_tone]').val();
	  $ubody_type		= $('input[name=ubody_type]').val();
	  $udisability 		= $('input[name=udisability]').val();
	  $uhiv_positive 	= $('input[name=uhiv_positive ]').val();
	  $('select[name=country]').val($country_id);
	  $('select[name=state]').val($state_id);
	  $('select[name=city]').val($city_id);
	  $('select[name=heightto]').val($user_height);
	  
	  $('select[name=mtongue]').val($mtonuge_id);
	  $('select[name=marital_status]').val($user_marital_status);
	  $('input:radio[name=skin_tone][value='+$uskin_tone+']').attr("checked", "checked");
	  $('input:radio[name=body_type][value='+$ubody_type+']').attr("checked", "checked");
	  $('input:radio[name=disability][value='+$udisability+']').attr("checked", "checked");
	  $('input:radio[name=hiv_positive][value='+$uhiv_positive+']').attr("checked", "checked");
	  });
</script>


