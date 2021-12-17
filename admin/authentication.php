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
	$sqlquery = "SELECT * FROM admin WHERE admin.id = '$_SESSION[id]'";

	//take data from database
	$data = mysqli_query($conect, $sqlquery);

	//convert 2D array to 1D array
	$row = mysqli_fetch_array($data);
	

	//check user info for login
	if($id == $row['id']){
		if($password == $row['password']){
			//login successful
			header("location:http://localhost/blood-donation/admin/adminprofile.php");
		}
		else{
			//login fail
			header("location:http://localhost/blood-donation/admin/");
		}
	}
	else{
		//login fail
		header("location:http://localhost/blood-donation/admin/");
	}
?>