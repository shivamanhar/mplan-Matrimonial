
<div class="container">
     <div class="row">
        <div class="col-md-3">            
        </div>
        <div class="col-md-7 ">
            <form action="<?php echo base_url();?>user_profile/insert_hobbies" method="post" >
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
                        <?php echo ucwords($this->muse->display_value('user_hobbies', array('user_id' => $this->tank_auth->get_user_id()), 'hobbies')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Interests </td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_hobbies', array('user_id' => $this->tank_auth->get_user_id()), 'interests')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Favourite Music </td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_hobbies', array('user_id' => $this->tank_auth->get_user_id()), 'fav_music')) ?>
                    </td>
                </tr>
		
                <tr><td class="col-md-3"> Preferred Movies</td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_hobbies', array('user_id'=>$this->tank_auth->get_user_id()), 'pre_movies')) ?>
                    </td>
                </tr>
		<tr><td class="col-md-3"> Food I Cook</td>
                    <td class="col-md-5">
                       <?php echo ucwords($this->muse->display_value('user_hobbies', array('user_id' => $this->tank_auth->get_user_id()), 'cook_food')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> In your own words</td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_hobbies', array('user_id' => $this->tank_auth->get_user_id()), 'own_words')) ?>
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


<!-- Modal HTML block b-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Hobbies</h4>
                </div>
                    <?php
	    $attributes = array('class' => 'ms_style');
	    echo form_open_multipart('muser/profile_image_change', $attributes);
	    ?> 
                <div class="modal-body">
		    <table class="table success tb_align" style="margin-bottom:0px" >
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
			 <input type="text" name="hobby"  value="<?php echo set_value('hobby', ''); ?>">                        
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Interests </td>
                    <td class="col-md-5">
<input type="text" name="interest" PlaceHolder="Writing, Blogging"    value="<?php echo set_value('interest', ''); ?>">                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Favourite Music </td>
                    <td class="col-md-5">
<input type="text" name="fav_music" PlaceHolder="Soft, Pop, Devotional"  value="<?php echo set_value('fav_music', ''); ?>">                    </td>
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
                        <textarea name="own_words" rows="5"  style="height:100px;text-align:left;line-height:normal"><?php echo set_value('own_words', ''); ?></textarea>
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
    </div>
    
    <!-- End of model HTML block b-->