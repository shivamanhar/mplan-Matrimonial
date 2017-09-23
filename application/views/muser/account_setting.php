<?php
$mobile_no = array(
	'type' =>'tel',
	'name' => 'mobile_no',
	'required' =>'required',
	'id' => 'phone',
	'placeholder'=>'Mobile No',
	'value' => $this->muse->display_value('users', array('id'=>$this->tank_auth->get_user_id()),'mobile_no'),
	
	'class'	=> 'form-control',
		   );


?>
<link rel="stylesheet" href="<?php echo base_url();?>build/css/intlTelInput.css">
<div class="container" >
     <div class="row" >
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
            <center> <h2> Account Setting </h2> </center>
            <br/>
            <form action="<?php echo base_url();?>account_setting" method="post">
            <table class="table success table-bordered" style="margin-bottom:0px;" >
               
                <tr>
                    <td class="col-md-3"> Name</td> <td class="col-md-4">
                    <input type="text" name="name" class="form-control" value="<?php echo $this->muse->display_value('users', array('id'=>$this->tank_auth->get_user_id()),'firstname');?>">
                    <?php echo form_error('name');?>
                    </td>
                </tr>
                
                <tr>
                    <td class="col-md-3"> Date Of Birthday</td> <td class="col-md-4">
                    <select name="day" id="day" style="width:90px" required>
					<option value="" label="Day" selected="selected">Day</option>
					<option value="1" label="01">01</option>
					<option value="2" label="02">02</option>
					<option value="3" label="03">03</option>
					<option value="4" label="04">04</option>
					<option value="5" label="05">05</option>
					<option value="6" label="06">06</option>
					<option value="7" label="07">07</option>
					<option value="8" label="08">08</option>
					<option value="9" label="09">09</option>
					<option value="10" label="10">10</option>
					<option value="11" label="11">11</option>
					<option value="12" label="12">12</option>
					<option value="13" label="13">13</option>
					<option value="14" label="14">14</option>
					<option value="15" label="15">15</option>
					<option value="16" label="16">16</option>
					<option value="17" label="17">17</option>
					<option value="18" label="18">18</option>
					<option value="19" label="19">19</option>
					<option value="20" label="20">20</option>
					<option value="21" label="21">21</option>
					<option value="22" label="22">22</option>
					<option value="23" label="23">23</option>
					<option value="24" label="24">24</option>
					<option value="25" label="25">25</option>
					<option value="26" label="26">26</option>
					<option value="27" label="27">27</option>
					<option value="28" label="28">28</option>
					<option value="29" label="29">29</option>
					<option value="30" label="30">30</option>
					<option value="31" label="31">31</option>
				     </select>						
                                        <select name="month" id="month"  style="width:100px" required>
                                            <option value="" label="Month" selected="selected">Month</option>
                                            <option value="1" label="January">January</option>
                                            <option value="2" label="February">February</option>
                                            <option value="3" label="March">March</option>
                                            <option value="4" label="April">April</option>
                                            <option value="5" label="May">May</option>
                                            <option value="6" label="June">June</option>
                                            <option value="7" label="July">July</option>
                                            <option value="8" label="August">August</option>
                                            <option value="9" label="September">September</option>
                                            <option value="10" label="October">October</option>
                                            <option value="11" label="November">November</option>
                                            <option value="12" label="December">December</option>
                                        </select>						
                                        <select name="year" id="year"  style="width:100px" required>
                                            <option value="" label="Year" selected="selected">Year</option>
                                            <option value="1997" label="1997">1997</option>
                                            <option value="1996" label="1996">1996</option>
                                            <option value="1995" label="1995">1995</option>
                                            <option value="1994" label="1994">1994</option>
                                            <option value="1993" label="1993">1993</option>
                                            <option value="1992" label="1992">1992</option>
                                            <option value="1991" label="1991">1991</option>
                                            <option value="1990" label="1990">1990</option>
                                            <option value="1989" label="1989">1989</option>
                                            <option value="1988" label="1988">1988</option>
                                            <option value="1987" label="1987">1987</option>
                                            <option value="1986" label="1986">1986</option>
                                            <option value="1985" label="1985">1985</option>
                                            <option value="1984" label="1984">1984</option>
                                            <option value="1983" label="1983">1983</option>
                                            <option value="1982" label="1982">1982</option>
                                            <option value="1981" label="1981">1981</option>
                                            <option value="1980" label="1980">1980</option>
                                            <option value="1979" label="1979">1979</option>
                                            <option value="1978" label="1978">1978</option>
                                            <option value="1977" label="1977">1977</option>
                                            <option value="1976" label="1976">1976</option>
                                            <option value="1975" label="1975">1975</option>
                                            <option value="1974" label="1974">1974</option>
                                            <option value="1973" label="1973">1973</option>
                                            <option value="1972" label="1972">1972</option>
                                            <option value="1971" label="1971">1971</option>
                                            <option value="1970" label="1970">1970</option>
                                            <option value="1969" label="1969">1969</option>
                                            <option value="1968" label="1968">1968</option>
                                            <option value="1967" label="1967">1967</option>
                                            <option value="1966" label="1966">1966</option>
                                            <option value="1965" label="1965">1965</option>
                                            <option value="1964" label="1964">1964</option>
                                            <option value="1963" label="1963">1963</option>
                                            <option value="1962" label="1962">1962</option>
                                            <option value="1961" label="1961">1961</option>
                                            <option value="1960" label="1960">1960</option>
                                            <option value="1959" label="1959">1959</option>
                                            <option value="1958" label="1958">1958</option>
                                            <option value="1957" label="1957">1957</option>
                                            <option value="1956" label="1956">1956</option>
                                            <option value="1955" label="1955">1955</option>
                                            <option value="1954" label="1954">1954</option>
                                            <option value="1953" label="1953">1953</option>
                                            <option value="1952" label="1952">1952</option>
                                            <option value="1951" label="1951">1951</option>
                                            <option value="1950" label="1950">1950</option>
                                            <option value="1949" label="1949">1949</option>
                                            <option value="1948" label="1948">1948</option>
                                            <option value="1947" label="1947">1947</option>
                                            <option value="1946" label="1946">1946</option>
                                        </select>
                                        <?php echo form_error('day');
                                        echo form_error('month');
                                        echo form_error('year');
                                        ?>
                </td>
                </tr>
                
                <tr>
                    <td class="col-md-3"> Mobile No.</td> <td class="col-md-4">
                    <?php echo form_input($mobile_no); ?>
                    <?php echo form_error('mobile_no');?>
                </td>
                </tr>
                
                <tr> <td class="col-md-3"> Mobile number show </td> <td class="col-md-4">
                <input type="radio" class="form-controler" name="mobile_display" value="1"> Yes
                <input type="radio" class="form-controler" name="mobile_display" value="0"> No</td>
                </tr>
                <tr> <td class="col-md-3"> Email Address show </td> <td class="col-md-4">
                <input type="radio" class="form-controler" name="email_display" value="1"> Yes
                <input type="radio" class="form-controler" name="email_display" value="0"> No </td>
                </tr>
                <tr> <td class="col-md-3"> Account Type </td> <td class="col-md-4">
                <input type="radio" class="form-controler" name="account_type" value="1"> Public
                <input type="radio" class="form-controler" name="account_type" value="0"> Private</td>
                </tr>
                
                <tr>
                    <td class="col-md-3" > <input type="submit" class="btn btn-primary" name="save_change" value="Save Change"></td>
                    <td class="col-md-4" > <!-- <input type="submit" class="btn btn-danger" name="account_delete" value="Account Delete"> --></td>
                </tr>
            </table>
            </form>
        </div>
     </div>
