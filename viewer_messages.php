<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Messages</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
        <script src="js/jquery-3.3.1.js"></script>
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
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
                    <a href="viewer_messages.php" class="nav-link active"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="viewer_profile.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
                    <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>
        <nav class="navigation">
                <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
                <div class="nav-links" id="myDIV">
                    <a href="viewer_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                    <a href="viewer-found.php" class="nav-link"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
                    <a href="viewer-claimed.php" class="nav-link"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
                    <a href="viewer_messages.php" class="nav-link active"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="viewer_profile.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
                    <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>
        
        <main>
            <section class="forms-input">
                <div class="output-container" id="realtime">
                <?php
                
                    ini_set('display_errors',1);
                    //error_reporting(E_ALL & ~E_NOTICE);
                    Error_reporting(0);

                    include 'connect_db.php';
                    $accountId = $_SESSION['accountId'];

                    //echo" Connected to database ";
                    //showing data from tb_messages
                    $result=$conn->query("SELECT * FROM vwchat WHERE  recipient=$accountId") or die("Error");
                    //if table has no data
                    if ($result->num_rows == 0) {
                        echo "<div class='nodata'>
                                <img src='./images/nodata.png' width='120px' height='120px'>
                                <p>No Message</p>
                              </div>";
                        exit;
                    }
                    // while($row=$result->fetch_assoc())
                    // {
                    // ?>
                    <div id='chat-container'>
                        <div class="chat-list">
                            <?php
                                $chatlist = $conn->query("SELECT DISTINCT CASE WHEN vwchat.recipient = $accountId THEN vwchat.sender_id ELSE vwchat.recipient END as user_rowstamp, admin_name fullname FROM vwchat INNER JOIN tb_admin t1 ON vwchat.sender_id = t1.admin_id where recipient = $accountId");
                                if ($chatlist->num_rows == 0) {
                                    echo "<div class='nodata'>
                                            <img src='./images/nodata.png' width='120px' height='120px'>
                                            <p>No Message</p>
                                          </div>";
                                    exit;
                                }

                                 while($xLists=$chatlist->fetch_assoc())
                                {
                                    $xID =  $xLists['user_rowstamp'];
                                    $xName =$xLists['fullname']
                                ?>
                                <div class="card-container" onclick="getMsg(<?php echo $xID; ?>,'<?php echo $xName; ?>')">
                                    <input type="hidden" value="<?php echo $xLists['user_rowstamp'];?>"/>
                                    <?php echo $xLists['fullname']; ?>
                                </div>
                                <?php  
                                }
                                    ?>

                        </div>
                        <div class="main-msg">
                            <div class="msg-header">
                                <h3 id="fullNameHead"></h3>
                            </div>
                            <div class="msg-container">
                                <label id="msgBox">
                            </div>
                            <div class='msg-text'>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                   // }
                    ?>
                </div>
            </section>
        </main>
        <!--Back to top button-->
     
    </body>
    <style>

        .card-container{
            padding: 10px 20px 10px 0px;
            font-size:18px;
        }
        .card-container:hover{
            background-color: #ddd;
            padding-left: 5px;
        }
        .chat-list{
            width:26%;
            display: inline-block;
            height:100%;
            cursor: pointer;
        }
        .main-msg{
            width:60%;
            display: inline-block;
            position:fixed;
            height:100%;
            border-left:1px solid #dddddd;
            border-right:1px solid #dddddd;
        }

        .msg-header{
            height:5%;
            padding-left:10px;
            background-color: #f1f1f1;
        }
        .msg-container{
            min-height:55%;
            max-height:55%;
            overflow-y:auto;
        }

        .msg-text{
            height:9%;
            background-color: #cac9c7;
            padding:12px;
        }
        .msgTextbox{
            line-height:28px;
            min-height:28px;
            font-size:12px;
            text-align:right;
            border-radius:15px;
            border:1px solid rgba(0,0,0,0.1);
            width:80%;
            margin-top: -10%;
            padding:5px 30px 5px 20px;
            margin-left:2%;
        }
        .sendMessage{
            line-height:35px;
            min-height:35px;
            font-size:1em;
            text-align:center;
            border-radius:15px;
            border:1px solid rgba(0,0,0,0.1);
            width:15%;
            margin-left:1%;
            background-color:#ec9006;
            color:white;
        }

        #chat-container{
            margin-top: -4%;
            margin-left: -54px;
            width:100% !important;
        }
        .sent{
            float:right !important;
            padding:3px;
            display:block;
            width:65%;
            word-wrap: break-word;
            font-size:1em;
        }
        .received{
            float:left !important;
            padding:3px;
            display:block;
            width:60%;
            word-wrap: break-word;
            font-size:1em;
        }


        .xtestmessage{
            float:left !important;
            text-align:left;
            display:inline-block;
            background-color:rgba(100,100,100,0.2);
            padding:10px 10px 10px 30px;
            border-radius:15px;
        }
        .xtestmessage_sent{
            float:right !important;
            text-align:left;
            display:inline-block;
            background-color: #ec9006bc;
            padding:10px 30px 10px 10px;
            border-radius:15px;
        }

       /* .xtestmessage{
            text-align:left;
            width:100%;
            background-color:rgba(100,100,100,0.2);
            padding:10px 10px 10px 30px;
            border-radius:15px;
        }
        .xtestmessage_sent{
            text-align:left;
            width:100%;
            background-color:rgba(40, 191, 53,0.5);
            padding:10px 30px 10px 10px;
            border-radius:15px;
        }*/
        
        #btnSendMessage:hover{
            background-color: #FE6E00;
        }

        .xqr{
            width:50% !important;
        }

        @media screen and (min-width: 356px) and (max-width: 540px) {
            .chat-list{
                margin-left: 50px;
                font-size: 12px;
            }
            .msg-header{
                height:5%;
                padding-left:10px;
                background-color: #f1f1f1;
            }
            .msg-container{
                min-height:55%;
                max-height:55%;
                overflow-y:auto;
            }
            .main-msg{
                width: 70%;
            }
            .msg-text{
                height:7%;
                background-color: #cac9c7;
                padding:12px;
            }
            .msgTextbox{
                line-height:18px;
                min-height:18px;
                font-size:10px;
                text-align:right;
                border-radius:9px;
                border:1px solid rgba(0,0,0,0.1);
                width:65%;
                margin-top: -10%;
                padding:5px 30px 5px 20px;
                margin-left:1%;
            }
            .sendMessage{
                line-height:23px;
                min-height:23px;
                text-align:center;
                border-radius:15px;
                border:1px solid rgba(0,0,0,0.1);
                width:32%;
                margin-left:1%;
            }

            .sent{
                float:right !important;
                padding:3px;
                display:block;
                width:60%;
                word-wrap: break-word;
                font-size:8px;
            }
            .received{
                float:left !important;
                padding:3px;
                display:block;
                width:60%;
                word-wrap: break-word;
                font-size:10px;
            }

        }

        @media screen and (min-width: 541px) and (max-width: 767px) {
            .chat-list{
                margin-left: 50px;
                font-size: 12px;
            }
            .msg-header{
                height:5%;
                padding-left:10px;
                background-color: #f1f1f1;
            }
            .msg-container{
                min-height:55%;
                max-height:55%;
                overflow-y:auto;
            }
            .main-msg{
                width: 70%;
            }
            .msg-text{
                height:7%;
                background-color: #cac9c7;
                padding:12px;
            }
            .msgTextbox{
                line-height:18px;
                min-height:18px;
                font-size:10px;
                text-align:right;
                border-radius:9px;
                border:1px solid rgba(0,0,0,0.1);
                width:65%;
                margin-top: -10%;
                padding:5px 30px 5px 20px;
                margin-left:1%;
            }
            .sendMessage{
                line-height:23px;
                min-height:23px;
                text-align:center;
                border-radius:15px;
                border:1px solid rgba(0,0,0,0.1);
                width:32%;
                margin-left:1%;
            }

            .sent{
                float:right !important;
                padding:3px;
                display:block;
                width:60%;
                word-wrap: break-word;
                font-size:8px;
            }
            .received{
                float:left !important;
                padding:3px;
                display:block;
                width:60%;
                word-wrap: break-word;
                font-size:10px;
            }

        }

    </style>
    <script type="text/javascript">
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

        //code in messages
        function getMsg(xID,xfullName){
            $("#fullNameHead").text(xfullName);
            getChat(xID);
            $(".msg-text").empty();
            $(".msg-text").append("<input type='hidden' id='recipientID'><input type='text' id='txtMessageBox' onkeydown='OnKeyPress(event)' class='msgTextbox'><button class='sendMessage' onclick='SendMessage()' id='btnSendMessage'><i class='fa fa-paper-plane'></i>&nbsp;&nbsp;Send</button>")
            $("#recipientID").val(xID);
            $("#txtMessageBox").focus(); 
            
            setTimeout(() => {
            var messageBody = document.querySelector('.msg-container');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;  
            }, 200);
        }

        function getChat(xID){
            $.ajax(
                {
                    type: "POST",
                    url: "chat_api/get_chat_user.php",
                    data: {'recipient_id':xID},
                    dataType:'json',
                    success:function(r){
                        //console.log(r);
                            $("#msgBox").empty();
                            $.each(r, function(i, item) {
                                //console.log(r);
                                if(xID == r[i].recipient){
                                    $("#msgBox").append("<div class='sent'style='margin-top: 20px;'><div class=''>"+r[i].datesent+"</div><div class='xtestmessage_sent'>"+r[i].textmessage+"</div></div>");
                                }
                                else{
                                    $("#msgBox").append("<div class='received'style='margin-top: 20px;'><div class=''>"+r[i].datesent+"</div><div class='xtestmessage'>"+r[i].textmessage+"</div></div>");
                                }
                            });
                        //alert(jsonData.textmessage);
                    },
                    error:function(err){
                        console.log(err);
                    }
                }
            );
        }

        function SendMessage(){
            var textmessage = $("#txtMessageBox").val();
            var xID=$("#recipientID").val();
            if(textmessage.trim() ==""){
                return;
            }
            $.ajax(
                {
                    type: "POST",
                    url: "chat_api/send_chat_user.php",
                    data: {'recipient_id':xID,'textmessage':textmessage},
                    dataType:'json',
                    success:function(r){
                        setTimeout(() => {
                        var messageBody = document.querySelector('.msg-container');
                        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;  
                        }, 200);
                        $("#txtMessageBox").val('');
                        $("#txtMessageBox").focus();
                    },
                    error:function(r){
                        console.log(r);
                    }
                });
        }

        function OnKeyPress(event){
            var target = event.target || event.srcElement;

            if (event.keyCode === 13 || event.key === 'Enter') {
                    $("#btnSendMessage").click();
                }
 
        }
 
          
        setInterval(() => {
            if($("#recipientID").val() !="" && $("#recipientID").length > 0 ){
                getChat($("#recipientID").val());
            }
        }, 100);

    </script>
    </body>
</html>