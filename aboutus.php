<?php 

	session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
	unset($_SESSION['username']);
	session_write_close();
	}

		  if (isset($_SESSION['admin'])) {
  		header('location: admin.php');
		session_write_close();
  }


?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" , initial-scale="1" />
    <title>About Us</title>
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="aboutus.css" type="text/css" />
    <link rel="stylesheet" href="backtotop.css" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

    <script src="backtotop.js"></script>

    <button onclick="backtotop()" id="back-to-top" title="Back to top"><img src="img/peach6.png" alt="Peach logo" class="logo" /></button>

    <header>
        <img src="img/peach6.png" alt="Peach logo" class="logo" />
        <h1>Peach's Diner</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>
                    <div class="dropdown-aboutus">
                        <a href="aboutus.php">
                            About Us<i class="fa fa-caret-down fa-about-us"></i>
                        </a>
                        <div class="dropdown-content-aboutus">
                            <a href="aboutus.php#our-history">Our History</a>
                            <a href="aboutus.php#vision-mission">Vision & Mission</a>
                            <a href="aboutus.php#location">Location</a>
                            <a href="aboutus.php#contact-us">Contact Us</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown-menu">
                        <a href="menu.php">
                            Menu<i class="fa fa-caret-down fa-menu"></i>
                        </a>
                        <div class="dropdown-content-menu">
                            <a href="breakfastnew.php">Breakfast</a>
                            <a href="lunchnew.php">Lunch</a>
                            <a href="dinnernew.php">Dinner</a>
                            <a href="drinksnew.php">Drinks</a>
                        </div>
                    </div>
                </li>
                <li><a href="reservations.php">Reservations</a></li>
                <li><a href="ourchefs.php">Our Chefs</a></li>
                <li>
                    <div class="dropdown-login">
						<?php  if (isset($_SESSION['username'])) { ?>
							<?php echo "<a href='user.php'>" . $_SESSION['username'] . "</a>"; ?><i class="fa fa-caret-down"></i>
                            <?php } else { ?>
							<?php echo "<a href='login.php'>Login</a>"; ?><i class="fa fa-caret-down"></i>
							<?php } ?>
                        <div class="dropdown-content-login">
						<?php  if (isset($_SESSION['username'])) { ?>
							<?php echo "<a href='?logout='1'' name='logout' style='margin-left:.5em;'>" . "Log out" . "</a>"; ?>
                            <?php } else { ?>
							<?php echo "<a href='register.php'>Register</a>"; ?>
							<?php } ?>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <section class="aboutus-hero">
        <div class="container">
            <h1 class="aboutus-title">Who we are</h1>
            <p>We’re here to serve you the best food at Peach's Diner in Serdang Raya, Seri Kembangan.<span>Peach's Diner is open daily from 8 a.m. to 10 p.m.</span></p>
            <a href="#our-history" class="button button-accent button-our-history">Our History</a>
            <a href="#vision-mission" class="button button-accent button-vision-mission">Vision & Mission</a>
        </div>
    </section>

    <section class="aboutus-our-history" id="our-history">
        <div class="aboutus-our-history-textbox">
            <h2>Our History</h2>
            <p style="font-weight: 600">
                When founder Sir Peach and Hoh Kok Young joined forces in 1999, 
				their modest café soon made friends and gained favour amongst the theatre community, and Peach's Diner was born. 
				Subsequent redevelopments over the years have evolved the dining room as we know it today, a space closely resembling the grand 
				restaurant created by the original duo back in their heyday.
            </p>
        </div>
    </section>

    <section class="aboutus-vision" id="vision-mission">
        <div class="aboutus-vision-textbox">
            <h2>Vision</h2>
            <p>
                Our founders, Sir Peach and Hoh Kok Young, had an idea to create a restaurant that was more than a place that served great food. 
				They wanted to give locals a place where they'd always feel at home. A place where they could get no-nonsense food at down-to-earth 
				prices, and where they'd be treated right by people who had a passion to serve.    
            </p>
        </div>
    </section>

    <section class="aboutus-mission">
        <div class="aboutus-mission-textbox">
            <h2>Mission</h2>
            <p style="font-weight: 600">
                Peach's Diner is in business to create the restaurant needed to allow our customers access to the majority of their 
				away-from-home daily meal requirements on a one-stop-shop basis. All our products shall be of the highest quality and 
				shall be delivered consistently and measured one satisfied customer at a time in clean, fun and friendly neighborhood environments.
            </p>
        </div>
    </section>

    <section class="aboutus-location" id="location">
        <div class="aboutus-location-textbox">
            <h2>Location</h2>
            <p>
                A1-6 Blok A Jalan SR 3/6 Serdang Raya, 43300 Seri Kembangan, Selangor
            </p>
            <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Jalan%20SR%203%2F6%2C%20Taman%20Serdang%20Raya%2C%20Seri%20Kembangan%2C%20Selangor+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" allowfullscreen class="our-map"></iframe>
        </div>
    </section>

    <section class="aboutus-contact-us" id="contact-us">
        <div class="aboutus-contact-us-textbox">
            <h2>Contact Us</h2>
            <p>Call Us</p>
            <a href="tel:+60123429017" class="button button-accent button-call-us">Peach &#40;012&#45;342 9617&#41;</a>
            <p>Email Us</p>
            <a href="mailto:kelvinhoh1520@hotmail.com" class="button button-accent button-email-us">kelvinhoh1520@hotmail.com</a>
        </div>
    </section>

    <footer>

        <div class="container">
            <div class="col-1">
                <ul class="unstyled-list">
                    <li><a href="https://plus.google.com/" target="_blank"><i class="fab fa-google-plus-square"></i></i></a></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="col-2">
                <ul class="unstyled-list">
                    <li><a href="index.php" class="link link-accent">Home</a></li>
                    <li><a href="aboutus.php" class="link link-accent">About Us</a></li>
                    <li><a href="menu.php" class="link link-accent">Menu</a></li>
                    <li><a href="reservations.php" class="link link-accent">Reservations</a></li>
                    <li><a href="ourchefs.php" class="link link-accent">Our Chefs</a></li>
					<?php  if (isset($_SESSION['username'])) { ?>
					<?php echo "<li><a href='user.php' class='link link-accent'>" . $_SESSION['username'] . "</a></li>"; ?>
					<?php } else { ?>
                    <?php echo "<li><a href='login.php' class='link link-accent'>Login</a></li>"; ?>
					<?php } ?>
                </ul>
            </div>

            <div class="col-3">
                <ul class="unstyled-list">
                    <img src="img/peach6.png" alt="Peach logo" class="logo" />
                    <li><span class="column-3-logo">Peach's Diner</span></li>
                    <li><span class="column-3-address">A1-6 Blok A Jalan SR 3/6 Serdang Raya, 43300 Seri Kembangan, Selangor</span></li>
                </ul>
            </div>
        </div>

    </footer>


</body>
</html>