<?php
$user_id =$this->tank_auth->get_user_id();
$num_message = $this->matri->get_some_value('message_inbox', array('user_id'=>$user_id,'view'=>0));
$num_message = $num_message->num_rows();
?>
<!-- Container -->
	<div id="container">
		
		<!-- Start Header -->
		<div class="hidden-header" style="height: 60px;"></div>
		<header class="clearfix fixed-header">                
                <!-- Start Header ( Logo & Naviagtion ) -->
			<div class="navbar navbar-default navbar-top">
				
				
				
				<div class="container">
					<div class="navbar-header">
						<!-- Stat Toggle Nav Link For Mobiles -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<!-- End Toggle Nav Link For Mobiles -->
						
					</div>
					<div class="navbar-collapse collapse">
						<!-- Stat Search -->
						<div class="navbar-header">
						
						
						</div>
						<!-- End Search -->
						<!-- Start Navigation List -->
						<ul class="nav navbar-nav navbar-right">
							<?php
							$field_val = array(
										'user_id' => $this->tank_auth->get_user_id(),
										'profile_complete'=>1
											);
							if($this->muse->complete_user_profile('user_profiles', $field_val) == FALSE )
							{
								echo "<li><a href='",base_url(),"user_profile/'  style='padding-top: 20px; padding-bottom: 20px;'>Create Profile</a> </li>";
							}
							else
							{
							?>
							<li class="drop">
								<a href="<?php echo base_url();?>muser/index/<?php echo $this->tank_auth->get_user_id(); ?>" style="padding-top: 20px; padding-bottom: 20px;" onclick="menu_select(this)">My Profile</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url();?>muser/index/<?php echo $this->tank_auth->get_user_id(); ?>">Basic Information</a></li>									
									<li><a href="<?php echo base_url();?>update_profile/index/<?php echo $this->tank_auth->get_user_id(); ?>">Update Profile</a></li>
									<li><a href="<?php echo base_url();?>account_setting">Account Setting</a></li>
									
								</ul>
							</li>
							<?php }?>
							<!-- required menu for partner -->
							<li class="drop">
								<a href="<?php echo base_url();?>partner_profile/partner_basic_info/<?php echo $this->tank_auth->get_user_id(); ?>" style="padding-top: 20px; padding-bottom: 20px;" onclick="menu_select(this)">Required</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url();?>partner_profile/partner_basic_info/<?php echo $this->tank_auth->get_user_id(); ?>">Partner Basic Information</a></li>
									<li><a href="<?php echo base_url();?>partner_profile/partner_education/<?php echo $this->tank_auth->get_user_id(); ?>">Partner Education</a></li>
									<li><a href="<?php echo base_url();?>partner_profile/partner_background/<?php echo $this->tank_auth->get_user_id(); ?>">Partner Background</a></li>
								</ul>
							</li>
							
							<li class="drop">
								<a  href="<?php echo base_url();?>muser/matches" style="padding-top: 20px; padding-bottom: 20px;">Matches</a>
								<ul class="dropdown">
									<li><a  href="<?php echo base_url();?>muser/matches" >All Profile</a></li>
									<li><a class="active" href="<?php echo base_url();?>muser/desired_partner">Desired Partner</a></li>
								</ul>
							</li>
							<li class="drop">
								<a href="" style="padding-top: 20px; padding-bottom: 20px;" onclick="menu_select(this)">
									
									<?php if($num_message>0)
									{
										?>
										<i class="fa fa-envelope"></i> 
										<sup class="msg_alert"><?php echo $num_message;?></sup>
										<?php 
									}
									else
									{
									?>
										<i class="fa fa-envelope-o"></i>
										
									<?php
									}
									?>
									
									&nbsp;Message</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url();?>inbox/"><i class="fa fa-inbox" > </i> &nbsp;Inbox</a></li>
									<li><a href="<?php echo base_url();?>send/"><i class="fa fa-share-square-o"></i> &nbsp;Send Message</a></li>
								</ul>
							</li>
							<li class="drop">
								<a href="<?php echo base_url();?>muser/photo/" style="padding-top: 20px; padding-bottom: 20px;" onclick="menu_select(this)">Photo</a>
								
							</li>
							
							<li><a href="<?php echo base_url();?>auth/logout" style="padding-top: 20px; padding-bottom: 20px;" onclick="menu_select(this)"><i class="fa fa-sign-out" title="Signout">Signout</i></a></li>
						</ul>
						<!-- End Navigation List -->
					</div>
				</div>
					
					
			</div>
			<!-- End Header ( Logo & Naviagtion ) -->
                </header>
        </div>
	<div style="min-height:15px"></div>
        