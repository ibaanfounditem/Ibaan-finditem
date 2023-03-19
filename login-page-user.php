<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Lost-Item Finder System in Ibaan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">    
    </script>
    <link rel="stylesheet" href="page.css">
</head>
<body>
    <div class="container" id="container" style="width: 100%;">
        <div class="header" id="header">
            <img src="./images/ibaan.png" width="100%" height= "55%";/>
        </div>

        <div class="topnav">
            <a href="index.php" style="float:right">Back</a>
        </div>
        
        <div class="offer_section layout_padding-bottom">
            <div class="offer_container">
                <div class="container" id="detail-box" style="padding: 30px 20% 30px 20%;">
                    <!-- log in form -->
                    <div class="col-md justify-content-center">
                        <div class="box">
                            <div class="detail-box vh-40" style = "margin: 10px 20px;">
                                <div class="vh-100 gradient-custom">
                                    <div class="container py-8 h-100">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="col-12 col-md-12 col-lg-10 col-xl-12">
                                                <div class="card bg-light text-black">
                                                    <div class="card-body p-8">
                                                        <div class="mb-md-4 mt-md-4 pb-4">
                                                            <h2 class="fw-bold mb-4 text-center">Log in</h2>
                                                            <hr class="mb-2 ">
                                                            <form action="login-page-user.php" method="POST">

                                                                    <?php
                                                                    
                                                                    if($errors > 0){
                                                                        foreach($errors AS $displayErrors){
                                                                        ?>
                                                                        <div id="alert" style="height: auto;
                                                                                    width: 100%;
                                                                                    background: #ec9006;
                                                                                    padding: 0 15px;
                                                                                    font-size: 19px;
                                                                                    line-height: 40px;
                                                                                    margin: 10px 0;
                                                                                    color: #000;
                                                                                    border-radius: 4px;"><?php echo $displayErrors; ?></div>
                                                                        <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                    <div class="form-outline form-white mb-2">
                                                                        <label for="email">Email</label>
                                                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email..." required />
                                                                        
                                                                    </div>

                                                                    <div class="form-outline form-white mb-4">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" id="pass" class="form-control form-control-lg" name="password" placeholder="Enter your password..." required/>
                                                                        
                                                                    </div>

                                                                    <input style="margin-top: 3px; margin-bottom:25px; margin-right: 12px;" type="checkbox" onclick="myFunction()">Show Password

                                                                    <p class="small mb-4 pb-lg-2 text-center" ><a class="text-orange-500" style="color: orange;" href="forgot.php">Forgot password?</a></p>

                                                                    <button class="sign-btn" type="submit" name="login">Login</button>
                                                                </form>
                                                            </div>
                                                            <div>
                                                                <p class="mb-8 text-center" style="margin-top: -10%;">Don't have an account? <a href="user_register.php" class="text-orange-500 fw-bold" style="color: orange;">Sign Up</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    @media screen and (min-width: 481px) and (max-width: 640px){
        .container {
            padding: 0;
            width: 100%;
        }
        .form-outline{
            width: 80%;
        }
        .container .box{
            width: 334px;
            margin-left: -93px;
            
        }
    }
    @media screen and (max-width: 900px){
        .container .box{
            width: 334px;
            margin-left: -93px;
        }
    }
</style>
</body>

<script>

    // these code are for show password
    function myFunction() {
      var x = document.getElementById("pass");
      
      if (x.type === "password") {
        x.type = "text";
        
      } else {
        x.type = "password";
        
      }
    }

</script>
</html>
