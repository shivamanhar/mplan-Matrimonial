<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Matri
 *
 * This model represents matrimonial user  data base. It can be used
 * for address access, insert, delete.
 *
 * @package	models
 * Class Name   Matri
 * @author	shiva manhar (shivamanhar)
 * Date         22/4/2015
 * 
 */
class Matri extends CI_Model
{
    //db insert in any table , any data
    function global_insert($table_name, $data)
    {
        $query = $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }
    //db select in any table
    function global_select($table_name)
    {
        $query = $this->db->get($table_name);
        return $query;
    }
    //get value
    function global_get($table_name, $where_field=NULL , $per_page = NULL, $page_segment = NULL, $order_by = NULL)
    {
        if($where_field != NULL)
        {
            $this->db->where($where_field);
        }
        if(($per_page != NULL) AND ($page_segment != NULL) )
        {
            $this->db->limit($per_page, $page_segment);
        }
        $this->db->select("*");
        if(($order_by != NULL))
        {
        $this->db->order_by($order_by);
        }
        $get_value = $this->db->get($table_name);
        return $get_value;
    }
      function global_get_limit($table_name, $where_field=NULL , $per_page = NULL, $page_segment = NULL, $order_by = NULL)
    {
        if($where_field != NULL)
        {
            $this->db->where($where_field);
        }
        
            $this->db->limit($per_page, $page_segment);
        
        $this->db->select("*");
        if(($order_by != NULL))
        {
        $this->db->order_by($order_by);
        }
        $get_value = $this->db->get($table_name);
        return $get_value;
    }
    function global_update($table_name, $where_field, $data)
    {
        $this->db->where($where_field);
        $this->db->update($table_name, $data);
        return $this->db->affected_rows();
    }
    //dh select in any table but using where condition
    //select  *from user_profiles left join countries on countries.id = user_profiles.country_id left join states on states.id = user_profiles.state_id left join cities on cities.id =  user_profiles.city_id
    function global_where($table_name, $where_field)
    {
        if($table_name == 'user_profiles')
        {
            $this->db->select('user_profiles.*,height.*,  mtongue,
                              countries.name as country , states.name as state,
                              cities.name as city, height.id as hid');
            $this->db->from('user_profiles');
            $this->db->join('mother_tongue', 'mother_tongue.id = user_profiles.mother_tongue_id',  'left');
            $this->db->join('countries', 'countries.id = user_profiles.country_id',  'left');
            $this->db->join('states', 'states.id = user_profiles.state_id',  'left');
            $this->db->join('cities', 'cities.id = user_profiles.city_id', 'left');
            $this->db->join('height', 'height.id = user_profiles.height',  'left');
            $this->db->where($where_field);
            $query = $this->db->get();
            return  $query;
        }
        else
        {
        $this->db->where($where_field);
        $query = $this->db->get($table_name);
        return $query;
        }
    }
    //select user_edu but it not direct work we need to join table
    //here use diferent method
    function select_edu($field_val)
    {
        $this->db->select('education_field.*,
                            education_level.*, working_as.*, working_with.*, user_edu.*');
        $this->db->from('user_edu');
        $this->db->join('education_field', 'education_field.id = user_edu.edu_field_id',  'left');
        $this->db->join('education_level', 'education_level.id = user_edu.edu_level_id',  'left');
        $this->db->join('working_with', 'working_with.id = user_edu.work_with_id',  'left');
        $this->db->join('working_as', 'working_as.id = user_edu.work_as_id',  'left');
        $this->db->where($field_val);
        $query = $this->db->get();
        return  $query;
    }
    function get_community($table_name, $field, $val)
    {
        $this->db->where($field, $val);
        $this->db->order_by("community_name", "asc"); 
        $query = $this->db->get($table_name);
        return $query;
    }
    
    /* select where and where condition*/
    function and_where($table_name, $field_val)
    {
        $this->db->where($field_val);
        $query = $this->db->get($table_name);
        return $query;
    }
    
    /*global update */    
    function global_upldate($table_name, $field, $val, $data)
    {
        $this->db->where($field, $val);
        $query =  $this->db->update($table_name, $data);
        return $query;
    }
    /*update global_update_where*/
    function global_upldate_where($table_name, $field, $data)
    {
        $this->db->where($field);
        $query =  $this->db->update($table_name, $data);
        return $this->db->affected_rows();
    } 
     
    
    /* join table for geting user background */
    function get_user_background($userid)
    {
        $this->db->select('*');
        $this->db->from('user_background');
        $this->db->join('religion', 'religion.id =user_background.religion_id',  'left');
        $this->db->join('community', 'community.id = user_background.community_id',  'left');        
        $this->db->where('user_id', $userid);
        $query = $this->db->get();
        return  $query;
    }
    
    /*match data filter for user */
    function muser_data( $field_val, $per_page, $page_segment)
    {
        $this->db->select('users.*, user_profiles.*, education_field.*,
                            education_level.*, working_as.*, working_with.*, user_family.*,
                            user_file.*, userfolder.*, user_background.*, user_hobbies.*,
                            user_lifestyle.* , mother_tongue.* , religion.*, community.*, 
                            countries.name as country , states.name as state, users.id as muser_id,
                              cities.name as city , users.id as main_id');
        $this->db->from('users');
        $this->db->join('user_profiles','user_profiles.user_id = users.id', 'left');
        $this->db->join('user_edu','user_edu.user_id = users.id', 'left');
        $this->db->join('education_field','education_field.id = user_edu.edu_field_id', 'left');
        $this->db->join('education_level','education_level.id = user_edu.edu_level_id','left');
        $this->db->join('working_as','working_as.id = user_edu.work_as_id', 'left');
        $this->db->join('working_with','working_with.id =user_edu.work_with_id', 'left');
        $this->db->join('user_family','user_family.user_id = users.id', 'left');
       
        $this->db->join('user_file','user_file.user_id = users.id', 'left');
        $this->db->join('userfolder','userfolder.user_id = users.id', 'left');
        $this->db->join('user_background','user_background.user_id = users.id', 'left');        
        $this->db->join('user_hobbies', 'user_hobbies.user_id = users.id',  'left');
        $this->db->join('user_lifestyle', 'user_lifestyle.user_id = users.id',  'left');
        $this->db->join('mother_tongue', 'mother_tongue.id= user_profiles.mother_tongue_id',  'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id',  'left');
        $this->db->join('cities', 'cities.id = user_profiles.city_id',  'left');
        $this->db->join('states', 'states.id = user_profiles.state_id',  'left');
        $this->db->join('religion', 'religion.id = user_background.religion_id',  'left');
        $this->db->join('community', 'community.id = user_background.community_id',  'left');
        
        $this->db->where($field_val);
        $this->db->where('file_name IS NOT NULL');
        $this->db->order_by("users.id", "desc"); 
        $this->db->limit($per_page, $page_segment);       
        $query = $this->db->get();
        return $query;
    }
    function total_muser_data($field_val)
    {
        $this->db->select('users.*, user_profiles.*, education_field.*,
                            education_level.*, working_as.*, working_with.*, user_family.*,
                            user_file.*, userfolder.*, user_background.*, user_hobbies.*,
                            user_lifestyle.* , mother_tongue.* , religion.*, community.*, height.*, 
                            countries.name as country , states.name as state, users.id as muser_id,
                              cities.name as city, height.id as hid, users.id as main_id');
        $this->db->from('users');
        $this->db->join('user_profiles','user_profiles.user_id = users.id', 'left');
        $this->db->join('user_edu','user_edu.user_id = users.id', 'left');
        $this->db->join('education_field','education_field.id = user_edu.edu_field_id', 'left');
        $this->db->join('education_level','education_level.id = user_edu.edu_level_id','left');
        $this->db->join('working_as','working_as.id = user_edu.work_as_id', 'left');
        $this->db->join('working_with','working_with.id =user_edu.work_with_id', 'left');
        $this->db->join('user_family','user_family.user_id = users.id', 'left');
       
        $this->db->join('user_file','user_file.user_id = users.id', 'left');
        $this->db->join('userfolder','userfolder.user_id = users.id', 'left');
        $this->db->join('user_background','user_background.user_id = users.id', 'left');        
        $this->db->join('user_hobbies', 'user_hobbies.user_id = users.id',  'left');
        $this->db->join('user_lifestyle', 'user_lifestyle.user_id = users.id',  'left');
        $this->db->join('mother_tongue', 'mother_tongue.id= user_profiles.mother_tongue_id',  'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id',  'left');
        $this->db->join('cities', 'cities.id = user_profiles.city_id',  'left');
        $this->db->join('states', 'states.id = user_profiles.state_id',  'left');
        $this->db->join('religion', 'religion.id = user_background.religion_id',  'left');
        $this->db->join('community', 'community.id = user_background.community_id',  'left');
        $this->db->join('height', 'height.id = user_profiles.height',  'left');
        $this->db->where($field_val);
        $this->db->where('file_name IS NOT NULL');
        $query = $this->db->get();
        return $query;
    }
    /*method for Desired Partner */
    function desired_partner_data( $field_val, $per_page, $page_segment)
    {
        $this->db->select('users.*, user_profiles.*, education_field.*,
                            education_level.*, working_as.*, working_with.*, user_family.*,
                            user_file.*, userfolder.*, user_background.*, user_hobbies.*,
                            user_lifestyle.* , mother_tongue.* , religion.*, community.*, 
                            countries.name as country , states.name as state, users.id as muser_id,
                              cities.name as city, users.id as main_id');
        $this->db->from('users');
        $this->db->join('user_profiles','user_profiles.user_id = users.id', 'left');
        $this->db->join('user_edu','user_edu.user_id = users.id', 'left');
        $this->db->join('education_field','education_field.id = user_edu.edu_field_id', 'left');
        $this->db->join('education_level','education_level.id = user_edu.edu_level_id','left');
        $this->db->join('working_as','working_as.id = user_edu.work_as_id', 'left');
        $this->db->join('working_with','working_with.id =user_edu.work_with_id', 'left');
        $this->db->join('user_family','user_family.user_id = users.id', 'left');
       
        $this->db->join('user_file','user_file.user_id = users.id', 'left');
        $this->db->join('userfolder','userfolder.user_id = users.id', 'left');
        $this->db->join('user_background','user_background.user_id = users.id', 'left');        
        $this->db->join('user_hobbies', 'user_hobbies.user_id = users.id',  'left');
        $this->db->join('user_lifestyle', 'user_lifestyle.user_id = users.id',  'left');
        $this->db->join('mother_tongue', 'mother_tongue.id= user_profiles.mother_tongue_id',  'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id',  'left');
        $this->db->join('cities', 'cities.id = user_profiles.city_id',  'left');
        $this->db->join('states', 'states.id = user_profiles.state_id',  'left');
        $this->db->join('religion', 'religion.id = user_background.religion_id',  'left');
        $this->db->join('community', 'community.id = user_background.community_id',  'left');
        
         $this->db->where($field_val);
         
        $this->db->where('file_name IS NOT NULL');
         
        $this->db->order_by("users.id", "desc"); 
        $this->db->limit($per_page, $page_segment);       
        $query = $this->db->get();
        return $query;
    }
    function total_desired_partner($field_val)
    {
        $this->db->select('users.*, user_profiles.*, education_field.*,
                            education_level.*, working_as.*, working_with.*, user_family.*,
                            user_file.*, userfolder.*, user_background.*, user_hobbies.*,
                            user_lifestyle.* , mother_tongue.* , religion.*, community.*, 
                            countries.name as country , states.name as state,
                              cities.name as city');
        $this->db->from('users');
        $this->db->join('user_profiles','user_profiles.user_id = users.id', 'left');
        $this->db->join('user_edu','user_edu.user_id = users.id', 'left');
        $this->db->join('education_field','education_field.id = user_edu.edu_field_id', 'left');
        $this->db->join('education_level','education_level.id = user_edu.edu_level_id','left');
        $this->db->join('working_as','working_as.id = user_edu.work_as_id', 'left');
        $this->db->join('working_with','working_with.id =user_edu.work_with_id', 'left');
        $this->db->join('user_family','user_family.user_id = users.id', 'left');
       
        $this->db->join('user_file','user_file.user_id = users.id', 'left');
        $this->db->join('userfolder','userfolder.user_id = users.id', 'left');
        $this->db->join('user_background','user_background.user_id = users.id', 'left');        
        $this->db->join('user_hobbies', 'user_hobbies.user_id = users.id',  'left');
        $this->db->join('user_lifestyle', 'user_lifestyle.user_id = users.id',  'left');
        $this->db->join('mother_tongue', 'mother_tongue.id= user_profiles.mother_tongue_id',  'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id',  'left');
        $this->db->join('cities', 'cities.id = user_profiles.city_id',  'left');
        $this->db->join('states', 'states.id = user_profiles.state_id',  'left');
        $this->db->join('religion', 'religion.id = user_background.religion_id',  'left');
        $this->db->join('community', 'community.id = user_background.community_id',  'left');
        $this->db->where($field_val);
        
        $this->db->where('file_name IS NOT NULL');
        $query = $this->db->get();
        return $query;
    } 
     
     
    /*partner like data retrive*/
    function partner_data($field_val)
    {
        $this->db->select('partner_basic.*,
                          mother_tongue.*, height.*,
                          countries.name as country ,
                          states.name as state,
                          cities.name as city, users.id as muser_id, height.id as hid,
                          aheight.global_height as mheightto'                         
                          );
        
        $this->db->from('users');
        $this->db->join('partner_basic','partner_basic.user_id= users.id');
        $this->db->join('countries', 'countries.id = partner_basic.pcountry_id',  'left');
        $this->db->join('cities', 'cities.id = partner_basic.pcity_id',  'left');
        $this->db->join('states', 'states.id = partner_basic.pstate_id',  'left');
        $this->db->join('mother_tongue', 'mother_tongue.id = partner_basic.pmtongue_id',  'left');
        $this->db->join('height', 'height.id = partner_basic.pheight',  'left');
        $this->db->join('height as aheight', 'aheight.id = partner_basic.pheightto',  'left');
        $this->db->where($field_val);
        $query = $this->db->get();
        return $query;
    }
    
    /*get partner background */
    function get_partner_background($field_val)
    {
        $this->db->select('partner_background.*,
                          religion.*,
                          community.*');
        $this->db->from('users');
         $this->db->join('partner_background', 'partner_background.user_id = users.id',  'left');
        $this->db->join('religion', 'religion.id = partner_background.preligion_id',  'left');
        $this->db->join('community', 'community.id = partner_background.pcommunity_id',  'left');
        $this->db->where($field_val);
        $query = $this->db->get();
        return $query;
    }
   /* get partner education */
   function get_partner_education($user_id)
   {
        $this->db->select('education_field.*,
                            education_level.*, working_as.*, working_with.*, partner_edu.*');
        $this->db->from('partner_edu');
        $this->db->join('education_field','education_field.id = partner_edu.pedu_field_id', 'left');
        $this->db->join('education_level','education_level.id = partner_edu.pedu_level_id','left');
        $this->db->join('working_as','working_as.id = partner_edu.pwork_as_id', 'left');
        $this->db->join('working_with','working_with.id =partner_edu.pwork_with_id', 'left');     
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return  $query;    
   }
   // get user file */
   
   function get_userfile($field_val)
   {
        $this->db->select('user_file.*,
                          userfolder.*');
        $this->db->from('user_file');
        $this->db->join('userfolder','userfolder.id =user_file.folder_id', 'left');  
        $this->db->where($field_val);
        $query = $this->db->get();
        return  $query;  
   }
    
    /*for muse method golbal access value */
   function get_some_value($table, $where_field)
   {
        $this->db->where($where_field);
        $query = $this->db->get($table);
        return $query;
   }
   
   
}
/* end of matri class */
?>