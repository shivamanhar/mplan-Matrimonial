  <?php
  /* database data access */
  /*block for testing 
  
 /*data retrive */
 if(isset($matches))
  {
    foreach($matches->result() as $row)
    {
        $name             = $row->firstname." ".$row->lastname;
        $marital_status   = $row->marital_status;
        $heightto         = $row->global_height;
        $mtongue          = $row->mtongue;
        $skin_tone        = $row->skin_tone;
        $body_type        = $row->body_type;
        $diet             = $row->diet;
        $smoke            = $row->smoke;
        $drink            = $row->drink;
        $edu_level        = $row->edu_level;
        $edu_field        = $row->edu_field;
        $work_with        = $row->work_with;
        $work_as          = $row->work_as;
        $religion         = $row->religion_name;
        $community        = $row->community_name;
        $sub_community    = $row->sub_community;
        $disability       = $row->disability;
        $hiv_positive     = $row->hiv_positive;
    }
  }
  
  ?>
  <div class="container">   
                 <div class="row">
                   <table class="table success tb_align mprofile_tb" style="margin-bottom:0px" >
                    <tr> <th colspan="2"> Basic Information </th> </tr>
                    <tr> <td class="col-md-3 mh">Name </td> <td class="col-md-8"> <?php if(isset($name)){echo ucwords($name);} else {echo "NULL";}?> </td></tr>
                    <tr> <td class="col-md-3 mh">Marital Status </td> <td class="col-md-6"> <?php if(isset($marital_status)){echo ucwords($marital_status);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Height</td> <td class="col-md-6"><?php if(isset($heightto)){echo $heightto;} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Mother Tongue</td> <td class="col-md-6"> <?php if(isset($mtongue)){echo ucwords($mtongue);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Skin Tone </td> <td class="col-md-6"> <?php if(isset($skin_tone)){echo ucwords($skin_tone);} else {echo "NULL";}?></td></tr>
                    <tr> <td class="col-md-3 mh">Body Type </td> <td class="col-md-6"> <?php if(isset($body_type)){echo ucwords($body_type);} else {echo "NULL";} ?></td></tr>
                    <tr> <th colspan="2"> Life Style </th> </tr>
                    <tr> <td class="col-md-3 mh">Diet </td> <td class="col-md-6"> <?php if(isset($diet)){echo ucwords($diet);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">Smoke </td> <td class="col-md-6"> <?php if(isset($smoke)){echo ucwords($smoke);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">Drink</td> <td class="col-md-6"> <?php if(isset($drink)){echo ucwords($drink);} else {echo "NULL";} ?></td></tr>
                    <tr> <th colspan="2"> Education Information </th> </tr>
                    <tr> <td class="col-md-3 mh">Education Level</td> <td class="col-md-6"> <?php if(isset($edu_level)){echo ucwords($edu_level);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">Education Field</td> <td class="col-md-6"> <?php if(isset($edu_field)){echo ucwords($edu_field);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">Working With</td> <td class="col-md-6"> <?php if(isset($work_with)){echo ucwords($work_with);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">Working As</td> <td class="col-md-6"><?php if(isset($work_as)){echo ucwords($work_as);} else {echo "NULL";} ?></td></tr>
                    <tr> <th colspan="2"> Other Information </th> </tr>
                    <tr> <td class="col-md-3 mh">Religion</td> <td class="col-md-6"> <?php if(isset($religion)){echo ucwords($religion);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">Community</td> <td class="col-md-6"><?php if(isset($community)){echo ucwords($community);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">Sub  Community / Gotra</td> <td class="col-md-6"> <?php if(isset($sub_community)){echo ucwords($sub_community);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">Disability</td> <td class="col-md-6"> <?php if(isset($disability)){echo ucwords($disability);} else {echo "NULL";} ?></td></tr>
                    <tr> <td class="col-md-3 mh">HIV Positive</td> <td class="col-md-6"> <?php if(isset($hiv_positive)){echo ucwords($hiv_positive);} else {echo "NULL";}?></td></tr>
                   </table>
                 </div>
  </div>