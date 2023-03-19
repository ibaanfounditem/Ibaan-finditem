<?php
$id = $_GET['id'];

include 'connect_db.php';

//$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM tb_itemrecord WHERE itemNo = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: admin_itemRecord.php');
    exit;
} else {
    echo "Error deleting record";
}
?>