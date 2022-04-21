<?php 

	session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
	session_write_close();
	}

	if(!isset($_SESSION['admin']))
	{	header("location: login.php");
		session_write_close();
		exit();
	}

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?php echo $_SESSION['admin'] ?></title>
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="backtotop.css" type="text/css" />
    <link rel="stylesheet" href="admin.css" type="text/css" />
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
                <li>
                    <div class="dropdown-login">
						<?php  if (isset($_SESSION['admin'])) { ?>
							<?php echo "<a href='user.php'>" . $_SESSION['admin'] . "</a>"; session_write_close(); ?><i class="fa fa-caret-down"></i>
                            <?php } else { ?>
							<?php echo "<a href='login.php'>Login</a>"; ?><i class="fa fa-caret-down"></i>
							<?php } ?>
                        <div class="dropdown-content-login">
						<?php  if (isset($_SESSION['admin'])) { ?>
							<?php echo "<a href='index.php?logout='1'' name='logout' style='margin-left:.5em;'>" . "Log out" . "</a>"; ?>
                            <?php } else { ?>
							<?php echo "<a href='register.php'>Register</a>"; ?>
							<?php } ?>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>	

	  <div class="admin-hero">
        <div class="admin-textbox">
            <h2>Welcome back,</h2>
            <p><?php echo $_SESSION['admin']; session_write_close(); ?></p>

            <h3>What would you like to do?</h2>
        </div>
        <div class="admin-function-button">
            <div class="admin-function">
			<a class="admin-button admin-reserve" id="modal8-edit-button" style="cursor: pointer">Edit Menu</a>
            <a class="admin-button admin-delete-account" id="modal9-bookings-button" style="cursor: pointer">Bookings</a>
            <a class="admin-button admin-settings" id="modal2-settings-button" style="cursor: pointer">Settings</a>
		    <a class="admin-button admin-history" id="modal11-records-button" style="cursor: pointer">Records</a>
            <a href="index.php?logout='1" class="admin-button admin-log-out" style="cursor: pointer">Log Out</a>
			</div>
        </div>
    </div>

	<div id="modal8-edit-menu-id" class="modal-cancelbooking">

	<div class="modal-cancelbooking-textbox">
		<a class="close8">&times;</a>
		<h4>Please enter your password to gain access to edit menu.</h4>
		<form action="admin.php" method="post">
		<div class="modal-cancelbooking-container">
		<input type="password" name="menu_pass" id="password" placeholder="Password" class="modal-cancelbooking-input" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." onfocus='clearpassword()' onblur='setpassword()' value="" required autofocus/>
		</div>
		<a class="modal-button modal-no" id="cancel8-button">No</a>
		<input type="submit" class="modal-button modal-yes" name="gotomenu" value="Yes"/>
		</form>
	</div>
	
	</div>

	<div id="modal18-edit-id" class="modal-edit">
		<div class="modal-edit-textbox">
		<a class="close18">&times;</a>
			<a href="breakfastnew.php" class="admin-button admin-breakfast-account" id="modal15-breakfast-button" style="cursor: pointer">Breakfast</a>
			<a href="lunchnew.php" class="admin-button admin-lunch-account" id="modal16-lunch-button" style="cursor: pointer">Lunch</a>
			<a href="dinnernew.php" class="admin-button admin-dinner-account" id="modal17-dinner-button" style="cursor: pointer">Dinner</a>
			<a href="drinksnew.php" class="admin-button admin-drinks-account" id="modal18-drinks-button" style="cursor: pointer">Drinks</a>
		</div>
	</div>


	<?php

	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	if(isset($_POST['gotomenu'])){
	
	if(mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
	}

	$password = mysqli_real_escape_string($con, $_POST['menu_pass']);
	$username = $_SESSION['admin'];
	$user_pw_check = "SELECT * FROM accounts WHERE Account_Username='$username' LIMIT 1";
    $result = mysqli_query($con, $user_pw_check);
    $user = mysqli_fetch_assoc($result);

	echo "<script>var modal18 = document.getElementById('modal18-edit-id');</script>";
	echo "<script>var modal8 = document.getElementById('modal8-edit-menu-id');</script>";

	if ($user) { 
    if (!(password_verify($password,$user['Account_Password']))) {
		echo "<script>
			window.alert(\"Password does not match.\");
			modal8.style.display = \"block\";
			password.select();
			password.value = \"\";
		</script>";
	} else  {

			echo "<script>
			modal18.style.display = \"block\";</script>";
	}
	}
	}

		session_write_close();

		mysqli_close($con);
	?>



	<div id="modal9-bookings-id" class="modal-bookings">
		<div class="modal-bookings-textbox">
			<a class="close9">&times;</a>
			<a class="admin-button admin-reservations-account" id="modal13-reservations-button" style="cursor: pointer">Reserve Info</a>
			<a class="admin-button admin-customers-account" id="modal14-customers-button" style="cursor: pointer">Customer Info</a>
		</div>
	</div>

	<div id="modal13-reservations-id" class="modal-reservations">
		<div class="modal-reservations-textbox">
			<a class="close13">&times;</a>
			<table>
			<form action="admin.php" method="post">
			<div class="reservations-search-container">
			<input type="text" name="reservationssearch" class="reservations-search" id="reservationssearchid" placeholder="Search" pattern="[0-9A-Za-z-\s:]{1,11}" title="Only numbers, letters and symbols(: &amp; -). Minimum 1 character. Maximum 11 characters." onfocus="clearreservationssearch()" onblur="setreservationssearch()" required/>
			<button type="submit" name="reservationssearchbutton" class="reservations-search-submit"><i class="fas fa-search"></i></button></form>
			<form action="admin.php" method="post" style="position: absolute;"><button type="submit" name="refreshreservationsbutton" class="records-refresh-submit"><i class="fas fa-redo-alt"></i></button></form>
			</div>
			<tr style="box-shadow: none;">
			<th>Reservation ID</th>
			<th>Reservation Date</th>
			<th>Reservation Time</th>
			<th>Account ID</th>
			<th>Table ID</th>
			</tr>
			<?php

				$con = mysqli_connect("localhost","root","root","peach'sdiner");

				if(mysqli_connect_errno())
				{
				die('Failed to connect to MySQL: ') . mysqli_connect_error();
				}
		
				$username = $_SESSION['admin'];

				date_default_timezone_set("Asia/Kuala_Lumpur");
				$datenow = date('Y-m-d',time());
				$timenow = date('H:i:s',time());

			if (isset($_POST['refreshreservationsbutton'])) {
				echo "<script>var modal13 = document.getElementById('modal13-reservations-id');</script>";
				echo "<script>modal13.style.display='block';</script>";
				$read_reservations_query = "SELECT * FROM reservations WHERE (Reserve_Date > '$datenow' OR (Reserve_Date = '$datenow' AND Reserve_Time >= '$timenow'))";
				$reservations_results = mysqli_query($con, $read_reservations_query);
			}

			if (isset($_POST['reservationssearchbutton'])) {
				echo "<script>var modal13 = document.getElementById('modal13-reservations-id');</script>";
				echo "<script>modal13.style.display='block';</script>";

			$search = mysqli_real_escape_string($con, $_POST['reservationssearch']);

			if ($search == NULL) {
				echo "<script>alert('Please enter your input.');</script>";
				} elseif ($search != NULL) {

					$searchreservationsquery = "SELECT * FROM reservations WHERE (Reserve_Date > '$datenow' OR (Reserve_Date = '$datenow' AND Reserve_Time >= '$timenow')) AND (Reserve_ID LIKE '%". $search . "%' OR Reserve_Date LIKE '%". $search . "%' OR Reserve_Time LIKE '%". $search . "%' OR Account_ID LIKE '%". $search . "%' OR Table_ID LIKE '%". $search . "%')";
					$reservations_results = mysqli_query($con,$searchreservationsquery);
				
					if (mysqli_num_rows($reservations_results) <= 0) {
							echo "<script>alert('No results have found.');</script>";
					}
				}
			} else {

				$read_reservations_query = "SELECT * FROM reservations WHERE (Reserve_Date > '$datenow' OR (Reserve_Date = '$datenow' AND Reserve_Time >= '$timenow'))";
				$reservations_results = mysqli_query($con, $read_reservations_query);

				
				if (!mysqli_query($con,$read_reservations_query))
					{
						die('Error: ') . mysqli_error($con);
					} 	


			}

			while($reservations_row = mysqli_fetch_array($reservations_results))
			{
			echo "<tr>";
			echo "<th style='color:black'>" . $reservations_row['Reserve_ID'] ."</th>";
			echo "<th style='color:black'>" . $reservations_row['Reserve_Date'] . "</th>";
			echo "<th>";
			if (date("H:i", strtotime($reservations_row['Reserve_Time'])) > date("H:i", strtotime(11))) { echo date("H:i", strtotime($reservations_row['Reserve_Time'])) . ' P.M.'; } else {echo date("H:i", strtotime($reservations_row['Reserve_Time'])) . ' A.M.'; } ;
			echo "</th>";
			if ($reservations_row['Account_ID'] == '') {
			echo "<th style='color:black'>No ID</th>";
			} elseif (!$reservations_row['Account_ID'] == '') {
			echo "<th style='color:black'>" . $reservations_row['Account_ID'] . "</th>";
			}
			echo "<th style='color:black'>" . $reservations_row['Table_ID'] . "</th>";
			
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$reservedate = date("Y-m-d", strtotime($reservations_row['Reserve_Date']));
			$reservetime = date("H:i:s", strtotime($reservations_row['Reserve_Time']));

			$reserveid = $reservations_row['Reserve_ID'];

			if (($reservedate == date("Y-m-d",time())) && ($reservetime > date("H:i:s",time())) || $reservedate > date("Y-m-d",time())) {
				echo "<th class='cancel-booking-column'>";
				echo "<a class='cancel-booking-button' style='cursor:pointer; text-decoration:none; color:black;' onclick='openmodal($reserveid);' id='cancel-booking-id' name='cancel-booking'>Cancel Booking</a>";
				echo "</th>";
			}
			echo "</tr>";
			}
			session_write_close();

			mysqli_close($con);

			?>
			</table>
			<a class="modal-button modal-cancel modal13-exit" id="cancel13-button" style="background-color:black; color:white;">Exit</a>
		</div>
	</div>

	<div id="modal12-cancelbooking-id" class="modal-cancelbooking">

	<div class="modal-cancelbooking-textbox">
		<a class="close12">&times;</a>
		<h4>Are you sure?</h4>
		<h4>Please enter your password to cancel this booking.</h4>
		<form action="admin.php" method="post">
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
	$username = $_SESSION['admin'];
	$user_pw_check = "SELECT * FROM accounts WHERE Account_Username='$username' LIMIT 1";
    $result = mysqli_query($con, $user_pw_check);
    $user = mysqli_fetch_assoc($result);

	echo "<script>var modal12 = document.getElementById('modal12-cancelbooking-id');</script>";
	echo "<script>var modal13 = document.getElementById('modal13-reservations-id');</script>";

	if ($user) { 
    if (!(password_verify($password,$user['Account_Password']))) {
		echo "<script>
			window.alert(\"Password does not match.\");
			modal13.style.display = \"block\";
			password.select();
			password.value = \"\";
		</script>";
	} else  {

	$cancel_query = "DELETE FROM reservations WHERE Reserve_ID = $reserveid";
	mysqli_query($con,$cancel_query);

	if(mysqli_affected_rows($con)>0) 
		{
			echo "<script>window.alert(\"Your booking has been cancelled.\");</script>";
			echo "<script>window.location.href='admin.php'</script>";
			echo "<script>modal12.style.display;</script>";
		} else {
			echo "<script>window.alert(\"Your booking cannot be cancelled.\");</script>";
			echo "<script>window.location.href='admin.php'</script>";
		}

	}
	}
	}

		session_write_close();

		mysqli_close($con);
	?>



	<div id="modal14-customers-id" class="modal-customers">
		<div class="modal-customers-textbox">
			<a class="close14">&times;</a>
			<table>
			<form action="admin.php" method="post">
			<div class="customers-search-container">
			<input type="text" name="customerssearch" class="customers-search" id="customerssearchid" placeholder="Search" pattern="[0-9A-Za-z-\s]{1,11}" title="Only numbers, letters and symbols(-). Minimum 1 character. Maximum 11 characters." onfocus="clearcustomerssearch()" onblur="setcustomerssearch()" required/>
			<button type="submit" name="customerssearchbutton" class="customers-search-submit"><i class="fas fa-search"></i></button></form>
			<form action="admin.php" method="post" style="position: absolute;"><button type="submit" name="refreshcustomersbutton" class="records-refresh-submit"><i class="fas fa-redo-alt"></i></button></form>
			</div>
			</div>
			<tr style="box-shadow: none;">
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Customer Contact Number</th>
			<th>Customer Additional Contact Number</th>
			</tr>
			<?php

				$con = mysqli_connect("localhost","root","root","peach'sdiner");

				if(mysqli_connect_errno())
				{
				die('Failed to connect to MySQL: ') . mysqli_connect_error();
				}
		
				$username = $_SESSION['admin'];

				
			if (isset($_POST['refreshcustomersbutton'])) {
				echo "<script>var modal14 = document.getElementById('modal14-customers-id');</script>";
				echo "<script>modal14.style.display='block';</script>";
				$read_customers_query = "SELECT * FROM accounts WHERE Account_Role != 'Admin' ORDER BY Account_ID ASC";
				$customers_results = mysqli_query($con, $read_customers_query);
			}

			if (isset($_POST['customerssearchbutton'])) {
				echo "<script>var modal14 = document.getElementById('modal14-customers-id');</script>";
				echo "<script>modal14.style.display='block';</script>";

			$search = mysqli_real_escape_string($con, $_POST['customerssearch']);

			if ($search == NULL) {
				echo "<script>alert('Please enter your input.');</script>";
				} elseif ($search != NULL) {

					$searchcustomersquery = "SELECT * FROM accounts WHERE Account_Role != 'Admin' AND (Account_ID LIKE '%". $search . "%' OR Account_First_Name LIKE '%". $search . "%' OR Account_Contact_Number1 LIKE '%". $search . "%' OR Account_Contact_Number2 LIKE '%". $search . "%')";
					$customers_results = mysqli_query($con,$searchcustomersquery);
				
					if (mysqli_num_rows($customers_results) <= 0) {
							echo "<script>alert('No results have found.');</script>";
					}
				}
			} else {

				$read_customers_query = "SELECT * FROM accounts WHERE Account_Role != 'Admin' ORDER BY Account_ID ASC";
				$customers_results = mysqli_query($con, $read_customers_query);

				if (!mysqli_query($con,$read_customers_query))
					{
						die('Error: ') . mysqli_error($con);
					} 	

				}
			while($customers_row = mysqli_fetch_array($customers_results))
			{
			echo "<tr>";
			echo "<th style='color:black'>" . $customers_row['Account_ID'] ."</th>";
			echo "<th style='color:black'>" . $customers_row['Account_First_Name'] . "</th>";
			echo "<th style='color:black'>" . $customers_row['Account_Contact_Number1'] . "</th>";
			if ($customers_row['Account_Contact_Number2'] == '') {
			echo "<th style='color:black'>-</th>";
			} else {
			echo "<th style='color:black'>" . $customers_row['Account_Contact_Number2'] . "</th>";
			}
			$customerid = $customers_row['Account_ID'];

			echo "<th class='cancel-booking-column'>";
			echo "<a class='cancel-booking-button' style='cursor:pointer; text-decoration:none; color:black;' onclick='openmodal2($customerid);' id='cancel-booking-id' name='delete-account'>Delete Account</a>";
			echo "</th>";
			echo "</tr>";
			
			}
			mysqli_close($con);

			?>
			</table>
			<a class="modal-button modal-cancel modal14-exit" id="cancel14-button" style="background-color:black; color:white;">Exit</a>
		</div>
	</div>



	<div id="modal11-records-id" class="modal-records">
	<div class="modal-records-textbox">
		<a class="close11">&times;</a>
	<table>
	<form action="admin.php" method="post">
	<div class="records-search-container">
	<input type="text" name="search" class="records-search" id="searchid" placeholder="Search" pattern="[0-9A-Za-z:\s-]{1,10}" title="Only numbers, letters and symbols(: &amp; -). Minimum 1 character. Maximum 10 characters." onfocus="clearsearch()" onblur="setsearch()" required/>
	<button type="submit" name="searchbutton" class="records-search-submit"><i class="fas fa-search"></i></button></form>
	<form action="admin.php" method="post" style="position: absolute;"><button type="submit" name="refreshbutton" class="records-refresh-submit"><i class="fas fa-redo-alt"></i></button></form>
	</div>
	<h4 style="color:red">* Red-coloured details = Expired</h4>
	<tr style="box-shadow: none;">
	<th>Receipt ID</th>
	<th>Receipt Date</th>
	<th>Receipt Time</th>
	<th>Account ID</th>
	<th>Table ID</th>
	</tr>
	<?php

		$con = mysqli_connect("localhost","root","root","peach'sdiner");

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

		
		$username = $_SESSION['admin'];

	if (isset($_POST['refreshbutton'])) {
		echo "<script>var modal11 = document.getElementById('modal11-records-id');</script>";
		echo "<script>modal11.style.display='block';</script>";
		$read_receipts_query = "SELECT * FROM receipts ORDER BY Receipt_ID DESC";
		$receipts_results = mysqli_query($con, $read_receipts_query);
	}

	if (isset($_POST['searchbutton'])) {
		echo "<script>var modal11 = document.getElementById('modal11-records-id');</script>";
		echo "<script>modal11.style.display='block';</script>";

		$search = mysqli_real_escape_string($con, $_POST['search']);

			if ($search == NULL) {
				echo "<script>alert('Please enter your input.');</script>";
			} elseif ($search != NULL) {

				$searchquery = "SELECT * FROM receipts WHERE Receipt_ID LIKE '%". $search . "%' OR Receipt_Date LIKE '%". $search . "%' OR Receipt_Time LIKE '%". $search . "%' OR Account_ID LIKE '%". $search . "%' OR Table_ID LIKE '%". $search . "%' ";
				$receipts_results = mysqli_query($con,$searchquery);
				
			}

			if (mysqli_num_rows($receipts_results) <= 0) {
					echo "<script>alert('No results have found.');</script>";
			}

		} else {
		$read_receipts_query = "SELECT * FROM receipts ORDER BY Receipt_ID DESC";
		$receipts_results = mysqli_query($con, $read_receipts_query);

		
		if (!mysqli_query($con,$read_receipts_query))
			{
				die('Error: ') . mysqli_error($con);
			} 	
	}	
	while($receipts_row = mysqli_fetch_array($receipts_results))
	{
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$receiptdate = date("Y-m-d", strtotime($receipts_row['Receipt_Date']));
	$receipttime = date("H:i:s", strtotime($receipts_row['Receipt_Time']));
	if (($receiptdate == date("Y-m-d",time())) && ($receipttime < date("H:i:s",time())) || $receiptdate < date("Y-m-d",time())) {
	echo "<tr>";
	echo "<th style='color:red'>" . $receipts_row['Receipt_ID'] ."</th>";
	echo "<th style='color:red'>" . $receipts_row['Receipt_Date'] . "</th>";
	echo "<th style='color:red'>";
	if (date("H:i", strtotime($receipts_row['Receipt_Time'])) > date("H:i", strtotime(11))) { echo date("H:i", strtotime($receipts_row['Receipt_Time'])) . ' P.M.'; } else {echo date("H:i", strtotime($receipts_row['Receipt_Time'])) . ' A.M.'; } ;
	echo "</th>";
	echo "<th style='color:red'>" . $receipts_row['Account_ID'] . "</th>";
	echo "<th style='color:red'>" . $receipts_row['Table_ID'] . "</th>";
	echo "</tr>";
	} else {
	echo "<tr>";
	echo "<th style='color:black'>" . $receipts_row['Receipt_ID'] ."</th>";
	echo "<th style='color:black'>" . $receipts_row['Receipt_Date'] . "</th>";
	echo "<th style='color:black'>";
	if (date("H:i", strtotime($receipts_row['Receipt_Time'])) > date("H:i", strtotime(11))) { echo date("H:i", strtotime($receipts_row['Receipt_Time'])) . ' P.M.'; } else {echo date("H:i", strtotime($receipts_row['Receipt_Time'])) . ' A.M.'; } ;
	echo "</th>";
	if ($receipts_row['Account_ID'] == '') {
	echo "<th style='color:black'>No ID</th>"; 
	} elseif(!$receipts_row['Account_ID'] == '') {
	echo "<th style='color:black'>" . $receipts_row['Account_ID'] . "</th>"; 
	}
	echo "<th style='color:black'>" . $receipts_row['Table_ID'] . "</th>";
	echo "</tr>";
	}
	}
	
	mysqli_close($con);
	?>
	</table>
		<a class="modal-button modal-cancel modal11-exit" id="cancel11-button" style="background-color:black; color:white;">Exit</a>
		</div>
	</div>



	<div id="modal2-settings-id" class="modal-settings">
		<div class="modal-settings-textbox">
	<a class="close2">&times;</a>
	<h4>Settings</h4>
	<div style="margin-bottom: 2em;">
	<span class="settings-title" id="chg_pass_title">Change Password</span><i class="fas fa-pencil-alt edit-icon" style="font-size: 1.3em;" id="password-change-icon"></i>
		<div class="settings-password" id="change-password">
		<span class="settings-title settings-password-title">Old Password</span>
		<span class="settings-title settings-password-title">New Password</span>
		<span class="settings-title settings-password-title">Confirm Password</span>
		<form action="admin.php" method="post">
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
			<a class="modal-button modal-cancel" id="cancel2-button" style="background-color:black; color:white; cursor:pointer;">Exit</a>
	</div>
	</div>

			
	<div id="modal20-password-id" class="modal-password-del">

		<div class="modal-password-del-textbox">
		<a class="close20">&times;</a>
		<span class="modal-text">Please input your password to proceed the deletion.</span>
		<form action="admin.php" method="post">
		<div class="modal-pass-container">
		<input type="password" name="delpass" id="password_id" class="modal-pass-input" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." placeholder="Password" value="" onfocus='clearpassword()' onblur='setpassword()' required autofocus/>
		</div>
		<input type="text" name="del-pass-value" id="password-value-id" pattern="[0-9]{1,6}" hidden/>
		<a class="modal-button modal-cancel" id="cancel20-button">Cancel</a>
		<input type="submit" class="modal-button modal-proceed" name="proceed-del" value="Proceed"/>
		</form>
	</div>
	</div>

	<?php 
	
	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	if(isset($_POST['proceed-del'])){
	
	if(mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
	}

	$password = mysqli_real_escape_string($con, $_POST['delpass']);
	$delpassword = mysqli_real_escape_string($con, $_POST['del-pass-value']);
	$username = $_SESSION['admin'];
	$user_pw_check = "SELECT * FROM accounts WHERE Account_Username='$username' LIMIT 1";
    $result = mysqli_query($con, $user_pw_check);
    $user = mysqli_fetch_assoc($result);

	echo "<script>var modal20 = document.getElementById('modal20-password-id');</script>";
	echo "<script>var modal14 = document.getElementById('modal14-customers-id');</script>";

	if ($user) { 
    if (!(password_verify($password,$user['Account_Password']))) {
		echo "<script>
			window.alert(\"Password does not match.\");
			modal14.style.display = \"block\";
			password_id.select();
			password_id.value = \"\";
		</script>";
	} else  {

		$update_reserve_query = "UPDATE reservations as r
								JOIN accounts as c 
								ON r.Account_ID = c.Account_ID
								SET r.Account_ID = NULL
								WHERE c.Account_ID = '$delpassword'";
		$update_receipt_query = "UPDATE receipts as rc
								JOIN accounts as c 
								ON rc.Account_ID = c.Account_ID
								SET rc.Account_ID = NULL
								WHERE c.Account_ID = '$delpassword'";
		$query = "DELETE FROM accounts WHERE Account_ID='$delpassword' LIMIT 1";

		if (mysqli_query($con,$update_receipt_query))
		{
			if (mysqli_query($con,$update_reserve_query))
				{
				if (mysqli_query($con,$query))
				{
				session_write_close();
  				echo "<script>
					window.alert(\"Account deleted.\");
					window.location.href='admin.php';
					modal14.style.display = \"block\";
					modal20.style.display = \"block\";
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

	<?php

		echo "<script>var modal2 = document.getElementById('modal2-settings-id');</script>";

		$con = mysqli_connect("localhost","root","root","peach'sdiner");
		
		if (isset($_POST['pass-tick'])) {

		$oldpass = mysqli_real_escape_string($con, $_POST['old_password']);
		$newpass = mysqli_real_escape_string($con, $_POST['new_password']);
		$confirmpass = mysqli_real_escape_string($con, $_POST['confirm_password']);
		$username = $_SESSION['admin'];

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


	
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="typingtext.js"></script>
    <script src="cleartext.js"></script>
    <script src="modal11.js"></script>
    <script src="modal12.js"></script>
    <script src="modal13.js"></script>
    <script src="modal14.js"></script>
    <script src="modal18.js"></script>
    <script src="modal20.js"></script>
    <script src="modal8.js"></script>
    <script src="modal9.js"></script>
	<script src="inputshow2.js"></script>

</body>
</html>