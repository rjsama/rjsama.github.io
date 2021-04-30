<html>
    <head>
        <title> Help4All :: Manage Listings </title>
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
                <h2>My Listings</h2>
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

                $s_userId = $_SESSION['userId'];
                $tcount = 0;

                $q = "SELECT s.serviceName, tl.tlistingid, tl.serviceType, tl.baseCharge, tl.chargePerKM, tl.status, tl.luggage, tl.description, tl.userId from transport_listing tl inner join services s on tl.serviceType = s.serviceId where tl.status = 'confirmed' AND tl.userId = '$s_userId' ";
                $r = @mysqli_query($dbc, $q);

                echo '<h3 style="font-weight: bold;position: relative;color: #2f4d5a;z-index: 2;text-align:center;">Transportation</h3>';

                echo '<table width="100%" style="margin-top: 1%; margin-bottom: 2%">
                <tbody>
                ';

                $bg = '#eeeeee';

                while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    $tcount += 1;
                    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
                    echo '<tr><td style="padding-top:1%"></td><td></td></tr>
                    <tr bgcolor="' . $bg . '"><td></td><td></td></tr><tr>
                    <td style="padding-top:1%"></td><td></td></tr><tr>
                    <td width="20%">Service Type:</td><td align="left">' . $row['serviceName'] . '</td></tr><tr>
                    <td>Base Charge:</td><td align="left">$' . $row['baseCharge'] . '</td></tr><tr>
                    <td>Charge Per KM:</td><td align="left">$' . $row['chargePerKM'] . '</td></tr><tr>
                    <td>Luggage Capacity:</td><td align="left">' . $row['luggage'] . '</td></tr><tr>
                    <td>Description:</td><td align="left">' . $row['description'] . '</td></tr><tr>
                    </tr>
                    ';
                    // <td align="left" style="padding-top:2%"><a href="housing_request.php?hid=' . $row['tlistingid'] . '" style="text-decoration:none; color:#ffffff"><button class="btn btn-primary">Send Request</button></a></td><td></td>
                    // </tr>
                    // ';
                }

                echo '</tbody></table>';
                mysqli_free_result($r);

                if($tcount == 0){
                    echo '<p style="text-align:center">No Transport Listings published yet</p>';
                }

                $hcount = 0;

                $q = "SELECT hlistingid, type, leaseOption, rent, rooms, occupancyPerRoom, parking, utilities, description, status, userId, quarantineRooms, address, postCode, washrooms, moveinDate FROM housing_listing where status = 'confirmed' AND userId = '$s_userId'";
                $r = @mysqli_query($dbc, $q);

                echo '<h3 style="font-weight: bold;position: relative;color: #2f4d5a;z-index: 2;text-align:center;margin-top:3%">Housing</h3>';
                echo '<table width="100%" style="margin-top: 1%; margin-bottom: 2%">
                <tbody>
                ';

                $bg = '#eeeeee';
                while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    $hcount += 1;
                    $highlight = "";
                    if($row['quarantineRooms'] == "Available"){
                        $highlight = "font-weight:bold";
                    }
                    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
                    echo '<tr><td style="padding-top:1%"></td><td></td></tr>
                    <tr bgcolor="' . $bg . '"><td></td><td></td></tr><tr>
                    <td style="padding-top:1%"></td><td></td></tr><tr>
                    <td width="20%">Accomodation Type:</td><td align="left">' . $row['type'] . '</td></tr><tr>
                    <td>Address:</td><td align="left">' . $row['address'] . ', ' . $row['postCode'] . '</td></tr><tr>
                    <td>Rent:</td><td align="left">$' . $row['rent'] . '</td></tr><tr>
                    <td>Move-in Date:</td><td align="left">' . $row['moveinDate'] . '</td></tr><tr>
                    <td>Lease:</td><td align="left">' . $row['leaseOption'] . '</td></tr><tr>
                    <td>Rooms:</td><td align="left">' . $row['rooms'] . '</td></tr><tr>
                    <td>Occupancy per Room:</td><td align="left">' . $row['occupancyPerRoom'] . '</td></tr><tr>
                    <td style="'. $highlight .'">Quarantine Rooms:</td><td align="left" style="' . $highlight . '">' . $row['quarantineRooms'] . '</td></tr><tr>
                    <td>Washrooms:</td><td align="left">' . $row['washrooms'] . '</td></tr><tr>
                    <td>Parking:</td><td align="left">' . $row['parking'] . '</td></tr><tr>
                    <td>Utilities:</td><td align="left">' . $row['utilities'] . '</td></tr><tr>
                    <td>Description:</td><td align="left">' . $row['description'] . '</td></tr><tr>
                    </tr>
                    ';
                    // <td align="left" style="padding-top:2%"><a href="housing_request.php?hid=' . $row['hlistingid'] . '" style="text-decoration:none; color:#ffffff"><button class="btn btn-primary">Send Request</button></a></td><td></td>
                    // </tr>
                    // ';
                } // End of WHILE loop.

                echo '</tbody></table>';
                mysqli_free_result($r);

                if($hcount == 0){
                    echo '<p style="text-align:center;margin-bottom:4%">No Housing Listings published yet</p>';
                }

                mysqli_close($dbc);

                ?>

                <div id="contact-form-div">
                    <div class = "section-title">
                        <h2>Add Listings</h2>
                    </div>
                    <p style="text-align:center"><a class="query-submit-btn" href="transportListing.php"><button style="background:none;border:none; color:#ffffff;width:70%">Transportation</button></a></p><br>
                    <!-- <p style="text-align:center"><a class="query-submit-btn" href="transportListing.php"><button style="background:none;border:none;color:#ffffff;width:70%">Ride Share</button></a></p><br> -->
                    <p style="text-align:center"><a class="query-submit-btn" href="housingListing.php"><button style="background:none;border:none;color:#ffffff;width:70%">Housing</button></a></p>
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