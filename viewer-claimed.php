<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Claimed Item</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
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
                <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
                <div class="nav-links">
                    <a href="viewer_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                    <a href="viewer-found.php" class="nav-link"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
                    <a href="viewer-claimed.php" class="nav-link active"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
                    <a href="viewer_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="viewer_profile.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
                    <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>
        <nav class="navigation">
                <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
                <div class="nav-links" id="myDIV">
                    <a href="viewer_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                    <a href="viewer-found.php" class="nav-link"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
                    <a href="viewer-claimed.php" class="nav-link  active"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
                    <a href="viewer_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="viewer_profile.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
                    <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>
        <main>
        <section class="form-output" id="form-output">
                <div class="output-container">
                <?php
                    include 'connect_db.php';

                    $query = "SELECT * FROM tb_claimedrecord INNER JOIN tb_claimedowner ON tb_claimedrecord.clitemno = tb_claimedowner.itemno Order by tdclaimed DESC" or die("Error");
                    $result = mysqli_query($conn, $query);
                    
                    if ($result)
                    {
                        // it return number of rows in the table.
                        $row = mysqli_num_rows($result);
                            
                        if ($row)
                        {
                            echo "<p class='total-item'>Number of Found Item: $row </p>";
                        }
                        // close the result.

                        //if table has no data
                        if (mysqli_num_rows($result) == 0) {
                        echo "<div class='nodata'>
                                <img src='./images/nodata.png' width='120px' height='120px'>
                                <p>No Data</p>
                            </div>";
                        }   
                    }

                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                        <div class='output-cont-child'>
                            <div class="output-one output">
                                <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Finder: </span><?php echo $row['clfinder']; ?></p>
                                <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Contact: </span><?php echo $row['clcontact']; ?></p>
                            </div>
                             <div class="output-two output">
                                <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item No: </span><?php echo $row['clitemno']; ?></p>
                                <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Category: </span><?php echo $row['clitemCategory']; ?></p>
                            </div>
                            <div class="output-three output">
                                <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'> Time </span><?php echo $row['cltime']; ?></p>
                                <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'> Date </span><?php echo $row['cldate']; ?></p>
                            </div>
                            <div class="output-four output">
                                <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Description: </span><?php echo $row['clitemDescription']; ?></p>
                                <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Location: </span><?php echo $row['clitemLocation']; ?></p>
                            </div>
                            <div class="output-five output" style="background-color: #ddd;">
                                <p class="p-one" style='font-style: italic;'><span style='color:#ec9006; font-weight:700; margin-right: 20px; font-style: italic;'>Owner: </span><?php echo $row['owner']; ?></p>
                                <p class="p-two" style='font-style: italic;'><span style='color:#ec9006; font-weight:700; margin-right: 20px; font-style: italic;'>Recieved at: </span><?php echo $row['tdclaimed']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
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
        </script>
    </body>
</html>