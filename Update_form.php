<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Update Item</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="./images/bsu-logo.png" type="image/x-icon">
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
                    <a href="admin_itemRecord.php" class="nav-link active"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                    <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="admin_reports.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Reports</a>
                    <a href="admin_accounts.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                    <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
            </div>
        </nav>
        <div class="message-nav-parent">
                <div class="message-nav">
                    <a href="admin_itemRecord.php" class="msg-nav-child"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">AddItem</a>
                    <a href="admin_updateItem.php" class="msg-nav-child --msg-active"><img src="./images/update-icon.png" width="18" height="18" style="margin-right: 3px;">Update</a>
                    <a href="admin_claim_item.php" class="msg-nav-child"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claim</a>
                    <a href="admin_claimedItem.php" class="msg-nav-child"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed</a>
                </div>
        </div>
        <main>
            <section class="forms-input">
                <div class="output-container">
                    <?php
                        ini_set('display_errors',1);
                        //error_reporting(E_ALL & ~E_NOTICE);
                        Error_reporting(0);
                        
                        include 'connect_db.php';
                        
                        $id             =   $_GET['edit'];
                        $finder         =   $_GET['finder'];
                        $contact        =   $_GET['contact'];
                        $itemCategory   =   $_GET['itemCategory'];
                        $itemLocation   =   $_GET['itemLocation'];
                        $itemBrand      =   $_GET['itemBrand'];
                        $itemColor      =   $_GET['itemColor'];
                        $itemDescription=   $_GET['itemDescription'];
                        $isClaimed      =   $_GET['isClaimed'];


                        $sql= "SELECT * FROM 'tb_itemRecord' WHERE itemNo=$id, finder=$finder, contact=$contact, time=$time, date=$date, itemCategory=$itemCategory, itemLocation=$itemLocation, itemBrand=$itemBrand, itemColor=$itemColor, itemDescription=$itemDescription, isClaimed=$isClaimed";
                        
                        if(isset($_POST['Submit'])){
                            $Finder         =   $_POST['finder'];
                            $Contact        =   $_POST['contact'];
                            $ItemNo         =   $_POST['itemNo'];
                            $ItemCategory   =   $_POST['itemCategory'];
                            $ItemLocation   =   $_POST['itemLocation'];
                            $ItemBrand      =   $_POST['itemBrand'];
                            $ItemColor      =   $_POST['itemColor'];
                            $ItemDescription=   $_POST['itemDescription'];
                            $IsClaimed      =   $_POST['isClaimed'];
                            
                            date_default_timezone_set("Asia/Kuala_Lumpur");
                            $today = date("Y-m-d H:i:s");
                            $today1 = date("Y-m-d");

                            $sql = "UPDATE tb_itemrecord SET finder='$Finder', contact='$Contact', timedate='$today', date='$today1', itemCategory='$ItemCategory', itemLocation='$ItemLocation', itemBrand='$ItemBrand', itemColor='$ItemColor', itemDescription='$ItemDescription', isClaimed='$IsClaimed' WHERE itemNo='$ItemNo'" or die("Data Not Updated");
                            $result = mysqli_query($conn, $sql);

                            if($result){
                                $_SESSION['Submit'] = "Record Updated Successfully !";
                                header('Location: admin_updateItem.php');
                                exit;
                            }else{
                                $_SESSION['Submit'] = "Something wrong...";
                                header('Location: admin_updateItem.php');
                                exit;
                            }
                        }
                        ?>
                </div>
                    <!--form inputs-->
                    <form class='form' action="Update_form.php" method="POST" enctype="multipart/form-data">
                        <div class="first-three">
                            <input class="input big" type="text" value='<?php echo $finder; ?>' placeholder="Name of finder" name="finder" required>
                            <input class="input small" style="background-color: #cccccc" type="text" value='<?php echo $id; ?>' placeholder="Item no..." name="itemNo" readonly required>
                            <input class="input small" type="text" value='<?php echo $contact ; ?>' placeholder="Contact number..." name="contact">
                        </div>
                        <div class="second-three">
                            <select class="input small" id="itemCategory" name="itemCategory" required>
                                <option value="<?php echo $itemCategory?>"><?php echo $itemCategory?></option>
                                <option value="electronic gadget">Electronic gadget</option>
                                <option value="bag">Bag</option>
                                <option value="documents">Documents</option>
                                <option value="cash">Cash</option>
                                <option value="credit/debit cards">Credit/Debit Cards</option>
                                <option value="validID">Valid ID</option>
                            </select>
                            <input class="input medium" type="text" value="<?php echo $itemLocation; ?>" placeholder="Item Location..." name="itemLocation" required>
                            <input class="input medium" type="text" value="<?php echo $itemBrand; ?>" placeholder="Item Brand..." name="itemBrand" required>
                        </div>
                        <div class="third-three">
                            <select class="input small" name="itemColor">
                                <option value="<?php echo $itemColor?>"><?php echo $itemColor?></option>
                                <option value="not applicable">not applicable</option>
                                <option style="background-color: #FFFFFF" value="White">White</option>
                                <option style="background-color: #808080" value="Gray">Gray</option>
                                <option style="background-color: #000000" value="Black">Black</option>
                                <option style="background-color: #FF0000" value="Red">Red</option>
                                <option style="background-color: #008000" value="Green">Green</option>
                                <option style="background-color: #0000FF" value="Blue">Blue</option>
                                <option style="background-color: #F5F11E" value="Yellow">Yellow</option>
                                <option style="background-color: #D0D0CB" value="Gray">Gray</option>
                                <option style="background-color: #964B00" value="Brown">Brown</option>
                                <option style="background-color: #FE6E00" value="Orange">Orange</option>
                                <option style="background-color: #7427C1" value="Violet">Violet</option>
                            </select>
                            <input class="input medium" type="text" value="<?php echo $itemDescription; ?>" placeholder="Item Description..." name="itemDescription" required>

                            <input class="input medium" type="hidden" value="<?php echo $isClaimed; ?>" placeholder="Item Description..." name="isClaimed" required>
                        </div>
                        <div class="fourth-three">
                            <input class="input button-submit" type="submit" name="Submit" value="Update">
                        </div>
                        
                    </form>
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

            function closeForm() {
                document.getElementById("btnClose").style.display = "none";
                }
        </script>
        </main>
    </body>
</html>