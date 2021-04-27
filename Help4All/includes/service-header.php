<html>
    <head>
        <title> Help4All :: Services </title>
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

        <!--Services-->

        <section id = "service-section" class = "services">
            <div class = "container">
                <div class = "section-title">
                    <h2> Services </h2>
                    <p>Explore our services</p>
                </div>
                
                <div class="service-icons">
                    <div class="service-icon-div">
                        <a id="transport" href="transport.php"><img src="assets/img/car_black_48dp.png" alt="black car icon"></a>
                    </div>

                    <div class="service-icon-div">
                        <a id="housing" href="housing.php"><img src="assets/img/house_black_48dp.png" alt="black house icon"></a>
                    </div>

                    <div class="service-icon-div">
                        <a id="tiffin" href="tiffin.php"><img src="assets/img/restaurant_black_48dp.png" alt="black spoon fork icon"></a>
                    </div>

                    <div class="service-icon-div">
                        <a id="jobs" href="jobs.php"><img src="assets/img/work_black_48dp.png" alt="black briefcase icon"></a>
                    </div>

                    <div class="service-icon-div">
                        <a id="driving" href="driving.php"><img src="assets/img/driving_black_48dp.png" alt="black car icon"></a>
                    </div>
                </div>

                <div class="icon-titles">
                    <p>Transportation</p>
                    <p>Housing</p>
                    <p>Tiffin Service</p>
                    <p>Jobs</p>
                    <p>Driving Instructor</p>
                </div>