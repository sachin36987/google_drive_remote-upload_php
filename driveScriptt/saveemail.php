<?php
/**********************************
// Your are free to modify and distribute it as long as below three lines are there 
//in the file. 
//@author Sachin Khokhar
//@website http://savedrive.faltutech.club
*****************************************/
/*********************************
save email to database so that you can refresh the token afterwords using email as key

redirects to index for uploading
*****************************************/
require ('config.php');
require __DIR__ .'/vendor/autoload.php';

	
//***********************************************
//parsing json and saving refresh token
//***********************************************
$conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error){
	echo 'error establishing database connection'. $conn->error;
}
else{
$token =$_SESSION['access_token'];

//********************
//start to get the user email
//
//***********************************/
	$client = new Google_Client();
$client->setAuthConfigFile('client_secrets.json');
$client->setAccessToken($_SESSION['access_token']);
 
//***************************************/


   
 $googlePlus = new Google_Service_Plus($client);
$userProfile = $googlePlus->people->get('me');
$emails = $userProfile->getEmails();
$foundemail=$emails[0]->value;
//***********************************************************
//end of getting email
//*******************************************

	$_SESSION['email']=$foundemail;
	$foundemail=mysqli_real_escape_string($conn,$foundemail);
	$sql="SELECT count(email) from drive where email='$foundemail'";
	$result=$conn->query($sql);
	$row=mysqli_fetch_array($result);
	if(@$row['count']==0)
	{
	
	$time=date('d\/M\/Y');
	
	
	$refresh_token=mysqli_real_escape_string($conn,$_SESSION['access_token']['refresh_token']);
	$_SESSION['refresh_token']=$refresh_token;
	$saveToken = "INSERT INTO drive"."(email,time,refresh_token)". "VALUES"."('$foundemail','$time','$refresh_token')"; // Saving the email, time in database. 	
	$conn->query($saveToken);
	}
	else {
		$sql="SELECT refresh_token FROM drive where email='$email'";
		$result=$conn->query($sql);
		$row=mysqli_fetch_array($result);
		$_SESSION['refresh_token']=$row['refresh_token'];
	}
       mysqli_close($conn);
	

		
$after_token_saved='/index.php';
header('Location: ' . filter_var($after_token_saved, FILTER_SANITIZE_URL));
			

}

?>