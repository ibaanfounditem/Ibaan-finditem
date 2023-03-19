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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
    </head>
    <?php include 'code_user_session.php'; ?>
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

        <!-- diplay profile -->
        <main>
            <section class="profile-form">
                <div class="profile-cont">
                    <div class="profile">
                    <?php
                        if(isset($_SESSION['Submit'])){
                            ?>
                            <div class="submit-btn" id="btnClose" style="border:1px solid #bbb; border-radius: 8px; padding:5px; margin:10px 0px; background:#eee; text-align:left; width: 100%"> 
                                <?php echo $_SESSION['Submit']; ?>
                                <button style="display: flex; border:none; margin-left: 95%; margin-top: -5%; padding: 2px; cursor: pointer; font-size: 20px" type="button" onclick="closeForm()">&times</button>
                            </div>

                            <?php
                            unset($_SESSION['Submit']);
                        }
                    ?>
                    <?php
                        $sql=mysqli_query($conn, "SELECT * FROM tb_residentsacc where accountId='$loggedin_id'");
                        $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
                        
                        $fname=$row['fname'];
                        $lname=$row['lname'];
                        $contact=$row['contact'];
                        $address=$row['address'];
                        $gender=$row['gender'];
                        $password=$row['password'];
                    ?>
                        <table width="100%" style="border: none;">
                        
                            <tr>
                                <th colspan="2" style="border: none;"><h1 style="text-align: center; margin: 20px; color: black;">My Profile</h1></th>
                            </tr>
                            <tr>
                                <td style="width: 30%; border: none;"><p style="text-align: right; margin-top: 5px; margin-bottom: 5px; margin-right: 20px; font-weight: 700; color: black;">Fullname:</p></td>
                                <td style="width: 70%; border: none;"><p style="text-align: left; margin-top: 5px; margin-bottom: 5px; margin-left: 20px; color: black;"><?php echo $fname; ?> &nbsp <?php echo $lname; ?></p></td>
                            </tr>
                            <tr>
                                <!-- <td style="width: 30%; border: none;"><p style="text-align: right; margin-top: 5px; margin-bottom: 5px; margin-right: 20px; font-weight: 700; color: black;">AccountId:</p></td>
                                <td style="width: 70%; border: none;"><p style="text-align: left; margin-top: 5px; margin-bottom: 5px; margin-left: 20px; color: black;"><//?php echo $loggedin_id; ?></p></td>-->
                            </tr>
                            <tr>
                                <td style="width: 30%; border: none;"><p style="text-align: right; margin-top: 5px; margin-bottom: 5px; margin-right: 20px; font-weight: 700; color: black;">Contact No.:</p></td>
                                <td style="width: 70%; border: none;"><p style="text-align: left; margin-top: 5px; margin-bottom: 5px; margin-left: 20px; color: black;"><?php echo $contact; ?></p></td>
                            </tr>
                            <tr>
                                <td style="width: 30%; border: none;"><p style="text-align: right; margin-top: 5px; margin-bottom: 5px; margin-right: 20px; font-weight: 700; color: black;">Gender:</p></td>
                                <td style="width: 70%; border: none;"><p style="text-align: left; margin-top: 5px; margin-bottom: 5px; margin-left: 20px; color: black;"><?php echo $gender; ?></p></td>
                            </tr>
                            <tr>
                                <td style="width: 30%; border: none;"><p style="text-align: right; margin-top: 5px; margin-bottom: 5px; margin-right: 20px; font-weight: 700; color: black;">Address:</p></td>
                                <td style="width: 70%; border: none;"><p style="text-align: left; margin-top: 5px; margin-bottom: 5px; margin-left: 20px; color: black;"><?php echo $address; ?></p></td>
                            </tr>
                            
                            <tr>
                                <td style="width: 30%; border: none;"><p style="text-align: right; margin-top: 5px; margin-bottom: 5px; margin-right: 20px; font-weight: 700; color: black;">Email:</p></td>
                                <td style="width: 70%; border: none;"><p style="text-align: left; margin-top: 5px; margin-bottom: 5px; margin-left: 20px; color: black;"><?php echo $loggedin_session; ?></p></td>
                            </tr>
                            <tr>
                                <td style="width: 70%; border: none;"><input class="input big" type="hidden" value="Change Password"/><p style="text-align: left; margin-top: 5px; margin-bottom: 5px; margin-left: 20px; color: #ffffff; -webkit-text-security: none; display: none;"><?php //echo $password; ?></p></a></td>
                                
                            </tr>
                            <tr>
                                <td style="width: 30%; border: none;"></td>
                                <td style="width: 70%; border: none;"><a style= "text-decoration: none; color: black;" href="code_edit_profile.php?accountId=<?php echo $row['accountId']; ?> & fname=<?php echo $row['fname']; ?> & lname=<?php echo $row['lname']; ?> & contact=<?php echo $row['contact']; ?> & address=<?php echo $row['address']; ?> & gender=<?php echo $row['gender']; ?> & email=<?php echo $row['email']; ?> & password=<?php echo $row['password']; ?>"><input class="input big" type="button" value="Edit Profile"></a></button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </main>


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

            function closeForm() {
                document.getElementById("btnClose").style.display = "none";
                }
        </script>
    </body>
</html>