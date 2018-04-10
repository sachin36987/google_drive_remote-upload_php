<?php
/*
// Your are free to modify and distribute it as long as below three lines are there 
//in the file. 
//@author Sachin Khokhar
//@website http://savedrive.faltutech.club
*/
session_start();
$url='/code.php';
header('Location: ' . filter_var($url, FILTER_SANITIZE_URL));

?>