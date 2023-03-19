<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Profile</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <div class="header" id="header">
                <div class="logo-name">
                    <div class="hamburger" onclick="myNav()">
                        <div class="burger"></div>
                        <div class="burger"></div>
                        <div class="burger"></div>
                    </div>
                </div>
            </div>
            <div class="divider">
                <p>Municipality of Ibaan</p>
            </div>
        </header>
        <nav class="navigation" id="navigation">
                <div class="hamburger-close" onclick="closeNav()">
                    <div class="burger --one"></div>
                    <div class="burger --two"></div>
                    <div class="burger --three"></div>
                </div>
                <div class="nav-links">
                    <a href="viewer_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                    <a href="viewer-found.php" class="nav-link"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
                    <a href="viewer-claimed.php" class="nav-link"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
                    <a href="viewer_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="viewer_profile.php" class="nav-link active"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
                    <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>
        <nav class="navigation">
                <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
                <div class="nav-links" id="myDIV">
                    <a href="viewer_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                    <a href="viewer-found.php" class="nav-link"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
                    <a href="viewer-claimed.php" class="nav-link"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
                    <a href="viewer_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="viewer_profile.php" class="nav-link active"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
                    <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>

        
        <!--update form code-->
        <section class="box_one">
                <div class="box_two">
                    <div class="box_three">

                        <?php

                        ini_set('display_errors', 1);
                        //error_reporting(E_ALL & ~E_NOTICE);
                        Error_reporting(0);

                        include 'connect_db.php';
                        
                        $loggedin_id            =   $_GET['accountId'];
                        $fname                  =   $_GET['fname'];
                        $lname                  =   $_GET['lname'];
                        $contact                =   $_GET['contact'];
                        $gender                 =   $_GET['gender'];
                        $address                =   $_GET['address'];
                        $loggedin_session       =   $_GET['email'];
                        $password               =   $_GET['password'];


                        $result=$conn->query("SELECT * FROM 'tb_residentsacc' WHERE fname=$fname, lname=$lname, accountId=$loggedin_id, contact=$contact, gender=$gender, address=$address, email=$loggedin_session, password=$password");
                        //$result = mysqli_query($conn, $sql);
                        
                        if(isset($_POST['Submit'])){

                            $fname                  =   $_POST['fname'];
                            $lname                  =   $_POST['lname'];
                            $loggedin_id            =   $_POST['accountId'];
                            $contact                =   $_POST['contact'];
                            $address                =   $_POST['address'];
                            $gender                 =   $_POST['gender'];
                            $loggedin_session       =   $_POST['email'];
                            $password               =   $_POST['password'];

                            
                            $t_fname                    = trim($fname);
                            $t_lname                    = trim($lname);
                            $t_loggedin_id              = trim($loggedin_id);
                            $t_contact                  = trim($contact);
                            $t_address                  = trim($address);
                            $t_gender                   = trim($gender);
                            $t_loggedin_session         = trim($loggedin_session);
                            $t_password                 = trim($password);


                            $result=$conn->query("UPDATE tb_residentsacc SET fname='$t_fname', lname='$t_lname', contact='$t_contact', address='$t_address', gender='$t_gender', email='$t_loggedin_session', password='$t_password' WHERE accountId='$t_loggedin_id'") or die("Data Not Updated");
                     

                            if($result){
                                $_SESSION['Submit'] = "Profile Updated Successfully!";
                                header('Location: viewer_profile.php');
                                exit;
                            }else{
                                $_SESSION['Submit'] = "Something wrong...";
                                header('Location: viewer_profile.php');
                                exit;
                            }
                        }
                    ?>
                        <form action="code_edit_profile.php" method="POST">
                            <div class="card mx-6 mx-md-6 shadow-5-strong" style="
                                    height: 100%;
                                    width: 100%;
                                    margin-top: 2px;
                                    ">
                                
                                <h1 style="text-align: center; margin: 20px; color: black;">Update Profile</h1>
                                <div class="first-three">
                                    <input class="input big" type="text" name="fname" placeholder="First name" value="<?php echo $fname; ?>" required/>
                                    <input class="input big" type="text" name="lname" placeholder="Last name" value="<?php echo $lname; ?>" />
                                    <input class="input big" type="hidden" name="accountId" placeholder="Account Id" readonly value="<?php echo $loggedin_id; ?>" required/>
                                </div>
                                <div class="second-three">
                                    <input class="input big" type="text" name="contact" placeholder="Contact No" value="<?php echo $contact; ?>" required/>
                                    <select class="input big" name="gender">
                                            <option value="<?php echo $gender; ?>" selected><?php echo $gender; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    <input class="input big" type="text" name="address" placeholder="House no./Street/Barangay/City/Municality" value="<?php echo $address; ?>" required/>
                                </div>
                                <div class="third-three">
                                    <input class="input big" type="text" name="email" placeholder="Email" value="<?php echo $loggedin_session; ?>" readonly required/>
                                    
                                    <input class="input big" type="hidden" name="password" value="<?php echo $password; ?>" readonly required/>
                                    
                                </div>
                                <input class="input button-submit" type="submit" name="Submit" value="Update">
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </section>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop.png" alt="" width="60" height="50"></button>
        
        <style>
            .box_one{
                margin: 20px 0 0 250px;
            }
            .box_two{
                display: flex;
                justify-content: center;
                width: 100%;
                height: 95%;
            }
            .box_three{
                width: 85%;
                height: 95%;
                border-radius: 20px;
                border: 2px solid var(--color-gray);
                box-shadow:  1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
                background-color: #ffffff;
                padding: 0 5px;
            }
            @media screen and (max-width: 480px) {
                .box_one{
                    margin-left: 28px;
                    width: 90%;
                }
            }

            @media screen and (min-width: 482px) and (max-width: 767px) {
                .box_one{
                    margin-left:12px;
                    width: 78%;
                }
            }
        </style>

        <!--JavaScript Codes-->
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
            //small devices navigation
            function myNav() {
                document.getElementById("navigation").style.display = "block";
                }
            function closeNav() {
                document.getElementById("navigation").style.display = "none";
                }

            // thses codes are for update form
            function openPWform() {
                document.getElementById("myChangePasswordForm").style.display = "block";
                }
            function closePWform() {
                document.getElementById("myChangePasswordForm").style.display = "none";
                }
            
            // Javascript for show/hide password
            function myFunction() {
                var x = document.getElementById("pass");
                var y = document.getElementById("cpass");
                if ((x.type === "password") && (y.type === "password")) {
                    x.type = "text";
                    y.type = "text";
                } else {
                    x.type = "password";
                    y.type = "password";
                }
            }
        </script>
    </body>
</html>