<?php 
header("Access-Control-Allow-Origin: *");
session_start(); //starts all the sessions  
if($_SESSION["adminLogin"] == NULL) { 
   header('Location: admin_login.php'); //take admin to the login page if there's no information stored in session variable 
}
?>