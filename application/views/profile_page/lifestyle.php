
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-7">
            <form action="<?php echo base_url();?>update_profile/insert_lifestyle" method="post" class="ms_style">
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
                        <input type="radio" name="diet" value="veg" title="Diet"  > Veg
                        <input type="radio" name="diet" value="non veg" title="Diet" > Non-Veg
                        <input type="radio" name="diet" value="jain" title="Diet" > Jain
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
						<input type="submit" class="btn btn-warning" value="Save" name="submit">
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