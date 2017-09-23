
<div class="container">
     <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
            <form action="<?php echo base_url();?>update_profile/insert_education" method="post" >
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
                        <select name="edu_level" required>
                            <option value=""> Select</option>
                            <?php
                            if(isset($edu_level))
                            {
                                foreach($edu_level->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucwords($row->edu_level)."</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Education Field </td>
                    <td class="col-md-4">
                        <select name="edu_field" required>
                            <option value=""> Select</option>
                            <?php
                            if(isset($edu_field))
                            {
                                foreach($edu_field->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucwords($row->edu_field)."</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Working With </td>
                    <td class="col-md-4">
                        <select name="work_with" required>
                            <option value=""> Select</option>
                            <?php
                            if(isset($work_with))
                            {
                                foreach($work_with->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucwords($row->work_with)."</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Working As  </td>
                    <td class="col-md-4">
                        <select name="work_as" required>
                            <option value=""> Select</option>
                            <?php
                            if(isset($work_as))
                            {
                                foreach($work_as->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucwords($row->work_as)."</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td class="col-md-2"> Annual Income </td>
                    <td class="col-md-4">
                        <select name="annual_income" required>
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
                    <td style="border:none;padding:0px;" colspan="2">
					<center>
						<input type="submit" class="btn btn-warning" value="Continue" name="submit">
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