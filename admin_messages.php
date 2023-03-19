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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
        <script src="js/jquery-3.3.1.js"></script>
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
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
                <a href="admin_messages.php" class="msg-nav-child --msg-active"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                <a href="admin_verified.php" class="msg-nav-child"><img src="./images/verified.png" width="18" height="18" style="margin-right: 3px;">Verified</a>
                <a href="admin_archives.php" class="msg-nav-child"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Archives</a>
                <a href="matched_item.php" class="msg-nav-child"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Matched</a>
                <a href="unmatched_item.php" class="msg-nav-child"><img src="./images/archives-icon.png" width="18" height="18" style="margin-right: 3px;">Not-Matched</a>
            </div>
        </div>
    
        <main>
            <section class="forms-input">
                <div class="output-container" id="realtime">
                <?php

                    include 'connect_db.php';
                    $admin_id = $_SESSION['admin_id'];

                    //echo" Connected to database ";
                    //showing data from tb_messages
                    $result=$conn->query("SELECT * FROM vwchat WHERE  sender_id='$admin_id'") or die("Error");
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
                                $chatlist = $conn->query("SELECT DISTINCT CASE WHEN vwchat.sender_id = $admin_id THEN vwchat.recipient ELSE vwchat.sender_id END as user_rowstamp, CONCAT(t1.fname,' ', t1.lname) fullname FROM vwchat INNER JOIN tb_residentsacc t1 ON vwchat.recipient = t1.accountID where recipient = $admin_id or sender_id=$admin_id");
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
                                    <label id="fName"><?php echo $xLists['fullname']; ?></label>
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
            
            padding: 10px 20px 10px 10px;
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
            padding-right: 10px;
        }

        .main-msg{
            width:60%;
            display: inline-block;
            position:fixed;
            height:95%;
            border-left:1px solid #dddddd;
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
            height:10%;
            background-color: #cac9c7;
            padding:8px;
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

        .xqr{
            width:50% !important;
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
            padding:10px 10px 10px 17px;
            border-radius:12px;
        }
        .xtestmessage_sent{
            float:right !important;
            text-align:left;
            display:inline-block;
            background-color: #ec9006bc;
            padding:10px 30px 10px 10px;
            border-radius:15px;
        }
        #btnSendMessage:hover{
            background-color: #FE6E00;
        }
        @media screen and (min-width: 900px) {
            article {
                padding: 1rem 3rem;
            }
        }

    </style>
    <script type="text/javascript">
        
        


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
                    url: "chat_api/get_chat.php",
                    data: {'recipient_id':xID},
                    dataType:'json',
                    success:function(r){
                        //console.log(r);
                            $("#msgBox").empty();
                            $.each(r, function(i, item) {
                                //console.log(r);
                                if(xID == r[i].recipient){
                                    $("#msgBox").append("<div class='sent' style='margin-top: 20px;'><div class=''>"+r[i].datesent+"</div><div class='xtestmessage_sent'>"+r[i].textmessage+"</div></div>");
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
                    url: "chat_api/send_chat.php",
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