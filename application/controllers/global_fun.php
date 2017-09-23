<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author: Shiva Manhar (shivamanhar)
 * Date:23/4/2015
 * class Name: Global_fun
 * Descripation: Global_fun Class is use for small method when use this project many time.
*/
class Global_fun extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('matri');
		
        }
        
        function community()
        {
		
		$this->load->database();
		$this->load->model('matri');
		$data['community'] = $this->matri->get_community('community' ,'religion_id', $this->input->post('religion') );
		
		echo "<select name='community' id='community'> ";
		echo "<option value=''> Select </option>";
		foreach($data['community']->result() as $row)
		{
			echo "<option value='".$row->id."'>".ucwords($row->community_name)."</option>";	
		}
		echo "</select>";
	}
}
?>