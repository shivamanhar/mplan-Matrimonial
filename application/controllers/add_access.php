<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author: Shiva Manhar (shivamanhar)
 * Date:13/4/2015
 * class Name: Add_access
 * Descripation: Add_access in address access class use for user address input easy.
*/
class Add_Access extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		 $this->load->database();
                $this->load->library('address');                
                $this->load->model('add');
	}
    public function state()
        {         
            $country = (int)$this->input->post('country');
            $this->address->state($country);
        }
    public function cities()
	{
	    $city =     (int)$this->input->post('city');
	    $this->address->city($city);
	}
}
