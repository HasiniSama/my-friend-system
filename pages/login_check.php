<?php 
session_start(); 
include "../database/db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM friends WHERE friend_email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['friend_email'] === $email && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['friend_email'];
            	$_SESSION['name'] = $row['profile_name'];
            	$_SESSION['id'] = $row['friend_id'];
				$_SESSION['count'] = $row['num_of_friends'];
            	header("Location: friendlist.php");
		        exit();
            }else{
				header("Location: login.php?error=Incorect email or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect email or password");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}