<?php
/**********************************
// Your are free to modify and distribute it as long as below three lines are there 
//in the file. 
//@author Sachin Khokhar
//@website http://savedrive.faltutech.club


    logout page
*****************************************/

session_start();
session_unset();
session_destroy();

$url2='/authorize.php';
header('Location: ' . filter_var($url2, FILTER_SANITIZE_URL));
?>