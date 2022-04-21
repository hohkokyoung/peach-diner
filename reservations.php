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
    <title>Reservations</title>
    <link rel="stylesheet" href="backtotop.css" type="text/css" />
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="reservations.css" type="text/css" />
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

    <div class="reservations-hero">
        <div class="reservations-container">
            <div class="reservations-box">
                <div class="reservations-icon">
                    <i class="fas fa-door-open"></i>
                </div>
                <div class="reservations-content">
                    <h2>Opening Hours</h2>
                    <p>
                        Peach's Diner is open daily from 8:00 a.m. to 10:00 p.m.
                    </p>
                </div>
            </div>
            <div class="reservations-box">
                <div class="reservations-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="reservations-content">
                    <h2>Price</h2>
                    <p>
                        Our reservation price costs ranging from RM30 to RM50.
                    </p>
                </div>
            </div>
            <div class="reservations-box">
                <div class="reservations-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="reservations-content">
                    <h2>Seats</h2>
                    <p>
                        Peach's Diner provides 2, 4 & 8 people seats table.
                    </p>
                </div>
            </div>
        </div>
        <div class="reservations-arrow">
            <a href="#reservations"><i class="fas fa-arrow-down"></i></a>
        </div>

        <div class="reservations-timetable">
            <div class="reservations-container-textbox">
                <div class="reservations-textbox">
                    <h2 id="reservations">Reservations</h2>
                    <form class="reservations-form" action="reservations.php" method="post">
                        <select class="reservations-table" id="table" name="table" onchange="settable()">
                            <option value="1">Select Table</option>
                            <option value="2">1 Table 2 People</option>
                            <option value="4">1 Table 4 People</option>
                            <option value="8">1 Table 8 People</option>
                        </select>

                        <input type="date" class="reservations-date dateResv" name="date" id="dateResv" minDate = 0 onchange="timeCheck()" required />

                        <select class="reservations-time" name="time">
                            <option value="">Select Time</option>
                            <option value="08:00">08:00 AM</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                            <option value="17:00">05:00 PM</option>
                            <option value="18:00">06:00 PM</option>
                            <option value="19:00">07:00 PM</option>
                            <option value="20:00">08:00 PM</option>
                            <option value="21:00">09:00 PM</option>
                            <option value="22:00">10:00 PM</option>
                        </select>

                        <span style="font-family: 'Cutive Mono', sans-serif;">Total: <span class="reservations-total" id="total"></span></span>

                        <input type="submit" class="reservations-button" name="reserve" value="Reserve" id="reserve-id" />

                    </form>
                </div>
            </div>
        </div>
    </div>

	<div id="modal5-payment-id" class="modal-payment">
		<div class="modal-payment-textbox">
		<a class="close5">&times;</a>
		<h1>Payment</h1>
		<p class="payment-text">Choose a payment method.</p>
		<form action="reservations.php" method="post">
		<div class="payment-method-icon">
		<a><i class="fas fa-credit-card" id="credit-card-id"><p>Credit/Debit Card</p></i></a>
		<i class="fas fa-desktop" id="online-banking-id"><p>Online Banking</p></i>
		<i class="fab fa-paypal" id="paypal-id"><p>PayPal</p></i>
		<table id="online-banking-table-id">
		<tr>
		<td id="maybank-id">
			<img src="img/maybank.jpg" alt="Maybank icon"/>
		</td>
		<td id="cimb-id">
			<img src="img/cimb.png" alt="CIMB Bank icon"/>
		</td>
		<td id="publicbank-id">
			<img src="img/public.jpg" alt="Public Bank icon"/>
		</td>
		<td id="rhb-id">
			<img src="img/rhb.jpg" alt="RHB Bank icon"/>
		</td>
		<td id="hongleongbank-id">
			<img src="img/hongleongbank.jpg" alt="Hong Leong Bank icon"/>
		</td>
		</tr>
		</table>
			<input type="password" id="password-id" class="payment-password" name="password" placeholder="Password" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." onfocus='clearpassword()' onblur='setpassword()' value="" required />
		</div>
		<a class="modal-button modal-cancel" id="cancel5-button">Cancel</a>
		<input type="submit" class="modal-button modal-pay" id="pay-id" name="payment-pay" value="Pay"/>
		</form>
		</div>
	</div>

	<?php

	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	if(isset($_POST['reserve'])){

	if(mysqli_connect_errno())
	{
		echo "<script>alert(\"Failed to connect to MySQL: \");</script>" . mysql_connect_error();
	}

	if(isset($_SESSION['username']))
	{	

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$table = mysqli_real_escape_string($con, $_POST['table']);
	$date = mysqli_real_escape_string($con, $_POST['date']);
	$time = mysqli_real_escape_string($con, $_POST['time']);
	$reservedate = date("Y-m-d", strtotime($date));
	$reservetime = date("H:i:s", strtotime($time));


	$reserveta_query = "SELECT * FROM reservations AS r JOIN tables as t ON r.Table_ID = t.Table_ID WHERE t.Table_Seat = $table AND r.Reserve_Date = '$reservedate' AND r.Reserve_Time = '$reservetime'";
	$reserveta_result = mysqli_query($con, $reserveta_query);
	$num_reserveta_row = mysqli_num_rows($reserveta_result);

	$reservetb_query = "SELECT * FROM reservations AS r JOIN tables as t ON r.Table_ID = t.Table_ID WHERE t.Table_Seat = $table AND r.Reserve_Date = '$reservedate' AND r.Reserve_Time = '$reservetime'";
	$reservetb_result = mysqli_query($con, $reservetb_query);
	$num_reservetb_row = mysqli_num_rows($reservetb_result);

	$reservetc_query = "SELECT * FROM reservations AS r JOIN tables as t ON r.Table_ID = t.Table_ID WHERE t.Table_Seat = $table AND r.Reserve_Date = '$reservedate' AND r.Reserve_Time = '$reservetime'";
	$reservetc_result = mysqli_query($con, $reservetc_query);
	$num_reservetc_row = mysqli_num_rows($reservetc_result);

	if (($table == "1") || ($time == "") || empty($reservedate)) {
		echo "<script>alert('Please fill in all the required reservation details.');</script>";
		echo "<script>window.location.href='reservations.php#reserve-id'</script>";
	} elseif(($reservedate == date("Y-m-d",time())) && ($reservetime < date("H:i:s",time())) || date("Y-m-d",time()) > $reservedate) {
		echo "<script>alert('Please choose a later date and hour.');</script>";
		echo "<script>window.location.href='reservations.php#reserve-id'</script>";
	} else {
	if ($num_reserveta_row == 10 || $num_reservetb_row == 5 || $num_reservetc_row == 5)
	{
		echo "<script>alert('The table with the chosen amount of seats at the specific date and time is fully booked.\\nPlease kindly choose another option. Thank you.');</script>";
		echo "<script>window.location.href='reservations.php#reserve-id'</script>";
	} else {
		$_SESSION["table"] = $table;
		$_SESSION["date"] = $reservedate;
		$_SESSION["time"] = $reservetime;

		session_write_close();
		echo "<script>var modal5 = document.getElementById('modal5-payment-id');</script>";
		echo "<script>modal5.style.display='initial';</script>";
	}

	}

	} else {

		echo "<script>alert('Login is required to reserve.');</script>";
		echo "<script>window.location.href='login.php'</script>";
		session_write_close();
		exit();
	}
	}


	if(isset($_POST['payment-pay'])){

		if(mysqli_connect_errno())
		{
		echo "<script>alert(\"Failed to connect to MySQL: \");</script>" . mysql_connect_error();
		}

		$table = $_SESSION["table"];
		$reservedate = $_SESSION["date"];
		$reservetime = $_SESSION["time"];

		$password = mysqli_real_escape_string($con, $_POST['password']);

		if (empty($password)) { echo "<script>alert('Password is required.')</script>"; }
		else {
			
				$passwordquery = "SELECT * FROM accounts WHERE Account_Username='$username'";
				$passwordresults = mysqli_query($con, $passwordquery);
				$passwordrow = mysqli_fetch_array($passwordresults);
				$userid = $passwordrow['Account_ID'];

				if (password_verify($password, $passwordrow['Account_Password'])) {

				if ($table == 2) {

					$table_reserveta_query = "SELECT * FROM reservations AS r JOIN tables as t ON r.Table_ID = t.Table_ID WHERE t.Table_Seat = $table AND r.Reserve_Date = '$reservedate' AND r.Reserve_Time = '$reservetime' ORDER BY r.Table_ID ASC";
						$table_reserveta_result = mysqli_query($con, $table_reserveta_query);

						$storeArray = Array();
						while ($table_reserveta_row = mysqli_fetch_array($table_reserveta_result)) {
						 $storeArray[] =  $table_reserveta_row['Table_ID'];  
						}

	
						$table2_value = 1;
						$table2_overall = str_pad($table2_value, 5, "TA00" , STR_PAD_LEFT);
						$value = 0;

						if (isset($storeArray[$value]) == $table2_overall){
							
							for  ($count = 0; $count < 9; $count++) {
								$table2_value += 1;
								$table2_overall = str_pad($table2_value, 5, "TA00" , STR_PAD_LEFT);
								
									$value++;
								if (isset($storeArray[$value]) != $table2_overall) { 

									$table_data = $table2_overall;
									break;
								}

							}
												
						} else {
						$table_data = $table2_overall;

						}	
				}	elseif ($table == 4) { 
						$table_reservetb_query = "SELECT * FROM reservations AS r JOIN tables as t ON r.Table_ID = t.Table_ID WHERE t.Table_Seat = $table AND r.Reserve_Date = '$reservedate' AND r.Reserve_Time = '$reservetime' ORDER BY r.Table_ID ASC";
						$table_reservetb_result = mysqli_query($con, $table_reservetb_query);

						$storeArray = Array();
						while ($table_reservetb_row = mysqli_fetch_array($table_reservetb_result)) {
						 $storeArray[] =  $table_reservetb_row['Table_ID'];  
						}

	
						$table4_value = 1;
						$table4_overall = str_pad($table4_value, 5, "TB00" , STR_PAD_LEFT);
						$value = 0;

						if (isset($storeArray[$value]) == $table4_overall){
							
							for  ($count = 0; $count < 4; $count++) {
								$table4_value += 1;
								$table4_overall = str_pad($table4_value, 5, "TB00" , STR_PAD_LEFT);

									$value++;
								if (isset($storeArray[$value]) != $table4_overall){ 

									$table_data = $table4_overall;
									break;
								}

							}
												
						} else {
						$table_data = $table4_overall;
							
						}} elseif ($table == 8) {
						
						$table_reservetc_query = "SELECT * FROM reservations AS r JOIN tables as t ON r.Table_ID = t.Table_ID WHERE t.Table_Seat = $table AND r.Reserve_Date = '$reservedate' AND r.Reserve_Time = '$reservetime' ORDER BY r.Table_ID ASC";
						$table_reservetc_result = mysqli_query($con, $table_reservetc_query);

						$storeArray = Array();
						while ($table_reservetc_row = mysqli_fetch_array($table_reservetc_result)) {
						 $storeArray[] =  $table_reservetc_row['Table_ID'];  
						}

	
						$table8_value = 1;
						$table8_overall = str_pad($table8_value, 5, "TC00" , STR_PAD_LEFT);
						$value = 0;

						if (isset($storeArray[$value]) == $table8_overall){
							
							for  ($count = 0; $count < 4; $count++) {
								$table8_value += 1;
								$table8_overall = str_pad($table8_value, 5, "TC00" , STR_PAD_LEFT);

									$value++;
								if (isset($storeArray[$value]) != $table8_overall){ 

									$table_data = $table8_overall;
									break;
								}

							}
												
						} else {
						$table_data = $table8_overall;
							
						} 	
						}
					$insertreservequery = "INSERT INTO reservations (Account_ID, Table_ID, Reserve_Date, Reserve_Time) VALUES ($userid,'$table_data','$reservedate','$reservetime')";
					$insertreceiptquery = "INSERT INTO receipts (Receipt_Date, Receipt_Time, Account_ID, Table_ID) VALUES ('$reservedate','$reservetime',$userid,'$table_data')";


	
					if (mysqli_query($con,$insertreservequery))
					{
						if (mysqli_query($con,$insertreceiptquery)) {

							echo "<script>alert(\"Thank you for booking at Peach's Diner.\");
								</script>";


							echo "<script>window.location.href='receipts.php'</script>";

							session_write_close();
						
						}
					 else {
						die('Error: ') . mysqli_error($con);

					}
					} 
					
			} else {
				echo "<script>var modal5 = document.getElementById('modal5-payment-id');</script>";
				echo "<script>modal5.style.display='initial';</script>";
				echo "<script>alert('Password is incorrect.');</script>";
			}
			
	}
	}
	mysqli_close($con);
	?>

	<script src="http://code.jquery.com/jquery-3.3.1.js"></script>

	<script>

		var dateResv = document.getElementById('dateResv');
		var date = new Date();
		var day = date.getDate();
		var month = date.getMonth() + 1;
		var year = date.getFullYear();
		var currentDate = year + "-" + month + "-" + day;
		$('.dateResv').attr('min', currentDate);

		function timeCheck() {
			<?php
				
					$con = mysqli_connect("localhost","root","root","peach'sdiner");

					$sqlCheckTime= "SELECT * FROM ";

			?>
		}
		

	</script>

    <script src="cleartext.js"></script>
    <script src="modal5.js"></script>
    <script src="modal6.js"></script>

</body>
</html>