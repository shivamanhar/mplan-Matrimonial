<?php

/*form validation */

$father_name = array(

	'type' =>'text',

	'name'	=> 'father_name',

	'value'	=> set_value('father_name'),

	'required' =>'required',	

);
$mother_name = array(

	'type' =>'text',

	'name'	=> 'mother_name',

	'value'	=> set_value('mother_name'),

	'required' =>'required',	

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
                 'value' => set_value('brother'),
                 
                 );
$sister = array(
                'type' => 'text',
                 'name' => 'sister',
                 'value' => set_value('sister'),
                
                );
?>

<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-8">
            <form action="<?php echo base_url();?>user_profile/insert_family" method="post" class="ms_style">
            <table class="table success tb_align" style="margin-bottom:0px" >
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
                <tr>
                    <td style="border:none;padding:0px;" colspan="2">
					<center>
						<input type="submit" class="btn btn-warning" style="margin-bottom:10px;margin-top:10px" value="Continue">
					</center>
                    </td>
                </tr>
            </table>
            </form>
        </div>
     </div>
</div>