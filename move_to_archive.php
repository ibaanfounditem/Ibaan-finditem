<?php 

include 'connect_db.php';

if(!isset($_SESSION['admin_id'])){
    echo "Go back";
    header("Location: admin_login.php");
}

$id = $_GET['id'];
$recipient_id = $_GET['acctId'];
$itemNo = $_GET['itemNo'];
$xadmin_id =$_GET['admin_id'];
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$textmessage = "Dear Mr/Ms. <br> We want to inform you that the details/image you sent to us does not match to the item that we had.";


    $conn->query("INSERT INTO tbl_chat(sender_id,recipient,textmessage,datesent) VALUES($xadmin_id,$recipient_id,'$textmessage',NOW()) ");

$sql = "INSERT INTO tb_deletemsg SELECT * FROM tb_messages WHERE msgid = $id"; 
if ($conn->query($sql) === TRUE) {
    include 'delete_messages.php';
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>