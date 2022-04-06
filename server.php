<?php
	session_start();
	$username = "";
	$email = "";
	$patient_first_name = "";
	$patient_last_name = "";
	$patient_date_of_birth = "";
	$patient_gender = "";
	$errors = array();

	$db = mysqli_connect('localhost', 'root', '', 'registration') or die($db);

	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$patient_first_name = mysqli_real_escape_string($db, $_POST['patient_first_name']);
		$patient_last_name = mysqli_real_escape_string($db, $_POST['patient_last_name']);
		$patient_date_of_birth = mysqli_real_escape_string($db, $_POST['patient_date_of_birth']);
		$patient_gender = mysqli_real_escape_string($db, $_POST['patient_gender']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		if (empty($patient_first_name)) {
			array_push($errors, "Patient First Name is required");
		}
		if (empty($patient_last_name)) {
			array_push($errors, "Patient Last Name is required");
		}
		if (empty($patient_date_of_birth)) {
			array_push($errors, "Patient Date Of Birth is required");
		}
		if (empty($patient_gender)) {
			array_push($errors, "Patient Gender is required");
		}
		if (count($errors) == 0) {
		    $password = md5($password_1);
		    $sql = "INSERT INTO users (username, email, password, pfname, plname, pdate, pgender) VALUES ('$username', '$email', '$password', '$patient_first_name', '$patient_last_name', '$patient_date_of_birth', '$patient_gender' )";
		    mysqli_query($db,$sql); 
		    $_SESSION['username'] = $username;
		    $_SESSION['success'] = "You are now logged in";
		    header('location: index.php');
		}
	}

	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) == 1) {

				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in ";
				header('location: index.php');
			}else{
				array_push($errors, "Incorrect username or password");
			}
		}
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
?>