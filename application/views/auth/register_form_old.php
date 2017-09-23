<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'class'	=> 'small input-text',
);
$firstname = array(
	'name'	=> 'firstname',
	'id'	=> 'firstname',
	'value'	=> set_value('firstname'),
	'maxlength'	=> 20,
	'class'	=> 'small input-text',
);
$lastname = array(
	'name'	=> 'lastname',
	'id'	=> 'lastname',
	'value'	=> set_value('lastname'),
	'maxlength'	=> 20,
	'class'	=> 'small input-text',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'small input-text',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'small input-text',
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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>codeigniter Facebook Google Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Language" content="en-us"/>
<meta http-equiv="Content-Style-Type" content="text/css"/>
<meta http-equiv="imagetoolbar" content="no"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

	
<link href="/css/main.css" media="all" rel="stylesheet" type="text/css"/>

</head>
<body>
<div id="wrapper">
	<div class="slim container">
		<div class="row">
			<div class="box01">
				<div class="login-window">
					<div id="header">
						<h1>Register</h1>
					</div>
					
					<?php echo $error_message; ?>

					<div class="row left10">

						<?php echo form_open($this->uri->uri_string(), array('class'=>'nicely')); ?>
							<?php echo form_label('Email', $email['id']); ?>
							<?php echo form_input($email); ?>
							
							<?php echo form_label('First Name', $firstname['id']); ?>
							<?php echo form_input($firstname); ?>

							<?php echo form_label('Last Name', $lastname['id']); ?>
							<?php echo form_input($lastname); ?>

							<?php echo form_label('Password', $password['id']); ?>
							<?php echo form_password($password); ?>

							<?php echo form_label('Confirm Password', $confirm_password['id']); ?>
							<?php echo form_password($confirm_password); ?>
							
							<label> Profile For </label>
							<select name="profile_for">
								<option value=""> Select </option>
									<option value="Self" label="Self">Self</option>
									<option value="Son" label="Son">Son</option>
									<option value="Daughter" label="Daughter">Daughter</option>
									<option value="Brother" label="Brother">Brother</option>
									<option value="Sister" label="Sister">Sister</option>
							</select>
							<label> Gender </label>
							Male <input type="radio" name="gender" value="male">
							Female <input type="radio" name="gender" value="female">
							
							<label> Date Of Birth </label>
							
							<select name="day" id="day" class="reg_day_select validate" tabindex="7">
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
<select name="month" id="month" class="reg_month_select validate" tabindex="8">
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
<select name="year" id="year" class="reg_year_select validate" tabindex="9">
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

<label> Religion </label>
<select name="community" id="community" class="reg_select_box validate" tabindex="10">
    <option value="" label="Select" selected="selected">Select</option>
    <option value="Hindu" label="Hindu">Hindu</option>
    <option value="Muslim" label="Muslim">Muslim</option>
    <option value="Christian" label="Christian">Christian</option>
    <option value="Sikh" label="Sikh">Sikh</option>
    <option value="Parsi" label="Parsi">Parsi</option>
    <option value="Jain" label="Jain">Jain</option>
    <option value="Buddhist" label="Buddhist">Buddhist</option>
    <option value="Jewish" label="Jewish">Jewish</option>
    <option value="No Religion" label="No Religion">No Religion</option>
    <option value="Spiritual - not religious" label="Spiritual">Spiritual</option>
    <option value="Other" label="Other">Other</option>
</select>
<label> Mother Tongue </label>
<select name="mother_tongue" id="mother_tongue" class="reg_select_box validate" tabindex="11">
    <option value="" label="Select" selected="selected">Select</option>
    <optgroup id="mother_tongue-optgroup-Frequently Used" label="Frequently Used">
    </optgroup>
    <option value="Assamese" label="Assamese">Assamese</option>
    <option value="Bengali" label="Bengali">Bengali</option>
    <option value="English" label="English">English</option>
    <option value="Gujarati" label="Gujarati">Gujarati</option>
    <option value="Hindi" label="Hindi">Hindi</option>
    <option value="Kannada" label="Kannada">Kannada</option>
    <option value="Konkani" label="Konkani">Konkani</option>
    <option value="Malayalam" label="Malayalam">Malayalam</option>
    <option value="Marathi" label="Marathi">Marathi</option>
    <option value="Marwari" label="Marwari">Marwari</option>
    <option value="Odia" label="Odia">Odia</option>
    <option value="Punjabi" label="Punjabi">Punjabi</option>
    <option value="Sindhi" label="Sindhi">Sindhi</option>
    <option value="Tamil" label="Tamil">Tamil</option>
    <option value="Telugu" label="Telugu">Telugu</option>
    <option value="Urdu" label="Urdu">Urdu</option>
    <optgroup id="mother_tongue-optgroup-More" label="More">
    </optgroup>
    <option value="Aka" label="Aka">Aka</option>
    <option value="Arabic" label="Arabic">Arabic</option>
    <option value="Awadhi" label="Awadhi">Awadhi</option>
    <option value="Bhojpuri" label="Bhojpuri">Bhojpuri</option>
    <option value="Chattisgarhi" label="Chattisgarhi">Chattisgarhi</option>
    <option value="Coorgi" label="Coorgi">Coorgi</option>
    <option value="Dogri" label="Dogri">Dogri</option>
    <option value="French" label="French">French</option>
    <option value="Garhwali" label="Garhwali">Garhwali</option>
    <option value="Garo" label="Garo">Garo</option>
    <option value="Haryanavi" label="Haryanavi">Haryanavi</option>
    <option value="Himachali/Pahari" label="Himachali/Pahari">Himachali/Pahari</option>
    <option value="Hindko" label="Hindko">Hindko</option>
    <option value="Kashmiri" label="Kashmiri">Kashmiri</option>
    <option value="Khasi" label="Khasi">Khasi</option>
    <option value="Kumaoni" label="Kumaoni">Kumaoni</option>
    <option value="Kutchi" label="Kutchi">Kutchi</option>
    <option value="Magahi" label="Magahi">Magahi</option>
    <option value="Maithili" label="Maithili">Maithili</option>
    <option value="Malay" label="Malay">Malay</option>
    <option value="Manipuri" label="Manipuri">Manipuri</option>
    <option value="Miji" label="Miji">Miji</option>
    <option value="Mizo" label="Mizo">Mizo</option>
    <option value="Nepali" label="Nepali">Nepali</option>
    <option value="Pashto" label="Pashto">Pashto</option>
    <option value="Persian" label="Persian">Persian</option>
    <option value="Rajasthani" label="Rajasthani">Rajasthani</option>
    <option value="Russian" label="Russian">Russian</option>
    <option value="Sanskrit" label="Sanskrit">Sanskrit</option>
    <option value="Sinhala" label="Sinhala">Sinhala</option>
    <option value="Spanish" label="Spanish">Spanish</option>
    <option value="Tulu" label="Tulu">Tulu</option>
    <option value="0" label="------------Show More------------">------------Show More------------</option>
</select>

<label> Living In </label> <select name="countryofresidence" id="countryofresidence" class="reg_select_box validate" tabindex="12">
    <option value="" label="Select">Select</option>
    <optgroup id="countryofresidence-optgroup-Frequently Used" label="Frequently Used">
    </optgroup>
    <option value="India" label="India" selected="selected">India</option>
    <option value="USA" label="USA">USA</option>
    <option value="United Kingdom" label="United Kingdom">United Kingdom</option>
    <option value="United Arab Emirates" label="United Arab Emirates">United Arab Emirates</option>
    <option value="Canada" label="Canada">Canada</option>
    <option value="Australia" label="Australia">Australia</option>
    <option value="New Zealand" label="New Zealand">New Zealand</option>
    <option value="Pakistan" label="Pakistan">Pakistan</option>
    <option value="Saudi Arabia" label="Saudi Arabia">Saudi Arabia</option>
    <option value="Kuwait" label="Kuwait">Kuwait</option>
    <option value="South Africa" label="South Africa">South Africa</option>
    <optgroup id="countryofresidence-optgroup-More" label="More">
    </optgroup>
    <option value="Afghanistan" label="Afghanistan">Afghanistan</option>
    <option value="Austria" label="Austria">Austria</option>
    <option value="Bahrain" label="Bahrain">Bahrain</option>
    <option value="Bangladesh" label="Bangladesh">Bangladesh</option>
    <option value="Belgium" label="Belgium">Belgium</option>
    <option value="Botswana" label="Botswana">Botswana</option>
    <option value="Brunei" label="Brunei">Brunei</option>
    <option value="Chile" label="Chile">Chile</option>
    <option value="China" label="China">China</option>
    <option value="Cyprus" label="Cyprus">Cyprus</option>
    <option value="Denmark" label="Denmark">Denmark</option>
    <option value="Dominican Republic" label="Dominican Republic">Dominican Republic</option>
    <option value="Fiji Islands" label="Fiji Islands">Fiji Islands</option>
    <option value="Finland" label="Finland">Finland</option>
    <option value="France" label="France">France</option>
    <option value="Germany" label="Germany">Germany</option>
    <option value="Greece" label="Greece">Greece</option>
    <option value="Guyana" label="Guyana">Guyana</option>
    <option value="Hong Kong SAR" label="Hong Kong SAR">Hong Kong SAR</option>
    <option value="Hungary" label="Hungary">Hungary</option>
    <option value="Indonesia" label="Indonesia">Indonesia</option>
    <option value="Iran" label="Iran">Iran</option>
    <option value="Ireland" label="Ireland">Ireland</option>
    <option value="Israel" label="Israel">Israel</option>
    <option value="Italy" label="Italy">Italy</option>
    <option value="Jamaica" label="Jamaica">Jamaica</option>
    <option value="Japan" label="Japan">Japan</option>
    <option value="Kenya" label="Kenya">Kenya</option>
    <option value="Malaysia" label="Malaysia">Malaysia</option>
    <option value="Maldives" label="Maldives">Maldives</option>
    <option value="Mauritius" label="Mauritius">Mauritius</option>
    <option value="Mexico" label="Mexico">Mexico</option>
    <option value="Nepal" label="Nepal">Nepal</option>
    <option value="Netherlands" label="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles" label="Netherlands Antilles">Netherlands Antilles</option>
    <option value="Norway" label="Norway">Norway</option>
    <option value="Oman" label="Oman">Oman</option>
    <option value="Philippines" label="Philippines">Philippines</option>
    <option value="Poland" label="Poland">Poland</option>
    <option value="Qatar" label="Qatar">Qatar</option>
    <option value="Russia" label="Russia">Russia</option>
    <option value="Singapore" label="Singapore">Singapore</option>
    <option value="Spain" label="Spain">Spain</option>
    <option value="Sri Lanka" label="Sri Lanka">Sri Lanka</option>
    <option value="Sweden" label="Sweden">Sweden</option>
    <option value="Switzerland" label="Switzerland">Switzerland</option>
    <option value="Tanzania" label="Tanzania">Tanzania</option>
    <option value="Thailand" label="Thailand">Thailand</option>
    <option value="Trinidad and Tobago" label="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="0" label="------------Show More------------">------------Show More------------</option>
</select>
<label> Mobile No. </label>
<select class="reg_country_code" name="country_code" id="country_code" tabindex="13">
								<option value="+93|Afghanistan" >Afghanistan (+93)</option><option value="+355|Albania" >Albania (+355)</option><option value="+213|Algeria" >Algeria (+213)</option><option value="+684|American Samoa" >American Samoa (+684)</option><option value="+376|Andorra" >Andorra (+376)</option><option value="+244|Angola" >Angola (+244)</option><option value="+1|Anguilla" >Anguilla (+1)</option><option value="+1|Antigua & Barbuda" >Antigua & Barbuda (+1)</option><option value="+54|Argentina" >Argentina (+54)</option><option value="+374|Armenia" >Armenia (+374)</option><option value="+61|Australia" >Australia (+61)</option><option value="+43|Austria" >Austria (+43)</option><option value="+994|Azerbaijan" >Azerbaijan (+994)</option><option value="+1|Bahamas" >Bahamas (+1)</option><option value="+973|Bahrain" >Bahrain (+973)</option><option value="+880|Bangladesh" >Bangladesh (+880)</option><option value="+1|Barbados" >Barbados (+1)</option><option value="+375|Belarus" >Belarus (+375)</option><option value="+32|Belgium" >Belgium (+32)</option><option value="+501|Belize" >Belize (+501)</option><option value="+1|Bermuda" >Bermuda (+1)</option><option value="+975|Bhutan" >Bhutan (+975)</option><option value="+591|Bolivia" >Bolivia (+591)</option><option value="+387|Bosnia and Herzegovina" >Bosnia and Herzegovina (+387)</option><option value="+267|Botswana" >Botswana (+267)</option><option value="+55|Brazil" >Brazil (+55)</option><option value="+1|Virgin Islands (British)" >Virgin Islands (British) (+1)</option><option value="+673|Brunei" >Brunei (+673)</option><option value="+359|Bulgaria" >Bulgaria (+359)</option><option value="+226|Burkina Faso" >Burkina Faso (+226)</option><option value="+257|Burundi" >Burundi (+257)</option><option value="+225|Cote d'Ivoire" >Cote d'Ivoire (+225)</option><option value="+855|Cambodia" >Cambodia (+855)</option><option value="+237|Cameroon" >Cameroon (+237)</option><option value="+1|Canada" >Canada (+1)</option><option value="+238|Cape Verde" >Cape Verde (+238)</option><option value="+1|Cayman Islands" >Cayman Islands (+1)</option><option value="+236|Central African Republic" >Central African Republic (+236)</option><option value="+235|Chad" >Chad (+235)</option><option value="+56|Chile" >Chile (+56)</option><option value="+86|China" >China (+86)</option><option value="+57|Colombia" >Colombia (+57)</option><option value="+269|Comoros" >Comoros (+269)</option><option value="+242|Congo" >Congo (+242)</option><option value="+682|Cook Islands" >Cook Islands (+682)</option><option value="+506|Costa Rica" >Costa Rica (+506)</option><option value="+385|Croatia (Hrvatska)" >Croatia (Hrvatska) (+385)</option><option value="+53|Cuba" >Cuba (+53)</option><option value="+357|Cyprus" >Cyprus (+357)</option><option value="+420|Czech Republic" >Czech Republic (+420)</option><option value="+850|North Korea" >North Korea (+850)</option><option value="+243|Congo (DRC)" >Congo (DRC) (+243)</option><option value="+45|Denmark" >Denmark (+45)</option><option value="+253|Djibouti" >Djibouti (+253)</option><option value="+1|Dominica" >Dominica (+1)</option><option value="+1|Dominican Republic" >Dominican Republic (+1)</option><option value="+670|East Timor" >East Timor (+670)</option><option value="+593|Ecuador" >Ecuador (+593)</option><option value="+20|Egypt" >Egypt (+20)</option><option value="+503|El Salvador" >El Salvador (+503)</option><option value="+240|Equatorial Guinea" >Equatorial Guinea (+240)</option><option value="+291|Eritrea" >Eritrea (+291)</option><option value="+372|Estonia" >Estonia (+372)</option><option value="+251|Ethiopia" >Ethiopia (+251)</option><option value="+500|Falkland Islands" >Falkland Islands (+500)</option><option value="+298|Faroe Islands" >Faroe Islands (+298)</option><option value="+679|Fiji Islands" >Fiji Islands (+679)</option><option value="+358|Finland" >Finland (+358)</option><option value="+33|France" >France (+33)</option><option value="+594|French Guiana" >French Guiana (+594)</option><option value="+689|French Polynesia" >French Polynesia (+689)</option><option value="+241|Gabon" >Gabon (+241)</option><option value="+220|Gambia" >Gambia (+220)</option><option value="+995|Georgia" >Georgia (+995)</option><option value="+49|Germany" >Germany (+49)</option><option value="+233|Ghana" >Ghana (+233)</option><option value="+350|Gibraltar" >Gibraltar (+350)</option><option value="+30|Greece" >Greece (+30)</option><option value="+299|Greenland" >Greenland (+299)</option><option value="+1|Grenada" >Grenada (+1)</option><option value="+590|Guadeloupe" >Guadeloupe (+590)</option><option value="+1|Guam" >Guam (+1)</option><option value="+502|Guatemala" >Guatemala (+502)</option><option value="+224|Guinea" >Guinea (+224)</option><option value="+245|Guinea-Bissau" >Guinea-Bissau (+245)</option><option value="+592|Guyana" >Guyana (+592)</option><option value="+509|Haiti" >Haiti (+509)</option><option value="+504|Honduras" >Honduras (+504)</option><option value="+852|Hong Kong SAR" >Hong Kong SAR (+852)</option><option value="+36|Hungary" >Hungary (+36)</option><option value="+354|Iceland" >Iceland (+354)</option><option value="+91|India"  selected='selected'>India (+91)</option><option value="+62|Indonesia" >Indonesia (+62)</option><option value="+98|Iran" >Iran (+98)</option><option value="+964|Iraq" >Iraq (+964)</option><option value="+353|Ireland" >Ireland (+353)</option><option value="+972|Israel" >Israel (+972)</option><option value="+39|Italy" >Italy (+39)</option><option value="+1|Jamaica" >Jamaica (+1)</option><option value="+81|Japan" >Japan (+81)</option><option value="+962|Jordan" >Jordan (+962)</option><option value="+7|Kazakhstan" >Kazakhstan (+7)</option><option value="+254|Kenya" >Kenya (+254)</option><option value="+686|Kiribati" >Kiribati (+686)</option><option value="+82|Korea" >Korea (+82)</option><option value="+965|Kuwait" >Kuwait (+965)</option><option value="+996|Kyrgyzstan" >Kyrgyzstan (+996)</option><option value="+856|Laos" >Laos (+856)</option><option value="+371|Latvia" >Latvia (+371)</option><option value="+961|Lebanon" >Lebanon (+961)</option><option value="+266|Lesotho" >Lesotho (+266)</option><option value="+231|Liberia" >Liberia (+231)</option><option value="+218|Libya" >Libya (+218)</option><option value="+423|Liechtenstein" >Liechtenstein (+423)</option><option value="+370|Lithuania" >Lithuania (+370)</option><option value="+352|Luxembourg" >Luxembourg (+352)</option><option value="+853|Macao SAR" >Macao SAR (+853)</option><option value="+261|Madagascar" >Madagascar (+261)</option><option value="+265|Malawi" >Malawi (+265)</option><option value="+60|Malaysia" >Malaysia (+60)</option><option value="+960|Maldives" >Maldives (+960)</option><option value="+223|Mali" >Mali (+223)</option><option value="+356|Malta" >Malta (+356)</option><option value="+596|Martinique" >Martinique (+596)</option><option value="+222|Mauritania" >Mauritania (+222)</option><option value="+230|Mauritius" >Mauritius (+230)</option><option value="+269|Mayotte" >Mayotte (+269)</option><option value="+52|Mexico" >Mexico (+52)</option><option value="+691|Micronesia" >Micronesia (+691)</option><option value="+373|Moldova" >Moldova (+373)</option><option value="+377|Monaco" >Monaco (+377)</option><option value="+976|Mongolia" >Mongolia (+976)</option><option value="+1|Montserrat" >Montserrat (+1)</option><option value="+212|Morocco" >Morocco (+212)</option><option value="+258|Mozambique" >Mozambique (+258)</option><option value="+95|Myanmar" >Myanmar (+95)</option><option value="+264|Namibia" >Namibia (+264)</option><option value="+674|Nauru" >Nauru (+674)</option><option value="+977|Nepal" >Nepal (+977)</option><option value="+31|Netherlands" >Netherlands (+31)</option><option value="+599|Netherlands Antilles" >Netherlands Antilles (+599)</option><option value="+687|New Caledonia" >New Caledonia (+687)</option><option value="+64|New Zealand" >New Zealand (+64)</option><option value="+505|Nicaragua" >Nicaragua (+505)</option><option value="+227|Niger" >Niger (+227)</option><option value="+234|Nigeria" >Nigeria (+234)</option><option value="+683|Niue" >Niue (+683)</option><option value="+672|Norfolk Island" >Norfolk Island (+672)</option><option value="+47|Norway" >Norway (+47)</option><option value="+968|Oman" >Oman (+968)</option><option value="+92|Pakistan" >Pakistan (+92)</option><option value="+507|Panama" >Panama (+507)</option><option value="+675|Papua New Guinea" >Papua New Guinea (+675)</option><option value="+595|Paraguay" >Paraguay (+595)</option><option value="+51|Peru" >Peru (+51)</option><option value="+63|Philippines" >Philippines (+63)</option><option value="+672|Pitcairn Islands" >Pitcairn Islands (+672)</option><option value="+48|Poland" >Poland (+48)</option><option value="+351|Portugal" >Portugal (+351)</option><option value="+1|Puerto Rico" >Puerto Rico (+1)</option><option value="+974|Qatar" >Qatar (+974)</option><option value="+262|Reunion" >Reunion (+262)</option><option value="+40|Romania" >Romania (+40)</option><option value="+7|Russia" >Russia (+7)</option><option value="+250|Rwanda" >Rwanda (+250)</option><option value="+290|St. Helena" >St. Helena (+290)</option><option value="+1|St. Kitts and Nevis" >St. Kitts and Nevis (+1)</option><option value="+1|St. Lucia" >St. Lucia (+1)</option><option value="+508|St. Pierre and Miquelon" >St. Pierre and Miquelon (+508)</option><option value="+1|St. Vincent & Grenadines" >St. Vincent & Grenadines (+1)</option><option value="+685|Samoa" >Samoa (+685)</option><option value="+378|San Marino" >San Marino (+378)</option><option value="+239|Sao Tome and Principe" >Sao Tome and Principe (+239)</option><option value="+966|Saudi Arabia" >Saudi Arabia (+966)</option><option value="+221|Senegal" >Senegal (+221)</option><option value="+381|Serbia" >Serbia (+381)</option><option value="+248|Seychelles" >Seychelles (+248)</option><option value="+232|Sierra Leone" >Sierra Leone (+232)</option><option value="+65|Singapore" >Singapore (+65)</option><option value="+421|Slovakia" >Slovakia (+421)</option><option value="+386|Slovenia" >Slovenia (+386)</option><option value="+677|Solomon Islands" >Solomon Islands (+677)</option><option value="+252|Somalia" >Somalia (+252)</option><option value="+27|South Africa" >South Africa (+27)</option><option value="+34|Spain" >Spain (+34)</option><option value="+94|Sri Lanka" >Sri Lanka (+94)</option><option value="+249|Sudan" >Sudan (+249)</option><option value="+597|Suriname" >Suriname (+597)</option><option value="+268|Swaziland" >Swaziland (+268)</option><option value="+46|Sweden" >Sweden (+46)</option><option value="+41|Switzerland" >Switzerland (+41)</option><option value="+963|Syria" >Syria (+963)</option><option value="+886|Taiwan" >Taiwan (+886)</option><option value="+992|Tajikistan" >Tajikistan (+992)</option><option value="+255|Tanzania" >Tanzania (+255)</option><option value="+66|Thailand" >Thailand (+66)</option><option value="+389|Macedonia" >Macedonia (+389)</option><option value="+228|Togo" >Togo (+228)</option><option value="+690|Tokelau" >Tokelau (+690)</option><option value="+676|Tonga" >Tonga (+676)</option><option value="+1|Trinidad and Tobago" >Trinidad and Tobago (+1)</option><option value="+216|Tunisia" >Tunisia (+216)</option><option value="+90|Turkey" >Turkey (+90)</option><option value="+993|Turkmenistan" >Turkmenistan (+993)</option><option value="+1|Turks and Caicos Islands" >Turks and Caicos Islands (+1)</option><option value="+688|Tuvalu" >Tuvalu (+688)</option><option value="+256|Uganda" >Uganda (+256)</option><option value="+380|Ukraine" >Ukraine (+380)</option><option value="+971|United Arab Emirates" >United Arab Emirates (+971)</option><option value="+44|United Kingdom" >United Kingdom (+44)</option><option value="+1|Virgin Islands" >Virgin Islands (+1)</option><option value="+598|Uruguay" >Uruguay (+598)</option><option value="+1|USA" >USA (+1)</option><option value="+998|Uzbekistan" >Uzbekistan (+998)</option><option value="+678|Vanuatu" >Vanuatu (+678)</option><option value="+58|Venezuela" >Venezuela (+58)</option><option value="+84|Vietnam" >Vietnam (+84)</option><option value="+681|Wallis and Futuna" >Wallis and Futuna (+681)</option><option value="+967|Yemen" >Yemen (+967)</option><option value="+381|Yugoslavia" >Yugoslavia (+381)</option><option value="+260|Zambia" >Zambia (+260)</option><option value="+263|Zimbabwe" >Zimbabwe (+263)</option><option value="+297|Aruba" >Aruba (+297)</option><option value="+229|Benin" >Benin (+229)</option><option value="+599|Caribbean Netherlands" >Caribbean Netherlands (+599)</option><option value="+246|British Indian Ocean Territory" >British Indian Ocean Territory (+246)</option><option value="+599|Curacao" >Curacao (+599)</option><option value="+379|Vatican City" >Vatican City (+379)</option><option value="+692|Marshall Islands" >Marshall Islands (+692)</option><option value="+1|Northern Mariana Islands" >Northern Mariana Islands (+1)</option><option value="+680|Palau" >Palau (+680)</option><option value="+970|Palestine" >Palestine (+970)</option><option value="+590|Saint Barthelemy" >Saint Barthelemy (+590)</option><option value="+590|Saint Martin (French part)" >Saint Martin (French part) (+590)</option><option value="+211|South Sudan" >South Sudan (+211)</option><option value="+670|Timor-Leste" >Timor-Leste (+670)</option><option value="+382|Montenegro" >Montenegro (+382)</option>							</select>


<input type="text" maxlength="10" name="mobile_no">


							
							<?php echo $captcha_content; ?>

							<div class="logbtn regbtn_margin">
								<button type="submit" id="loginBtn" class="nice radius button white">Register</button>
							</div>
						</form>
					</div>

					<div id="account-signup-divider" class="shared-divider">
						<div class="shared-divider-label">
							<span>or Register with</span>
						</div>
					</div>
					<div id="connect-with-buttons">
						<a href="/auth_oa2/session/facebook" class="connect-with-button account-sprites account-sprites-facebook" title="Facebook Connect"></a>
						<a href="/auth_oa2/session/google" class="connect-with-button marginleft13 account-sprites account-sprites-google" title="Google"></a>
					</div>
				</div>

		    <div style=margin-top:10px;>
		        
		    </div>

			</div>
		</div>
	</div>
</div>
</body>
</html>