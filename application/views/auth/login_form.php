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
	'class'	=> 'form-control',
);
$firstname = array(
	'name'	=> 'firstname',
	'id'	=> 'firstname',
	'value'	=> set_value('firstname'),
	'maxlength'	=> 20,
	'required' =>'required',
	'placeholder'=>'Full Name ',
	'class'	=> 'form-control',
	
);
$lastname = array(
	'name'	=> 'lastname',
	'id'	=> 'lastname',
	'value'	=> set_value('lastname'),
	'maxlength'	=> 20,
	'required' =>'required',
	'placeholder'=>'Last Name ',
	'class'	=> 'form-control',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	
	'required' =>'required',
	'placeholder'=>'Password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'form-control',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	
	'required' =>'required',
	'placeholder'=>'Confirm Password ',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'form-control',
);
$mobile_no = array(
	'type' =>'tel',
	'name' => 'mobile_no',
	'required' =>'required',
	'id' => 'phone',
	'placeholder'=>'Mobile No',
	'value' => set_value('mobile_no'),
	
	'class'	=> 'form-control',
		   );
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);

$error_message1 = '';
if( form_error($email['name']) !=''){
$error_message1 = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($email['name']) )."</small>";
}

if(isset($errors[$email['name']])){
$error_message1 .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$email['name']] )."</small>";
}

if( form_error($firstname['name']) !='' ){
$error_message1 .= "<small class=\"error\">".form_error($firstname['name'])."</small>";
}

if(isset($errors[$firstname['name']])){
$error_message1 .= "<small class=\"error\">".$errors[$firstname['name']]."</small>";
}

if( form_error($lastname['name']) !='' ){
$error_message1 .= "<small class=\"error\">".form_error($lastname['name'])."</small>";
}

if(isset($errors[$lastname['name']])){
$error_message1 .= "<small class=\"error\">".$errors[$lastname['name']]."</small>";
}

if( form_error($password['name']) !='' ){
$error_message1 .= "<small class=\"error\">".form_error($password['name'])."</small>";
}

if( form_error($confirm_password['name']) !='' ){
$error_message1 .= "<small class=\"error\">".form_error($confirm_password['name'])."</small>";
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
$error_message1 = "<small class=\"error\">".form_error('recaptcha_response_field')."</small>";
}

if( form_error($captcha['name']) !=''){
$error_message1 .= "<small class=\"error\">".form_error($captcha['name'])."</small>";
}

if( form_error('terms_conditions') !='' ){
$error_message1 .= "<small class=\"error\">".form_error('terms_conditions')."</small>";
}

?>

<?php

$login = array(
	'type' => 'email',
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'class'	=> 'form-control',
	'placeholder'=>'Userid',
);
if(isset($login_by_username) AND isset($login_by_email))
{
	if ($login_by_username AND $login_by_email) {
		$login_label = 'Email or login';
	} else if ($login_by_username) {
		$login_label = 'Login';
	} else {
		$login_label = 'Email';
	}
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'placeholder' => 'Password',
	'class'	=> 'form-control',//small input-text',
	'placeholder'=>'Password',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
);

	$captcha = array(
		'name'	=> 'captcha',
		'id'	=> 'captcha',
		'maxlength'	=> 8,
	);


$error_message = '';
if( form_error($login['name']) !=''){
$error_message = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($login['name']) )."</small>";
}

