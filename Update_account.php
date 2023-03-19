<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Accounts</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="./images/bsu-logo.png" type="image/x-icon">
    </head>
    
    <body>
        <header>
            <div class="header" id="header">
                <div class="logo-name">
                </div>
            </div>
            <div class="divider">
                <p>Municipality of Ibaan</p>
            </div>
        </header>
        <!--Navigation-->
        <nav class="navigation" id="navigation">
            <div class="nav-links" id="myDIV">
                <a href="admin_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                <a href="admin_itemRecord.php" class="nav-link"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                <a href="admin_accounts.php" class="nav-link active"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
            </div>
        </nav>
        <div class="message-nav-parent">
            <div class="message-nav">
                <a href="admin_accounts.php" class="msg-nav-child --msg-active"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">User</a>
                <a href="admin_admin-accounts.php" class="msg-nav-child"><img src="./images/admin-ico.png" width="18" height="18" style="margin-right: 3px;">Admin</a>
            </div>
        </div>
        <div class="search-bar">
        <form class="search-box" action="search_account.php" method=POST>
                <input class="search" type="text" name="fullname" size='20' placeholder="Search name...." required>
                <button class="search-btn" title="Search" type="submit" name= "search"><img src="./images/search-icon.png" width="15" height="15"></button>
            </form>
        </div>
        <main>
            <section class="forms-input">
            <?php
                include 'connect_db.php';
                
                $fname      =   $_GET['fname'];
                $lname      =   $_GET['lname'];
                $accountId  =   $_GET['accountId'];
                $contact    =   $_GET['contact'];
                $address    =   $_GET['address'];
                $gender     =   $_GET['gender'];
                $email      =   $_GET['email'];
                $password   =   $_GET['password'];
                
                $sql="SELECT * FROM 'tb_residentsacc' WHERE accountId=$accountId, fname=$fname, lname=$lname, contact=$contact, address=$address, gender=$gender, email=$email, password=$password";

                if(isset($_POST['Submit'])){
                    $fname      =   $_POST['fname'];
                    $lname      =   $_POST['lname'];
                    $accountId  =   $_POST['accountId'];
                    $contact    =   $_POST['contact'];
                    $address    =   $_POST['address'];
                    $gender     =   $_POST['gender'];
                    $email      =   $_POST['email'];
                    $password   =   $_POST['password'];

                    /*
                    $t_fname        = trim($fname);
                    $t_lname        = trim($lname);
                    $t_accountId    = trim($accountId);
                    $t_contact      = trim($contact);
                    $t_address      = trim($address);
                    $t_gender       = trim($gender);
                    $t_email        = trim($email);
                    $t_password     = trim($password);
                    */

                    $sql= "UPDATE tb_residentsacc SET fname='$fname', lname='$lname', contact='$contact', address='$address', gender='$gender', email='$email', password='$password' WHERE accountId='$accountId'" or die("Data Not Updated");
                    $result=mysqli_query($conn, $sql);

                    if($result){
                        $_SESSION['Submit'] = "Account Updated Successfully!";
                        header('Location: admin_accounts.php');
                        exit;
                    }else{
                        $_SESSION['Submit'] = "Something wrong...";
                        header('Location: admin_accounts.php');
                        exit;
                    }
                }
            ?>
                <!--form inputs-->
                <form class='form' action="Update_account.php" method="POST" enctype="multipart/form-data">
                        <div class="first-three">
                            <input class="input big" type="text" placeholder="Firstname..." name="fname" value='<?php echo $fname;?>' required>
                            <input class="input big" type="text" placeholder="Lastname..." name="lname" value='<?php echo $lname;?>' required>
                            <input class="input small" type="text" placeholder="Account Id" name="accountId" value='<?php echo $accountId;?>' readonly>
                        </div>
                        <div class="second-three">
                            <input class="input small" type="text" placeholder="Contact..." name="contact" value='<?php echo $contact;?>' required>
                            <input class="input small" type="text" placeholder="Address..." name="address" value='<?php echo $address;?>' required>
                            <select name="gender" class="input big">
                                <option value='<?php echo $gender;?>'><?php echo $gender;?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="third-three">
                            <input class="input big" type="text" placeholder="Email..." name="email" value='<?php echo $email;?>' required>
                            <input class="input small" type="text" placeholder="Password..." name="password" value='<?php echo $password;?>' readonly>

                            <input class="input button-submit" type="submit" name="Submit" value="Update">
                        </div>
                </form>
            </section>
        </main>
        <!--Back to top button-->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop.png" alt="" width="60" height="50"></button>
        <script>
            //Get the button
            var mybutton = document.getElementById("myBtn");
            
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
            function closeForm() {
                document.getElementById("btnClose").style.display = "none";
                }
        </script>
    </body>
</html>