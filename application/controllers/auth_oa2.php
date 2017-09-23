<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_oa2 extends CI_Controller
{
  
    public function session($provider_name)
    {
				$this->load->helper('url_helper');
				$this->load->library('oauth2/OAuth2');
				$this->load->library('tank_auth');
				$this->load->model('tank_auth/users');
				$this->load->config('oauth2', TRUE);
				$provider = $this->oauth2->provider($provider_name, array(
				'id' => $this->config->item($provider_name.'_id', 'oauth2'),
				'secret' => $this->config->item($provider_name.'_secret', 'oauth2'),
				));
	    
	if($this->tank_auth->is_logged_in())
	{
	    redirect('/welcome');
	}

        if (!$this->input->get('code'))
        {
            // By sending no options it'll come back here
            $provider->authorize();
        }
        else
        {
	    try
            {
			$token = $provider->access($this->input->get('code'));
			$user = $provider->get_user_info($token);
		       
			if(!$this->users->get_user_by_email($provider_name.'|'.$user['email']))
			{
			    //if user in not over database
									    if (!is_null($data = $this->tank_auth->create_user_oa2($user['email'],$provider_name,$user['first_name'],$user['last_name'], $user['gender'])))
									    {
										    // success
											$data['site_name'] = $this->config->item('website_name', 'tank_auth');
		    
											    if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email
					    
												    $this->_send_email('welcome', $data['email'], $data);
											    }
										     redirect('/user_profile/');// echo "you are account is succussful create !"; // home page redirect here
		    
									    } else {
										    $errors = $this->tank_auth->get_error_message();
										    foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
									    }
			    
			    
			}
			else
			{
			    if($this->tank_auth->login_oa2( $provider_name.'|'.$user['email'], $user['image'] ))
			    {
				    redirect('/welcome');
			    }
			    else
			    {
				//here is other case  banned user
				    					$errors = $this->tank_auth->get_error_message();
									if (isset($errors['banned'])) {								// banned user
										$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);
				
									} elseif (isset($errors['not_activated'])) {				// not activated user
										redirect('/auth/send_again/');
				
									} else {													// fail
										foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
									}
								
			    }
			}
	    }
	    catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }
        }
    }


	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
	}
}?>