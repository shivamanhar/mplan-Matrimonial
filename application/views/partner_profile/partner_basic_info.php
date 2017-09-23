
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
            <center> <h2> Tell us what you would like in a partner </h2> </center>
            <br/>
            <form action="<?php echo base_url();?>partner_profile/pinsert_basic_info" method="post" >
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Location</th></tr>
                <?php
                echo form_error('country');
                echo form_error('state');
                echo form_error('city');
                ?>
                <tr> <td class="col-md-2"> Country </td><td class="col-md-4"><?php echo $this->address->country();?></td></tr>
                <tr> <td> State Living In </td><td><?php echo $this->address->state();?></td></tr>
                <tr> <td> City Living In</td><td><?php echo $this->address->city();?></td></tr>
                <tr> <th colspan="2"> About </th></tr>
                <?php
                echo form_error('marital_status');
                echo form_error('height');
                echo form_error('heightto');
                echo form_error('skin_tone');
                echo form_error('body_type');
                echo form_error('disability');
                echo form_error('hiv_positive');
                ?>
                <tr>
                    <td> Mother Tongue </td><td>
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
                <tr> <td> Marital Status </td><td>
                <select name="marital_status" >
                    <option value=""> Select </option>
                    <option value='never married'  <?php echo set_select('marital_status', 'never married'); ?> selected> Never Married </option>
                    <option value="divorced" <?php echo set_select('marital_status', 'divorced'); ?>> Divorced </option>
                    <option value="awaiting divorced" <?php echo set_select('marital_status', 'awaiting divorced'); ?>> Awaiting Divorced </option>
                    <option value="widowed" <?php echo set_select('marital_status', 'widowed'); ?>> Widowed </option>
                    
                </select>
                
                </td></tr>
                <tr>
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
                <tr> <td> Skin Tone </td><td>
                <input type="radio" name="skin_tone" value="very fair" <?php echo set_radio('skin_tone', 'very fair'); ?> > Very Fair
                <input type="radio" name="skin_tone" value="fair" <?php echo set_radio('skin_tone', 'fair'); ?>> Fair
                <input type="radio" name="skin_tone" value="wheatish" <?php echo set_radio('skin_tone', 'wheatish'); ?> > Wheatish
                <input type="radio" name="skin_tone" value="dark" <?php echo set_radio('skin_tone', 'dark'); ?> > Dark
                </td></tr>
                <tr>
                    <td> Body Type </td><td>
                <input type="radio" name="body_type" value="slim" <?php echo set_radio('body_type', 'slim'); ?> > Slim
                <input type="radio" name="body_type" value="athletic" <?php echo set_radio('body_type', 'athletic'); ?>> Athletic
                <input type="radio" name="body_type" value="average" <?php echo set_radio('body_type', 'average'); ?>> Average
                <input type="radio" name="body_type" value="heay" <?php echo set_radio('body_type', 'heay'); ?>> Heavy
                </td>
                </tr>
                <tr>
                    <td> Disability </td><td>
                <input type="radio" name="disability" value="yes"> Yes
                <input type="radio" name="disability" value="no" checked>No                
                </td>
                </tr>
                <tr>
                    <td> HIV Positive</td><td>
                <input type="radio" name="hiv_positive" value="yes"> Yes
                <input type="radio" name="hiv_positive" value="no" checked>No                
                </td>
                </tr>
                
                <td style="border:none;padding:0px;" colspan="2">
					<center>
						<input type="submit" class="btn btn-warning" style="margin-bottom:10px;margin-top:10px" value="Save">
                                                   
					</center>
		 
		</td>
                </form>
            </table>
        </div>
     </div>
</div>


<style>
.cheight
{
	width:40%;
}
</style>