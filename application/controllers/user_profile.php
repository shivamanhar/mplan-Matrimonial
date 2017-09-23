<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author: Shiva Manhar (shivamanhar)
 * Date:6/4/2015
 * class Name: User_profile
 * Descripation: User profile Class for enter basic information about user.
 * user information.
*/

class User_profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		}
	}
        //it is for basic information
        function index() 
        {
				/*check user already insert data or not */
			$field_val = array(
				'user_id' => $this->tank_auth->get_user_id(),
				'profile_complete'=>1
					);
			$data['user_profiles'] = $this->matri->and_where('user_profiles', $field_val );		
			/*end user already exists data */
			
				if($data['user_profiles']->num_rows() > 0)
				{
					$this->profile_image();
				}
				else
				{
					/*basic information end */
					$data['page'] = 'profile_page/basic_info';
					$data['title'] = 'Basic information | Mplan.in | Matrimonial | Mplan.in | Marriage';
					$data['keywords'] ='mplan.in, Matrimonial,shaadi, free register , marriage , community, religion, marriage plan, planmyparriage, marriage solution, marriage event';
					$data['descripation'] ='mplan.in trusted matrimonial website. register now free at mplan.in marriage. you can access mobile number.';
					$data['mother_tongue'] = $this->matri->global_select('mother_tongue');
					$this->load->view('site_theme/update_containt',$data);
				}
			
        }
        
       
        function profile_image($error = NULL)
        {
					/*check user already insert data or not */		
					$field_val = array(
					'user_id' => $this->tank_auth->get_user_id(),
					'profile_complete'=>1
						);
					 $complete_user_basic = $this->muse->complete_user_profile('user_profiles',$field_val);
					/*end user check */
					if( $complete_user_basic == FALSE)
						{
							$this->index();
						}
					else
					{
						/*check user already insert data or not */		
						$field_val = array(
									   'user_id' => $this->tank_auth->get_user_id(),
									   'profile_img' => 1
									   );
						$data['user_file'] = $this->matri->and_where('user_file', $field_val);
						if($data['user_file']->num_rows() <= 0)
						{
								$data['page'] = 'profile_page/profile_image';
								$data['title'] = 'Profile Image | Mplan | Matrimonial';
								$data['descripation'] ='';
								$data['error'] = $error;
								$this->load->view('site_theme/update_containt',$data);
						}
						else
						{
							redirect('/update_profile/education/');
						}
						/*end user check */
					}
        }
        
        //insert basic information in database        
        function insert_basic_info()
        {
		
            $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('country','Country','xss_clean|strip_tags');
            $this->form_validation->set_rules('state','State','xss_clean|strip_tags');
            $this->form_validation->set_rules('city','City','xss_clean|strip_tags');
            $this->form_validation->set_rules('mtongue','Mother Tongue','xss_clean|strip_tags');
            $this->form_validation->set_rules('marital_status','Marital Status','xss_clean|strip_tags');
            $this->form_validation->set_rules('heightto','Height','xss_clean|strip_tags');
            $this->form_validation->set_rules('skin_tone','Skin Tone','xss_clean|strip_tags');
            $this->form_validation->set_rules('body_type','Body Type','xss_clean|strip_tags');
            $this->form_validation->set_rules('disability','Disability','xss_clean|strip_tags');
            $this->form_validation->set_rules('hiv_positive','HIV Positive','xss_clean|strip_tags');
            if($this->form_validation->run() == false)
            {
                $this->index();
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->session->userdata('user_id'),//need to change 
                        'country_id'=>$this->input->post('country'),
                        'state_id'=>$this->input->post('state'),
                        'city_id'=>$this->input->post('city'),
                        'mother_tongue_id'=>$this->input->post('mtongue'),
                        'marital_status'=>$this->input->post('marital_status'),
                        'height'=>$this->input->post('heightto'),
                        'skin_tone'=>$this->input->post('skin_tone'),
                        'body_type'=>$this->input->post('body_type'),
                        'disability'=>$this->input->post('disability'),
                        'hiv_positive'=>$this->input->post('hiv_positive'),
			'profile_complete'=>1
                );
                $this->matri->global_upldate('user_profiles','user_id', $this->tank_auth->get_user_id(), $data);
		$this->profile_image();
            }
        }
	
        //Upload Muser Image //
        function insert_pimage()
        {
		if($this->input->post('image-data'))
		{
			//$image_data['mime'];
			if($this->matri->and_where('user_file', array('user_id' =>$this->tank_auth->get_user_id()))->num_rows >0)
			{
				$this->index();
			}
			else
			{
				$image_contents =file_get_contents($this->input->post('image-data'));
				$image_detail = getimagesizefromstring($image_contents);
				if(($image_detail[0] >= 248 ) AND ($image_detail[1] >= 248 ) )
				{
					$create_file_name = md5($this->tank_auth->get_user_id().date("Y-m-d:h:i:sa")).".jpg";
			$myfile = fopen("upload/".$create_file_name, "w") or die("Unable to open file!");
			$txt = file_get_contents($this->input->post('image-data'));
			fwrite($myfile, $txt);
			
			
			$insert_data = array(
					'user_id' =>$this->tank_auth->get_user_id(),
					//'img_type'=>$_FILES['userfile']['type'],
					'file_name' =>'', //file_get_contents($this->input->post('image-data')),
					'thumb'=>'',
					'profile_img' => 1,
					'upload_date' => strtotime(date('d-m-Y')),
					'path'=>base_url()."upload/".$create_file_name
					);
			
			$insert_id = $this->matri->global_insert('user_file', $insert_data);
					if($insert_id < 0)
					{
						$this->profile_image();
					}
					else
					{
						redirect('update_profile/insert_education/');;
					}
				}
				else
				{
					$this->profile_image();				
				}
			}
		}
		else
		{
			$this->profile_image();
		}
		
        } 
	
	/*some private function */
	private function create_folder()
	{
		/*dir create for user file */
			$userfolder = './upload/'."userid_".$this->tank_auth->get_user_id();
			if(is_dir($userfolder) == false)
			{
				mkdir($userfolder);
				$data = array(
					      'user_id' => $this->tank_auth->get_user_id(),
					      'folder_name' => "userid_".$this->tank_auth->get_user_id()
					      );
				$this->matri->global_insert('userfolder', $data);
			}
			else
			{
				$data['userfolder'] =$this->matri->global_where('userfolder', array('user_id' => $this->tank_auth->get_user_id()));
				if($data['userfolder']->num_rows < 0)
				{
					$data = array(
					      'user_id' => $this->tank_auth->get_user_id(),
					      'folder_name' => "userid_".$this->tank_auth->get_user_id()
					      );
					$this->matri->global_insert('userfolder', $data);
				}
			}
			/*end dir create code */
	}
	/*end private function */
	
	//get image
	public function get_image($id=NULL, $thumb = NULL)
	{
		$where_field = array(
				     'user_id'=>(int)$id
				     );
		$get_data = $this->matri->global_get('user_file', $where_field);
		foreach($get_data->result() as $row)
		{
			header("Content-type:".$row->img_type);
			if((int)$thumb === 1)
			{
				echo $row->thumb;
			}
			else
			{
				
				echo $row->file_name;
			}
			
		}
	}
	public function test()
	{
		$get = $this->matri->global_get('user_file');
		
		foreach($get->result() as $row)
		{
		
			echo $create_file_name = md5($row->id.date("Y-m-d:h:i:sa")).".jpg";
			echo "<br/>";
			$this->matri->global_update('user_file',array('id'=>$row->id), array('path'=>base_url()."upload/".$create_file_name) );
			$myfile = fopen("upload/".$create_file_name, "w") or die("Unable to open file!");
			$txt = $row->file_name;// file_get_contents($this->input->post('image-data'));
			fwrite($myfile, $txt);
		}
	}
}
?>