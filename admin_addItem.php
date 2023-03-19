<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Home</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
    </head>

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
                <div class="nav-links" id="myDIV">
                    <a href="admin_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                    <a href="admin_itemRecord.php" class="nav-link active"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records </a>
                    <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="admin_accounts.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                    <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>
        <div class="message-nav-parent">
            <div class="message-nav">
                <a href="admin_addItem.php" class="msg-nav-child --msg-active"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">AddItem</a>
                <a href="admin_updateItem.php" class="msg-nav-child"><img src="./images/update-icon.png" width="18" height="18" style="margin-right: 3px;">Update</a>
                <a href="admin_claimedItem.php" class="msg-nav-child"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed</a>
            </div>
        </div>
        <main>
            <div class="forms-input">
                    <!--form inputs-->
                    <form class='form' action="code_addItem.php" method="POST" enctype="multipart/form-data">
                        <div class="first-three">
                            <input class="input big" type="text" placeholder="Finder..." name="finder" required>
                            <input class="input small" type="contact" placeholder="Contact..." name="contact" required>
                            <input class="input small" style="background-color: #cccccc" type="hidden" placeholder="Item no..." name="itemNo" disabled>
                        </div>
                        <div class="second-three">
                            <input class="input small" type="time" placeholder="Time..." name="time">
                           <input class="input small" type="date" placeholder="Date..." name="date" >
                           <input class="input small" type="text" placeholder="Item Category..." name="itemCategory" required>

                        </div>
                       <div class="third-three">
                            <input class="input medium" type="text" placeholder="Item Location..." name="itemLocation" required>
                            <input class="input big" type="description" placeholder="Description..." name="itemDescription" required>
                            <input class="input big" type="file" id="itemImage" name="itemImage" accept="image/*" style="color: #000000;" placeholder="Upload Image...">
                        </div>
                        <div class="fourth-three">
                            <input class="input button-submit" type="submit" name="Submit" value="Submit">
                        </div>
                    </form>
            </div>
        </main>
    </body>
</html>