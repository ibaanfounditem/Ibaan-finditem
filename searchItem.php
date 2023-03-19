<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost-Item Finder | Item Record</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="responsive.css">
  <link rel="icon" href="./images/logo.png" type="image/x-icon">
</head>
<?php include 'code_session.php'; ?>
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
  <!--Navigation-->
  <nav class="navigation" id="navigation">
      <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
      <div class="nav-links" id="myDIV">
          <a href="admin_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
          <a href="admin_itemRecord.php" class="nav-link active"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
          <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
          <a href="admin_accounts.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
          <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
      </div>
  </nav>

        <div class="message-nav-parent">
            <div class="message-nav">
                <a href="admin_itemRecord.php" class="msg-nav-child --msg-active"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">AddItem</a>
                <a href="admin_updateItem.php" class="msg-nav-child"><img src="./images/update-icon.png" width="18" height="18" style="margin-right: 3px;">Update</a>
                <a href="admin_claim_item.php" class="msg-nav-child"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claim</a>
                <a href="admin_claimedItem.php" class="msg-nav-child"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed</a>
            </div>
        </div>
        <div class="search-bar">
            <a class="search-back" href='admin_itemRecord.php'><img src="./images/backsearch-icon.png" width="20" height="20"></a>
        </div>
        <main>
            <section class="form-output" id="form-output">
                <div class="output-container">
                <?php
                
                    ini_set('display_errors',1);
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
                                        <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Finder: </span><?php echo $row['finder']; ?></p>
                                        <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Contact: </span><?php echo $row['contact']; ?></p>
                                    </div>
                                    <div class="output-two output">
                                        <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Date&Time: </span><?php echo $row['timedate']; ?></p>
                                        <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Category: </span><?php echo $row['itemCategory']; ?></p>
                                    </div>
                                    <div class="output-three output">
                                        <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Location: </span><?php echo $row['itemLocation']; ?></p>
                                        <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Brand: </span><?php echo $row['itemBrand']; ?></p>
                                    </div>
                                    <div class="output-two output">
                                        <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Color: </span><?php echo $row['itemColor']; ?></p>
                                        <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Description: </span><?php echo $row['itemDescription']; ?></p>
                                    </div>
                                    <div class="output-one output">
                                        <p class="p-one" readonly><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item No: </span><?php echo $row['itemNo']; ?></p>
                                        
                                    </div>

                                    <div class="output-delete">
                                        <input style="color:#000000; margin: 10px 50px; border:none; background-color: #ddd; font-size: 1rem; text-decoration: underline; cursor: pointer;" type="button" onClick="deleteAcc(<?php echo $row['itemNo']; ?>)" name= "Delete" value="Delete">
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