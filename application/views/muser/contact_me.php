<?php
/* database data access for contact information*/
/* block for
if(isset($user_profiles))
  {
        foreach($user_profiles->result() as $row)
        {
               $country = $row->country;
               $state = $row->state;
               $city = $row->city;
              
        }
  }
*/
  
if(isset($matches))
  {
        foreach($matches->result() as $row)
        {
               $country = $row->country;
               $state = $row->state;
               $city = $row->city;
               $email = $row->email;
               $mobile_no = $row->mobile_no;
              
        }
  }
  ?>
  
  
  <?php
  
  $show_mobile = 0;
  $show_email = 0;
  if($this->matri->global_get('account_setting', array('user_id'=>$main_id))->num_rows()<=0)
  {
     $show_mobile =1;
     $show_email = 1;
  }
  
  $db_show_mobile = $this->matri->global_get('account_setting', array('user_id'=>$main_id,'display_mobile'=>1))->num_rows();
  $db_show_email = $this->matri->global_get('account_setting', array('user_id'=>$main_id,'display_email'=>1))->num_rows();
            if(($db_show_mobile>0))
            {
                  $show_mobile = 1;
            }
            if( $db_show_email>0)
            {
                  $show_email = 1;
            }
?>
  
  <div class="container">   
                 <div class="row">
                  
                   <table class="table success tb_align mprofile_tb" style="margin-bottom:0px" >
                        <tr> <th colspan="2">Contact Me </th> </tr>
                    <tr> <td class="col-md-3 mh">Country Name </td> <td class="col-md-8"> <?php if(isset($country)){echo ucwords($country);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">State </td> <td class="col-md-8"> <?php if(isset($state)){echo ucwords($state);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">City </td> <td class="col-md-8"> <?php if(isset($city)){echo ucwords($city);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Contact Number</td> <td class="col-md-8"> <?php if(isset($mother_status)){echo ucwords($mother_status);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Email  </td>
                    <td class="col-md-8">
                    
                    <?php
                    if($show_email ==1 )
                    {
                        if(isset($email)){echo "+".$email;} else {echo "NULL";}
                    }
                    else
                    {
                        echo "Email address not show by user";
                    }
                    ?>
                    </td>
                    </tr>
                    <tr> <td class="col-md-3 mh">Mobile No. </td>
                    <td class="col-md-8"
                    ><?php
                    if($show_mobile ==1 )
                    {
                        if(isset($mobile_no)){echo "+".$mobile_no;} else {echo "NULL";}
                    }
                    else
                    {
                        echo "Mobile number not show by user";
                    }
                    ?></td>
                    </tr>
                    <tr> <td class="col-md-3 mh">Social Network</td> <td class="col-md-8"> <?php if(isset($sister)){echo $sister;} else {echo "NULL";}?></td></tr>
                  
                   </table>
                 </div>
  </div>