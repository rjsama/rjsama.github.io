<? # Script 13.6 - post_message.php
require 'mysqli_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
	// Connect to the database:
	//$dbc = mysqli_connect('localhost', 'username', 'password');

	// Make the query:
	$q = 'INSERT INTO guides (name, email_address, phone_number, address, city, subject,services) VALUES (/,?, ?, ?, ?, ?,?)';

	// Prepare the statement:
	$stmt = $mysqli->prepare($q);

	// Bind the variables:
	$stmt->bind_param('sssss', $user, $email, $phone, $add, $city, $subj, $serv);

	// Assign the values to variables:
	$user = strip_tags($_POST['uname']);
	$email = strip_tags($_POST['emailAddr']);
    $phone = strip_tags($_POST['phoneNum']);
    $add = strip_tags($_POST['address']);
    $city = strip_tags($_POST['city']);
    $subj = strip_tags($_POST['subject']);
    $subj = strip_tags($_POST['services']);
	// Execute the query:
	$stmt->execute();
     
	// Print a message based upon the result:
	if ($stmt->affected_rows == 1) {
		echo '<p>Successful.</p>';
	} else {
		echo '<p style="font-weight: bold; color: #C00">Not Working...Failure!</p>';
	}

	// Close the statement:
	$stmt->close();
    unset($stmt);
	// Close the connection:
	$mysqli->close();
    unset($mysqli);
} // End of submission IF.

// Display the form:
?>

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

    </head>
    <body>
        <header id = "header" class = "fixed-top header-transparent">
            <div class = "container d-flex align-items-center">
                <div class = "logo mr-auto">
                    <h1 class = "text-light"><a href = "index.html"> <span> Help4All </span> </a> </h1>
                </div>
                <nav class = "nav-menu d-none d-lg-block">
                    <ul>
                        <li> <span><a href = "index.html">Home </a></span></li>
                        <li> <a href = "#about"> About Us </a> </li>
                        <li> <a href = "#guide"> Guides </a> </li>
                        <li> <a href = "#services"> Services </a> </li>
                        <li> <a href = "#testimonials"> Testimonials</a> </li>
                        <li> <a href = "#team"> Team </a> </li>
                        <li> <a href = "#contact"> Contact Us </a> </li>
                        <li> <a href = "services_r.html"> Login </a> </li>    
                        
                    </ul>
                   
            </div>
        </header> 
        <!-- Banner Image-->
        <section id = "banner" class = "banner">
            <div class="banner-container">
                <h1> Welcome to Help4All Immigration </h1>
                <h2> We are here to help international immigrants </h2>
            </div>
        </section> <!-- End Banner-->

    <section id = "guides" class = "guides">
        <div class = "container">
            <div class = "section-title">
                <h2> Registeration for service providers </h2>
                <p></p>
            </div>
          
    <div id="guide-form-div">
        <form id="guide-query-form" action="index.html" method="post">
            <p><label>Name:</label><input type="text" name="uname" size="15" maxlength="60"></p>
            <p><label>Email:</label><input type="email" name="emailAddr" size="15" maxlength="60" required></p>
            <p><label>Phone:</label><input type="phone" name="phoneNum" size="15" maxlength="10"></p>
            <p><label>Address:</label><input type="text" name="address" size="15" maxlength="60"></p>
            <p><label>City:</label><input type="text" name="city" size="15" maxlength="60" required></p>
            <p><label>Province:</label><select name="province">
                <option value="alberta" selected>Alberta</option>
                <option value="bc">British Columbia</option>
                <option value="manitoba">Manitoba</option>
                <option value="newbrunswick">New Brunswick</option>
                <option value="newfoundland">Newfoundland and Labrador</option>
                <option value="nwterritories">Northwest Territories</option>
                <option value="Nova Scotia">Nova Scotia</option>
                <option value="nunavut">Nunavut</option>
                <option value="ontario">Ontario</option>
                <option value="pei">Prince Edward Island</option>
                <option value="quebec">Quebec</option>
                <option value="saskatchewan">Saskatchewan</option>
                <option value="yukon">Yukon</option>
            </select></p>
            <p><label>Immigrant Status:</label><select name="subject">
                <option value="student" selected>Student</option>
                <option value="wp">Work Visa</option>
                <option value="sd">Spouse/Dependants</option>
                <option value="pr">Permanent Residency</option>
                <option value="citizen">Citizenship</option>
                <option value="other">Other</option>
            </select></p>
            <p><label>Select Services:</label><select name = "services">
            <input type = "checkbox" id = "s1" name = "s1" value = "airportpickup/rideshare">
            <label for="s1"> Airport Pickup / Ride Share</label><br>
            <input type = "checkbox" id = "s2" name = "s2" value = "housing">
            <label for="s2"> Housing </label><br>
            <input type = "checkbox" id = "s3" name = "s3" value = "tifinservices">
            <label for="s3"> Tifin Services </label><br>
            <input type = "checkbox" id = "s4" name = "s4" value = "job">
            <label for="s4"> Job </label><br>
            <input type = "checkbox" id = "s5" name = "s5" value = "drivinginstructor">
            <label for="s5"> Driving Instructor </label><br></p>
            <p><label></label><input class="query-submit-btn" type="submit" value="Send"></p>
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
              <li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="guides.html">Guides</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">A</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">B</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">C</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">D</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">E</a></li>
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

</html>