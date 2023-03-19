<?php
    include 'connect_db.php';

    $fullname   =   $_POST['admin_name'];
    $email      =   $_POST['admin_email'];
    $password   =   $_POST['admin_password'];

    //insert data to tb_accounts table
    $sql = "INSERT INTO tb_admin(admin_name, admin_email, admin_password) VALUES('$fullname','$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['Submit'] = "Added Successfully!";
        header("location: admin_admin-accounts.php");
        exit;
    }else{
        $_SESSION['Submit'] = "Something wrong. Please try again!";
        header("location: admin_admin-accounts.php");
        exit;
    }
?>