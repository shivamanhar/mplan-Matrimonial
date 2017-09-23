<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author: Shiva Manhar (shivamanhar)
 * Date:6/4/2015
 * class Name: User_profile
 * Descripation: Mplan is a matrimonial site and this website want to
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
				$data['keywords'] ='mplan.in, Matrimonial,shaadi, free register , marriage , community, religion';
				$data['descripation'] ='mplan.in trusted matrimonial website. register now free at mplan.in marriage. you can access mobile number.';
				$data['mother_tongue'] = $this->matri->global_select('mother_tongue');
				$this->load->view('profile_template/profile_containt',$data);
			}
        }
	function education() 
        {
		/*check user already insert data or not */
		$field_val = array(
			'user_id' => $this->tank_auth->get_user_id(),
			'profile_complete'=>1
				);
		$data['user_profiles'] = $this->matri->and_where('user_profiles', $field_val );		
		/*end user already exists data */
		
			if($data['user_profiles']->num_rows() <= 0)
			{
				
				$this->index();
			}
		else
		{
		
		/*check user already insert data or not */		
				$data['user_edu'] = $this->matri->global_where('user_edu', array('user_id'=>$this->tank_auth->get_user_id()));
		/*end user check */			
				if($data['user_edu']->num_rows() > 0)
				{
					$this->background();
				}
				else
				{
					$data['page'] = 'profile_page/education'; 
					$data['title'] = 'Eduction Detail | Mplan.in | Matrimonial';
					$data['descripation'] ='';
					$data['edu_level'] = $this->matri->global_select('education_level'); //retrive in data base
					$data['edu_field'] = $this->matri->global_select('education_field'); //retrive in data base
					$data['work_with'] = $this->matri->global_select('working_with'); //retrive in data base
					$data['work_as'] = $this->matri->global_select('working_as'); //retrive in data base
					$this->load->view('profile_template/profile_containt', $data);	
				}
		
		}		
               
        }
	
        function background() 
        {
		
		
		/*check user already insert data or not */		
				$data['user_edu'] = $this->matri->global_where('user_edu', array('user_id'=>$this->tank_auth->get_user_id()));
		/*end user check */			
				if($data['user_edu']->num_rows() <= 0)
				{
					$this->education();
				}
				else
				{			
					//check background already insert data or not 		
					$data['user_background'] = $this->matri->global_where('user_background', array('user_id'=>$this->tank_auth->get_user_id()));
					//end user check
					
					if($data['user_background']->num_rows() > 0)
					{
						$this->lifestyle();
					}
					else
					{
					
						$data['page'] = 'profile_page/background';
						$data['title'] = 'Background | Mplan.in | Matrimonial';
						$data['descripation'] ='';    
						$data['mother_tongue'] = $this->matri->global_select('mother_tongue'); //retrive in data base
						$data['religion'] = $this->matri->global_select('religion'); //retrive in data base
						$this->load->view('profile_template/profile_containt', $data);
					}
				}
        }
        function location() 
        {
		
                $data['page'] = 'profile_page/location';
                $data['title'] = 'location page';
                $data['descripation'] ='';
                $this->load->view('profile_template/profile_containt', $data);
        }
        
        
	function lifestyle() 
        {
		//check background already insert data or not 		
					$data['user_background'] = $this->matri->global_where('user_background', array('user_id'=>$this->tank_auth->get_user_id()));
					//end user check
					
					if($data['user_background']->num_rows() <= 0)
					{
						$this->background();
					}
					else
					{
						/*check user already insert data or not */		
						$data['user_lifestyle'] = $this->matri->global_where('user_lifestyle', array('user_id'=>$this->tank_auth->get_user_id()));
						/*end user check */
						if($data['user_lifestyle']->num_rows() > 0)
						{
							$this->family();
						}
						else
						{
							$data['page'] = 'profile_page/lifestyle';
							$data['title'] = 'life style | Mplan.in | Matrimonial';
							$data['descripation'] ='';
							$this->load->view('profile_template/profile_containt', $data);
						}
					}
        }
	function family()
        {
		/*check user already insert data or not */		
						$data['user_lifestyle'] = $this->matri->global_where('user_lifestyle', array('user_id'=>$this->tank_auth->get_user_id()));
						/*end user check */
						if($data['user_lifestyle']->num_rows() <= 0)
						{
							$this->lifestyle();
						}
						else
						{
							/*check user already insert data or not */		
							$data['user_family'] = $this->matri->global_where('user_family', array('user_id'=>$this->tank_auth->get_user_id()));
							/*end user check */
							if($data['user_family']->num_rows() > 0)
							{
								$this->hobbies();
							}
							else
							{		
								$data['page'] = 'profile_page/family';
								$data['title'] = 'Family | Mplan.in | Matrimonial';
								$data['descripation'] ='';
								$this->load->view('profile_template/profile_containt', $data);
							}
						}
        }
	
        function hobbies()
        {
		/*check user already insert data or not */		
							$data['user_family'] = $this->matri->global_where('user_family', array('user_id'=>$this->tank_auth->get_user_id()));
							/*end user check */
							if($data['user_family']->num_rows() <= 0)
							{
								$this->family();
							}
							else
							{
								/*check user already insert data or not */		
								$data['user_hobbies'] = $this->matri->global_where('user_hobbies', array('user_id'=>$this->tank_auth->get_user_id()));
								/*end user check */
								if($data['user_hobbies']->num_rows() > 0)
								{
									$this->profile_image();
								}
								else
								{
									$data['page'] = 'profile_page/hobbies';
									$data['title'] = 'My hobbies | Mplan.in | Matrimonial';
									$data['descripation'] ='';
									$this->load->view('profile_template/profile_containt', $data);
								}
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
						$data['userfolder'] = $this->matri->global_where('userfolder', array('user_id'=>$this->tank_auth->get_user_id()));
						
						if($data['userfolder']->num_rows() > 0)
						{
							$field_val = array(
									   'user_id' => $this->tank_auth->get_user_id(),
									   'profile_img' => 1
									   );
							$data['user_file'] = $this->matri->and_where('user_file', $field_val);
							if($data['user_file']->num_rows() > 0)
							{
								redirect('/muser/matches/#muser_menu');
							}
							else
							{				
								$data['page'] = 'profile_page/profile_image';
								$data['title'] = 'Profile Image | Mplan | Matrimonial';
								$data['descripation'] ='';
								$data['error'] = $error;
								$this->load->view('profile_template/profile_containt', $data);
							}
						}
						/*end user check */
					}
		
        }
        
        //insert basic information in database        
        function insert_basic_info()
        {
		
		
		
            $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('country','Country','required|xss_clean');
            $this->form_validation->set_rules('state','State','required|xss_clean');
            $this->form_validation->set_rules('city','City','xss_clean');
            $this->form_validation->set_rules('mtongue','Mother Tongue','xss_clean');
            $this->form_validation->set_rules('marital_status','Marital Status','required|xss_clean');
            $this->form_validation->set_rules('heightto','Height','required|xss_clean');
            $this->form_validation->set_rules('skin_tone','Skin Tone','required|xss_clean');
            $this->form_validation->set_rules('body_type','Body Type','required|xss_clean');
            $this->form_validation->set_rules('disability','Disability','required|xss_clean');
            $this->form_validation->set_rules('hiv_positive','HIV Positive','required|xss_clean');
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
		/*folder create*/
		$this->create_folder();
                $this->matri->global_upldate('user_profiles','user_id', $this->tank_auth->get_user_id(), $data);
		$this->profile_image();
            }
        }
	
	
        //insert education information
        function insert_education()
        {
		
		
            $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('edu_level','Education Level','required|xss_clean');
            $this->form_validation->set_rules('edu_field','Education field','xss_clean');
            $this->form_validation->set_rules('work_with','Working With','xss_clean');
            $this->form_validation->set_rules('work_as','Working As','xss_clean');
            $this->form_validation->set_rules('annual_income','Annual Income','xss_clean');
            
            if($this->form_validation->run() == false)
            {
                $this->education();
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->tank_auth->get_user_id(),//need to change
                        'edu_level_id' => $this->input->post('edu_level'),
                        'edu_field_id' => $this->input->post('edu_field'),
                        'work_with_id' => $this->input->post('work_with'),
                        'work_as_id' => $this->input->post('work_as'),
                        'annual_income' => $this->input->post('annual_income'),
                        
                );
                $this->matri->global_insert('user_edu', $data);
		$this->background();
            }
        }
        //insert background information
        function insert_background()
        {
		
            $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('religion','Religion','required');
            $this->form_validation->set_rules('community','Community','');
            
            if($this->form_validation->run() == false)
            {
                
                $this->background();
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->tank_auth->get_user_id(),
                        'religion_id' => $this->input->post('religion'),
                        'community_id' => $this->input->post('community'),
                        
                                               
                );
                $this->matri->global_insert('user_background', $data);
		$this->lifestyle();
            }
        }
        
        //insert lifestyle information
        function insert_lifestyle()
        {
		
		
            $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('diet','Diet','required');
            $this->form_validation->set_rules('smoke','Smoke','required');
            $this->form_validation->set_rules('drink','drink','required');
            if($this->form_validation->run() == false)
            {
                $this->lifestyle();
                
            }
            else
            {
                $data = array
                (
                        'user_id' => 	$this->tank_auth->get_user_id(),
                        'diet' => 	$this->input->post('diet'),
                        'smoke' => 	$this->input->post('smoke'),
                        'drink' => 	$this->input->post('drink'),
                                               
                );
                $this->matri->global_insert('user_lifestyle', $data);
		$this->family();
            }
        }
	
	function insert_family()
        {
		
		
            $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('father_name','Fathers Name','required');
            $this->form_validation->set_rules('mother_name','Mother Name','required');
            $this->form_validation->set_rules('father_status','Father Status','required');
            $this->form_validation->set_rules('mother_status','Mother Status','required');
            $this->form_validation->set_rules('family_status','Family Status','');
            $this->form_validation->set_rules('brother','Brother(S)','');
            $this->form_validation->set_rules('sister','Sister(S)','');
            if($this->form_validation->run() == false)
            {
                $this->family();
                
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->tank_auth->get_user_id(),
                        'father_name' => $this->input->post('father_name'),
                        'mother_name' => $this->input->post('mother_name'),
                        'father_status' => $this->input->post('father_status'),
                        'mother_status' => $this->input->post('mother_status'),
                        'family_status' => $this->input->post('family_status'),
                        'brother' => $this->input->post('brother'),
                        'sister' => $this->input->post('sister'),
                                               
                );
                $this->matri->global_insert('user_family', $data);
		$this->hobbies();
            }
        }
	
        //insert muser hobbies information
        function insert_hobbies()
        {
		
		
            $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('hobbies','Hobbies','');
            $this->form_validation->set_rules('interests','Interests','');
            $this->form_validation->set_rules('fav_music','Hobbies','');
            $this->form_validation->set_rules('fav_books','Hobbies','');
            $this->form_validation->set_rules('pre_movies','Hobbies','');
	    $this->form_validation->set_rules('cook_food','Food I Cook','');
            $this->form_validation->set_rules('own_words','Hobbies','required');
            if($this->form_validation->run() == false)
            {
                $this->hobbies();
                
            }
            else
            {
                $hob = $this->input->post('hobbies');               
                $hobbies = '';
                foreach( $hob as $val=>$row)
                {
                    $hobbies .= $row;                    
                    $hobbies .= ", ";
                                    
                }
               
                $hob = $this->input->post('interests');
                $interests = '';
                foreach( $hob as $val=>$row)
                {
                    $interests .= $row;
                    $interests .= ", "; 
                }
                
                $hob = $this->input->post('fav_music');
                $fav_music = '';
                foreach( $hob as $val=>$row)
                {
                    $fav_music .= $row;
                    $fav_music .= ", "; 
                }
                
                $hob = $this->input->post('pre_movies');
                $pre_movies = '';
                foreach( $hob as $val=>$row)
                {
                    $pre_movies .= $row;
                    $pre_movies .= ", "; 
                }
                
                
                $data = array
                (
                        'user_id' 	=> $this->tank_auth->get_user_id(),
                        'hobbies' 	=>   $hobbies,
                        'interests' 	=>  $interests,
                        'fav_music' 	=>  $fav_music,
                        'fav_books' 	=>  $this->input->post('fav_books'),                                               
                        'pre_movies' 	=>  $pre_movies,
			'cook_food' 	=>  $this->input->post('cook_food'),
                        'own_words' 	=>  $this->input->post('own_words'),
                );
               
                $this->matri->global_insert('user_hobbies', $data);
		$this->profile_image();
            }
        }
        
        //Upload Muser Image //
        function insert_pimage()
        {
		
				
		
				/*access userfolder name */
					$data['userfolder'] = $this->matri->global_where('userfolder' ,array('user_id'=>$this->tank_auth->get_user_id()));
					if($data['userfolder']->num_rows > 0)
					{
						foreach($data['userfolder']->result() as $row)
						{
							$foldername = $row->folder_name;
							$folder_id = $row->id;
						}
					}
					else
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
									$data['userfolder'] =$this->matri->global_where('userfolder',array('user_id'=>$this->tank_auth->get_user_id()));
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
				/*end userfolder name access */
		
				if(isset($foldername))
				{
					$config['upload_path'] 		= './upload/'.$foldername.'/';
					$config['encrypt_name'] 	= true;
					$config['allowed_types'] 	= 'jpg|png';
					$config['max_size']		= '3000'; //file uploading size is one MB
					$config['max_width'] 		= '1000';
					$config['max_height'] 		= '800';		
					$this->load->library('upload', $config);		
					// Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
					$this->upload->initialize($config);
					if (!$this->upload->do_upload())
					{
						$data['error'] = array('error' => $this->upload->display_errors());					
						$this->profile_image($data);		
					}
					else
					{
						
						$upload_data = $this->upload->data();
						$data = array(
							      'user_id' => 	$this->tank_auth->get_user_id(),
							      'folder_id' =>	$folder_id,
							      'file_name' => 	$upload_data['file_name'],
							      'profile_img'=>	1
							      );
						$config1 = array(
						      'source_image' => $upload_data['full_path'], //get original image
						      'new_image' => realpath(APPPATH . '../upload').'/userid_'.$data['folder_id'].'/thumbs', //save as new image //need to create thumbs first
						      'maintain_ratio' => true,
						      'width' => 170,
						      'height' => 140
						       
						    );
						$this->load->library('image_lib', $config1); //load library
						$this->image_lib->resize(); //generating thumb						
						
						$this->matri->global_insert('user_file', $data);
						
						redirect('/muser/matches/#muser_menu');
						
					}
				}
				else
				{
					echo "error!";
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
				$data['userfolder'] =$this->matri->global_where('userfolder',array('user_id'=>$this->tank_auth->get_user_id()));
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
	
	
}
?>