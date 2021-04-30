<html>
    <head>
        <title> Help4All :: Register </title>
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
                <h2>Register</h2>
                <p style="text-align: center;">Register as a service provider in order to provide designated services and you may also access our services.</p>
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
                
                    if(!empty($_POST['name'])){
                        $nm = mysqli_real_escape_string($dbc, trim($_POST['name']));
                    }

                    if(!empty($_POST['email'])){
                        $em = mysqli_real_escape_string($dbc, trim($_POST['email']));
                    }

                    if(!empty($_POST['uname'])){
                        $un = mysqli_real_escape_string($dbc, trim($_POST['uname']));
                    }

                    if(!empty($_POST['pswd'])){
                        $pswd = mysqli_real_escape_string($dbc, trim($_POST['pswd']));
                    }

                    $phnregex = "/^[0-9]{10}$/";
                    $phn = '';
                    if(!empty($_POST['phone'])){
                        $phn = mysqli_real_escape_string($dbc, trim($_POST['phone']));
                        if (preg_match_all($phnregex, $phn, $matches)){
                            // echo 'TRUE!';
                            
                            // echo '<pre>'.print_r($matches, 1).'</pre>';
                        } else {
                            $errors[] = 'Please enter a valid phone number';
                        }
                    }

                    $cityregex = "/^[a-zA-Z]{4,}$/";
                    $c = '';
                    if (!empty($_POST['city'])) {
                        $c = mysqli_real_escape_string($dbc, trim($_POST['city']));
                        if (preg_match_all($cityregex, $c, $matches)){
                            // echo 'TRUE!';
                            
                            // echo '<pre>'.print_r($matches, 1).'</pre>';
                        } else {
                            $errors[] = 'Please enter a valid city name';
                        }
                    }

                    if (!empty($_POST['province'])) {
                        $prov = mysqli_real_escape_string($dbc, trim($_POST['province']));
                    }

                    $pcregex = "/^[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}[0-9]{1}$/";
                    $pc = '';
                    if(!empty($_POST['postcode'])){
                        $pc = mysqli_real_escape_string($dbc, trim($_POST['postcode']));
                        if (preg_match_all($pcregex, $pc, $matches)){
                            // echo 'TRUE!';
                            
                            // echo '<pre>'.print_r($matches, 1).'</pre>';
                        } else {
                            $errors[] = 'Please enter a valid pickup postcode';
                        }
                    }

                    $addr = $c . ', ' . $prov . ', ' . $pc;

                    if (!empty($_POST['imgStatus'])) {
                        $imgStatus = mysqli_real_escape_string($dbc, trim($_POST['imgStatus']));
                    }

                    $airport = '';
                    if (!empty($_POST['airport'])) {
                        $airport = mysqli_real_escape_string($dbc, trim($_POST['airport']));
                    }

                    $ride = '';
                    if (!empty($_POST['ride'])) {
                        $ride = mysqli_real_escape_string($dbc, trim($_POST['ride']));
                    }

                    $housing = '';
                    if (!empty($_POST['housing'])) {
                        $housing = mysqli_real_escape_string($dbc, trim($_POST['housing']));
                    }

                    $job = '';
                    if (!empty($_POST['job'])) {
                        $job = mysqli_real_escape_string($dbc, trim($_POST['job']));
                    }

                    $tiffin = '';
                    if (!empty($_POST['tiffin'])) {
                        $tiffin = mysqli_real_escape_string($dbc, trim($_POST['tiffin']));
                    }

                    $driving = '';
                    if (!empty($_POST['driving'])) {
                        $driving = mysqli_real_escape_string($dbc, trim($_POST['driving']));
                    }

                    $services = array($airport, $ride, $housing, $job, $tiffin, $driving);

                    $qm = "SELECT username FROM users";
                    $rm = @mysqli_query($dbc, $qm);
                    $match = false;
                    while (($row = mysqli_fetch_array($rm, MYSQLI_ASSOC)) && !$match) {
                        if($un == $row['username']){
                            $match = true;
                            $errors[] = 'A user with username <strong>' . $un . '</strong> already exists. Please enter a different username';
                        }
                    }
                
                    if (empty($errors)) { 
                        $q = "INSERT INTO users (role, name, email, phone, address, immigrantStatus, username, password, accountStatus, timestamp) VALUES ('3', '$nm', '$em', '$phn', '$addr', '$imgStatus', '$un', '$pswd', 'confirmed', NOW())";
                        $r = @mysqli_query($dbc, $q);
                        if ($r) {
                            $q1 = "SELECT userId FROM users ORDER BY userId DESC LIMIT 1";
                            $r1 = @mysqli_query($dbc, $q1);
                            if(mysqli_num_rows($r1) == 1){
                                $row = mysqli_fetch_array($r1, MYSQLI_ASSOC);
                                $sp_userId = $row['userId'];
                                for($x = 0; $x <= 6; $x++){
                                    if(isset($services[$x]) && !empty($services[$x])){
                                        $stype = $services[$x];
                                        $q2 = "INSERT INTO user_servicetype_map (userId, serviceTypeId) VALUES ('$sp_userId', '$stype')";
                                        $r2 = @mysqli_query($dbc, $q2);
                                        if($r2){
                                            continue;
                                        }
                                    }
                                    else{
                                        continue;
                                    }
                                }
                            }
                            echo '<p style="text-align:center;"><span style="color:green">Registration successful.</span> Proceed to <a href="login.php">Login</a></p>';
                            include("includes/footer.html");
                            exit();
                        } else {
                            redirect_user('error.php');
                
                            // Debugging message:
                            // echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
                
                        } // End of if ($r) IF.
                
                        mysqli_close($dbc);
                        
                        exit();
                
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
                    <form id="contact-query-form" action="register_spUser.php" method="post">
                        <p><label>Name:</label><input type="text" name="name" size="15" maxlength="60" required></p>
                        <p><label>Email:</label><input type="email" name="email" size="15" maxlength="60" required></p>
                        <p><label>Username:</label><input type="text" name="uname" size="15" maxlength="60" required></p>
                        <p><label>Password:</label><input type="text" name="pswd" size="15" maxlength="60" required></p>
                        <p><label>Phone:</label><input type="phone" name="phone" size="15" maxlength="10"></p>
                        <p><label>City:</label><input type="text" name="city" size="15" maxlength="60"></p>
                        <p><label>Province:</label><select name="province">
                            <option value="alberta">Alberta</option>
                            <option value="bc">British Columbia</option>
                            <option value="manitoba">Manitoba</option>
                            <option value="newbrunswick">New Brunswick</option>
                            <option value="newfoundland">Newfoundland and Labrador</option>
                            <option value="nwterritories">Northwest Territories</option>
                            <option value="Nova Scotia">Nova Scotia</option>
                            <option value="nunavut">Nunavut</option>
                            <option value="ontario" selected>Ontario</option>
                            <option value="pei">Prince Edward Island</option>
                            <option value="quebec">Quebec</option>
                            <option value="saskatchewan">Saskatchewan</option>
                            <option value="yukon">Yukon</option>
                        </select></p>
                        <p><label>Postcode:</label><input type="text" name="postcode" size="15" maxlength="60"></p>
                        <p><label>Immigrant Status:</label><select name="imgStatus">
                            <option value="1" selected>Student</option>
                            <option value="2">Work Visa</option>
                            <option value="3">Spouse/Dependants</option>
                            <option value="4">Permanent Resident</option>
                            <option value="5">Citizen</option>
                            <option value="6">Other</option>
                        </select></p>
                        <p><label>Service Type:</label>
                        <input style="width:15%" type="checkbox" id="airport" name="airport" value="1">
                        <label for="airport"> Airport Pickup/Drop</label>
                        <input style="width:15%" type="checkbox" id="ride" name="ride" value="2">
                        <label for="ride"> Ride Share</label>
                        <input style="width:15%" type="checkbox" id="housing" name="housing" value="3">
                        <label for="housing"> Housing</label>
                        <input style="width:15%" type="checkbox" id="job" name="job" value="4">
                        <label for="job"> Jobs</label>
                        <input style="width:15%" type="checkbox" id="tiffin" name="tiffin" value="5">
                        <label for="tiffin"> Tiffin Service</label>
                        <input style="width:15%" type="checkbox" id="driving" name="driving" value="6">
                        <label for="driving"> Driving Instructor</label>
                        </p>
                        <p><label></label><input class="query-submit-btn" type="submit" value="Register"></p>
                    </form>
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