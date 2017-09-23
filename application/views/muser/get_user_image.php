<div class="container">
    <div class="row">
      <div class= "col-md-6">
        
        <table class="profile_img_change">
          <tr> <td>
        <h2> Profile Image </h2> </td></tr>
          <tr> <td>
        <?php
        if(isset($user_id))
        {
                $field = array(
                               'user_file.user_id' => $user_id,
                               'profile_img' => 1
                               );
               
                $image_id = $this->muse->get_userfile($field, 'user_id');
                
                if($image_id != NULL)
                {

                  echo "<img src = '".base_url()."user_profile/get_image/".$image_id."/' class='img-responsive img-rounded profile_img' style='border: 2px solid #FE4D01;' alt='mplan'>";
                }
        }
        else
        {
            redirect('/muser/index');
        }
        ?>
        </td></tr>
          
        
        </table>
        
      </div>
      
      <div class="col-md-6">
       
      </div>
    </div>
</div>

