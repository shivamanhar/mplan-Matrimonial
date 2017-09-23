<div class="container" id="matches">   
                 <div class="row" style="margin-top:20px;">                    
                        <!-- left panel -->
                        <?php $this->load->view('muser/left_panel');?>
                        <!-- end left panel -->
                                  
                        <div class="alert alert-info">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <center>
                                  <strong>Info!</strong> Create Your <a href="<?php echo base_url();?>user_profile/" class="btn btn-primary" > Profile </a>. 
                                  </center>
                        </div>
                                 
                                  
                        <div class="col-md-9 col-xs-12 col-sm-7" id ="matches_change">
                                  
                                  <div id="cbp-vm " class="cbp-vm-switcher cbp-vm-view-grid ">
					<div class="cbp-vm-options row">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
					</div>
						   
                                                   <ul id="postList" class="list">
                                                 
                                                 
                                                 <?php
								    //metches data retrive //
								    if(isset($matches))
								    {
										     foreach($matches->result() as $row)
										     {
											   
								  ?>                            
							  
										      <li>
											  <a class="cbp-vm-image" href="#">
												      
												       <?php
												      if($row->file_name != NULL)
														       {
												      ?>
														       <img src="<?php echo base_url()."user_profile/get_image/".$row->main_id;?>" class="img-responsive img-rounded" alt="mplan | Matrimonial">
														       <?php
														       }
														       else
														       {
												      ?>                                                                    
														       <img src="<?php echo base_url();?>img/img_not_avalable.jpg" class="img-responsive img-rounded">              
												      <?php 
														       }
												      ?>   
											  </a>
											  <h3 class="cbp-vm-title"><?php echo ucfirst($row->firstname); ?> </h3>
											  <div class="cbp-vm-price"><?php       echo $this->muse->agecal($row->dob) ." Year"; ?>
											  </div>
											  <div class="cbp-vm-details"> <?php echo ucfirst($row->religion_name);?> 
											  <?php
											  if($row->community_name)
											  {
											  echo ucfirst($row->community_name);
											  }
											  else
											  {
												      echo "&nbsp;";
											  }
											  ?> 
											  </div>
											  <div class="cbp-vm-details">  <?php
											  echo ucfirst($row->country)." / ".ucfirst($row->state);?>  
											  </div>
											  <div class="cbp-vm-details"> <?php
											  if($row->city)
											  {
											  echo ucfirst($row->city);
											  }
											  else
											  {
												      echo "&nbsp;";
											  }?> 
											  </div>
											  <a class="btn btn-success" href="<?php echo base_url();?>users/<?php echo $row->muser_id;?>">View Profile</a>
										     </li>
										  
							      <?php
										     }
								    }
                            ?>
                                                                 <div class="clear"></div>
								<!-- pageination -->
								 <?php echo $this->ajax_pagination->create_links(); ?>       
                                                   </ul>
								    
						 
						  
				</div>
				  
                                  <?php //echo "".$create_link;?>
                                  <!-- end pageination -->
                        </div>    <!-- end matches containt -->
                        
			<div class="col-md-2">
				  <!--testing data -->
                                  <?php $this->load->view('other_page/offer');?>
                        </div>
                 </div>
</div>