<?php
//*************************************
// Put it in folder in which you want to delete files
// Please Update the time below in seconds
// If the file has not been modified for specified time below than file will be deleted
//*************************************

$time = 300; // Currently set to 300 seconds (5 Minutes)

$files = scandir(__DIR__); // scan the current directory

foreach($files as $file){
	if(filemtime($file)>$time && $file!="DeleteFileScript.php" && is_dir($file)==false){
		unlink($file);
	}
}


//*******************    Add this script to cron tab  ***************************************
// To run every 15 Minutes, you should add following to crontab
// 15 0 0 0 0 php absolute/path/to/script/DeleteFileScript.php > /dev/null 2>&1

?>