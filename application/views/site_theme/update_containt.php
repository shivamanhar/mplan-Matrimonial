<?php
$this->load->view('site_theme/site_header');
$this->load->view('site_theme/site_menu');
$this->load->view('site_theme/profile_menu');
$this->load->view($page);
$this->load->view('site_theme/site_footer');
?>