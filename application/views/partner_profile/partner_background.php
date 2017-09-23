
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
	  <center> <h2> Tell us what you would like in a partner </h2> </center>
            <br/>
            <form action="<?php echo base_url();?>partner_profile/pinsert_background" method="post" >
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
                         <select name="religion" id="religion">
                            <option value=""> Select</option>
                        <?php
                            if(isset($religion))
                            {
                                foreach($religion->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucfirst($row->religion_name)."</option>";
                                }
                            }
                            ?>
                         </select>
                    </td>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Community</td>
                    <td class="col-md-4" id="community">
                        
                    </td>
                </tr>
		
                <tr><td class="col-md-2"> Sub Community</td>
                    <td class="col-md-4">
                        <input type="text" name="sub_commuinty" style="width:95%" value="<?php echo set_value('sub_commuinty'); ?>">
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
						<input type="submit" class="btn btn-warning" style="margin-bottom:10px;margin-top:10px" value="Save">
					</center>
                    </td>
                </tr>
            </table>
            </form>
        </div>
     </div>
</div>