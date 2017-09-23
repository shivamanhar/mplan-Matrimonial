<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		} else
		{
			redirect('/user_profile/');
		}
	}
	function contact_us()
	{
		$data['keywords'] ='matrimony, matrimonials, matchmaking, brides, grooms, matrimonial blog';
		$data['descripation'] ='Mplan.in best matrimonial service website. We are providing online matchmaking. We are using advanced search technology. Registraion is free. Create your profile and start searching for prospective brides and grooms today';
		
		$data['page'] = 'commen/contact';
		$this->load->view('commen/containt',$data);
	}
	function privacypolicy()
	{
		$data['page'] = 'commen/privacypolicy';
		$this->load->view('commen/containt',$data);
	}
	function terms_conditions()
	{
		$data['page'] = 'commen/terms-conditions';
		$this->load->view('commen/containt',$data);
	}
	function send_message()
	{
		$this->form_validation->set_rules('email','Email','email|required|trim|strtolower|strip_tags'); 
		$this->form_validation->set_rules('subject','Subject','|trim|strip_tags');
		$this->form_validation->set_rules('message','Message','|trim|strip_tags|required'); 
		if($this->form_validation->run() == false)
		{
			$this->contact_us();
		}
		else
		{
			$email = strip_tags($this->input->post('email'));
			$subject = strip_tags($this->input->post('subject'));
			$message = strip_tags($this->input->post('message'));
			if($this->muse->send_feedback($email, $subject, $message) == true)
			{
				$data = array(
				      'email' => $email,
				      'subject'=>$subject,
				      'message'=>$message
				      );
				$query = $this->matri->global_insert('feedback_message', $data);
				if($query>0)
				{
					echo "Message Successful Send";
				}
			}
			else
			{
				$this->contact_us();
			}
		}
	}
	
}
?>