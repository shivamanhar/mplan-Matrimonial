
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-7">
            <form action="<?php echo base_url();?>partner_profile/pinsert_lifestyle" method="post" >
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
                        <input type="radio" name="drink" value="drinks occasionally"> Drinks Occasionally
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