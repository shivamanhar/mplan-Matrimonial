<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-8">
            <form action="<?php echo base_url();?>user_profile/insert_family" method="post" >
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > My Family</th></tr>
                <?php
                echo form_error('father_name');
                echo form_error('mother_name');
		echo form_error('father_status');
		echo form_error('mother_status');
                echo form_error('family_status');
                echo form_error('brother');
		echo form_error('sister');
                ?>
                <tr>
                    <td class="col-md-3"> Father's Name</td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_family', array('user_id' => $this->tank_auth->get_user_id()), 'father_name')) ?>                  
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Mother's Name </td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_family', array('user_id' => $this->tank_auth->get_user_id()), 'mother_name')) ?>               
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Father Status </td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_family', array('user_id' =>$this->tank_auth->get_user_id()), 'father_status')) ?> 
                    </td>
                </tr>
                <tr><td class="col-md-3"> Mother Status</td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_family', array('user_id' => $this->tank_auth->get_user_id()), 'mother_status')) ?> 
                    </td>
                </tr>
                <tr><td class="col-md-3"> Family Status</td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_family', array('user_id' => $this->tank_auth->get_user_id()), 'family_status')) ?> 
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Brother(S)</td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_family', array('user_id' =>$this->tank_auth->get_user_id()), 'brother')) ?> 
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Sister(S)</td>
                    <td class="col-md-5">
                        <?php echo ucwords($this->muse->display_value('user_family', array('user_id' => $this->tank_auth->get_user_id()), 'sister')) ?> 
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
<?php

/*form validation */

$father_name = array(

	'type' =>'text',

	'name'	=> 'father_name',

	'value'	=> $this->muse->display_value('user_family', array('user_id' =>$this->tank_auth->get_user_id()), 'father_name'),

	'required' =>'required',
	'style' => 'width:95%'

);
$mother_name = array(

	'type' =>'text',

	'name'	=> 'mother_name',

	'value'	=> $this->muse->display_value('user_family', array('user_id' =>$this->tank_auth->get_user_id()), 'mother_name'),

	'required' =>'required',
	
	'style' => 'width:95%'

);
$father_status = array(
    '' => 'Select',
    'employed' => 'Employed',
    'business' => 'Business',
    'professional' => 'Professional',
    'retired' => 'Retired',
    'not employed' => 'Not Employed',
    'passed away' => 'Passed away',
    
);
$mother_status = array(
    '' => 'Select',
    'homemaker' => 'Homemaker',
    'employed' => 'Employed',
    'business' => 'Business',
    'professional' => 'Professional',
    'retired' => 'Retired',
    'not employed' => 'Not Employed',
    'passed away' => 'Passed away',
                       );
$family_status = array(
		       ''=> 'Select',
		       'rich'=> 'Rich',
		       'upper middle class' => 'Upper Middle Class',
		       'middle' => 'Middle Class'
		       );
$brother = array(
                 'type' => 'text',
                 'name' => 'brother',
                 'value' => $this->muse->display_value('user_family', array('user_id' =>$this->tank_auth->get_user_id()), 'brother'),
                 
                 );
$sister = array(
                'type' => 'text',
                 'name' => 'sister',
                 'value' => $this->muse->display_value('user_family', array('user_id' =>$this->tank_auth->get_user_id()), 'sister'),
                
                );
?>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Family Details</h4>
                </div>
                
	    <form action="<?php echo base_url();?>update_profile/update_family" method="post"  >
                <div class="modal-body">
	       <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > My Family</th></tr>
                <?php
                echo form_error('father_name');
                echo form_error('mother_name');
		echo form_error('father_status');
		echo form_error('mother_status');
                echo form_error('family_status');
                echo form_error('brother');
		echo form_error('sister');
                ?>
                <tr>
                    <td class="col-md-3"> Father's Name</td>
                    <td class="col-md-5">
                        <?php echo form_input($father_name); ?>                     
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Mother's Name </td>
                    <td class="col-md-5">
                        <?php echo form_input($mother_name); ?>                
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Father Status </td>
                    <td class="col-md-5">
                        <?php echo form_dropdown('father_status', $father_status ,'');?>
                    </td>
                </tr>
                <tr><td class="col-md-3"> Mother Status</td>
                    <td class="col-md-5">
                        <?php echo form_dropdown('mother_status', $mother_status, '');?>
                    </td>
                </tr>
                <tr><td class="col-md-3"> Family Status</td>
                    <td class="col-md-5">
                        <?php echo form_dropdown('family_status', $family_status, ''); ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Brother(S)</td>
                    <td class="col-md-5">
                        <?php echo form_input($brother);?>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3"> Sister(S)</td>
                    <td class="col-md-5">
                        <?php echo form_input($sister);?>
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
    </div><!-- End of model HTML block b-->
<input type="hidden" name="ufather_status" value="<?php  echo $this->muse->display_value('user_family', array('user_id' => $this->tank_auth->get_user_id()), 'father_status'); ?>">
<input type="hidden" name="umother_status" value="<?php  echo $this->muse->display_value('user_family', array('user_id' => $this->tank_auth->get_user_id()), 'mother_status'); ?>">
<input type="hidden" name="ufamily_status" value="<?php  echo $this->muse->display_value('user_family', array('user_id' => $this->tank_auth->get_user_id()), 'family_status'); ?>">
    <!-- for change value -->
<script type="text/javascript">
     $(document).ready(function(){
	  $father_status 		= $('input[name=ufather_status]').val();
	  $mother_status 		= $('input[name=umother_status]').val();
	  $family_status 		= $('input[name=ufamily_status]').val();
	  
	  $('select[name=father_status]').val($father_status);
	  $('select[name=mother_status]').val($mother_status);
	  $('select[name=family_status]').val($family_status);
	  
	  
	  });
</script>