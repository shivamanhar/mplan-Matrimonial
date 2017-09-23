<?php
$this->load->view('site_theme/site_header');
$this->load->view('site_theme/site_menu');

$this->load->view('site_theme/site_aboutme');
$this->load->view('site_theme/muser_menu');
$this->load->view($page);
$this->load->view('site_theme/site_footer');
?>
