
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
            <form action="<?php echo base_url();?>update_profile/insert_background" method="post">
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Background</th></tr>
                  <?php
                echo form_error('religion');
                echo form_error('community');
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
		<tr>
		    <td class="col-md-2"> Sub Community </td>
		    <td class="col-md-4"> <input type="text" name="sub_community" ></td>
		</tr>
                <tr>
		    <th colspan="2">Life Style </th>
		</tr>
		<tr>
                    <td class="col-md-2"> Diet </td>
                    <td class="col-md-4">
                        <input type="radio" name="diet" value="veg" title="Diet"   > Veg
                        <input type="radio" name="diet" value="non veg" title="Diet" > Non-Veg
                        <input type="radio" name="diet" value="jain" title="Diet"> Jain
                        <input type="radio" name="diet" value="vegan" title="Diet" > Vegan
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
						<input type="submit" class="btn btn-warning" value="Continue" name="submit">
					</center>
                    </td>
                </tr>
            </table>
            </form>
        </div>
     </div>
</div>