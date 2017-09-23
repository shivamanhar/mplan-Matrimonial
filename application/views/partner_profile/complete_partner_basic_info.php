<?php
if(isset($matches))
{
    foreach($matches->result() as $row)
    {
	$muser_id = $row->muser_id;
        $country = $row->country;
	$state = $row->state;
	$city = $row->city;
	$mtongue = $row->mtongue;
        $pmarital_status = $row->pmarital_status;
        $page = $row->page;
        $pageto = $row->pageto;
        $pheightto = $row->mheightto;
        $pheight = $row->global_height;
        $pskin_tone = $row->pskin_tone;
        $pbody_type = $row->pbody_type;
        $pdisability = $row->pdisability;
        $phiv_positive = $row->phiv_positive;
        $pprofile_complete = $row->pprofile_complete;
        
    }
}
?>
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
            <center> <h2> You like in Your partner </h2> </center>
            <br/>
            
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Location</th></tr>
                <tr> <td class="col-md-2"> Country </td><td class="col-md-4"><?php if(isset($country)){echo ucfirst($country);}else{echo "Not Defined";}?></td></tr>
                <tr> <td> State Living In </td><td><?php if(isset($state)){echo ucfirst($state);}else{echo "Not Defined";}?></td></tr>
                <tr> <td> City Living In</td><td><?php if(isset($city)){echo ucfirst($city);}else{echo "Not Defined";}?></td></tr>
                <tr> <th colspan="2"> About </th></tr>
              
                <tr>
                    <td> Mother Tongue </td><td>
                  
                   <?php if(isset($mtongue)){echo ucfirst($mtongue);}else{echo "Not Defined";}?>
                    
                    </td>
                </tr>
                <tr> <td> Marital Status </td><td>
                <?php if(isset($pmarital_satatus)){echo ucfirst($pmarital_satatus);}else{echo "Not Defined";}?>
                
                
                </td></tr>
                <tr>
                    <td> Age </td>
                    <td>
                        <b> <?php if(isset($page)){echo $page;}else{echo "Not Defined";}?> </b>
                        Year &nbsp;&nbsp; To &nbsp;&nbsp;
                        <b> <?php if(isset($pageto)){echo $pageto;}else{echo "Not Defined";}?> </b>
			  Year
                    </td>
                </tr>
                <tr> <td> Height </td><td>
                <?php if(isset($pheight)){echo $pheight;}else{echo "Not Defined";}?>   
                &nbsp;&nbsp; To &nbsp;&nbsp;
                
                <?php if(isset($pheightto)){echo $pheightto;}else{echo "Not Defined";}?> 
                
                </td></tr>
                <tr> <td> Skin Tone </td><td>
                <?php if(isset($pskin_tone)){echo ucfirst($pskin_tone);}else{echo "Not Defined";}?>
                
                </td></tr>
                <tr>
                    <td> Body Type </td><td>
                <?php if(isset($pbody_type)){echo ucfirst($pbody_type);}else{echo "Not Defined";}?>
                    </td>
                </tr>
                <tr>
                    <td> Disability </td><td>
                <?php if(isset($pdisability)){echo ucfirst($pdisability);}else{echo "Not Defined";}?>               
                </td>
                </tr>
                <tr>
                    <td> HIV Positive</td><td>
                <?php if(isset($phiv_positive)){echo ucfirst($phiv_positive);}else{echo "Not Defined";}?>               
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
        </div>
     </div>
</div>

<!-- hedden value send -->
<input type="hidden" name="country_id" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=>$muser_id), 'pcountry_id'); ?>">
<input type="hidden" name="state_id" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=> $muser_id), 'pstate_id'); ?>">
<input type="hidden" name="city_id" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=>$muser_id), 'pcity_id'); ?>">

<input type="hidden" name="mtonge_id" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=> $muser_id), 'pmtongue_id'); ?>">
<input type="hidden" name="user_marital_status" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=>$muser_id), 'pmarital_status');?>">

<input type="hidden" name="mpage" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=>$muser_id), 'page');?>">
<input type="hidden" name="mpageto" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=> $muser_id), 'pageto');?>">

<input type="hidden" name="pheight" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=>$muser_id), 'pheight');?>">
<input type="hidden" name="pheightto" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=>$muser_id), 'pheightto');?>">


<input type="hidden" name="uskin_tone" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=> $muser_id), 'pskin_tone');?>">
<input type="hidden" name="ubody_type" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id'=> $muser_id), 'pbody_type');?>">
<input type="hidden" name="udisability" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id' => $muser_id), 'pdisability');?>">
<input type="hidden" name="uhiv_positive" value="<?php echo $this->muse->display_basic_info('partner_basic', array('user_id' => $muser_id), 'phiv_positive');?>">

