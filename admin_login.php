<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Lost-Item Finder System in Ibaan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link rel="icon" href="./images/logo.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="index.css" rel="stylesheet">
  <link href="assets/css/page.css" rel="stylesheet">

</head>

<body>
  
  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Lost Item Finder<span>.</span></h1>
      </a>
      

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero" style="height: 880px;">
    <img src="./images/kultura.jpg" style="width: 100%;
                                             position: absolute;
                                             top: 0px;">

    <!-- Sign in -->
      <div class="container position-relative" style="left: 58%;">
      <div>
        <div class="col-lg-4 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start" 
                style="margin-right: 15%;
                        margin-top: 38px;
                        border-radius: 5px;
                        height: 520px;">
            <div class="text-white" style="background-color: rgba(0, 0, 0, 0.592); padding-left: 28px; height: 75%; padding-top: 15px;">
                <div class="card-body p-12">
                    <div class="mb-md-12 mt-md-12 pb-12">
                        <h4 style="text-align: center; padding-right: 25px;">Please log in to your account!</h4>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <form action="admin_signin.php" method="POST">
                                <?php
                                    $remarks = isset($_GET['remark_login']) ? $_GET['remark_login'] : '';
                                    if ($remarks=='failed') {
                                        echo ' <div style="height: auto;
                                                    width: 100%;
                                                    background: #ec9006;
                                                    padding: 0 15px;
                                                    font-size: 19px;
                                                    line-height: 40px;
                                                    margin: 10px 0;
                                                    color: #000;
                                                    border-radius: 4px;"> Incorrect email or password</div> ';
                                    }
                                ?>

                                <div class="form-outline form-white" style="width: 318px; margin-bottom:15px;">
                                    <label for="email">Email</label>
                                    <input type="email" id="typeEmailX" class="form-control form-control-sm" id="email" name="admin_email" placeholder="Enter your email..." required />
                                    
                                </div>

                                <div class="form-outline form-white" style="width: 318px; margin-bottom:15px;">
                                    <label for="password">Password</label>
                                    <input type="password" id="pass" class="form-control form-control-sm" name="admin_password" placeholder="Enter your password..." required/>
                                    
                                </div>

                                <input style="margin-top: 3px; margin-bottom:25px; margin-right: 12px;" type="checkbox" onclick="myFunction()">Show Password

                                <p class="small mb-4 pb-lg-2 text-center" ><a class="text-white-500" style="color: white;" href="forgot.php">Forgot password?</a></p>

                                <button class="sign-btn" type="submit" name="login">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- End of sign in section -->
  </section>
  <!-- End Hero Section -->

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


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