<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Matri
 *
 * This model represents matrimonial user  data base. It can be used
 * for update
 *
 * @package	models
 * Class Name   update
 * @author	shiva manhar (shivamanhar)
 * Date         8/6/2015
 *  */
class Update extends CI_Model
{
    function global_update($table_name,$primary_key,$primary_value ,$data)
    {
        $this->db->where($primary_key, $primary_value);
        $this->db->update($table_name, $data); 
    }
}