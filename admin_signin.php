<?php
 header("Access-Control-Allow-Origin: *");
 
session_start();

include 'connect_db.php';
// Check connection
if($_SERVER["REQUEST_METHOD"] == "POST") {
 $email 	=	mysqli_real_escape_string($conn,$_POST['admin_email']);
 $password 	=	mysqli_real_escape_string($conn,$_POST['admin_password']);
 $result 	= 	mysqli_query($conn,"SELECT * FROM tb_admin");
 $c_rows 	= 	mysqli_num_rows($result);
 if ($c_rows!=$email || $c_rows!=$password) {
  header("location: admin_login.php?remark_login=failed");
 }
 $sql="SELECT admin_id FROM tb_admin WHERE admin_email='$email' and admin_password='$password'";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($result);
 $active=$row['active'];
 $count=mysqli_num_rows($result);
 if($count==1) {
  $_SESSION['adminLogin']=$email;
  $_SESSION['admin_id']=$row['admin_id'];
  header("location: admin_home.php");
 }
}
?>