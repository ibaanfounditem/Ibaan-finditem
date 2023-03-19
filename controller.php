<?php
    header("Access-Control-Allow-Origin: *");

    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);
    //Error_reporting(0);

    session_start();
    
    include 'connect_db.php';
    // Connection Created Successfully
    // Store All Errors
    $errors = [];

    // When Sign Up Button Clicked
    if (isset($_POST['signup'])) {

        $fullname   =  mysqli_real_escape_string($conn,  $_POST['fname']);
        $lastname   =  mysqli_real_escape_string($conn, $_POST['lname']);
        $address    =  mysqli_real_escape_string($conn, $_POST['address']);
        $contactno  =  mysqli_real_escape_string($conn, $_POST['contact']);
        $gender     =  mysqli_real_escape_string($conn, $_POST['gender']);
        $email      =  mysqli_real_escape_string($conn, $_POST['email']);

        // check password length if password is less then 8 character so
        if (strlen(trim($_POST['password'])) < 8) {
            $errors['password'] = 'Use 8 or more characters with a mix of letters, numbers & symbols';
        } else {
            // if password not matched so
            if ($_POST['password'] != $_POST['confirmPassword']) {
                $errors['password'] = 'Password not matched';
            } else {
                $password = md5($_POST['password']);
            }
        }
        // generate a random Code
        $code = rand(999999, 111111);
        // set Status
        $status = "Not Verified";

       // echo 'first name = ' .$fname . "<br> last name = " .$lname . "<br> email = " .$email . "<br> password = " .$password . "<br> gender = " .$gender . "<br>";

        // check email validation and save information
        $sql = "SELECT * FROM tb_residentsacc WHERE email = '$email'";
        $res = mysqli_query($conn, $sql) or die('query failed');
        if (mysqli_num_rows($res) > 0) {
            $errors['email'] = 'Email is Already Taken';
        }

        // count erros
        if (count($errors) === 0) {
            $insertQuery = "INSERT INTO tb_residentsacc(accountId, fname, lname, address, contact, gender, email, password, code, status) VALUES('0000', '$fullname','$lastname', '$address', '$contactno', '$gender','$email', '$password', '$code', '$status')";
            $insertInfo = mysqli_query($conn, $insertQuery);

            // Send Varification Code In Gmail
            if ($insertInfo) {
                // Configure Your Server To Send Mail From Local Host Link In Video Description (How To Config LocalHost Server)
                $subject = 'Email Verification Code';
                $message = "Your verification code is $code";
                $sender = 'From: viabeanca.guerra@g.batstate-u.edu.ph';

                if (mail($email, $subject, $message, $sender)) {
                    $message = "We've sent a verification code to your Email <br> $email";

                    $_SESSION['message'] = $message;
                    header('location: otp.php');
                } else {
                    $errors['otp_errors'] = 'Failed while sending code!';
                }
            } else {
                $errors['db_errors'] = "Failed while inserting data into database!";
            }
        }
    }

    // if Verify Button Clicked
    if (isset($_POST['verify'])) {
        $_SESSION['message'] = "";
        $otp = mysqli_real_escape_string($conn, $_POST['otp']);
        $otp_query = "SELECT * FROM tb_residentsacc WHERE code = $otp";
        $otp_result = mysqli_query($conn, $otp_query);

        if (mysqli_num_rows($otp_result) > 0) {
            $fetch_data = mysqli_fetch_assoc($otp_result);
            $fetch_code = $fetch_data['code'];

            $update_status = "Verified";
            $update_code = 0;

            $update_query = "UPDATE tb_residentsacc SET status = '$update_status' , code = $update_code WHERE code = $fetch_code";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                header('location: index.php#signin');
            } else {
                $errors['db_error'] = "Failed To Insering Data In Database!";
            }
        } else {
            $errors['otp_error'] = "You enter invalid verification code!";
        }
    }

    // if login Button clicked so

    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);

        $emailQuery = "SELECT * FROM tb_residentsacc WHERE email = '$email'";
        $email_check = mysqli_query($conn, $emailQuery);
        $row=mysqli_fetch_array($email_check);

        if (mysqli_num_rows($email_check) > 0) {
            $passwordQuery = "SELECT * FROM tb_residentsacc WHERE email = '$email' AND password = '$password'";
            $password_check = mysqli_query($conn, $passwordQuery);
            if (mysqli_num_rows($password_check) > 0) {
                $fetchInfo = mysqli_fetch_assoc($password_check);
                $status = $fetchInfo['status'];
                $id = $fetchInfo['fname'] . " " . $fetchInfo['lname'];
                $_SESSION['accountId'] = $id;
                $_SESSION['email'] = $fetchInfo['email'];
                $_SESSION['password'] = $fetchInfo['password'];
                if ($status === 'Verified') {
                    $_SESSION['login_user']=$email;
                    $_SESSION['accountId']=$row['accountId'];
                    header('location: viewer_home.php');
                } else {
                    $info = "It's look like you haven't still verify your email $email";
                    $_SESSION['message'] = $info;
                    header('location: otp.php');
                }
            } else {
                $errors['email'] = 'Password did not matched';
            }
        } else {
            $errors['email'] = 'Invalid Email Address';
        }
    }

    // if forgot button will clicked
    if (isset($_POST['forgot_password'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $emailCheckQuery = "SELECT * FROM tb_residentsacc WHERE email = '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        // if query run
        if ($emailCheckResult) {
            // if email matched
            if (mysqli_num_rows($emailCheckResult) > 0) {
                $code = rand(999999, 111111);
                $updateQuery = "UPDATE tb_residentsacc SET code = $code WHERE email = '$email'";
                $updateResult = mysqli_query($conn, $updateQuery);
                if ($updateResult) {
                    $subject = 'Email Verification Code';
                    $message = "Your verification code is $code";
                    $sender = 'From: viabeanca.guerra@g.batstate-u.edu.ph';

                    if (mail($email, $subject, $message, $sender)) {
                        $message = "We've sent a verification code to your Email <br> $email";

                        $_SESSION['message'] = $message;
                        header('location: verifyEmail.php');
                    } else {
                        $errors['otp_errors'] = 'Failed while sending code!';
                    }
                } else {
                    $errors['db_errors'] = "Failed while inserting data into database!";
                }
            }else{
                $errors['invalidEmail'] = "Invalid Email Address";
            }
        }else {
            $errors['db_error'] = "Failed while checking email from database!";
        }
    }
if(isset($_POST['verifyEmail'])){
    $_SESSION['message'] = "";
    $OTPverify = mysqli_real_escape_string($conn, $_POST['OTPverify']);
    $verifyQuery = "SELECT * FROM tb_residentsacc WHERE code = $OTPverify";
    $runVerifyQuery = mysqli_query($conn, $verifyQuery);
    if($runVerifyQuery){
        if(mysqli_num_rows($runVerifyQuery) > 0){
            $newQuery = "UPDATE tb_residentsacc SET code = 0";
            $run = mysqli_query($conn,$newQuery);
            header("location: newPassword.php");
        }else{
            $errors['verification_error'] = "Invalid Verification Code";
        }
    }else{
        $errors['db_error'] = "Failed while checking Verification Code from database!";
    }
}

// change Password
if(isset($_POST['changePassword'])){
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    
    if (strlen($_POST['password']) < 8) {
        $errors['password_error'] = 'Use 8 or more characters with a mix of letters, numbers & symbols';
    } else {
        // if password not matched so
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errors['password_error'] = 'Password not matched';
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE tb_residentsacc SET password = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            //session_unset($email);
            session_destroy();
            header('location: index.php#signin');
        }
    }
}

if(isset($_POST['changeNewPassword'])){
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    
    if (strlen($_POST['password']) < 8) {
        $errors['password_error'] = 'Use 8 or more characters with a mix of letters, numbers & symbols';
    } else {
        // if password not matched so
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errors['password_error'] = 'Password not matched';
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE tb_residentsacc SET password = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            
        }
    }
}