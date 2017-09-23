<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*************************************************
 * 
 * Author : Shiva Manhar (shivamanhar)
 * Class Name: Album
 * Date : 27/4/2015
 * Descripation : Album library for image upload , delete, edit etc.
 */
class Album
{
        function __construct()
	{
            
            $ci =  & get_instance();
            $ci->load->model('matri');
                       
        }
	function create_album($table_name , $data)
	{
		$ci =  & get_instance();
		$ci->load->model('matri');
		$ci->load->model('logic_lab');
		if(($table_name== NULL)&& $data == NULL)
		{
			return false;
		}
		else
		{
			$result = $ci->logic_lab->global_insert($table_name, $data);
			return $result;
		}
	}
	function album_name()
	{
		
	}
	function delete_album($user_id)
	{
	}
	function edit_album($user_id)
	{
		
	}
	function upload_image($user_id, $ablum_id, $image_name)
	{
		
	}
}