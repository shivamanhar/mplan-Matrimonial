<?php
                         $field_val = array(
			'user_id' => $this->tank_auth->get_user_id(),
			'profile_complete'=>1
				);
                         $complete_user_basic = $this->muse->complete_user_profile('user_profiles',$field_val);
?>

<!-- end header information -->
<div class="container">
     <div class="row" >
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td class="col-md-1"> <center>
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
                         Basic Info</td>
		    <td class="col-md-1">
                         <center> <i class="fa fa-image fa-2x"></i><br/><center>
                        Profile Image
		    </td>
                    <td class="col-md-1">
                         <center> <i class="fa fa-book fa-2x"></i><br/><center>
                        Education & Carrer</td>
                    <td class="col-md-1">
                         <center>
                              <?php 
                             //check background already insert data or not 		
					$data['user_background'] = $this->matri->global_where('user_background', array('user_id'=>$this->tank_auth->get_user_id()));
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
                        Background</td>
                    
                    <td class="col-md-1">
                         <center> <i class="fa fa-smile-o fa-2x"></i><br/><center>
                        Family</td>
                    <td class="col-md-1">
                         <center> <i class="fa fa-heart fa-2x"></i><br/><center>
                        Hobbies </td>                    
                   
                </tr>
            </table>

        </div>
     </div>
</div>