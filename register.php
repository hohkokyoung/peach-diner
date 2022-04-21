<?php include('register_validation.php');
	
	if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
	unset($_SESSION['username']);
	session_write_close();
	}

	if (isset($_SESSION['username'])) {
  		header('location: user.php');
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
    <title>Register</title>
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="register.css" type="text/css" />
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


    <div class="register-hero">
        <div class="register-container">
            <form id="register" method="post" action="register.php">
                <h1>Register</h1>
                <h2>First Name <span style="color: red;">*</span></h2>
                <div class="register-textbox">
                    <input name="fname" type="text" id="firstname" placeholder="Kok Young" pattern="[A-Za-z\s]{1,50}" title="Letters only. Maximum 50 characters." onfocus='clearfirstname()' onblur='setfirstname()' required />
                </div>
                <h2>Last Name <span style="color: red;">*</span></h2>
                <div class="register-textbox">
                    <input name="lname" type="text" id="lastname" placeholder="Hoh" pattern="[A-Za-z\s]{1,50}" title="Letters only. Maximum 50 characters." onfocus='clearlastname()' onblur='setlastname()' required />
                </div>
                <h2>E-mail Address <span style="color: red;">*</span></h2>
                <div class="register-textbox">
                    <input name="email" type="email" id="email" placeholder="kelvinhoh1520@hotmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a correct e-mail. example@hotmail.com" onfocus='clearemail()' onblur='setemail()' required />
                </div>
                <h2>Additional E-mail Address</h2>
                <div class="register-textbox">
                    <input name="add_email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a correct e-mail. example@hotmail.com" />
                </div>
                <h2>Date of Birth <span style="color: red;">*</span></h2>
                <div class="register-textbox">
                    <input name="dateob" class="register-date-of-birth dateReg" type="date" placeholder="12/9/1999" id="dateReg" maxDate = 30 onchange="timeCheck()"  title="18 years old or older." required />
                </div>
                <h2>Contact Number <span style="color: red;">*</span></h2>
                <div class="register-textbox">
                    <input name="cont_num" type="tel" id="contact" placeholder="0123429617" pattern="[0][1][0-9]{8,9}" title="Numbers only. Minimum 10 numbers. Maximum 12 numbers. Must start with the number 01." onfocus='clearcontact()' onblur='setcontact()' required />
                </div>
                <h2>Additional Contact Number</h2>
                <div class="register-textbox">
                    <input name="add_cont_num" type="tel" pattern="[0][1][0-9]{8,9}" title="Numbers only. Minimum 10 numbers. Maximum 12 numbers. Must start with the number 01." />
                </div>
                <h2>Username <span style="color: red;">*</span></h2>
                <div class="register-textbox">
                    <input name="reg_username" type="text" id="peach" placeholder="Peach" pattern="(?=.*[A-Za-z])[_0-9A-Za-z]{4,10}" title="Allow numbers, letters and underscores. At least one letter. Minimum 4 characters. Maximum 10 characters." onfocus='clearpeach()' onblur='setpeach()' required />
                </div>
                <h2>Password <span style="color: red;">*</span></h2>
                <div class="register-textbox">
                    <input name="reg_pass" type="password" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." required />
                </div>
                <h2>Confirm Password <span style="color: red;">*</span></h2>
                <div class="register-textbox">
                    <input name="reg_con_pass" type="password" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." required />
                </div>
                <div class="register-checkbox-container">
                    <input class="register-checkbox" type="checkbox" required checked /> <span class="register-terms">I understand and agree with the <a href="" class="button-privacy">privacy policy & terms of use</a>.</span> <span style="color: red; margin-left: 0;">*</span>
                </div>
                <div class="register-checkbox-container">
                    <input class="register-checkbox" type="checkbox" /> <span class="register-news">I want to get news/promotion from Peach's Diner.</span>
                </div>
                <input name="register" class="button-submit" type="submit" value="Register" id="register-id"/>
				<?php include('errors.php') ?>
            </form>
        </div>
    </div>

    <script src="cleartext.js"></script>

	<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
		}
	</script>

	<script src="http://code.jquery.com/jquery-3.3.1.js"></script>

	<script>

		var dateReg = document.getElementById('dateReg');
		var date = new Date();
		var day = date.getDate();
		var month = date.getMonth() + 1;
		var year = date.getFullYear() - 18;
		var currentDate = year + "-" + month + "-" + day;
		$('.dateReg').attr('max', currentDate);

		function timeCheck() {
			<?php
				
					$con = mysqli_connect("localhost","root","root","peach'sdiner");

					$sqlCheckTime= "SELECT * FROM ";

			?>
		}
		

	</script>

</body>
</html>