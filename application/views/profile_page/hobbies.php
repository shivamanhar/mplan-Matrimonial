
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-7 ">
            <form action="<?php echo base_url();?>update_profile/insert_hobbies" method="post" >
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Hobbies and Interests</th></tr>
                <?php
                echo form_error('hobbies');
                echo form_error('interests');
		echo form_error('fav_music');
		echo form_error('pre_movies');
		echo form_error('cook_food');
                echo form_error('own_words');
                
                ?>
                <tr>
                    <td class="col-md-3"> Hobbies</td>
                    <td class="col-md-5">
                        <input type="text" name="hobby" PlaceHolder="Music, Cooking"  value="<?php echo set_value('hobby', ''); ?>">
                    </td>
                </tr> 
                <tr>
                    <td class="col-md-3"> Interests </td>
                    <td class="col-md-5">
                        <input type="text" name="interest" PlaceHolder="Writing, Blogging"    value="<?php echo set_value('interest', ''); ?>">
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Favourite Music </td>
                    <td class="col-md-5">
                        <input type="text" name="fav_music" PlaceHolder="Soft, Pop, Devotional"  value="<?php echo set_value('fav_music', ''); ?>">
                    </td>
                </tr>
		<!--
                <tr><td class="col-md-3"> Favourite Books </td>
                    <td class="col-md-5">
                        <input type="text" name="fav_books">
                    </td>
                </tr> -->
                <tr><td class="col-md-3"> Preferred Movies</td>
                    <td class="col-md-5">
			 <input type="text" name="pre_movie"  value="<?php echo set_value('pre_movie', ''); ?>">
                    </td>
                </tr>
		<tr><td class="col-md-3"> Food I Cook</td>
                    <td class="col-md-5">
                       <input type="text" name="cook_food"  value="<?php echo set_value('cook_food', ''); ?>">
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> In your own words</td>
                    <td class="col-md-5">
                        <textarea name="own_words" rows="5" style="height:100px;text-align:left;line-height:normal"></textarea>
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