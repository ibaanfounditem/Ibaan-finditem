<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Archives</title>
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
        <nav class="navigation" id="navigation">
                <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
                <div class="nav-links" id="myDIV">
                    <a href="admin_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                    <a href="admin_itemRecord.php" class="nav-link"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                    <a href="admin_messages.php" class="nav-link active"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="admin_reports.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Reports</a>
                    <a href="admin_accounts.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                    <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>
        <div class="message-nav-parent">
            <div class="message-nav">
                <a href="admin_messages.php" class="msg-nav-child"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                <a href="admin_verified.php" class="msg-nav-child"><img src="./images/verified.png" width="18" height="18" style="margin-right: 3px;">Verified</a>
                <a href="admin_archives.php" class="msg-nav-child --msg-active"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Archives</a>
                <a href="matched_item.php" class="msg-nav-child"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Matched</a>
                <a href="unmatched_item.php" class="msg-nav-child"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Not-Matched</a>
            </div>
        </div>
        <main>
            <section class="forms-input">
            <div class="output-container">
                <?php

                    header("Access-Control-Allow-Origin: *");
                    
                    ini_set('display_errors',1);
                    //error_reporting(E_ALL & ~E_NOTICE);
                    Error_reporting(0);
                    
                    include 'connect_db.php';

                    $result=$conn->query("SELECT * FROM tb_deletemsg INNER JOIN tb_residentsacc ON tb_deletemsg.dmaccountId = tb_residentsacc.accountId ORDER BY dmid DESC") or die("Error");
                    //if table has no data
                    if ($result->num_rows == 0) {
                        echo "<div class='nodata'>
                                <img src='./images/nodata.png' width='120px' height='120px'>
                                <p>No Data</p>
                            </div>";
                        exit;
                    }
                    while($row=$result->fetch_assoc())
                    {
                        ?>
                    <div class='output-cont-table'>
                        <table style="width:100%">
                            <tr>
                                <th style="text-align: left; background-color: #cccccc; padding-left: 10px;"><h3>Information</th>
                                <th style="text-align: right; background-color: #cccccc"><a style="color:#ec9006; margin: 10px;" href='delete_archives.php?id="<?php echo $row['dmid']; ?>"'>Delete</a>
                                <!-- <a style="color:#ec9006; margin: 10px;" name="move" onClick="retrieveMsg()" href='move_to_message_from_archive.php?id="//php echo $row['dmid']; ?>"'>Retrieve</a> -->
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2"><p><span style="font-weight:700; padding-left: 10px;">Name: </span><?php echo $row['fname']; ?>&nbsp<?php echo $row['lname']; ?></p></td>
                            </tr>
                            <tr>
                                <td style="width:50%"><p><span style="font-weight:700; padding-left: 10px;">Item No: </span><?php echo $row['dmitemnumber']; ?></p></td>
                                <td style="width:50%"><p><span style="font-weight:700; padding-left: 10px;">Email: </span><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2"><p><span style="font-weight:700; padding-left: 10px;">Location: </span><?php echo $row['itemLocation']; ?></p></td>
                            </tr>
                            <tr>
                                <td colspan="2"><p><span style="font-weight:700; padding-left: 10px;">Description: </span><?php echo $row['dmdescription']; ?></p></td>
                            </tr>
                            <tr>
                                <td colspan="2"><p><span style="font-weight:700; padding-left: 10px;">Brand: </span><?php echo $row['itemBrand']; ?></p></td>
                            </tr>
                            <tr>
                                <td colspan="2"><p><span style="font-weight:700; padding-left: 10px;">Color: </span><?php echo $row['itemColor']; ?></p></td>
                            </tr>
                            <tr>
                                <td colspan="2"><p><span style="font-weight:700; padding-left: 10px;">Image: </span></p><img class="output-img" src="<?php echo $row['dmmyfile']; ?>" height="200"/></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                     }
                     ?>
                </div>
            </section>
        </main>
        <!--Back to top button-->
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

            function retrieveMsg()
            {
                setInterval(function(){
                    alert("You've been successfully retrieved this message.");}, 5000)
            }
        </script>
    </body>
</html>