<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author: Shiva Manhar (shivamanhar)
 * Date:7/6/2015
 * class Name: Update_Profile
 * Descripation: Mplan is a matrimonial site and
 * Udate_Profile class use for user information
 * update
 *
 * */

class Update_Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();		
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');		}
	}
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
					$data['page'] = "profile_page/cbasic_info";
                                        $data['title'] = 'Basic information | Mplan.in | Matrimonial | Mplan.in | Marriage';
                                        $data['keywords'] ='mplan.in, Matrimonial,shaadi, free register , marriage , community, religion';
                                        $data['descripation'] ='mplan.in trusted matrimonial website. register now free at mplan.in marriage. you can access mobile number.';
                                        $this->load->view('site_theme/update_containt',$data);
				}
				else
				{
					redirect('user_profile/');
				}
        }
	private function background() 
        {
		
				$data['page'] = 'profile_page/background';
				$data['title'] = 'Background | Mplan.in | Matrimonial';
				$data['keywords'] ='mplan.in, Matrimonial,shaadi, free register , marriage , community, religion, marriage plan, planmyparriage, marriage solution, marriage event';
				$data['descripation'] ='';    
				$data['mother_tongue'] = $this->matri->global_select('mother_tongue'); //retrive in data base
				$data['religion'] = $this->matri->global_select('religion'); //retrive in data base
				$this->load->view('site_theme/update_containt', $data);
	}
        function education()
        {
		/*check user already insert data or not */		
				$data['user_edu'] = $this->matri->global_where('user_edu',  array('user_id'=> $this->tank_auth->get_user_id()));
		/*end user check */			
				if($data['user_edu']->num_rows() > 0)
				{
                                        $data['page'] = "profile_page/ceducation";
                                        $data['title'] = 'Basic information | Mplan.in | Matrimonial | Mplan.in | Marriage';
                                        $data['keywords'] ='mplan.in, Matrimonial,shaadi, free register , marriage , community, religion';
                                        $data['descripation'] ='mplan.in trusted matrimonial website. register now free at mplan.in marriage. you can access mobile number.';
                                        $this->load->view('site_theme/update_containt',$data);
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
					$this->load->view('site_theme/update_containt', $data);	
				}
        }
        
        //insert education information
        function insert_education()
        {
		if($this->matri->and_where('user_edu', array('user_id' =>$this->tank_auth->get_user_id()))->num_rows >0)
		{
			$this->index();
		}
		else
		{
			$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');	    
			$this->form_validation->set_rules('edu_level','Education Level','xss_clean');	    
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
        }
        //insert background information
        
        /*muser image gallary */
        function photo()
        {
		$field = array(
				       'user_file.user_id' => $this->tank_auth->get_user_id(),
				       'profile_img' => 1
				       );
		$file_name = $this->muse->get_userfile($field, 'id');
		if($file_name > 0)
		{
			redirect('muser/photo');
		}
		else
		{
			$data['page'] 		=     	'profile_page/profile_image';  //muser/photo	
			$data['title'] 		=    	'Photo | Mplan';	
			$data['keywords'] 	=	'matrimony, matrimonials, matchmaking, brides, grooms, matrimonial blog';	
			$data['descripation'] 	=	'Mplan.in best matrimonial service website. We are providing online matchmaking. We are using advanced search technology. Registraion is free. Create your profile and start searching for prospective brides and grooms today';	
			$this->load->view('site_theme/update_containt', $data);
		}
        }
        /*user background*/
        function user_background()
        {
			//check background already insert data or not 		
			$data['user_background'] = $this->matri->global_where('user_background',  array('user_id'=>$this->tank_auth->get_user_id()));
					//end user check
			if($data['user_background']->num_rows() > 0)
					{
						$data['page'] 		=     	'profile_page/cbackground';
						$data['title'] 		=    	'Photo | Mplan';
						$data['keywords'] 	=	'matrimony, matrimonials, matchmaking, brides, grooms, matrimonial blog';
						$data['descripation'] 	=	'Mplan.in best matrimonial service website. We are providing online matchmaking. We are using advanced search technology. Registraion is free. Create your profile and start searching for prospective brides and grooms today';
						$this->load->view('site_theme/update_containt', $data);
					}
					else
					{
						$this->background();
					}
                
        }
        
        function lifestyle() 
        {
                /*check user already insert data or not */		
		$data['user_lifestyle'] = $this->matri->global_where('user_lifestyle', array('user_id'=> $this->tank_auth->get_user_id()));
		/*end user check */
		if($data['user_lifestyle']->num_rows() > 0)
		    {
			$data['page'] = 'profile_page/clifestyle';
			$data['title'] = 'life style | Mplan.in | Matrimonial';
			$data['descripation'] ='';
			$this->load->view('site_theme/update_containt', $data);
		    }
		    else
                    {
			$data['page'] = 'profile_page/lifestyle';
			$data['title'] = 'life style | Mplan.in | Matrimonial';
			$data['descripation'] ='';
			$this->load->view('site_theme/update_containt', $data);
		    }		
        }
        function family()
        {
				
		$data['user_family'] = $this->matri->global_where('user_family', array('user_id'=>$this->tank_auth->get_user_id()));
		/*end user check */
		if($data['user_family']->num_rows() > 0)
                    {
                        $data['page'] = 'profile_page/cfamily';
                        $data['title'] = 'Family | Mplan.in | Matrimonial';
                        $data['descripation'] ='';
                        $this->load->view('site_theme/update_containt', $data);
                    }
		else
                    {		
                    $data['page'] = 'profile_page/family';
                    $data['title'] = 'Family | Mplan.in | Matrimonial';
                    $data['descripation'] ='';
                    $this->load->view('site_theme/update_containt', $data);
                    }
        }
        function hobbies()
        {
		/*check user already insert data or not */		
		$data['user_hobbies'] = $this->matri->global_where('user_hobbies', array('user_id'=>$this->tank_auth->get_user_id()));
		/*end user check */
		if($data['user_hobbies']->num_rows() > 0)
		{
		    $data['page'] = 'profile_page/chobbies';
                    $data['title'] = 'My hobbies | Mplan.in | Matrimonial';
                    $data['descripation'] ='';
                    $this->load->view('site_theme/update_containt', $data);
		}
		else
		{
                    $data['page'] = 'profile_page/hobbies';
                    $data['title'] = 'My hobbies | Mplan.in | Matrimonial';
                    $data['descripation'] ='';
                    $this->load->view('site_theme/update_containt', $data);
		}
        }
	//insert new background
	 function insert_background()
        {
		

		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('religion','Religion','trim|xss_clean');
		$this->form_validation->set_rules('community','Community','trim|xss_clean');
		$this->form_validation->set_rules('sub_community','Sub Community','trim|xss_clean');
		
		$this->form_validation->set_rules('diet','Diet','xss_clean');

		$this->form_validation->set_rules('smoke','Smoke','xss_clean');

		$this->form_validation->set_rules('drink','drink','xss_clean');
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
			
			'sub_community' => $this->input->post('sub_community'),
                );
                $this->matri->global_insert('user_background', $data);
		
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
	
	//insert lifestyle information
        function insert_lifestyle()
        {
		
		if($this->matri->and_where('user_lifestyle', array('user_id' =>$this->tank_auth->get_user_id()))->num_rows >0)
		{
			$this->index();
		}
		else
		{
			$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');	    
			$this->form_validation->set_rules('diet','Diet','xss_clean|strip_tags');	    
			$this->form_validation->set_rules('smoke','Smoke','xss_clean|strip_tags');	    
			$this->form_validation->set_rules('drink','drink','xss_clean|strip_tags');	    
			if($this->form_validation->run() == false)	    
			{	    
			    $this->lifestyle();	    
			    	    
			}	    
			else	    
			{	    
			    $data = array	    
			    (	    
				    'user_id' => 	(int)$this->tank_auth->get_user_id(),	    
				    'diet' => 	strip_tags(trim($this->input->post('diet'))),	    
				    'smoke' => 	strip_tags(trim($this->input->post('smoke'))),	    
				    'drink' => 	strip_tags(trim($this->input->post('drink'))),	    
							   	    
			    );	    
			    $this->matri->global_insert('user_lifestyle', $data);	    
			    $this->lifestyle();	    
			}
		}
        }
        function insert_family()
        {		if($this->matri->and_where('user_family', array('user_id' =>$this->tank_auth->get_user_id()))->num_rows >0)
		{
			$this->index();
		}
		else
		{
			$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');	    
			$this->form_validation->set_rules('father_name','Fathers Name','trim|xss_clean|strip_tags');	    
			$this->form_validation->set_rules('mother_name','Mother Name','trim|xss_clean|strip_tags');	    
			$this->form_validation->set_rules('father_status','Father Status','trim|xss_clean|strip_tags');	    
			$this->form_validation->set_rules('mother_status','Mother Status','trim|xss_clean|strip_tags');	    
			$this->form_validation->set_rules('family_status','Family Status','trim|xss_clean|strip_tags');	    
			$this->form_validation->set_rules('brother','Brother(S)','integer|trim|xss_clean|strip_tags');	    
			$this->form_validation->set_rules('sister','Sister(S)','integer|trim|xss_clean|strip_tags');	    
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
        }
        /*hobbies insert */
    
        function insert_hobbies()
        {	
		if($this->matri->and_where('user_hobbies', array('user_id' =>$this->tank_auth->get_user_id()))->num_rows >0)
		{
			$this->index();
		}
		else
		{
			$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');	    
			$this->form_validation->set_rules('hobby','Hobbies','xss_clean|trim|strip_tags'); 	    
			$this->form_validation->set_rules('interest','Interests','xss_clean|trim|strip_tags');	    
			$this->form_validation->set_rules('fav_music','Hobbies','xss_clean|trim|strip_tags');	    
		     // $this->form_validation->set_rules('fav_books','Hobbies','');	    
			$this->form_validation->set_rules('pre_movies','Hobbies','xss_clean|trim|strip_tags');	    
			$this->form_validation->set_rules('cook_food','Food I Cook','xss_clean|trim|strip_tags');	    
			$this->form_validation->set_rules('own_words','Hobbies','xss_clean|trim|strip_tags');	    
			if($this->form_validation->run() == false)	    
			{	    
			    $this->hobbies();	    
			    	    
			}	    
			else	    
			{	    
			    $hobbies = $this->input->post('hobby');    	    
			    $interests = $this->input->post('interest');	    
			    $fav_music = $this->input->post('fav_music');	    
			    $pre_movies = $this->input->post('pre_movie'); 	    
			    $data = array	    
			    (	    
				    'user_id' 	=> $this->tank_auth->get_user_id(),	    
				    'hobbies' 	=>  $hobbies,	    
				    'interests' 	=>  $interests,	    
				    'fav_music' 	=>  $fav_music,	    
				  //'fav_books' 	=>  $this->input->post('fav_books'),                                               	    
				    'pre_movies' 	=>  $pre_movies,	    
				    'cook_food' 	=>  $this->input->post('cook_food'),	    
				    'own_words' 	=>  $this->input->post('own_words'),	    
			    );	    
			    $this->matri->global_insert('user_hobbies', $data);	    
			    $this->hobbies();	    
			}		}	
        }
    
    /*user data value change */
    function update_basic_info()
    {
	    $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('country','Country','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('state','State','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('city','City','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('mtongue','Mother Tongue','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('marital_status','Marital Status','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('heightto','Height','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('skin_tone','Skin Tone','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('body_type','Body Type','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('disability','Disability','xss_clean|trim|strip_tags');
            $this->form_validation->set_rules('hiv_positive','HIV Positive','xss_clean|trim|strip_tags');
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
                $this->update->global_update('user_profiles','user_id', $this->tank_auth->get_user_id(), $data);
		$this->index();
            }
    }
    function update_education()
    {
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('edu_level','Education Level','required|xss_clean|trim|strip_tags');
		$this->form_validation->set_rules('edu_field','Education field','xss_clean|trim|strip_tags');
		$this->form_validation->set_rules('work_with','Working With','xss_clean|trim|strip_tags');
		$this->form_validation->set_rules('work_as','Working As','xss_clean|trim|strip_tags');
		$this->form_validation->set_rules('annual_income','Annual Income','xss_clean|trim|strip_tags');
            
            if($this->form_validation->run() == false)
            {
		$this->education();
            }
            else
            {
               $data = array
                (
                        
                        'edu_level_id' => $this->input->post('edu_level'),
                        'edu_field_id' => $this->input->post('edu_field'),
                        'work_with_id' => $this->input->post('work_with'),
                        'work_as_id' => $this->input->post('work_as'),
                        'annual_income' => $this->input->post('annual_income'),
                        
                );
		$this->update->global_update('user_edu','user_id', $this->tank_auth->get_user_id(), $data);
		$this->education();
	    }
    }
    function udate_background()
    {
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('religion','Religion','trim|strip_tags');
		$this->form_validation->set_rules('community','Community','trim|strip_tags');
		$this->form_validation->set_rules('sub_community','Sub Community','strtolower|trim|strip_tags'); 
		$this->form_validation->set_rules('diet','Diet','trim|strip_tags');

		$this->form_validation->set_rules('smoke','Smoke','trim|strip_tags');

		$this->form_validation->set_rules('drink','drink','trim|strip_tags');

            if($this->form_validation->run() == false)
            {
               $this->user_background();
            }
            else
            {
                $data = array
                (
                        'religion_id' => $this->input->post('religion'),
                        'community_id' => $this->input->post('community'),
			'sub_community' => $this->input->post('sub_community')
                        
                );
		$this->update->global_update('user_background','user_id', $this->tank_auth->get_user_id(), $data);
		$data = array

                (

                        'diet' => 	$this->input->post('diet'),

                        'smoke' => 	$this->input->post('smoke'),

                        'drink' => 	$this->input->post('drink'),

                                               

                );

                $this->update->global_update('user_lifestyle','user_id', $this->tank_auth->get_user_id(), $data);

		$this->user_background();
            }
    }
    function update_lifestyle()
    {
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('diet','Diet','required|strip_tags');
            $this->form_validation->set_rules('smoke','Smoke','required|strip_tags');
            $this->form_validation->set_rules('drink','drink','required|strip_tags');
            if($this->form_validation->run() == false)
            {
                $this->lifestyle();
                
            }
            else
            {
                $data = array
                (
                        'diet' => 	$this->input->post('diet'),
                        'smoke' => 	$this->input->post('smoke'),
                        'drink' => 	$this->input->post('drink'),
                                               
                );
                $this->update->global_update('user_lifestyle','user_id', $this->tank_auth->get_user_id(), $data);
		$this->lifestyle(); 
            }
    }
    function update_family()
    {
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('father_name','Fathers Name','required|trim|strip_tags');
            $this->form_validation->set_rules('mother_name','Mother Name','required|trim|strip_tags');
            $this->form_validation->set_rules('father_status','Father Status','required|trim|strip_tags');
            $this->form_validation->set_rules('mother_status','Mother Status','required|trim|strip_tags');
            $this->form_validation->set_rules('family_status','Family Status','trim|strip_tags');
            $this->form_validation->set_rules('brother','Brother(S)','trim|strip_tags');
            $this->form_validation->set_rules('sister','Sister(S)','trim|strip_tags');
            if($this->form_validation->run() == false)
            {
                $this->family();
                
            }
            else
            {
                $data = array
                (
                        
                        'father_name' => $this->input->post('father_name'),
                        'mother_name' => $this->input->post('mother_name'),
                        'father_status' => $this->input->post('father_status'),
                        'mother_status' => $this->input->post('mother_status'),
                        'family_status' => $this->input->post('family_status'),
                        'brother' => $this->input->post('brother'),
                        'sister' => $this->input->post('sister'),
                                               
                );
		$this->update->global_update('user_family','user_id', $this->tank_auth->get_user_id(), $data);
                
		$this->family();
            }
    }	function account_setting()
	{
		
		if($this->matri->global_where('account_setting',array('user_id'=>$this->tank_auth->get_user_id()))->num_rows() <=0 )
		{
			$insert_data = array('user_id'=>$this->tank_auth->get_user_id());
			$this->matri->global_insert('account_setting',$insert_data);
		}
		if($this->input->post('save_change'))
		{
			$data = array(
			      'display_mobile'=>$this->input->post('mobile_display'),
			      'display_email'=>$this->input->post('email_display'),
			      'display_profile'=>$this->input->post('account_type'),
			      );
			$this->matri->global_upldate_where('account_setting', array('user_id'=>$this->tank_auth->get_user_id()), $data);
		}
		$dob = $this->input->post('day')."-".$this->input->post('month')."-".$this->input->post('year');
		$dob = strtotime($dob);
		
		$this->form_validation->set_rules('name', 'First Name', 'trim|required|xss_clean|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required|xss_clean|min_length[9]|max_length[17]');
		$this->form_validation->set_rules('day', 'Day', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('month', 'Month', 'trim|required|xss_clean|integer');
		$this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean|integer');
		if($this->form_validation->run() == true)
		{
			$this->matri->global_upldate_where('users', array('id'=>$this->tank_auth->get_user_id()), array('dob'=>$dob, 'firstname'=>$this->input->post('name'),'mobile_no'=>$this->input->post('mobile_no')));
			$data['page'] =     'muser/account_setting';
			$data['title'] =    'Muser | Home Page | Mplan';
			$data['descripation'] ='';
			$this->load->view('site_theme/partner_containt', $data);
		}
		else
		{
			$data['page'] =     'muser/account_setting';
			$data['title'] =    'Muser | Home Page | Mplan';
			$data['descripation'] ='';
			$this->load->view('site_theme/partner_containt', $data);
		}
		
	}
	function setting_update()
	{
		$data = array(
			      'display_mobile'=>$this->input->post('mobile_val'),
			      'display_email'=>$this->input->post('email_display'),
			      'display_profile'=>$this->input->post('account_type'),
			      );
		print_r($data);
	}
}