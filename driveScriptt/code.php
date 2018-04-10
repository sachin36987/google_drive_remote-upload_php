<?php
/**********************************
// Your are free to modify and distribute it as long as below three lines are there 
//in the file. 
//@author Sachin Khokhar
//@website http://savedrive.faltutech.club
*****************************************/

//*************************************************
//This is to get the code for the refresh token and access token
// this refers to savetoken.php to save the 'refresh token' and to get email and save that too.
//****************************************************
require ('config.php');
require __DIR__ .'/vendor/autoload.php';
//*****************************
//*****************************
//sesssion is above
//*******************************
//*******************************

$client = new Google_Client();
$client->setAuthConfigFile('client_secrets.json');
$client->setScopes($scope);
$client->setRedirectUri($redirect_uri_code_get);
$client->setAccessType('offline');
if (! isset($_GET['code'])){
	
$auth_url = $client->createAuthUrl();
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
}
elseif(isset($_GET['code']) && !empty($_GET['code'])){
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect_uri = ($redirect_uri_save_email);
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

else{
	
	echo 'error';
	var_dump($_SESSION);
}
?>