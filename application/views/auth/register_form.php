<?php
/*form validation */
$email = array(
	'type' =>'email',
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'required' =>'required',
	'placeholder'=>'Email',
	'class'	=> 'small input-text',
);
$firstname = array(
	'name'	=> 'firstname',
	'id'	=> 'firstname',
	'value'	=> set_value('firstname'),
	'maxlength'	=> 20,
	'required' =>'required',
	'placeholder'=>'First Name ',
	'class'	=> 'small input-text',
);
$lastname = array(
	'name'	=> 'lastname',
	'id'	=> 'lastname',
	'value'	=> set_value('lastname'),
	'maxlength'	=> 20,
	'required' =>'required',
	'placeholder'=>'Last Name ',
	'class'	=> 'small input-text',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	
	'required' =>'required',
	'placeholder'=>'Password ',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'small input-text',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	
	'required' =>'required',
	'placeholder'=>'Confirm Password ',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'small input-text',
);
$mobile_no = array(
	'type' =>'tel',
	'name' => 'mobile_no',
	'required' =>'required',
	'id' => 'phone',
	'placeholder'=>'Mobile No',
	'value' => set_value('mobile_no'),
	'maxlength'	=> 14,
	
		   );
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);

$error_message = '';
if( form_error($email['name']) !=''){
$error_message = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($email['name']) )."</small>";
}

