<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Other extends CI_Controller {

	public function index()
	{
		$this->load->view('users_view');
	}
	public function offer()
	{
		echo "hello";
	}
}

/* End of file users.php */
/* Location: ./application/modules/users/controllers/users.php */