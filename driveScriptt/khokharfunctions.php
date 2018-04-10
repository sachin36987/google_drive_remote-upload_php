<?php
/**********************************
// Your are free to modify and distribute it as long as below three lines are there 
//in the file. 
//@author Sachin Khokhar
//@website http://savedrive.faltutech.club
*****************************************/
function response($status){
	
	switch ($status){
		case 'driveisoutofstorage' :
		return ('Drive is out of storage. Please buy more storage or delete some files to upload');
		break;
		
		case 'fileurlisnotvalid' :
		return ('We were unable to find any file on that url. Please check the file url again');
		break;
		
		case 'uploaded' :
		return ('Your file');
		break;
		case 'badurl':
		return ('The Entered URL is not correct');
		break;
		case 'noextension':
		return ('Your URL must be a direct link e.g. http://xyz.com/abc.jpg and not http://xyz.com/abc');
		break;
		case 'largefile':
		return ('File Size if more than allowed 100 MB');
		default:
		echo '';
		
		
		
		
		
	}
	
}



?>