if(isset($errors[$email['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$email['name']] )."</small>";
}

if( form_error($firstname['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($firstname['name'])."</small>";
}

if(isset($errors[$firstname['name']])){
$error_message .= "<small class=\"error\">".$errors[$firstname['name']]."</small>";
}

if( form_error($lastname['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($lastname['name'])."</small>";
}

if(isset($errors[$lastname['name']])){
$error_message .= "<small class=\"error\">".$errors[$lastname['name']]."</small>";
}

if( form_error($password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($password['name'])."</small>";
}

if( form_error($confirm_password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($confirm_password['name'])."</small>";
}
$captcha_registration =NULL ; //shiva manhar block
$captcha_content = '';
if ($captcha_registration) {
	if ($use_recaptcha) {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<div id="recaptcha_image"></div>
		<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
		<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type(\'audio\')">Get an audio CAPTCHA</a></div>
		<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type(\'image\')">Get an image CAPTCHA</a></div>

		<div class="recaptcha_only_if_image">Enter the words above</div>
		<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />

		<div id="account-signup-divider" class="shared-divider"></div>
		';

		$captcha_content .= $recaptcha_html;
	} else {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<p>Enter the code exactly as it appears:</p>
		'.$captcha_html.'
		<p>'.form_label('Confirmation Code', $captcha['id']).'</p>
		<p>'.form_input($captcha).'</p>

		<div id="account-signup-divider" class="shared-divider"></div>
		';
	}
}

if( form_error('recaptcha_response_field') !=''){
$error_message = "<small class=\"error\">".form_error('recaptcha_response_field')."</small>";
}

if( form_error($captcha['name']) !=''){
$error_message = "<small class=\"error\">".form_error($captcha['name'])."</small>";
}
?>
<!-- include for mobile number -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>build/css/intlTelInput.css">
<!-- end  -->
    <body>
	<!-- label part -->
	
	<!-- end lable part -->
        <div class="register-container container">
            <div class="row">
                <div class="iphone col-md-7">
                   <!-- <img src="<?php echo base_url();?>img/iphone.png" alt="">-->
                </div>
                <div class="register col-md-5" id='mm'>
                    
		      <?php echo form_open($this->uri->uri_string(), array('class'=>'nicely')); ?>
			
                        <h2>Login To <span class="red"><strong>Mplan</strong></span></h2>
                        <?php echo $error_message; ?>
                        <table class="table success tb_align" style="margin-bottom:0px">
                            <tr>
                                <td class="col-md-2 " style="border:none;padding:0px;"> Email </td>
				<td class="col-xs-8 .col-sm-6" style="border:none;padding:0px;"> <?php echo form_input($login); ?> </td>
                            </tr>
                            <tr>
                                <td class="col-md-2 " style="border:none;padding:0px;"> Password </td> <td style="border:none;padding:0px;"> <?php echo form_password($password); ?> </td>
                            </tr>
                            <tr>
                                <td class="col-md-2 " style="border:none;padding:0px;">  </td> <td style="border:none;padding:0px;"> <?php echo form_checkbox($remember); ?> Remember me on this computer.</td>
                            </tr>
                            <tr>
                                <td class="col-md-2 " style="border:none;padding:0px;">  </td> <td style="border:none;padding:0px;"><?php echo $captcha_content; ?></td>
                            </tr>
                            <tr>
                                <td class="col-md-2 " style="border:none;padding:0px;">  </td> <td style="border:none;padding:0px;"> <a href="<?php echo base_url();?>/auth/forgot_password/" class="forgot">Forgot your password?</a> </td>
                            </tr>
                            <tr>
                                
                                <td style="border:none;padding:0px;" colspan="2">
					<center>
						<button type="submit" id="loginBtn" class="nice radius button white">Login</button>
					</center>
					</form>
				</td>
                            </tr>
                            
                            <tr>
                                
                                <td style="border:none;padding:0px;" colspan="2">
                                   <center> <span>or Login with</span></center>
                                </td>
                            </tr>
                            <tr>
                                
                                <td style="border:none;padding:0px;" colspan="2">
					<center>
						<br/>
						<a href="<?php echo base_url();?>auth_oa2/session/facebook" > <span class= "facebook"><i class="fa fa-facebook"></i> | Facebook  </span> </a>
						<a href="<?php echo base_url();?>auth_oa2/session/google"> <span class="google"> <i class="fa fa-google-plus"></i> | Google+</span> </a>
					</center>
				</td>
                            </tr>
                        </table>
                    </form>
		    
		    
		    
                    <?php echo form_open($this->uri->uri_string(), array('class'=>'nicely')); ?>
                        <h2>REGISTER TO <span class="red"><strong>Mplan</strong></span></h2>
                        <?php echo $error_message; ?>
                        <table class="table success tb_align" style="margin-bottom:0px">
                            <tr>
                                
				<td class="col-xs-8 .col-sm-6 col-md-5" style="border:none;padding:0px;"> <?php echo form_input($email); ?> </td>
                            </tr>
                            <tr>
                                 <td style="border:none;padding:0px;"> <?php echo form_input($firstname); ?> </td>
                            </tr>
                            <tr>
                               <td style="border:none;padding:0px;"> <?php echo form_input($lastname); ?> </td>
                            </tr>
                            <tr>
                                <td style="border:none;padding:0px;"> <?php echo form_password($password); ?> </td>
                            </tr>
                            <tr>
                                 <td style="border:none;padding:0px;"> <?php echo form_password($confirm_password); ?> </td>
                            </tr>
                            <tr >
                                
                                <td style="border:none;padding:0px;">
                                    <select name="profile_for" required >
                                                                        <option value=""> Created By </option>
									<option value="self" label="Self" <?php echo set_select('profile_for', 'self'); ?>>Self</option>
									<option value="family" label="Family" <?php echo set_select('profile_for', 'family'); ?>>Family</option>
									<option value="friend" label="Friend" <?php echo set_select('profile_for', 'friend'); ?>>Friend</option>
									<option value="relative" label="Relative" <?php echo set_select('profile_for', 'relative'); ?>>Relative</option>
                                    </select>
                                </td>
				
                            </tr>
                            <tr>
				
                                <td style="border:none;padding:0px;height:35px;">
                                    Male <input type="radio" name="gender" value="male" style="margin:0px" required <?php echo set_radio('gender', 'male'); ?> >
				    Female <input type="radio" name="gender" value="female" style="margin:0px" required <?php echo set_radio('gender', 'female'); ?> >
                                </td>
			    </tr>
			    <!--
			    <tr>				
				<td style="border:none;padding:0px;" >
					<?php //$this->muse->get_religion("onchange='filter_data(this.value)'"); ?>
				</td>
			    </tr>
			    <tr>
				
				<td style="border:none;padding:0px;" id="community"> <select> <option> Select </option></select> </td>
			    </tr>
			    <tr>
				
				<td style="border:none;padding:0px;" >  <input type="text" name="sub_community" placeholder="Sub Community" value="<?php echo set_value('sub_community'); ?>"> </td>
			    </tr>
			    -->
			    
                            <tr>                                
                                <td style="border:none;padding:0px;">
                                    <select name="day" id="day" style="width:90px" required>
    <option value="" label="Day" selected="selected">Day</option>
    <option value="01" label="01">01</option>
    <option value="02" label="02">02</option>
    <option value="03" label="03">03</option>
    <option value="04" label="04">04</option>
    <option value="05" label="05">05</option>
    <option value="06" label="06">06</option>
    <option value="07" label="07">07</option>
    <option value="08" label="08">08</option>
    <option value="09" label="09">09</option>
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
    <option value="01" label="Jan">Jan</option>
    <option value="02" label="Feb">Feb</option>
    <option value="03" label="Mar">Mar</option>
    <option value="04" label="Apr">Apr</option>
    <option value="05" label="May">May</option>
    <option value="06" label="Jun">Jun</option>
    <option value="07" label="Jul">Jul</option>
    <option value="08" label="Aug">Aug</option>
    <option value="09" label="Sep">Sep</option>
    <option value="10" label="Oct">Oct</option>
    <option value="11" label="Nov">Nov</option>
    <option value="12" label="Dec">Dec</option>
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

                                </td>
                            </tr>
                            <tr>
                                <td style="border:none;padding:0px;"> <?php echo form_input($mobile_no); ?> </td>
                            </tr>
                            
                        </table>
                       
                        <button type="submit">REGISTER</button>
                    </form>
                </div>
                <!-- other method for login social login like facebook and google-->
                                
                
                <!-- end other method -->
                
            </div>
        </div>
	<!-- include for mobile number -->
        <script src="<?php echo base_url();?>build/js/intlTelInput.js"></script>
	
	<script>
	      $("#phone").intlTelInput({
		utilsScript: "lib/libphonenumber/build/utils.js"
	      });
	</script>
       <script src="<?php echo base_url();?>js/address.js"></script>
       <script src="<?php echo base_url();?>js/mplan.js"></script>
