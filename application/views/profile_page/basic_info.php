
<div class="container">
     <div class="row">
        <div class="col-md-5">
	  <form action="<?php echo base_url();?>user_profile/insert_basic_info" method="post" >
            <table class="table table-bordered">
	       <tr><th colspan="2"> Location </th></tr>
	       <tr> <td class="col-md-2"> Country <span style="color:red"> *</span></td><td class="col-md-4"><?php echo $this->address->country();?></td></tr>
                <tr> <td> State Living In <span style="color:red"> *</span></td><td><?php echo $this->address->state();?></td></tr>
                <tr> <td>City Living In</td><td><?php echo $this->address->city();?></td></tr>
	    </table>
        </div>
        <div class="col-md-5">
            <table class="table table-bordered">
	       <tr><th colspan="2"> About </th></tr>
	       <tr>
                    <td> Mother Tongue <span style="color:red"> *</span></td><td>
                    <select name="mtongue">
                        <option value=""> Select </option>
                    <?php
                    if(isset($mother_tongue))
                    {
                        foreach($mother_tongue->result() as $row)
                        {
                        echo "<option value='".$row->id."' ". set_select('mtongue', $row->id) .">".ucfirst($row->mtongue)."</option>";
                        }
                    }
                    ?>
                    </select>
                    </td>
                </tr>
                <tr> <td> Marital Status <span style="color:red"> *</span></td><td>
                <select name="marital_status" required>
                    <option value=""> Select </option>
                    <option value='never married'  <?php echo set_select('marital_status', 'never married'); ?> selected> Never Married </option>
                    <option value="divorced" <?php echo set_select('marital_status', 'divorced'); ?>> Divorced </option>
                    <option value="awaiting divorced" <?php echo set_select('marital_status', 'awaiting divorced'); ?>> Awaiting Divorced </option>
                    <option value="widowed" <?php echo set_select('marital_status', 'widowed'); ?>> Widowed </option>
                    
                </select>
                
                </td></tr>
                <tr> <td> Height </td><td>
                <?php $this->muse->gheight('heightto', '' ,"id='heightto' required");?>
                
                </td></tr>
                <tr> <td>Skin Tone </td><td>
                <input type="radio" name="skin_tone" value="very fair" <?php echo set_radio('skin_tone', 'very fair'); ?> > Very Fair
                <input type="radio" name="skin_tone" value="fair" <?php echo set_radio('skin_tone', 'fair'); ?> > Fair
                <input type="radio" name="skin_tone" value="wheatish" <?php echo set_radio('skin_tone', 'wheatish'); ?> > Wheatish
                <input type="radio" name="skin_tone" value="dark" <?php echo set_radio('skin_tone', 'dark'); ?> > Dark
                </td></tr>
                <tr>
                    <td> Body Type </td><td>
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
                
                
					
		
		
	    </table>
	    
        </div>
	<div class="col-md-2">
	</div>
	<div class="col-md-10">
	  <center>
						<input type="submit" class="btn btn-primary" value="Continue" name="submit">
	  </center>
	  </form>
	</div>
	
     </div>
</div>
<script src="<?php echo base_url();?>js/address.js"></script>
<script src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>