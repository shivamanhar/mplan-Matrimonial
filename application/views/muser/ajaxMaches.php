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
												      if($row->path != NULL)
														       {
												      ?>
														       <img src="<?php echo $row->path;?>" class="img-responsive img-rounded" alt="mplan | Matrimonial">
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