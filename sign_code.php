<?php
    include 'db_ibaanrecord';

    $Finder         = $_POST['finder'];
    $Contact        = $_POST['contact'];
    $ItemNo         = $_POST['itemNo'];
    $Time           = $_POST['time'];
    $Date           = $_POST['date'];
    $ItemCategory   = $_POST['itemCategory'];
    $ItemLoc        = $_POST['itemLocation'];
    $Description    = $_POST['itemDescription'];
    $Image          = $_POST['itemImage'];
    
   
    //insert data to tb_itemRecord table
    mysql_query("INSERT INTO tb_itemRecord(finder, contact, itemNo, time, date, itemCategory, itemLocation, itemDescription, itemImage) VALUES('$Finder','$Contact','$ItemNo','$Time','$Date', '$ItemCategory','$ItemLoc','$Description', '$Image')");

    header("location: admin_itemRecord.php");
    exit;
?>