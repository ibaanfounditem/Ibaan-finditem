<?php
$id = $_GET['id'];

include 'connect_db.php';
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM tb_announcement WHERE announceId = $id"; 
if ($conn->query($sql)=== TRUE) {
    header('Location: admin_home.php');
    exit;
} else {
    echo "Error deleting record";
}
?>