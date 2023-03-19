<?php
session_start();
include 'connect_db.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
 $email 	=mysqli_real_escape_string($conn,$_POST['email']);
 $password 	=mysqli_real_escape_string($conn,$_POST['password']);
 $result 	= mysqli_query($conn,"SELECT * FROM tb_residentsacc");
 $c_rows 	= mysqli_num_rows($result);
 if ($c_rows!=$email || $c_rows!=$password) {
  header("location: user_login_page.php?remark_login=failed");
 }
 $sql="SELECT accountId FROM tb_residentsacc WHERE email='$email' and password='$password'";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($result);
 $active=$row['active'];
 $count=mysqli_num_rows($result);
 if($count==1) {
  $_SESSION['login_user']=$email;
  $_SESSION['accountId']=$row['accountId'];
  header("location: viewer_home.php");
 }
}
?>