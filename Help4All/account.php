<html>
    <head>
        <title> Help4All :: My Account </title>
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

                $q = "SELECT u.userId, u.role, u.name, u.email, u.phone, u.address, ims.statusType FROM users u INNER JOIN immigrationstatus ims on u.immigrantStatus = ims.statusId WHERE userId = '$userid' AND accountStatus = 'confirmed'";
                $r = @mysqli_query($dbc, $q);

                if(mysqli_num_rows($r) == 1){
                    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
                    
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $addr = $row['address'];
                    $imstatus = $row['statusType'];
                    $sp_userId = $row['userId'];

                    $serviceTypes = [];
                    $stdisp = "none";
                    $s1 = '';
                    $s2 = '';
                    $s3 = '';
                    $s4 = '';
                    $s5 = '';
                    $s6 = '';

                    if($row['role'] == 3){
                        $stdisp = "";
                        $q1 = "SELECT serviceTypeId FROM user_servicetype_map WHERE userId = '$sp_userId'";
                        $r1 = @mysqli_query($dbc, $q1);
                        while (($row = mysqli_fetch_array($r1, MYSQLI_ASSOC))) {
                            switch($row['serviceTypeId']){
                                case 1:
                                    $airport = 1;
                                    $s1 = "Airport Pickup/Drop,";
                                    break;
                                case 2:
                                    $ride = 2;
                                    $s2 = "Ride Share,";
                                    break;
                                case 3:
                                    $housing = 3;
                                    $s3 = "Housing,";
                                    break;
                                case 4:
                                    $job = 4;
                                    $s4 = "Jobs,";
                                    break;
                                case 5:
                                    $tiffin = 5;
                                    $s5 = "Tiffin Service,";
                                    break;
                                case 6:
                                    $driving= 6;
                                    $s6 = "Driving Instructor";
                                    break;
                                default:
                                break;
                            }
                        }

                        $stypes = $s1.$s2.$s3.$s4.$s5.$s6;
                    }

                    

                } else {
                    echo '<p style="text-align:center">System Error! Unable to fetch account details.</p>';
                    // Debugging message:
                    // echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
        
                } // End of if ($r) IF.
        
                mysqli_close($dbc);
                ?>

                <div id="contact-form-div">
                    <table style="font-size:1.2em; margin:auto">
                        <tr>
                            <td style="width:60%">Name:</td><td><?php echo $name ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td><td><?php echo $email ?></td>
                        </tr>
                        <tr>
                            <td>Phone:</td><td><?php echo $phone ?></td>
                        </tr>
                        <tr>
                            <td>Address:</td><td><?php echo $addr ?></td>
                        </tr>
                        <tr>
                            <td>Immigrant Status:</td><td><?php echo $imstatus ?></td>
                        </tr>
                        <tr style="display:<?php echo $stdisp ?>">
                            <td>Service Types:</td><td><?php echo $stypes ?></td>
                        </tr>
                    </table>
                    <div style="width:100%;display:flex;justify-content:center;align-items:center;margin-top:2%">
                        <a href="editUser.php" style="text-decoration:none;color:#ffffff;"><button class="btn btn-primary" style="display:flex;padding:0.5rem 2rem">Edit</button></a>
                        <span style="margin-left:2%;display:<?php echo $stdisp ?>">
                            <a href="managelistings.php" style="text-decoration:none;color:#ffffff"><button class="btn btn-primary" style="display:flex;padding:0.5rem 2rem">Manage Listings</button></a>
                        </span>
                        <span style="margin-left:2%;display:<?php echo $stdisp ?>">
                            <a href="viewRequests.php" style="text-decoration:none;color:#ffffff"><button class="btn btn-primary" style="display:flex;padding:0.5rem 2rem">View User Requests</button></a>
                        </span>
                        <span style="margin-left:2%">
                            <a href="viewReqByUser.php" style="text-decoration:none;color:#ffffff"><button class="btn btn-primary" style="display:flex;padding:0.5rem 2rem">View My Requests</button></a>
                        </span>
                    </div>
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
                <li><i class="bx bx-chevron-right"></i> <a href="#">Tiffin Service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Jobs</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Driving Instructor</a></li>
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