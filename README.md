# mplan
<h2> Open Source Matrimonial </h2>
Project Name: School Result / Board Result

<b>Descripation :</b>
Mplan is Open source matrimoanil website.
Create profile and start searching for prospective brides and grooms.

        <img src="https://github.com/shivamanhar/mplan/blob/master/screen_shot/ScreenShotonSep23rdat02-13PM.png" >
             <img src="https://github.com/shivamanhar/mplan/blob/master/screen_shot/screen_shot1.png" >
        <img src="https://github.com/shivamanhar/mplan/blob/master/screen_shot/screen_shot2.png" >
        <img src="https://github.com/shivamanhar/mplan/blob/master/screen_shot/screen_shot3.png" >
        <img src="https://github.com/shivamanhar/mplan/blob/master/screen_shot/screen_shot4.png" >
        <img src="https://github.com/shivamanhar/mplan/blob/master/screen_shot/screen_shot5.png" >
        <img src="https://github.com/shivamanhar/mplan/blob/master/screen_shot/screen_shot6.png" >
            
       
<h2> Installation </h2>
Step - 1:

Create one data base in MySql and import mplan.sql file.

Step - 2:

Go to mplan>application>config here find a database.php file and change all MySQL detail.
Line number - 51

	$db['default']['hostname'] = 'localhost';
	
	$db['default']['username'] = 'root';
	
	$db['default']['password'] = '';
	
	$db['default']['database'] = 'mplan';
Step - 2

Go to mplan->.httaccess file change this file.

Find this line /

		<IfModule mod_rewrite.c>
    		RewriteEngine On
    		RewriteBase /mplan/
    
    and change "mplan" this is a folder name where save your project:
	
