<html>
    <head>
        <title> Help4All :: Forgot Password </title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href= "assets/css/style.css" rel="stylesheet">
        <link href="assets/img/favicon.png" rel="icon">

        <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZB1H2VWDGK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZB1H2VWDGK');
</script>
    </head>
    
    <body>
        <header id = "header" class = "fixed-top header-transparent">
            <div class = "container d-flex align-items-center">
                <div class = "logo mr-auto">
                    <h1 class = "text-light"><a href = "index.php"> <span> Help4All </span> </a> </h1>
                </div>
                <nav class = "nav-menu d-none d-lg-block">
                    <ul>
                        <li> <span><a href = "index.php">Home </a></span></li>
                        <li> <a href = "aboutus.php"> About Us </a> </li>
                        <li> <a href = "guides.php"> Guides </a> </li>
                        <li> <a href = "services.php"> Services </a> </li>
                        <li> <a href = "contactus.php"> Contact Us </a> </li>
                    </ul>
                    </nav>
                    <span style="margin-left:2%;margin-right:2%;"><a id="loginLink" href="login.php" style="color:#ffffff;">Login/Signup</a></span>
            </div>
        </header> 
        <!-- Banner Image-->
        <section id = "banner" class = "banner">
            <div class="banner-container">
                <h1> Welcome to Help4All Immigration </h1>
                <h2> We are here to help international immigrants </h2>
            </div>
        </section> <!-- End Banner-->

        <!--Guides-->

        <section id = "contactform" class = "contactform">
            <div class = "container">
                <div class = "section-title">
                <h2>Reset Password</h2>
                <p style="text-align: center;">Enter username or registered email to reset your password</p>
                </div>

                <?php
                require 'mysqli_connect.php';
                function redirect_user($page = 'index.php'){
                    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                    $url = rtrim($url, '/\\');
                    $url .= '/'.$page;
                    header("Location: $url");
                    exit();
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $errors = [];
                
                    if(empty($_POST['uname']) && empty($_POST['email'])){
                        $errors[] = 'Please enter either username or email';
                    }

                    if(!empty($_POST['uname'])){
                        $un = mysqli_real_escape_string($dbc, trim($_POST['uname']));
                    }

                    if(!empty($_POST['email'])){
                        $em = mysqli_real_escape_string($dbc, trim($_POST['email']));
                    }

                    if(!empty($_POST['pswd'])){
                        $pswd = mysqli_real_escape_string($dbc, trim($_POST['pswd']));
                    }

                    if(!empty($_POST['cpswd'])){
                        $cpswd = mysqli_real_escape_string($dbc, trim($_POST['cpswd']));
                    }

                    if($_POST['pswd'] != $_POST['cpswd']){
                        $errors[] = 'Your password does not match with the confirm password';
                    }
                
                    if (empty($errors)) { 
                        if(isset($un)){
                            $q = "UPDATE users SET password='$pswd' WHERE username = '$un' LIMIT 1";
                        }
                        else{
                            $q = "UPDATE users SET password='$pswd' WHERE email = '$em' LIMIT 1"; 
                        }
                        
			            $r = @mysqli_query($dbc, $q);
                        if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

                            // Print a message:
                            echo '<p style="text-align:center">Your password reset has been done successfully. Proceed to <a href="login.php">Login</a></p>';
                            include("includes/footer.html");
                            exit();
                        }
                        else { // If it did not run OK.
                            echo '<p class="error">Password reset failed. Please check your username/email or try again later.</p>'; // Public message.
                            // echo '<p>' . mysqli_error($dbc) . '<br>Query: ' . $q . '</p>'; // Debugging message.
                        }
                
                    } else { // Report the errors.
                
                        echo '<h1>Error!</h1>
                        <p class="error">The following error(s) occurred:<br>';
                        foreach ($errors as $msg) { // Print each error.
                            echo " - $msg<br>\n";
                        }
                        echo '</p><p>Please try again.</p><p><br></p>';
                
                    } // End of if (empty($errors)) IF.
                
                    mysqli_close($dbc);
                
                }
                ?>

                <div id="contact-form-div">
                    <form id="contact-query-form" action="forgotPswd.php" method="post">
                        <p><label>Username:</label><input type="text" name="uname" size="15" maxlength="60"></p>
                        <p><label>Email:</label><input type="email" name="email" size="15" maxlength="60"></p>
                        <p><label>Password:</label><input type="password" name="pswd" size="15" maxlength="60" required></p>
                        <p><label>Confirm Password:</label><input type="password" name="cpswd" size="15" maxlength="60" required></p>
                        <p><label></label><input class="query-submit-btn" type="submit" value="Reset Password"></p>
                    </form>
                    <p style="text-align:center"><a href="forgotPswd.php">Forgot Password</a></p>
                </div>
            </div>
        </section>

    <!-- Contact -->
    <section id = "contact" class = "contact section-bg">
        <div class = "container">
            <div class = "section-title">
                <h2> Contact </h2>
                <p> Please get in touch and our experts will answer all your questions. </p>
            </div>
            <div>
            
            <div class = "row">
                <div class="col-lg-6">
                    <div class = "info-box mb-4">
                        <i class = "bx bx-map"></i>
                        <h3> Our Address </h3>
                        <p> 280 Thaler Avenue, Kitchener, N2A1R6 </p>
                    </div>
                </div>
                <div class = "col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                    <i class = "bx bx-envelope"></i>
                    <h3> Email Us </h3>
                    <p> contact@example.com </p>
                    </div>
                </div>
                <div class = "col-lg-3 col-md-6">
                    <div class = "info-box mb-4">
                        <i class = "bx bx-phone-call"></i>
                        <h3> Call Us </h3>
                        <p> +1 5197223398 </p>
                    </div>
                </div>
            </div>
            <div class = "row">
            
                <div class = "col-lg-12">
                <iframe class = "mb-4 mg-lg-0" src="https://www.google.com/maps/embed/v1/place?q=280+thaler+avenue&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-8 col-md-8">
            <div class="footer-info" data-aos="fade-up" data-aos-delay="50">
              <h3>Help4All</h3>
              <p class="pb-3"><em>We are here to help international immigrants.</em></p>
              <p>
                280 Thaler Avenue <br>
                Kitchener, N2A1R6, Canada<br><br>
                <strong>Phone:</strong> +1 5197223398<br>
                <strong>Email:</strong> contact@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links" >
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="aboutus.php">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="guides.php">Guides</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.php">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contactus.php">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="transport.php">Transportation</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="housing.php">Housing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="startsoon.php">Tiffin Service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="startsoon.php">Jobs</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="startsoon.php">Driving Instructor</a></li>
            </ul>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; 2021 <strong><span>Help4All</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

        <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>

</html>