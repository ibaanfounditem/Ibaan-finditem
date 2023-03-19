<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost-Item Finder | Found Item</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
      <a href="viewer-found.php" class="nav-link active"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
      <a href="viewer-claimed.php" class="nav-link"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
      <a href="viewer_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
      <a href="viewer_profile.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
      <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
    </div>
  </nav>
  <nav class="navigation">
    <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
    <div class="nav-links" id="myDIV">
      <a href="viewer_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
      <a href="viewer-found.php" class="nav-link active"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
      <a href="viewer-claimed.php" class="nav-link"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
      <a href="viewer_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
      <a href="viewer_profile.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
      <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
    </div>
  </nav>
        <div class="search-bar">
            <a class="search-back" href='viewer-found.php'><img src="./images/backsearch-icon.png" width="20" height="20"></a>
        </div>
        <main>
            <section class="form-output" id="form-output">
                <div class="output-container">
                <?php
                
                    ini_set('display_errors', 1);
                    //error_reporting(E_ALL & ~E_NOTICE);
                    Error_reporting(0);
                    include 'connect_db.php';

                    if(isset($_POST['search']))
                        {
                            $Finder         =   $_POST['finder'];
                            $Contact        =   $_POST['contact'];
                            $ItemNo         =   $_POST['itemNo'];
                            $ItemCategory   =   $_POST['itemCategory'];
                            $ItemLoc        =   $_POST['itemLocation'];
                            $ItemBrand      =   $_POST['itemBrand'];
                            $ItemColor      =   $_POST['itemColor'];
                            $Description    =   $_POST['itemDescription'];

                            $query = "SELECT * FROM tb_itemrecord WHERE itemCategory='$ItemCategory' ORDER BY itemNo DESC" or die("Error");
                            $result = mysqli_query($conn, $query);
                            

                            if ($result)
                                {
                                    // it return number of rows in the table.
                                    $row = mysqli_num_rows($result);
                                          
                                    if ($row)
                                       {
                                        echo "<p class='total-item'>Number of Search Item: $row </p>";
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
                                            <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item No: </span><?php echo $row['itemNo']; ?></p>
                                            <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Category: </span><?php echo $row['itemCategory']; ?></p>
                                            <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Date&Time: </span><?php echo $row['timedate']; ?></p>
                                        </div>
                                        <div class="output-two output">
                                            <a  class="send" href= "viewer-found-display.php?itemno=<?php echo $row['itemNo']; ?> & itemCategory=<?php echo $row['itemCategory']; ?> & timedate=<?php echo $row['timedate']; ?>">Send Proof</a>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                    ?>
                </div>
            </section>
        </main>
        <!--back to top botton-->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop.png" alt="" width="60" height="50"></button>
        <!--These codes are for message form-->

        <!--Responsive Codes-->
        <style>
        .send{ 
            font-size: 1rem; padding: 0 10px; margin-left: 617px;
            cursor: pointer; width: 15%; margin-top: 1%;
            margin-bottom: 1%; background-color: gray; border-radius: 5px;
            height: 25px; color: white; text-decoration: none;
        }
        @media only screen and (min-width: 468px) and (max-width: 540px){
            .send{
            margin-left: 320px;
            width: 26%;
            }
        }
        @media screen and (min-width: 481px) and (max-width: 640px) {
            .send{
            margin-left: 294px;
            width: 26%;
            }
        }
        @media screen and (min-width: 300px) and (max-width: 481px) {
            .send{
            margin-left: 200px;
            width: 35%;
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
            // thses codes are for message form
            function openForm() {
                document.getElementById("myForm").style.display = "block";
                }
            function closeForm() {
                document.getElementById("myForm").style.display = "none";
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