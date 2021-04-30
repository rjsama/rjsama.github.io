<html>
    <head>
        <title> Help4All :: Housing Listing </title>
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
                <span style="display: inline-block; background: #000000; padding: 6px 20px 8px 20px; color: #FFFFFF; border-radius: 50px; position: relative;"><a href="services.php" class="about-btn">Our Services <i class = "bx bx-chevron-right"></i></a></span>
            </div>
        </section> <!-- End Banner-->

        <!--Guides-->

        <section id = "contactform" class = "contactform">
            <div class = "container">
                <div class = "section-title">
                <h2>Add Listing</h2>
                <p style="text-align: center;">Create a new housing listing here</p>
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
                
                    if(!empty($_POST['htype'])){
                        $htype = mysqli_real_escape_string($dbc, trim($_POST['htype']));
                    }

                    if(!empty($_POST['lease'])){
                        $lease = mysqli_real_escape_string($dbc, trim($_POST['lease']));
                    }

                    if(!empty($_POST['rent'])){
                        $rent = mysqli_real_escape_string($dbc, trim($_POST['rent']));
                    }

                    if(!empty($_POST['moveDate'])){
                        $moveDate = mysqli_real_escape_string($dbc, trim($_POST['moveDate']));
                    }

                    if(!empty($_POST['addr'])){
                        $addr = mysqli_real_escape_string($dbc, trim($_POST['addr']));
                    }

                    $pcregex = "/^[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}[0-9]{1}$/";
                    if(!empty($_POST['pc'])){
                        $pc = mysqli_real_escape_string($dbc, trim($_POST['pc']));
                        if (preg_match_all($pcregex, $pc, $matches)){
                            // echo 'TRUE!';
                            
                            // echo '<pre>'.print_r($matches, 1).'</pre>';
                        } else {
                            $errors[] = 'Please enter a valid pickup postcode';
                        }
                    }

                    if(!empty($_POST['rooms'])){
                        $rooms = mysqli_real_escape_string($dbc, trim($_POST['rooms']));
                    }

                    if(!empty($_POST['washroom'])){
                        $washroom = mysqli_real_escape_string($dbc, trim($_POST['washroom']));
                    }

                    if(!empty($_POST['occu'])){
                        $occu = mysqli_real_escape_string($dbc, trim($_POST['occu']));
                    }

                    if(!empty($_POST['parking'])){
                        $parking = mysqli_real_escape_string($dbc, trim($_POST['parking']));
                    }

                    if(!empty($_POST['qroom'])){
                        $qroom = mysqli_real_escape_string($dbc, trim($_POST['qroom']));
                    }

                    if(!empty($_POST['utilities'])){
                        $utilities = mysqli_real_escape_string($dbc, trim($_POST['utilities']));
                    }

                    if(!empty($_POST['desc'])){
                        $desc = mysqli_real_escape_string($dbc, trim($_POST['desc']));
                    }

                    $s_userId = $_SESSION['userId'];
                
                    if (empty($errors)) { 
                        $q = "INSERT INTO transport_listing (serviceType, type, leaseOption, rent, rooms, washrooms, occupancyPerRoom, parking, utilities, description, userId, quarantineRooms, address, postCode, moveinDate, timestamp) VALUES ('3', '$htype', '$lease', '$rent', '$rooms', '$washroom', '$occu', '$parking', '$utilities', '$desc', '$s_userId', '$qroom', '$addr', '$pc', '$moveDate', NOW() )";
                        $r = @mysqli_query($dbc, $q);
                        if ($r) { 
                            echo '<p style="text-align:center">Listing created successfully.</p>';
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
                    <form id="contact-query-form" action="housingListing.php" method="post">
                        <p><label>Type:</label><input type="text" id="htype" name="htype" size="15" required></p>
                        <p><label>Lease Option:</label><select name="lease"><option value="Yearly">Yearly</option><option value="Monthly">Monthly</option></select></p>
                        <p><label>Rent:</label><input type="text" id="rent" name="rent" size="15" required></p>
                        <p><label>Move-in Date:</label><input type="date" id="moveDate" name="moveDate" required></p>
                        <p><label>Address:</label><input type="text" id="addr" name="addr" size="15" maxlength="150" required></p>
                        <p><label>Postcode:</label><input type="text" id="pc" name="pc" size="15" maxlength="6" placeholder="x1xy2y" required></p>
                        <p><label>Rooms:</label><input type="number" id="rooms" name="rooms" size="15" min="1" max="30" required></p>
                        <p><label>Washrooms:</label><input type="number" id="washroom" name="washroom" size="15" min="1" max="30" required></p>
                        <p><label>Occupancy Per Room:</label><input type="number" id="occu" name="occu" size="15" min="1" max="30" required></p>
                        <p><label>Parking:</label><input type="number" id="parking" name="parking" size="15" min="0" max="10" required></p>
                        <p><label>Quarantine Rooms:</label><select name="qroom"><option value="Available">Available</option><option value="Not Available" selected>Not Available</option></select></p>
                        <p><label>Utilties:</label><input type="text" id="utilities" name="utilities" size="15" maxlength="150" required></p>
                        <p><label>Description:</label><textarea id="desc" name="desc" rows="7" cols="60" maxlength="250"></textarea></p>
                        <p><label></label><input class="query-submit-btn" type="submit" value="Create Listing"></p>
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
        <script>
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10){
            dd='0'+dd
            } 
            if(mm<10){
            mm='0'+mm
            } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("moveDate").setAttribute("min", today);
        </script>
    </body>

</html>