</div>
<input type="hidden" name="db_mobile_display" value="<?php echo $this->muse->display_value('account_setting', array('user_id'=>$this->tank_auth->get_user_id()),'display_mobile');?>">
<input type="hidden" name="db_email_display" value="<?php echo $this->muse->display_value('account_setting', array('user_id'=>$this->tank_auth->get_user_id()),'display_email');?>">
<input type="hidden" name="db_account_type" value="<?php echo $this->muse->display_value('account_setting', array('user_id'=>$this->tank_auth->get_user_id()),'display_profile');?>">


   <!-- for change value -->
<script type="text/javascript">
     $(document).ready(function(){
          
           <?php
          $dob = $this->muse->display_value('users', array('id'=>$this->tank_auth->get_user_id()),'dob');
          $day = date('d',$dob);
          $month = date('m',$dob);
          $year = date('Y',$dob);
          ?>
          var day		= <?php echo $day; ?>;
          var month		= <?php echo $month; ?>;
          var year		= <?php echo $year; ?>;
        var mobile_value		= $('input[name=db_mobile_display]').val();
        var db_email_display		= $('input[name=db_email_display]').val();
        var db_account_type		= $('input[name=db_account_type]').val();
        $('input:radio[name=mobile_display][value='+mobile_value+']').attr("checked", "checked");
        $('input:radio[name=email_display][value='+db_email_display+']').attr("checked", "checked");
        $('input:radio[name=account_type][value='+db_account_type+']').attr("checked", "checked");
        
        $('select[name=day]').val(day);
        $('select[name=month]').val(month);
        $('select[name=year]').val(year);
     });
      
</script>

<script src="<?php echo base_url();?>build/js/intlTelInput.js"></script>
	
	
	<script>
	      $("#phone").intlTelInput({
		utilsScript: <?php echo "'".base_url()."lib/libphonenumber/build/utils.js'";?>
	      });
	</script> 