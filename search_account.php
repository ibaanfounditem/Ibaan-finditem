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
        <link rel="stylesheet" href="responsive.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
        
    </head>
    <?php include 'code_session.php'; ?>
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
            <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
            <div class="nav-links" id="myDIV">
                <a href="admin_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                <a href="admin_itemRecord.php" class="nav-link"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                <a href="admin_reports.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Reports</a>
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
            <a class="search-back" title="Back" href='admin_accounts.php'><img src="./images/backsearch-icon.png" width="20" height="20"></a>
        </div>
        <main>
            <!--database connection and display section-->
            <section class="form-output" id="form-output">
                <div class="output-container">
                    <?php
                    header("Access-Control-Allow-Origin: *");

                    include 'connect_db.php';

                    if(isset($_POST['search']))
                    {
                        $accountId  =   $_POST['accountId'];
                        $fname      =   $_POST['fname'];
                        $lname      =   $_POST['lname'];
                        $contact    =   $_POST['contact'];
                        $address    =   $_POST['address'];
                        $gender     =   $_POST['gender'];
                        $email      =   $_POST['email'];
                        $password   =   $_POST['password'];
                        
                        //showing data from tb_accounts to the system
                        $query = "SELECT * FROM tb_residentsacc WHERE accountId = $accountId" or die("Error");
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) == 0) {
                            echo "<div class='nodata'>
                                    <img src='./images/nodata.png' width='120px' height='120px'>
                                    <p>No Data</p>
                                  </div>";
                            exit;
                        }
                        while($row=mysqli_fetch_assoc($result))
                        {
                        ?>
                        <!--division for data display-->
                        <div class='output-cont-table'>
                            <table style="width:100%">
                                <tr>
                                    <th style="text-align: left; background-color: #cccccc; color: #ec9006"><h3>User Info</h3></th>
                                    <th style="text-align: right; background-color: #cccccc; color: #ec9006"><a style="color:#ec9006; margin: 10px;" href='Update_account.php?accountId=<?php echo $row['accountId']; ?> & fname=<?php echo $row['fname']; ?> & lname=<?php echo $row['lname']; ?> & contact=<?php echo $row['contact']; ?> & address=<?php echo $row['address']; ?> & gender=<?php echo $row['gender']; ?> & email=<?php echo $row['email']; ?> & password=<?php echo $row['password']; ?>'>Edit</a>
                                        <a style="color:#ec9006; margin: 10px;" href='delete_user_acc.php?id="<?php echo $row['accountId']; ?>"'>Delete</a></th>
                                </tr>
                                <tr>
                                    <td style="width:50%"><p><span style="font-weight:700;">Name: </span><?php echo $row['fname']; ?>&nbsp<?php echo $row['lname']; ?></p></td>
                                    <td style="width:50%"><p><span style="font-weight:700;">Account Id: </span><?php echo $row['accountId']; ?></p></td>
                                </tr>
                                <tr>
                                    <td style="width:50%"><p><span style="font-weight:700;">Contact No: </span><?php echo $row['contact']; ?></p></td>
                                    <td style="width:50%"><p><span style="font-weight:700;">Gender: </span><?php echo $row['gender']; ?></p></td>
                                </tr>
                                <tr>
                                    <td style="width:50%"><p><span style="font-weight:700;">Address: </span><?php echo $row['address']; ?></p></td>
                                    <td style="width:50%"><p><span style="font-weight:700;">Email: </span><?php echo $row['email']; ?></p></td>
                                </tr>
                                <tr>
                                    <td style="width:50%"><p><span style="font-weight:700;">Password: </span><?php echo $row['password']; ?> </p></td>
                                </tr>
                            </table>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
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
        </script>
    </body>
</html>