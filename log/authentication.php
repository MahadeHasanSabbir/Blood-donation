<?php
	session_start();
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");
	
	//local variable
	$id = $_POST['id'];
	$password = $_POST['password'];
	
	//create a supper global variable
	$_SESSION['id'] = $id;
	
	//sql query to find user information from database
	$sqlquery = "SELECT * FROM donorlog WHERE donorlog.id = '$_SESSION[id]'";

	//take data from database
	$data = mysqli_query($conect, $sqlquery);

	//convert 2D array to 1D array
	$row = mysqli_fetch_array($data);
	mysqli_close($conect);

	//check user info for login
	if($id == $row['id']){
		if($password == $row['password']){
			//login successful
			header("location:http://localhost/blood-donation/log/signprofile.php");
		}
		else{
			//login fail
			header("location:http://localhost/blood-donation/log/login.php");
		}
	}
	else{
		//login fail
		header("location:http://localhost/blood-donation/log/login.php");
	}
?>