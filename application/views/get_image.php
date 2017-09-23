<?php
$where_field = array(
				     'id'=>$id
				     );
		$get_data = $this->matri->global_get('user_file', $where_field);
                foreach($get_data->result() as $row)
		{

                        header("Content-type:".$row->img_type);
			echo $row->file_name;
		}
?>