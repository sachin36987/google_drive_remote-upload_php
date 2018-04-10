<?php
/**********************************
// Your are free to modify and distribute it as long as below three lines are there 
//in the file. 
//@author Sachin Khokhar
//@website http://savedrive.faltutech.club
*****************************************/
$file=base64_decode($_REQUEST['file']);

$filepath='files/'.$file.'.txt';
$downfilepath='files/'.$file;
$openfile=unserialize(file_get_contents($filepath));

$original_file_size=$openfile['filesize'];

$size = round(($original_file_size/1024)/1024,2).' MB';
$filesizedownloaded=filesize($downfilepath);

$percentdone=round(($filesizedownloaded*100)/$original_file_size,2);


$byte_uploaded=$openfile['doneuploading']*1024*1024;
$percentuloaded=round(($byte_uploaded*100)/$original_file_size,2);

$reply = array('size'=>$size,
				'downloaded'=>$percentdone,
				'percentuloaded'=>$percentuloaded);
				
				echo json_encode($reply);

 
?>