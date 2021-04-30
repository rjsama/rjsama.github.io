<html>
    <head>
        <title> Help4All :: About Us </title>
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
                    <?php
                    session_start();
                    $loginDisp = "flex";
                    $nameDisp = "none";
                    if(isset($_SESSION['userId'])){
                        $loginDisp = "none";
                        $nameDisp = "flex";
                    }
                    ?>
                    <span style="margin-left:2%;margin-right:2%;">
                        <a id="loginLink" href="login.php" style="color:#ffffff; display:<?php echo $loginDisp ?>">Login/Signup</a>
                        <a id="nameLink" href="account.php" style="color:#ffffff; display:<?php echo $nameDisp ?>">Welcome, <?php echo $_SESSION['name'] ?></a>
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
        
        <!--About-->
        <section id = "aboutus" class="aboutus">
            <div class="container">
                <div class = "section-title">
                    <h2> About Us </h2>
                </div>
                <p> We are dedicated to help international students and other immigrants who arrive in Ontario, Canada every year for higher studies and work. Through this website they will be able to avail essential services and information from the comfort of their home so that their journey in Canada can begin smoothly. </p>
                <p><strong>Purpose:</strong></p>
                <ul>
                    <li>Provide assistance mainly to international students and other immigrants in general matters of interest</li>
                    <li>Provide necessary information and services</li>
                    <li>Provide viable help in a feasible and efficient manner</li>
                    <li>Provide assistance to immigrants who are facing problems due to the COVID-19 pandemic</li>
                </ul>
                <p><strong>Services:</strong></p>
                <ul>
                    <li>Booking airport pickup/drop on arrival/departure respectively to various locations across Ontario, Canada.</li>
                    <li>Assistance for temporary and permanent housing needs</li>
                    <li>Assistance for availing tiffin services</li>
                    <li>Assistance for job search</li>
                    <li>Assistance for availing training for Drivers Licence test</li>
                    <li>Assistance for booking flight tickets</li>
                    <li>and much more...</li>
                </ul>
                <p><strong>Guides:</strong></p>
                <ul>
                    <li>How to get Canadian SIM card and mobile phone as per requirement</li>
                    <li>How to apply for Social Insurance Number(SIN)</li>
                    <li>How to apply for Driving Licence</li>
                    <li>How to apply for various licences required for in demand jobs like forklift operator and security guard</li>
                    <li>Where to buy essential items of daily use like food (both local and native), clothing, footwear and stationery</li>
                    <li>How to apply for work permit or extend study permit</li>
                    <li>How to apply for income tax</li>
                    <li>and much more...</li>
                </ul>
                <p><strong>Benefits:</strong></p>
                <ul>
                    <li>For new arrivals:
                        <ul>
                            <li>One stop for all necessary services and information in order to get a smooth start to life in Ontario, Canada</li>
                            <li>Avoid being misguided on important matters by getting assistance from experienced professionals</li>
                            <li>Avoid being misguided on important matters by getting assistance from experienced professionals</li>
                        </ul>
                    </li>
                    <li>For the ones already living in Canada:
                        <ul>
                            <li>Get assistance in extending study and work permits</li>
                            <li>Get assistance in booking flight tickets without the risk of getting scammed</li>
                            <li>Get assistance for Job search and related matters</li>
                        </ul>
                    </li>
                    <li>For the ones suffering due to COVID-19:
                        <ul>
                            <li>Get assistance for job search and related matters in case of having being laid off</li>
                            <li>Get information on relief provided by the government</li>
                        </ul>
                    </li>
                    <li>For the government:
                        <ul>
                            <li>Information will reach further and penetrate more deeply into the masses</li>
                            <li>Will help build an even better image of the government among immigrants if they get to know about various government policies</li>
                        </ul>
                    </li>
                    <li>For the society:
                        <ul>
                            <li>Immigrants will be able to settle better in the society without much hassle to self or others</li>
                            <li>People will get livelihood opportunities as we act as a bridge between the service providers and service seekers</li>
                            <li>Help strengthen the bond in the community by providing ways and means to build better understanding among immigrants and residents</li>
                        </ul>
                    </li>
                </ul>
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
                <li><i class="bx bx-chevron-right"></i> <a href="housing.html">Housing</a></li>
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