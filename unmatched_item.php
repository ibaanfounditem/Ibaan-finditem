<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | UnMatched Item</title>
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
                <a href="admin_archives.php" class="msg-nav-child"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Archives</a>
                <a href="matched_item.php" class="msg-nav-child"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Matched</a>
                <a href="unmatched_item.php" class="msg-nav-child --msg-active"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Not-Matched</a>
            </div>
        </div>
    
        <main>
            <section class="forms-input">
                <div class="output-container" id="realtime">
                <?php
                    header("Access-Control-Allow-Origin: *");

                    ini_set('display_errors',1);
                    //error_reporting(E_ALL & ~E_NOTICE);
                    Error_reporting(0);

                    include 'connect_db.php';
                    //echo" Connected to database ";
                    //showing data from tb_messages
                    $result=$conn->query("SELECT * FROM vwunmatched INNER JOIN tb_residentsacc ON vwunmatched.accountId = tb_residentsacc.accountId ORDER BY msgId DESC") or die("Error");

                    // it return number of rows in the table.
                    $row = mysqli_num_rows($result);
                          
                    if ($row)
                       {
                        echo "<p class='total-item'>Number of Unverified: $row </p>";
                       }
                    // close the result.
       
                    //if table has no data
                    if ($result->num_rows == 0) {
                        echo "<div class='nodata'>
                                <img src='./images/nodata.png' width='120px' height='120px'>
                                <p>No Message</p>
                              </div>";
                        exit;
                    }
                    while($row=$result->fetch_assoc())
                    {
                    ?>
                    <div id='messages-container' style="width: 100%">
                        <div class="msg-name" style="display: flex; align-items: center;">
                            <div style="width: 60%; display: flex; align-items: center;">
                                <p style="margin-left: 20px; color: #FE6E00; font-weight: 700; font-size: 20px;"><?php echo $row['fname'];?>&nbsp<?php echo $row['lname'];?></p>
                                <!-- <p style="margin-left: 10px; color: #000000; font-weight: 600; font-size: 12px;">#<u></?php echo $row['accountId']; ?></u></p> -->
                            </div>
                            <div style="width: 90%; display: flex; align-items: center;">
                                <p style="margin-left: 10px; color: #000000; font-weight: 700; font-size: 14px;">Item No: <u style="font-size: 16px; color: #FE6E00"><?php echo $row['itemnumber']; ?></u></p>
                                <a style="text-decoration: none; margin-left: 80px; color: #FE6E00; font-weight: 700;" onClick="deleteMsg()" href='move_to_archive.php?id="<?php echo $row['msgId']; ?>"&acctId=<?php echo $row['accountId']; ?>&itemNo=<?php echo $row['itemnumber']; ?>&admin_id=<?php echo $_SESSION['admin_id']; ?>'><u>Verify Not Match</u></a>
                                <p style="margin-left: 50px; color: #FE6E00; font-weight: 700; font-size: 16px;"><u><a style="color:#FE6E00;" onClick="verifyMsg()" name="move" href='move_to_verified.php?id="<?php echo $row['msgId']; ?>"&acctId=<?php echo $row['accountId']; ?>&itemNo=<?php echo $row['itemnumber']; ?>&admin_id=<?php echo $_SESSION['admin_id']; ?>'>Verify Match</a></u></p>
                            </div>
                        </div>
                        <div class="msg-caption" style="display: flex; margin-top: 10px;">
                            <div style='width: 100%;
                                        margin-top: -8px;
                                        padding: 10px'>
                                <table style="width:100%">
                                    <tr>
                                        <td colspan="2"><p><span style="font-weight:700;">Date & Time: </span><?php echo $row['datetime']; ?></p></td> 
                                    </tr>
                                    <tr>
                                        <td colspan="2"><p><span style="font-weight:700;">Location: </span><?php echo $row['itemLocation']; ?></p></td>
                                        <td colspan="2"><p><span style="font-weight:700;">Description: </span><?php echo $row['description']; ?></p></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><p><span style="font-weight:700;">Brand: </span><?php echo $row['itemBrand']; ?></p></td>
                                        <td colspan="2"><p><span style="font-weight:700;">Color: </span><?php echo $row['itemColor']; ?></p></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><p><span style="font-weight:700;">Image: </span></p><img class="output-img" src="<?php echo $row['myfile']; ?>" height="200"/></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                    ?>
                </div>
            </section>
        </main>
        <!--Back to top button-->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop-icon.png" alt="" width="60" height="50"></button>
        <!--Open letter form code-->
        <div class="letter-popup" id="myLetterForm">
            <div class="letter-container">
                <div class="letter-cont-child">
                    <h1>Email Letters</h1>
                    <label>For Match</label>
                    <div class="match">
                        <input type="text" value="Dear Mr/Ms.
Sorry for the delayed response. We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at ______________. 
Thank you!" id="matched">
                        <button onclick="myLetterOne()">Copy</button>
                    </div>
                </div>
                <div class="letter-cont-child">
                    <label>For Not Match</label>
                    <div class="not-match">
                        <input type="text" value="Dear Mr/Ms. 
We want to inform you that the details/image you sent to us doesn't match to the item that we had.
Apologies for the delayed response. Thank you!" id="notmatched">
                        <button onclick="myLetterTwo()">Copy</button>
                    </div>
                </div>
                <button class="letter-close" onclick="closeLetter()" title="Close">Close</button>
            </div>
        </div>
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
            // thses codes are for message form
            function openLetter() {
            document.getElementById("myLetterForm").style.display = "block";
            }
            function closeLetter() {
            document.getElementById("myLetterForm").style.display = "none";
            }

            //copy to clipboard javascript code
            function myLetterOne() {
            /* Get the text field */
            var copyText = document.getElementById("matched");
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
            /* Alert the copied text */
            alert("Copied the text: to clipboard");
            }
            //copy to clipboard javascript code
            function myLetterTwo() {
            /* Get the text field */
            var copyText = document.getElementById("notmatched");
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
            /* Alert the copied text */
            alert("Copied the text: to clipboard");
            }

            //for realtime update
            function loadXMLDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     Typical action to be performed when the document is ready:
                    document.getElementById("realtime").innerHTML = xhttp.responseText;
                }
                };
            xhttp.open("GET", "admin-message-display.php", true);
            xhttp.send();
            }
            setInterval(function(){
                loadXMLDoc();
            },1000)

            window.onload = loadXMLDoc;

            function deleteMsg()
            {
                setInterval(function(){
                    alert("Message Deleted! Go to Archive if you want to retrieve it.");}, 3000)
            }
            function verifyMsg()
            {
                setInterval(function(){
                    alert("Message Verified!");}, 3000)
            }

            // thses codes are for image display
            function openImage() {
                document.getElementById("myImageForm").style.display = "block";
                }
            function closeImage() {
                document.getElementById("myImageForm").style.display = "none";
                }
        </script>
    </body>
</html>