<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*************************************************
 * Muse Libraries is make for easy for many time using function like mother tougne etc.
 * Author : Shiva Manhar (shivamanhar)
 * Class Name: Muse
 * Descripation : esay for mplan development
 */
class Muse
{
        function __construct()
	{
            
            $ci =  & get_instance();
            $ci->load->model('matri');
                       
        }
	function gheight($hname=NULL, $class=NULL, $event=NULL)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data['gheight'] = $ci->matri->global_select('height');
		echo "<select name='".$hname."' class='".$class."' ".$event.">";
		echo "<option value=''>Select </option>";
		foreach($data['gheight']->result() as $row)
		{
			echo "<option value='".$row->id."' ". set_select($hname, $row->id) .">".$row->global_height."</option>";
		}
			echo "</select>";
			echo "<script type='text/javascript'>
			$(document).ready(function(){
			$('select[name=$hname]').val(11);
				  });
			</script>";
	}
        function mother_tongue($event= NULL)
        {
            $ci =  & get_instance();
            $ci->load->model('matri');
            
                        $data['mother_tongue'] = $ci->matri->global_select('mother_tongue');
                        
                        echo "<select name='mtongue' id='mtongue' ".$event.">";
                        echo "<option value=''> Mother Tongue </option>";
                        foreach($data['mother_tongue']->result() as $row)
                        {
                        echo "<option value='".$row->id."' ". set_select('mtongue', $row->id) .">".ucfirst($row->mtongue)."</option>";
                        }
                        echo "</select>";
        }
	function mtongue()
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
                        $data['mother_tongue'] = $ci->matri->global_select('mother_tongue');
                        foreach($data['mother_tongue']->result() as $row)
                        {
                        echo "<option value='".$row->id."' ". set_select('mtongue', $row->id) .">".ucfirst($row->mtongue)."</option>";
                        }
                        
	}
	function get_religion($event= NULL)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data['religion'] = $ci->matri->global_select('religion');
		 echo "<select name='religion' id='religion' ".$event.">";
                            echo "<option value=''>  Religion </option>";
		    if(isset($data['religion']))
                            {
                                foreach($data['religion']->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucfirst($row->religion_name)."</option>";
                                }
                            }
		echo "</select>";
                         
	}
	function get_community($religion_id = NULL)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data['community'] = $ci->matri->get_community('community' ,'religion_id', $religion_id );
		
		echo "<select name='community' id='community'> ";
		echo "<option value=''>  Community </option>";
		foreach($data['community']->result() as $row)
		{
			echo "<option value='".$row->id."'>".ucwords($row->community_name)."</option>";	
		}
		echo "</select>";
	}
	function edu_level($event= NULL)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data['edu_level'] = $ci->matri->global_select('education_level'); //retrive in data base
                
			echo "<select name='edu_level' id='edu_level' ".$event.">";
                        echo "<option value=''>Education Level</option>";
                        
                            if(isset($data['edu_level']))
                            {
                                foreach($data['edu_level']->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucwords($row->edu_level)."</option>";
                                }
                            }
                        
                        echo"</select>";
	}
	function edu_field($event= NULL)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data['edu_field'] = $ci->matri->global_select('education_field'); //retrive in data base
                echo "<select name='edu_field' ".$event.">";
                            echo "<option value=''> Select</option>";
                            
                            if(isset($data['edu_field']))
                            {
                                foreach($data['edu_field']->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucwords($row->edu_field)."</option>";
                                }
                            }
                        echo "</select>";
	
	}
	function work_with($event= NULL)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data['work_with'] = $ci->matri->global_select('working_with'); //retrive in data base
                 echo "<select name='work_with' ".$event.">";
                            echo "<option value=''> Select</option>";
                            
                            if(isset($data['work_with']))
                            {
                                foreach($data['work_with']->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucwords($row->work_with)."</option>";
                                }
                            }
                        echo "</select>";
	
	}
	function work_as($event= NULL)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data['work_as'] = $ci->matri->global_select('working_as'); //retrive in data base
		echo "<select name='work_as' ".$event.">";
                            echo "<option value=''> Select</option>";
                            
                            if(isset($data['work_as']))
                            {
                                foreach($data['work_as']->result() as $row)
                                {
                                    echo "<option value='".$row->id."'>".ucwords($row->work_as)."</option>";
                                }
                            }
                            
                        echo "</select>";
	}
	function annual_income($event= NULL)
	{
		
		$ci =  & get_instance();
		$ci->load->model('matri');
		
	}
	//access user information
	function user_all_data($user_id = NULL)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		
		$data['user_info']		= $ci->matri->global_where('users', array('id'=> $user_id));
		$data['hobbies']		= $ci->matri->global_where('user_hobbies',array('user_id'=>$user_id));
		$data['user_profiles']		= $ci->matri->global_where('user_profiles', array('user_id'=>$user_id));
		$data['user_lifestyle']		= $ci->matri->global_where('user_lifestyle', array('user_id'=>$user_id));
		$data['user_family']		= $ci->matri->global_where('user_family', array('user_id' => $user_id));
		$data['hobbies']		= $ci->matri->global_where('user_hobbies', array('user_id' => $user_id));
		$data['user_background'] 	= $ci->matri->get_user_background($user_id);
		$data['user_edu']		= $ci->matri->select_edu();
		return $data;
	}
	
	/*for redirect page and method */
	function userinfo_check($user_id)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		/*check user already insert data or not */		
		$data['userfolder'] = $ci->matri->global_where('userfolder', array('user_id'=>$user_id));
		
		if($data['userfolder']->num_rows() > 0)
		{
			$field_val = array(
					   'user_id' => $user_id,
					   'profile_img' => 1
					   );
			$data['user_file'] = $ci->matri->and_where('user_file', $field_val);
			if($data['user_file']->num_rows() > 0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}		
	}
	
	//age calculation
	function agecal($dob)
	{
			if(!empty($dob))
			{
					$now = time();
 
                                        # calculate differences between timestamp and current Y/m/d
                                        $yearDiff   = date("Y", $now) - date("Y", $dob);
                                        $monthDiff  = date("m", $now) - date("m", $dob);
                                        $dayDiff    = date("d", $now) - date("d", $dob);
                                                                 
                                        # check if we already had our birthday
                                        if ($monthDiff < 0)
                                                $yearDiff--;
                                        elseif (($monthDiff == 0) && ($dayDiff < 0))
                                                $yearDiff--;
                                                                 
                                        # set the result: age in years
                                        $result = intval($yearDiff);
                                                                 
                                        # deliver the result
                                        return  $result; 
			}else
			{
					return 0;
			}
	}
	
	
	//check for user is male or female
	function sex_match($user_id = null)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		
		if($user_id == NULL)
		{
			return 0;
		}
		else
		{
			$user = $ci->matri->global_where('users', array('id'=>$user_id));
			foreach($user->result() as $row)
			{
				$sex = $row->gender;
			}
			if($sex == 'male')
			{
				return 'female';
			}
			else
			{
				return 'male';
			}
		}
	}
	
	//function for data match //	
	function mymatch($field_val , $per_page, $page_segment)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data = $ci->matri->muser_data($field_val, $per_page, $page_segment);
		return $data;
	}
	//complete user profile //
	function complete_user_profile($table_name, $field_val)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		/*check user already insert data or not */
		
		$data['user_profiles'] = $ci->matri->and_where($table_name, $field_val );		
		/*end user already exists data */
			if($data['user_profiles']->num_rows() > 0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
	}
	//*partner profile complete or not check */
	function complete_partner_info($user_id)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		/*check user already insert data or not */
		$field_val = array(
			'user_id' => $user_id,
			'pprofile_complete'=>1
				);
		$data['user_profiles'] = $ci->matri->and_where('partner_basic', $field_val );		
		/*end user already exists data */
		
			if($data['user_profiles']->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
	}
	function complete_partner_detail($user_id)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$field_val = array(
			'user_id' => $user_id
			);
		$data['user_profiles'] = $ci->matri->and_where('partner_edu', $field_val );		
		/*end user already exists data */
		
			if($data['user_profiles']->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
	}
	function global_complete_partner_detail($user_id, $table_name)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$field_val = array(
			'user_id' => $user_id
			);
		$data['user_profiles'] = $ci->matri->and_where($table_name, $field_val );		
		/*end user already exists data */
		
			if($data['user_profiles']->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
	}
	//partner background display
	function partner_background($key, $field)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$my_value = NULL;
		
		$data['get_value'] = $ci->matri->get_partner_background($key);
		foreach($data['get_value']->result() as $row)
		{
			$my_value = $row->$field;
		}		
			return $my_value; 		
		
	}
	//display data any table any field */
	function display_value($table, $where_field, $field)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$my_value = NULL;
		$data['get_value'] = $ci->matri->get_some_value($table, $where_field);
		foreach($data['get_value']->result() as $row)
		{
			$my_value = $row->$field;
		}		
			return $my_value; 		
		
	}
	//display data any table any field */
	function display_basic_info($table, $where_field, $field)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$my_value = NULL;
		
		$data['get_value'] = $ci->matri->global_where($table, $where_field);
		
		foreach($data['get_value']->result() as $row)
		{
			$my_value = $row->$field;
		}		
			return $my_value;
		
	}
	function display_edu_info($data_where, $field)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$my_value = NULL;
		
		$data['get_value'] = $ci->matri->select_edu($data_where);
		
		foreach($data['get_value']->result() as $row)
		{
			$my_value = $row->$field;
		}		
			return $my_value; 
	}
	//user background
	function display_background($user_id, $field)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$my_value = NULL;
		$data['get_value'] = $ci->matri->get_user_background($user_id);
		
		foreach($data['get_value']->result() as $row)
		{
			$my_value = $row->$field;
		}		
			return $my_value; 
	}
	//get more where condition */
	function display_value_where($table, $field, $get_value)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		if((isset($table)) && (isset($field)))
		{
			$data['get_value'] = $ci->matri->and_where($table, $field);
			if(isset($data['get_value']))
			{
				foreach($data['get_value']->result() as $row)
				{
					$value = $row->$get_value;
					return $value;
				}
			}
			return "NULL";
		}
		return "NULL";
		
	}
	//get more where condition */
	function get_userfile($field, $get_value)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		if(isset($field))
		{
			$data['get_value'] = $ci->matri->global_where('user_file', $field);
			if(isset($data['get_value']))
			{
				foreach($data['get_value']->result() as $row)
				{
					$value = $row->$get_value;
					return $value;
				}
			}
			return NULL;
		}
		return NULL;
		
	}
	
	
	//display education data */
	function get_edu_value($user_id, $field)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$data['edu_value'] =$ci->matri->get_partner_education($user_id);
		
		
		foreach($data['edu_value']->result() as $row)
		{
			$field_value = $row->$field;
		}
		if($field_value != NULL)
		{
			return $field_value;
		}
		else
		{
			$field_value = NULL;
			return $field_value;
		}
	}
	//google analysis account setting //
	function google_analysis()
	{
		?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');		
		  ga('create', 'UA-63183737-1', 'auto');
		  ga('send', 'pageview');		
		</script>
		<?php
	}
	//account create send message//
	
	//send feedback message //
	function send_feedback($email,$subject, $message)
	{
		$ci =  & get_instance();
		$ci->load->library('email');
		$ci->email->from('info@mplan.in', 'Mplan');
		$ci->email->to('solutions@orbitplus.org');
		$ci->email->subject($subject);
		$ci->email->message("Email Id.-".$email."<br/><hr/>".$message);
		return $ci->email->send();
	}
	//account create send message//
	
	function new_account_message($email_id)
	{
		$to = $email_id;
		$subject = "Welcome";
		
		$message = "
		<html>
		<head>
		<title>Welcome to mplan.in</title>
		</head>
		<body>
		<p>Welcome to mplan.in</p>
		<table>
		<tr>
		<th>Firstname</th>
		<th>Lastname</th>
		</tr>
		<tr>
		<td>Email : <?php echo $email_id;?> Verify</td>
		<td>Phone : <?php echo $email_id;?> Verify</td>
		<td></td>
		</tr>
		</table>
		Best Wishes
		Chandra Kant
		Community Manager
		Mplan.in
		
		For Matrimonial assistance
		Call us at : 0771-2273816
		Timing: 9:00 AM To 6:00 PM (All Week Day)
		Send Your Feedback with any query as comments
		</body>
		</html>
		";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <info@mplan.in>' . "\r\n";
		
		
		mail($to,$subject,$message,$headers);
		
	}
	
}