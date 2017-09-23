<style>
      .cropit-image-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
        cursor: move;
      }

      .cropit-image-background {
        opacity: .2;
        cursor: auto;
      }

     

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }      
</style>

<div class="container">
    <div class="row">
      <div class= "col-md-6">
        <table class="profile_img_change">
          <tr>
            <td>
                    <h2> Profile Image </h2> </td>
          </tr>

          <tr>
            <td>

        <?php


        if($this->muse->display_value('user_file', array('user_id'=>$this->tank_auth->get_user_id(), 'profile_img'=>1), 'user_id') >= 1)
        {

          echo "<img src = '".$this->muse->display_value('user_file', array('user_id'=>$this->tank_auth->get_user_id(), 'profile_img'=>1), 'path')."' class='img-responsive img-rounded profile_img' style='border: 2px solid #FE4D01;' alt='mplan'>";
        }
        else
        {
            redirect('update_profile/photo');
        }
      

        ?>

        </td>
          </tr>          

        <tr> <td> <a href="#" class="btn btn-primary">Change Image</a> </td></tr>

        </table>

        

      </div>

      

      <div class="col-md-6">
      </div>
    </div>
</div>



<!-- Modal HTML block b -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url();?>muser/profile_image_change" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Profile Image</h4>
                </div>
            <div class = "modal-body">
            
            <table class="table success table-bordered" style="margin-bottom:0px" >
                <tr>
                    <td class="col-md-6">
                               <div class="image-editor">
                                 <input type="file" class="cropit-image-input" class="btn btn-primary" >
                                <div> Browse and select OR Drop file below</div>
                                 <div class="cropit-image-preview"></div>
                                 <div class="image-size-label col-md-3">
                                   Resize image
                                 <input type="range" class="cropit-image-zoom-input">
                                    </div>
                                 <input type="hidden" name="image-data" class="hidden-image-data" />
                                 
                               </div>
                    </td>
                </tr>
            </table>
            </div>
            <div class="modal-footer">                
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>

            </div>

            </form>

            </div>

        </div>

    </div>
  
<script>
      $(function() {
        $('.image-editor').cropit();

        $('form').submit(function() {
          // Move cropped image data to hidden input
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);

          // Print HTTP request params
          var formValue = $(this).serialize();
          //$('#result-data').text(formValue);
      
          // Prevent the form from actually submitting
          return true;
        });
      });
 </script>