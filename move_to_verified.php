<?php

include 'connect_db.php'; 
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$recipient_id = $_GET['acctId'];
$itemNo = $_GET['itemNo'];
$xadmin_id= $_GET['admin_id'];

$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array(); //remember to declare $pass as an array
$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
}
$qrPass = implode($pass); //turn the array into a string


$textmessage = 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and your Valid Id! <br> Thank you! <br> Item No: '.$itemNo.' <br> <img class="xqr" src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl='.md5($itemNo).'">';


    $conn->query("INSERT INTO tbl_chat(sender_id,recipient,textmessage,datesent) VALUES($xadmin_id,$recipient_id,'$textmessage',NOW()) ");

$sql = " INSERT INTO tb_verifiedmsg SELECT *, '$qrPass',0 FROM tb_messages WHERE msgid = $id";
if ($conn->query($sql) === TRUE) {
    include 'delete_messages.php';
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>