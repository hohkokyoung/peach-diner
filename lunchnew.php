<?php 

	session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
  	unset($_SESSION['username']);
	session_write_close();
	}

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Lunch</title>
    <link rel="stylesheet" href="home.css" type="text/css" />
    <link rel="stylesheet" href="breakfastnew.css" type="text/css" />
    <link rel="stylesheet" href="backtotop.css" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
</head>
<body style="background-image: url(img/lunch-home.png);">

	
    <script src="backtotop.js"></script>

    <button onclick="backtotop()" id="back-to-top" title="Back to top"><img src="img/peach6.png" alt="Peach logo" class="logo" /></button>

    <header>
        <img src="img/peach6.png" alt="Peach logo" class="logo" />
        <h1>Peach's Diner</h1>
        <nav>
            <ul>
			<?php if (!isset($_SESSION['admin'])) { ?>
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
				<?php } else { ?>
				<?php } ?>
                <li>
                    <div class="dropdown-login">
						<?php  if (isset($_SESSION['username'])) { ?>
							<?php echo "<a href='user.php'>" . $_SESSION['username'] . "</a>"; ?><i class="fa fa-caret-down"></i>
							<?php } elseif (isset($_SESSION['admin'])) { ?>
							<?php echo "<a href='admin.php'>" . $_SESSION['admin'] . "</a>"; ?><i class="fa fa-caret-down"></i>
                            <?php } else { ?>
							<?php echo "<a href='login.php'>Login</a>"; ?><i class="fa fa-caret-down"></i>
							<?php } ?>
                        <div class="dropdown-content-login">
						<?php  if (isset($_SESSION['username']) || isset($_SESSION['admin'])) { ?>
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

	  <div id="modal15-breakfast-id" class="modal-breakfast">
        <div class="modal-breakfast-textbox">
            <h2>Lunch</h2>
			<?php

			$con = mysqli_connect("localhost","root","root","peach'sdiner");

				if(mysqli_connect_errno())
				{
				die('Failed to connect to MySQL: ') . mysqli_connect_error();
				}

				$readlunchquery = "SELECT * FROM lunch";
				$lunch_results = mysqli_query($con,$readlunchquery);

			if (!mysqli_query($con,$readlunchquery))
					{
						die('Error: ') . mysqli_error($con);
					} 	

			while($lunch_row = mysqli_fetch_array($lunch_results)) 

			{  echo '<table id="breakfast-table-id">';
				echo '<form action="lunchnew.php" method="post" enctype="multipart/form-data">';
                echo '<div class="breakfast-dish-container">';
                echo '<tr>';
                  echo '<td rowspan="5" id="breakfast-dish-image-display-id" class="breakfast-display"><img class="breakfast-image" id="image" src="../Peach\'s Diner/img/' . $lunch_row['Lunch_Image'] . '" alt="Breakfast dish image" /></td>';
				  echo '</tr>';
				  echo '<tr>';
				  echo '<td class="breakfast-display" id="breakfast-dish-display-id">'. $lunch_row['Lunch_Name'] . '</td>';
                    echo '<td class="price breakfast-display" id="breakfast-price-display-id">'. $lunch_row['Lunch_Price'] . '</td>';
					echo '</td>';
                echo '</tr>';
                echo '<tr>';
				echo '<td class="breakfast-display" id="breakfast-description-display-id">' . $lunch_row['Lunch_Description'] . '</td>';
				
				$lunchid = $lunch_row['Lunch_ID'];
				if (isset($_SESSION['admin'])) {
				echo '<td><i class="fas fa-edit" title="Edit" onclick="openedit('.$lunchid.')" id="edit-id"></i><i class="fas fa-trash-alt" title="Delete" id="trash-id" onclick="openmodal('.$lunchid.');"></i></td>';
                } else {
					echo '<td></td>';
				}
				echo '</tr>';
                echo '</div>';
				echo '</form>';
            echo '</table>';

			}

			session_write_close();

			mysqli_close($con);
		?>


		<?php 

			if (isset($_SESSION['admin'])) {

            echo '<table id="breakfast-table-id-plus">';
				echo '<form action="lunchnew.php" method="post" enctype="multipart/form-data">';
                echo '<div class="breakfast-dish-container">';
                echo '<tr>';
                  echo '<td rowspan="3" id="breakfast-dish-image-display-id-plus" class="breakfast-display" style="display: none;"> <img class="breakfast-image" id="image" src="img/breakfast.jpg" alt="Breakfast dish image" /></td>';
				 		echo '<td rowspan="3" id="breakfast-dish-image-input-id-plus" class="breakfast-input"><input type="file" class="image-input" id="file" name="file" onchange="readimage(img)"/><label for="file"><i class="fas fa-camera"></i></label></td>';

				 echo '<td class="breakfast-display" id="breakfast-dish-display-id" style="display: none;">Breakfast Sandwich';
                    echo '</td>';
					echo '<td class="breakfast-input" id="breakfast-dish-input-id-plus">Dish: <input type="text" name="dish" id="breakfast-dish" class="dish-input" pattern="[0-9A-Za-z\s&]{1,50}" title="Letters, numbers and symbols(&amp;) only." placeholder="Breakfast Sandwich" onfocus="clearbreakfastdish()" onblur="setbreakfastdish()" required/></td>';
                    echo '<td class="price breakfast-display" id="breakfast-price-display-id-plus" style="display: none;">RM 10.00';
                    echo '</td>';
					echo '<td class="breakfast-input" id="breakfast-price-input-id-plus">Price: <input type="text" id="price-id" name="price" class="price-input" pattern="[0-9A-Z\s.]{1,9}" title="Capital letters, numbers and symbols(.) only." onfocus="clearprice()" onblur="setprice()" placeholder="RM 10.00" required/>';
					echo '</td>';
                echo '</tr>';
                echo '<tr>';
				echo '<td class="breakfast-display" id="breakfast-description-display-id-plus" style="display: none;">Ham, egg and cheese on texas toast.</td>';
				echo '<td class="breakfast-input" id="breakfast-description-input-id-plus">Description: <input type="text" id="breakfast-description" name="dish-description" class="dish-description-input" placeholder="Ham, egg and cheese on texas toast." pattern="[0-9A-Za-z-\s,./\']{1,50}" title="Letters, numbers and symbols(, &amp; . &amp; / &amp; \' &amp; -) only.  Maximum 50 characters." onfocus="clearbreakfastdishdescription()" onblur="setbreakfastdishdescription()" required/></td>';
                echo '<td><button type="submit" class="edit-submit-tick" name="edit-submit-plus" id="tick-id-plus"><i class="fas fa-check edit-tick"></i></button><i class="fas fa-times edit-cross" id="cross-id-plus"></i></td>';
                echo '</tr>';
                echo '</div>';
				echo '</form>';
            echo '</table>';
        echo '<h3 id="plus-id"><i class="fas fa-plus"></i></h3>';
		} else {
		
		}

		?>
			

        </div>
    </div>

		
	<div id="modal21-editbreakfast-id" class="modal-editbreakfast">

	<div class="modal-editbreakfast-textbox">
		<form action="lunchnew.php" method="post" enctype="multipart/form-data">
		<h3 id="breakfast-dish-image-input-id-plus" class="modal-breakfast modal-breakfast-image"><input type="file" class="modal-image" id="updatefile" name="updatefile" onchange="readimage(img)"/><label for="updatefile"><i class="fas fa-camera"></i></label></h3>
		<h3 class="modal-breakfast modal-breakfast-dish" id="breakfast-dish-input-id-plus">Dish: <input type="text" name="updatedish" id="breakfast-dish" class="modal-dish" pattern="[0-9A-Za-z\s&]{1,50}" title="Letters, numbers and symbols(&amp;) only." placeholder="Breakfast Sandwich" onfocus="clearbreakfastdish()" onblur="setbreakfastdish()" required/></h3>
		<h3 class="modal-breakfast modal-breakfast-price" id="breakfast-price-input-id-plus">Price: <input type="text" id="price-id" name="updateprice" class="modal-price" pattern="[0-9A-Z\s.]{1,9}" title="Capital letters, numbers and symbols(.) only." onfocus="clearprice()" onblur="setprice()" placeholder="RM 10.00" required/>
		</h3>
		<input type="text" name="update-breakfast-value" id="update-breakfast-id" pattern="[0-9]{1,6}" hidden/>
		<h3 class="modal-breakfast modal-breakfast-description" id="breakfast-description-input-id-plus">Description: <input type="text" id="breakfast-description" name="updatedish-description" class="modal-description" placeholder="Ham, egg and cheese on texas toast." pattern="[0-9A-Za-z-\s,./\']{1,50}" title="Letters, numbers and symbols(, &amp; . &amp; / &amp; \' &amp; -) only.  Maximum 50 characters." onfocus="clearbreakfastdishdescription()" onblur="setbreakfastdishdescription()" required/></h3>
        <h3><button type="submit" class="edit-submit-tick" name="edit-submit" id="tick-id-plus"><i class="fas fa-check edit-tick"></i></button><i class="fas fa-times edit-cross" id="cross-id"></i></h3>
		</form>
	</div>

	</div>

	<div id="modal19-deletebreakfast-id" class="modal-cancelbooking">

	<div class="modal-cancelbooking-textbox">
		<a class="close19">&times;</a>
		<h4>Are you sure?</h4>
		<h4>Please enter your password to delete this menu.</h4>
		<div class="modal-cancelbooking-container">
		<form action="lunchnew.php" method="post">
		<input type="password" name="deletepass" id="password" placeholder="Password" class="modal-cancelbooking-input" pattern="[0-9A-Za-z]{4,8}" title="Can be letters and/or numbers. Minimum 4 characters. Maximum 8 characters." onfocus='clearpassword()' onblur='setpassword()' value="" required autofocus/>
		</div>
		<input type="text" name="delete-breakfast-value" id="delete-breakfast-id" pattern="[0-9]{1,6}" hidden/>
		<a class="modal-button modal-no" id="cancel19-button">No</a>
		<input type="submit" class="modal-button modal-yes" name="deleteyes" value="Yes"/>
		</form>
	</div>

	</div>

	<?php 
	
	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	if (isset($_POST['edit-submit-plus'])) {
	
	$username = $_SESSION['admin'];
	$user_pw_check = "SELECT * FROM accounts WHERE Account_Username='$username' LIMIT 1";
    $result = mysqli_query($con, $user_pw_check);
    $user = mysqli_fetch_assoc($result);
	$userid = $user['Account_ID'];

	if(mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
	}

	$breakfastname = mysqli_real_escape_string($con, $_POST['dish']);
    $breakfastdescription = mysqli_real_escape_string($con, $_POST['dish-description']);
    $breakfastprice = mysqli_real_escape_string($con, $_POST['price']);

	$target_dir = "../Peach's Diner/img/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]); 
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
	$image = $_FILES["file"]["name"];

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

	if ((!file_exists($_FILES["file"]["tmp_name"])) || empty($breakfastname) || empty($breakfastdescription) || empty($breakfastprice)) {
		echo "<script>alert('Please fill in all the details.');</script>";
    } elseif (!in_array($imageFileType, $allowed_image_extension)) {
		echo "<script>alert('Please choose a valid image.\\nPNG, JPG & JPEG.');</script>";
	} elseif (($_FILES["file"]["size"] > 5000000)) {
		echo "<script>alert('Only image below 5MB is allowed.');</script>";
	} else {
		 if (!(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))) {
			echo "<script>alert('There is an issue uploading the image.\\nPlease kindly choose another image.');</script>";
		} else {

			$insertbreakfastquery = "INSERT INTO lunch (Lunch_Name, Lunch_Description, Lunch_Price, Lunch_Image, Account_ID) VALUES ('$breakfastname', '$breakfastdescription', '$breakfastprice', '$image', '$userid')";

			if (mysqli_query($con,$insertbreakfastquery)) {

			echo "<script>alert(\"A menu has been successfully added.\");
			window.location.href='lunchnew.php';
			</script>";

			session_write_close();
						
		} else {
		die('Error: ') . mysqli_error($con);


		}
		}
	}
	}

	mysqli_close($con);

	?>

	<?php

	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	if (isset($_POST['edit-submit'])) {

	$username = $_SESSION['admin'];

	if(mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
	}

	$breakfastname = mysqli_real_escape_string($con, $_POST['updatedish']);
    $breakfastdescription = mysqli_real_escape_string($con, $_POST['updatedish-description']);
    $breakfastprice = mysqli_real_escape_string($con, $_POST['updateprice']);
	$updatebreakfastvalue = mysqli_real_escape_string($con, $_POST['update-breakfast-value']);

	$target_dir = "../Peach's Diner/img/";
	$target_file = $target_dir . basename($_FILES["updatefile"]["name"]); 
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
	$updateimage = $_FILES["updatefile"]["name"];

	  $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
	
	if ((!file_exists($_FILES["updatefile"]["tmp_name"])) || empty($breakfastname) || empty($breakfastdescription) || empty($breakfastprice)) {
		echo "<script>alert('Please fill in all the details.');</script>";
    } elseif (!in_array($imageFileType, $allowed_image_extension)) {
		echo "<script>alert('Please choose a valid image.\\nPNG, JPG & JPEG.');</script>";
	} elseif (($_FILES["updatefile"]["size"] > 5000000)) {
		echo "<script>alert('Only image below 5MB is allowed.');</script>";
	} else {
		 if (!(move_uploaded_file($_FILES["updatefile"]["tmp_name"], $target_file))) {
			echo "<script>alert('There is an issue uploading the image.\\nPlease kindly choose another image.');</script>";
		} else {

		$updatebreakfastquery = "UPDATE lunch SET Lunch_Name='$breakfastname', Lunch_Description='$breakfastdescription', Lunch_Price='$breakfastprice', Lunch_Image='$updateimage' WHERE Lunch_ID = '$updatebreakfastvalue'";

		if (mysqli_query($con,$updatebreakfastquery)) {

			echo "<script>alert(\"A menu has been successfully edited.\");
			window.location.href='lunchnew.php';
			</script>";

			session_write_close();
						
		} else {
		die('Error: ') . mysqli_error($con);

		}
	}
	}
	}

	session_write_close();

	mysqli_close($con);

	?>

	<?php 

	$con = mysqli_connect("localhost","root","root","peach'sdiner");

	if(isset($_POST['deleteyes'])) {

		if(mysqli_connect_errno())
		{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
		}

	$delpassword = mysqli_real_escape_string($con, $_POST['deletepass']);
	$delbreakfastvalue = mysqli_real_escape_string($con, $_POST['delete-breakfast-value']);
	$username = $_SESSION['admin'];
	$user_pw_check = "SELECT * FROM accounts WHERE Account_Username='$username' LIMIT 1";
    $result = mysqli_query($con, $user_pw_check);
    $users = mysqli_fetch_assoc($result);

	echo "<script>var modal19 = document.getElementById('modal19-deletebreakfast-id');</script>";
	
	if ($users) { 
    if (!(password_verify($delpassword,$users['Account_Password']))) {
		echo "<script>
			window.alert(\"Password does not match.\");
			password_id.select();
			password_id.value = \"\";
		</script>";
		} else  {

		$deletebreakfastquery = "DELETE FROM lunch WHERE Lunch_ID = '$delbreakfastvalue'";
		mysqli_query($con,$deletebreakfastquery);

		if(mysqli_affected_rows($con)>0) 
		{
		echo "<script>window.alert(\"Your menu has been deleted.\");</script>";
		echo "<script>window.location.href='lunchnew.php'</script>";
		} else {
			echo "<script>window.alert(\"Your menu cannot be deleted.\");</script>";
			echo "<script>window.location.href='lunchnew.php'</script>";
		}


		}
		}
	}
	session_write_close();

	mysqli_close($con);

	?>

	<script src="inputshow3.js"></script>
	<script src="modal19.js"></script>
	<script src="modal21.js"></script>
	<script src="cleartext.js"></script>

</body>
</html>