<!DOCTYPE html>
<html>
    <head>
    <!-- Basic -->
	<title><?php echo $title;?> </title>
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>img/icon.jpg" >
	<!-- Define Charset -->
	<meta charset="utf-8">
	
	<!-- Responsive etatag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Page Description and Author -->
	<meta name="description" content="<?php if(isset($descripation)) {echo $descripation; } else {echo "Is number one matrimonial website in India.";}?>">
	<meta name="keywords" content="<?php if(isset($keywords)){echo $keywords;}?>">
	<meta name="author" content="shiva manhar">
        <meta name="alexaVerifyID" content="WhBcUlec2wxBZQCImPFKg-Hp4lQ" />
	
        <script src="<?php echo base_url();?>js/jquery-1.9.1.min.js"></script>
	
        <link rel="stylesheet" href="<?php echo base_url();?>css/ass/bootstrap.min.css">        
        <link rel="stylesheet" href="<?php echo base_url();?>css/ass/style.css">
        
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/view_default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/component.css" />
	<script src="<?php echo base_url();?>js/modernizr.custom.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.css">
	<!-- for process indecater -->
	
        <!-- Js -->     
	
        <script src="<?php echo base_url();?>js/filter_data.js"></script>
        <script src="<?php echo base_url();?>js/menu.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script type="text/javascript"  src="<?php echo base_url();?>js/modal.js"></script>
	<script type="text/javascript"  src="<?php echo base_url();?>js/jquery.cropit.js"></script>
        <script type="text/javascript">
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');		
		  ga('create', 'UA-63183737-1', 'auto');
		  ga('send', 'pageview');		
	</script>
	
	
	<script type="text/javascript">

$(document).ready(function(){
	$(".btn").click(function(){
		$("#myModal").modal('show');
	});
});
</script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
	z-index:5;
    }
    #myModal
    {
	z-index:9999999;
	position:absolute;
    }
    
</style>
	
    </head>
    
    <body>