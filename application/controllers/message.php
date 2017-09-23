<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*

 * Author: Shiva Manhar (shivamanhar)

 * Date:1/11/2015

 * class Name: Message

 * Descripation: Send message and display message
 *
 * */

class Message extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		if (!$this->tank_auth->is_logged_in())

		{
			redirect('/auth/login/');
		}

	}
        function send_message()
        {
		$this->form_validation->set_rules('send_to','','trim|required');
		$this->form_validation->set_rules('message','Message','trim|required|strip_tags'); 
		if($this->form_validation->run() == false)
		{
			redirect('forme/get_user/'.$this->input->post('send_to')."?msg=".form_error('message'));
		}
		else
		{
			$data = array(
					'user_id'=>(int)$this->tank_auth->get_user_id(),
				      'send_to'=>(int)$this->input->post('send_to'),
				      'message'=> strip_tags(trim($this->input->post('message'))),
				      'date'=>strtotime(date('d-m-Y'))
				      );
			$send_data = array(
					   'user_id'=>(int)$this->input->post('send_to'),
				      'from_to'=>$this->tank_auth->get_user_id(),
				      'message'=> $this->input->post('message'),
				      'date'=>strtotime(date('d-m-Y'))
					   );
			 $mail_data['message'] = strip_tags(trim($this->input->post('message')));
			 $mail_data['name'] = $this->muse->display_value('users', array('id'=>(int)$this->input->post('send_to')),'firstname');
			 $mail_data['sender_name'] = $this->muse->display_value('users', array('id'=>(int)$this->tank_auth->get_user_id()),'firstname');
			$mail_data['email'] = $this->muse->display_value('users', array('id'=>(int)$this->input->post('send_to')),'email');
			
			
			$this->_send_email($mail_data['name']."has sent you a message",$mail_data['email'], $mail_data);
			 if(($this->matri->global_insert('send_message', $data)>0) AND ($this->matri->global_insert('message_inbox', $send_data)>0))
			 {
				redirect('forme/get_user/'.$this->input->post('send_to')."?msg=Message successful send");	
			 }
		}
        }
	function send_message_inbox()
	{
		$data['page'] =     'muser/send_message';
		$data['title'] =    'Muser | Home Page | Mplan';
		$data['descripation'] ='';
		$config['base_url'] = base_url().'send';
		$config['total_rows'] = $this->matri->global_where('send_message', array('user_id'=>$this->tank_auth->get_user_id()) )->num_rows();
		$config['per_page'] 	= 10; 
		$config["uri_segment"] = 2;
		$config["num_links"] = 3;
		$page_segment = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['send_message'] = $this->matri->global_get_limit('send_message',array('user_id'=>$this->tank_auth->get_user_id()),  $config['per_page'], $page_segment,"id desc");
		$config['full_tag_open'] 	= "<nav> <ul class='pagination'>";
		$config['full_tag_close'] 	= '</ul> </nav>';
		$config['cur_tag_open'] 	= '<li class="active"><a>';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['next_tag_open']	 = '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$this->pagination->initialize($config); 
		$data['create_link'] = $this->pagination->create_links();
		$this->load->view('site_theme/partner_containt', $data);
	}
	function inbox()
	{
		$data['page'] =     'muser/message_inbox';
		$data['title'] =    'Muser | Home Page | Mplan';
		$data['descripation'] ='';
		$config['base_url'] = base_url().'send';
		$config['total_rows'] = $this->matri->global_where('message_inbox', array('user_id'=>$this->tank_auth->get_user_id()) )->num_rows();
		$config['per_page'] 	= 10; 
		$config["uri_segment"] = 2;
		$config["num_links"] = 3;
		$page_segment = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['send_message'] = $this->matri->global_get_limit('message_inbox',array('user_id'=>$this->tank_auth->get_user_id()),  $config['per_page'], $page_segment,"id desc");
		$config['full_tag_open'] 	= "<nav> <ul class='pagination'>";
		$config['full_tag_close'] 	= '</ul> </nav>';
		$config['cur_tag_open'] 	= '<li class="active"><a>';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['next_tag_open']	 = '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$this->pagination->initialize($config); 
		$data['create_link'] = $this->pagination->create_links();
		$this->load->view('site_theme/partner_containt', $data);
	}
	
	//get theme //
	function get_theme()
	{
		 $mail_data['message'] = strip_tags(trim("Welcome message"));
		 $mail_data['name'] = "Shiva Manhar";
		$mail_data['sender_name'] = "Shiva Manhar";
		$mail_data['email'] = "shivamanhar@gmail.com";
			
			
		$this->_send_email($mail_data['name']."has sent you a message", $mail_data['email'], $mail_data);
	}
	/**
	 * Send email message of given type (for user message.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($subject, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		//$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($this->load->view('email/muser_msg', $data, TRUE));		
		$this->email->send();
	}
}