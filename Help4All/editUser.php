<html>
    <head>
        <title> Help4All :: Edit Account </title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href= "assets/css/style.css" rel="stylesheet">
        <link href="assets/img/favicon.png" rel="icon">

        <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

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
                    <span style="margin-left:2%;margin-right:2%;">
                        <a id="nameLink" href="account.php" style="color:#ffffff;">Welcome, <?php session_start(); echo $_SESSION['name'] ?></a>
                    </span>
                    <span>
                        <a id="logoutLink" href="logout.php" style="color:#ffffff; display:<?php echo $nameDisp ?>">Logout</a>
                    </span>
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
                <h2>My Account</h2>
                <hr>
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

                $userid = $_SESSION['userId'];

                $q = "SELECT role, name, email, phone, address, immigrantStatus FROM users WHERE userId = '$userid' AND accountStatus = 'confirmed'";
                $r = @mysqli_query($dbc, $q);

                if(mysqli_num_rows($r) == 1){
                    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
                    
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $addr = $row['address'];
                    $imstatus = $row['immigrantStatus'];

                    $stdisp = "none";

                    if($row['role'] == 3){
                        $stdisp = "flex";
                        $q1 = "SELECT serviceTypeId FROM user_servicetype_map WHERE userId = '$userid'";
                        $r1 = @mysqli_query($dbc, $q1);
                        while (($row = mysqli_fetch_array($r1, MYSQLI_ASSOC))) {
                            switch($row['serviceTypeId']){
                                case 1:
                                    $airport = 1;
                                    //$s1 = "Airport Pickup/Drop,";
                                    break;
                                case 2:
                                    $ride = 2;
                                    //$s2 = "Ride Share,";
                                    break;
                                case 3:
                                    $housing = 3;
                                    //$s3 = "Housing,";
                                    break;
                                case 4:
                                    $job = 4;
                                    //$s4 = "Jobs,";
                                    break;
                                case 5:
                                    $tiffin = 5;
                                    //$s5 = "Tiffin Service,";
                                    break;
                                case 6:
                                    $driving= 6;
                                    //$s6 = "Driving Instructor";
                                    break;
                                default:
                                break;
                            }
                        }
                    }

                } else {
                    echo '<p style="text-align:center">System Error! Unable to fetch account details.</p>';
                    // Debugging message:
                    // echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
        
                } // End of if ($r) IF.

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $errors = [];

                    if(!empty($_POST['name'])){
                        $nm = mysqli_real_escape_string($dbc, trim($_POST['name']));
                    }

                    if(!empty($_POST['email'])){
                        $em = mysqli_real_escape_string($dbc, trim($_POST['email']));
                    }

                    $phnregex = "/^[0-9]{10}$/";
                    if(!empty($_POST['phone'])){
                        $phn = mysqli_real_escape_string($dbc, trim($_POST['phone']));
                        if (preg_match_all($phnregex, $phn, $matches)){
                            // echo 'TRUE!';
                            
                            // echo '<pre>'.print_r($matches, 1).'</pre>';
                        } else {
                            $errors[] = 'Please enter a valid phone number';
                        }
                    }

                    if(!empty($_POST['address'])){
                        $adrs = mysqli_real_escape_string($dbc, trim($_POST['address']));
                    }

                    if(!empty($_POST['imStatus'])){
                        $imSt = mysqli_real_escape_string($dbc, trim($_POST['imStatus']));
                    }

                    $s1 = '';
                    if (!empty($_POST['airport'])) {
                        $s1 = mysqli_real_escape_string($dbc, trim($_POST['airport']));
                    }

                    $s2 = '';
                    if (!empty($_POST['ride'])) {
                        $s2 = mysqli_real_escape_string($dbc, trim($_POST['ride']));
                    }

                    $s3 = '';
                    if (!empty($_POST['housing'])) {
                        $s3 = mysqli_real_escape_string($dbc, trim($_POST['housing']));
                    }

                    $s4 = '';
                    if (!empty($_POST['job'])) {
                        $s4 = mysqli_real_escape_string($dbc, trim($_POST['job']));
                    }

                    $s5 = '';
                    if (!empty($_POST['tiffin'])) {
                        $s5 = mysqli_real_escape_string($dbc, trim($_POST['tiffin']));
                    }

                    $s6 = '';
                    if (!empty($_POST['driving'])) {
                        $s6 = mysqli_real_escape_string($dbc, trim($_POST['driving']));
                    }

                    $services = array($s1, $s2, $s3, $s4, $s5, $s6);

                    if (empty($errors)) {
                        $qs = "DELETE FROM user_servicetype_map WHERE userId = '$userid'";
                        $rs = @mysqli_query($dbc, $qs);
                        if($rs){
                            for($x = 0; $x <= 6; $x++){
                                if(isset($services[$x]) && !empty($services[$x])){
                                    $stype = $services[$x];
                                    $q2 = "INSERT INTO user_servicetype_map (userId, serviceTypeId) VALUES ('$userid', '$stype')";
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

                        $q = "UPDATE users SET name='$nm', email='$em', phone='$phn', address = '$adrs', immigrantStatus = '$imSt' WHERE userId=$userid LIMIT 1";
			            $r = @mysqli_query($dbc, $q);
                        if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

                            // Print a message:
                            echo '<p style="text-align:center">The user has been edited.</p>';
                            include("includes/footer.html");
                            exit();
                        } 
                        else { // If it did not run OK.
                            echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
                            // echo '<p>' . mysqli_error($dbc) . '<br>Query: ' . $q . '</p>'; // Debugging message.
                        }
                    } else { // Report the errors.
                
                        echo '<h1>Error!</h1>
                        <p class="error">The following error(s) occurred:<br>';
                        foreach ($errors as $msg) { // Print each error.
                            echo " - $msg<br>\n";
                        }
                        echo '</p><p>Please try again.</p><p><br></p>';
                
                    }
                }
        
                mysqli_close($dbc);
                ?>

                <div id="contact-form-div">
                    <form id="service-query-form" action="editUser.php" method="post">
                        <p><label>Name:</label><input type="text" id="name" maxlength="60" value="<?php echo $name ?>" name="name" size="15" required></p>
                        <p><label>Email:</label><input type="email" id="email" maxlength="60" value="<?php echo $email ?>" name="email" size="15" required></p>
                        <p><label>Phone:</label><input type="text" id="phone" maxlength="10" value="<?php echo $phone ?>" name="phone" size="15"></p>
                        <p><label>Address:</label><input type="text" id="address" maxlength="140" value="<?php echo $addr ?>" name="address" size="15" required></p>
                        <p><label>Immigration Status:</label>
                            <select name="imStatus" value="<?php echo $imstatus ?>">
                            <option value="1">Student</option>
                            <option value="2">Work Visa</option>
                            <option value="3">Spouse/Dependants</option>
                            <option value="4">Permanent Resident</option>
                            <option value="5">Citizen</option>
                            <option value="6">Other</option>
                        </select></p>
                        <p style="display:<?php echo $stdisp ?>"><label>Service Type:</label>
                        <input style="width:15%" type="checkbox" id="airport" name="airport" value="1" <?php if(isset($airport)) echo "checked=\"checked\""?>>
                        <label for="airport"> Airport Pickup/Drop</label>
                        <input style="width:15%" type="checkbox" id="ride" name="ride" value="2" <?php if(isset($ride)) echo "checked=\"checked\""?>>
                        <label for="ride"> Ride Share</label>
                        <input style="width:15%" type="checkbox" id="housing" name="housing" value="3" <?php if(isset($housing)) echo "checked=\"checked\""?>>
                        <label for="housing"> Housing</label>
                        <input style="width:15%" type="checkbox" id="job" name="job" value="4" <?php if(isset($job)) echo "checked=\"checked\""?>>
                        <label for="job"> Jobs</label>
                        <input style="width:15%" type="checkbox" id="tiffin" name="tiffin" value="5" <?php if(isset($tiffin)) echo "checked=\"checked\""?>>
                        <label for="tiffin"> Tiffin Service</label>
                        <input style="width:15%" type="checkbox" id="driving" name="driving" value="6" <?php if(isset($driving)) echo "checked=\"checked\""?>>
                        <label for="driving"> Driving Instructor</label>
                        </p>
                        <p>
                            <input class="transport-submit-btn" type="submit" value="Submit">
                        </p>
                        <p>
                            <a class="transport-submit-btn" style="width:70%;" href="cancel.php"><button class="transport-submit-btn" style="border:none;background:none;color:#ffffff;margin:0;padding:0;">Cancel</button></a>
                        </p>
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