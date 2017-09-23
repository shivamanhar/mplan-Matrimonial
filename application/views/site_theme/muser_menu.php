 <?php
 //access user information//
 if(isset($matches))
 {
    foreach($matches->result() as $row)
    {
        $name = ucwords($row->firstname);
        $muser_id = $row->muser_id;
    }
 }
 
 ?>
 
   <div id="muser_menu" style="min-height:15px"></div>
   <div class="container">
      <div class="row">                                      <!-- Navigation -->
<nav class="navbar navbar-default navbar-top mnavbar" role="navigation">
  
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                
            </button>
            <a class="navbar-brand" href="#"><b><?php if(isset($name)){echo ucwords($name);} else {echo "NULL";} ?></b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if(isset($muser_id)) {?>
                <li>
                    <a href="<?php echo base_url();?>muser/index/<?php echo $muser_id;?>" title="Basic Information">My Profile</a>
                </li>
                
                <li>
                    <a href="<?php echo base_url();?>muser/myfamily/<?php echo $muser_id;?>" title="My Family Information">My Family</a>
                </li>
                
                <li>
                    <a href="<?php echo base_url();?>muser/get_user_image/<?php echo $muser_id;?>" title="">Photo</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>muser/contact_me/<?php echo $muser_id;?>" title="Contact matrimonial user">Contact Me</a>
                </li>
                <?php
                }
                ?>
            </ul>
            
        </div>
        <!-- /.navbar-collapse -->
    <!-- /.container -->
</nav>
  </div>
</div>
            