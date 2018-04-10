<?php
/*
// Your are free to modify and distribute it as long as below three lines are there 
//in the file. 
//@author Sachin Khokhar
//@website http://savedrive.faltutech.club
*/
// It just makes sure that file can be uploaded to the google drive
require ('config.php');





$url=$_POST['url'];
$curl = curl_init();
curl_setopt_array( $curl, array(
	CURLOPT_HEADER => true,
    CURLOPT_NOBODY => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $url ) );
curl_exec( $curl );
$head = curl_getinfo( $curl );
curl_close( $curl );
$remote_file_size=$header['size_download'];
$basenamee=pathinfo($url)['extension'];

if($head==false){                    // checks if url exists
	$url2='/index.php?status=badurl';
header('Location: ' . filter_var($url2, FILTER_SANITIZE_URL));
}
elseif($basenamee==NULL){                                       // checks if file have extension
	$url2='/index.php?status=noextension';
header('Location: ' . filter_var($url2, FILTER_SANITIZE_URL));
}
elseif($remote_file_size>$max_file_size_allowed){                            // change the file size which is allowed to be uploaded
	$url2='/index.php?status=largefile';
header('Location: ' . filter_var($url2, FILTER_SANITIZE_URL));
}

else{                                                            // if passed all of them than download and upload file
	$url1='/remote_upload.php?url='.base64_encode($url);
header('Location: ' . filter_var($url1, FILTER_SANITIZE_URL));
}


?>