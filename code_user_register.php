<?php
header("Access-Control-Allow-Origin: *");
    include 'connect_db.php';

    $fullname   =  $_POST['fname'];
    $lastname   =  $_POST['lname'];
    $address    =  $_POST['address'];
    $contactno  =  $_POST['contact'];
    $gender     =  $_POST['gender'];
    $email      =  $_POST['email'];
    $password   =  $_POST['password'];
    
    //insert data to tb_residentsacc table
    $sql = "INSERT INTO tb_residentsacc(fname, lname, address, contact, gender, email, password) VALUES('$fullname','$lastname', '$address', '$contactno', '$gender','$email', '$password')";

    $result = mysqli_query($conn, $sql);


    if($result){
        $_SESSION['sign up'] = "Your information is register!";
        header('Location: signup_success.php');
        exit;
    }else{
        $_SESSION['sign up'] = "Something wrong. Please Register again!";
        header('Location: signup_success.php');
        exit;
    } 

    //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: user_login_pag.php');
    }
?>