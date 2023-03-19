<?php
$id = $_GET['id'];

include 'connect_db.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM tb_messages WHERE msgid = $id"; 
if ($conn->query($sql)) {
    header('Location: admin_messages.php');
    exit;
} else {
    echo "Error deleting record";
}
?>