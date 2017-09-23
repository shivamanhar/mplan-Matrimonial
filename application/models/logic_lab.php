<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Matri
 *
 * This model represents matrimonial library function data base. It can be used
 * for address access, insert, delete.
 *
 * @package	models
 * Class Name   Logic_lab
 * @author	shiva manhar (shivamanhar)
 * Date         28/4/2015
 * 
 */
class Logic_Lab extends CI_Model
{
    //db insert in any table , any data
    function global_insert($table_name, $data)
    {
        $query = $this->db->insert($table_name, $data);
        return $query;
    }
}