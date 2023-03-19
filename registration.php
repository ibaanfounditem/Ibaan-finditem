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
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#founditem">Found Item</a></li>
          <li><a href="#announcement">Announcement</a></li>
          <li><a href="#hero">Sign up</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero" style="height: 100%;">
    <img src="./images/kultura.jpg" style="width: 100%;
                                             position: absolute;
                                             top: 0px;
                                             height: auto;">

    <!-- Sign up Section -->
    <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col">
                    <div class="card card-registration my-4" style="background-color: rgba(0, 0, 0, 0.592);">
                        <div class="row g-0">
                            <div class="col-lg">
                                <div class="card-body p-md-5 text-white" >
                                    <h3 class="mb-5 text-uppercase">Sign up form</h3>
                                    <form action="registration.php" method="POST">

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
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                <input type="text" id="form3Example1m" name="fname" class="form-control form-control-sm" />
                                                <label class="form-label" for="form3Example1m">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                <input type="text" id="form3Example1n" name="lname" class="form-control form-control-sm" />
                                                <label class="form-label" for="form3Example1n">Last name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                <input type="text" id="form3Example1m1" name="contact" class="form-control form-control-sm" />
                                                <label class="form-label" for="form3Example1m1">Contact Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                <input type="text" id="form3Example1n1" name="address" class="form-control form-control-sm" />
                                                <label class="form-label" for="form3Example1n1">House no./Street/Barangay/City/Municality</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <select  class="form-control form-control-sm" name="gender" id="gender"  required>
                                                        <option value="<?php echo $gender ?>">Select Gender</option>
                                                        <option value="Male"> Male </option>
                                                        <option value="Female"> Female </option>
                                                    </select>
                                                    <label class="form-label" for="form3Example1m1">Gender</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                <input type="email" id= "email" name="email" class="form-control form-control-sm" />
                                                <label class="form-label" for="form3Example1n1">Email Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                <input type="password" id= "pass" name="password" class="form-control form-control-sm" />
                                                <label class="form-label" for="form3Example1m1">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                <input type="password" id= "cpass" name="confirmPassword" class="form-control form-control-sm" />
                                                <label class="form-label" for="form3Example1n1">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <button class="sign-btn btn-primary btn-block mb-8" type="submit" name="signup"> Sign up </button>

                                        <div style="margin-top: 74px; font-weight: 700">
                                            <p class="mb-8 text-center" style="margin-top: -6%;">Already have an account? <a href="index.php" class="text-orange-500 fw-bold" style="color: orange;">Sign in</a>
                                        </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    <!-- end of sign up -->
  </section>
  <!-- End Hero Section -->


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

  <style>
        /*found item*/
        .found-class {
            width: 100%;
            margin-bottom: 10px;
            background-color: wheat;
            box-shadow:  1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
            border-radius: 12px;
        }
        .found-title,
        .announce-title {
            color: #ec9006; 
            margin-top: 0px; 
            text-align: center; 
            padding-top: 10px;
            font-size: 20px;
        }
        .item-list {
            align-content: center;
            padding: 10px 25px;
            height: 425px;
            overflow-y: scroll;
        }
        .item-list::-webkit-scrollbar {
            display: none;
          }
        .item-container {
            background: #ddd;
            width: 100%;
            border-radius: 8px;
            position: relative;
            padding: 10px;
            margin-bottom: 10px;
        }
        .main-title {
            padding: 5px;
            line-height: 1.4rem;
        }
        .title-one {
            padding-right: 21px;
        }
        .title {
            padding-right: 5px;
        }
        /* end of css for item list */

        /*Announcement*/
        .announce-class {
            top: -20%;
            width: 100%;
            min-height: 100%;
            margin-bottom: 30px;
            box-shadow:  1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
            border-radius: 12px;
        }
        .items {
            align-content: center;
            padding: 10px 25px;
            height: 425px;
            overflow-y: scroll;
        }
        .items::-webkit-scrollbar {
            display: none;
          }
        .post-result {
            width: 100%;
            padding: 0px;
            background: #f7d27cb9;
            margin-bottom: 15px;
        }
        .post-result-child {
            padding: 10px;
            line-height: 0.7cm;
        }
        /* end of css for anouncement */

        .guide-images{
            width: 100%;
            height: 480px;
            margin-bottom: 10px;
            border-radius: 30px;
            border: 1px solid var(--color-grayish);
            box-shadow:  1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
        }
        /* Slideshow container */
        .slideshow-container {
            padding-top: 20px;
            width: 900px;
            position: relative;
            margin: auto;
            margin-top: 5px;
            z-index: 1;
            }

        /* Caption text */
        .text {
            border-radius: 0 0 13px 13px;
            font-weight: 900;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            top: 448px;
            width: 100%;
            text-align: center;
            }

        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
        background-color: orange;
        }

        /* Caption text */
        .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
        background-color: #717171;
        }

        /* Fading animation */
        .fade {
        animation-name: fade;
        animation-duration: 1000s;
        }

        @keyframes fade {
        from {opacity: 4}
        to {opacity: 4}
        }
        @media screen and (min-width: 585px) and (max-width: 640px) {
            .fade{
                max-width: 460px;
                padding-left: 30px;
            }
            .fade .text{
                width: 50%;
                top:322px;
            }
        }
  </style>

</body>
<script>

    // these code are for show password
    function myFunction() {
      var x = document.getElementById("pass");
      var y = document.getElementById("cpass");
      if ((x.type === "password") && (y.type === "password")) {
        x.type = "text";
        y.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
      }
    }

    //for slideshow part
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        }
    
</script>
</html>