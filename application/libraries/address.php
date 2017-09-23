<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*************************************************
 * Address Libraries is make for address globel
 * Author : Shiva Manhar (shivamanhar)
 * Class Name: address
 * Descripation : address access
 */
class Address 
{
	function __construct()
	{
            //parent::__construct();
            $ci =  & get_instance();
            $ci->load->model('add');            
        }
        public  function country($required = NULL, $event= NULL )
        {
            $ci =  & get_instance();
            $ci->load->model('ms_add/add');
            $db_get = $ci->add->get_db('countries');
            if($required == NULL)
            {
                echo "<select id='country' name='country'>";	
		
            }
            else
            {
                echo "<select id='country' name='country' required>";
            }
            echo "<option value='' ".$event.">Country</option>";
            foreach($db_get->result() as $row)
            {
                echo "<option value='".$row->id."'>".$row->name."</option>";                
            }
            echo "</select>";
           // echo "<input type='hidden' id='url' value='".base_url()."'>";
        }
        public function state($country_id = NULL, $event= NULL)
        {
            $ci =  & get_instance();
            $ci->load->model('ms_add/add');
            $db_get = $ci->add->get_where('states','country_id', $country_id);
           
            echo "<select id='state' name='state'>";          
            echo "<option value='' ".$event.">State</option>";
             foreach($db_get->result() as $row)
            {
                echo "<option value='".$row->id."'>".$row->name."</option>";                
            }            
            echo "</select>";
          //  echo "<input type='hidden' id='url' value='".base_url()."'>";
        }
        public function city($city= NULL, $event= NULL)
        {
            $ci =  & get_instance();
            $ci->load->model('ms_add/add');
            $db_get = $ci->add->get_where('cities','state_id', $city);
            echo "<select id='city' name='city' ".$event.">";
            echo "<option value=''>City</option>";
            foreach($db_get->result() as $row)
            {
                echo "<option value='".$row->id."'>".$row->name."</option>";                
            }     
            echo "</select>";
        }       
}
?>