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
            <a href="index.php" style="float:right">Home</a>
        </div>

        <div class="reg-form" id="container">
            <form action="user_register.php" method="POST">
                <div class="card mx-8 mx-md-8 shadow-5-strong" style="
                        height: 100%;
                        margin-top: 2px;
                        background: hsla(0, 0%, 100%, 0.8);
                        backdrop-filter: blur(30px);
                        ">
                    <div class="card-body py-5 px-md-8">

                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <h2 class="fw-bold mb-5" style=" text-align: center;">Sign up</h2>
                                <hr class="mb-2">

                                <?php
                                header("Access-Control-Allow-Origin: *");
                                
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
                                    <!-- first and last name -->
                                    <div class="row">
                                        <div>    
                                            <input class="input big" type="hidden" id= "accountId" name="accountId" disabled required/>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="firstname">First name</label>
                                                <input type="text" class="form-control" id= "fname" name="fname" placeholder="Enter first name" required/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="lastname">Last name</label>
                                                <input type="text" id="lname" class="form-control" name="lname" placeholder="Enter last name" required />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="contact">Contact number</label>
                                                <input class="form-control" type="text" id= "contact" name="contact" placeholder="Enter contact number" required >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- contact and address -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="address">House no./Street/Barangay/City/Municality</label>
                                                <input type="text" id="address" class="form-control" name="address" placeholder="Enter address" required />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="gender">Gender</label>
                                                <select  class="form-control" name="gender" id="gender"  required>
                                                    <option value="<?php echo $gender ?>">Select Gender</option>
                                                    <option value="Male"> Male </option>
                                                    <option value="Female"> Female </option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="email">Email address</label>
                                                <input class="form-control" type="email" id= "email" name="email" placeholder="Enter email" required>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="password">Password</label>
                                                <input class="form-control" type="password" id= "pass" name="password" placeholder="Enter password" required>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="cpassword">Confirm Password</label>
                                                <input class="form-control" type="password" id= "cpass" name="confirmPassword" placeholder="Confirm your password" required>
                                                
                                            </div>

                                            <input style="margin-top: 22px; margin-bottom:25px;" type="checkbox" onclick="myFunction()">Show Password
                                            <!-- policies 
                                            <div class="password-policies">
                                                <div class="policy-length">
                                                    8 characters
                                                </div>
                                                <div class="policy-number">
                                                    contains number
                                                </div>
                                                <div class="policy-uppercase">
                                                    contains uppercase
                                                </div>
                                                <div class="policy-special">
                                                    contains special characters
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <!-- Submit button -->
                                    <button class="sign-btn btn-primary btn-block mb-8" type="submit" name="signup"> Sign up </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script>

    
    //code for policies
    _id("pass").addEventListener("focus",function(){
        _class("password-policies")[0].classList.add("active");
    });
    _id("pass").addEventListener("blur",function(){
        _class("password-policies")[0].classList.remove("active");
    });
    _id("pass").addEventListener("keyup",function(){
        let pass = _id("pass").value;

        if(/[A-Z]/.test(pass)){
            _class("policy-uppercase")[0].classList.add("active");
        } else{
            _class("policy-uppercase")[0].classList.remove("active");
        }

        if(/[0-9]/.test(pass)){
            _class("policy-number")[0].classList.add("active");
        } else{
            _class("policy-number")[0].classList.remove("active");
        }

        if(/[^A-Za-z0-9]/.test(pass)){
            _class("policy-special")[0].classList.add("active");
        } else{
            _class("policy-special")[0].classList.remove("active");
        }

        if(pass.length > 7){
            _class("policy-length")[0].classList.add("active");
        } else{
            _class("policy-length")[0].classList.remove("active");
        }

    });

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

</script>
</html>
