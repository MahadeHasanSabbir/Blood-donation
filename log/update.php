<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");
		$id = $_SESSION['id'];

		//local variable
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$bg = $_POST['bloodgroup'];
		$ldonate = $_POST['ldonate'];
		$password = $_POST['password'];
		
		//process profile picture
		$image = $_FILES['image']['name'];
		$file_loc = $_FILES['image']['tmp_name'];
		$folder="http://localhost/blood-donation/pimage/";
		//method for upload picture to server folder
		move_uploaded_file($file_loc,$folder.$image);
		
		//sql query to find user information from database
		$sqlquery1 = "UPDATE tbdonor SET dname = '$name', image = '$image', sex = '$sex', dnumber = '$number', demail = '$email', daddress = '$address', dblood = '$bg', lddate = '$ldonate' WHERE tbdonor.id = '$id';";
		$sqlquery2 = "UPDATE donorlog SET password = '$password' WHERE donorlog.id = '$id';";

		//method to update data from database
		mysqli_query($conect, $sqlquery1);
		mysqli_query($conect, $sqlquery2);
		
		//mehtod to redirect this page to another page
		header("location:http://localhost/blood-donation/log/signprofile.php");
	}
	else{
		header("location:http://localhost/blood-donation/log/login.php");
	}
?>