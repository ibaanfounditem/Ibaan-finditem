<?php
    header("Access-Control-Allow-Origin: *");

    session_start();
    include 'connect_db.php';
    //echo" Connected to database ";
    $AccountId      = $_POST['accountId'];
    $ItemNumber     = $_POST['itemnumber'];
    $Myfile         = $_FILES['myfile']['name'];
    $ItemLoc        =  str_replace("'","''",$_POST['itemLocation']);
    $Description    =   str_replace("'","''",$_POST['description']);
    $itemBrand    =   str_replace("'","''",$_POST['itembrand']);
    $itemColor    =   str_replace("'","''",$_POST['itemcolor']);

    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable

    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $dst = "./all_proof/".$var3.$Myfile;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_proof/".$var3.$Myfile; // storing image path into the database with 32 characters hex number and file name
                
    move_uploaded_file($_FILES["myfile"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today = date("Y-m-d H:i:s");

    $trim_accountId = trim($AccountId);
    $trim_itemno = trim($ItemNumber);

    $conn->query("INSERT INTO tb_messages(accountId, itemnumber, myfile, description, datetime,itemColor,itemBrand,itemLocation) VALUES('$trim_accountId','$trim_itemno', '$dst_db', '$Description', '$today','$itemColor','$itemBrand','$ItemLoc')");

    header("location: viewer-found.php");
    exit;
?>