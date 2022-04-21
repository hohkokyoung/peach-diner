<?php 

	session_start(); 

	if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	}

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
    <title>Our Chefs</title>
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="backtotop.css" type="text/css" />
    <link rel="stylesheet" href="ourchefs.css" type="text/css" />
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

    <section class="ourchefs-hero">
        <div class="card-chefs1">
            <div class="chefs1-front">
                <img src="img/chefs1.jpeg" />
                <h2>Gordon Ramsay</h2>
            </div>
            <div class="chefs1-back">
                <div class="chefs1-back-details">
                    <h2>Gordon Ramsay</h2>
                    <p>Gordon James Ramsay Jr. is a talented British chef. In July 2006, Ramsay won the Catey award for "Independent Restaurateur of the Year", becoming only the third person to have won three Catey awards.</p>
                </div>
            </div>
        </div>

        <div class="card-chefs2">
            <div class="chefs2-front">
                <img src="img/chefs2.jpg" />
                <h2>Jamie Oliver</h2>
            </div>
            <div class="chefs2-back">
                <div class="chefs2-back-details">
                    <h2>Jamie Oliver</h2>
                    <p>James Trevor Oliver is an excellent English chef. A proponent of fresh organic foods, Oliver was named the most influential person in the UK hospitality industry when he topped the inaugural Caterersearch.com 100 in May 2005.</p>
                </div>
            </div>
        </div>

        <div class="card-chefs3">
            <div class="chefs3-front">
                <img src="img/chefs3.jpg" />
                <h2>Raymond Blanc</h2>
            </div>
            <div class="chefs3-back">
                <div class="chefs3-back-details">
                    <h2>Raymond Blanc</h2>
                    <p>Raymond Blanc is an extraordinary French chef. Raymond is the only chef to have retained two Michelin stars for the past 32 years. His significant influence on British cuisine has brought scores of awards, as well as decades of praise from professionals.</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>