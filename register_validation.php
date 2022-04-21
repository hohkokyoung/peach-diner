<?php

	session_start();

	
	$con = mysqli_connect("localhost","root","root","peach'sdiner");

    $first_name = "";
    $last_name = "";
    $date_of_birth = "";
    $cont_number_1 = "";
    $cont_number_2 = "";
    $email_1    = "";
    $email_2    = "";
    $username = "";
    $errors = array();

    if (isset($_POST['register'])) {

	//Check connection

	if(mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: ') . mysqli_connect_error();
	}

	date_default_timezone_set("Asia/Kuala_Lumpur");

    //Receives all the input.

    $first_name = mysqli_real_escape_string($con, $_POST['fname']);
    $last_name = mysqli_real_escape_string($con, $_POST['lname']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['dateob']);
    $cont_number_1 = strval(mysqli_real_escape_string($con, $_POST['cont_num']));
    $cont_number_2 = strval(mysqli_real_escape_string($con, $_POST['add_cont_num']));
    $email_1 = mysqli_real_escape_string($con, $_POST['email']);
    $email_2 = mysqli_real_escape_string($con, $_POST['add_email']);
    $username = mysqli_real_escape_string($con, $_POST['reg_username']);
    $password = mysqli_real_escape_string($con, $_POST['reg_pass']);
    $con_password = mysqli_real_escape_string($con, $_POST['reg_con_pass']);

	//Check the database to make sure a user does not already exist with the same username and/or email.

    $user_dupli_check = "SELECT * FROM accounts WHERE Account_Username='$username' OR Account_Email_Address1='$email_1'";
    $user_dupli_check2 = "SELECT * FROM accounts WHERE Account_Username='$username' OR Account_Email_Address2='$email_1'";
	$user_dupli_check3 = "SELECT * FROM accounts WHERE Account_Username='$username' OR Account_Email_Address1='$email_2'";
	$user_dupli_check4 = "SELECT * FROM accounts WHERE Account_Username='$username' OR Account_Email_Address2='$email_2'";
    $result = mysqli_query($con, $user_dupli_check);
    $result2 = mysqli_query($con, $user_dupli_check2);
    $result3 = mysqli_query($con, $user_dupli_check3);
    $result4 = mysqli_query($con, $user_dupli_check4);
    $user = mysqli_fetch_array($result);
    $user2 = mysqli_fetch_array($result2);
    $user3 = mysqli_fetch_array($result3);
    $user4 = mysqli_fetch_array($result4);

	//Check if user exists

    if ($user) { 
    if ($user['Account_Username'] == $username) {
		array_push($errors, "Username already exists.");
    }

    if ($user['Account_Email_Address1'] == $email_1) {
		array_push($errors, "Email already exists.");
    }
	}

	if ($user2) {
	if ($user2['Account_Email_Address2'] == $email_1) {
	array_push($errors, "Email already exists.");
    }
	}

	if ($user3) {
	if ($user3['Account_Email_Address1'] == $email_2) {
	array_push($errors, "Email already exists.");
    }
	}

	if ($user4) {
	if ($user4['Account_Email_Address2'] == $email_2 && $email_2 != '') {
	array_push($errors, "Email already exists.");
    }
	}

    //Ensure the form is correctly filled.

    if (empty($first_name)) { array_push($errors, "First name is required."); }
    if (empty($last_name)) { array_push($errors, "Last name is required."); }
    if (empty($date_of_birth)) { array_push($errors, "Date of birth is required."); }
    if (18 + (date("Y",strtotime($date_of_birth))) > date("Y",time())) { array_push($errors, "Only 18 years old or older."); }
    if (empty($cont_number_1)) { array_push($errors, "Contact number is required."); }
    if ($cont_number_1 == $cont_number_2) { array_push($errors, "Contact number cannot be the same."); }
    if (empty($email_1)) { array_push($errors, "Email address is required."); }
    if ($email_1 == $email_2) { array_push($errors, "Email address cannot be the same."); }
    if (empty($username)) { array_push($errors, "Username is required."); }
    if (empty($password)) { array_push($errors, "Password is required."); }
    if ($password != $con_password) {
    array_push($errors, "The passwords do not match.");
    }


    //Register user if there are no errors

    if (count($errors) == 0) {
	$enc_password = password_hash($password, PASSWORD_DEFAULT);
	$dateob = date("Y-m-d", strtotime($date_of_birth));

    $query = "INSERT INTO accounts (Account_First_Name, Account_Last_Name, Account_Date_of_Birth, Account_Email_Address1, Account_Email_Address2, Account_Contact_Number1, Account_Contact_Number2, Account_Username, Account_Password, Account_Role) VALUES ('$first_name', '$last_name', '$dateob', '$email_1', '$email_2', '$cont_number_1', '$cont_number_2', '$username', '$enc_password', 'Customer')";

	if (!mysqli_query($con,$query))
    {
        die('Error: ') . mysqli_error($con);
    }
	session_write_close();
	echo "<script>
			window.alert(\"Registration Successful.\");
			window.location.href='login.php';
		  </script>";
	mysqli_close($con);

    } else {
	echo "<script>
			window.alert(\"Registration Unsuccessful.\");
			window.location.href='register.php#register-id';
			</script>";
	}
    }

	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);

		  if (count($errors) == 0) {
				$query = "SELECT * FROM accounts WHERE Account_Username='$username'";
				$results = mysqli_query($con, $query);
				$row = mysqli_fetch_array($results);
				  	if (password_verify($password, $row['Account_Password']) && $row['Account_Role'] == 'Customer') {
					$_SESSION['username'] = $username;
					echo "<script>window.location.href='user.php';</script>";
					session_write_close();
					}
					 elseif(password_verify($password, $row['Account_Password']) && $row['Account_Role'] == 'Admin') {
					$_SESSION['admin'] = $username;
					echo "<script>window.location.href='admin.php';</script>";
					session_write_close();
					}else {
						session_write_close();
						array_push($errors, "Wrong Username/Password.");
					}
				}

				else {
					header("location: login.php");
					session_write_close();
					exit();
				}
	}

	mysqli_close($con);


?>