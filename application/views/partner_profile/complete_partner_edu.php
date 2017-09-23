<?php
$edu_where = 		 $this->tank_auth->get_user_id();
	
?>
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
          <center> <h2>You like in a partner </h2> </center>
            <br/>
            <form action="" method="post" >
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr> <th colspan="2" > Education and Career Details</th></tr>
                
                <tr>
                    <td class="col-md-2"> Education Level </td>
                    <td class="col-md-4">
                      <?php echo ucfirst($this->muse->get_edu_value($this->tank_auth->get_user_id(), 'edu_level')); ?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Education Field </td>
                    <td class="col-md-4">
                        <?php echo ucfirst($this->muse->get_edu_value($this->tank_auth->get_user_id(), 'edu_field')); ?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Working With </td>
                    <td class="col-md-4">
                        <?php echo ucfirst($this->muse->get_edu_value($this->tank_auth->get_user_id(), 'work_with')); ?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Working As  </td>
                    <td class="col-md-4">
                        <?php echo ucfirst($this->muse->get_edu_value($this->tank_auth->get_user_id(), 'work_as')); ?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Annual Income </td>
                    <td class="col-md-4">
                       <?php echo ucfirst($this->muse->get_edu_value($this->tank_auth->get_user_id(), 'pannual_income')); ?>
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
		    <td style="border:none;" colspan="2">
		    </td>
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
                    <h4 class="modal-title">Change Profile Image</h4>
                </div>
                    
	    <form action="<?php echo base_url();?>partner_profile/update_pedu" method="post" >
                <div class="modal-body">
                
            <table class="table success table-bordered" style="margin-bottom:0px" >
                
                <tr> <th colspan="2" > Education and Career Details</th></tr>
                <?php
                echo form_error('edu_level');
                echo form_error('edu_field');
                echo form_error('work_with');
                echo form_error('work_as');
                echo form_error('annual_income');
                ?>
                <tr>
                    <td class="col-md-2"> Education Level </td>
                    <td class="col-md-4">
                       <?php $this->muse->edu_level();?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Education Field </td>
                    <td class="col-md-4">
                      <?php $this->muse->edu_field();?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Working With </td>
                    <td class="col-md-4">
                       <?php $this->muse->work_with();?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Working As  </td>
                    <td class="col-md-4">
                       <?php $this->muse->work_as();?>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Annual Income </td>
                    <td class="col-md-4">
                        <select name="annual_income">
                            <option value=""> Select </option>
                             <option value="60000" label="60,000">60,000</option>
                            <option value="90000" label="90,000">90,000</option>
                            <option value="120000" label="120,000">120,000</option>
                            <option value="150000" label="150,000">150,000</option>
                            <option value="180000" label="180,000">180,000</option>
                            <option value="240000" label="240,000">240,000</option>
                            <option value="300000" label="300,000">300,000</option>
                            <option value="360000" label="360,000">360,000</option>
                            <option value="500000" label="500,000">500,000</option>
                            <option value="750000" label="750,000">750,000</option>
                            <option value="1000000" label="greater than 10,00,000" >greater than 10,00,000</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td style="border:none;" colspan="2">
					
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
    
<input type="hidden" name="edu_level" value="<?php echo $this->muse->get_edu_value($edu_where, 'pedu_level_id') ?>">
<input type="hidden" name="edu_field" value="<?php echo $this->muse->get_edu_value($edu_where, 'pedu_field_id') ?>">
<input type="hidden" name="work_with" value="<?php echo $this->muse->get_edu_value($edu_where, 'pwork_with_id') ?>">
<input type="hidden" name="work_as" value="<?php echo $this->muse->get_edu_value($edu_where, 'pwork_as_id') ?>">
<input type="hidden" name="annual_income" value="<?php echo $this->muse->get_edu_value($edu_where, 'pannual_income'); ?>">
<!-- for change value -->
<script type="text/javascript">
     $(document).ready(function(){
	  $edu_level		= $('input[name=edu_level]').val();
	  $edu_field 		= $('input[name=edu_field]').val();
	  $work_with		= $('input[name=work_with]').val();
	  $work_as 		= $('input[name=work_as]').val();
	  $annual_income 	= $('input[name=annual_income]').val();
	  
	  $('select[name=edu_level]').val($edu_level);
	  $('select[name=edu_field]').val($edu_field);
	  $('select[name=work_with]').val($work_with);
	  $('select[name=work_as]').val($work_as);
	  $('select[name=annual_income]').val($annual_income);
	  });
</script>