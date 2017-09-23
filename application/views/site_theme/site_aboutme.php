<?php
/*data base access data */
if(isset($matches))
{
	foreach($matches->result() as $row)
	{
		$own_words = $row->own_words;
		$name = ucwords($row->firstname);
		$image_id = $row->main_id;
	}
}
?>
<!-- Site About me (MUser) Container -->
<div class="container">
	<div class="row">
		
	      <div class="col-md-3">
		<?php if($this->muse->display_value('user_file', array('user_id'=>$main_id, 'profile_img'=>1), 'user_id')>=1)
		{
			?>
			<img src="<?php echo $this->muse->display_value('user_file', array('user_id'=>$main_id, 'profile_img'=>1), 'path');?>" class="img-responsive img-rounded profile_img" style ="border: 2px solid #FE4D01;" alt="mplan">
		<?php 
		}
		else
		{
			echo "Image not find!";
		}
		?>
              </div>
	      <div class="col-md-9">
			<h2> <?php if(isset($name)){echo ucwords($name);} else {echo "NULL";} ?></h2>
						<?php
						if(isset($own_words))
						{
										echo ucfirst($own_words);
						}
						?>
						
			<div style="clear:both"></div>
			<?php if($main_id != $this->tank_auth->get_user_id())
			{
				?>
				<h3 style="margin-top:8px;margin-bottom:8px"> Drop Message </h3>
				<?php echo $this->input->get('msg');?>
				<form action="<?php echo base_url();?>send_message" method="post">
					<textarea style="max-height:70px;min-height:70px;max-width:805px" name="message"></textarea>
					<input type="hidden" value="<?php echo $main_id; ?>" name="send_to">
					<input type="submit" value="Send" class="btn btn-primary">
				</form>
				<?php }?>
			
              </div>
		
        </div>			
</div>




                         