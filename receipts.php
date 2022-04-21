<?php 

	session_start(); 

	if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	}

	if (isset($_GET['logout'])) {
  	session_destroy();
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
    <title>Receipt</title>
    <link rel="stylesheet" href="backtotop.css" type="text/css" />
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="receipts.css" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
</head>
<body>

    <script src="backtotop.js"></script>

    <button onclick="backtotop()" id="back-to-top" title="Back to top"><img src="img/peach6.png" alt="Peach logo" class="logo" /></button>

    <?php 

	$con = mysqli_connect("localhost","root","root","peach'sdiner");

    $read_payment_query = "SELECT * FROM receipts as rc JOIN accounts as a ON rc.Account_ID = a.Account_ID JOIN tables as t ON rc.Table_ID = t.Table_ID ORDER BY Receipt_ID DESC ";
    $read_payment_results = mysqli_query($con, $read_payment_query);
	$receipt_row = mysqli_fetch_array($read_payment_results);

    ?>

    	<div id="modal6-receipt-id" class="modal-receipt">
		<div class="modal-receipt-textbox">
		<table>
		<tr>
		<th colspan="2">Receipt</th>
		</tr>
		<tr>
		<td class="receipt-thankyou" colspan="2">We will wait for your arrival.</td>
		</tr>
		<tr>
		<td class="receipt-data">Name:</td>
		<td class="receipt-info"><?php echo $receipt_row['Account_First_Name']; ?></td>
		</tr>
		<tr>
		<td class="receipt-data">Table ID:</td>
		<td class="receipt-info"><?php echo $receipt_row['Table_ID']; ?></td>
		</tr>
		<tr>
		<td class="receipt-data">Table Type:</td>
		<td class="receipt-info"><?php echo $receipt_row['Table_Seat'] . ' People Seats' ?></td>
		</tr>
		<tr>
		<td class="receipt-data">Date:</td>
		<td class="receipt-info"><?php echo $receipt_row['Receipt_Date']; ?></td>
		</tr>
		<tr>
		<td class="receipt-data receipt-time">Time:</td>
		<td class="receipt-info"><?php if (date("H:i", strtotime($receipt_row['Receipt_Time'])) > date("H:i", strtotime(11))) { echo date("H:i", strtotime($receipt_row['Receipt_Time'])) . ' P.M.'; } else {echo date("H:i", strtotime($receipt_row['Receipt_Time'])) . ' A.M.'; } ; ?></td>
		</tr>
		<tr>
		<td class="receipt-warning receipt-refund" colspan="2">Any booking made will not be refunded.</td>
		</tr>
		<tr>
		<td class="receipt-warning receipt-cancel" colspan="2">Please inform us in case of any delay during your arrival or else we will cancel your booking after 15 minutes.</td>
		</tr>
		</table>

		<a href="reservations.php" class="modal-button modal-cancel modal-okay" id="cancel6-button" autofocus>Okay</a>
		</div>
	</div>


</body>
</html>