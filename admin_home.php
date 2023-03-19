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
        <link rel="stylesheet" href="responsive.css">
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
                    <a href="admin_home.php" class="nav-link  active"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                    <a href="admin_itemRecord.php" class="nav-link"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                    <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                    <a href="admin_reports.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Reports</a>
                    <a href="admin_accounts.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                    <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
                </div>
        </nav>
        <main>
            <section class="forms-home">
                <div class="announcement">
                    <h3 style="text-align: center; font-weight: 600;">Announcement</h3>
                    <div class="announce-feed">
                        <div class="announce-form">
                            <form action="code_announce.php" method="POST" enctype="multipart/form-data">
                                <div class="a-form-one">
                                    <input type="text" name="subject" placeholder="Subject" style="width: 87%; font-size: 1rem; margin-top: 10px; border: 5px;">
                                </div>
                                <div class="a-form-two">
                                    <textarea name="caption" style="font: .8rem 'Poppins', Helvetica, sans-serif;" id="description" cols="53" rows="3" placeholder="Write Something..."></textarea>
                                </div>
                                <div class="a-form-three">
                                    <input class="post-button button-submit" type="submit" name="Submit" value="Post">
                                </div>
                            </form>
                        </div>
                        <!--Php code for announcement-->
                        <?php
                            ini_set('display_errors', 1);
                            //error_reporting(E_ALL & ~E_NOTICE);
                            Error_reporting(0);
                            
                            include 'connect_db.php';

                            //showing data from tb_iteminfo to the system
                            $query = "SELECT * FROM tb_announcement Order By timedate DESC" or die("Error");
                            $result = mysqli_query($conn, $query);
                            //if table has no data
                            if (mysqli_num_rows($result) == 0) {
                                echo "<div class='nodata'>
                                        <img src='./images/nodata.png' width='120px' height='120px'>
                                        <p>No Post</p>
                                    </div>";
                            }
                            while($row=mysqli_fetch_assoc($result))         
                            {
                        ?>
                        <div class='post-result'>
                            <div class="post-result-child">
                                <p class="post-one"><span style='color:#ff6f3c; font-size: 20px; font-weight:700; margin-right: 20px;'><?php echo $row['subject']; ?></span> <span style='color:#000000; font-size: 12px; font-weight:500; margin-right: 20px;'><?php echo $row['timedate']; ?></span></p>
                                <p class="post-two"><span style='color:#000000; font-size: 16px; font-weight:500; margin-right: 20px;'><?php echo $row['caption']; ?></span></p>
                            </div>
                            <div class="post-result-child-two">
                                <!--<a style="color:#006400; margin-top:4px; font-size:12px" href='edit_announcement.php?id="//php echo $row['id'];"'>Edit</a>-->
                                <a style="color: #ec9006; margin-top:4px; font-size:12px" onClick='delAnnounce' href='delete_announcement.php?id="<?php echo $row['announceId']; ?>"'>Delete</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="bc-vmc">
                    <div class="vmc">
                        <h3>Ibaan Mission</h3>
                        <p style="text-align: justify;">"Ibaan is a highly competitive local government unit that shall be known for pioneering innovative programs that improve the quality of life of the constituents through; <br>
                        1. Pursuit of excellence in the local government system. <br>
                        2. Responsiveness to the pressing needs of the Municipality and embedding a strong sense of foresight in all the programs that shall be implemented.<br>
                        3. Uplifting the pride and wellbeing of the individuals and societies deserve.<br>
                        4. Adherence to the mandates of the national government."</p>
                    </div>
                    <div class="vmc">
                        <h3>Ibaan Vision</h3>
                        <p>"To be a First-Class Municipality by 2030"</p>
                    </div>
                </div>
                
            </section>
        </main>
        <script>
            //small devices navigation
            function myNav() {
                document.getElementById("navigation").style.display = "block";
                }
            function closeNav() {
                document.getElementById("navigation").style.display = "none";
                }
            //for slideshow part
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}    
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 5000); // Change image every 2 seconds
            }

            function delAnnounce(){
            if(confirm("Delete this post?")){
                window.location.href='admin_home.php'
                setInterval(function(){
                    alert("Delete Successfully!");}, 3000)
                return true;
            } 
        }
        </script>
    </body>
</html>