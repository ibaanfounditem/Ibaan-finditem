<?php
    include 'connect_db.php';
    //echo" Connected to database ";

    $accountId  = $_POST['accountId'];
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $address    = $_POST['address'];
    $contact    = $_POST['contact'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    $t_accountId	= trim($accountId);
    $t_fname        = trim($fname);
    $t_lname        = trim($lname);
    $t_address      = trim($address);
    $t_contact      = trim($contact);
    $t_gender       = trim($gender);
    $t_email        = trim($email);
    $t_password     = trim($password);


    $t_accountId = trim($accountId);

    $query = "UPDATE tb_residentsacc SET fname='$t_fname', lname='$t_lname', address='$t_address', contact='$t_contact', gender='$t_gender', email='$t_email', password='$t_password' WHERE accountId='$t_accountId'" or die("Data Not Updated");
    $result = mysqli_query($conn, $query);

    header("Location: viewer_profile.php");
    exit;
?>