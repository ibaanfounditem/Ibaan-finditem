<?php
header("Access-Control-Allow-Origin: *");
    include 'connect_db.php';
    //echo" Connected to database ";
    
    $Owner      = $_POST['owner'];
    $ItemNo     = $_POST['itemNo'];
    $TimeDate   = $_POST['tdclaimed'];
    //inserting data from tb_iteminfo to tb_claimedrecord
    mysql_query("INSERT INTO tb_claimedrecord (SELECT * FROM tb_itemrecord WHERE itemNo='$ItemNo')");
    mysql_query("INSERT INTO tb_claimedowner(itemNo, owner, tdclaimed) VALUES('$ItemNo','$Owner','$TimeDate')");
    mysql_query("UPDATE tb_itemrecord SET isClaim=1 WHERE itemNo = $ItemNo");

    header("location: admin_claimedItem.php");
    exit;
?>