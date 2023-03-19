<?php
    header("Access-Control-Allow-Origin: *");
    
    include 'connect_db.php';

    $fname      =   $_POST['fname'];
    $lname      =   $_POST['lname'];
    $contact    =   $_POST['contact'];
    $address    =   $_POST['address'];
    $gender     =   $_POST['gender'];
    $email      =   $_POST['email'];
    $password   =   $_POST['password'];


    //insert data to tb_accounts table
    $sql = "INSERT INTO tb_residentsacc(fname, lname, contact, address, gender, email, password) VALUES('$fname','$lname','$contact','$address','$gender','$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['Submit'] = "Added Successfully!";
        header("location: admin_accounts.php");
        exit;
    }else{
        $_SESSION['Submit'] = "Something wrong. Please try again!";
        header("location: admin_accounts.php");
        exit;
    }
?>