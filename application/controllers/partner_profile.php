<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author: Shiva Manhar (shivamanhar)
 * Date:18/5/2015
 * class Name: Partner_profile
 * Descripation: Mplan is a matrimonial site and this website want to
 * partner information.
*/
class Partner_Profile extends CI_Controller
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
	/*partner information */
	public function partner_basic_info($user_id = NULL)
	{
		
		if($this->muse->complete_partner_info($this->tank_auth->get_user_id()) == true)
		   {
			$this->complete_basic_page();
		   }
		   else
		   {
			$data['page'] =     'partner_profile/partner_basic_info';
			$data['title'] =    'Muser | Home Page | Mplan';
			$data['descripation'] ='';
			$data['mother_tongue'] = $this->matri->global_select('mother_tongue');
			$this->load->view('site_theme/partner_containt', $data);
		   }
		
	}
	public function partner_education($user_id = NULL)
	{
		if($this->muse->complete_partner_detail($this->tank_auth->get_user_id()) == true)
		{
			$this->complete_edu_page();
		}
		else
		{
			$data['page'] =     'partner_profile/partner_education';
			$data['title'] =    'Muser | Home Page | Mplan';
			$data['descripation'] ='';
			$data['edu_level'] = $this->matri->global_select('education_level'); //retrive in data base
			$data['edu_field'] = $this->matri->global_select('education_field'); //retrive in data base
			$data['work_with'] = $this->matri->global_select('working_with'); //retrive in data base
			$data['work_as'] = $this->matri->global_select('working_as'); //retrive in data base
			$this->load->view('site_theme/partner_containt', $data);
		}
		
	}
	public function partner_background($user_id = NULL)
	{
		if($this->muse->global_complete_partner_detail($this->tank_auth->get_user_id(),'partner_background') == true)
		{
			$this->complete_background_page();
		}
		else
		{
			$data['page'] =     'partner_profile/partner_background';
			$data['title'] =    'Muser | Home Page | Mplan';
			$data['descripation'] ='';
			$data['religion'] = $this->matri->global_select('religion'); //retrive in data base
			$this->load->view('site_theme/partner_containt', $data);
		}
		
		
	}
	public function partner_family($user_id = NULL)
	{
		$data['page'] =     'partner_profile/partner_family';
		$data['title'] =    'Muser | Home Page | Mplan';
		$data['descripation'] ='';
		$this->load->view('site_theme/partner_containt', $data);
	}
	public function partner_hobbies($user_id = NULL)
	{
		$data['page'] =     'partner_profile/partner_hobbies';
		$data['title'] =    'Muser | Home Page | Mplan';
		$data['descripation'] ='';
		$this->load->view('site_theme/partner_containt', $data);
	}
	public function partner_lifestyle($user_id = NULL)
	{
		if($this->muse->global_complete_partner_detail($this->tank_auth->get_user_id(),'partner_lifestyle') == true)
		{
			$this->complete_lifestyle_page();
		}
		else
		{
			$data['page'] =     'partner_profile/partner_lifestyle';
			$data['title'] =    'Muser | Home Page | Mplan';
			$data['descripation'] ='';
			$this->load->view('site_theme/partner_containt', $data);
		}
		
		
	}
	
	/*data insert */
	function pinsert_basic_info()
	{
			
            $this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('country','Country','xss_clean');
            $this->form_validation->set_rules('state','State','xss_clean');
            $this->form_validation->set_rules('city','City','xss_clean');
            $this->form_validation->set_rules('mtongue','Mother Tongue','xss_clean');
            $this->form_validation->set_rules('marital_status','Marital Status','xss_clean');
            $this->form_validation->set_rules('heightto','Height','xss_clean');
	    $this->form_validation->set_rules('height','Height','xss_clean');
            $this->form_validation->set_rules('skin_tone','Skin Tone','xss_clean');
            $this->form_validation->set_rules('body_type','Body Type','xss_clean');
            $this->form_validation->set_rules('disability','Disability','xss_clean');
            $this->form_validation->set_rules('hiv_positive','HIV Positive','xss_clean');
            if($this->form_validation->run() == false)
            {
                $this->partner_basic_info($this->tank_auth->get_user_id());
            }
            else
            {
		$age ='';
		$ageto ='';
		if($this->input->post('age')>$this->input->post('ageto'))
		{
			$age = $this->input->post('ageto');
			$ageto = $this->input->post('age');
		}
		else
		{
			$age = $this->input->post('age');
			$ageto = $this->input->post('ageto');
		}
		$height ='';
		$heightto ='';
		if($this->input->post('height')<=$this->input->post('heightto'))
		{
			$height =$this->input->post('height');
			$heightto =$this->input->post('heightto');
		}
		else
		{
			$height 	=	$this->input->post('heightto');
			$heightto 	=	$this->input->post('height');
		}
		
                $data = array
                (
                        'user_id' => $this->session->userdata('user_id'),//need to change 
                        'pcountry_id'=>$this->input->post('country'),
                        'pstate_id'=>$this->input->post('state'),
                        'pcity_id'=>$this->input->post('city'),
                        'pmtongue_id'=>$this->input->post('mtongue'),
                        'pmarital_status'=>$this->input->post('marital_status'),
			'page' => $age,
			'pageto' => $ageto,
                        'pheightto'=>$heightto,
			'pheight'=>$height,
                        'pskin_tone'=>$this->input->post('skin_tone'),
                        'pbody_type'=>$this->input->post('body_type'),
                        'pdisability'=>$this->input->post('disability'),
                        'phiv_positive'=>$this->input->post('hiv_positive'),
			'pprofile_complete'=>1
                );
		
		
                $this->matri->global_insert('partner_basic', $data);
		$this->complete_basic_page();
		
            }
	}
	/*data insert */
	function pinsert_education()
	{
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('edu_level','Education Level','xss_clean');
		$this->form_validation->set_rules('edu_field','Education field','xss_clean');
		$this->form_validation->set_rules('work_with','Working With','xss_clean');
		$this->form_validation->set_rules('work_as','Working As','xss_clean');
		$this->form_validation->set_rules('annual_income','Annual Income','xss_clean');
            
            if($this->form_validation->run() == false)
            {
                $this->partner_education();
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->tank_auth->get_user_id(),//need to change
                        'pedu_level_id' => $this->input->post('edu_level'),
                        'pedu_field_id' => $this->input->post('edu_field'),
                        'pwork_with_id' => $this->input->post('work_with'),
                        'pwork_as_id' => $this->input->post('work_as'),
                        'pannual_income' => $this->input->post('annual_income'),
                        
                );
                $this->matri->global_insert('partner_edu', $data);
		
            }
	}	
	/*after complete partner profile */
	function pinsert_background()
	{
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('religion','Religion','required|xss_clean');
		$this->form_validation->set_rules('community','Community','xss_clean');
		$this->form_validation->set_rules('sub_community','Community','xss_clean');
            if($this->form_validation->run() == false)
            {
                
                $this->partner_background();
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->tank_auth->get_user_id(),
                        'preligion_id' => $this->input->post('religion'),
                        'pcommunity_id' => $this->input->post('community'),
                        'psub_community' => $this->input->post('subcommunity'),
                                               
                );
                $this->matri->global_insert('partner_background', $data);
		$this->complete_background();
            }
	}
	//partner lifestyle insert
	function pinsert_lifestyle()
	{
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('diet','Diet','xss_clean');
		$this->form_validation->set_rules('smoke','Smoke','xss_clean');
		$this->form_validation->set_rules('drink','Drink','xss_clean');
            if($this->form_validation->run() == false)
            {
                
                $this->partner_lifestyle();
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->tank_auth->get_user_id(),
                        'pdiet' => $this->input->post('diet'),
                        'psmoke' => $this->input->post('smoke'),
                        'pdrink' => $this->input->post('drink'),
                                               
                );
                $this->matri->global_insert('partner_lifestyle', $data);
		$this->complete_lifestyle_page();
            }
	}
	
	function complete_basic_info()
	{
		
		if($this->muse->complete_partner_info($this->tank_auth->get_user_id()) == true)
		   {
			$this->complete_basic_page();
		   }
		   else
		   {
			$this->partner_basic_info($this->tank_auth->get_user_id());
		   }
		
	}
	function complete_edu()
	{
		if($this->muse->complete_partner_detail($this->tank_auth->get_user_id()) == true)
		{
			$this->complete_edu_page();
		}
		else
		{
			$this->partner_education($this->tank_auth->get_user_id());
		}
	}
	private function complete_basic_page()
	{
		$data['page'] =     'partner_profile/complete_partner_basic_info';
		$data['title'] =    'Muser | Home Page | Mplan';
		$data['descripation'] ='';
		$field_val = array(
				   'users.id' => $this->tank_auth->get_user_id()
				);
		$data['matches'] = $this->matri->partner_data($field_val);
		$data['mother_tongue'] = $this->matri->global_select('mother_tongue');
		$this->load->view('site_theme/partner_containt', $data);
	}	
	private function complete_edu_page()
	{
		$data['page'] =     'partner_profile/complete_partner_edu';
		$data['title'] =    'Muser | Home Page | Mplan';
		$data['descripation'] ='';
		$field_val = array(
				   'users.id' => $this->tank_auth->get_user_id()
				);
		$data['matches'] = $this->matri->partner_data($field_val);
		$this->load->view('site_theme/partner_containt', $data);
	}
	function complete_background()
	{
		if($this->muse->global_complete_partner_detail($this->tank_auth->get_user_id(),'partner_background') == true)
		{
			$this->complete_background_page();
		}
		else
		{
			$this->partner_background($this->tank_auth->get_user_id());
		}
	}
	function complete_lifestyle()
	{
		if($this->muse->global_complete_partner_detail($this->tank_auth->get_user_id(),'partner_lifestyle') == true)
		{
			$this->complete_lifestyle_page();
		}
		else
		{
			$this->pinsert_lifestyle($this->tank_auth->get_user_id());
		}
	}
	private function complete_background_page()
	{
		
		$data['page'] =     'partner_profile/complete_partner_background';
		$data['title'] =    'Muser | Home Page | Mplan';
		$data['descripation'] ='';
		$field_val = array(
				   'users.id' => $this->tank_auth->get_user_id()
				);
		$data['matches'] = $this->matri->get_partner_background($field_val);
		$this->load->view('site_theme/partner_containt', $data);		
	}
	private function complete_lifestyle_page()
	{
		
		$data['page'] =     'partner_profile/complete_partner_lifestyle';
		$data['title'] =    'Muser | Home Page | Mplan';
		$data['descripation'] ='';
		$field_val = array(
				   'user_id' => $this->tank_auth->get_user_id()
				);
		$data['matches'] = $this->matri->and_where('partner_lifestyle',$field_val);
		$this->load->view('site_theme/partner_containt', $data);
	}
	/*edit profile */
	/*partner profile update */
	public function update_pbasic_info()
	{
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
            $this->form_validation->set_rules('country','Country','xss_clean');
            $this->form_validation->set_rules('state','State','xss_clean');
            $this->form_validation->set_rules('city','City','xss_clean');
            $this->form_validation->set_rules('mtongue','Mother Tongue','xss_clean');
            $this->form_validation->set_rules('marital_status','Marital Status','xss_clean');
            $this->form_validation->set_rules('heightto','Height','xss_clean');
	    $this->form_validation->set_rules('height','Height','xss_clean');
            $this->form_validation->set_rules('skin_tone','Skin Tone','xss_clean');
            $this->form_validation->set_rules('body_type','Body Type','xss_clean');
            $this->form_validation->set_rules('disability','Disability','xss_clean');
            $this->form_validation->set_rules('hiv_positive','HIV Positive','xss_clean');
            if($this->form_validation->run() == false)
            {
                $this->partner_basic_info($this->tank_auth->get_user_id());
            }
            else
            {
		$age ='';
		$ageto ='';
		if($this->input->post('age')>$this->input->post('ageto'))
		{
			$age = $this->input->post('ageto');
			$ageto = $this->input->post('age');
		}
		else
		{
			$age = $this->input->post('age');
			$ageto = $this->input->post('ageto');
		}
		$height ='';
		$heightto ='';
		if($this->input->post('height')<=$this->input->post('heightto'))
		{
			$height =$this->input->post('height');
			$heightto =$this->input->post('heightto');
		}
		else
		{
			$height 	=	$this->input->post('heightto');
			$heightto 	=	$this->input->post('height');
		}
		
                $data = array
                (
                        'user_id' => $this->session->userdata('user_id'),//need to change 
                        'pcountry_id'=>$this->input->post('country'),
                        'pstate_id'=>$this->input->post('state'),
                        'pcity_id'=>$this->input->post('city'),
                        'pmtongue_id'=>$this->input->post('mtongue'),
                        'pmarital_status'=>$this->input->post('marital_status'),
			'page' => $age,
			'pageto' => $ageto,
                        'pheightto'=>$heightto,
			'pheight'=>$height,
                        'pskin_tone'=>$this->input->post('skin_tone'),
                        'pbody_type'=>$this->input->post('body_type'),
                        'pdisability'=>$this->input->post('disability'),
                        'phiv_positive'=>$this->input->post('hiv_positive'),
			'pprofile_complete'=>1
                );
		
		$this->update->global_update('partner_basic','user_id', $this->tank_auth->get_user_id(), $data);
		$this->partner_basic_info($this->tank_auth->get_user_id());
		
            }
	}
	function update_pbackground()
	{
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('religion','Religion','required|xss_clean');
		$this->form_validation->set_rules('community','Community','xss_clean');
		$this->form_validation->set_rules('sub_community','Community','xss_clean');
		$this->form_validation->set_rules('diet','Diet','xss_clean|trim');
		$this->form_validation->set_rules('smoke','Smoke','xss_clean|trim');
		$this->form_validation->set_rules('drink','Drink','xss_clean|trim');
            if($this->form_validation->run() == false)
            {
                
                $this->complete_background();
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->tank_auth->get_user_id(),
                        'preligion_id' => $this->input->post('religion'),
                        'pcommunity_id' => $this->input->post('community'),
                        'psub_community' => $this->input->post('sub_community'),
                                               
                );
		$this->update->global_update('partner_background','user_id', $this->tank_auth->get_user_id(), $data);
		$data = array
                (
                        
                        'pdiet' => $this->input->post('diet'),
                        'psmoke' => $this->input->post('smoke'),
                        'pdrink' => $this->input->post('drink'),
                                               
                );
		
		$this->update->global_update('partner_lifestyle','user_id', $this->tank_auth->get_user_id(), $data);
		
		$this->complete_background();
            }
	}
	function update_plifestyle()
	{
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('diet','Diet','xss_clean|trim');
		$this->form_validation->set_rules('smoke','Smoke','xss_clean|trim');
		$this->form_validation->set_rules('drink','Drink','xss_clean|trim');
            if($this->form_validation->run() == false)
            {
                
                $this->complete_lifestyle_page();
            }
            else
            {
                $data = array
                (
                        
                        'pdiet' => $this->input->post('diet'),
                        'psmoke' => $this->input->post('smoke'),
                        'pdrink' => $this->input->post('drink'),
                                               
                );
		$this->update->global_update('partner_lifestyle','user_id', $this->tank_auth->get_user_id(), $data);
                
		$this->complete_lifestyle_page();
            }
	}
	function update_pedu()
	{
		$this->form_validation->set_error_delimiters("<tr > <td colspan='2' class='ferror' style='line-height: 15px;'>", '</td></tr>');
		$this->form_validation->set_rules('edu_level','Education Level','xss_clean');
		$this->form_validation->set_rules('edu_field','Education field','xss_clean');
		$this->form_validation->set_rules('work_with','Working With','xss_clean');
		$this->form_validation->set_rules('work_as','Working As','xss_clean');
		$this->form_validation->set_rules('annual_income','Annual Income','xss_clean');
            
            if($this->form_validation->run() == false)
            {
                $this->partner_education();
            }
            else
            {
                $data = array
                (
                        'user_id' => $this->tank_auth->get_user_id(),//need to change
                        'pedu_level_id' => $this->input->post('edu_level'),
                        'pedu_field_id' => $this->input->post('edu_field'),
                        'pwork_with_id' => $this->input->post('work_with'),
                        'pwork_as_id' => $this->input->post('work_as'),
                        'pannual_income' => $this->input->post('annual_income'),
                        
                );
		$this->update->global_update('partner_edu','user_id', $this->tank_auth->get_user_id(), $data);
		$this->partner_education();
            }
	}
}