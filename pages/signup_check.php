<?php 
session_start(); 
include "../database/db_conn.php";

if (isset($_POST['email']) && isset($_POST['name'])
    && isset($_POST['password']) && isset($_POST['c_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$c_pass = validate($_POST['c_password']);
	$name = validate($_POST['name']);


	if (empty($email)) {
		header("Location: signup.php?error=Email is required&$name");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$name");
	    exit();
	}
	else if(empty($c_pass)){
        header("Location: signup.php?error=Confirm Password is required&$name");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$name");
	    exit();
	}

	else if($pass !== $c_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$name");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM friends WHERE friend_email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The email is taken try another&$name");
	        exit();
		}else {
           $sql2 = "INSERT INTO friends(friend_email, password, profile_name) VALUES('$email', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$name");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
