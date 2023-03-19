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

        
        <!--user change password code-->
        <section style="margin: 20px 0 0 250px;">
                <div style="display: flex;
                            justify-content: center;
                            width: 100%;
                            height: 95%;">

                    <div style="width: 35%;
                                height: 95%;
                                margin-top: 5%;
                                border-radius: 20px;
                                border: 2px solid var(--color-gray);
                                background-color: #fe6e00de;
                                padding: 0 5px;">

                        <?php
                        include 'connect_db.php';
                        
                        $loggedin_id            =   $_GET['accountId'];
                        $password               =   $_GET['password'];


                        $sql = "SELECT * FROM 'tb_residentsacc' WHERE accountId=$loggedin_id, password=$password";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        
                        if(isset($_POST['Submit'])){

                            
                            $loggedin_id            =   $_POST['accountId'];
                            $password               =   $_POST['password'];

                            
                            $t_loggedin_id              = trim($loggedin_id);
                            $t_password                 = trim($password);


                            $sql= "UPDATE tb_residentsacc SET password='$t_password' WHERE accountId='$t_loggedin_id'" or die("Data Not Updated");
                            $result=mysqli_query($conn, $sql);

                            
                        }
                    ?>
                        <form action="change-password-profile.php" method="POST" autocomplete="off">
                            <div class="card mx-6 mx-md-6 shadow-5-strong" style="
                                    height: 100%;
                                    width: 100%;
                                    margin-top: 2px;

                                    ">
                                
                                <h1 style="text-align: center; margin: 20px; color: #ffffff;">Change Password</h1>
                                    <?php
                                    if ($errors > 0) {
                                        foreach ($errors as $displayErrors) {
                                    ?>
                                            <div id="alert" style="height: auto;
                                                            width: 100%;
                                                            background: #ec9006;
                                                            padding: 0 15px;
                                                            font-size: 19px;
                                                            line-height: 40px;
                                                            margin: 10px 0;
                                                            color: #000;
                                                            border-radius: 4px;"><?php echo $displayErrors; ?></div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <label class="div-for-update" style= "margin-left: 12px;" for="password">New Password</label>
                                    <input class="input big" style="width: 90%;" type="password" name="password" id="pass" placeholder="Enter your new password..." required/>

                                    <label class="div-for-update" style= "margin-left: 12px;" for="password">Confirm New Password</label>
                                    <input class="input big" style="width: 90%;" type="password" name="confirmPassword" id="cpass" placeholder="Confirm your password" required/>
                                    
                                    <br>
                                    <input style="margin-left: 12px; margin-right:18px; margin-bottom:25px;" type="checkbox" onclick="myFunction()">Show Password
                                    <br><button class="input big" style="width: 90%;" type="submit"> Save </button>
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop.png" alt="" width="60" height="50"></button>
        
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