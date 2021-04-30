<html>
    <head>
        <title> Help4All :: Guides </title>
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
  <style>
      .accordion {
        background-color: #257aa3;
        color: #ffffff;
        text-align: center !important;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }
  
    .active, .accordion:hover {
        background-color: #005072;
        transition: 0.4s;
    }
    
    .panel {
        padding: 5px 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
  </style>
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

        <!--Guides-->

        <section id = "guides" class = "guides">
            <div class = "container">
                <div class = "section-title">
                    <h2> Guides </h2>
                    <p>Below information will help you start your life in Canada and also answer some of your questions</p>
                </div>
                <!--SIM-->
                <button class="accordion">SIM Card</button>
                <div class="panel">
                    <p>Check whether your current mobile phone will work in the country you want to visit on following websites -</p>
                    <ul>
                        <li><a href="https://willmyphonework.net/" target="_blank">Will My Phone Work</a></li>
                        <li><a href="https://www.frequencycheck.com/" target="_blank">Frequency Check</a></li>
                        <li><a href="https://www.cellphones.ca/cell-plans/p/phone-compatibility-10088/" target="_blank">Cellphones.ca</a></li>
                    </ul>
                    <p>Also, get information on different carriers in Canada and other countries on these websites.<br>You can get a sim card using your <b><i>Study/Work Permit</i></b> and <b><i>Passport</i></b>.<br>
                    These are some of the popular mobile phone operators in Canada -
                    </p>
                    <ul>
                        <li>Rogers</li>
                        <li>Bell</li>
                        <li>Telus</li>
                        <li>Fido</li>
                        <li>Koodo</li>
                        <li>Chatr</li>
                        <li>Virgin Mobile</li>
                    </ul>
                </div>

                <!--SIN-->
                <button class="accordion">SIN (Social Insurance Number)</button>
                <div class="panel">
                    <p>After landing in Canada, if you want to take up any kind of job the primary requirement is having a Social Insurance Number also called SIN. You can visit your nearby Service Canada centre or visit the following website to apply online and receive further information</p>
                    <a href="https://www.canada.ca/en/employment-social-development/services/sin/apply.html" target="_blank">How to apply for Social Insurance Number</a>
                </div>

                <!--Drivers Licence-->
                <button class="accordion">Driver's Licence</button>
                <div class="panel">
                    <p>In Canada, for driving a car there are primarily 3 classes of licence G1, G2 and G. You need to atleast have a valid G2 class driver’s licence in order to drive a car.</p>
                    <ul>
                        <li>G1 – Written Test</li>
                        <li>G2 (Probationary Licence) – Road Test</li>
                        <li>G (Full Licence) – Road Test</li>
                    </ul>
                    <p>Having a G class driver’s licence allows you to drive a cab or drive a vehicle for commercial purposes like deliveries, etc.</p>
                    <p>You can get further information here -
                    <a href="https://www.canada.ca/en/immigration-refugees-citizenship/services/new-immigrants/new-life-canada/driving.html" target="_blank">How to apply for a Driver's Licence</a></p>
                </div>

                <!--Other Licence-->
                <button class="accordion">Other Licence</button>
                <div class="panel">
                    <p>There are other types of licence which can help you get a good job in Canada. These are namely -</p>
                    <ul>
                        <li>Forklift Operator licence</li>
                        <li>Security Guard Licence</li>
                    </ul>
                    <a href="https://www.ontario.ca/page/security-guard-or-private-investigator-licence-individuals" target="_blank">How to apply for a Security Guard Licence</a>
                </div>

                <!--Essential Items-->
                <button class="accordion">Essential Items</button>
                <div class="panel">
                    <p>For buying groceries and other daily use items at affordable rates you can visit the following stores -</p>
                    <ul>
                        <li>No Frills</li>
                        <li>Food Basic</li>
                        <li>Dollarama</li>
                        <li>Dollar Store</li>
                    </ul>
                    <p>There are also a number of stores where you can buy items native to your country.<br>For example, in Brampton, Ontario there are 2 famous stores -  <b><i>The Indian Punjabi Bazaar</i></b> and <b><i>Subzi Mandi</i></b>. They are the hotspots for Indian shoppers.
                    </p>
                </div>

                <!--Study Permit-->
                <button class="accordion">Study Permit</button>
                <div class="panel">
                    <p>When your flight lands in Canada, you will be given your study permit at the airport itself. The officials will check your documents and give you the study permit which will allow you to study and do part-time work in Canada according to your VISA restrictions. These are the general scenarios - </p>
                    <ul>
                        <li>You are allowed to work for 20 hours on and off your college campus</li>
                        <li>You are allowed to work for 20 hours only on the college campus</li>
                        <li>You are not allowed to work anywhere until you complete your studies and get a work permit. This is a rare case.</li>
                    </ul>
                    <p>If you have any questions, you can ask the officials at the airport.</p>
                </div>

                <!--Work Permit-->
                <button class="accordion">Work Permit</button>
                <div class="panel">
                    <p>When your flight lands in Canada, you will be given your work permit at the airport itself. These are the general scenarios - </p>
                    <ul>
                        <li>You are allowed to work full-time in a particular region of Canada</li>
                        <li>You are allowed to work full-time anywhere in Canada</li>
                    </ul>
                    <p>If you have any questions, you can ask the officials at the airport.</p>
                </div>

                <!--Visa and Permit Extension-->
                <button class="accordion">Visa and Permit Extension</button>
                <div class="panel">
                    <p>If you are a visitor, student or worker in Canada and your VISA is about to expire you can visit the following websites and get the information on how to extend your VISA or permit.</p>
                    <ul>
                        <li><a href="https://www.canada.ca/en/immigration-refugees-citizenship/services/visit-canada/extend-stay.html" target="_blank">Extend your stay in Canada</a></li>
                        <li><a href="https://www.canada.ca/en/immigration-refugees-citizenship/services/application/application-forms-guides/guide-5551-applying-change-conditions-extend-your-stay-canada.html" target="_blank">Guide 5551 - Applying to Change Conditions or Extend Your Stay in Canada - online application</a></li>
                    </ul>
                    <p>Because of COVID-19, the Canadian government has given special provisions to immigrants to that they can preserve their status in Canada and extend their permit/VISA accordingly. For more information, visit the following website -</p>
                    <a href="https://www.canada.ca/en/immigration-refugees-citizenship/services/application/application-forms-guides/guide-5551-applying-change-conditions-extend-your-stay-canada.html" target="_blank">Guide 5551 - Applying to Change Conditions or Extend Your Stay in Canada - online application</a>
                </div>

                <!--Income Tax-->
                <button class="accordion">Income Tax</button>
                <div class="panel">
                    <p>For information on Income Tax filling in Canada, visit the following websites - </p>
                    <ul>
                        <li><a href="https://www.canada.ca/en/services/taxes/income-tax/personal-income-tax/get-ready-taxes.html" target="_blank">Steps to get ready for taxes</a></li>
                        <li><a href="https://www.canada.ca/en/services/taxes/income-tax/personal-income-tax.html" target="_blank">Personal Income Tax</a></li>
                    </ul>
                    <p>For steps to file the Income Tax -
                    <a href="https://www.canada.ca/en/services/taxes/income-tax/personal-income-tax/doing-your-taxes.html" target="_blank">Steps to file a tax return</a></p>
                    <p>Deadlines - 
                    <a href="https://www.canada.ca/en/revenue-agency/campaigns/covid-19-update/covid-19-filing-payment-dates.html" target="_blank">Income tax filing and payment deadlines</a></p>
                </div>

                <!--Safety-->
                <button class="accordion">Safety and Security</button>
                <div class="panel">
                    <p>In case of any emergency, you can call 911 and tell the operator about your problem. Help will be sent immediately to your location.</p>
                    <p>Students can pay for their basic medical expenses through the health insurance provided by their college. In any case they don’t have one, they can talk to their respective college authorities on how to get one.</p>
                    <p>Other immigrants need to get a health insurance by themselves (if not provided by their employer) and health card after landing in Canada.</p>
                    <p>More information on Health Card -
                        <a href="https://www.canada.ca/en/health-canada/services/health-cards.html" target="_blank">Health Cards</a>
                    </p>
                    <p>Information on Health Insurance - <a href="https://www.ontario.ca/page/apply-ohip-and-get-health-card" target="_blank">Apply for OHIP and get a health card</a></p>
                </div>

                <div style="padding-top:20px">
                    <p style="text-align: center;">If you have any further questions regarding the topics mentioned above or any other topic, you may <strong><a href="contactus.php">Contact Us</a></strong></p>
                    
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
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
            }
            </script>
    </body>

</html>