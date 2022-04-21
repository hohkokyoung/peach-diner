<?php include('register_validation.php');

	if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
	unset($_SESSION['username']);
	session_write_close();
	}
	
	if (isset($_SESSION['username'])) {
  		echo "<script>window.location.href='user.php';</script>";
		session_write_close();
	}

	if (isset($_SESSION['admin'])) {
  		echo "<script>window.location.href='admin.php';</script>";
		session_write_close();
	}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" , initial-scale="1" />
    <title>Login</title>
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="login.css" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
</head>
<body>

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

    <div class="login-hero">
        <div class="login-hero-container">
            <h1>Login</h1>

            <form action="#" method="post">
                <div class="login-textbox">
                    <input type="text" id="username" name="username" placeholder="Username" pattern="(?=.*[A-Za-z])[_0-9A-Za-z]{4,10}" title="Allow numbers, letters and underscores. At least one letter. Minimum 4 characters. Maximum 10 characters." onfocus='clearusername()' onblur='setusername()' value="" required />
                </div>
                <div class="login-textbox">
                    <input type="password" id="password" name="password" placeholder="Password" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." onfocus='clearpassword()' onblur='setpassword()' value="" required />
                </div>

                <input class="button-submit" type="submit" name="login" value="Log in" />
            </form>

            <a class="forgot-password" id="modal3-forgot-button">Forgot Password?</a>
            <a class="no-account" data-hover="Register" href="register.php"><span>No Account?</span></a>
        </div>
		<?php include('errors.php') ?>
    </div>

	<div id="modal3-forgot-id" class="modal-forgot">
		<div class="modal-forgot-textbox">
		<form action="login.php" method="post">
			<a class="close3">&times;</a>
			<h2>Please enter your username and email.</h2>
				<div class="modal-forgot-input">
					<input type="text" id="forgot_username_id" class="modal-username-input" name="forgot_username" placeholder="Username" pattern="(?=.*[A-Za-z])[_0-9A-Za-z]{4,10}" title="Allow numbers, letters and underscores. At least one letter. Minimum 4 characters. Maximum 10 characters." value="" required autofocus />
					<input type="email" id="forgot_email_id" class="modal-email-input" name="forgot_email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a correct e-mail. example@hotmail.com" required />
				</div>
			<a class="modal-button modal-cancel" id="cancel3-button">Cancel</a>
			<input type="submit" class="modal-button modal-proceed" name="forgot_proceed" value="Proceed"/>
		</form>
		</div>
	</div>

	<div id="modal4-randnum-id" class="modal-randnum">
		<div class="modal-randnum-textbox">
		<form action="login.php" method="post">
		<a class="close4">&times;</a>
		<h2>Please enter the 6 digits code.</h2>
		<div class="modal-randnum-input">
			<input type="text" id="randnum-id" class="modal-randnum-code" name="randnum" placeholder="Code" pattern="[0-9]{6}" title="6 digits code." value="" required/>
		</div>
		<a class="modal-button modal-cancel" id="cancel4-button">Cancel</a>
		<input type="submit" class="modal-button modal-login" name="randnum_login" value="Proceed"/>
		</form>
		</div>
	</div>
	
	<?php 

	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	$forgot_username = "";
	$forgot_email = "";

	if(isset($_POST['forgot_proceed'])){

	if(mysqli_connect_errno())
	{
		echo "<script>alert(\"Failed to connect to MySQL: \");</script>" . mysql_connect_error();
	}

		$forgot_username = mysqli_real_escape_string($con, $_POST['forgot_username']);
		$forgot_email = mysqli_real_escape_string($con, $_POST['forgot_email']);

		$user_check = "SELECT * FROM accounts WHERE Account_Username='$forgot_username' OR Account_Email_Address1='$forgot_email' OR Account_Email_Address2='$forgot_email' LIMIT 1";
		$result = mysqli_query($con, $user_check);
		$user = mysqli_fetch_assoc($result);

		echo "<script>var modal3 = document.getElementById('modal3-forgot-id');</script>";
		echo "<script>var modal4 = document.getElementById('modal4-randnum-id');</script>";
	
		if ($user) { 
		if ($user['Account_Username'] === $forgot_username && $user['Account_Email_Address1'] === $forgot_email || $user['Account_Email_Address2'] === $forgot_email) {
	

			if(!isset($_SESSION["random"])) {
				$_SESSION["random"] = (mt_rand(99999,999999));
			}
			$randomnumber = $_SESSION["random"];
			$_SESSION["random"] = $randomnumber;
			$_SESSION["forgot_username"] = $forgot_username;
			$message = "Please enter this code to access your account. \n" . $randomnumber;
			mail($forgot_email,"New Password - Peach's Diner",$message);
			
			echo "<script>
				modal4.style.display = \"block\";</script>";
			echo "<script>randnum-id.value='';
				</script>";
			echo "<script>
				window.alert(\"A random code has been generated to your email.\");</script>";
				session_write_close();
			}
			

		 else {
				echo "<script>
				window.alert(\"Username and Email does not match.\");
				modal3.style.display = \"block\";
				forgot_username_id.select();
				forgot_username_id.value = '';
				forgot_email_id.value = '';
				</script>";
				}
			}
	}
	
			if(isset($_POST['randnum_login'])) {
			echo "<script>var modal4 = document.getElementById('modal4-randnum-id');</script>";

			if(mysqli_connect_errno())
			{
				die('Failed to connect to MySQL: ') . mysqli_connect_error();
			}
				$randomnumber = $_SESSION["random"];
				$rand_num = mysqli_real_escape_string($con, $_POST['randnum']);
				$enc_randomnumber = password_hash($randomnumber,PASSWORD_DEFAULT);


				if (!password_verify($rand_num, $enc_randomnumber)) {
					

					echo "<script>modal4.style.display = \"block\";</script>";
					echo "<script>randnum-id.value='';</script>";
					echo "<script>window.alert(\"Code does not match.\");</script>;";
					
				} else {
					
					if(isset($_SESSION['forgot_username'])){
					$forgot_username = $_SESSION["forgot_username"];
					echo "<script>window.alert(\"This is your current password.\\nChanging a new password is highly suggested.\");</script>;";
					}
					$update_query = "UPDATE accounts SET Account_Password = '$enc_randomnumber' WHERE Account_Username='$forgot_username' LIMIT 1";

					if (!mysqli_query($con,$update_query))
					{
						die('Error: ') . mysqli_error($con);
					} 

					session_write_close();
				}
			}
	mysqli_close($con);
	?>
	
	<script src="cleartext.js"></script>
    <script src="modal3.js"></script>
    <script src="modal4.js"></script>

	<script>
	if ( window.history.replaceState ) {
	window.history.replaceState( null, null, window.location.href );
	}
	</script>


</body>
</html>