<!-- Modal HTML block b-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">You like in Your partner</h4>
                </div>
                   
	    <form action="<?php echo base_url();?>partner_profile/update_pbasic_info" method="post">
                <div class="modal-body">
                
           <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" >Location</th></tr>
                <?php
                echo form_error('country');
                echo form_error('state');
                echo form_error('city');
                ?>
                <tr> <td class="col-md-2"> Country <span style="color:red"> *</span></td><td class="col-md-4"><?php echo $this->address->country();?></td></tr>
                <tr> <td> State Living In <span style="color:red"> *</span></td><td><?php echo $this->address->state($this->muse->display_basic_info('user_profiles', array('user_profiles.id'=>$this->tank_auth->get_user_id()), 'country_id'));?></td></tr>
                <tr> <td>City Living In</td><td><?php echo $this->address->city($this->muse->display_basic_info('user_profiles',  array('user_profiles.id'=>$this->tank_auth->get_user_id()), 'state_id'));?></td></tr>
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
                <select name="marital_status">
                    <option value=""> Select </option>
                    <option value='never married'  <?php echo set_select('marital_status', 'never married'); ?> selected> Never Married </option>
                    <option value="divorced" <?php echo set_select('marital_status', 'divorced'); ?>> Divorced </option>
                    <option value="awaiting divorced" <?php echo set_select('marital_status', 'awaiting divorced'); ?>> Awaiting Divorced </option>
                    <option value="widowed" <?php echo set_select('marital_status', 'widowed'); ?>> Widowed </option>
                    
                </select>
                
                </td></tr><tr>
                    <td> Age </td>
                    <td>
                        <select name="age" style="width:40%">
                              <option value="">Select </option>
                              <?php
                              for($i=18;$i<70;$i++)
                              echo "<option value='".$i."'>".$i."</option>";
                              ?>
                        </select>
                        &nbsp;&nbsp; To &nbsp;&nbsp;
                        <select name="ageto" style="width:40%">
                              <option value="">Select </option>
                              <?php
                              for($i=18;$i<70;$i++)
                              echo "<option '".$i."'>".$i."</option>";
                              ?>
                        </select>
                    </td>
                </tr>
                <tr> <td> Height </td><td>
                <?php $this->muse->gheight('height', 'cheight');?>
                &nbsp;&nbsp; To &nbsp;&nbsp;
               <?php $this->muse->gheight('heightto', 'cheight');?>
                </td></tr>
                <tr> <td>Skin Tone<span style="color:red"> *</span></td><td>
                <input type="radio" name="skin_tone" value="very fair" <?php echo set_radio('skin_tone', 'very fair'); ?> required> Very Fair
                <input type="radio" name="skin_tone" value="fair" <?php echo set_radio('skin_tone', 'fair'); ?> required> Fair
                <input type="radio" name="skin_tone" value="wheatish" <?php echo set_radio('skin_tone', 'wheatish'); ?> required> Wheatish
                <input type="radio" name="skin_tone" value="dark" <?php echo set_radio('skin_tone', 'dark'); ?> required> Dark
                </td></tr>
                <tr>
                    <td> Body Type <span style="color:red"> *</span></td><td>
                <input type="radio" name="body_type" value="slim" <?php echo set_radio('body_type', 'slim'); ?> required> Slim
                <input type="radio" name="body_type" value="athletic" <?php echo set_radio('body_type', 'athletic'); ?> required> Athletic
                <input type="radio" name="body_type" value="average" <?php echo set_radio('body_type', 'average'); ?> required> Average
                <input type="radio" name="body_type" value="heay" <?php echo set_radio('body_type', 'heay'); ?> required> Heavy
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

<!-- for change value -->
<script type="text/javascript">
     $(document).ready(function(){
	  $country_id 		= $('input[name=country_id]').val();
	  $state_id 		= $('input[name=state_id]').val();
	  $city_id 		= $('input[name=city_id]').val();
	  $mtonuge_id 		= $('input[name=mtonge_id]').val();
	  
	  $page 		= $('input[name=mpage]').val();
	  $pageto		= $('input[name=mpageto]').val();
	  
	  $pheight		= $('input[name=pheight]').val();
	  $pheightto		= $('input[name=pheightto]').val();
	  
	  $user_marital_status 	= $('input[name=user_marital_status]').val();
	  $uskin_tone		= $('input[name=uskin_tone]').val();
	  $ubody_type		= $('input[name=ubody_type]').val();
	  $udisability 		= $('input[name=udisability]').val();
	  $uhiv_positive 	= $('input[name=uhiv_positive ]').val();
	  $('select[name=country]').val($country_id);
	  $('select[name=state]').val($state_id);
	  $('select[name=city]').val($city_id);
	  
	  $('select[name=mtongue]').val($mtonuge_id);
	  
	  $('select[name=age]').val($page);
	  $('select[name=ageto]').val($pageto);
	  
	  $('select[name=height]').val($pheight);
	  $('select[name=heightto]').val($pheightto);
	  
	  $('select[name=marital_status]').val($user_marital_status);
	  $('input:radio[name=skin_tone][value='+$uskin_tone+']').attr("checked", "checked");
	  $('input:radio[name=body_type][value='+$ubody_type+']').attr("checked", "checked");
	  $('input:radio[name=disability][value='+$udisability+']').attr("checked", "checked");
	  $('input:radio[name=hiv_positive][value='+$uhiv_positive+']').attr("checked", "checked");
	  });
</script>


<script src="<?php echo base_url();?>js/address.js"></script>

<style>
.cheight
{
	width:40%;
}
</style>
