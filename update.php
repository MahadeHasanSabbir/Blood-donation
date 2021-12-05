<?php
	session_start();
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//local variable
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$bg = $_POST['bloodgroup'];
	$id = $_SESSION['id'];
	$ldonet = $_POST['ldonet'];
	
	//sql query to find user information from database
	$sqlquery = "UPDATE tbdonner SET dname = '$name', sex = '$sex', dnumber = '$number', demail = '$email', daddress = '$address', dblood = '$bg', lddate = '$ldonet' WHERE tbdonner.id = '$id';";

	//method to update data from database
	$data = mysqli_query($conect, $sqlquery);
	
	//mehtod to redirect this page to another page
	header("location:http://localhost/blood-donation/signprofile.php?key=$id");
?>