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
  <style>
     .navbar{
        margin-bottom: 0;

    }
    .marketing, .footer{
        padding: 1em;
    }
    small{
        font-size: 0.6em;
    }
    </style>

<div class="container">
      <div class="row">
	 <div class="col-md-12">
	 <h2> Profile Image </h2>
	 </div>
	 
	 <div class="col-md-3">
	    <form action="<?php echo base_url();?>user_profile/insert_pimage" method="post">
	       <div class="image-editor">
		 <input type="file" class="cropit-image-input" class="btn btn-primary" >
		
		 <div class="cropit-image-preview"></div>
		 <div class="image-size-label">
		   Resize image
		 </div>
		 <input type="range" class="cropit-image-zoom-input">
		 <input type="hidden" name="image-data" class="hidden-image-data" />
		 <button type="submit" class="btn btn-primary">Submit</button>
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
<input type="hidden" id = 'url' value="<?php echo base_url();?>index.php/user_profile/insert_pimage">