if(isset($errors[$login['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$login['name']] )."</small>";
}

if( form_error($password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($password['name'])."</small>";
}



if(isset($errors[$password['name']])){
$error_message .= "<small class=\"error\">".$errors[$password['name']]."</small>";
}

	$captcha_content = '';
if(isset($show_captcha))
{
	if ($show_captcha) {
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
	
			<div id="account-signup-divider" class="shared-divider"></div>';
	
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
}
?>
<!-- include for mobile number -->
		
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
		<link rel="stylesheet" href="<?php echo base_url();?>build/css/intlTelInput.css">
<!-- end  -->
<link href="<?php echo base_url();?>css/menu_style.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/menu_color.css" rel="stylesheet"> 

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>
   <!--  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- block -menu 
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#intro">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#service">Service</a></li>
                </ul>
            </div> -->
            <!-- /.navbar-collapse -->
        <!-- </div>
        <!-- /.container 
    </nav>  -->
	
	<div class="register-container container ">
		<div class="row">
                    
			<div class="col-md-7">
                            <div style="color:#fff;">
                               
                                <h1> Mplan.in | Online Matrimonial</h1>
                                <h2> Join us, It's 100% FREE Registration</h2>                           
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="register login_margin" id='mm' >
                            <form action="<?php echo base_url();?>auth/login" method="post" class='nicely'>
                            <h4>Login To <span class="red"><strong>Mplan</strong></span></h4>
                            <?php echo $error_message; ?>
                            <table class="table success tb_align no_border" style="margin-bottom:0px">
                                <tr>
                                    
                                    <td class="col-xs-8 col-sm-6"  colspan="2"> <?php echo form_input($login); ?> </td>
                                </tr>
                                <tr>
                                    <td  colspan="2"> <?php echo form_password($password); ?> </td>
                                </tr>
                                <tr>
                                    <td style="width:40%;" >
                                    
                                    <?php echo form_checkbox($remember); ?> Remember me. <br/>
                                    <a href="<?php echo base_url();?>auth/forgot_password/" class="forgot">Forgot your password?</a>
                                    </td>
                                    <td>
                                                    <button type="submit" id="loginBtn" class="btn btn-primary" style="margin-top:5px;width:80px;"> Login</button>
                                            
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2 " >  </td> <td ><?php echo $captcha_content; ?></td>
                                </tr>
                            </table>
                            </form>
                            </div>
                            
                            <!-- Registration  -->
                            <div class="register" id='mm'>
                                <!-- User Register -->
		   <form action="<?php echo base_url();?>auth/register" method="post" class='nicely'>
                        <h4>Register To <span class="red"><strong>Mplan</strong></span></h4>
                        <?php echo $error_message1; ?>
                        <table class="table success tb_align no_border" style="margin-bottom:0px">
                            
                            <tr>
                                 <td > <?php echo form_input($firstname); ?>  </td>
                            </tr>
                            <tr>
				<td class="col-xs-8 .col-sm-6 col-md-5" > <?php echo form_input($email); ?> </td>
                            </tr>
                           
                            <tr>
                                <td > <?php echo form_password($password); ?> </td>
                            </tr>
                           
                            <tr >
                                
                                <td >
                                    <select name="profile_for" class = 'form-control' required >
                                        <option value=""> Created By </option>
					<option value="self" label="Self" <?php echo set_select('profile_for', 'self'); ?> selected>Self</option>
					<option value="family" label="Family" <?php echo set_select('profile_for', 'family'); ?>>Family</option>
					<option value="friend" label="Friend" <?php echo set_select('profile_for', 'friend'); ?>>Friend</option>
					<option value="relative" label="Relative" <?php echo set_select('profile_for', 'relative'); ?>>Relative</option>
                                    </select>
                                </td>
				
                            </tr>
                            <tr>
				
                                <td style="height:35px;">
					<center>
                                    <i class="fa fa-male"> </i>  Male <input type="radio" name="gender" value="male" style="margin:0px" required <?php echo set_radio('gender', 'male'); ?> > 
				    &nbsp;&nbsp;&nbsp;<i class="fa fa-female"> </i> Female <input type="radio" name="gender" value="female" style="margin:0px" required <?php echo set_radio('gender', 'female'); ?> >
					</center>
				</td>
			    </tr>
                            <tr>
                                
                                <td >
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
                                            <option value="01" label="January">January</option>
                                            <option value="02" label="February">February</option>
                                            <option value="03" label="March">March</option>
                                            <option value="04" label="April">April</option>
                                            <option value="05" label="May">May</option>
                                            <option value="06" label="June">June</option>
                                            <option value="07" label="July">July</option>
                                            <option value="08" label="August">August</option>
                                            <option value="09" label="September">September</option>
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

                                </td>
                            </tr>
                            <tr>
                                <td > <?php echo form_input($mobile_no); ?> </td>
                            </tr>
                            <tr>
                                <td > <input type="checkbox" name="terms_conditions" checked> I agree to the <a href="<?php echo base_url();?>privacypolicy"> Privacy Policy </a> and <a href="<?php echo base_url();?>terms-conditions"> T&C </a></td>
                            </tr>
                            <tr>
				<td>
				<button type="submit" class="btn btn-primary">REGISTER <i class="fa fa-sign-in"></i> </button>
				</td>
			    </tr>
                        </table>
                    </form>
                            </div>
                        </div>
                </div>
        </div>
<!-- include for mobile number -->
        <script src="<?php echo base_url();?>build/js/intlTelInput.js"></script>
	
	
	<script>
	      $("#phone").intlTelInput({
		utilsScript: <?php echo "'".base_url()."lib/libphonenumber/build/utils.js'";?>
	      });
	</script> 
       <!--<script src="<?php //echo base_url();?>js/address.js"></script>
       <script src="<?php //echo base_url();?>js/mplan.js"></script>-->
 
	
