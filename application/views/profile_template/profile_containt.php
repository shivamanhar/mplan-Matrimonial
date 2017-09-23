<?php
//it is basic template style
//$this->load->view('profile_template/profile_header');
$this->load->view('site_theme/site_header');
$this->load->view('site_theme/site_menu');
$this->load->view('profile_template/profile_menu');
$this->load->view($page);
$this->load->view('site_theme/site_footer');
//$this->load->view('profile_template/profile_footer');
?>
