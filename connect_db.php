<?php

include 'config.php';

if($environment == "prod"){

    $dbname = "u538504999_ibaanrecord_db";
    // Create connection
    $conn = mysqli_connect("localhost", "u538504999_ibaanrecord", "Ibaan@Record!22",$dbname);
}
else{
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "ibaanrecord_db";
    
    $conn = mysqli_connect ($dbServername, $dbUsername, $dbPassword);
    
    mysqli_select_db($conn, $dbname);
    
    if (!$conn){
        trigger_error(mysqli_connect_error());
        echo 'not connected';
    }
}


// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
?>