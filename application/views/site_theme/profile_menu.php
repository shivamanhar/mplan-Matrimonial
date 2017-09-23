
<?php
                         $field_val = array(
			'user_id' => $this->tank_auth->get_user_id(),
			'profile_complete'=>1
				);
                         $complete_user_basic = $this->muse->complete_user_profile('user_profiles',$field_val);
			 
			 $data['user_edu'] = $this->matri->global_where('user_edu', array('user_id' => $this->tank_auth->get_user_id()));
			 /*end user check */
			 $user_edu = 0;
				if($data['user_edu']->num_rows() > 0)
				{
						  $user_edu = 1;
				}
			 $user_file = 0;
			 $field_val = array(
			'user_id' => $this->tank_auth->get_user_id(),
				);
			 $data['user_file'] = $this->matri->and_where('user_file', $field_val);
				if($data['user_file']->num_rows() > 0)
				{
					$user_file = 1;
				}
			 /*check user already insert data or not */		
			 $data['user_lifestyle'] = $this->matri->global_where('user_lifestyle', array('user_id'=> $this->tank_auth->get_user_id()));
			 /*end user check */
			 $lifestyle = 0;
			 if($data['user_lifestyle']->num_rows() > 0)
			 {
				$lifestyle = 1;			  
			 }
			 $family = 0;
			 $data['user_family'] = $this->matri->global_where('user_family', array('user_id'=> $this->tank_auth->get_user_id()));
			 /*end user check */
			 if($data['user_family']->num_rows() > 0)
			     {
				$family = 1;			 
			     }
			 /*check user already insert data or not */		
			 $data['user_hobbies'] = $this->matri->global_where('user_hobbies', array('user_id'=>$this->tank_auth->get_user_id()));
			 /*end user check */
			 $user_hobbies =0;
			 if($data['user_hobbies']->num_rows() > 0)
			 {
				$user_hobbies = 1;
			 }
?>

<!-- end header information -->
<div class="container">
     <div class="row">
        
            <table class="table profile_menu">
                <tr>
                    <td class="col-md-1 " style="border:none; "> <a href="<?php echo base_url();?>update_profile/index" style="display:block">			 <center>
                    <?php if($complete_user_basic == FALSE)
                    {                       
                         echo "<i class='fa fa-pencil fa-2x'></i>";                   
                    }
                    else
                    {
                         echo "<i class='fa fa-check fa-2x' style='color: #0CC008;'></i><br/>";
                    }
                    ?>
                    <center>
                         <b> Basic Info</b>
		    </a>
		    
		    </td>
		    <td class="col-md-1 col-xs-4" style="border:none;">
			 <a href="<?php echo base_url();?>update_profile/photo" style="display:block">
                         <center>
						  <?php
						  if($user_file ==1)
						  {
									   echo "<i class='fa fa-check fa-2x' style='color: #0CC008;'></i><br/>";
						  }
						  else
						  {
									   echo "<i class='fa fa-image fa-2x'></i><br/>";
						  }
						  ?>
			 <center>
                       <b> Profile Image </b>
			</a>
		    </td>
                    <td class="col-md-1 col-xs-4" style="border:none;">
			 <a href="<?php echo base_url();?>update_profile/education" style="display:block">
                         <center>
						  <?php
						  if($user_edu == 1)
						  {
							echo "<i class='fa fa-check fa-2x' style='color: #0CC008;'></i><br/>";
						  }
						  else
						  {
							echo "<i class='fa fa-book fa-2x'></i><br/>";		   
						  }
						  ?>
			 <center>
                        <b> Education & Carrer </b>
			 </a>
		    </td>
                    <td class="col-md-1 col-xs-4" style="border:none;">
			 <a href="<?php echo base_url();?>update_profile/user_background" style="display:block">
                         <center>
                              <?php 
                             //check background already insert data or not 		
					$data['user_background'] = $this->matri->global_where('user_background', array( 'user_id'=> $this->tank_auth->get_user_id()));
					//end user check
					
					if($data['user_background']->num_rows() > 0)
					{
                                             
						echo "<i class='fa fa-check fa-2x' style='color: #0CC008;'></i><br/>";
					}
                                        else
                                        {
                                             echo "<i class='fa fa-star fa-2x'></i><br/>";
                                        }
                                        ?>
                              <center>
                        <b> Background </b>
			 </a>
		    </td>
                    
                    <td class="col-md-1 col-xs-4" style="border:none;">
			 <a href="<?php echo base_url();?>update_profile/family" style="display:block">
                        <center>
			<?php
						  if($family == 1)
						  {
							echo "<i class='fa fa-check fa-2x' style='color: #0CC008;'></i><br/>";		    
						  }
						  else
						  {
							echo "<i class='fa fa-smile-o fa-2x'></i><br/>";
						  }
			?>
			<center>
                        <b> Family </b>
			</a>
		    </td>
                    <td class="col-md-1 col-xs-4" style="border:none;">
			 <a href="<?php echo base_url();?>update_profile/hobbies" style="display:block">
                         <center>
				<?php
				if($user_hobbies ==1)
				{
					echo "<i class='fa fa-check fa-2x' style='color: #0CC008;'></i><br/>";		  
				}
				else
				{
					echo "<i class='fa fa-heart fa-2x'></i><br/>";
				}
				?>
			 <center>
                        <b> Hobbies </b>
			</a>
		    </td> 
                </tr>
            </table>
     </div>
</div>