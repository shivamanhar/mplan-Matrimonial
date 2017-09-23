  <?php
  /* database data access */
  /*block for tesing
  if(isset($user_profiles))
  {
        foreach($user_profiles->result() as $row)
        {
                $mtongue = $row->mtongue;
              $marital_status = $row->marital_status;
              $heightto       = $row->height;
              $skin_tone      = $row->skin_tone;
              $body_type      = $row->body_type;
              $disability     = $row->disability;
              $hiv_positive   = $row->hiv_positive;
        }
  }
  if(isset($user_lifestyle))
  {
        foreach($user_lifestyle->result() as $row)
        {
          
              $diet         =   $row->diet;
              $smoke        =   $row->smoke;
              $drink        =   $row->drink;
        }
  }
  if(isset($user_edu))
  {
        foreach($user_edu->result() as $row)
        {          
              $edu_level        =   $row->edu_level;
              $edu_field        =   $row->edu_field;
              $work_with        =   $row->work_with;
              $work_as          =   $row->work_as;
        }
  }
  
  if(isset($user_family))
  {
        foreach($user_family->result() as $row)
        {          
              $father_name        =   $row->father_name;
              $mother_name        =   $row->mother_name;
              $father_status       =   $row->father_status;
              $mother_status          =   $row->mother_status;
              $family_status          =   $row->family_status;
              $brother         =   $row->brother;
              $sister         =   $row->sister;
        }
  }
  */
  /*data base access */
  if(isset($matches))
  {
        foreach($matches->result() as $row)
        {
                $mtongue = $row->mtongue;
              $marital_status = $row->marital_status;
              $heightto       = $row->height;
              $skin_tone      = $row->skin_tone;
              $body_type      = $row->body_type;
              $disability     = $row->disability;
              $hiv_positive   = $row->hiv_positive;
              $diet         =   $row->diet;
              $smoke        =   $row->smoke;
              $drink        =   $row->drink;
              $edu_level        =   $row->edu_level;
              $edu_field        =   $row->edu_field;
              $work_with        =   $row->work_with;
              $work_as          =   $row->work_as;
              $father_name        =   $row->father_name;
              $mother_name        =   $row->mother_name;
              $father_status       =   $row->father_status;
              $mother_status          =   $row->mother_status;
              $family_status          =   $row->family_status;
              $brother         =   $row->brother;
              $sister         =   $row->sister;
        }
  }

  ?>
  <div class="container">   
                 <div class="row">
                   <table class="table success tb_align mprofile_tb" style="margin-bottom:0px" >
                              <tr> <th colspan="2"> My Family </th> </tr>
                    <tr> <td class="col-md-3 mh">Father's Name </td> <td class="col-md-8"> <?php if(isset($father_name)){echo ucwords($father_name);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Mother's Name </td> <td class="col-md-8"> <?php if(isset($mother_name)){echo ucwords($mother_name);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Father's status </td> <td class="col-md-8"> <?php if(isset($father_status)){echo ucwords($father_status);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Mother's status</td> <td class="col-md-8"> <?php if(isset($mother_status)){echo ucwords($mother_status);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Family Status </td> <td class="col-md-8"> <?php if(isset($family_status)){echo ucwords($family_status);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Brother(s) </td> <td class="col-md-8"><?php if(isset($brother)){echo $brother;} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Sisters(s)</td> <td class="col-md-8"> <?php if(isset($sister)){echo $sister;} else {echo "NULL";}?></td></tr>
                  
                   </table>
                 </div>
  </div>