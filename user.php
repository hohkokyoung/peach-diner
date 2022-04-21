<?php 

	session_start(); 



  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	session_write_close();
	}

	if(!isset($_SESSION['username']))
	{	header("location: login.php");
		session_write_close();
		exit();
	}

?>



<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?php echo $_SESSION['username'] ?></title>
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="backtotop.css" type="text/css" />
    <link rel="stylesheet" href="user.css" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
	<script src="modal6.js"></script>
	<script src="reconfirm.js"></script>
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

    <div class="user-hero">
        <div class="user-textbox">
            <h2>Welcome back,</h2>
            <p><?php echo $_SESSION['username']; session_write_close(); ?></p>

            <h3>What would you like to do?</h2>
        </div>
        <div class="user-function-button">
            <div class="user-function">
			<a href="reservations.php" class="user-button user-reserve">Reservations</a>
            <a class="user-button user-settings" id="modal2-settings-button" style="cursor: pointer">Settings</a>
            <a class="user-button user-history" id="modal7-history-button" style="cursor: pointer">History</a>
            <a class="user-button user-delete-account" id="modal-delete-button" style="cursor: pointer">Delete Account</a>
            <a href="index.php?logout='1" class="user-button user-log-out">Log Out</a>
			</div>
        </div>
    </div>

	<?php 
		$con = mysqli_connect("localhost","root","root","peach'sdiner");
		$user = $_SESSION['username'];
		$read_query = "SELECT * FROM accounts WHERE Account_Username='$user'";
		$results = mysqli_query($con, $read_query);
		$row = mysqli_fetch_array($results);
	?>
		
	<div id="modal2-settings-id" class="modal-settings">
		<div class="modal-settings-textbox">
	<a class="close2">&times;</a>
	<h4>Settings</h4>

	<div class="settings-name-container">
	<div class="settings-details-container">
	<span class="settings-title">First Name</span>
	<span class="settings-details"><span class="settings-details-data" id="firstnamedata"><?php echo $row['Account_First_Name'] ?></span><i class="fas fa-pencil-alt edit-icon" id="fname-change-icon"></i></span>
	<form action="user.php" method="post">
	<input name="fname" class="settings-input" type="text" id="firstname" placeholder="Kok Young" pattern="[A-Za-z\s]{1,50}" title="Letters only. Maximum 50 characters." onfocus='clearfirstname()' onblur='setfirstname()' required />
	<button type="submit" name="fname-tick" class="settings-submit" id="fname-submit">
	<i class="fas fa-check fname-tick-icon" id="fname-tick-icon-id"></i>
	</button>
	<i class="fas fa-times fname-cross-icon" id="fname-cross-icon-id"></i>
	</div>
	</form>

	<div class="settings-details-container">
	<span class="settings-title">Last Name</span>
	<span class="settings-details"><span class="settings-details-data" id="lastnamedata"><?php echo $row['Account_Last_Name'] ?></span><i class="fas fa-pencil-alt edit-icon" id="lname-change-icon"></i></span>
	<form action="user.php" method="post">
	<input name="lname" class="settings-input" type="text" id="lastname" placeholder="Hoh" pattern="[A-Za-z\s]{1,50}" title="Letters only. Maximum 50 characters." onfocus='clearlastname()' onblur='setlastname()' required />
	<button type="submit" name="lname-tick" class="settings-submit" id="lname-submit">
	<i class="fas fa-check lname-tick-icon" id="lname-tick-icon-id"></i>
	</button>
	<i class="fas fa-times lname-cross-icon" id="lname-cross-icon-id"></i>
	</div>
	</form>
	</div>
	<span class="settings-title">Date of Birth</span>
	<span class="settings-details"><span class="settings-details-data" id="dobdata"><?php echo $row['Account_Date_of_Birth'] ?></span><i class="fas fa-pencil-alt edit-icon" id="dob-change-icon"></i></span>
	<form action="user.php" method="post">
	<input name="dateofbirth" class="settings-input dateUser" type="date" id="dateob" placeholder="12/9/1999" id="dateUser" maxDate = 30 onchange="timeCheck()"  title="18 years old or older." required />
	<button name="dob-tick" class="settings-submit" id="dob-submit">
	<i class="fas fa-check dob-tick-icon" id="dob-tick-icon-id"></i>
	</button>
	<i class="fas fa-times dob-cross-icon" id="dob-cross-icon-id"></i>
	</form>
	<span class="settings-title">Contact Number</span>
	<span class="settings-details"><span class="settings-details-data" id="contnum1data"><?php echo $row['Account_Contact_Number1'] ?></span><i class="fas fa-pencil-alt edit-icon" id="contnum1-change-icon"></i></span>
	<form action="user.php" method="post">
	<input name="cont_num1" type="tel" class="settings-input" id="contact1" placeholder="0123429617" pattern="[0][1][0-9]{8,9}" title="Numbers only. Minimum 10 numbers. Maximum 12 numbers. Must start with the number 01." onfocus='clearcontact()' onblur='setcontact()' required />
	<button name="contnum1-tick" class="settings-submit" id="contnum1-submit">
	<i class="fas fa-check contnum1-tick-icon" id="contnum1-tick-icon-id"></i>
	</button>
	<i class="fas fa-times contnum1-cross-icon" id="contnum1-cross-icon-id"></i>
	</form>
	<span class="settings-title">Additional Contact Number</span>
	<span class="settings-details"><span class="settings-details-data" id="contnum2data"><?php if ($row['Account_Contact_Number2'] == '') {echo "-";} else {echo $row['Account_Contact_Number2']; } ?></span><i class="fas fa-pencil-alt edit-icon" id="contnum2-change-icon" ></i></span>
	<form action="user.php" method="post">
	<input name="add_cont_num" type="tel" class="settings-input" id="contact2" pattern="[0][1][0-9]{8,9}" title="Numbers only. Minimum 10 numbers. Maximum 12 numbers. Must start with the number 01." />
	<button name="contnum2-tick" class="settings-submit" id="contnum2-submit">
	<i class="fas fa-check contnum2-tick-icon" id="contnum2-tick-icon-id"></i>
	</button>
	<i class="fas fa-times contnum2-cross-icon" id="contnum2-cross-icon-id"></i>
	</form>
	<div style="margin-bottom: 2em;">
	<span class="settings-title" id="chg_pass_title">Change Password</span><i class="fas fa-pencil-alt edit-icon" style="font-size: 1.3em;" id="password-change-icon"></i>
		<div class="settings-password" id="change-password">
		<span class="settings-title settings-password-title">Old Password</span>
		<span class="settings-title settings-password-title">New Password</span>
		<span class="settings-title settings-password-title">Confirm Password</span>
		<form action="user.php" method="post">
		<input type="password" class="settings-input settings-password-details" id="old-password-input" name="old_password" placeholder="Old Password" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." onfocus='clearpassword()' onblur='setpassword()' value="" required />
		<input type="password" class="settings-input settings-password-details" id="new-password-input" name="new_password" placeholder="New Password" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." onfocus='clearpassword()' onblur='setpassword()' value="" required />
		<input type="password" class="settings-input settings-password-details" id="confirm-password-input" name="confirm_password" placeholder="Confirm Password" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." onfocus='clearpassword()' onblur='setpassword()' value="" required />
		<div class="settings-password-icon">
		<button name="pass-tick" class="settings-submit" id="pass-submit">
		<i class="fas fa-check pass-tick-icon" id="pass-tick-icon-id"></i>
		</button>
		<i class="fas fa-times pass-cross-icon" id="pass-cross-icon-id"></i>
		</form>
		</div>
		</div>
	</div>
		<a class="modal-button modal-cancel" id="cancel2-button" style="background-color:black; color:white;">Exit</a>
		</div>
	</div>

	<div id="modal7-history-id" class="modal-history">
		<div class="modal-history-textbox">
			<a class="close7">&times;</a>
	<table>
	<form action="user.php" method="post">
	<div class="reservations-search-container">
	<input type="text" name="reservationssearch" class="reservations-search" id="reservationssearchid" placeholder="Search" pattern="[0-9A-Za-z-\s:]{1,11}" title="Only numbers, letters and symbols(: &amp; -). Minimum 1 character. Maximum 11 characters." onfocus="clearreservationssearch()" onblur="setreservationssearch()" required/>
	<button type="submit" name="reservationssearchbutton" class="reservations-search-submit"><i class="fas fa-search"></i></button></form>
	<form action="user.php" method="post" style="position: absolute;"><button type="submit" name="refreshreservationsbutton" class="records-refresh-submit"><i class="fas fa-redo-alt"></i></button></form>
	</div>
	<tr style="box-shadow: none;">
	<th>Reserve ID</th>
	<th>Table ID</th>
	<th>Table Type</th>
	<th>Reserve Date</th>
	<th>Reserve Time</th>
	</tr>
	<?php

		$con = mysqli_connect("localhost","root","root","peach'sdiner");

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

		
		$username = $_SESSION['username'];

				if (isset($_POST['refreshreservationsbutton'])) {
				echo "<script>var modal7 = document.getElementById('modal7-history-id');</script>";
				echo "<script>modal7.style.display='block';</script>";
				$read_reservations_query = "SELECT * FROM reservations as r JOIN accounts as c ON r.Account_ID = c.Account_ID JOIN tables as t ON r.Table_ID = t.Table_ID WHERE Account_Username='$username' ORDER BY r.Reserve_ID DESC";
				$reservations_results = mysqli_query($con, $read_reservations_query);
			}

			if (isset($_POST['reservationssearchbutton'])) {
				echo "<script>var modal7 = document.getElementById('modal7-history-id');</script>";
				echo "<script>modal7.style.display='block';</script>";

			$search = mysqli_real_escape_string($con, $_POST['reservationssearch']);

			if ($search == NULL) {
				echo "<script>alert('Please enter your input.');</script>";
				} elseif ($search != NULL) {

					$searchreservationsquery = "SELECT * FROM reservations as r JOIN accounts as c ON r.Account_ID = c.Account_ID JOIN tables as t ON r.Table_ID = t.Table_ID WHERE c.Account_Username='$username' AND (r.Reserve_ID LIKE '%". $search . "%' OR r.Reserve_Date LIKE '%". $search . "%' OR r.Reserve_Time LIKE '%". $search . "%' OR t.Table_Seat LIKE '%". $search . "%' OR t.Table_ID LIKE '%". $search . "%')  ORDER BY r.Reserve_ID DESC";
					$reservations_results = mysqli_query($con,$searchreservationsquery);
				
					if (mysqli_num_rows($reservations_results) <= 0) {
							echo "<script>alert('No results have found.');</script>";
					}
				}
			} else {

			
		$read_reservations_query = "SELECT * FROM reservations as r JOIN accounts as c ON r.Account_ID = c.Account_ID JOIN tables as t ON r.Table_ID = t.Table_ID WHERE Account_Username='$username' ORDER BY r.Reserve_ID DESC";
		$reservations_results = mysqli_query($con, $read_reservations_query);

				
		if (!mysqli_query($con,$read_reservations_query))
			{
				die('Error: ') . mysqli_error($con);
			} 	

			}

		
		echo "<script>var modal8 = document.getElementById('modal8-confirm-id');</script>";
		echo "<script>var modal7 = document.getElementById('modal7-history-id');</script>";



	while($reservations_row = mysqli_fetch_array($reservations_results))
	{
	echo "<tr>";
	echo "<th>" . $reservations_row['Reserve_ID'] ."</th>";
	echo "<th>" . $reservations_row['Table_ID'] . "</th>";
	echo "<th>" . $reservations_row['Table_Seat'] . " <i class='fas fa-user'></i> Seats" . "</th>";
	echo "<th>" . $reservations_row['Reserve_Date'] . "</th>";
	echo "<th>";
	if (date("H:i", strtotime($reservations_row['Reserve_Time'])) > date("H:i", strtotime(11))) { echo date("H:i", strtotime($reservations_row['Reserve_Time'])) . ' P.M.'; } else {echo date("H:i", strtotime($reservations_row['Reserve_Time'])) . ' A.M.'; } ;
	echo "</th>";
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$reservedate = date("Y-m-d", strtotime($reservations_row['Reserve_Date']));
	$reservetime = date("H:i:s", strtotime($reservations_row['Reserve_Time']));

	$reserveid = $reservations_row['Reserve_ID'];

	if (($reservedate == date("Y-m-d",time())) && ($reservetime > date("H:i:s",time())) || $reservedate > date("Y-m-d",time())) {
		echo "<th class='cancel-booking-column'>";
		echo "<a class='cancel-booking-button' style='cursor:pointer; text-decoration:none; color:black;' onclick='openmodal($reserveid);' id='cancel-booking-id' name='cancel-booking'>Cancel Booking</a>";
		echo "</th>";
		$_POST['reserveid'] = $reserveid;
	} elseif (($reservedate == date("Y-m-d",time())) && ($reservetime < date("H:i:s",time())) || $reservedate < date("Y-m-d",time())) {
		echo "<th class='expired-booking-column'>";
		echo "<a class='expired-booking-button' style='color:red;'>Expired</a>";
		echo "</th>";
	}
	echo "</tr>";

	}
	session_write_close();

	mysqli_close($con);
	?>

	</table>
		<a class="modal-button modal-cancel modal7-exit" id="cancel7-button" style="background-color:black; color:white;">Exit</a>
		</div>
	</div>

	<div id="modal12-cancelbooking-id" class="modal-cancelbooking">

	<div class="modal-cancelbooking-textbox">
		<a class="close12">&times;</a>
		<h4>Are you sure?</h4>
		<h4>Please enter your password to cancel this booking.</h4>
		<form action="user.php" method="post">
		<div class="modal-cancelbooking-container">
		<input type="password" name="cancelbooking_pass" id="password" placeholder="Password" class="modal-cancelbooking-input" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." onfocus='clearpassword()' onblur='setpassword()' value="" required autofocus/>
		</div>
		<input type="text" name="reserve-value" id="reserve-value-id" pattern="[0-9]{1,6}" hidden/>
		<a class="modal-button modal-no" id="cancel12-button">No</a>
		<input type="submit" class="modal-button modal-yes" name="cancelbookingyes" value="Yes"/>
		</form>
	</div>

	</div>

	<?php 

	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	if(isset($_POST['cancelbookingyes'])){
	
	if(mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
	}

	$password = mysqli_real_escape_string($con, $_POST['cancelbooking_pass']);
	$reserveid = mysqli_real_escape_string($con, $_POST['reserve-value']);
	$username = $_SESSION['username'];
	$user_pw_check = "SELECT * FROM accounts WHERE Account_Username='$username' LIMIT 1";
    $result = mysqli_query($con, $user_pw_check);
    $user = mysqli_fetch_assoc($result);

	echo "<script>var modal12 = document.getElementById('modal12-cancelbooking-id');</script>";

	if ($user) { 
    if (!(password_verify($password,$user['Account_Password']))) {
		echo "<script>
			window.alert(\"Password does not match.\");
			modal7.style.display = \"block\";
			password.select();
			password.value = \"\";
		</script>";
	} else  {

	echo "<script>var modal7 = document.getElementById('modal7-history-id');</script>";
	$cancel_query = "DELETE FROM reservations WHERE Reserve_ID = $reserveid";
	mysqli_query($con,$cancel_query);

	if(mysqli_affected_rows($con)>0) 
		{
			echo "<script>window.alert(\"Your booking has been cancelled.\");</script>";
			echo "<script>window.location.href='user.php'</script>";
			echo "<script>modal7.style.display;</script>";
		} else {
			echo "<script>window.alert(\"Your booking cannot be cancelled.\");</script>";
			echo "<script>window.location.href='user.php'</script>";
		}

	}
	}
	}
		mysqli_close($con);
	?>

	<?php

		echo "<script>var modal2 = document.getElementById('modal2-settings-id');</script>";

		$con = mysqli_connect("localhost","root","root","peach'sdiner");
		
		if (isset($_POST['fname-tick'])) {

		$first_name = mysqli_real_escape_string($con, $_POST['fname']);
		$username = $_SESSION['username'];

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

		$update_fname_query = "UPDATE accounts SET Account_First_Name = '$first_name' WHERE Account_Username = '$username'";

		if (!mysqli_query($con,$update_fname_query))
			{
				die('Error: ') . mysqli_error($con);
			} 

			echo "<script>window.onload = function() {
			if(!window.location.hash) {
			window.location = window.location + '#loaded';
			window.location.reload();
			alert('Change has been made.');
			}
			}</script>";
			
			echo "<script>
			modal2.style.display = 'initial';
			</script>";

			echo"<script>
			changefnameicon.style.display = 'initial';
			fnametick.style.display = 'none';
			fnamecross.style.display = 'none';
			</script>";

			session_write_close();
		}

		mysqli_close($con);
	?>


	<?php

		echo "<script>var modal2 = document.getElementById('modal2-settings-id');</script>";

		$con = mysqli_connect("localhost","root","root","peach'sdiner");
		
		if (isset($_POST['lname-tick'])) {

		$last_name = mysqli_real_escape_string($con, $_POST['lname']);
		$username = $_SESSION['username'];

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

		$update_lname_query = "UPDATE accounts SET Account_Last_Name = '$last_name' WHERE Account_Username = '$username'";

		if (!mysqli_query($con,$update_lname_query))
			{
				die('Error: ') . mysqli_error($con);
			} 

			echo "<script>window.onload = function() {
			if(!window.location.hash) {
			window.location = window.location + '#loaded';
			window.location.reload();
			alert('Change has been made.');
			}
			}</script>";
			
			echo "<script>
			modal2.style.display = 'initial';
			</script>";

			echo"<script>
			changelnameicon.style.display = 'initial';
			lnametick.style.display = 'none';
			lnamecross.style.display = 'none';
			</script>";

			session_write_close();
		}

		mysqli_close($con);
	?>

	<?php

		echo "<script>var modal2 = document.getElementById('modal2-settings-id');</script>";

		$con = mysqli_connect("localhost","root","root","peach'sdiner");
		
		if (isset($_POST['dob-tick'])) {

		$dob = mysqli_real_escape_string($con, $_POST['dateofbirth']);
		$username = $_SESSION['username'];

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

		$update_dob_query = "UPDATE accounts SET Account_Date_of_Birth = '$dob' WHERE Account_Username = '$username'";

		if (!mysqli_query($con,$update_dob_query))
			{
				die('Error: ') . mysqli_error($con);
			} 

			echo "<script>window.onload = function() {
			if(!window.location.hash) {
			window.location = window.location + '#loaded';
			window.location.reload();
			alert('Change has been made.');
			}
			}</script>";
			
			echo "<script>
			modal2.style.display = 'initial';
			</script>";

			echo"<script>
			changelnameicon.style.display = 'initial';
			lnametick.style.display = 'none';
			lnamecross.style.display = 'none';
			</script>";

			session_write_close();
		}

		mysqli_close($con);
	?>

		<?php

		echo "<script>var modal2 = document.getElementById('modal2-settings-id');</script>";

		$con = mysqli_connect("localhost","root","root","peach'sdiner");
		
		if (isset($_POST['contnum1-tick'])) {

		$contnum1 = mysqli_real_escape_string($con, $_POST['cont_num1']);
		$username = $_SESSION['username'];

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

		$update_cont1_query = "UPDATE accounts SET Account_Contact_Number1 = '$contnum1' WHERE Account_Username = '$username'";

		if (!mysqli_query($con,$update_cont1_query))
			{
				die('Error: ') . mysqli_error($con);
			} 

			echo "<script>window.onload = function() {
			if(!window.location.hash) {
			window.location = window.location + '#loaded';
			window.location.reload();
			alert('Change has been made.');
			}
			}</script>";
			
			echo "<script>
			modal2.style.display = 'initial';
			</script>";

			echo"<script>
			changelnameicon.style.display = 'initial';
			lnametick.style.display = 'none';
			lnamecross.style.display = 'none';
			</script>";

			session_write_close();
		}

		mysqli_close($con);
	?>

	<?php

		echo "<script>var modal2 = document.getElementById('modal2-settings-id');</script>";

		$con = mysqli_connect("localhost","root","root","peach'sdiner");
		
		if (isset($_POST['contnum2-tick'])) {

		$contnum2 = mysqli_real_escape_string($con, $_POST['add_cont_num']);
		$username = $_SESSION['username'];

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

		$update_cont2_query = "UPDATE accounts SET Account_Contact_Number2 = '$contnum2' WHERE Account_Username = '$username'";

		if (!mysqli_query($con,$update_cont2_query))
			{
				die('Error: ') . mysqli_error($con);
			} 

			echo "<script>window.onload = function() {
			if(!window.location.hash) {
			window.location = window.location + '#loaded';
			window.location.reload();
			alert('Change has been made.');
			}
			}</script>";
			
			echo "<script>
			modal2.style.display = 'initial';
			</script>";

			echo"<script>
			changelnameicon.style.display = 'initial';
			lnametick.style.display = 'none';
			lnamecross.style.display = 'none';
			</script>";

			session_write_close();
		}

		mysqli_close($con);
	?>

	
	<?php

		echo "<script>var modal2 = document.getElementById('modal2-settings-id');</script>";

		$con = mysqli_connect("localhost","root","root","peach'sdiner");
		
		if (isset($_POST['pass-tick'])) {

		$oldpass = mysqli_real_escape_string($con, $_POST['old_password']);
		$newpass = mysqli_real_escape_string($con, $_POST['new_password']);
		$confirmpass = mysqli_real_escape_string($con, $_POST['confirm_password']);
		$username = $_SESSION['username'];

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

		if (empty($oldpass) || empty($newpass) || empty($confirmpass)) { echo "<script>alert('Password is required.');</script>"; 	echo "<script>
			modal2.style.display = 'initial';
			</script>";}
		else if ($newpass != $confirmpass) { echo "<script>alert('The passwords do not match.');</script>"; echo "<script>
			modal2.style.display = 'initial';
			</script>"; }
		else {
			$oldpass_query = "SELECT * FROM accounts WHERE Account_Username='$username'";
			$oldpass_results = mysqli_query($con, $oldpass_query);
			$rows = mysqli_fetch_array($oldpass_results);
			if (password_verify($oldpass, $rows['Account_Password'])) {
				$enc_newpass = password_hash($newpass, PASSWORD_DEFAULT);

			$update_pass_query = "UPDATE accounts SET Account_Password = '$enc_newpass' WHERE Account_Username = '$username'";	

			if (!mysqli_query($con,$update_pass_query))
			{
				die('Error: ') . mysqli_error($con);
			} 
	
			echo "<script>
			modal2.style.display = 'initial';
			alert('Change has been made.');
			</script>";

			echo"<script>
			changelnameicon.style.display = 'initial';
			lnametick.style.display = 'none';
			lnamecross.style.display = 'none';
			</script>";

			session_write_close();

		} else {
			session_write_close();
			echo "<script>alert('Wrong old password.');</script>";
			echo "<script>
			modal2.style.display = 'initial';
			</script>";
		}
		}
		}

		mysqli_close($con);
	?>

	<div id="modal-password-id" class="modal-password">

		<div class="modal-password-textbox">
		<a class="close">&times;</a>
		<span class="modal-text">Please input your password to proceed the deletion.</span>
		<form action="user.php" method="post">
		<div class="modal-pass-container">
		<input type="password" name="del_pass" id="password_id" class="modal-pass-input" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." value="" required autofocus/>
		</div>
		<a class="modal-button modal-cancel" id="cancel-button">Cancel</a>
		<input type="submit" class="modal-button modal-proceed" name="proceed" value="Proceed"/>
		</form>
	</div>

		
	<?php 
	
	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	if(isset($_POST['proceed'])){
	
	if(mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
	}

	$password = mysqli_real_escape_string($con, $_POST['del_pass']);
	$username = $_SESSION['username'];
	$user_pw_check = "SELECT * FROM accounts WHERE Account_Username='$username' LIMIT 1";
    $result = mysqli_query($con, $user_pw_check);
    $user = mysqli_fetch_assoc($result);

	echo "<script>var modal = document.getElementById('modal-password-id');</script>";

	if ($user) { 
    if (!(password_verify($password,$user['Account_Password']))) {
		echo "<script>
			window.alert(\"Password does not match.\");
			modal.style.display = \"block\";
			password_id.select();
			password_id.value = \"\";
		</script>";
	} else  {

		$update_reserve_query = "UPDATE reservations as r
								JOIN accounts as c 
								ON r.Account_ID = c.Account_ID
								SET r.Account_ID = NULL
								WHERE c.Account_Username = '$username'";
		$update_receipt_query = "UPDATE receipts as rc
								JOIN accounts as c 
								ON rc.Account_ID = c.Account_ID
								SET rc.Account_ID = NULL
								WHERE c.Account_Username = '$username'";
		$query = "DELETE FROM accounts WHERE Account_Username='$username' LIMIT 1";

		if (mysqli_query($con,$update_receipt_query))
		{
			if (mysqli_query($con,$update_reserve_query))
				{
				if (mysqli_query($con,$query))
				{
				session_start();
				session_destroy();
				unset($_SESSION['username']);
				session_write_close();
  				echo "<script>
					window.alert(\"Account deleted.\");
					window.location.href='index.php';
				</script>";
				mysqli_close($con);
		
				} else {
			die('Error: ') . mysqli_error($con);
			}
			}
		}
		
	}
	} 
	}

	?>

	
	<script src="http://code.jquery.com/jquery-3.3.1.js"></script>



	<script>

		var dateUser = document.getElementById('dateUser');
		var date = new Date();
		var day = date.getDate();
		var month = date.getMonth() + 1;
		var year = date.getFullYear() - 18;
		var currentDate = year + "-" + month + "-" + day;
		$('.dateUser').attr('max', currentDate);

		function timeCheck() {
			<?php
				
					$con = mysqli_connect("localhost","root","root","peach'sdiner");

					$sqlCheckTime= "SELECT * FROM ";

			?>
		}


	</script>


	<script src="modal.js"></script>
	<script src="modal2.js"></script>
	<script src="modal7.js"></script>
	<script src="modal8.js"></script>
	<script src="modal12.js"></script>
	<script src="cleartext.js"></script>
	<script src="inputshow.js"></script>
</div>

    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="typingtext.js"></script>

</body>
</html>