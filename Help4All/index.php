<html>
    <head>
        <title> Help4All </title>
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
        <section id = "about" class="about">
            <div class="container">
                <div class="row no-gutters">
                    <div class="content col-xl-5 d-flex align-items-stretch">
                        <div class="content">
                            <h3> 25 Years of experience </h3>
                            <p>
                                 Canada is one of the most progressive country in which everyone has their own dreams for new career and rich life style. We are here to guide you.
                            </p>
                            <a href="services.php" class="about-btn">Our Services <i class = "bx bx-chevron-right"></i></a>
                        </div> 
                    </div>
                    <div class = "col-xl-7 d-flex align-items-stretch">
                        <div class = "icon-boxes d-flex-column justify-content-center">
                            <div class = "row">
                                <div class = "col-md-6 icon-box">
                                    <i class = "bx bx-receipt"></i>
                                    <h4> Our Vision </h4>
                                    <p> Our goal is to become an essential consultancy for citizenship, education, career and professional development services that people turn to. Supporting individuals to Moving forward in life. </p>
                                    </div>
                                    <div class = "col-md-6 icon-box">
                                        <i class = "bx bx-receipt"></i>
                                        <h4> Our Mission </h4>
                                        <p> Our aim is to efficiently and competently open the door of possibilities for all people who want to create a better life for themselves by creating employment and business opportunities in Canada.</div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </section> 
                                   
        <!-- Testimonials Section-->
        <section id = "testimonials" class= "testimonials section-bg">
            <div class = "container">
                <div class = "section-title"> 
                    <h2> Testimonials </h2>
                </div>
            <div class = "owl-carousel testimonials-carousel">
                <div class = "testimonial-item">
                    <p>
                        <i class = "bx bxs-quote-alt-right quote-icon-left"></i>
                        Help4All immigration is one of the best consulting services. The Staff members are very helpful.
                        <i class = "bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>  
                    <img src = "assets/img/testimonials/testimonials-1.jpg" class = "testimonial-img" alt="">
                    <h3> Raj Patel </h3>
                </div> 
                <div class = "testimonial-item">
                    <p>
                        <i class = "bx bxs-quote-alt-right quote-icon-left"></i>
                        Help4All immigration is one of the best consulting services. The Staff members are very helpful.
                        <i class = "bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>  
                    <img src = "assets/img/testimonials/testimonials-2.jpg" class = "testimonial-img" alt="">
                    <h3> Raj Patel </h3>
                </div> 
                <div class = "testimonial-item">
                    <p>
                        <i class = "bx bxs-quote-alt-right quote-icon-left"></i>
                        Help4All immigration is one of the best consulting services. The Staff members are very helpful.
                        <i class = "bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>  
                    <img src = "assets/img/testimonials/testimonials-3.jpg" class = "testimonial-img" alt="">
                    <h3> Raj Patel </h3>
                </div>   
            </div>
            </div>
        </section>

        <!--Team-->

        <section id = "team" class = "team">
            <div class = "container">
                <div class = "section-title">
                    <h2> Team </h2>
                    <p></p>
                </div>
                <div class = "row">
                <div class="col-lg-4 col-md-6">
                    <div class= "member">
                        <div class= "pic"><img src = "assets/img/team/team1.jpg" class="img-fluid" alt="Jay Shah" style="border: 2px solid #000000"></div>
                    <div class="member-info">
                        <h4> Jay Shah </h4>
                        <span> Owner </span>
                        <div class = "social">
                            <a target="_blank" href = "https://www.facebook.com/jay.shah.501151"> <i class = "icofont-facebook"></i></a>
                            <a target="_blank" href = "https://www.linkedin.com/in/shah-jay-600929143/"> <i class = "icofont-linkedin"></i></a>
                        </div>
                    </div>
                     </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class= "member">
                        <div class= "pic"><img src = "assets/img/team/team2.jpeg" class="img-fluid" alt="Rajat" style="border: 2px solid #000000"></div>
                    <div class="member-info">
                        <h4> Rajat Mahajan </h4>
                        <span> Owner </span>
                        <div class = "social">
                            <a target="_blank" href = "https://www.facebook.com/rajat.mahajan.5209"> <i class = "icofont-facebook"></i></a>
                            <a target="_blank" href = "https://www.linkedin.com/in/rajat-mahajan-720709157/"> <i class = "icofont-linkedin"></i></a>
                        </div>
                    </div>
                     </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class= "member">
                        <div class= "pic"><img src = "assets/img/team/team3.jpeg" class="img-fluid" alt="Harpreet"></div>
                    <div class="member-info">
                        <h4> Harpreet Kaur Kingra  </h4>
                        <span> Owner </span>
                        <div class = "social">
                            <a target="_blank" href = "https://www.facebook.com/hap.kingra"> <i class = "icofont-facebook"></i></a>
                            <a target="_blank" href = "https://www.linkedin.com/in/harpreet-kingra-batth-hap-997485a8/"> <i class = "icofont-linkedin"></i></a>
                        </div>
                    </div>
                     </div>
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