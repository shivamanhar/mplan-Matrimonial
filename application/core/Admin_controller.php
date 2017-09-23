<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Author: Shiva Manhar(shivamanhar)
 * Date:23/3/2015
 * Descripation: It is main admin controller class here extend MX_controller Class this clas is
 * all CI_Controller class property included
 * @package: mplan/application/core/Admin_controller.php
*/
require APPPATH."third_party/MX/Controller.php";
class Admin_Controller extends MX_Controller
{
        public function show()
        {
            echo "my test admin controller!";
        }
}
?>