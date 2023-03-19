<?php
header("Access-Control-Allow-Origin: *");
    ini_set('display_errors', 1);
    //error_reporting(E_ALL & ~E_NOTICE);
    Error_reporting(0);
    include 'connect_db.php';
    //echo" Connected to database ";
    
    $Subject=$_POST['subject'];
    $Caption=$_POST['caption'];

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today = date("Y-m-d H:i:s");
    
    //insert data to tb_iteminfo table
    $sql="INSERT INTO tb_announcement(subject, caption, timedate) VALUES('$Subject', '$Caption', '$today')";

    if ($conn->query($sql) === TRUE) {
        echo "Post New Announcement";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
    header("location: admin_home.php");
    exit;
?>