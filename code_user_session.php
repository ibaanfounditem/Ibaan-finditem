<?php
    session_start();
    
    include_once("controller.php");

    $user_check         =   $_SESSION['login_user'];
    $ses_sql            =   mysqli_query($conn,"select email,accountId from tb_residentsacc where email='$user_check'");
    $row                =   mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $loggedin_session   =   $row['email'];
    $loggedin_id        =   $row['accountId'];
    if(!isset($loggedin_session) || $loggedin_session==NULL) {
        header("Location: index.php");

        if($loggedin_session != false){
            $query = "SELECT * FROM tb_residentsacc WHERE email = '$loggedin_session'";
            $run_query = mysqli_query($conn , $query);
            if($run_query){
                $fetch_data = mysqli_fetch_assoc($run_query);
                $status = $fetch_data['status'];
                if($status != "Verified"){
                    header("location: otp.php");
                }
            }
    }else{
        header('location: login-page-user.php');
        }
    }
?>

<!--
<?php 
    /*
    session_start();
    
    include 'connect_db.php';
    
    $user_check         =   $_SESSION['login_user'];
    $ses_sql            =   mysqli_query($conn,"select email,accountId from tb_residentsacc where email='$user_check'");
    $row                =   mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $loggedin_session   =   $row['email'];
    $loggedin_id        =   $row['accountId'];
    if(!isset($loggedin_session) || $loggedin_session==NULL) {
        echo "Go back";
        header("Location: user_login_page.php");
    }
    */
?>
-->

<!--
//<?php /*include_once("controller.php"); ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if($email != false && $password != false){
    $query = "SELECT * FROM tb_residentsacc WHERE email = '$email' AND password = '$password'";
    $run_query = mysqli_query($conn , $query);
    if($run_query){
        $fetch_data = mysqli_fetch_assoc($run_query);
        $status = $fetch_data['status'];
        if($status != "Verified"){
            header("location: otp.php");
        }
    }
}else{
    header('location: user_login_page.php');
} */
?> -->
