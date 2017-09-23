<!DOCTYPE html>
	<?php
	function ms_base_url()
	{
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
	$my_url = $root; //"http://mplan.orbitplus.org/";
	return  $my_url;
	}
	?>
<html>
    <head>
    <!-- Basic -->
	<title>Page 404 Error</title>
        <link rel="icon" type="image/png" href="<?php echo ms_base_url();?>img/icon.jpg">
	<!-- Define Charset -->
	<meta charset="utf-8">
	
    </head>
    
    <body>	
	
	
	
<div class="container">
	<div class="row">
		<h1><?php echo $heading; ?></h1>
		<h3> Sorry, this page isn't available </h3>
		<img src="<?php echo ms_base_url()?>images/img_404.jpg">
	</div>
</div>

<!-- footer-->

        <footer class="content-info"  role="contentinfo" style='background-color: #341201;margin-top:20px;border-top:2px solid #fe4d01;'>

                <div class="container">               

                 <div class="row">

                         

                <hr/>

                <div class="sotto-footer">

               

                     

                <div class="icone-social">

              

                </div>

               

                 <p class="copyright" style="color:#C3C100;font-size:16px;"><a href="#">Terms & Conditions </a> | <a href="#">Privacy Policy </a> | <a href="#">Fund Refund </a> | <a href="http://www.mplan.in/">Contact Us</a> &copy; 2015 mplan.in Matrimonials  </p>

                  

                   

                </div>


                </div>
                 

        </footer>
	
    </body>
</html>