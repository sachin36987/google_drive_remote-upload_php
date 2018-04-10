<?php
session_start();
/*
// Your are free to modify and distribute it as long as below three lines are there 
//in the file. 
//@author Sachin Khokhar
//@website http://gdrive.faltutech.club
*/
//session start



//**************************************************
//Database settings (Only Mysql Database is Supported)
$host='localhost';				// Host (IP) or URL
$db='drive';		// Database Which you have created
$user='drive';					// Username to Access Database
$pass='1519931947';						// Password for database


//************************************************************
// Configuration settings
//************************************************************
$site_url="https://savedrive.faltutech.com";     // change it with your domain URL without slash

$site_title="Remote URL Upload To Google Drive :: Savedrive.Faltutech.Com";          		// Site Title

$site_keywords="remote url upload, upload to google drive from link, link upload google drive";      		// Keywords

$site_favicon="";				// Favicon URL

$site_logo_text="Savedrive.Faltutech.Com";     		// Logo in text  (this will shown to users) It could be your domain name

$site_discription="You can upload file from any direct link to google drive. Save you files directly to google drive without downloading them to your computer";    		// Site Discription

$footer_small_logo="";   		//Small logo in Footer (image url)

$max_file_size_allowed="104857600";   			// size must be in bytes (currently it is 100 MB)

$client_secret=__DIR__.'/client_secrets.json';  // it is the json file location in the root (You can change it and can place
												// 	it in subfolder). The json file can be downloaded from the api console.
												// name could also be differ. So it is very important that you set it right.


$download_buffer_size='1';   		// (value must be between 1 to 10);

$upload_buffer_size='6'; 			// (value must be between 1 to 10);

//**********************************************************************************
// Do not Touch Anything Below This									
$redirect_uri_code_get=$site_url.'/code.php';

$redirect_uri_save_email=$site_url.'/saveemail.php';

$scope="https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/userinfo.email";

$auth_provider_x509_cert_url="https://www.googleapis.com/oauth2/v1/certs";


//-----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
//End of file
//******************************************************************************************************************
//*******************************************************************************************************************



?>
