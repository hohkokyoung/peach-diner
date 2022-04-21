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
    <title>Peach's Diner</title>
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="backtotop.css" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
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

    <section class="home-hero">
        <div class="container">
            <h1 class="title">Delicacies at its <span>finest</span>.</h1>
            <a href="reservations.php" class="button button-accent button-reserve">Reserve</a>
        </div>
    </section>

    <section class="home-aboutus">
        <div class="home-aboutus-textbox">
            <h2>Who we are</h2>
            <p >
                Located in Serdang Raya, Seri Kembangan, Peach's Diner is an inviting 30 seat restaurant owned and operated by accomplished Chef Gordon Ramsay, Chef Jamie Oliver and Chef Raymond Blanc.
				Peach's Diner offers exceptional gourmet American Cuisine with an Italian flair - served in a warm atmosphere where the emphasis is on comfort, taste and above all, relaxation and enjoyment.
				At Peach's Diner, we turn the ordinary into the extraordinary every day. So, stop in for a romantic dinner, relaxing lunch, or after work gathering at our cozy, sit-down bar...make everyday life a little more special at Peach's Diner! 
            </p>
        </div>
    </section>

    <section class="home-menu">
        <h1>Menu</h1>
        <figure class="menu-item">
            <img src="img/breakfast-yum.png" alt="breakfast" />
            <figcaption class="menu-desc">
                <p>Breakfast</p>
                <a href="breakfastnew.php" class="button button-accent button-small">Yum~</a>
            </figcaption>
        </figure>

        <figure class="menu-item">
            <img src="img/lunch-yum.png" alt="lunch" />
            <figcaption class="menu-desc">
                <p>Lunch</p>
                <a href="lunchnew.php" class="button button-accent button-small">Yum~</a>
            </figcaption>
        </figure>

        <figure class="menu-item">
            <img src="img/dinner-yum.png" alt="dinner" />
            <figcaption class="menu-desc">
                <p>Dinner</p>
                <a href="dinnernew.php" class="button button-accent button-small">Yum~</a>
            </figcaption>
        </figure>
    </section>

    <section class="home-register">
        <div class="container">
            <h1 class="title title-register"><span>Register & Reserve Now!</span></h1>
            <a href="register.php" class="button button-register">Register</a>
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