<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * add
 *
 * This model represents user address data. It can be used
 * for address access.
 *
 * @package	ms_add
 * @author	shiva manhar (http://github.com/shivamanhar)
 */
class add extends CI_Model
{
    public function get_db($table)
    {
       
        $result = $this->db->get($table);
        return $result;
    }
    public function get_where($table, $field, $value)
    {        
        $this->db->where($field, $value);
        $result = $this->db->get($table);
        return $result;
    }
    
}
/*end of add class*/