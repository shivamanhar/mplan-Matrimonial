<html>
    <head>
        <title> </title>
        
    </head>
    <body>
        <link href="<?php echo base_url();?>css/ass/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>css/send_message.css" rel="stylesheet" type="text/css">  
        <div class="container" class="row" sstyle ="border:1px solid #000;  margin:0 auto;  background-color:#e9e9e9;  padding-bottom:15px;width:83%">
            <div >
                <div class="col-md-10 msg_body">
                    <div class="header" style="background-image:url('http://mplan.in/img/email_image/header.jpg');  min-height:180px;  background-repeat:no-repeat;">
                        <a href="<?php echo base_url();?>'" style="float:right;  color:#fff;  padding-right:100px;"> <h3> mplan.in | Online Matrimonial</h3> </a>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div >
                    
                    <hr style="border:1px solid #ff0000;"/>
                    <br/>
                    Hi <?php

                        echo $name;
                        ?>,
                    
                    <p>
                        <b> <?php

                        echo $sender_name;
                        ?>
                        </b>  has sent you a message
                    </p>
                    <p>
                        <a href="<?php echo base_url();?>inbox" style="display: inline-block;    padding: 6px 12px;    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;"> Read Now !</a>
                    </p>
                    <br/>
                    <hr style="border:1px solid #ff0000;"/>
                    <h5>For Matrimonial assitance </h5>
                    <h5>Call Us at: 0771-406997</h5>
                    <span> Timing - 10:00 AM -6:30 PM</span>
                    <span> Share Your feedback with query or comments </span>
                </div>
            </div>
        </div>
    </body>
</html>