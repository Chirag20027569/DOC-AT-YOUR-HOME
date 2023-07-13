<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hospital');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
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
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}




//Appointments
if (isset($_POST['appointment'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $doc = mysqli_real_escape_string($db, $_POST['doc']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  $symptoms = mysqli_real_escape_string($db, $_POST['symptoms']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($number)) { array_push($errors, "Number is required"); }
  if ($doc == "Select Docter") {
	array_push($errors, "Select a doctor from the List");
  }
  if ($time == "Select Time") {
    array_push($errors, "Select a time from the List");
    }
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($symptoms)) { array_push($errors, "Symptoms is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO appointments (name, number, email,date,doc,time,symptoms) 
  			  VALUES('$name','$number', '$email', '$date','$doc','$time','$symptoms')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $name;
  	$_SESSION['success'] = "Your appointment is Booked";
  	//header('location: appointment.php');
  }
}



//LabTests
if (isset($_POST['labtest'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $lab = mysqli_real_escape_string($db, $_POST['lab']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($number)) { array_push($errors, "Number is required"); }
  if ($doc == "Select LAB TEST") {
	array_push($errors, "Select a lab test from the List");
  }
  if ($time == "Select Time") {
    array_push($errors, "Select a time from the List");
    }
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($address)) { array_push($errors, "Symptoms is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO labtest (name, number, email,date,labtest,time,address) 
  			  VALUES('$name','$number', '$email', '$date','$lab','$time','$address')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $name;
  	$_SESSION['success'] = "Your LabTest is Booked";
  	//header('location: appointment.php');
  }
}




//Ambulance
if (isset($_POST['ambulance'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $ambulancetype = mysqli_real_escape_string($db, $_POST['ambulancetype']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($number)) { array_push($errors, "Number is required"); }
  if ($ambulancetype == "Select Ambulance") {
	array_push($errors, "Select a Ambulance type from the List");
  }
  if ($time == "Select Time") {
    array_push($errors, "Select a time from the List");
    }
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($address)) { array_push($errors, "Symptoms is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO ambulances (name, number, email,date,ambulance,time,address) 
  			  VALUES('$name','$number', '$email', '$date','$ambulancetype','$time','$address')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $name;
  	$_SESSION['success'] = "Your Ambulance is Booked";
  	//header('location: appointment.php');
  }
}


//Dental Services
if (isset($_POST['dental'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $dentaltype = mysqli_real_escape_string($db, $_POST['dentaltype']);
  $time = mysqli_real_escape_string($db, $_POST['time']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($number)) { array_push($errors, "Number is required"); }
  if ($dentaltype == "Select procedures") {
	array_push($errors, "Select a procedures type from the List");
  }
  if ($time == "Select Time") {
    array_push($errors, "Select a time from the List");
    }
  if (empty($date)) { array_push($errors, "Date is required"); } 
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO dentals (name, number, email,date,dental,time) 
  			  VALUES('$name','$number', '$email', '$date','$dentaltype','$time')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $name;
  	$_SESSION['success'] = "Your Denatl appointment is Booked";
  	//header('location: appointment.php');
  }
}

if (isset($_POST['homecare'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $date = mysqli_real_escape_string($db, $_POST['Startdate']);
  $packages = mysqli_real_escape_string($db, $_POST['packages']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($number)) { array_push($errors, "Number is required"); }
  if ($packages == "Select packages") {
	array_push($errors, "Select a packages type from the List");
  }
  if (empty($date)) { array_push($errors, "Date is required"); }
  if (empty($address)) { array_push($errors, "Symptoms is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO homecares (name, number, email,date,packages,address) 
  			  VALUES('$name','$number', '$email', '$date','$packages','$address')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $name;
  	$_SESSION['success'] = "Your package is Booked";
  	//header('location: appointment.php');
  }
}
?>
